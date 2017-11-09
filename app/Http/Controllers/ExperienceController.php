<?php

namespace App\Http\Controllers;

use App\Cible;
use App\Experience;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExperienceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::all();
//        dd($experiences);
        return view('experience.index', compact('experiences'));

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
        if ($r->ajax()) {
            $experience = Experience::create($r->all());

//            $init_cible = array("null", "null", "null");





            $interval = $r->borne_max - $r->borne_min;
//            dd($interval);
            $i = 1;
            $image = array();
            $tableau = array();

            while ($i <= ($interval+1)) {
                $image[$i] = rand($r->borne_min, $r->borne_max);
                while (in_array($image[$i], $tableau)) {
                    $image[$i] = rand($r->borne_min, $r->borne_max);
                }

                $init_cible = new Cible([
                    'numero' => $image[$i],
                    'compte_whatsapp' => "null",
                    'sexe' => "null"
                ]);

                $init_cible->save();

                $experience->cibles()->attach($init_cible->id);
                $tableau[$i] = $image[$i];

                if (strtolower($experience->nom_operateur) == "orange"){
                    $manip = fopen("number_orange.vcf", "a");
                    fwrite($manip, "BEGIN:VCARD
VERSION:2.1
FN:O_" . $tableau[$i] . "
N:O_" . $tableau[$i] . "
TEL;CELL:" . $tableau[$i] . "
END:VCARD\n \n");
                    $pathname = 'master_project/bridge_folder/O_' . $tableau[$i];

                    if (!is_dir($pathname)) {
                        mkdir($pathname, 0777);
                    }

                    $file_name=$pathname.'/O_'.$tableau[$i];
                    $fp = fopen($file_name,"w");
                    fputs($fp, "0");
                    fclose($fp);
                }
                else{
                    $manip = fopen("number_mtn.vcf", "a");
                    fwrite($manip, "BEGIN:VCARD
VERSION:2.1
FN:M_" . $tableau[$i] . "
N:M_" . $tableau[$i] . "
TEL;CELL:" . $tableau[$i] . "
END:VCARD\n \n");
                    $pathname = 'master_project/bridge_folder/M_' . $tableau[$i];

                    if (!is_dir($pathname)) {
                        mkdir($pathname, 0777);
                    }

                    $file_name=$pathname.'/M_'.$tableau[$i];
                    $fp = fopen($file_name,"w");
                    fputs($fp, "0");
                    fclose($fp);
                }
                $i++;
            }

            return response()->json($experience);
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
