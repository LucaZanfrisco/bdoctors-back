<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Sponsorship;
use App\Models\Typology;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    public function index()
    {

        $user = User::where('id', Auth::id())->with('doctor')->first();
        if ($user->doctor == null) {
            return to_route('admin.doctor.create');
        }
        $messages = Message::where('profile_id', $user->doctor->id)
            ->orderByDesc('created_at')
            ->take(3)
            ->get();
        $sponsor = Doctor::where('id', $user->doctor->id)
            ->with('sponsorships')
            ->first();

        return view('admin.index', compact(['user', 'messages', 'sponsor']));
    }

    public function store(StoreDoctorRequest $request)
    {
        $data = $request->validated();

        $newDoctor = new Doctor();
        $newDoctor->user_id = Auth::user()->id;
        $newDoctor->fill($data);

        if (isset($data['photo'])) {
            $newDoctor->photo = Storage::put("uploads", $data["photo"]);
        }

        if (isset($data['cv'])) {
            $newDoctor->cv = Storage::put("uploads", $data["cv"]);
        }

        $newDoctor->save();

        if ($request['typologies']) {
            $newDoctor->typologies()->attach($request['typologies']);
        }

        return to_route('admin.doctor.index');
    }

    public function create()
    {

        $typologies = Typology::all();
        if(Auth::user()->doctor->id){
            return to_route('admin.doctor.index');
        }
        return view('admin.doctor.create', compact('typologies'));
    }

    public function edit(Doctor $doctor)
    {
        $user = User::with('doctor')->where('id', Auth::id())->first();
        return view('admin.edit', compact('user'));
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $data = $request->validated();

        if (isset($data['photo']) && $doctor->photo) {
            Storage::delete($doctor->photo);
        }

        if (isset($data['cv']) && $doctor->cv) {
            Storage::delete($doctor->cv);
        }

        if (isset($data['photo'])) {
            $doctor->photo = Storage::put("uploads", $data["photo"]);
        }

        if (isset($data['cv'])) {
            $doctor->cv = Storage::put("uploads", $data["cv"]);
        }

        $doctor->update($data);
        $doctor->save();

        return redirect()->route('admin.doctor.index');
    }
}
