<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Like;

class Content extends Model
{
    //ホーム画面で表示するデータを作成
    public static function get_contents_data()
    {
      $contents_data = \App\Content::all();
      $likes_data = \App\Like::all();

      //コンテンツごとのlike数がわかるようにcontent_idをキーにまとめておく
      $likes = [];
      foreach ($likes_data as $key => $value)
      {
        $likes[$value->content_id][] = $value;
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

          //このcontentに自分がlikeしているかどうか 0=>no_like, 1=like
          if(array_search(Auth::id(), array_column($likes[$value->id], 'user_id')) !== false)
          {
              $value['liked'] = 1;
          }
        }
        $contents[] = $value;
      }

      return $contents;
    }
}
