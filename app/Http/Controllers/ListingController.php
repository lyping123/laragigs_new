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

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $formFields=$request->validate([
            'title'=>'required',
            'company'=>['required'],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required'],
            'tag'=>'required',
            'description'=>'required'
        ]);
    

        listings::create($formFields);

        return redirect('/')->with('message','Listing created successfully!');
    }

    
}
