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
          <li><a href="/logout">LOGOUT</a></li>
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
      <h2>Rese</h2>
      <div class=search__var></div>
        <form action="/search" method="post">
        @csrf  
        @if($errors->has('name'))
          <tr>
            <th>ERROR</th>
            <td>
              {{$errors->first('task')}}
            </td>
          </tr>
        @endif  
          <select name="area"  onchange="this.form.submit()">
            <option value="">All area</option>
            <option value="東京都">東京都</option>
            <option value="大阪府">大阪府</option>
            <option value="福岡県">福岡県</option>
          </select>   
          <select name="genre" onchange="this.form.submit()">
            <option value="">All genre</option>
            <option value="寿司">寿司</option>
            <option value="焼肉">焼肉</option>
            <option value="居酒屋">居酒屋</option>
            <option value="イタリアン">イタリアン</option>
            <option value="ラーメン">ラーメン</option>
          </select>  
          <div class="search_box">
            <input name="name" type="text" placeholder="search..." onchange="this.form.submit()">
          </div>
        </form>
      </div>
    </div>  
  </header>
  <div class="shop__container">
    <div class="item">
      @foreach($shops as $shop)
        <img src="{{$shop->image}}" alt="">
        <h2>{{$shop->name}}</h2>
        <p>## {{$shop->area->area}}</p>
        <p>## {{$shop->genre->genre}}</p>
        <button><a href="{{ route('detail', ['shop_id' => $shop->id ]) }}">詳しくみる</a></button>
      @endforeach  
    </div>
  </div>
  <script src="{{ asset('/js/rese.js') }}"></script>
</body>
</html>