<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

Class imageUploadController extends Controller{
public function store(Request $request)
{
    $this->validate($request, array(
    'name' => 'required',
    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ));
    //save the data to the database
    $person  = new article ;
    $person->name = $request->name;

    if($request->hasFile('image')){
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
        $person->image = $filename;
        $person->save();
    };

    $person->save();

    return redirect()->route('people.index')
    ->with('success','Item created successfully');
}
}