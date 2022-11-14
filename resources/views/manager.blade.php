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
                  <input class="form-control" placeholder="店名をご記入ください" type="text" name="name" value="{{ old('name') }}" required autofocus><br>
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
              <div class="genre" class=register__genre>
                <select name="genre_id">
                  <option value="">ジャンル：ご選択ください▼</option>
                  @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->genre}}</option>
                  @endforeach
                </select>  
              </div>
              <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                  <input class="form-control" placeholder="店舗詳細情報をご記入ください" autocomplete="detail" type="textarea" name="detail" required><br>
                      @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('detail') }}</strong>
                      </span>
                      @endif
              </div>
              <input type="submit" name="commit" value="登録" class="register__Btn">
          </form>
      </div>    
    </div>        
@endsection