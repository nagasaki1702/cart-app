<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ユーザーが管理者でない場合、強制的にログアウトさせ、ログインページにリダイレクトします。
        
        // この部分は、認証されたユーザーの utype（ユーザータイプ）が 'ADM'（管理者）でないかどうかを確認。
        if(Auth::user()->utype != 'ADM'){
            // セッション内のすべてのデータを削除。これにより、セッションがクリアされ、ユーザーが強制的にログアウト。
            session()->flush();
            // loginルートへのリダイレクト。つまり、ユーザーはログインページにリダイレクト。
            return redirect()->route('login');
        }
        return $next($request);
    }
}
