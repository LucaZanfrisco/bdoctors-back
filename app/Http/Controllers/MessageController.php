<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){
        $user = User::where('id', Auth::user()->id)->with('doctor')->first();

        $messages = Message::where('profile_id', $user->doctor->id)->orderBy('created_at', 'desc')->get();

        return view('admin.message.index', compact('messages'));
    }

    public function destroy(Message $message){
        
    }
}
