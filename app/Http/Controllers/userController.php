<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\fooditems;
use App\Models\userdetail;
use Illuminate\Http\Request;
use App\Http\Controllers\foodController;

class userController extends Controller
{

    public function signup(Request $req) {

        $req->validate([
            'username' => 'required|min:3|max:20|unique:logininfo,username',
            'password' => 'required|min:4'
        ],
        [
            'username.required' => 'Please enter a username.',
            'username.min' => 'Username must be at least 3 characters.',
            'username.max' => 'Username cannot exceed 20 characters.',
            'username.unique' => 'This username is already taken.',
            
            'password.required' => 'Please enter a password.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        DB::table('logininfo')->insert([
            'username' => $req->username,
            'password' => $req->password
        ]);
        return view('regDet')->with('name',$req->username);
    }

    public function signUpUser(Request $req) {
        $activity_multipliers = [
            "sedentary" => 1.2,
            "light" => 1.375,
            "moderate" => 1.55,
            "active" => 1.725,
            "superactive" => 1.9
        ];

        $gen = $req->gen;

        if ($gen == "m") {
            $bmr = (10 * $req->weight) + (6.25 * $req->height) - (5 * $req->age) + 5;
        } else {
            $bmr = (10 * $req->weight) + (6.25 * $req->height) - (5 * $req->age) - 161;
        }


        if($req->lifeStyle != ""){
            $tedd = $bmr * $activity_multipliers[$req->lifeStyle];
            $weight = $req->weight;
            $dweight = $req->dweight;
            if($weight < $dweight){
                $tedd = $tedd+300;
            }else{
                $tedd = $tedd-300;
            }

            $proteinPercent = 0.25; // 25% of TDEE
            $fatPercent = 0.25;     // 25% of TDEE
            $carbPercent = 0.50;    // 50% of TDEE

            // Macro calculations
            $protein = ($tedd * $proteinPercent) / 4; // Protein has 4 kcal per gram
            $fat = ($tedd * $fatPercent) / 9;        // Fat has 9 kcal per gram
            $carbs = ($tedd * $carbPercent) / 4;     // Carbs have 4 kcal per gram
            $fiber = ($tedd * 14) / 1000;           // 14g fiber per 1000 kcal


            DB::table('userdetail')->insert(
                ['name' => $req->name, 'age' => $req->age , 'height' => $req->height, 'Current_weight' => $weight, 'Desired_weight' => $dweight, 'Maintenance_calories' =>(int)$tedd, 'protein' => (int)$protein, 'fat' => (int)$fat, 'carbs' => (int)$carbs, 'fiber' => (int)$fiber, 'Sugar' => 0, 'Colastrol' => 0]
            );
        }

        $req->session()->regenerate(); // Prevent session fixation

        // Store username in session
        session([
            'username' => $req->name,
            'Mcalorie' => (int)$tedd,
            'Tcalorie' => 0,
            'CalorieBurned' => 0
        ]);

        $id = DB::table('userdetail')->where('name', $req->name)->value('id');

        DB::table('currentdata')->insert(
            ['user_id' => $id,'name' => $req->name, 'total_calories' => 0, 'protein' => 0, 'carbs' => 0, 'fiber' => 0, 'fat' => 0]
        );

        DB::table('daily_calories_burned')->insert(['username' => session('username')]);
        DB::table('daily_calories_consumed')->insert(['username' => session('username')]);

        $data = DB::table('currentdata')->where('user_id',$id)->first();

        // return veiw('die')
        $foods = fooditems::select('id','name')->get();
        // return view('diet')->with([
        //     'foods' => $foods,
        //     'name' => $req->name,
        //     'maintenance' => (int)$tedd,
        //     'protein' => (int)$protein,
        //     'fat' => (int)$fat,
        //     'carbs' => (int)$carbs,
        //     'fiber' => (int)$fiber,
        //     'tc' => $data->total_calories,
        //     'p' => $data->protein,
        //     'c' => $data->carbs,
        //     'f' => $data->fiber,
        //     'fa' => $data->fat,
        //     'bf' => $data->bf,
        //     'l' => $data->l,
        //     'es' => $data->es,
        //     'd' => $data->d
        // ]);
        $calBurned = DB::table('daily_calories_burned')->where('username',session('username'))->first();
        $calConsumed = DB::table('daily_calories_consumed')->where('username',session('username'))->first();

        unset($calBurned->username);
        unset($calConsumed->username);

        $calBurned = (array)$calBurned;
        $calConsumed = (array)$calConsumed;

        $data = DB::table('currentdata')->where('name',session('username'))->first();
        $det = DB::table('userdetail')->where('name',session('username'))->first();
        
        return view('home')->with([
            'daily_cal_burned' => $calBurned,
            'daily_cal_consumed' => $calConsumed,
            'tc' => $data->total_calories,
            'mc' => $det->Maintenance_calories,
            'burned' => $data->totalBurned
        ]);

    }

