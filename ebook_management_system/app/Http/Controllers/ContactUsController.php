<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Contracts\Services\ContactUsServiceInterface;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $contactusService;
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
