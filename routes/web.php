<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use App\Models\listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/',[ListingController::class,'index']);
Route::get('/listing/{id}',[ListingController::class,'show'])->name('listinglist');


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



