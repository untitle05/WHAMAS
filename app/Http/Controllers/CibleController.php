<?php

namespace App\Http\Controllers;

use App\Cible;
use App\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cibles = Cible::all();
//        dd($cibles);
        return view('cible.index', compact('cibles'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r)
    {

        $cible =  Cible::find($r->id);
//        dd($cible);

        return Response($cible);

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
    public function update(Request $r)
    {

        if($r->ajax())
        {
            //recuperation du tuple lie a l'id
            $cible =  Cible::find($r->id);

            // recuperation de champ modifier
            $cible->numero = $r->numero;
            $cible->compte_whatsapp = $r->compte_whatsapp;
            $cible->sexe = $r->sexe;

            //enregistrement des modifications
            $cible->save();
            return Response($cible);
        }
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

    public function getPhotosCible(Request $r)
    {
//        dd($r->id);
        $photos = DB::table('photos')
        ->where('cible_id', $r->id)
        ->select('photos.nom')
        ->get();
//        $cibles = Cible::with('photos')->find($r->id);

//        dd($photos);
        return view('photos.list', ['photos' => $photos]);
//        return view('photos.list');
    }
}
