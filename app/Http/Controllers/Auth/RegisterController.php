<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required_with:password_confirmation', 'string', 'min:4', 'max:20', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
            // 'g-recaptcha-response' => ['required'],

            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => '2',
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $input = $request->all();

         $user = User::create([
            'name' => $input['user_first_name'] . ' ' . $input['user_last_name'],
            'email' => $input['email'],
            'role_id' => '2',
            'password' => Hash::make($input['password']),
        ]);

        $create_old_password = [
            'user_id' => $user->id,
            'password' => md5($request->password),
            'password_updated_at' => Carbon::now(),
            'password_expired_at' => Carbon::now()->addDays(30),
            'is_active' => 1
        ];

        DB::table('passwords')->insert($create_old_password);

        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $users = User::count();
            $user = Auth::user();
            $expiry = DB::table('passwords')->where(['user_id' => $user->id, 'is_active' => 1])->first();
            $user['password_expiry'] = $expiry->password_expired_at;
            return view('home',['users' => $users, 'user' => $user]);
        }

        return redirect()->back();
    }
}
