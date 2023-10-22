<?php

namespace App\Http\Controllers;

use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactusindex()
    {
        
    return view('contacts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
    return view('terms');
        
    }

    public function policy()
    {
    return view('PrivacyPolicy');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Contactus = Contactus::create($request->all());
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function contactusshow($id)
    {
         $Contactusshow = Contactus::find($id);

    return view('contactusshow',compact('Contactusshow'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function edit(Contactus $contactus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contactus $contactus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contactus $contactus)
    {
        //
    }
}
