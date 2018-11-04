<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
      return 'id';
    }

    /**
     * facebookの認証ページヘユーザーをリダイレクト
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {

        //scopesで取得したい情報を指定できる。物によっては審査が必要
        return Socialite::driver('facebook')
        ->scopes(['user_link'])
        ->redirect();
    }

    /**
     * facebookからユーザー情報を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        //未登録ならレコード作成、登録ずみであれば更新する(avatarの変更とかあるので)
        User::updateOrCreate(
            ['id' => $user->id],
            ['id' => $user->id,
             'name' => $user->name,
             'email' => $user->email,
             //'link' => $user->profileUrl,
             'link' => 'https://www.facebook.com/',
             'avatar' => $user->avatar]
        );
        //dd($user->token);

        //facebookで認証を受けているので認証済ユーザとしての処理をする。
        $login_user = User::where('id', $user->id)->first();
        Auth::loginUsingId($login_user->id);
        //return redirect()->intended('/home');
        return redirect('/home');
    }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }

}
