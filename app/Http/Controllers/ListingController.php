<?php

namespace App\Http\Controllers;

use App\Models\listings;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(){
        $listings = listings::latest()->filter(request(['tag','search']))->get();
        return view('listings', [
            "listings" => $listings
        ]);
    }

    public function show($id){
        $listing=listings::find($id);
        if($listing){
            return view('listing',[
                'listing'=>$listing
            ]);
        }else{
            abort("404");
        } 
    }

    
}
