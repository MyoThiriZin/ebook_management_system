<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for ForgotPassword
 */
interface ForgotPasswordDaoInterface
{
    /**
     * To create PasswordReset
     * @param Request $request request including inputs
     */
    public function savePasswordReset(Request $request, $token);

    /**
     * To update Password
     * @param Request $request request including inputs
     */
    public function updatePassword(Request $request);
}
