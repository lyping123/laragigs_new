<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use App\Models\listings;
use Illuminate\Http\Request;
use App\Http\Middleware\checkauth;
use Illuminate\Support\Facades\Route;


Route::get('/',[ListingController::class,'index']);

Route::middleware(checkauth::class)->group(function(){
    
    Route::get('/listings/create',[ListingController::class,'create'])->name('listing.create');
    Route::post('/listings',[ListingController::class,'store'])->name('listing.store');
    Route::get('/listings/{id}',[ListingController::class,'edit'])->name('editform');
    Route::get('/listing/{id}',[ListingController::class,'show'])->name('listinglist');
    Route::put('/listings/{id}',[ListingController::class,'update'])->name('listing.update');
    Route::delete('/listings/{id}',[ListingController::class,'destroy'])->name('listing.destroy');
    Route::get('/managelisting',[ListingController::class,'manage'])->name('listing.manage');
});



Route::get("/register",[UserController::class,'create'])->name('register.create');
Route::post("/users",[UserController::class,'store'])->name('users.store');


Route::get("/login",[UserController::class,'login'])->name('login');
Route::post("/users/authenticate",[UserController::class,'authenticate'])->name('users.authenticate');
Route::post("/logout",[UserController::class,'logout'])->name('logout');


Route::get("/hello", function(){
    return response("<h1>hello word</h1>",200)
        ->header('content-Type','text/plain');    
});

Route::get("/posts/{id}",function($id){
    //dd($id);
    return response("Posts ".$id);
})->where('id',"[0-9]+");


Route::get("/search",function(Request $request){
    dd($request->name,$request->age,$request->city);
});


