<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

/**
 * Interface for forgotpassword service.
 */
interface ForgotPasswordServiceInterface
{
    /**
     * To create passwordreset
     * @param Request $request request including inputs
     */
    public function savePasswordReset(Request $request,$token);

    /**
     * To update password
     * @param Request $request request including inputs
     */
    public function updatePassword(Request $request);
}
