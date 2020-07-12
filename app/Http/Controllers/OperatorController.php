<?php

namespace App\Http\Controllers;

use App\models\Grade;
use App\models\Product;
use App\models\ProductAttach;
use App\models\ProductPic;
use App\models\Project;
use App\models\ProjectAttach;
use App\models\ProjectBuyers;
use App\models\ProjectPic;
use App\models\Transaction;
use App\models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use ZipArchive;

class OperatorController extends Controller {

    public function projects() {

        $projects = DB::select("select p.*, g.name as grade from project p, grade g where p.grade_id = g.id order by p.id desc");

        foreach ($projects as $project) {

            $tmpPic = ProjectPic::whereProjectId($project->id)->first();

            if($tmpPic == null || !file_exists(__DIR__ . '/../../../public/projectPic/' . $tmpPic->name))
                $project->pic = URL::asset('projectPic/defaultPic.jpg');
            else
                $project->pic = URL::asset('projectPic/' . $tmpPic->name);

            $project->date = MiladyToShamsi('', explode('-', explode(' ', $project->created_at)[0]));

            $t = ProjectBuyers::whereProjectId($project->id)->select('user_id')->get();

            if($project->price == 0)
                $project->price = "رایگان";
            else
                $project->price = number_format($project->price);

            $project->startReg = convertStringToDate($project->start_reg);
            $project->endReg = convertStringToDate($project->end_reg);

            $project->hide = (!$project->hide) ? "آشکار" : "مخفی";

            if($t == null || count($t) == 0)
                $project->buyers = "هنوز خریداری نشده است.";
            else {

                $str = "";
                $first = true;

                foreach ($t as $itr) {
                    $u = User::whereId($itr->user_id);
                    if($first) {
                        $str .= $u->first_name . ' ' . $u->last_name;
                        $first = false;
                    }
                    else {
                        $str .= " - " . $u->first_name . ' ' . $u->last_name;
                    }
                }


                $project->buyers = $str;
            }

        }

        return view('operator.projects', ['projects' => $projects, 'grades' => Grade::all()]);
    }

    public function products($err = -1) {

        $products = DB::select("select p.*, g.name as grade, g.id as grade_id, concat(u.first_name, ' ', u.last_name) as owner from product p, users u, grade g where p.user_id = u.id and u.grade_id = g.id order by p.id desc");

        foreach ($products as $product) {

            $tmpPic = ProductPic::whereProductId($product->id)->first();

            if($tmpPic == null || !file_exists(__DIR__ . '/../../../public/productPic/' . $tmpPic->name))
                $product->pic = URL::asset('productPic/defaultPic.jpg');
            else
                $product->pic = URL::asset('productPic/' . $tmpPic->name);

            $product->date = MiladyToShamsi('', explode('-', explode(' ', $product->created_at)[0]));

            $t = Transaction::whereProductId($product->id)->select('user_id')->get();

            if($product->price == 0)
                $product->price = "رایگان";
            else
                $product->price = number_format($product->price);

            $product->hide = (!$product->hide) ? "آشکار" : "مخفی";

            if($t == null || count($t) == 0)
                $product->buyer = "هنوز خریداری نشده است.";
            else {
                $u = User::whereId($t[0]->user_id);
                $product->buyer = $u->first_name . ' ' . $u->last_name;
            }

        }

        return view('operator.products', ['products' => $products, 'grades' => Grade::all(),
            'err' => $err]);
    }

