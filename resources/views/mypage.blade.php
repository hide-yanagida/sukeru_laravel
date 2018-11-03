@extends('layouts.default')
@section('content')

<div class="container">
  <div class="panel-body">
      <ul class="nav nav-tabs nav-justified">
          <li class="m-1 active"><a data-toggle="tab" href="#home">SUKERU!!</a></li>
          <li class="m-1"><a data-toggle="tab" href="#menu2">投稿</a></li>
      </ul>
      <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div class="row m-3">
              @foreach ($sukeru as $item)
                <div class="card border-success col-md-4 mb-2">
                  <figure class="figure p-1">
                    @if ($item['filename'] == '')
                      <img class="figure-img img-fluid" src="{{ asset('storage/noimage.png') }}">
                    @else
                      <img class="figure-img img-fluid" src="{{ asset('storage/' . $item['filename']) }}">
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
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          <div id="menu2" class="tab-pane fade">
            <div class="row m-3">
              @foreach ($my_contents as $item)
                <div class="card border-success col-md-4 mb-2">
                  <figure class="figure p-1">
                    @if ($item['filename'] == '')
                      <img class="figure-img img-fluid" src="{{ asset('storage/noimage.png') }}">
                    @else
                      <img class="figure-img img-fluid" src="{{ asset('storage/' . $item['filename']) }}">
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
                  </div>
                </div>
              @endforeach
            </div>
          </div>

      </div>
  </div>
</div>

@endsection
