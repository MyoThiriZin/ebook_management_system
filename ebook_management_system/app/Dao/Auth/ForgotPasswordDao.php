<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\ForgotPasswordDaoInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\ForgotPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use DB; 
use Carbon\Carbon; 

/**
 * Data Access Object for ForgotPassword
 */
class ForgotPasswordDao implements ForgotPasswordDaoInterface
{
    /**
     * To create resetpassword
     * @param Request $request request including inputs
     * @return Object created passwordreset object
     */
    public function savePasswordReset(Request $request)
    {
        $token = Str::random(64);
        
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.emailForgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
    }

    /**
     * To update password
     * @param Request $request request including inputs
     * @return Object updated password object
     */
    public function updatePassword(Request $request)
    {
        $updatePassword = DB::table('password_resets')
                            ->where([
                            'email' => $request->email, 
                            'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();
    }
}
