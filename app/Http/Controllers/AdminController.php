<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function create(LoginRequest $request)
    {
        $user_id = Auth::user()->id;
        $shops = Shop::with('reservations')->get();
        $param = [
            'user_id' => $user_id,
            'shop_id'=> $request->shop_id,
            'datetime' => $datetime,
            'number' => $request->number
        ];    
        User::create($param);
        return view('/');
	}

}
