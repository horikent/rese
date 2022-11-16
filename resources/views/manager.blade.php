@extends('layouts.app')

@section('header')
  <header class="header flex-item">
    <div class="header__container flex-item">
@endsection    

@section('content')
  </header>
    <div class="register__Page">
      <div class="register__container">
      <h4 class="register__title">&emsp;店舗代表者用：店舗登録画面</h4>
          <form action="/add/shop" method="post">
            @csrf
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <input class="form-control" placeholder="店名をご記入ください" type="text" name="name" required autofocus><br>
                  @if ($errors->has('name'))
                      <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="area">
                <select name="area_id" class=register__area>
                  <option value="">エリア：ご選択ください▼</option>
                  @foreach($areas as $area)
                    <option value="{{$area->id}}">{{$area->area}}</option>
                  @endforeach
                </select>  
              </div>
              <div class="genre">
                <select name="genre_id" class=register__genre>
                  <option value="">ジャンル：ご選択ください▼</option>
                  @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->genre}}</option>
                  @endforeach
                </select>  
              </div>
              <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                  <input class="form-control" placeholder="店舗詳細情報をご記入ください" type="textarea" name="detail" required><br>
                      @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('detail') }}</strong>
                      </span>
                      @endif
              </div>
              <input type="hidden" name="user_id" value="{{$id}}">
              <input type="submit" name="commit" value="登録" class="register__Btn">
          </form>
      </div><br><br><br>    
      @foreach($managements as $management) 
        <div class="register__container">
          @if(isset($management))
          <h4 class="register__title">&emsp;店舗登録履歴</h4>
            <form action="/edit/shop" method="post">
              @csrf
              <input type="text" name="name" class="edit__info" value="{{$management->name}}"><br> 
              <select name="area_id" class="edit__info">
                @foreach($areas as $area)
                  <option value="{{$area->id}}" 
                    @if($area->id === $management->area_id) selected @endif>{{$area->area}}</option>
                @endforeach
              </select>
              <select name="genre_id" class="edit__info">
                @foreach($genres as $genre)
                  <option value="{{$genre->id}}"                   
                    @if($genre->id === $management->genre_id) selected @endif>{{$genre->genre}}</option>
                @endforeach
              </select><br>     
              <input type="textarea" name="detail" class="edit__detail" value="{{$management->detail}}">
              <input type="hidden" name="user_id" value="{{$management->user_id}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}"><br><br>
  
              <button type="submit" class="edit__btn">店舗情報変更</button>       
          </div>   
          @endif  
        </div>
      @endforeach
    </div>        
    @foreach($managements as $management) 
      @foreach($reservations as $reservation)
        @if($management->id === $reservation->shop->id)
          <div class="reservation-manager">
              <h3 class="reservation__ttl">予約状況</h3>
                <div class="reservation__item-manager">
                  <p class="count">予約{{$loop->iteration}}</p>
                  <table class="myreservation__table">
                    <tr>
                      <th class="reservation__th">Shop</th>
                      <td>{{$reservation->shop->name}}</td>
                    </tr>
                    <tr>
                      <th class="reservation__th">Datetime</th>
                      <td>{{$reservation->datetime}}</td>
                    </tr>
                    <tr>
                      <th class="reservation__th">Number</th>
                      <td> {{$reservation->number}}</td>
                    </tr>
                  </table>       
                </div>
            </div>
          @endif
        @endforeach
      @endforeach
@endsection