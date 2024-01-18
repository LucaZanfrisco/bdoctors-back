<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    public function index()
    {
        $sponsors = Sponsorship::all();
        return view('admin.sponsorship.index', compact('sponsors'));
    }
}
