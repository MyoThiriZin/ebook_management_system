<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Contracts\Services\Auth\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Session;

/**
 * This is Authentication Controller.
 * This will handle authentication processing.
 */
class AuthController extends Controller
{
    /**
     * Auth Interface
     */
    private $authInterface;

    /**
     * Create a new controller instance.
     * @param AuthServiceInterface $authServiceInterface
     * @return void
     */
    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        $this->authInterface = $authServiceInterface;
    }

    /**
     * To show registration view
     *
     * @return View registration form
     */
    public function showRegistrationView()
    {
        return view('auth.register');
    }

    /**
     * To check register form is valid or not.
     * If valid will return to login page.
     * If not, redirect to register page.
     *
     * @param  UserRegisterRequest $request Request from register
     * @return View registration confirm
     */
    public function storeUser(UserRegisterRequest $request)
    {
        $request->validated();
        $user = $this->authInterface->saveUser($request);
        return redirect('login')->with('message', 'Your account has been successfully created!');
    }

    /**
     * To show login view
     *
     * @return View login form
     */
    public function showLoginView()
    {
      return view('auth.login');
    }

    /**
     * To check login form is valid or not.
     * If valid will return to dashboard page.
     * If not, redirect to login page.
     *
     * @param  LoginRequest $request Request from register
     * @return View dashboard confirm
     */  
    public function login(LoginRequest $request)
    {
        $validated = $request->only('email', 'password');

        if (Auth::attempt($validated)) {
            return redirect()->intended('/dashboard');
        }

        return redirect('login')->with('error', 'Email or password is incorrect.');
    }

    /**
     * Log out account user.
     *
     * @return View login view
     */
    public function logout() {
      Auth::logout();
      Session::flush();
      Redirect::back();
      return redirect('login');
    }
}
