<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\UserServiceInterface;
use App\User;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * To show user lists
     * 
     * @return View user list
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
     * To delete user by id
     * 
     * @param $id user id
     * @return View user list
     */
    public function destroy($id)
    {
        $this->userService->delete($id);
        return redirect()->back()->with("success_msg", deletedMessage("User"));
    }
}
