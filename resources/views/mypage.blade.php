
@extends('layouts.app')


@section('header')
  <header class="shop__header">
    <div class="header__container flex-item">
@endsection
@section('content')
  </header><br>

  @guest
  
  @endguest
  @auth
    <div class="mypage__container flex-item">  
      <div class="reservation__container-small">
        <h3 class="reservation__ttl">予約状況</h3>
            @foreach($reservations as $reservation)
              <div class="reservation__item">
                <div class="reservation__count flex-item">
                  <div class="flex-item">
                    <img src="img/clock.png" class="clock" alt="">
                    <p>予約{{$loop->iteration}}</p>
                  </div>
                  <form action="/delete/reservation"  method="post">
                    @csrf  
                    <input type="hidden" name="id" value="{{$reservation->id}}">
                    <input type="submit" class="batsu" value="❌">
                  </form>  
                </div>
                <table class="mypage__table">
                  <tr>
                    <th>Shop</th>
                    <td>{{$reservation->shop->name}}</td>
                  </tr>
                  <tr>
                    <th>Date</th>
                    <td>{{substr($reservation->datetime,0,9)}}</td>
                  </tr>
                  <tr>
                    <th>Time</th>
                    <td>{{substr($reservation->datetime,11,5)}}</td>
                  </tr>
                  <tr>
                    <th>Number</th>
                    <td>{{$reservation->number}}人</td>
                  </tr>
                </table>       
              </div>
            @endforeach
      </div>
      <div class="favorite__container">
        <div class="favorite-ttl">
          <h2>{{Auth::user()->name}}さん</h2>
          <h3>お気に入り店舗</h3>
        </div>
        <div class="favorite__container-small">
          @foreach($favorites as $favorite)
            <div class="shop__item">
              <div class="shop__image">
                <img src="{{$favorite->shop->image}}" alt="">
              </div>          
              <div class="shop__title">
                <h2>{{$favorite->shop->name}}</h2>
                <p>#{{$favorite->shop->area->area}}&emsp;#{{$favorite->shop->genre->genre}}</p>
              </div>           
              <div class="shop__btn flex-item">
                <button class="detail__btn"><a href="{{ route('detail', ['shop_id' => $favorite->shop->id ]) }}">詳しくみる</a></button>
                <form action="/delete/favorite" method="post">
                  @csrf
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="shop_id" value="{{$favorite->shop_id}}">
                  <button type="submit" class="heart">❤️</button>
                </form>   
              </div>  
            </div>
          @endforeach
        </div>
      </div>
    </div>  
  @endauth
@endsection
