
@extends('layouts.app')


@section('header')
  <header class="shop__header">
    <div class="header__container flex-item">
@endsection    

@section('content') 
  </header>  
  <div class="done__container">
    <p>ご登録ありがとうございます。</p>
    <button class="complete__btn" onClick="history.back();">戻る</button>
  </div>
@endsection