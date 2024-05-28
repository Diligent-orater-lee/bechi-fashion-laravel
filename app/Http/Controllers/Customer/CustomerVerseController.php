<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVerseDetailsRequest;
use App\Models\VerseDetails;
use Illuminate\Http\Request;

class CustomerVerseController extends Controller
{
    public function loadVerse(Request $request)
    {
        return "view('customer.verses.verse-loader', ['verseURL' => 'https://bechioriginals.8thwall.app/bechi-verse'])";
    }

    public function addVerse(StoreVerseDetailsRequest $request) {
        $validated = $request->validated();
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }

        return redirect()->with('success', 'Verse added successfully!');
    }
}
