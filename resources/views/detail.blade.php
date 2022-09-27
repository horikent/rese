<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

<h2>rese</h2>
</head>
<body>
  <div class="detail__container">
    <div class="detail__item">
      <h2>{{$shop->name}}</h2>
      <img src="{{$shop->image}}" alt="">
      <p>##{{$shop->area}}&emsp;##{{$shop->genre}}</p>
      <p>{{$shop->detail}}</p><br>
    </div>
    <div class=resevation__form>
      <h2>予約</h2>
        <form action="">
          <input type="date">
          <input type="time">
          <input type="number">
          <input type="submit">
        </form>
    </div>
  </div>
</body>
</html>