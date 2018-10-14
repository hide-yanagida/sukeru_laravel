@extends('layouts.default')
@section('content')

<div class="container">
  <div class="panel-body">
      <ul class="nav nav-tabs nav-justified">
          <li class="m-1 active"><a data-toggle="tab" href="#home">SUKERU一覧</a></li>
          <li class="m-1"><a data-toggle="tab" href="#menu2">投稿一覧</a></li>
      </ul>
      <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div class="row m-3">
              <div class="card-deck">

                <div class="card border-success">
                  <figure class="figure p-1">
                    <img class="figure-img img-fluid" src="images/sukeru_top2.png">
                  </figure>
                  <hr>
                  <div class="card-body p-1">
                    <p class="card-text">イモ掘り</p>
                    <p class="card-text">岩手県盛岡市</p>
                    <p class="card-text">9/30〜11/30</p>
                  </div>

                  <div class="card-footer">
                    <button class="btn btn-primary">
                      SUKERU!!
                    </button>
                    <a data-toggle="modal" data-target="#exampleModalLong" href="">5</a>
                  </div>
                </div>

                <div class="card border-success">
                  <figure class="figure p-1">
                    <img class="figure-img img-fluid" src="images/sukeru_top2.png">
                  </figure>
                  <hr>
                  <div class="card-body p-1">
                    <p class="card-text">人参の収穫作業</p>
                    <p class="card-text">秋田県秋田市</p>
                    <p class="card-text">9/30〜11/30</p>
                  </div>

                  <div class="card-footer">
                    <button class="btn btn-primary">
                      SUKERU!!
                    </button>
                    <a data-toggle="modal" data-target="#exampleModalLong" href="">5</a>
                  </div>
                </div>

                <div class="card border-success">
                  <figure class="figure p-1">
                    <img class="figure-img img-fluid" src="images/sukeru_top2.png">
                  </figure>
                  <hr>
                  <div class="card-body p-1">
                    <p class="card-text">草取り</p>
                    <p class="card-text">青森県青森市</p>
                    <p class="card-text">9/30〜11/30</p>
                  </div>

                  <div class="card-footer">
                    <button class="btn btn-primary">
                      SUKERU!!
                    </button>
                    <a data-toggle="modal" data-target="#exampleModalLong" href="">5</a>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div id="menu2" class="tab-pane fade">
            <div class="row m-3">
              <div class="card-deck">

                <div class="card border-success">
                  <figure class="figure p-1">
                    <img class="figure-img img-fluid" src="images/sukeru_top2.png">
                  </figure>
                  <hr>
                  <div class="card-body p-1">
                    <p class="card-text">イモ掘り</p>
                    <p class="card-text">岩手県盛岡市</p>
                    <p class="card-text">9/30〜11/30</p>
                  </div>

                  <div class="card-footer">
                    <button class="btn btn-primary">
                      SUKERU!!
                    </button>
                    <a data-toggle="modal" data-target="#exampleModalLong" href="">5</a>
                  </div>
                </div>

                <div class="card border-success">
                  <figure class="figure p-1">
                    <img class="figure-img img-fluid" src="images/sukeru_top2.png">
                  </figure>
                  <hr>
                  <div class="card-body p-1">
                    <p class="card-text">人参の収穫作業</p>
                    <p class="card-text">秋田県秋田市</p>
                    <p class="card-text">9/30〜11/30</p>
                  </div>

                  <div class="card-footer">
                    <button class="btn btn-primary">
                      SUKERU!!
                    </button>
                    <a data-toggle="modal" data-target="#exampleModalLong" href="">5</a>
                  </div>
                </div>

                <div class="card border-success">
                  <figure class="figure p-1">
                    <img class="figure-img img-fluid" src="images/sukeru_top2.png">
                  </figure>
                  <hr>
                  <div class="card-body p-1">
                    <p class="card-text">草取り</p>
                    <p class="card-text">青森県青森市</p>
                    <p class="card-text">9/30〜11/30</p>
                  </div>

                  <div class="card-footer">
                    <button class="btn btn-primary">
                      SUKERU!!
                    </button>
                    <a data-toggle="modal" data-target="#exampleModalLong" href="">5</a>
                  </div>
                </div>

              </div>
            </div>
          </div>

      </div>
  </div>
</div>

<!-- SUKERU!!した人のリスト -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">SUKERU！！のリスト</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2">
              <figure class="figure">
                <img class="figure-img img-fluid" src="images/user-avatar-main-picture.png">
              </figure>
            </div>
            <div class="col-md-5"><p class="col-xs-8">すける一郎</p></div>
            <div class="col-md-2">
              <a href="https://www.facebook.com/"><span class="fui-facebook col-xs-2"></span></a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              <figure class="figure">
                <img class="figure-img img-fluid" src="images/user-avatar-main-picture.png">
              </figure>
            </div>
            <div class="col-md-5"><p class="col-xs-8">すける二郎</p></div>
            <div class="col-md-2">
              <a href="https://www.facebook.com/"><span class="fui-facebook col-xs-2"></span></a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              <figure class="figure">
                <img class="figure-img img-fluid" src="images/user-avatar-main-picture.png">
              </figure>
            </div>
            <div class="col-md-5"><p class="col-xs-8">すける三郎</p></div>
            <div class="col-md-2">
              <a href="https://www.facebook.com/"><span class="fui-facebook col-xs-2"></span></a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              <figure class="figure">
                <img class="figure-img img-fluid" src="images/user-avatar-main-picture.png">
              </figure>
            </div>
            <div class="col-md-5"><p class="col-xs-8">すける四郎</p></div>
            <div class="col-md-2">
              <a href="https://www.facebook.com/"><span class="fui-facebook col-xs-2"></span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection
