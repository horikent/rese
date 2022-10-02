<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
nameさん

<div>
  <div>
    <h4>予約状況</h4>
    <button>
      <form action="/delete" method="post">
      @csrf  
      </form>
    </button>
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
        <td>{{$reservation->number}}</td>
      </tr>
    </table>
  </div>
  <div>
    <h4>お気に入り店舗</h4>
  </div>
</div>  
</body>
</html>