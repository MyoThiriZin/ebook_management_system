<?php

namespace App\Http\Controllers\User;

use App\Contact;
use App\Contracts\Services\User\ContactServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeContactUsRequest;

class ContactUsController extends Controller
{
    private $contactService;

    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * To show contactus view
     * 
     * @return View contactus
     */
    public function create()
    {
        return view('users.contacts.create');
    }

    /**
     * To save contactus 
     * 
     * @return View contactus
     */
    public function store(storeContactUsRequest $request)
    {
        $this->contactService->store($request->validated());

        return redirect()->back()->with("success_msg", sendMessage("Message"));
    }
}
