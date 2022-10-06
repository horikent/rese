<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{


public function index(Request $request)
    {
        $id=Auth::id();
        $shops=Shop::all();
        $shop_id=Favorite::with('shop_id');
        $favorites=Favorite::all()->first();
    
        $param=[
            'id'=>$id,
            'shops'=>$shops,
            'shop_id'=>$shop_id,
            'favorites'=>$favorites
        ];
        return view('/index', $param);
    }

    public function detail(Request $request, $shop_id){
        $shop=Shop::find($shop_id);
        $param=[
        'shop_id'=>$shop_id,
        'shop'=>$shop
        ];
        return view('detail', $param);
    }

    public function search(Request $request){
        $area=$request->area;
        $genre=$request->genre;
        $name=$request->name;
            
        if(!empty($area)){
            $search=Shop::where('area', $area)->get();
        }        
        if(!empty($genre)){
            $search=Shop::where('genre', $genre)->get();
        }        
        if(!empty($name)){
            $search=Shop::where('name', 'like', "%{$name}%")->get();
        }        
        
        $param=[
            'area'=>$area,
            'genre'=>$genre,
            'shops'=>$search 
        ];
        return view('/index', $param);
    }
        public function thanks(Request $request)
    {
        return view('/thanks');
    }
}