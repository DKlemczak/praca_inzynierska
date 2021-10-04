<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('dashboard.contact.index', ['contact' => $contact]);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::where('id', $id)->first();
        $contact->city = $request->city;
        $contact->postcode = $request->postcode;
        $contact->post = $request->post;
        $contact->street = $request->street;
        $contact->building_number = $request->building_number;
        $contact->phone_number = $request->phone_number;
        $contact->email = $request->email;
        $contact->save();

        return redirect()->route('dashboard.contact.index');
    }
}