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

</style>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rese</title>
</head>
<header class="shop__header">
  <div class="header__container">
    <h2>Rese</h2>
    <div class=search__var></div>
      <input type="hidden" name="area">
        <p>All area</p>
      <input type="hidden" name="genre">
        <p>All genre</p>
      <input type="text">
    </div>
  </div>  
</header>

<body>
  <div class="shop__container">
    <div class="item">
      @foreach($shops as $shop)
        <img src="{{$shop->image}}" alt="">
        <h2>{{$shop->name}}</h2>
        <p>## {{$shop->area}}</p>
        <p>## {{$shop->genre}}</p>
        <button><a href="{{ route('detail', ['shop_id' => $shop->id ]) }}">詳しくみる</a></button>
        @endforeach
    </div>
  </div>
</body>
</html>