    public function addProject() {

        if(isset($_POST["name"]) && isset($_POST["description"])
            && isset($_POST["price"]) && isset($_POST["gradeId"])
            && isset($_POST["start_reg"]) && isset($_POST["end_reg"])
        ) {

            $project = new Project();
            $project->title = makeValidInput($_POST["name"]);
            $project->description = $_POST["description"];
            $project->price = makeValidInput($_POST["price"]);
            $project->grade_id = makeValidInput($_POST["gradeId"]);
            $project->start_reg = convertDateToString(makeValidInput($_POST["start_reg"]));
            $project->end_reg = convertDateToString(makeValidInput($_POST["end_reg"]));

            try {

                $project->save();

                if(isset($_FILES["file"]) && !empty($_FILES["file"]["name"])) {

                    $file = Input::file('file');
                    $Image = time() . '_' . $file->getClientOriginalName();
                    $destenationpath = public_path() . '/tmp';
                    $file->move($destenationpath, $Image);

                    $zip = new ZipArchive;
                    $res = $zip->open($destenationpath . '/' . $Image);

                    if ($res === TRUE) {
                        $folder = time();
                        mkdir($destenationpath . '/' . $folder);
                        $zip->extractTo($destenationpath . '/' . $folder);
                        $zip->close();

                        $dir = $destenationpath . '/' . $folder;
                        $q = scandir($dir);
                        $q = array_diff($q, array('.', '..'));
                        natsort($q);

                        $vals = [];
                        foreach ($q as $itr)
                            $vals[count($vals)] = $itr;

                        $newDest = __DIR__ . '/../../../public/projectPic/';

                        foreach ($vals as $val) {
                            $tmp = new ProjectPic();
                            $tmp->project_id = $project->id;
                            $tmp->name = time() . $val;
                            $tmp->save();
                            rename($destenationpath . '/' . $folder . '/' . $val,
                                $newDest . $tmp->name);
                        }

                        rrmdir($destenationpath . '/' . $folder);
                        unlink($destenationpath . '/' . $Image);

                    }
                }

                if(isset($_FILES["attach"]) && !empty($_FILES["attach"]["name"])) {

                    $file = Input::file('attach');
                    $Image = time() . '_' . $file->getClientOriginalName();
                    $destenationpath = public_path() . '/tmp';
                    $file->move($destenationpath, $Image);

                    $zip = new ZipArchive;
                    $res = $zip->open($destenationpath . '/' . $Image);

                    if ($res === TRUE) {
                        $folder = time();
                        mkdir($destenationpath . '/' . $folder);
                        $zip->extractTo($destenationpath . '/' . $folder);
                        $zip->close();

                        $dir = $destenationpath . '/' . $folder;
                        $q = scandir($dir);
                        $q = array_diff($q, array('.', '..'));
                        natsort($q);

                        $vals = [];
                        foreach ($q as $itr)
                            $vals[count($vals)] = $itr;

                        $newDest = __DIR__ . '/../../../public/projectPic/';

                        foreach ($vals as $val) {
                            $tmp = new ProjectAttach();
                            $tmp->project_id = $project->id;
                            $tmp->name = time() . $val;
                            $tmp->save();
                            rename($destenationpath . '/' . $folder . '/' . $val,
                                $newDest . $tmp->name);
                        }

                        rrmdir($destenationpath . '/' . $folder);
                        unlink($destenationpath . '/' . $Image);

                    }
                }
            }
            catch (\Exception $x) {
                dd($x);
            }

        }

        return Redirect::route('projects');
    }

    public function addProduct() {

        if(isset($_POST["name"]) && isset($_POST["description"])
            && isset($_POST["price"]) && isset($_POST["project"])
            && isset($_POST["star"]) && isset($_POST["username"])
        ) {

            $username = makeValidInput($_POST["username"]);

            $user = DB::select("select id from users where nid = " . $username . ' or username = ' . $username);

            if($user == null || count($user) == 0) {
                return Redirect::route('products', ['err' => 1]);
            }

            $project = makeValidInput($_POST["project"]);
            $p = ProjectBuyers::whereUserId($user[0]->id)->whereProjectId($project)->first();

            if($p == null)
                return Redirect::route('products', ['err' => 1]);

            $p->status = 1;
            $p->save();

            $project = new Product();
            $project->name = makeValidInput($_POST["name"]);
            $project->description = $_POST["description"];
            $project->price = makeValidInput($_POST["price"]);
            $project->star = makeValidInput($_POST["star"]);
            $project->user_id = $user[0]->id;

            try {

                $project->save();

                if(isset($_FILES["file"]) && !empty($_FILES["file"]["name"])) {

                    $file = Input::file('file');
                    $Image = time() . '_' . $file->getClientOriginalName();
                    $destenationpath = public_path() . '/tmp';
                    $file->move($destenationpath, $Image);

                    $zip = new ZipArchive;
                    $res = $zip->open($destenationpath . '/' . $Image);

                    if ($res === TRUE) {
                        $folder = time();
                        mkdir($destenationpath . '/' . $folder);
                        $zip->extractTo($destenationpath . '/' . $folder);
                        $zip->close();

                        $dir = $destenationpath . '/' . $folder;
                        $q = scandir($dir);
                        $q = array_diff($q, array('.', '..'));
                        natsort($q);

                        $vals = [];
                        foreach ($q as $itr)
                            $vals[count($vals)] = $itr;

                        $newDest = __DIR__ . '/../../../public/productPic/';

                        foreach ($vals as $val) {
                            $tmp = new ProductPic();
                            $tmp->product_id = $project->id;
                            $tmp->name = time() . $val;
                            $tmp->save();
                            rename($destenationpath . '/' . $folder . '/' . $val,
                                $newDest . $tmp->name);
                        }

                        rrmdir($destenationpath . '/' . $folder);
                        unlink($destenationpath . '/' . $Image);

                    }
                }

                if(isset($_FILES["attach"]) && !empty($_FILES["attach"]["name"])) {

                    $file = Input::file('attach');
                    $Image = time() . '_' . $file->getClientOriginalName();
                    $destenationpath = public_path() . '/tmp';
                    $file->move($destenationpath, $Image);

                    $zip = new ZipArchive;
                    $res = $zip->open($destenationpath . '/' . $Image);

                    if ($res === TRUE) {
                        $folder = time();
                        mkdir($destenationpath . '/' . $folder);
                        $zip->extractTo($destenationpath . '/' . $folder);
                        $zip->close();

                        $dir = $destenationpath . '/' . $folder;
                        $q = scandir($dir);
                        $q = array_diff($q, array('.', '..'));
                        natsort($q);

                        $vals = [];
                        foreach ($q as $itr)
                            $vals[count($vals)] = $itr;

                        $newDest = __DIR__ . '/../../../public/productPic/';

                        foreach ($vals as $val) {
                            $tmp = new ProductAttach();
                            $tmp->product_id = $project->id;
                            $tmp->name = time() . $val;
                            $tmp->save();
                            rename($destenationpath . '/' . $folder . '/' . $val,
                                $newDest . $tmp->name);
                        }

                        rrmdir($destenationpath . '/' . $folder);
                        unlink($destenationpath . '/' . $Image);

                    }
                }
            }
            catch (\Exception $x) {
                dd($x);
            }

        }

        return Redirect::route('products');
    }

