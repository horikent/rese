<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $shops = Shop::with('reservations')->get();
        $date = $request->date;
        $time = ' '.$request->time.':00';
        $datetime = $date.=$time;
        $param = [
            'user_id' => $user_id,
            'shop_id'=> $request->shop_id,
            'datetime' => $datetime,
            'number' => $request->number
        ];    
        Reservation::create($param);
        return view('/done');
	}


    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $date = $request->date;
        $time = ' '.$request->time;
        $datetime = $date.=$time;
        $param = [
            'id' => $request->id,
            'user_id' => $user_id,
            'shop_id'=> $request->shop_id,
            'datetime' => $datetime,
            'number' => $request->number,
            '_token'=> $request->_token
        ];    
        unset($param['_token']);
        Reservation::where('id', $request->id)->update($param);
        return view('/done');
	}

        public function remove(Request $request)
    {
        Reservation::find($request->id)->delete();
        return redirect('/mypage');
    }
        public function done(Request $request)
    {
        return $this;
    }
}