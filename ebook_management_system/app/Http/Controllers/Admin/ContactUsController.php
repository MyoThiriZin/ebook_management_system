<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\ContactUsServiceInterface;

/**
 * This is ContactUs Controller.
 * This will handle contact us processing.
 */
class ContactUsController extends Controller
{
    /**
     * contact us service
     */
    private $contactusService;

    /**
     * Create a new controller instance.
     * @param ContactUsServiceInterface $contactusService
     * @return void
     */
    public function __construct(ContactUsServiceInterface $contactusService)
    {
        $this->contactusService = $contactusService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->contactusService->index();

        return view('contactus.contactlist', ['contactinfo' => $contacts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contactus.show')->with(['contact' => $contact]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->contactusService->delete($id);
        return redirect()->back()->with("success_msg", deletedMessage("Contact"));
    }
}
