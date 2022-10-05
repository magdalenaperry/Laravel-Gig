<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //
    public function index()
    {
        // show all listings
        return view(
            'listings.index',
            [
                // same as ::all(), but this filters
                'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
            ]
        );
    }

    public function show(Listing $listing)
    {
        // show single listings
        return view(
            'listings.show',
            [
                'listing' => $listing
            ]
        );
    }

    public function create()
    {
        return view(
            'listings.create'
        );
    }

    public function store(Request $request)
    {
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'companyName' => ['required', Rule::unique('listings', 'companyName')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        // file created in new folder: storage/public/logos
        // http://laravel-gig.test/storage/logos/anrqlFsGhXkMdRKM1baESM8fKvAoei5hBgX2AumV.webp
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);

        // Session::flash('message', 'listing creted');

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // Show edit form
    public function edit(Listing $listing)
    {
        return view(
            'listings.edit',
            ['listing' => $listing]
        );
    }

    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'companyName' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);


        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        // Session::flash('message', 'listing creted');

        return redirect('/')->with('message', 'Listing updated successfully!');
    }
}


// Common Resource Controller and Route Names:
// index - show all listings
// show - show single listing
// create - show form to create new listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete listing
