@extends('layouts.admin')

@section('content')
  <div class="done__container">
    <p>ご登録ありがとうございます。</p><br>
    <button class="complete__btn">
      @if($manager == 1)
        <a href="/manager">戻る</a> 
      @else
        <a href="/admin">戻る</a>  
      @endif
    </button>
  </div>
@endsection