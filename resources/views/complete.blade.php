@extends('layouts.admin')

@section('content')
  <div class="done__container">
    <p>ご登録ありがとうございます。</p>
    @if($admin === 1)
      <button class="complete__btn"><a href="/admin">戻る</a></button>
    @else
      <button class="complete__btn"><a href="/manager">戻る</a></button>
    @endif
  </div>
@endsection