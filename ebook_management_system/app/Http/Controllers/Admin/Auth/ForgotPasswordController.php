<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Contracts\Services\Auth\ForgotPasswordServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use App\User; 

/**
 * This is Forgot Password Controller.
 * This will handle forgot password processing.
 */
class ForgotPasswordController extends Controller
{
    /**
     * Auth Interface
     */
    private $forgotPasswordServiceInterface;

    /**
     * Create a new controller instance.
     * @param ForgotPasswordServiceInterface $forgotPasswordServiceInterface
     * @return void
     */
    public function __construct(ForgotPasswordServiceInterface $forgotPasswordServiceInterface)
    {
        $this->forgotPasswordInterface = $forgotPasswordServiceInterface;
    }

    /**
       * To show forgetPassword view
       *
       * @return View ForgetPassword view
    */
    public function showForgetPasswordForm($auth)
    {
        return view('auth.forgetPassword')->with(['auth' => $auth]);
    }

    /**
     * To check email is valid or not.
     * If valid will send email and redirect to ForgetPassword page.
     * @param  ForgotPasswordRequest $request Request from ForgetPassword
     * @return View ForgotPassword
     */
    public function submitForgetPasswordForm(ForgotPasswordRequest $request,$auth)
    {
        $request->validated();
        $token = Str::random(64);
        $passwordReset = $this->forgotPasswordInterface->savePasswordReset($request,$token);
        
        Mail::send('auth.emailForgetPassword', ['token' => $token , 'auth' => $auth] , function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with(['auth' => $auth ,'message' => 'We have e-mailed your password reset link!']);
    }

    /**
     * To show resetpassword view
     * @param  token
     * @return View resetpassword
     */
    public function showResetPasswordForm($token, $auth) {
        return view('auth.forgetPasswordLink', ['token' => $token , 'auth' => $auth]);
    }

    /**
     * To update password
     * @param  ResetPasswordRequest $request Request from ResetPassword
     * @return View login view
     */
    public function submitResetPasswordForm(ResetPasswordRequest $request, $auth)
    {
        $request->validated();
        $passwordReset = $this->forgotPasswordInterface->updatePassword($request);
        return redirect('login/'.$auth)->with('message', 'Your password has been changed!');
    }
}
