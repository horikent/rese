
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
            <option value="11:00">11:00</option>
            <option value="11:30">11:30</option>
            <option value="12:00">12:00</option>
            <option value="12:30">12:30</option>
            <option value="13:00">13:00</option>
            <option value="13:30">13:30</option>
            <option value="14:00">14:00</option>
            <option value="14:30">14:30</option>
            <option value="15:00">15:00</option>
            <option value="15:30">15:30</option>
            <option value="16:00">16:00</option>
            <option value="16:30">16:30</option>
            <option value="17:00">17:00</option>
            <option value="18:00">18:00</option>
            <option value="18:30">18:30</option>
            <option value="19:00">19:00</option>
            <option value="19:30">19:30</option>
            <option value="20:00">20:00</option>
            <option value="20:30">20:30</option>
            <option value="21:00">21:00</option>
            <option value="21:30">21:30</option>
            <option value="22:00">22:00</option>
            <option value="22:30">22:30</option>
            <option value="23:00">23:00</option>
          </select>
          <select class="number" name="number">
            <option></option>
            <option value="1">1人</option>
            <option value="2">2人</option>
            <option value="3">3人</option>
            <option value="4">4人</option>
            <option value="5">5人</option>
            <option value="6">6人</option>
            <option value="7">7人</option>
            <option value="8">8人</option>
            <option value="9">9人</option>
            <option value="10">10人</option>
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
