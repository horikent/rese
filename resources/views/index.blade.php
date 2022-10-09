<style>
body{
  background:rgb(238,238,238);
}
.header__container{
  width:90%;
}
.shop__container {
  column-count: 4;
  width: 92%;
  margin: 0 auto
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
.flex-item{
  display:flex;
}

.logo{
  color:#2F5CFF;
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
  text-decoration:none; 
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
  background:#2F5CFF;
}
.menu__line--top,
.menu__line--middle,
.menu__line--bottom {
  display: inline-block;
  height: 2px;
  left:6px;
  background-color: white;
  position: absolute;
  transition: 0.5s;
}
.menu__line--top {
  top: 8;
  width: 32%;
}
.menu__line--middle {
  top: 15px;
  width: 64%;
}
.menu__line--bottom {
  bottom: 8;
  width: 16%;
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
  background:white;
}
.detail__btn{
  background:#2F5CFF;
  border-radius:5px;
  padding:0 8px;
}

.shop__btn{
  width:70%;
  height:40px;
  margin-left:15%;
  justify-content:space-between;
}
.heart{
  font-size:30px;
  background:none; 
  text-decoration:none;
  border:none;
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
  <header class="header flex-item">
    <div class="header__container">
      <div class="header__nav">
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
      <h2 class="logo">Rese</h2>
    </div>
    <div class="search__var flex-item"></div>
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
        <select name="area_id"  onchange="this.form.submit()">
          <option value="">All area</option>
          <option value="1">東京都</option>
          <option value="2">大阪府</option>
          <option value="3">福岡県</option>
        </select>   
        <select name="genre_id" onchange="this.form.submit()">
          <option value="">All genre</option>
          <option value="1">寿司</option>
          <option value="2">焼肉</option>
          <option value="3">居酒屋</option>
          <option value="4">イタリアン</option>
          <option value="5">ラーメン</option>
        </select>  
        <input name="name" type="text" placeholder="search..." onchange="this.form.submit()">
      </form>
    </div>
  </header>
  <div class="shop__container">
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
              <a href="/register"><span class="heart">🤍</span></a>
            @endguest  
          </div>  
        </div>
      @endforeach  
  </div>
  <script src="{{ asset('/js/rese.js') }}"></script>
</body>
</html>