<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVerseDetailsRequest;
use App\Models\VerseDetails;

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
        $verses = VerseDetails::all()->toArray();
        return view('admin.modules.verse-management.list-verses', ['verses' => $verses]);
    }

    public function loadAddVerseView()
    {
        return view('admin.modules.verse-management.add-verse');
    }

    public function addVerse(StoreVerseDetailsRequest $request)
    {
        $verseDetails = new VerseDetails([
            'verse_name' => $request->verse_name,
            'verse_description' => $request->verse_description,
            'is_ar_available' => $request->is_ar_available ? 1 : 0,
            'verse_handle' => $request->is_ar_available ? $request->verse_handle : null,
            'ar_project_url' => $request->is_ar_available ? $request->ar_project_url : null,
            'verse_audio_url' => $request->is_ar_available ? $request->verse_audio_url : null
        ]);
        $verseDetails->save();

        return redirect()->route('admin.verses.managment')->with('success', 'Verse added successfully!');
    }
}