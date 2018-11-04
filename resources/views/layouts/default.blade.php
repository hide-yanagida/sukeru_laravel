<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>SUKERU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Loading Flat UI Pro -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/flat-ui.css" rel="stylesheet">
    <link href="/css/common.css" rel="stylesheet">
    <link href="/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/favicon.ico">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125823782-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-125823782-2');
    </script>

  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col">
          <nav class="navbar navbar-inverse navbar-embossed navbar-expand-lg" role="navigation">
            <a class="navbar-brand" href="/">SUKERU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-01"></button>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
              @auth
              <ul class="nav navbar-nav mr-auto">
                <li><a href="/mypage"><span class="fui-user"></span>MyPage</a></li>
              </ul>
              <ul class="nav navbar-nav">
                <li><a data-toggle="modal" data-target="#exampleModal" href=""><span class="fui-new"></span>Post</a></li>
                <li><a href="/logout">Logout</a></li>
              </ul>
              @endauth

              @guest
              <ul class="nav navbar-nav mr-auto"></ul>
              <ul class="nav navbar-nav">
                <li><a href="login/facebook">
                  <button class="btn btn-social-facebook">
                    <span class="fui-facebook"></span> facebookでログイン
                  </button></a>
                </li>
              </ul>
              @endguest

            </div><!-- /.navbar-collapse -->
          </nav><!-- /navbar -->
        </div>
      </div>

	  @yield('content')

    </div>
    <footer class="py-5">
      <div class="container">

        <a href="https://twitter.com/shiwataro1?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @shiwataro1</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <p class="m-0 text-center">Copyright &copy; Hanamaki Hackathon 2018</p>
      </div>
    </footer>

    <!-- モーダル(投稿フォーム) -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">リクエスト投稿</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="{{ url('/content/add')}}" method="POST"  class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-froup">
                  <label for="overview">作業概要</label>
                  <input type="text" placeholder="例) 人参の収穫作業" class="form-control" id="overview" name="overview" />
                </div>

                <div class="form-froup">
                  <label for="place">作業場所</label>
                  <input type="text" placeholder="例) 岩手県盛岡市" class="form-control" id="place" name="place" />
                </div>

                <div class="form-froup">
                  <label for="day">作業日時</label>
                  <input type="text" class="form-control date-picker" id="date_from" readonly="readonly" name="date_from" />
                  <input type="text" class="form-control date-picker" id="date_to" readonly="readonly" name="date_to"/>

                </div>

                <div class="form-group">
                    <label class="form-group-btn">
                        <span class="btn btn-primary">
                            参考画像<input class="form-control" type="file" name="image" style="display:none">
                        </span>
                    </label>
                    <input type="text" class="form-control" readonly="">
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">投稿</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- モーダル1(SUKERU!!した人のリスト) -->
    <div class="modal fade like_list_modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">SUKERU！！したユーザ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid like_list"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap 4 requires Popper.js -->
    <script src="/js/app.js"></script>
    <script src="https://unpkg.com/popper.js@1.14.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="/js/flat-ui.js"></script>
    <script src="/js/application.js"></script>
    <script src="/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/common.js"></script>

    <script type="text/javascript">
      if (window.location.hash && window.location.hash == '#_=_') {
          window.location.hash = '';
      }
    </script>
  </body>
</html>
