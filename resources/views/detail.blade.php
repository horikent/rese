

<style>
.logo{
  color:#2F5CFF;
}
body{
  background:rgb(238,238,238);
}
.detail{
  width:100%;
  justify-content:center;
  margin-top:5%;
}
.flex-item{
  display:flex;
}

.detail__container{
  width:40%;
  margin:0 3%;
}

.detail__container-small{
  text-align: center;
  margin-bottom:10px;
  width:90%;
}
img{
  width: 100%;
}
.reservation__container{
  margin:0 3%;
  padding:5% 0 0 5%;
  width:35%;
  background:#2F5CFF;
  color:white;
}
table{
  color:white;
  width:90%;
  background:rgb(84,128,247);
  text-align:left;
}

.register__btn{
  position:absolute;
  top:575px;
  height:50px;
  width:39%;
  left:53%;
  text-align:center;
  color:white;
  cursor:pointer;
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
<div class="detail flex-item">  
  <div class="detail__container">
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
    <div class="detail__container-small">
      <div class="shop__name">
        <h2>{{$shop->name}}</h2>
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
        <input type="date" name="date" value="date"><br>
        <input type="time" name="time" value="time"><br>
        <input type="number" name="number" min=1 value="number">人<br>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="shop_id" value="{{$shop->id}}"><br>
          <table>
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
  <script src="{{ asset('/js/rese.js') }}"></script>
</div>  
</body>
</html>