@extends('layouts.default')
@section('content')

<div class="row">
  <div class="demo-type-example col">
    <img src="/images/sukeru_top2.png" alt="example-image" class="img-rounded img-fluid">
    <p class="img-comment"><strong>SUKERUは、"お手伝いが必要な人" と "お手伝いをしたい人"をつなぐサービスです。</strong></p>
  </div>
</div>

<hr class="m-3">

<div class="row">
  <div class="d-flex justify-content-center sub-description col">
    <h3>こんな人たちに使ってほしい</h3>
  </div>
</div>
<div class="row m-3">
  <div class="col-sm-12">
    <div class="media">
      <img class="mr-3" src="/images/youtsu_nouka.png">
      <div class="media-body">
        <h5 class="text-capitalize">収穫期で大忙しの農家さん</h5>
        <p>収穫期で猫の手でも借りたいそんな時。SUKERUで助けを求めましょう！！</p>
      </div>
    </div>

    <hr class="m-3">

    <div class="media">
      <div class="media-body">
        <h5 class="text-capitalize">新しいレジャーを求める人</h5>
        <p>田舎での農作業体験。これはまさしく新しいレジャーなのです。旅行前にSUKERUをチェック！！</p>
      </div>
      <img class="mr-3" src="/images/travel_happy_men.png">
    </div>
  </div>
</div>

@endsection
