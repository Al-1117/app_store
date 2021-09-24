<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Title -->
        <title>Show</title>
        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <!-- Script -->
        <script src="{{asset('js/show.js')}}"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>

    </head>

    <body>
        <main id="show">


            
            <div id="show_template">
                
            </div>

            
            
            
            
            {{-- TEMPLATE HANDLEBARS PER LO STAMPA DEI RISULTATI PROVENIENTI DALLA CHIAMATA AJAX --}}
            <script id="source_app_template" type="text/x-handlebars-template">
                
                {{-- APP HEADER --}}
                    <div class="container">
                        <div class="row">
                            
                            {{-- App Image --}}
                            <div class="app_header">

                                <div class="app_img_show col-sm-2 col-md-2 col-lg-2">
                                    <img src="@{{img_medium}}" alt="@{{name}}">
                                </div>
            
                                {{-- App Details --}}
                                <ul class="app_details col-sm-10 col-md-10 col-lg-10">
                                    <li class=".app_title">
                                        <h1>@{{name}}</h1>
                                    </li>
                                    <li>
                                        @{{category_name}}
                                    </li>

                                    <li class="price">
                                    @{{price}}
                                    </li>
                                </ul>
                            </div>

                            {{-- App Overview --}}
                        </div>
                        
                        <div class="row">
                            <div class="app_overview">
                                {{-- ARTIST --}}
                                <ul class="details_item col-sm-2 col-md-2 col-lg-2">
                                    <li>SVILUPPATORE </li>
                                    <li class="icon_item"><i class="fas fa-code"></i></li>
                                    <li>@{{artist}}</li>
                                </ul>

                                {{-- CATEGORY_NAME --}}
                                <ul class="details_item col-sm-2 col-md-2 col-lg-2">
                                    <li>CATEGORIA </li>
                                   <li class="icon_item"><i class="fas fa-gamepad"></i></li>
                                    <li>@{{category_name}}</li>
                                </ul>

                                {{-- TERMINI --}}
                                <ul class="details_item col-sm-2 col-md-2 col-lg-2">
                                    <li>TERM</li>
                                    <li class="icon_item"><i class="fas fa-star-of-life"></i></li>
                                    <li>@{{term}}</li>
                                </ul>

                                {{-- RIGHT LABEL --}}
                                <ul class="details_item col-sm-2 col-md-2 col-lg-2">
                                    <li>DIRITTI </li>
                                    <li class="icon_item"><i class="fas fa-copyright"></i></li>
                                    <li>@{{right_label}}</li>
                                </ul>



                                {{-- RELEASE DATE --}}
                                <ul class="details_item no_border col-sm-2 col-md-2 col-lg-2">
                                    <li>DATA RILASCIO </li>
                                    <li class="icon_item"><i class="fas fa-calendar-alt"></i></li>
                                    <li>@{{released_date}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
                    
                                    
            </script>
        </main>
    </body>
        
</html>