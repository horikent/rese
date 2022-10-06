<style>

.shop__container {
  column-count: 4;
  width: 92%;
  margin: 0 auto
}
.item{
  break-inside: avoid;
  text-align: center;
}
.item img{
  width: 100%;
  margin-top: 30px;
}

//サーチアイコン

.search_box {
  display: inline-block; /* なくても大丈夫だけど、念の為 */
  position: relative;    /* 基準値とする */
}

.search_box::before {
  content: "";           /* 疑似要素に必須 */
  width: 16px;           /* アイコンの横幅 */
  height: 16px;          /* アイコンの高さ */
  background: url(img/magnifying_glass.png) no-repeat center center / auto 100%; /* 背景にアイコン画像を配置 */
  display: inline-block; /* 高さを持たせるためにインラインブロック要素にする */
  position: absolute;    /* 相対位置に指定 */
  top: 145px;              /* アイコンの位置。微調整してね */
  left: 15px;             /* アイコンの位置。微調整してね */
}

.search_box input {
  padding: 3px 0 3px 2em; /* アイコンを設置するため左の余白を多めに指定*/
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

.red-heart{
  color:red;
}
.grey-heart{
  color:grey;
}

</style>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<p>{{Auth::user()->name}}さん</p>

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
    </div>  
  </header>
  <div>
    <h4>予約状況</h4>
      @foreach($reservations as $reservation)
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
      @endforeach
  </div>
  <div>
    <h4>お気に入り店舗</h4>
      @foreach($favorites as $favorite)
        <div>
          <img src="{{$favorite->shop->image}}" alt="">
          <h2>{{$favorite->shop->name}}</h2>
          <p>## {{$favorite->shop->area->area}}</p>
          <p>## {{$favorite->shop->genre->genre}}</p>
          <button>
            <a href="{{ route('detail', ['shop_id' => $favorite->shop->id ]) }}">詳しくみる</a>
          </button>
        </div>
      @endforeach
  </div>
</div>  
  <script src="{{ asset('/js/rese.js') }}"></script>
</body>
</html>