    public function deleteProject() {

        if(isset($_POST["id"])) {

            $p = Project::whereId(makeValidInput($_POST["id"]));

            if($p != null) {

                $pics = ProjectPic::whereProjectId($p->id)->get();
                foreach ($pics as $pic) {
                    if (file_exists(__DIR__ . '/../../../public/projectPic/' . $pic->name))
                        unlink(__DIR__ . '/../../../public/projectPic/' . $pic->name);
                }

                $pics = ProjectAttach::whereProjectId($p->id)->get();
                foreach ($pics as $pic) {
                    if (file_exists(__DIR__ . '/../../../public/projectPic/' . $pic->name))
                        unlink(__DIR__ . '/../../../public/projectPic/' . $pic->name);
                }

                try {
                    $p->delete();
                    echo "ok";
                    return;
                }
                catch (\Exception $x) {
                    dd($x);
                }
            }
        }

        echo "nok";
    }

    public function toggleHideProject() {

        if(isset($_POST["id"])) {

            $p = Project::whereId(makeValidInput($_POST["id"]));
            if($p != null) {
                $p->hide = !$p->hide;
                try {
                    $p->save();
                    echo "ok";
                    return;
                }
                catch (\Exception $x) {}
            }
        }

        echo "nok";
    }

    public function toggleHideProduct() {

        if(isset($_POST["id"])) {

            $p = Product::whereId(makeValidInput($_POST["id"]));
            if($p != null) {
                $p->hide = !$p->hide;
                try {
                    $p->save();
                    echo "ok";
                    return;
                }
                catch (\Exception $x) {}
            }
        }

        echo "nok";
    }

    public function deleteProduct() {

        if(isset($_POST["id"])) {

            $p = Product::whereId(makeValidInput($_POST["id"]));

            if($p != null) {

                $pics = ProductPic::whereProductId($p->id)->get();

                foreach ($pics as $pic) {
                    if (file_exists(__DIR__ . '/../../../public/productPic/' . $pic->name))
                        unlink(__DIR__ . '/../../../public/productPic/' . $pic->name);
                }

                $pics = ProductAttach::whereProductId($p->id)->get();

                foreach ($pics as $pic) {
                    if (file_exists(__DIR__ . '/../../../public/productPic/' . $pic->name))
                        unlink(__DIR__ . '/../../../public/productPic/' . $pic->name);
                }

                try {
                    $p->delete();
                    echo "ok";
                    return;
                }
                catch (\Exception $x) {
                    dd($x);
                }
            }
        }
    }

    public function getOpenProject() {

        if(isset($_POST["username"])) {

            $username = makeValidInput($_POST["username"]);

            $user = DB::select("select id from users where username = " . $username . ' or nid = ' . $username);

            if($user == null || count($user) == 0) {
                echo json_encode([]);
                return;
            }

            $user = $user[0];

            $projects = DB::select("select p.id, p.title from project p, project_buyers b where p.id = b.project_id and b.status = false and b.user_id = " . $user->id);
            echo json_encode($projects);
        }

    }
}
