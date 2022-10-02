<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $reservations = Reservation::all();
        $users = User::with('reservations')->get();
        $param=[
            'reservations'=>$reservations,
            'users'=>$users
        ];
        return view('/index', $param);
    }

    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $shops = Shop::with('reservations')->get();
        $param = [
            'user_id' => $user_id,
            'shop_id'=> $request->shop_id,
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number
        ];    
        Reservation::create($param);
        return view('/done');
	}


        public function remove(Request $request)
    {
    }
}