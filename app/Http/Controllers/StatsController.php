<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            'SELECT COUNT(*)  AS totalCompteWhatsapp
             FROM cibles 
             WHERE compte_whatsapp = "oui"'
        );

        $totalCibles = DB::select('
            SELECT COUNT(*)  AS totalCibles
            FROM cibles            
        ');

        $totalCompteWhatsappOrange = DB::select(
            'SELECT COUNT(*) AS totalCompteOrange
             FROM experiences_cibles 
             INNER JOIN cibles 
               ON cibles.id = experiences_cibles.cibles_id 
             INNER JOIN experiences 
               ON experiences.id = experiences_cibles.experiences_id 
             WHERE experiences.nom_operateur = "orange" AND cibles.compte_whatsapp = "oui"'
        );

        $totalCompteWhatsappMtn = DB::select(
            'SELECT COUNT(*) AS totalCompteMtn
             FROM experiences_cibles 
             INNER JOIN cibles 
               ON cibles.id = experiences_cibles.cibles_id 
             INNER JOIN experiences 
               ON experiences.id = experiences_cibles.experiences_id 
             WHERE experiences.nom_operateur = "mtn" AND cibles.compte_whatsapp = "oui"'
        );

        $totalCompteWhatsappAvecPhotos = DB::select('SELECT COUNT(*) AS totalCompteAvecPhotos
                                                     FROM (SELECT COUNT(*), cibles.numero 
                                                           FROM cibles 
                                                           INNER JOIN photos 
                                                              ON cibles.id = photos.cible_id 
                                                           WHERE cibles.compte_whatsapp = "oui" 
                                                           GROUP BY cibles.numero) AS totalCompteWhatsappWithPhotos');

        $totalCompteWhatsappAvecPhotosMtn = DB::select('SELECT COUNT(*) AS totalCompteMntAvecPhotos
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
                                                                 ) AS compteWhatsappMtnWithPhoto');

        $totalCompteWhatsappAvecPhotosOrange = DB::select('SELECT COUNT(*) AS totalCompteOrangeAvecPhotos
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
                    'SELECT COUNT(*) AS totalPhotos
                     FROM photos'
                );

        $TotalcomptePhotosAuPlusCinq = DB::select(
                'SELECT COUNT(*) TotalcomptePhotosAuPlusCinq
                 FROM (SELECT COUNT(*) 
                       FROM cibles 
                       INNER JOIN photos 
                           ON photos.cible_id = cibles.id 
                           GROUP BY photos.cible_id HAVING COUNT(*) <= 5) AS result_inside_five'
        );

        $TotalcomptePhotosEntreSixEtDix = DB::select(
                'SELECT COUNT(*) AS totalCompteAvecPhotosEntreSixEtDix
                 FROM (SELECT COUNT(*) 
                       FROM cibles 
                       INNER JOIN photos 
                           ON photos.cible_id = cibles.id 
                           GROUP BY photos.cible_id HAVING COUNT(*) > 5 AND COUNT(*) <= 10  ) AS result_between_six_and_ten'
        );

        $TotalcomptePhotosSuperieurDix = DB::select(
                'SELECT COUNT(*) totalCompteAvecPhotosAuDelaDix
                 FROM (SELECT COUNT(*) 
                       FROM cibles 
                       INNER JOIN photos 
                           ON photos.cible_id = cibles.id 
                           GROUP BY photos.cible_id HAVING COUNT(*) > 10) AS result_between_six_and_ten'
        );
        
        $compteAvecLePlusDePhotos = DB::select('SELECT cibles.numero, COUNT(*) AS totalPhotos 
                                                FROM cibles 
                                                INNER JOIN photos 
                                                ON photos.cible_id = cibles.id 
                                                GROUP BY cibles.numero 
                                                HAVING COUNT(*) = (SELECT MAX(nbrePhotosParCible) 
                                                                   FROM (SELECT COUNT(*) AS nbrePhotosParCible, cibles.numero 
                                                                   FROM cibles 
                                                                   INNER JOIN photos 
                                                                      ON cibles.id = photos.cible_id 
                                                                   WHERE cibles.compte_whatsapp = "oui" 
                                                                   GROUP BY cibles.numero) AS test
                                                                   )'
                                                                );
//        dd($totalCibles[0]->totalCibles - $totalCompteWhatsapp[0]->totalCompteWhatsapp);
        $statsCompteWhatsappOperateur = [
            ['Operateur1' =>'ORANGE',
             'Total_Compte1' => $totalCompteWhatsappOrange[0]->totalCompteOrange,
             'Operateur2' => 'MTN',
             'Total_Compte2' => $totalCompteWhatsappMtn[0]->totalCompteMtn
            ],
            
            [ 'CompteWhatsapp' => 'Total_Compte_Whatsapp',
              'TotalCompteWhatsapp' => $totalCompteWhatsapp[0]->totalCompteWhatsapp,
              'AbsenceCompteWhatsapp' => 'Total_Absence_Compte_Whatsapp',
             'TotalAbsenceCompte_Whatsapp' => $totalCibles[0]->totalCibles - $totalCompteWhatsapp[0]->totalCompteWhatsapp],

            [ 'CompteWhatsappAvecPhotos' => 'Total_Compte_Whatsapp_Avec_Photos',
              'TotalCompteWhatsappAvecPhotos' => $totalCompteWhatsappAvecPhotos[0]->totalCompteAvecPhotos,
              'CompteWhatsappSansPhotos' => 'Total_Compte_Whatsapp_Sans_Photos',
              'TotalCompteWhatsappSansPhotos' => $totalCompteWhatsapp[0]->totalCompteWhatsapp - $totalCompteWhatsappAvecPhotos[0]->totalCompteAvecPhotos],

            [ 'CompteWhatsappAvecPhotosOrange' => 'Total_Compte_Whatsapp_Avec_Photos_Orange',
              'TotalCompteWhatsappAvecPhotosOrange' => $totalCompteWhatsappAvecPhotosOrange[0]->totalCompteOrangeAvecPhotos,
              'CompteWhatsappAvecPhotosMtn' => 'Total_Compte_Whatsapp_Avec_Photos_Mtn',
              'TotalCompteWhatsappAvecPhotosMtn' => $totalCompteWhatsappAvecPhotosMtn[0]->totalCompteMntAvecPhotos],

            [ 'CompteWhatsappAuPlusCinq' => 'Total_Compte_Whatsapp_Avec_Plus_Cinq',
              'TotalCompteWhatsappAvecPlusCinq' => $TotalcomptePhotosAuPlusCinq[0]->TotalcomptePhotosAuPlusCinq,
              'CompteWhatsappEntreSixEtDix' => 'Total_Compte_Whatsapp_Entre_Six_Et_Dix',
              'TotalCompteWhatsappEntreSixEtDix' => $TotalcomptePhotosEntreSixEtDix[0]->totalCompteAvecPhotosEntreSixEtDix,
              'CompteWhatsappSuperieurDix' => 'Total_Compte_Whatsapp_Superieur_Dix',
              'TotalCompteWhatsappSuperieurDix' => $TotalcomptePhotosSuperieurDix[0]->totalCompteAvecPhotosAuDelaDix
            ]

            
        ];

//        print_r(json_encode($statsCompteWhatsappOperateur));

//        dd($statsCompteWhatsappOperateur);
//        $chart = Charts::database($totalCompteWhatsappOrange, 'bar', 'highcharts')
//                                ->title("Nombre Compte Whatsapp Par Operateur")
//                                ->elementLabel("Nombre Total des Cibles")
//                                ->dimensions(1000, 500)
//                                ->responsive(false);
//        dd($chart);

        return Response($statsCompteWhatsappOperateur);
        
//        return view('stats.index', compact('chart'));

//        return view('stats.index', [
//            'totalCompteWhatsapp' => $totalCompteWhatsapp[0],
//            'totalCompteWhatsappOrange' => $totalCompteWhatsappOrange[0],
//            'totalCompteWhatsappMtn' => $totalCompteWhatsappMtn[0],
//            'totalCompteWhatsappAvecPhotos' => $totalCompteWhatsappAvecPhotos[0],
//            'totalCompteWhatsappAvecPhotosMtn' => $totalCompteWhatsappAvecPhotosMtn[0],
//            'totalCompteWhatsappAvecPhotosOrange' => $totalCompteWhatsappAvecPhotosOrange[0],
//            'totalPhotos' => $totalPhotos[0],
//            'TotalcomptePhotosAuPlusCinq' => $TotalcomptePhotosAuPlusCinq[0],
//            'TotalcomptePhotosEntreSixEtDix' => $TotalcomptePhotosEntreSixEtDix[0],
//            'TotalcomptePhotosSuperieurDix' => $TotalcomptePhotosSuperieurDix[0],
//            'compteAvecLePlusDePhotos' => $compteAvecLePlusDePhotos[0]
//        ]);
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
