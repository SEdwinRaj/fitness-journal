<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\fooditems;
use Illuminate\Http\Request;

class foodcontroller extends Controller
{
    // function display() {
    //     $foods = fooditems::select('id','name')->get();
    //     return view('diet')->with('foods',$foods);
    // }

    public function getFood(Request $req) {
        $foods = json_decode($req->foods, true);

        $meal = '';
        
        if(count($foods['bf'])){
            $food = $foods['bf'];
            $meal = 'bf';
        }
        elseif(count($foods['l'])){
            $food = $foods['l'];
            $meal = 'l';
        }
        elseif(count($foods['es'])){
            $food = $foods['es'];
            $meal = 'es';
        }
        else{
            $food = $foods['d'];
            $meal = 'd';
        }

        $data = DB::table('currentdata')->where('name',$req->name)->first();
        $tc = $data->total_calories;
        $p = $data->protein;
        $f = $data->fiber;
        $c = $data->carbs;
        $fa = $data->fat;
        $m = $data->$meal;

        $newM = 0;
        

        foreach ($food as $foo) {
            $quantity = $foo['quantity']/100;
            $cal = DB::table('fooditems')->where('id',$foo['foodId'])->first();
            
            $newM += $cal->total_calories * $quantity;
            $tc += $cal->total_calories * $quantity;
            $p += $cal->protein * $quantity;
            $f += $cal->fiber * $quantity;
            $c += $cal->carb * $quantity;
            $fa += $cal->fat * $quantity;
        }

        $data = DB::table('currentdata')->where('name',$req->name)->update(
            [
                'total_calories' => $tc,
                'protein' => $p,
                'carbs' => $c,
                'fiber' => $f,
                'fat' => $fa,
                $meal => $m+$newM
            ]
        );

        $data = DB::table('currentdata')->where('name',$req->name)->first();

        $det = DB::table('userdetail')->where('name',$req->name)->first();

        date_default_timezone_set('Asia/Kolkata');

        $td = date('d');

        $cal = DB::table('daily_calories_consumed')->where('username',session('username'))->first();
        DB::table('daily_calories_consumed')->where('username',session('username'))->update([$td => $tc]);

        $foods = fooditems::select('id','name')->get();

        $calConsumed = DB::table('daily_calories_consumed')->where('username',session('username'))->first();

        if ($calConsumed && property_exists($calConsumed, $td)) {
            session()->put([
                'Tcalorie' => $calConsumed->$td
            ]);
        } else {
            session()->put([
                'Tcalorie' => 0
            ]);
        }

        unset($calConsumed->username);
        $calConsumed = (array)$calConsumed;

        return view('diet')->with([
            'foods' => $foods,
            'name' => $req->name,
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

        // return $tc;
        
    }
}
