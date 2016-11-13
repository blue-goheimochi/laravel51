<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Auth\AuthManager;

class AuthController extends Controller
{
    protected $redirectPath = '/';
    protected $loginPath    = '/login';

    /** @var AuthManager */
    protected $auth;

    /** @var UserRepositoryInterface */
    protected $user;

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(AuthManager $auth, UserRepositoryInterface $user)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->auth = $auth;
        $this->user = $user;
    }

    public function postRegister(UserRegisterRequest $request)
    {
        $this->auth->login($this->create($request->all()));
        return redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
