<?php

namespace App\Http\Controllers;

use App\models\Grade;
use App\models\Transaction;
use App\models\User;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller {

    public function usersReport($gradeId = -1) {

        if($gradeId == -1)
            return view('report.usersReport', ['grades' => Grade::all()]);

        $students = User::whereLevel(getValueInfo('studentLevel'))->whereGradeId($gradeId)->get();

        foreach ($students as $student) {

            $tmp = DB::select("select sum(p.price) as total from transactions t, product p where " .
                "p.id = t.product_id and t.user_id = " . $student->id);

            if($tmp == null || count($tmp) == 0 || $tmp[0]->total == null)
                $sum = 0;
            else {
                $sum = $tmp[0]->total;
            }

            $student->buys = Transaction::whereUserId($student->id)->count();
            $student->sum = $sum;
        }

        return view('report.usersReportGrade', ['users' => $students, 'gradeId' => $gradeId]);
    }

}
