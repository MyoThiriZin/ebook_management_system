<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\UserServiceInterface;
use App\User;

/**
 * This is User Controller.
 * This will handle user CRUD processing.
 */
class UserController extends Controller
{
    /**
     * user service
     */
    private $userService;

    /**
     * Create a new controller instance.
     * @param UserServiceInterface $userService
     * @return void
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = $this->userService->index();
        return view('userlists.userlist', ['users' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('userlists.show')->with(['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userService->delete($id);
        return redirect()->back()->with("success_msg", deletedMessage("User"));
    }
}
