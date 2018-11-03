<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Like;
use App\User;

class Content extends Model
{
    //ホーム画面で表示するデータを作成
    public static function get_contents_data()
    {
      $contents_data = \App\Content::all();
      $likes_data = \App\Like::all();
      $user_data = \App\User::all();

      //コンテンツごとのlike数がわかるようにcontent_idをキーにまとめておく
      $likes = [];
      foreach ($likes_data as $key => $value)
      {
        $likes[$value->content_id][] = $value;
      }

      //user情報を取り出しやすいように整形
      $users = [];
      foreach ($user_data as $key => $value)
      {
        $users[$value->id] = $value;
      }

      //contentのデータにlikeのカウントと、自分がlikeしてるかの判定を追加する
      $contents = [];
      foreach ($contents_data as $key => $value)
      {
        $value['count'] = 0;
        $value['liked'] = 0;

        //このcontentにlikeがある場合
        if(array_key_exists($value->id, $likes))
        {
          $value['count'] = count($likes[$value->id]);

          //このcontentに自分がlikeしているかどうか 0=>no_like, 1=>like
          if(array_search(Auth::id(), array_column($likes[$value->id], 'user_id')) !== false)
          {
              $value['liked'] = 1;
          }
        }

        //オーナー情報を追加
        $value['owner'] = $users[$value->user_id];

        $contents[] = $value;
      }

      return $contents;
    }

    //likeした人一覧
    public static function get_like_user(string $content_id)
    {
      $users = \App\Like::where('content_id', $content_id)
                          ->get();

      //空処理
      if(count($users) == 0)
      {
        return $users;
      }

      //user_idの配列を取得
      $users_id = [];
      foreach ($users as $key => $value) {
        $user_id[] = $value->user_id;
      }

      $user_data = \App\User::whereIn('id', $user_id)
                              ->get();
      return $user_data;
    }

    //mypageの情報を取得
    public static function get_contents_mydata()
    {
      $contents = \App\Content::get_contents_data();

      $users = \App\Like::where('user_id', Auth::id())
                          ->get(['content_id']);

      //content_idだけの配列を作る
      $like_list=[];
      foreach ($users as $key => $value)
      {
        $like_list[] = $value->content_id;
      }
      //$like_list = array_column($users, 'content_id');

      $sukeru = [];
      $my_contents = [];

      foreach ($contents as $key => $value)
      {
        if($value->user_id == Auth::id())
        {
          $my_contents[] = $value;
        }

        if(!(array_search($value->id, $like_list) === FALSE))
        {
            $sukeru[] = $value;
        }
      }

      return ['sukeru' => $sukeru, 'my_contents' => $my_contents];
    }
}
