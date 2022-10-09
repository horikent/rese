<style>

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
  </header>  
  <div class="done__container">
    <p>ご予約ありがとうございます</p>
    <button class="login__btn"><a href="/">戻る</a></button>
  </div>
  <script src="{{ asset('/js/rese.js') }}"></script>
</body>
</html>