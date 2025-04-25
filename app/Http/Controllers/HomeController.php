<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function home()
    {
        if (Auth::check()) {
            return redirect('/students');
        }
        return redirect()->route('register');
    }

    public function store (Request $request){
        $subject = $request->subject;
        $section = $request->section;
        $description = $request->description;
        $units = $request->units;
        $day = $request->day;
        $time = $request->time;
        return view('welcome', compact('subject', 'section', 'description', 'units', 'day', 'time'));
    }
}
