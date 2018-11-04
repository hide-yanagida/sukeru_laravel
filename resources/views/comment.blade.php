@extends('layouts.default')
@section('content')

  <div class="row mb-2">
    <div class="col-md-3"></div>
    <div class="card border-success col-md-6 ">
      <figure class="figure p-1">
        @if ($content['filename'] == '')
          <img class="figure-img img-fluid" src="{{ asset('/storage/noimage.png') }}">
        @else
          <img class="figure-img img-fluid" src="{{ asset('/storage/' . $content['filename']) }}">
        @endif
      </figure>
      <hr>
      <div class="card-body p-1">

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2">
              <figure class="figure">
                <img class="figure-img img-fluid" src="{{$content['owner']['avatar']}}">
              </figure>
            </div>
            <div class="col-md-5"><p>{{$content['owner']['name']}}</p></div>
            <div class="col-md-2">
              <a href="{{$content['owner']['link']}}" target="_blank"><span class="fui-facebook col-xs-2"></span></a>
            </div>
          </div>
        </div>

        <p class="card-text">{{$content['overview']}}</p>
        <p class="card-text">{{$content['place']}}</p>
        <p class="card-text">{{ date("Y/m/d", $content['date_from']) }} 〜 {{ date("Y/m/d", $content['date_to']) }}</p>
      </div>

      <div class="card-footer">
          @if ($content['liked'] == 0)
            <button class="btn btn-default like_btn">SUKERU!!</button>
          @else
            <button class="btn btn-primary unlike_btn">SUKERU!!</button>
          @endif

          <input type="hidden" name="content_id" value="{{ $content['id'] }}">
          <a class="like_count" data-toggle="modal" data-target="#exampleModalLong" href="">{{ $content['count'] }}</a>

      </div>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-md-3"></div>
    <div class="col-md-6 card">
      <div class="card-body">
        <form action="{{ url('/comment/add')}}" method="POST"  class="form-horizontal">
          {{ csrf_field() }}
          <div class="form-froup">
            <label for="comment"><h5>コメント</h5></label>
            <!--<input type="text" class="form-control" id="comment" name="comment" />-->
            <textarea class="form-control" id="comment" name="comment"></textarea>
            <input type="hidden" name="content_id" value="{{$content['id']}}">
            <button type="submit" class="btn btn-primary">コメント投稿</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @foreach ($comments as $comment)
    <div class="row mb-2">
      <div class="col-md-3"></div>
      <div class="col-md-6 card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-2">
              <figure class="figure">
                <img class="figure-img img-fluid" src="{{ $comment['user']['avatar'] }}">
              </figure>
            </div>
            <div class="col-md-5"><p>{{$comment['user']['name']}}</p></div>
            <div class="col-md-2">
              <a href="{{$comment['user']['link']}}" target="_blank"><span class="fui-facebook col-xs-2"></span></a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <p class="card-text">{{$comment['comment']}}</p>
        </div>
      </div>
    </div>
  @endforeach

@endsection
