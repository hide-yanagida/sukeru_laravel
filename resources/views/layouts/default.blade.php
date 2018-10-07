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
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col">
          <nav class="navbar navbar-inverse navbar-embossed navbar-expand-lg" role="navigation">
            <a class="navbar-brand" href="index.html">SUKERU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-01"></button>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
              <ul class="nav navbar-nav mr-auto">
              </ul>
              <ul class="nav navbar-nav">
                <li><a href="login/facebook">
                  <button class="btn btn-social-facebook">
                    <span class="fui-facebook"></span> facebookでログイン
                  </button></a>
                </li>
              </ul>
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

    <!-- Bootstrap 4 requires Popper.js -->
    <script src="js/app.js"></script>
    <script src="https://unpkg.com/popper.js@1.14.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/flat-ui.js"></script>
    <script src="js/application.js"></script>
  </body>
</html>
