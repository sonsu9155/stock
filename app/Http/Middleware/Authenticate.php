<?php

namespace App\Http\Middleware;

use App\UserSession;
use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;

class Authenticate {
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }
        //  else {
        //     $found = UserSession::where('user_id', '=', Auth::user()->id)->first();
        //     if ($found != null && Session::getId() != $found->session_id) {
        //         Auth::logout();
        //         Session::flash('error', '登录了具有相同凭据的另一个用户');
        //         return redirect('/');
        //     }
        // }

        return $next($request);
    }
}
