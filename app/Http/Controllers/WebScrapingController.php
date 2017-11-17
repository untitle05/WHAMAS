<?php

namespace App\Http\Controllers;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class WebScrapingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $parameters = '"aboudi" inurl:youtube';
        $parameters = str_replace(' ', '+', $parameters);
        $parameters = str_replace(':', '%3A', $parameters);
        $urlBase = 'https://www.google.cm/search?q=';
        $timeout = 5000;  // temps maximal d'execution d'une requete
        $timeoutConnect = 10; // temps maximal d'attente une connexion au serveur
        $httpsKey = base_path("tools/cacert.pem"); //certificat https du client goutte pour communiquer avec les sites https comme google
        $config = [
            'curl' => [
                CURLOPT_TIMEOUT => $timeout,
                CURLOPT_CONNECTTIMEOUT => $timeoutConnect,
            ],
            'verify' => $httpsKey, 
        ];

        $client->setClient(new GuzzleClient($config));

        $crawler = $client->request('GET', $urlBase.$parameters);


        $response = $client->getResponse();

        $content = $response->getContent();

        $status = $response->getStatus();

        $html = [];
        $result = [];
        $tes = null;


//            $result[] = 2;
            $result = $crawler->filter('#ires ol > div')->each( //la methode filter permet d'extraire une partie de la reponse en fonction du filtre
                function ($node) use(&$html){
                    $title = $node->filter('h3.r a')->text();
                    $link = $node->filter('h3.r a')->attr('href');
                    $link = str_replace('/url?q=', '', $link);
                    return [
                        'title' => 'papa maman',
                        'link' => $link
                    ];
                }
            );
//            $html = $crawler->filter('#ires ol > div'); //la methode filter permet d'extraire une partie de la reponse en fonction du filtre


        return view('webscraping.index', ['result' => $result]);
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
