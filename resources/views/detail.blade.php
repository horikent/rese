

<style>


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
  <h2>rese</h2>
  <div class="detail__container">
    <div class="detail__item">
      <h2>{{$shop->name}}</h2>
      <img src="{{asset($shop->image)}}" alt="">
      <p>##{{$shop->area->area}}&emsp;##{{$shop->genre->genre}}</p>
      <p>{{$shop->detail}}</p><br>
    </div>
    <div class=resevation__form>
      <h2>予約</h2>
        <form action="/add/reservation" method="post">
        @csrf 
          <input type="date" name="date" value="date">
          <input type="time" name="time" value="time">
          <input type="number" name="number" min=1 value="number">人
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="shop_id" value="{{$shop->id}}">
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
                <td><p id="output_time"></p></td>              </tr>
              <tr>
                <th>Number</th>
                <td><p id="output_number">人</p></td>
              </tr>
            </table>
          <input type="submit" value="予約する">
      </form>
    </div>
  </div>
  <script src="{{ asset('/js/rese.js') }}"></script>
</body>
</html>