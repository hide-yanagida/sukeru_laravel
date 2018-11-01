$(document).ready(function () {
    $('#date_from').datepicker({
        //オプション
        todayHighlight : false,
        autoclose : true,
        keyboardNavigation : false,
        format: 'yyyy/mm/dd'
    });

    $('#date_to').datepicker({
        //オプション
        todayHighlight : false,
        autoclose : true,
        keyboardNavigation : false,
        format: 'yyyy/mm/dd'
    });

    $(document).on('change', ':file', function() {
        var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.parent().parent().next(':text').val(label);
    });

    //likeのカウント用変数
    var like_count = 0;

    //sukeru!!(like)の処理
    //$('.like_btn').on('click', function(){
    $(document).on('click', '.like_btn', function(){
      $.ajax({
        url: '/content/like',
        type: 'post',
        data: {
          'content_id': $(this).next().val(),
          '_token' : $('input[name="_token"]').val()
        }
      })
      .done( (data) => {
        //ボタンの色を変更
        $(this).removeClass('btn-default like_btn');
        $(this).addClass('btn-primary unlike_btn');

        //likeのカウントを増やす
        like_count = parseInt($(this).nextAll('a').text());
        $(this).nextAll('a').text(like_count + 1);
      })
      .fail( (data) => {
        console.log(data);
      });
    });

    //sukeru!!(like)の処理
    //$('.unlike_btn').on('click', function(){
    $(document).on('click', '.unlike_btn', function(){
      $.ajax({
        url: '/content/unlike',
        type: 'post',
        data: {
          'content_id': $(this).next().val(),
          '_token' : $('input[name="_token"]').val()
        }
      })
      .done( (data) => {
        //ボタンの色を変更
        $(this).removeClass('btn-primary unlike_btn');
        $(this).addClass('btn-default like_btn');

        //likeのカウントを減らす。
        like_count = parseInt($(this).nextAll('a').text());
        $(this).nextAll('a').text(like_count - 1);
      })
      .fail( (data) => {
        console.log(data);
      });
    });

    //like数をクリックした時にモーダル内の記載を書き換える。
    $(document).on('click', '.like_count', function(){
       //alert('test');
    });
});
