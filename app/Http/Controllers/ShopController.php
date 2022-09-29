<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
        public function index()
    {
        $shops=Shop::all();
        return view('/index', ['shops' => $shops]);
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

        if(!empty($area)){
            $search_area=Shop::where('area', '=', $area)->get();
        }
        return view('/index', ['shops'=>$search_area]);
    }
}