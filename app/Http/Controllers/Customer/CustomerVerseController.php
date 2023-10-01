<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVerseDetailsRequest;
use App\Models\VerseDetails;
use Illuminate\Http\Request;

class CustomerVerseController extends Controller
{
    public function loadVerse(Request $request, string $id = "bechi")
    {
        if ($id == "bechi") {
            return view('customer.verses.verse-loader', ['verseURL' => 'https://bechioriginals.8thwall.app/bechi-verse']);
        } else {
            $verse = VerseDetails::where('verse_handle', $id)->first();
            if ($verse) {
                $verseURL = $verse->ar_project_url;
                $versePermissions = explode(",", $verse->ar_permissions);
                return view('customer.verses.verse-loader', ['verseURL' => $verseURL, 'versePermissions' => $versePermissions]);
            } else {
                abort(404);
            }
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
