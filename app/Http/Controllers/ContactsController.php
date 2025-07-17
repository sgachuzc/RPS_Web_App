<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\ConfigurationsController;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller {

    protected ConfigurationsController $configController;

    public function __construct(
        ConfigurationsController $configController
    ){
        $this->configController = $configController;
    }
    
    public function adminIndex(){
        $contacts = Contact::cursorPaginate(10);
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
            'phone' => ['numeric','digits:10'],
            'issue' => ['required', 'max:255'],
            'message' => ['required', 'max:255']
        ]);

        $contact = Contact::create($params);

        $email = $this->configController->getConfiguration('contact_email');
        Mail::to($email)->queue(new ContactMail($contact));

        return back()->with('success', 'Mensaje enviado, pronto te estaremos buscando');
    }
}
