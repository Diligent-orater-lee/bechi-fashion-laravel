<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVerseDetailsRequest;
use App\Models\VerseDetails;
use Illuminate\Http\Request;

class CustomerVerseController extends Controller
{
    public function loadVerse(Request $request, string $id)
    {
        $verse = VerseDetails::where('verse_handle', $id)->first();
        if ($verse) {
            return view('customer.verses.verse-loader', ['verseURL' => $verse->ar_project_url]);
        } else {
            abort(404);
        }
    }

    public function addVerse(StoreVerseDetailsRequest $request) {
        $validated = $request->validated();
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }

        return redirect()->with('success', 'Verse added successfully!');
    }
}
