
@extends('layouts.app')


@section('header')
  <header class="header flex-item">
    <div class="header__container flex-item">
@endsection    

@section('content')
    <form action="/search" class="search__var flex-item" method="post">
      @csrf  
      @if($errors->has('name'))
        <tr>
          <th>ERROR</th>
          <td>
            {{$errors->first('task')}}
          </td>
        </tr>
      @endif  
        @csrf 
        <select name="area_id" class="search__area">
          <option value="">All area</option>
          <option value="1">東京都</option>
          <option value="2">大阪府</option>
          <option value="3">福岡県</option>
        </select>   
        @csrf 
        <select name="genre_id" class="search__genre">
          <option value="">All genre</option>
          <option value="1">寿司</option>
          <option value="2">焼肉</option>
          <option value="3">居酒屋</option>
          <option value="4">イタリアン</option>
          <option value="5">ラーメン</option>
        </select>  
        @csrf 
        <input name="name" class="search__name" type="text" placeholder="🔍 search..." onchange="this.form.submit()">
    </form>
  </header>
    <div class="shop__container">
    @if($shops->isEmpty())
      <p>検索結果は0件です</p>  
    @else   
      @foreach($shops as $shop)   
          <div class="shop__item">
            <div class="shop__image">
              <img src="{{$shop->image}}" alt="">
            </div>          
            <div class="shop__title">
              <h2>{{$shop->name}}</h2>
              <p>#{{$shop->area->area}}&emsp;#{{$shop->genre->genre}}</p>
            </div>           
            <div class="shop__btn flex-item">
              <button class="detail__btn"><a href="{{ route('detail', ['shop_id' => $shop->id ]) }}">詳しくみる</a></button>
              @auth
                @if(is_null($favorites))
                  <form action="/add/favorite" method="post">
                  @csrf
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <button type="submit"><span class="heart">🤍</span></button>
                  </form>            
                @elseif($favorites->exists(Auth::id(), $shop->id))
                  <form action="/delete/favorite" method="post">
                  @csrf 
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="id" value="{{$favorites->id}}">
                    <button type="submit" class="heart">❤️</button>
                  </form>   
                @else  
                  <form action="/add/favorite" method="post">
                  @csrf
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <button type="submit" class="heart">🤍</button>
                  </form>  
                @endif  
              @endauth
              @guest
                <a href="/register"><button  class="heart">🤍</button></a>
              @endguest  
            </div>  
          </div>
      @endforeach  
    @endif
    </div>
@endsection

