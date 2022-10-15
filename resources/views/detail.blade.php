
@extends('layouts.app')



@section('header')
@endsection    

<div class="header__container flex-item">
@section('content')
  <div class="detail flex-item">  
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
            <option>11:00</option>
            <option>11:30</option>
            <option>12:00</option>
            <option>12:30</option>
            <option>13:00</option>
            <option>13:30</option>
            <option>14:00</option>
            <option>14:30</option>
            <option>15:00</option>
            <option>15:30</option>
            <option>16:00</option>
            <option>16:30</option>
            <option>17:00</option>
            <option>18:00</option>
            <option>18:30</option>
            <option>19:00</option>
            <option>19:30</option>
            <option>20:00</option>
            <option>20:30</option>
            <option>21:00</option>
            <option>21:30</option>
            <option>22:00</option>
            <option>22:30</option>
            <option>23:00</option>
          </select>
          <select class="number" name="number">
            <option></option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
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
