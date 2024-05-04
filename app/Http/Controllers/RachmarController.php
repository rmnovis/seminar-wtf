<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RachmarController extends Controller
{
    //
    public function users()
    {   
        $contacts = Contact::orderBy('id', 'DESC')->get();
        return view('users', compact('contacts'));
    }

    public function createUser(Request $request)
    {   
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
        ]);

       $contact = new Contact();
       $contact->name = $request->name;
       $contact->address = $request->address;
       $contact->save();

       // Rahcmar

       return redirect()->back();
    }


    public function updateUser(Request $request, $id)
    {   
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
        ]);
        

        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->address = $request->address;
        $contact->save();

        return redirect()->back();
    }

    public function deleteUser(Request $request, $id)
    {   
       $contact = Contact::find($id)->delete();
       return redirect()->back();
    }

     

    

}
