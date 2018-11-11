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
        like_count = parseInt($(this).nextAll('.like_count').text());
        $(this).nextAll('.like_count').text(like_count + 1);
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
        like_count = parseInt($(this).nextAll('.like_count').text());
        $(this).nextAll('.like_count').text(like_count - 1);
      })
      .fail( (data) => {
        console.log(data);
      });
    });

    //like数をクリックした時にモーダル内の記載を書き換える。
    $(document).on('click', '.like_count', function(){

      //like_listを初期化。
      $('.like_list').empty();

      //空処理
      if($(this).text() == 0)
      {
        $('.like_list_modal').modal('hide');
        return;
      }

      $.ajax({
        url: '/content/get_like_user',
        type: 'post',
        data: {
          'content_id': $(this).prev().val(),
          '_token' : $('input[name="_token"]').val()
        }
      })
      .done( (data) => {
        //DOM追加
        $.each(data, function(index, value){
          $('.like_list').append(
            '<div class="row">'+
              '<div class="col-md-2">'+
                '<figure class="figure">'+
                  '<img class="figure-img img-fluid" src="'+value['avatar']+'">'+
                '</figure>'+
              '</div>'+
              '<div class="col-md-5"><p>'+value['name']+'</p></div>'+
              '<div class="col-md-2">'+
                '<a href="'+value['link']+'" target="_blank"><span class="fui-facebook col-xs-2"></span></a>'+
              '</div>'+
            '</div>'
          );
        });

      })
      .fail( (data) => {
        console.log(data);
      });
    });

    //content削除の事前確認
    $(document).on('click', '#delete_btn', function(){
        if(confirm('本当に削除しますか？')){
          $(this).submit();
        }else{
          return false;
        }
    });

    //コメント削除の事前確認
    $(document).on('click', '#comment_delete_btn', function(){
        if(confirm('本当に削除しますか？')){
          $(this).submit();
        }else{
          return false;
        }
    });

    //編集ボタンの制御
    $(document).on('click', '#edit_btn', function(){
      $('#post_form').attr('action', '/content/edit');
      $('#overview').val($('#p_overview').val());
      $('#place').val($('#p_place').val());
      $('#date_from').val($('#p_date_from').val());
      $('#date_to').val($('#p_date_to').val());
    });

    //投稿ボタンの制御
    $(document).on('click', '#post_btn', function(){
      $('#post_form').attr('action', '/content/add');
    });

});
