<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Auth\AuthManager;
use App\Services\UserService;

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
    public function __construct(AuthManager $auth)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->auth = $auth;
    }

    public function postRegister(UserRegisterRequest $request, UserService $userService)
    {
        $user = $userService->registerUser($request->all());
        $this->auth->login($user);
        return redirect($this->redirectPath());
    }
}
