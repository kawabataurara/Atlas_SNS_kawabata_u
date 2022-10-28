<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    // バリデーションルールの記述7/3

    public function validator(array $data){
        return Validator::make($data, [
            'username' => 'required | string | min:2 | max:12',
            'mail' => 'required | string | email | min:5 | max:40 | unique:users,mail',
            'password' => 'required | string | min:8 |  max:20 | confirmed | alpha_num',
            // 'password_confirmation' => 'required | same:password',
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
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $validator = $this->validator($data);

        // バリデーションが失敗したら
        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                -> withInput();
        }
        // 入力したものをデータベースに保存
            $username = $this->create($data);
            $user = $request->get('username');
            return redirect('added')->with('username', $user);

        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }


}
