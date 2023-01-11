<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class AgendaController extends Controller

{
    public function index(){

        $contacts = Contact::all();

        return view ('welcome', ['contacts' => $contacts]);
    }

    public function create(){

        return view ('contacts.create');
    }

    public function store(Request $request) {

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->observations = $request->observations;

        $contact->save();

        return redirect('/')->with('msg', 'Contato criado com sucesso! ');
    }

    public function show($id) {

        $contact = Contact::findOrFail($id);

        return view('contacts.show', ['contact' => $contact]);

    }

    public function destroy($id){
        
        Contact::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Evento excluído com sucesso! ');
    }

    public function edit($id){
        
        $contact = Contact::findOrFail($id);

        return view('contacts.edit', ['contact' => $contact]);
    }

    public function update(Request $request, $id){
        
        $contact = Contact::find($id);

        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->observations = $request->observations;

        $contact->save();

        return redirect('/')->with('msg', 'Evento editado com sucesso! ');
    }
}
