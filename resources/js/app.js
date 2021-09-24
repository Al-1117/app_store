
require('./bootstrap');
var $ = require("Jquery");
//const { findKey } = require('lodash');


$(document).ready(function(){

    //////////////////////////////////// HEADER///////////////////////////////////////////////
    // DATE AND TIME SECTION
    // Oggeto data corrente
    var now = new Date();

    // Recupero la data di oggi
    var today = now.getUTCDate();
    var currentMonth = now.getUTCMonth();
    var currentYear = now.getFullYear();

    var dayOfWeek = now.getUTCDay();
    
    // Array contente i giorni della settimana
    var days = ["Dom", "Lun", "Mar", "Mer", "Gio", "Ven", "Sab"];

    // Array contenente i mesi dell'anno
    var months = ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic"];

    // Recupero il nome del giorno della settimana
    var dayName = days[dayOfWeek];

    // Recupero il nome del mese dell'anno
    var monthName = months[currentMonth];

    // Recupero l'orario corrente
    var currentHour = now.getHours();
    var currentMinutes = now.getUTCMinutes();

    // Configuro i minuti in modo che se sono minori di 10, si aggiunge lo zero es " 10:03" invece di "10:3"
    currentMinutes < 10 ? currentMinutes = "0" + currentMinutes : currentMinutes;

    // Compongo la data corrente
    var currentDate = dayName +" " + today + " " + monthName + " "+ currentYear; 

    // Compongo l'orario corrente
    var currentHour = currentHour + ":" + currentMinutes; 

    // Finally! Data e orario corrente
    dateNow = currentDate + "  " + currentHour;

    // Mostro data e ora
    $('#date_time').html(dateNow);
   
    // CHIAMATA ALL'API PER RECUPERARE I DATI DA PASSARE AL TEMPLATE CHE SI OCCUPERA' DI STAMPARLI

    var address = 'http://127.0.0.1:8000/ajax-request';

    // Inizializzo un ciclo FOR per fare la chiamata AJAX alla mia funzione back-end
        
    $.ajax({
        url: address,
        method: 'GET',
        // Se la chiamata va a buon find...
        success: function (response){

            var homeTemplate = $('#app_template');

            printHomeData(response, homeTemplate);

            searchItems();

          // Se si dovessero presentare errori...
        },
        error: function(){
            alert('Ops...Qualcosa è andato storto.');
        }

    });

    // CHANGE SELECTED ITEM ON LEFT NAVIGATION BAR
    var item = $('.lateral_nav ul li');

    item.on('click', function(){
        $(this).addClass('selected');
        $(this).siblings().removeClass('selected');
        
    })


    ////////////////////////// FUNCTIONS ///////////////////////////////////
    // AJAX CALL FUNCTION

    function printHomeData (response, printTemplate){

        var array_apps = response.data;

        //Compilo il template Handlebars
        var source = $('#source_app_template').html();
        var template = Handlebars.compile(source);
        
        // Definisco i dati che mi servono per la succesiva stampa
        for (var i = 0; i < array_apps.length; i++) {

            var single_app = array_apps[i];
            // Compilo il contesto
            var context = {
                id : single_app.id,
                name : single_app.name,
                img_small : single_app.img_small,
                summary : single_app.summary,
                category_name : single_app.category_name,
                currency : single_app.currency,
                amount : single_app.price

            }
            // Aggiungo ogni singolo oggetto al template
            var html = template(context);

            printTemplate.append(html);
            
        }




    }

    // SEARCH FUNCTION
    // Funzione che permette di cercare le app inserendo il nome

    function searchItems(){


        $('.search_input').on('keyup', function(){

            $('.single_app').each(function(){

                //$('#app_template').html('');

                var inputValue = $('.search_input').val().toLowerCase();
                var searchElement = $(this).find('.app_name').text().toLowerCase();
                //var searchElement = $(this);
                //console.log('input value: ' + inputValue);
                //console.log('search element: ' + searchElement);

                if(searchElement.includes(inputValue)){
                    $(this).show();
                    //$('#app_template').append(searchElement);

                } else{
                    $(this).hide();
                }
             

            })

        })

    }


   /*  function printShowData(printTemplate){

        // CHIAMATA ALL'API PER RECUPERARE I DATI DA PASSARE AL TEMPLATE CHE SI OCCUPERA' DI STAMPARLI
        var address = 'http://127.0.0.1:8000/ajax-request';

        // Inizializzo un ciclo FOR per fare la chiamata AJAX alla mia funzione back-end
            
        $.ajax({
            url: address,
            method: 'GET',
            // Se la chiamata va a buon find...
            success: function (response){

                var array_apps = response.data;
                //Compilo il template Handlebars
                var source = $('#source_app_template').html();
                var template = Handlebars.compile(source);
                
                // Definisco i dati che mi servono per la succesiva stampa
                for (var i = 0; i < array_apps.length; i++) {
        
                    var single_app = array_apps[i];
                    // Compilo il contesto

                    var context = {
                        id : single_app.id,
                        name : single_app.name,
                        img_small : single_app.img_small,
                        summary : single_app.summary,
                        category_name : single_app.category_name,
                        currency : single_app.currency,
                        amount : single_app.price
        
                    }

   
                    // Aggiungo ogni singolo oggetto al template
                    var html = template(context);
        
                    printTemplate.append(html);
                    
                }
        

            // Se si dovessero presentare errori...
            },
            error: function(){
                alert('Ops...Qualcosa è andato storto.');
            }

        });



    }
 */
   
   


        
    

    

});

