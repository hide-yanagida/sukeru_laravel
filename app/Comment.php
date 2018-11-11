<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Like;
use App\User;

class Comment extends Model
{
    public static function get_comments_data($content_id)
    {
      $content = \App\Content::where('id', $content_id)
                              ->get();

      $likes_data = \App\Like::where('content_id', $content_id)
                              ->get();

      //配列にする
      $likes_array_data = [];
      foreach ($likes_data as $key => $value)
      {
        $likes_array_data[] = ['user_id' => $value->user_id];
      }

      $comments_data = \App\Comment::where('content_id', $content_id)
                                    ->get();

      $user_data = \App\User::all();

      //user情報を取り出しやすいように整形
      $users = [];
      foreach ($user_data as $key => $value)
      {
        $users[$value->id] = $value;
      }

      $liked = 0;
      if(array_search(Auth::id(), array_column($likes_array_data, 'user_id')) !== false)
      {
          $liked = 1;
      }

      //コンテンツにオーナー情報とlike情報追加
      $content[0]['owner'] = $users[$content[0]->user_id];
      $content[0]['count'] = count($likes_array_data);
      $content[0]['liked'] = $liked;
      $content = $content[0];

      //commentにユーザ情報を追加
      $comments = [];
      foreach ($comments_data as $key => $value)
      {
        $value['user'] = $users[$value->user_id];
        $comments[] = $value;
      }

      return ['comments' => $comments, 'content' => $content];
    }

    //コンテンツの削除
    public static function destroy($comment_id)
    {

      $content = \App\Comment::where('id',  $comment_id)
                          ->delete();

      return '';
    }
}
