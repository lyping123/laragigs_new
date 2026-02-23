<?php

namespace App\Http\Controllers;

use App\Models\listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function index(){
        $listings = listings::latest()->filter(request(['tag','search']))->paginate(6);
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
        if($request->hasFile('logo')){
            $formFields['logo']=$request->file('logo')->store('logos','public');
        }

        $formFields['user_id']=Auth::id();

        listings::create($formFields);

        return redirect('/')->with('message','Listing created successfully!');
    }

    public function edit($id){
        $listing=listings::findorFail($id);
        return view('edit',[
            'listing'=>$listing
        ]);
    }

    public function update(Request $request,$id){
        $listing=listings::findorFail($id);

        $formFields=$request->validate([
            'title'=>'required',
            'company'=>['required'],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required'],
            'tag'=>'required',
            'description'=>'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo']=$request->file('logo')->store('logos','public');
        }

        
    
        $listing->update($formFields);

        return back()->with('message','Listing updated successfully!');
    }

    public function destroy($id){
        $listing=listings::findorFail($id);
        $listing->delete();
        return redirect('/')->with('message','Listing deleted successfully!');
    }

    public function manage(){
        
        $user=Auth::user();
        return view('manage',[
            'listings'=>$user->listings()->get()
        ]);
    }

    
}
