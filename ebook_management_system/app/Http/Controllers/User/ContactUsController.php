<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\User\ContactServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeContactUsRequest;

/**
 * This is Contact Us Controller.
 * This will handle contact us processing.
 */
class ContactUsController extends Controller
{
    /**
     * contact service
     */
    private $contactService;

    /**
     * Create a new controller instance.
     * @param ContactServiceInterface $contactService
     * @return void
     */
    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeContactUsRequest $request)
    {
        $this->contactService->store($request->validated());

        return redirect()->back()->with("success_msg", sendMessage("Message"));
    }
}
