
@extends('layouts.app')



@section('header')
@endsection    

<div class="header__container flex-item">
@section('content')
  <div class="detail flex-item">  
    <div class="detail__container flex-item">
      <div class="detail__container-small">
        <div class="shop__name flex-item">
          <h2><<button class="rounded-md bg-gray-800 text-white px-4 py-2" onClick="history.back();">◀️</button>{{$shop->name}}</h2>
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
          <input type="time" class="time" name="time" value="time"><br>
          <input type="number" class="number" name="number" min=1 value="number人"><br>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="shop_id" value="{{$shop->id}}"><br>
            <table class="detail__table">
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
                <td><p id="output_number">人</p></td>
              </tr>
            </table>
            @auth
              <input type="submit" class="register__btn" value="予約する">
            @endauth
        </form>
        <div class="register__btn">  
          @guest
            <button>
              <a href="/register">予約する</a>
            </button>  
          @endguest  
        </div>
    </div>
  </div>
@endsection