    public function login(Request $req) {

        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Please enter your username.',
            'password.required' => 'Please enter your password.',
        ]);

        
    
        $user = DB::table('logininfo')->where('username', $req->username)->first();

        if ($user && $user->password === $req->password) {

            $req->session()->regenerate(); // Prevent session fixation

            $det = DB::table('userdetail')->where('name',$req->username)->first();

            $data = DB::table('currentdata')->where('name',$req->username)->first();

            // Store username in session
            // session([
            //     'username' => $req->username,
            //     'Mcalorie' => $det->Maintenance_calories,
            //     'Tcalorie' => $data->total_calories,
            //     'CalorieBurned' => 0
            // ]);

            $today = date('Y-m-d');
            $data = DB::table('currentdata')->where('name',$req->username)->first();
            if($data->last_login < $today) {
                $cal = $data->totalBurned;
                $tcal = $data->total_calories;
                DB::table('currentdata')->where('name',$req->username)->update([
                    'last_login' => $today,
                    'total_calories' => 0,
                    'protein' => 0,
                    'carbs' => 0,
                    'fiber' => 0,
                    'fat' => 0,
                    'bf' => 0,
                    'l' => 0,
                    'es' => 0,
                    'd' => 0,
                    'cardio' => 0,
                    'lifting' => 0,
                    'totalBurned' => 0
                ]);

                $previousDay = date('d', strtotime($today . ' -1 day'));

                DB::table('daily_calories_burned')->where('username',$req->username)->update([$previousDay => $cal]);
                DB::table('daily_calories_consumed')->where('username',$req->username)->update([$previousDay => $tcal]);

            }

            date_default_timezone_set('Asia/Kolkata');

            $td = date('d');

            $foods = fooditems::select('id','name')->get();

            $calBurned = DB::table('daily_calories_burned')->where('username',$req->username)->first();
            $calConsumed = DB::table('daily_calories_consumed')->where('username',$req->username)->first();

            session([
                'username' => $req->username,
                'Mcalorie' => $det->Maintenance_calories,
                'Tcalorie' => $calConsumed->td ?? 0,
                'CalorieBurned' => $calBurned->td ?? 0
            ]);

            unset($calBurned->username);
            unset($calConsumed->username);
    
            $calBurned = (array)$calBurned;
            $calConsumed = (array)$calConsumed;

            $data = DB::table('currentdata')->where('name',$req->username)->first();
            $det = DB::table('userdetail')->where('name',$req->username)->first();

            return view('home')->with([
                'daily_cal_burned' => $calBurned,
                'daily_cal_consumed' => $calConsumed,
                'tc' => $data->total_calories,
                'mc' => $det->Maintenance_calories,
                'burned' => $data->totalBurned
            ]);

        }

        return back()->with('error', 'Invalid username or password.');
         
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return view('landing');
    }

}
