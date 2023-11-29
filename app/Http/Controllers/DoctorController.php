<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index(){
        $user = User::with('doctor')->where('id', Auth::id())->first();
        return view('admin.index', compact('user'));
    }
    
    public function store(StoreDoctorRequest $request){
        $data = $request->validated();

        $newDoctor = new Doctor();
        $newDoctor->user_id = Auth::user()->id;
        $newDoctor->fill($data);

        if(isset($data['photo'])){
            $newDoctor->photo = Storage::put("uploads", $data["photo"]);
        }

        if(isset($data['cv'])){
            $newDoctor->cv = Storage::put("uploads", $data["cv"]);
        }

        $newDoctor->save();

        return to_route('doctor.index');

    }

    
    
}
