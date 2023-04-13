<?php

namespace App\Http\Controllers;

use App\Models\DigitalMarketing;
use Illuminate\Http\Request;

class DigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = DigitalMarketing::all();
        return view('Dm.DigitalView',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Dm.DigitalMarketing');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        //upload abc.jpg
        $filename = time().rand(1111,9999).".".$request->photo->extension(); //489416491524.jpg
        $request->photo->move(public_path('uploads'), $filename);
        //upload

        // (2) $obj = new DigitalMarketing();
        // $obj->name = $request->name;
        // $obj->photo = $filename;
        // $obj->rate = $request->rate;
        // $obj->quantity = $request->quantity;
        // $obj->category = $request->category;
        // $obj->save();

        $Postdata = [
            "name" => $request->name,
            "photo" => $filename,
            "rate" => $request->rate,
            "quantity" => $request->quantity,
            "category" => $request->category,
        ];
        DigitalMarketing::create($Postdata); //(3)

       // (1) DigitalMarketing::create($request->all());
        return redirect()->route('digitalmarkating.create')->with("message","Data are Inserted.......");
    }

    /**
     * Display the specified resource.
     */ 
    public function show(DigitalMarketing $digitalmarkating)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DigitalMarketing $digitalmarkating)
    {
        return view('Dm.EditDigitalMarkating',compact('digitalmarkating'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DigitalMarketing $digitalmarkating)
    {
       


        if($request->hasFile("photo"))
        {
            $oldimage = $request->oldphoto;
            $path = public_path('uploads/'.$oldimage);
            unlink($path);
            //upload abc.jpg
            $filename = time().rand(1111,9999).".".$request->photo->extension(); //489416491524.jpg
            $request->photo->move(public_path('uploads'), $filename);
            //upload
        }
        else
        {
            $filename = $request->oldphoto;
        }

        $obj = DigitalMarketing::where("dm_id",$digitalmarkating->dm_id)->first();
        $obj->name = $request->name;
        $obj->rate = $request->rate;
        $obj->photo = $filename;
        $obj->quantity = $request->quantity;
        $obj->category = $request->category;
        $obj->save();


        return redirect()->route('digitalmarkating.index')->with("message","Data Updated Sucessfully..!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DigitalMarketing $digitalmarkating)
    {
        //
       // echo "Delete";
       // echo $digitalmarkating->dm_id;
       $filename = $digitalmarkating->photo;
       $path = public_path('uploads/'.$filename);
       unlink($path);
       //echo $filename;
       $digitalmarkating->delete();
       return redirect()->route('digitalmarkating.index')->with("message","Data are deleted..!");
    }
}
