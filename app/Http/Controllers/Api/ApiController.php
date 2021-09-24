<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use App\Models\AppModel;

class ApiController extends Controller
{
    
    public function create(){

        return view('app_store.home');
        
    }

    public function show(){
       
        return view('app_store.show');
        
    }

    public function store(){

        //Faccio la chiamata all'endpoint Apple per receuperare i dati
        $get_data = Http::get('https://itunes.apple.com/us/rss/toppaidapplications/limit=200/json')['feed']['entry'];
        $apps_array = [];

        // Inizializzo un ciclo per complilare l'oggeto e popolare l'array
        foreach ($get_data as $index => $this_app){

            $app = new AppModel();
        
            $app->id = $index + 1;
            $app->name = $this_app['im:name']['label'];
            $app->img_small = $this_app['im:image'][0]['label'];
            $app->img_medium = $this_app['im:image'][1]['label'];
            $app->img_big = $this_app['im:image'][2]['label'];
            $app->summary = $this_app['summary']['label'];
            $app->price = $this_app['im:price']['label'];
            $app->amount = $this_app['im:price']['attributes']['amount'];
            $app->currency = $this_app['im:price']['attributes']['currency'];
            $app->term = $this_app['im:contentType']['attributes']['label'];
            $app->right_label = $this_app['rights']['label'];
            $app->title = $this_app['title']['label'];
            $app->artist = $this_app['im:artist']['label'];
            $app->category_id = $this_app['category']['attributes']['im:id'];
            $app->category_name = $this_app['category']['attributes']['label'];

            //Creo l'oggetto DATA;
            $released_date = date_create($this_app['im:releaseDate']['label']);
            
            //Trasformo l'oggetto DATA nel formato che mi serve
            $formated_date = date_format($released_date,"d-M-Y");
            $app->released_date = $formated_date;            

            // Inserisco ogni singola applicazione in un array
            $apps_array[] = $app;
        
        }

        // Creo la risposta da inviare al frontEnd in un array
        $response = array(
           'success' => true,
           'data' => $apps_array
        );
        // Ritorno la risposta in un formato JSON
        return response()->json($response);
 
    }
   
}
