<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

interface ForgotPasswordDaoInterface
{
    /**
     * To create PasswordReset
     * @param Request $request request including inputs
     */
    public function savePasswordReset(Request $request);

    /**
     * To update Password
     * @param Request $request request including inputs
     */
    public function updatePassword(Request $request);
}
