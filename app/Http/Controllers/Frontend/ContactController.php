<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Listing;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request, $id){
        $listing = Listing::findOrFail($id);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->contact_info = $request->contact_info;
        $contact->description = $request->description;
        $contact->listing_id = $listing->id;
        $contact->save();
        return redirect()->back()->with('success', 'Message Sent Successfully!');
    }
}
