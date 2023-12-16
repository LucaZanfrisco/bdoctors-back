<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with(['doctor','doctor.typologies'])
        ->leftJoin('profile_star', 'users.id', '=', 'profile_star.profile_id')
        ->leftJoin('stars', 'profile_star.star_id', '=', 'stars.id')
        ->leftJoin('reviews', 'users.id', '=', 'reviews.profile_id')
        ->groupBy('users.id')
        ->selectRaw('users.*, AVG(stars.value) as averageStars, COUNT(reviews.id) as reviewCount')
        ->paginate(10);

        if($user->count() > 0){
            return response()->json([
                'result' => 200,
                'data' => $user,
            ]);
        }else{
            return response()->json([
                'result' => 404,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
