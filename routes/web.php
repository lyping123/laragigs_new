<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('listings',[
        'heading'=>'latest list',
        'listings'=>[
            [
                'id'=>1,
                'title'=>'Listing One',
                'description'=>'this is a good thing'
            ],
            [
                'id'=>2,
                'title'=>'Listing two',
                'description'=>'this is not a good thing'
            ]
        ]
    ]);

});


Route::get('/listing/{id}',function($id){
      $listings=[
        [
            'id'=>1,
            'title'=>'Listing One',
            'description'=>'this is a good thing'
        ],
        [
            'id'=>2,
            'title'=>'Listing two',
            'description'=>'this is not a good thing'
        ]];

        foreach($listings as $listing){
            if($listing['id']==$id){
                return $listing;
            }
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



