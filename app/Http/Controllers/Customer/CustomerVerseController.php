<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVerseDetailsRequest;
use Illuminate\Http\Request;

class CustomerVerseController extends Controller
{
    public function loadVerse(Request $request, string $id)
    {
        return view('customer.verses.verse-loader', ['verseHandle' => "https://keraverse.diligentsmart.com"]);
    }

    public function addVerse(StoreVerseDetailsRequest $request) {
        $validated = $request->validated();
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }

        return redirect()->with('success', 'Verse added successfully!');
    }
}
