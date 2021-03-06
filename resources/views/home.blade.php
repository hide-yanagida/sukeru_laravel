@extends('layouts.default')
@section('content')
<!--
<div class="border m-3 p-3">
  <h3 class="demo-panel-title">絞り込み</h3>
  <div class="row">
    <div class="col-md-4">
      <select class="form-control select select-primary" data-toggle="select">
        <option value="0">北海道</option>
        <option value="1">青森県</option>
        <option value="2" selected>岩手県</option>
        <option value="3">秋田県</option>
        <option value="4">宮城県</option>
        <option value="5">福島県</option>
      </select>
    </div>

    <div class="col-md-4">
      <div class="form-group has-success">
        <input type="text" value="" placeholder="日にち" class="form-control" />
        <span class="input-icon fui-check-inverted"></span>
      </div>
    </div>

    <div class="col-md-2"></div>

    <div class="col-md-2">
      <a href="#fakelink" class="btn btn-primary"><span class="fui-search"></span>Search</a>
    </div>
  </div>
</div>
-->

<div class="row m-3">

    @foreach ($contents as $item)
      <div class="card border-success col-md-4 mb-2">
        <figure class="figure p-1">
          @if ($item['filename'] == '')
            <img class="figure-img img-fluid" src="{{ asset('/storage/noimage.png') }}">
          @else
            <img class="figure-img img-fluid" src="{{ asset('/storage/' . $item['filename']) }}">
          @endif
        </figure>
        <hr>
        <div class="card-body p-1">
          <!--<p class="card-text">{{$item['owner']['name']}}</p>-->

          <div class="container-fluid">
            <div class="row">
              <div class="col-md-2">
                <figure class="figure">
                  <img class="figure-img img-fluid" src="{{$item['owner']['avatar']}}">
                </figure>
              </div>
              <div class="col-md-5"><p>{{$item['owner']['name']}}</p></div>
              <div class="col-md-2">
                <a href="{{$item['owner']['link']}}" target="_blank"><span class="fui-facebook col-xs-2"></span></a>
              </div>
            </div>
          </div>

          <p class="card-text">{{$item['overview']}}</p>
          <p class="card-text">{{$item['place']}}</p>
          <p class="card-text">{{ date("Y/m/d", $item['date_from']) }} 〜 {{ date("Y/m/d", $item['date_to']) }}</p>
        </div>

        <div class="card-footer">
            @if ($item['liked'] == 0)
              <button class="btn btn-default like_btn">SUKERU!!</button>
            @else
              <button class="btn btn-primary unlike_btn">SUKERU!!</button>
            @endif

            <input type="hidden" name="content_id" value="{{ $item['id'] }}">
            <a class="like_count" data-toggle="modal" data-target="#exampleModalLong" href="">{{ $item['count'] }}</a>
            <a href="/comment/{{ $item['id'] }}">詳細</a>
        </div>
      </div>
    @endforeach

</div>


@endsection
