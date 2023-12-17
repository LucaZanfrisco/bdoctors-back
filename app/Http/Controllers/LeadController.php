<?php

namespace App\Http\Controllers;

use App\Mail\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            'nameLastname' => 'string|required',
            'email' => 'string|required',
            'object' => 'string|required',
            'responseContent' => 'string|required'
        ]);

        Mail::to($data['email'])->send(new NewContact($data));

        return to_route('admin.message.index')->with('message', "Email inviata con successo");
    }
}
