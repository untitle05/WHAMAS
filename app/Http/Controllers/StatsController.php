<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stats_intervalle()
    {
//        dd('stats_intervalle');

        $totalCompteWhatsapp = DB::select(
            'SELECT COUNT(*) 
             FROM cibles 
             WHERE compte_whatsapp = "oui"'
        );

        $totalCompteWhatsappOrange = DB::select(
            'SELECT COUNT(*) 
             FROM experiences_cibles 
             INNER JOIN cibles 
               ON cibles.id = experiences_cibles.cibles_id 
             INNER JOIN experiences 
               ON experiences.id = experiences_cibles.experiences_id 
             WHERE experiences.nom_operateur = "orange" AND cibles.compte_whatsapp = "oui"'
        );

        $totalCompteWhatsappMtn = DB::select(
            'SELECT COUNT(*) 
             FROM experiences_cibles 
             INNER JOIN cibles 
               ON cibles.id = experiences_cibles.cibles_id 
             INNER JOIN experiences 
               ON experiences.id = experiences_cibles.experiences_id 
             WHERE experiences.nom_operateur = "mtn" AND cibles.compte_whatsapp = "oui"'
        );

        $totalCompteWhatsappAvecPhotos = DB::select('SELECT COUNT(*) 
                                                     FROM (SELECT COUNT(*), cibles.numero 
                                                           FROM cibles 
                                                           INNER JOIN photos 
                                                              ON cibles.id = photos.cible_id 
                                                           WHERE cibles.compte_whatsapp = "oui" 
                                                           GROUP BY cibles.numero) AS totalCompteWhatsappWithPhotos');

        $totalCompteWhatsappAvecPhotosMtn = DB::select('SELECT COUNT(*)
                                                           FROM (SELECT COUNT(*), cibles.numero 
                                                                 FROM cibles 
                                                                 INNER JOIN experiences_cibles  
                                                                   ON cibles.id = experiences_cibles.cibles_id 
                                                                 INNER JOIN experiences 
                                                                   ON experiences.id = experiences_cibles.experiences_id
                                                                 INNER JOIN photos
                                                                   ON photos.cible_id = cibles.id
                                                                 WHERE experiences.nom_operateur = "mtn" AND cibles.compte_whatsapp = "oui"
                                                                 GROUP BY cibles.numero
                                                                 ) AS compteWhatsappOrangeWithPhoto');

        $totalCompteWhatsappAvecPhotosOrange = DB::select('SELECT COUNT(*)
                                                           FROM (SELECT COUNT(*), cibles.numero 
                                                                 FROM cibles 
                                                                 INNER JOIN experiences_cibles  
                                                                   ON cibles.id = experiences_cibles.cibles_id 
                                                                 INNER JOIN experiences 
                                                                   ON experiences.id = experiences_cibles.experiences_id
                                                                 INNER JOIN photos
                                                                   ON photos.cible_id = cibles.id
                                                                 WHERE experiences.nom_operateur = "orange" AND cibles.compte_whatsapp = "oui"
                                                                 GROUP BY cibles.numero
                                                                 ) AS compteWhatsappOrangeWithPhoto');

        $totalPhotos = DB::select(
                    'SELECT COUNT(*)
                     FROM photos'
                );

        $TotalcomptePhotosAuPlusCinq = DB::select(
                'SELECT COUNT(*) 
                 FROM (SELECT COUNT(*) 
                       FROM cibles 
                       INNER JOIN photos 
                           ON photos.cible_id = cibles.id 
                           GROUP BY photos.cible_id HAVING COUNT(*) <= 5) AS result_inside_five'
        );

        $TotalcomptePhotosEntreSixEtDix = DB::select(
                'SELECT COUNT(*) 
                 FROM (SELECT COUNT(*) 
                       FROM cibles 
                       INNER JOIN photos 
                           ON photos.cible_id = cibles.id 
                           GROUP BY photos.cible_id HAVING COUNT(*) > 5 AND COUNT(*) <= 10  ) AS result_between_six_and_ten'
        );

        $TotalcomptePhotosSuperieurDix = DB::select(
                'SELECT COUNT(*) 
                 FROM (SELECT COUNT(*) 
                       FROM cibles 
                       INNER JOIN photos 
                           ON photos.cible_id = cibles.id 
                           GROUP BY photos.cible_id HAVING COUNT(*) > 10) AS result_between_six_and_ten'
        );

        


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
