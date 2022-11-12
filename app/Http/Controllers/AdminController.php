<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(LoginRequest $request)
    {
        return view('/admin');
	}

    public function create(LoginRequest $request)
    {
        $name = $request -> name;
        $email = $request->email;
        $password = $request->password;
        $param = [
            'name'=> $name,
            'email' => $email,
            'password' => $password
        ];    
        User::create($param);
        return view('/admin');
	}

}
