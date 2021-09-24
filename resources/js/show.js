
require('./bootstrap');
var $ = require("Jquery");

$(document).ready(function(){

    // Template su cui stampare i dati
    var showTemplate = $('#show_template');

    // Funzione per la stampa dei dati
    printShowData(showTemplate);
    

   

    ////////////////////////// FUNCTIONS ///////////////////////////////////

    function printShowData(printTemplate){

        // CHIAMATA ALL'API PER RECUPERARE I DATI DA PASSARE AL TEMPLATE CHE SI OCCUPERA' DI STAMPARLI
        var address = 'http://127.0.0.1:8000/ajax-request';

        // Inizializzo un ciclo FOR per fare la chiamata AJAX alla mia funzione back-end
            
        $.ajax({
            url: address,
            method: 'GET',
            // Se la chiamata va a buon find...
            success: function (response){

                var array_apps = response.data;

                // Recupero URL della pagina
                pageURL = window.location.pathname;
                
                // Recupero l'id 
                var urlId = pageURL.substring(6);
            
                //Compilo il template Handlebars
                var source = $('#source_app_template').html();
                var template = Handlebars.compile(source);
                
                // Definisco i dati che mi servono per la succesiva stampa
                for (var i = 0; i < array_apps.length; i++) {
                    
                    var single_app = array_apps[i];
                    
                    var context = {
                        id : single_app.id,
                        name : single_app.name,
                        img_medium : single_app.img_medium,
                        summary : single_app.summary,
                        category_name : single_app.category_name,
                        price : single_app.price,
                        amount : single_app.amount,
                        currency : single_app.currency,
                        term : single_app.term,
                        right_label : single_app.right_label,
                        artist : single_app.artist,
                        category_id : single_app.category_id,
                        released_date : single_app.released_date

                    }

                    // Aggiungo ogni singolo oggetto al template
                    var html = template(context);

                    var urlId = pageURL.substring(6);

                   if(urlId == single_app.id){

                    printTemplate.append(html);
                  }
                  
                }

            // Se si dovessero presentare errori...
            },
            error: function(){
                alert('Ops...Qualcosa è andato storto.');
            }

        });

    }

});

