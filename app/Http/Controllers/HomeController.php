<?php

namespace App\Http\Controllers;


use App\models\Bookmark;
use App\models\CommonQuestion;
use App\models\ConfigModel;
use App\models\FAQCategory;
use App\models\Likes;
use App\models\Product;
use App\models\ProductAttach;
use App\models\ProductPic;
use App\models\Project;
use App\models\ProjectAttach;
use App\models\ProjectBuyers;
use App\models\ProjectPic;
use App\models\Transaction;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller {

    public function home() {

        $x = -1;

        if(!siteTime()) {
            $x = getReminderToNextTime();
        }

        return view('home', ["reminder" => $x]);
    }

    public function choosePlan() {

        if(Auth::user()->level != getValueInfo('studentLevel'))
            return Redirect::route('profile');

        return view('choosePlan');
    }

    public function profile() {

        if(Auth::user()->level == getValueInfo('adminLevel') ||
            Auth::user()->level == getValueInfo('operatorLevel')
        )
            return view('adminProfile');

        return view('profile');
    }

    public function faq() {

        $categories = FAQCategory::all();

        foreach ($categories as $category) {
            $category->items = CommonQuestion::whereCategoryId($category->id)->get();
        }

        return view('FAQ', ['categories' => $categories]);
    }

    public function login() {
        return view('home');
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return Redirect::route('home');
    }

    public function doLogin() {

        $username = makeValidInput(Input::get('username'));
        $password = makeValidInput(Input::get('password'));

        if(Auth::attempt(['username' => $username, 'password' => $password], true)) {

            if(!Auth::user()->status) {
                $msg = "حساب کاربری شما هنوز فعال نشده است";
                Auth::logout();
                return view('login', ['loginErr' => $msg]);
            }

            if(Auth::user()->level == getValueInfo('studentLevel'))
                return Redirect::route('choosePlan');

            return redirect::route('profile');
        }
        else {
            $msg = 'نام کاربری و یا رمزعبور اشتباه است';
        }

        $x = -1;

        if(!siteTime()) {
            $x = getReminderToNextTime();
        }

        return view('home', ['loginErr' => $msg, "reminder" => $x]);
    }

    public function showAllProjects() {

        $grade = Auth::user()->grade_id;
        $date = getToday()["date"];

        $projects = DB::select('select id, title, description, price from project where grade_id = ' . $grade .
            ' and start_reg <= ' . $date . ' and end_reg >= ' . $date . ' and hide = false order by id desc');

        foreach ($projects as $project) {

            $tmpPic = ProjectPic::whereProjectId($project->id)->first();

            if($tmpPic == null || !file_exists(__DIR__ . '/../../../public/projectPic/' . $tmpPic->name))
                $project->pic = URL::asset('projectPic/defaultPic.jpg');
            else
                $project->pic = URL::asset('projectPic/' . $tmpPic->name);

            if($project->price == 0)
                $project->price = "رایگان";
            else
                $project->price = number_format($project->price);

            $project->likes = Likes::whereItemId($project->id)->whereMode(getValueInfo('projectMode'))->count();
        }

        return view('projects', ['projects' => $projects]);
    }

    public function showProject($id) {

        $project = Project::whereId($id);
        $grade = Auth::user()->grade_id;

        if($project == null || $project->hide ||
            (Auth::user()->level == getValueInfo('studentLevel') && $grade != $project->grade_id)) {
            return Redirect::route('showAllProjects');
        }

        $tmpPics = ProjectPic::whereProjectId($project->id)->get();
        $pics = [];

        foreach ($tmpPics as $tmpPic) {

            if(file_exists(__DIR__ . '/../../../public/projectPic/' . $tmpPic->name))
                $pics[count($pics)] = URL::asset('projectPic/' . $tmpPic->name);

        }

        $project->pics = $pics;


        $tmpPics = ProjectAttach::whereProjectId($project->id)->get();
        $pics = [];

        foreach ($tmpPics as $tmpPic) {

            $type = explode(".", $tmpPic->name);
            $type = $type[count($type) - 1];

            if(file_exists(__DIR__ . '/../../../public/projectPic/' . $tmpPic->name))
                $pics[count($pics)] = [
                    "path" => URL::asset('projectPic/' . $tmpPic->name),
                    "type" => $type
                ];

        }

        $project->attach = $pics;

        if($project->price == 0)
            $project->price = "رایگان";
        else
            $project->price = number_format($project->price);

        $bookmark = (Bookmark::whereUserId(Auth::user()->id)->whereItemId($id)->whereMode(getValueInfo('projectMode'))->count() > 0);
        $like = (Likes::whereUserId(Auth::user()->id)->whereItemId($id)->whereMode(getValueInfo('projectMode'))->count() > 0);
        $canBuy = true;
        $date = getToday()["date"];

        if(
            ProjectBuyers::whereUserId(Auth::user()->id)->whereProjectId($id)->count() > 0 ||
            $project->start_reg > $date || $project->end_reg < $date
        )
            $canBuy = false;

        $capacity = ConfigModel::first()->project_limit;
        $nums = DB::select("select count(*) as countNum from project_buyers where status = false and user_id = " . Auth::user()->id)[0]->countNum;

        $reminder = $capacity - $nums;
        if($reminder <= 0 && $canBuy)
            $canBuy = false;

        return view('showProject', ['bookmark' => $bookmark, 'canBuy' => $canBuy,
            'project' => $project, 'like' => $like]);
    }

    public function showAllProducts() {

        $grade = Auth::user()->grade_id;

        $products = DB::select('select p.id, name, description, price, star, concat(u.first_name, " ", u.last_name) as owner' .
            ' from product p, users u where p.user_id = u.id and u.grade_id = ' . $grade . ' and hide = false order by p.id desc');

        foreach ($products as $product) {

            $tmpPic = ProductPic::whereProductId($product->id)->first();

            if($tmpPic == null || !file_exists(__DIR__ . '/../../../public/productPic/' . $tmpPic->name))
                $product->pic = URL::asset('productPic/defaultPic.jpg');
            else
                $product->pic = URL::asset('productPic/' . $tmpPic->name);

            if($product->price == 0)
                $product->price = "رایگان";
            else
                $product->price = number_format($product->price);

            $product->likes = Likes::whereItemId($product->id)->whereMode(getValueInfo('productMode'))->count();
        }

        return view('products', ['products' => $products]);

    }

    public function showProduct($id) {

        $product = Product::whereId($id);
        $grade = Auth::user()->grade_id;

        if($product == null || $product->hide) {
            return Redirect::route('showAllProducts');
        }

        $u = User::whereId($product->user_id);
        $product->owner = $u->first_name . ' ' . $u->last_name;

        $product->grade_id = User::whereId($product->user_id)->grade_id;

        if(Auth::user()->level == getValueInfo('studentLevel') && $grade != $product->grade_id) {
            return Redirect::route('showAllProducts');
        }

        $tmpPics = ProductPic::whereProductId($product->id)->get();
        $pics = [];

        foreach ($tmpPics as $tmpPic) {

            if(file_exists(__DIR__ . '/../../../public/productPic/' . $tmpPic->name))
                $pics[count($pics)] = URL::asset('productPic/' . $tmpPic->name);

        }

        $product->pics = $pics;

        $tmpPics = ProductAttach::whereProductId($product->id)->get();
        $pics = [];

        foreach ($tmpPics as $tmpPic) {

            $type = explode(".", $tmpPic->name);
            $type = $type[count($type) - 1];

            if(file_exists(__DIR__ . '/../../../public/productPic/' . $tmpPic->name))
                $pics[count($pics)] = [
                    "path" => URL::asset('productPic/' . $tmpPic->name),
                    "type" => $type
                ];

        }

        $product->attach = $pics;

        if($product->price == 0)
            $product->price = "رایگان";
        else
            $product->price = number_format($product->price);

        $bookmark = (Bookmark::whereUserId(Auth::user()->id)->whereItemId($id)->whereMode(getValueInfo('productMode'))->count() > 0);
        $like = (Likes::whereUserId(Auth::user()->id)->whereItemId($id)->whereMode(getValueInfo('productMode'))->count() > 0);

        $canBuy = true;

        if(Transaction::whereUserId(Auth::user()->id)->whereProductId($id)->count() > 0)
            $canBuy = false;

        return view('showProduct', ['bookmark' => $bookmark, 'canBuy' => $canBuy,
            'product' => $product, 'like' => $like]);
    }

    public function convertStarToCoin() {

        if (isset($_POST["stars"])) {

            $user = Auth::user();
            $stars = makeValidInput($_POST['stars']);

            if($user->stars >= $stars) {
                $rate = ConfigModel::first()->change_rate;
                $user->money += $rate * $stars;
                $user->stars -= $stars;
                try {
                    $user->save();
                    echo "ok";
                    return;
                }
                catch (\Exception $x) {}
            }

        }

        echo "nok";
    }

    public function bookmark() {

        if(isset($_POST["id"]) && isset($_POST["mode"])) {

            $item_id = makeValidInput($_POST["id"]);
            $mode = makeValidInput($_POST["mode"]);

            $uId = Auth::user()->id;

            $bookmark = Bookmark::whereItemId($item_id)->whereUserId($uId)->whereMode($mode)->first();
            if($bookmark == null) {
                $bookmark = new Bookmark();
                $bookmark->item_id = $item_id;
                $bookmark->user_id = $uId;
                $bookmark->mode = $mode;
                $bookmark->save();
                echo "ok";
                return;
            }
            else {
                $bookmark->delete();
                echo "nok";
            }
        }

    }

    public function like() {

        if(isset($_POST["id"]) && isset($_POST["mode"])) {

            $item_id = makeValidInput($_POST["id"]);
            $mode = makeValidInput($_POST["mode"]);

            $uId = Auth::user()->id;

            $like = Likes::whereItemId($item_id)->whereUserId($uId)->whereMode($mode)->first();
            if($like == null) {
                $like = new Likes();
                $like->item_id = $item_id;
                $like->user_id = $uId;
                $like->mode = $mode;
                $like->save();
                echo "ok";
                return;
            }
            else {
                $like->delete();
                echo "nok";
            }
        }

    }

    public function buyProject() {

        if(isset($_POST["id"])) {

            $project = Project::whereId(makeValidInput($_POST["id"]));
            $user = Auth::user();

            if($project == null || $project->hide || $project->grade_id != $user->grade_id) {
                echo "nok1";
                return;
            }

            if(ProjectBuyers::whereUserId($user->id)->whereProjectId($project->id)->count() > 0) {
                echo "nok2";
                return;
            }

            if($project->price > $user->money) {
                echo "nok3";
                return;
            }

            $date = getToday()["date"];
            if($project->start_reg > $date || $project->end_reg < $date) {
                echo "nok4";
                return;
            }

            $capacity = ConfigModel::first()->project_limit;
            $nums = DB::select("select count(*) as countNum from project_buyers where status = false and user_id = " . Auth::user()->id)[0]->countNum;

            $reminder = $capacity - $nums;
            if($reminder <= 0) {
                echo "nok6";
                return;
            }

            try {
                $tmp = new ProjectBuyers();
                $tmp->user_id = $user->id;
                $tmp->project_id = $project->id;
                $tmp->save();

                $user->money -= $project->price;
                $user->save();

                echo "ok";
                return;
            }
            catch (\Exception $x) {}
        }

        echo "nok5";
    }

    public function buyProduct() {

        if(isset($_POST["id"])) {

            $product = Product::whereId(makeValidInput($_POST["id"]));
            $user = Auth::user();

            if($product == null || $product->hide) {
                echo "nok1";
                return;
            }

            $product->grade_id = User::whereId($product->user_id)->grade_id;

            if($product->grade_id != $user->grade_id) {
                echo "nok1";
                return;
            }

            if(Transaction::whereUserId($user->id)->whereProductId($product->id)->count() > 0) {
                echo "nok2";
                return;
            }

            if($product->price > $user->money) {
                echo "nok3";
                return;
            }

            try {
                $tmp = new Transaction();
                $tmp->user_id = $user->id;
                $tmp->product_id = $product->id;
                $tmp->follow_code = generateActivationCode();
                $tmp->save();

                $user->money -= $product->price;
                $user->stars += $product->star;
                $user->save();

                echo "ok";
                return;
            }
            catch (\Exception $x) {}
        }

        echo "nok5";

    }

    public function bookmarks($mode) {

        $items = Bookmark::whereUserId(Auth::user()->id)->whereMode($mode)->get();

        if($mode == getValueInfo('productMode')) {

            $out = [];

            foreach ($items as $product) {

                $product = Product::whereId($product->item_id);

                $tmpPic = ProductPic::whereProductId($product->id)->first();

                if($tmpPic == null || !file_exists(__DIR__ . '/../../../public/productPic/' . $tmpPic->name))
                    $product->pic = URL::asset('productPic/defaultPic.jpg');
                else
                    $product->pic = URL::asset('productPic/' . $tmpPic->name);

                if($product->price == 0)
                    $product->price = "رایگان";
                else
                    $product->price = number_format($product->price);

                $product->likes = Likes::whereItemId($product->id)->whereMode(getValueInfo('productMode'))->count();
                $out[count($out)] = $product;
            }

            return view('products', ['products' => $out]);

        }
        else {

            $out = [];

            foreach ($items as $project) {

                $project = Project::whereId($project->item_id);

                $tmpPic = ProjectPic::whereProjectId($project->id)->first();

                if($tmpPic == null || !file_exists(__DIR__ . '/../../../public/projectPic/' . $tmpPic->name))
                    $project->pic = URL::asset('projectPic/defaultPic.jpg');
                else
                    $project->pic = URL::asset('projectPic/' . $tmpPic->name);

                if($project->price == 0)
                    $project->price = "رایگان";
                else
                    $project->price = number_format($project->price);

                $project->likes = Likes::whereItemId($project->id)->whereMode(getValueInfo('projectMode'))->count();
                $out[count($out)] = $project;
            }

            return view('projects', ['projects' => $out]);
        }

    }
}
