<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function listVerses()
    {
        return view('admin.modules.verse-management.list-verses');
    }

    public function loadAddVerseView()
    {
        return view('admin.modules.verse-management.add-verse');
    }

    public function addVerse()
    {
        return view('admin.modules.verse-management.list-verses')->with('success', 'Verse added successfully!');
    }
}
