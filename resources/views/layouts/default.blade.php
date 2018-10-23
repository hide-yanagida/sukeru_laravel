<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>SUKERU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Loading Flat UI Pro -->
    <link href="css/app.css" rel="stylesheet">
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/common.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet">
    bootstrap-datepicker3.standalone.min.css.map
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
                <li data-toggle="modal" data-target="#exampleModal"><a><span class="fui-new"></span>Post</a></li>
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

          <form action="{{ url('request/add')}}" method="POST"  class="form-horizontal">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-froup">
                  <label for="overview">作業概要</label>
                  <input type="text" placeholder="例) 人参の収穫作業" class="form-control" id="overview" name="test" />
                </div>

                <div class="form-froup">
                  <label for="place">作業場所</label>
                  <input type="text" placeholder="例) 岩手県盛岡市" class="form-control" id="place" />
                </div>

                <div class="form-froup">
                  <label for="day">作業日時</label>
                  <input type="text" class="form-control date-picker" id="date_from" readonly="readonly"/>
                  <input type="text" class="form-control date-picker" id="date_to" readonly="readonly"/>

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

    <!-- Bootstrap 4 requires Popper.js -->
    <script src="js/app.js"></script>
    <script src="https://unpkg.com/popper.js@1.14.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/flat-ui.js"></script>
    <script src="js/application.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/common.js"></script>
  </body>
</html>
