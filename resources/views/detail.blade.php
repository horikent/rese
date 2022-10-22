
@extends('layouts.app')



@section('header')
@endsection    

<div class="header__container flex-item">
@section('content')
  <div class="detail">  
    <div class="detail__container flex-item">
      <div class="detail__container-small">
        <div class="shop__name flex-item">
          <h2><button class="rounded-md bg-gray-800 text-white px-4 py-2" onClick="history.back();"><</button>&nbsp;{{$shop->name}}</h2>
        </div>  
        <div class="shop__image">
          <img src="{{asset($shop->image)}}" alt="">
        </div>
        <div class="shop__detail">
          <p>#{{$shop->area->area}}&emsp;#{{$shop->genre->genre}}</p>
          <p>{{$shop->detail}}</p>
        </div>
      </div>
    </div>    
    <div class="reservation__container">
      <h2>予約</h2>
        <form action="/add/reservation" method="post">
        @csrf 
          <input type="date" class="date" name="date" value="date"><br>
          <select class="time" name="time">
            <option></option>
            @for($i=11; $i<=22; $i++)
            <option value="{{$i}}:00">{{$i}}:00</option>
            <option value="{{$i}}:30">{{$i}}:30</option>
            @endfor
            <option value="23:00">23:00</option>
          </select>
          <select class="number" name="number">
            <option></option>
            @for($i=1; $i<=10; $i++)
            <option value="{{$i}}">{{$i}}人</option>
            @endfor
          </select><br>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="shop_id" value="{{$shop->id}}"><br>
            <table class="reservation__table">
              <tr>
                <th>Shop</th>
                <td>{{$shop->name}}</td>
              </tr>
              <tr>
                <th>Date</th>
                <td><p id="output_date"></p></td>
              </tr>
              <tr>
                <th>Time</th>
                <td><p id="output_time"></p></td>              
              </tr>
              <tr>
                <th>Number</th>
                <td><p id="output_number"></p></td>
              </tr>
            </table>
            @auth
              <input type="submit" class="reservation__btn" value="予約する">
            @endauth
        </form>
        @guest
          <div >  
            <button class="reservation__btn">
              <a href="/login">予約する</a>
            </button>  
          </div>
        @endguest  
    </div>
  </div>
@endsection
