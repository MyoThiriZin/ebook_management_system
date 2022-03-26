<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\ForgotPasswordDaoInterface;
use App\Contracts\Services\Auth\ForgotPasswordServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Service class for forgotpassword.
 */
class ForgotPasswordService implements ForgotPasswordServiceInterface
{
    /**
     * forgotPassword Dao
     */
    private $forgotPasswordDao;

    /**
     * Class Constructor
     * @param forgotPasswordDaoInterface
     */
    public function __construct(ForgotPasswordDaoInterface $forgotPasswordDao)
    {
        $this->forgotPasswordDao = $forgotPasswordDao;
    }

    /**
     * To create passwordreset
     * @param Request $request request including inputs
     * @return Object create resetpassword object
     */
    public function savePasswordReset(Request $request,$token)
    {
        $forgotpassword = $this->forgotPasswordDao->savePasswordReset($request,$token);
        return $forgotpassword;
    }

    /**
     * To update password
     * @param Request $request request including inputs
     * @return Object update password object
     */
    public function updatePassword(Request $request)
    {
        $updatepassword = $this->forgotPasswordDao->updatePassword($request);
        return $updatepassword;
    }
}
