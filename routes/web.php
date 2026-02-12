<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('listings',[
        "listings"=>Listing::all(),
    ]);
});


Route::get('/listing/{id}',function($id){
    $listing=Listing::find($id);
    if($listing){
        return view('listing',[
            'listing'=>Listing::find($id)
        ]);
    }else{
        abort("404");
    } 

});


Route::get("/hello", function(){
    return response("<h1>hello word</h1>",200)
        ->header('content-Type','text/plain');    
});

Route::get("/posts/{id}",function($id){
    //dd($id);
    return response("Posts ".$id);
})->where('id',"[0-9]+");


Route::get("/search",function(Request $request){
    dd($request->name,$request->age);
});



