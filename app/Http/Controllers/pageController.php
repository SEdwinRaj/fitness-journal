<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function displayDiet(){

        $name = session('username');

        $data = DB::table('currentdata')->where('name',$name)->first();

        $det = DB::table('userdetail')->where('name',$name)->first();

        session()->put([
            'Tcalorie' => $data->total_calories
        ]);

        $calConsumed = DB::table('daily_calories_consumed')->where('username',session('username'))->first();
        unset($calConsumed->username);
        $calConsumed = (array)$calConsumed;

        $foods = DB::table('fooditems')->select('id','name')->get();
        return view('diet')->with([
            'foods' => $foods,
            'name' => $name,
            'maintenance' => $det->Maintenance_calories,
            'protein' => $det->protein,
            'fat' => $det->fat,
            'carbs' => $det->carbs,
            'fiber' => $det->fiber,
            'tc' => $data->total_calories,
            'p' => $data->protein,
            'c' => $data->carbs,
            'f' => $data->fiber,
            'fa' => $data->fat,
            'bf' => $data->bf,
            'l' => $data->l,
            'es' => $data->es,
            'd' => $data->d,
            'daily_cal_consumed' => $calConsumed
            
        ]);
    }

    public function displayHome(){
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

    public function discussion() {
        $datas = DB::table('discussion')->get();
        return view('discussion')->with([
            "datas" => $datas
        ]);
    }

    public function post(Request $req) {
        DB::table('discussion')->insert([
            'username' => session('username'),
            'content' => $req->content
        ]);

        $datas = DB::table('discussion')->get();
        return view('discussion')->with([
            "datas" => $datas
        ]);
    }
}
