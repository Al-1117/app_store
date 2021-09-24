<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Title -->
        <title>App Store</title>
        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <!-- Script -->
        <script src="{{asset('js/app.js')}}"></script>
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>

    </head>

    <body>
        {{-- APP WRAPPER --}}
        <div class="app_wrapper">
            {{-- HEADER SECTION --}}
            <header>
                <div class="nav_bar">
                    <div class="container-fluid">
                        <div class="row">
                            {{-- Navbar --}}
                            <div class="left app_menu col-5">
                                <ul>
                                    {{-- Apple Logo --}}
                                    <li class="logo">
                                        <i class="fab fa-apple apple_logo"></i>
                                    </li>
                                    <li>App Store</li>
                                    <li>Modifica</li>
                                    <li>Store</li>
                                    <li>Finestra</li>
                                    <li>Aiuto</li>
                                </ul>
                            </div>
                            {{-- Status bar --}}
                            <div class="right app_menu col-6 offset-sm-1">
                                <ul>
                                    <li>50%</li>
                                    <li><i class="fas fa-battery-half"></i></li>
                                    <li><i class="fas fa-wifi"></i></li>
                                    <li><i class="fas fa-search"></i></li>
                                    {{-- To be set by JS  --}}
                                    <li id="date_time"></li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>    
            </header>

            {{-- MAIN CONTENT --}}
            <div class="app_container">
                {{-- Left Side --}}
                <div class="left_side">
                    {{-- Mac's Windows buttons control --}}
                    <div class="window_buttons">
                        <ul>
                            <li><span></span></li>
                            <li><span></span></li>
                            <li><span></span></li>
                        </ul>
                    </div>
                    {{-- Search area --}}
                    <div class="search">
                        <div class="search_container">
                            <i class="fa fa-search search_icon" aria-hidden="true"></i>
                            <input class="search_input" type="text" value="" placeholder="Cerca">
                        </div>
                    </div>
                    {{-- Lateral Navigation --}}
                    <div class="lateral_nav">
                        <ul>
                            <li class="">
                                <i class="far fa-star"></i>
                                Scopri
                            </li>

                            <li>
                                <i class="fas fa-gamepad"></i>
                                Arcade
                            </li>

                            <li>
                                <i class="fas fa-paint-brush"></i>
                                Crea
                            </li>
                            
                            <li>
                                <i class="far fa-paper-plane"></i>
                                Lavora</li>
                            <li class="selected">
                                <i class="fas fa-rocket"></i>
                                Gioca
                            </li>

                            <li>
                                <i class="fas fa-hammer"></i>
                                Sviluppa
                            </li>
                            
                            <li>
                                <i class="fas fa-stream"></i>
                                Categorie
                            </li>
                            
                            <li>
                                <i class="far fa-arrow-alt-circle-down"></i>
                                Aggiornamenti
                            </li>
                        </ul>

                    </div>
                        
                </div>

                {{-- Right Side --}}
                <div class="right_side">

                    <div class="section_title">
                        <h2>Scopri</h2>
                    </div>

                    <div class="main_content">
                         {{-- Section intro --}}
                        <div class="title">
                            <h1>Gioca</h1>
                            <hr>
                        </div>

                        {{-- App Container --}}

                        <div class="main_app_container">
                            <div id="app_template" class="app_container ">
                               
                            </div>
                            {{-- TEMPLATE HANDLEBARS PER LO STAMPA DEI RISULTATI PROVENIENTI DALLA CHIAMATA AJAX --}}
                            <script id="source_app_template" type="text/x-handlebars-template">
                                <ul class="single_app col-lg-4 col-md-6">
                                    <li class="app_img">
                                        <img src="@{{img_small}}" alt="">
                                    </li>
                                    <li class="app_details">
                                        <a href="{{url('show')}}/@{{id}}"><h6 class="app_name">@{{name}}</h6></a>
                                        <p>@{{summary}}</p>
                                        <span>@{{category_name}}</span>
                                        <h5 class="price"><a href="">@{{amount}}</a></h5>
                                    </li>  
                                </ul>
                            </script>

                        </div>
                    </div>
                    
                </div>

            </div>

        </div>

    </body>

</html>