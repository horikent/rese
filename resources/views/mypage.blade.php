<style>

header{
  width:100%;
}

body{
  background:rgb(238,238,238);
}

.shop__item{
  break-inside: avoid;
  text-align: center;
  margin-bottom:10px;
  background:white;
  border-radius:10px;
  box-shadow: 5px 5px 5px 0 rgba(0, 0, 0, .5);
}
.shop__item img{
  border-top-left-radius:10px;
  border-top-right-radius:10px;
  width: 100%;
}


.logo{
  color:#2F5CFF;
}



.flex-item{
  display:flex;
}

.reservation__container{
  width:45%;
  text-align:right;
  margin:0 5%;
}
.reservation__item{
  width:100%;
  background:#2F5CFF;
  margin-bottom:10px;
  height:200px;
  border-radius:5px;
}

table{
  padding:5px;
  color:white;
}
.favorite__container{
  width:45%;
  margin:0 5%;
}
.favorite__items {
  column-count: 2;
  width: 100%;
  margin: 0 auto
}

.favorite-ttl{
  width:100%;
}
//ハンバーガーメニュー、ドロワーメニュー

a{
  text-decoration: none;
  color: blue
}
.nav{
  position: absolute;
  height: 100vh;
  width: 100%;
  left: -100%;
  background: #eee;
  transition: .7s;
  text-align: center;
}
.nav ul{
  padding-top: 80px;
}
.nav ul li{
  list-style-type: none;
  margin-top: 50px;
}
.menu {
  display: inline-block;
  width: 36px;
  height: 32px;
  cursor: pointer;
  position: relative;
  left: 20px;
  top: 20px;
}
.menu__line--top,
.menu__line--middle,
.menu__line--bottom {
  display: inline-block;
  width: 100%;
  height: 4px;
  background-color: #000;
  position: absolute;
  transition: 0.5s;
}
.menu__line--top {
  top: 0;
}
.menu__line--middle {
  top: 14px;
}
.menu__line--bottom {
  bottom: 0;
}
.menu.open span:nth-of-type(1) {
  top: 14px;
  transform: rotate(45deg);
}
.menu.open span:nth-of-type(2) {
  opacity: 0;
}
.menu.open span:nth-of-type(3) {
  top: 14px;
  transform: rotate(-45deg);
}
.in{
  transform: translateX(100%);
}

//

button{
  border:none;
  background:none;
}

.shop__btn{
  width:70%;
  height:40px;
  margin-left:15%;
  justify-content:space-between;
}
.detail__btn{
  background:#2F5CFF;
  border-radius:5px;
  padding:0 8px;
}
.heart{
  font-size:30px;
}
</style>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rese</title>
</head>
<body>
  <header class="shop__header">
    <div class="header__container">
      <nav class="nav" id="nav">
        @auth
        <ul>
          <li><a href="/">HOME</a></li>
          <form action="/logout" method="post">
            @csrf 
            <li><input type="submit" value="LOGOUT"></a></li>
          </form>
          <li><a href="/mypage">MYPAGE</a></li>
        </ul>
        @endauth
        @guest
        <ul>
          <li><a href="/">HOME</a></li>
          <li><a href="/register">REGISTRATION</a></li>
          <li><a href="/login">LOGIN</a></li>
        </ul>
        @endguest
      </nav>
      <div class="menu" id="menu">
        <span class="menu__line--top"></span>
        <span class="menu__line--middle"></span>
        <span class="menu__line--bottom"></span>
      </div>
      <h2 class="logo">Rese</h2>
    </div>  
  </header><br>
<div class="mypage__container flex-item">  
  <div class="reservation__container">
    <h3>予約状況</h3>
      @foreach($reservations as $reservation)
        <div class="reservation__item">
          <form action="/delete/reservation"  method="post">
            @csrf  
            <input type="hidden" name="id" value="{{$reservation->id}}">
            <input type="submit" value="❌">
          </form>  
          <table>
            <tr>
              <th>Shop</th>
              <td>{{$reservation->shop->name}}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td>{{$reservation->date}}</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>{{$reservation->time}}</td>
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
    <div class="favorite__items">
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
              <input type="hidden" name="shop_id" value="{{$favorite->shop->id}}">
              <button type="submit"><span class="heart">❤️</span></button>
            </form>   
          </div>  
        </div>
      @endforeach
    </div>
  </div>
</div>  
  <script src="{{ asset('/js/rese.js') }}"></script>
</body>
</html>