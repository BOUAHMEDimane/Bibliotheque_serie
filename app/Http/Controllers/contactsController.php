<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    function index() {
        return view('contact');
    }

    public function send(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->date = date('Y-m-d H:i:s');

        $contact->save();
        return redirect(route('contact'))->with('successMsg', 'Votre message a été envoyé avec succé , une réponse Vous serra retourné le plus rapidement possible.');

    }
}
