<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactsController extends Controller {
    
    public function adminIndex(){
        $contacts = Contact::with('service')->cursorPaginate(10);
        return view('admin.contacts.index', ['contacts' => $contacts]);
    }

    public function delete(Contact $contact){
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contacto atendido');
    }

    public function index(){
        $services = Service::where('available', true)->get();
        return view('contact', ['services' => $services]);
    }

    public function store(Request $request){
        $params = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['digits:10', 'max:10'],
            'issue' => ['required', 'max:255'],
            'service_id' => ['required', 'exists:services,id']
        ]);

        Contact::create($params);
        return back()->with('success', 'Contacto enviado, pronto te estaremos buscando');
    }
}
