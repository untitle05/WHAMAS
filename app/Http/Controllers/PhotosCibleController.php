<?php

namespace App\Http\Controllers;

use App\Cible;
use App\Photos;
use Illuminate\Http\Request;

class PhotosCibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        if($r->hasFile('file'))
        {
            //get the file from post request
            $file = $r->file('file');

            // set my file name
            $filename = uniqid().$file->getClientOriginalName();

            //move the file to correct location
            $file->move(public_path('images/cibles'), $filename);
            
            //save the image details into the database
            $photo = new Photos([
                'nom' => $filename,
                'cible_id' => (int)($r->input('cible_photo_id'))
            ]);

            $photo->save();

            $cible =  Cible::find($r->input('cible_photo_id'));

            if( $cible->compte_whatsapp == "---") {

                // recuperation de champ modifier
                $cible->compte_whatsapp = "oui";
                $cible->save();
            }
//            dd($photo);
            }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
