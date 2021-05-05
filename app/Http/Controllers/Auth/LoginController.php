<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use Carbon\Carbon;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $users = User::all();
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => 2])) {
            $check_password = DB::table('passwords')
                ->where(['password' => md5($password), 'user_id' => Auth::id(), 'is_active' => 1])
                ->first();

            if($check_password) {
                if ($check_password->password_expired_at <= date('Y-m-d', strtotime(now()))) {
                    $user = Auth::user();
                    Auth::logout();
                    return view('auth.passwords.reset')->with(['user' => $user, 'message' => 'Your Password has been expired, Please update your password']);
                }
            }
            $users = User::count();
            $user = Auth::user();
            $expiry = DB::table('passwords')->where(['user_id' => $user->id, 'is_active' => 1])->first();
            $user['password_expiry'] = $expiry->password_expired_at;
            return view('home',['users' => $users, 'user' => $user]);
        } else if (Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => 1])) {
            $check_password = DB::table('passwords')
                ->where(['password' => md5($password), 'user_id' => Auth::id(), 'is_active' => 1])
                ->first();

            if($check_password) {
                if ($check_password->password_expired_at <= date('Y-m-d', strtotime(now()))) {
                    $user = Auth::user();
                    Auth::logout();
                    return view('auth.passwords.reset')->with(['user' => $user, 'message' => 'Your Password has been expired, Please update your password']);
                }
            }
            $users = User::count();
            $user = Auth::user();
            $expiry = DB::table('passwords')->where(['user_id' => $user->id, 'is_active' => 1])->first();
            $user['password_expiry'] = $expiry->password_expired_at;
            return view('home',['users' => $users, 'user' => $user]);
        } else {
            return redirect()->back()->with('message', 'Invalid Email or Password');
        }
    }
}
