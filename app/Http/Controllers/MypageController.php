<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MypageController extends Controller
{

public function index( Request $request)
    {
        $id=Auth::id();
        $shops=Shop::all();
        $reservations=Reservation::where('user_id', $id)->get();
        $favorites=Favorite::where('user_id', $id)->get();
        $param=[
            'shops'=>$shops,
            'reservations'=>$reservations,
            'favorites'=>$favorites
        ];
        return view('/mypage', $param);
    }
}