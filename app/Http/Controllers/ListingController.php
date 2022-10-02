<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //
    public function index()
    {
        // show all listings
        return view(
            'listings.index',
            [
                'listings' => Listing::all()
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
