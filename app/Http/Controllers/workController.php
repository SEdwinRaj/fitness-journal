<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class workController extends Controller
{

    public function displayWorkout() {
        $cardio = DB::table('workinfo')->select('id','name')->get();
        $lifting = DB::table('lifting')->select('id','name')->get();

        $calBurned = DB::table('daily_calories_burned')->where('username',session('username'))->first();
        unset($calBurned->username);
        $calBurned = (array)$calBurned;

        $data = DB::table('currentdata')->where('name',session('username'))->first();
        return view('workout')->with([
            'Cardioworks' => $cardio,
            'data' => $data,
            'Liftingworks' => $lifting,
            'daily_cal_burned' => $calBurned,
            'burned' => $data->totalBurned
        ]);
    }

    public function getWork(Request $req) {

        $works = json_decode($req->works, true);

        $intensityMultiplier = [
            "low" => 0.8,
            "medium" => 1.0,
            "high" => 1.3
        ];

        $total = 0;

        foreach($works as $work) {
            $time = $work['time'] / 10;
            $cal = DB::table('workinfo')->select('baseCalorie')->where('id',$work['id'])->first();
            $baseCalories = $cal->baseCalorie;
            $int = $intensityMultiplier[$work['intencity']];

            $data = DB::table('userdetail')->where('name',session('username'))->first();

            $weightFactor = $data->Current_weight / 70;
        
            if (!isset($baseCalories) || !isset($int)) {
                return "Invalid exercise or intensity level.";
            }
            
            // Calculate calories burned based on time
            $caloriesBurned = $baseCalories * $time * $int * $weightFactor;
            $calBurned = round($caloriesBurned, 2);

            $total = $total + $calBurned;
        }

        $workout = $req->workName;

        $data = DB::table('currentdata')->where('name',session('username'))->first();

        $tc = $data->totalBurned + $total;

        DB::table('currentdata')->where('name',session('username'))->update([
            $workout => $data->$workout + $total,
            'totalBurned' => $tc
        ]);
        $cardio = DB::table('workinfo')->select('id','name')->get();
        $lifting = DB::table('lifting')->select('id','name')->get();
        $data = DB::table('currentdata')->where('name',session('username'))->first();

        date_default_timezone_set('Asia/Kolkata');

        $td = date('d');

        $cal = DB::table('daily_calories_burned')->where('username',session('username'))->first();
        DB::table('daily_calories_burned')->where('username',session('username'))->update([$td => $tc]);
        
        $calBurned = DB::table('daily_calories_burned')->where('username',session('username'))->first();

        if ($calBurned && property_exists($calBurned, $td)) {
            session()->put([
                'CalorieBurned' => $calBurned->$td
            ]);
        } else {
            session()->put([
                'CalorieBurned' => 0
            ]);
        }

        unset($calBurned->username);
        $calBurned = (array)$calBurned;

        return view('workout')->with([
            'Cardioworks' => $cardio,
            'data' => $data,
            'Liftingworks' => $lifting,
            'daily_cal_burned' => $calBurned,
            'burned' => $data->totalBurned
        ]);

    }

    public function workLifting(Request $req) {

        $works = json_decode($req->works, true);
        $total = 0;
        

        foreach($works as $work) {
            $cal = DB::table('lifting')->where('id',$work['id'])->first();
            $baseCalories = $cal->baseCalorie;
        
            if (!isset($baseCalories)) {
                return "Invalid exercise or intensity level.";
            }
            
            $caloriesBurned = $baseCalories * $work['weight'] * $work['set'] * $work['rep'];
            $calBurned = round($caloriesBurned, 2);

            $total = $total + $calBurned;
        }

        $workout = $req->workName;

        $data = DB::table('currentdata')->where('name',session('username'))->first();

        $tc = $data->totalBurned + $total;

        DB::table('currentdata')->where('name',session('username'))->update([
            $workout => $data->$workout + $total,
            'totalBurned' => $tc
        ]);

        date_default_timezone_set('Asia/Kolkata');

        $td = date('d');

        $cal = DB::table('daily_calories_burned')->where('username',session('username'))->first();
        DB::table('daily_calories_burned')->where('username',session('username'))->update([$td => $tc]);

        $cardio = DB::table('workinfo')->select('id','name')->get();
        $lifting = DB::table('lifting')->select('id','name')->get();
        $data = DB::table('currentdata')->where('name',session('username'))->first();

        $calBurned = DB::table('daily_calories_burned')->where('username',session('username'))->first();

        if ($calBurned && property_exists($calBurned, $td)) {
            session()->put([
                'CalorieBurned' => $calBurned->$td
            ]);
        } else {
            session()->put([
                'CalorieBurned' => 0
            ]);
        }
        unset($calBurned->username);
        $calBurned = (array)$calBurned;

        return view('workout')->with([
            'Cardioworks' => $cardio,
            'data' => $data,
            'Liftingworks' => $lifting,
            'daily_cal_burned' => $calBurned,
            'burned' => $data->totalBurned
        ]);

    }
}
