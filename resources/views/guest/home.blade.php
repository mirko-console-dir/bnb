<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'BoolBnB | Home Page')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Link Vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <script type="application/javascript">

    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });



  </script>
  
</head>
    <body>
        <div id="app">

            {{-- HEADER --}}
            @include('partials.home-header')

            {{-- MAIN --}}
            <main>        
                <div class="jumbotron">
                    <div class="overlay">
                        <div class="jumb_text">
                            <h1>Scopri</h1>
                            <h2>nuove destinazioni intorno a te</h2>
                        </div>
                    </div>
                </div>
                <section class="sponsored_apts">
                    <div class="title main_container">
                        <h2>Appartamenti in primo piano</h2>
                        {{-- <div class="btn">
                            Scopri tutti gli appartamenti
                        </div> --}}
                    </div>

                    <div class="template-img">
                        <!-- posso anche fare due incrementi diversi -->
                        <div class="img-array">
    
                            <div :style='`left: ${pippo}px`' class="invisibile">
    
                                <!--qua gli sto dicendo stampami tanti container-img quanti sono quelli contenuti nell'array Img e dai il bcg di ogni elemento-->
                                <div v-for='(item, index) in array_slider'  class="container-img"  :style='`background-image: url(${item.main_img})`' v-on:click="aptLink(index)">

                                    <div class="willoby">
                                        {{-- Pulsante like all'interno della foto --}}
                                        <div class="like_box">
                                            {{-- SVG Cuore --}}
                                            <svg class="heart" id="favorite-24px_3_" data-name="favorite-24px (3)" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                                <path id="Tracciato_23" data-name="Tracciato 23" d="M0,0H16V16H0Z" fill="rgba(0,0,0,0)"/>
                                                <path id="Tracciato_24" data-name="Tracciato 24" d="M8.667,15.233l-.967-.88C4.267,11.24,2,9.187,2,6.667A3.631,3.631,0,0,1,5.667,3a3.992,3.992,0,0,1,3,1.393,3.992,3.992,0,0,1,3-1.393,3.631,3.631,0,0,1,3.667,3.667c0,2.52-2.267,4.573-5.7,7.693Z" transform="translate(-0.667 -1)" fill="none" stroke="#fff" stroke-width="1"/>
                                            </svg>
                                        </div>
                    
                                        <div class="apt_text">
                                            <p class="apt_title">@{{ item.title }}</p>
                                            <svg class="dot_line" xmlns="http://www.w3.org/2000/svg" width="275" height="1" viewBox="0 0 311 1">
                                                <path id="Separator" d="M582,746.953v310" transform="translate(1057.453 -581.5) rotate(90)" fill="none" stroke="#909090" stroke-linecap="round" stroke-width="1" stroke-dasharray="0.5 12"/>
                                            </svg>
                                            <div class="price_box">
                                                <p>Prezzo di una notte in appartamento</p>
                                                <h3> @{{ Math.floor(item.price) }} €</h3>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="apt_end main_container">
                        <h3>Su BoolBnB ci sono migliaia di host che ti aiutano a scoprire il mondo in un modo diverso</h3>
                        <div class="arrows">
                            {{-- BACK --}}
                            <svg v-on:click="prevImg" xmlns="http://www.w3.org/2000/svg" width="26.845" height="18.792" viewBox="0 0 26.845 18.792">
                                <path id="Tracciato_29" data-name="Tracciato 29" d="M11.4,23.792,13.288,21.9,7.141,15.738h21.7V13.054H7.141L13.3,6.893,11.4,5,2,14.4Z" transform="translate(-2 -5)" fill="#222"/>
                            </svg>
                            {{-- FORWARD --}}
                            <svg v-on:click="nextImg" class="forward" xmlns="http://www.w3.org/2000/svg" width="26.845" height="18.792" viewBox="0 0 26.845 18.792">
                                <path id="Tracciato_29" data-name="Tracciato 29" d="M11.4,23.792,13.288,21.9,7.141,15.738h21.7V13.054H7.141L13.3,6.893,11.4,5,2,14.4Z" transform="translate(-2 -5)" fill="#222"/>
                            </svg>
                        </div>
                    </div>
                </section>
                <hr class="main_container">
                
                {{-- SEZIONE CITTA'  --}}
                <section class="cities">
                    <div class="main_container">
                        <div class="title">
                            <h2>Scopri nuove destinazioni in Italia</h2>
                            {{-- <div class="btn">
                                Esplora tutte le destinazioni
                            </div> --}}
                        </div>
            
                        <div class="cities_box">
                            {{-- Roma --}}
                            <a href="{{ url('/search?query=roma') }}" class="box rome">
                                <div class="cities_text">
                                    <h3>Roma</h3>
                                    <p>Città eterna</p>
                                </div>
                            </a>
                            {{-- Firenze --}}
                            <a href="{{ url('/search?query=firenze') }}" class="box florence">
                                <div class="cities_text">
                                    <h3>Firenze</h3>
                                    <p>Arte e cultura rinascimentale</p>
                                </div>
                            </a>
                            {{-- Milano --}}
                            <a href="{{ url('/search?query=milano') }}" class="box milan">
                                <div class="cities_text">
                                    <h3>Milano</h3>
                                    <p>Smart City-Life</p>
                                </div>
                            </a>
                            {{-- Napoli --}}
                            <a href="{{ url('/search?query=napoli') }}" class="box naples">
                                <div class="cities_text">
                                    <h3>Napoli</h3>
                                    <p>Folclore partenopeo</p>
                                </div>
                            </a>
                        </div>
            
                        <div class="end_cities">
                            <div class="arrows">
                                {{-- BACK --}}
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="26.845" height="18.792" viewBox="0 0 26.845 18.792">
                                    <path id="Tracciato_29" data-name="Tracciato 29" d="M11.4,23.792,13.288,21.9,7.141,15.738h21.7V13.054H7.141L13.3,6.893,11.4,5,2,14.4Z" transform="translate(-2 -5)" fill="#222"/>
                                </svg> --}}
                                {{-- FORWARD --}}
                                {{-- <svg class="forward" xmlns="http://www.w3.org/2000/svg" width="26.845" height="18.792" viewBox="0 0 26.845 18.792">
                                    <path id="Tracciato_29" data-name="Tracciato 29" d="M11.4,23.792,13.288,21.9,7.141,15.738h21.7V13.054H7.141L13.3,6.893,11.4,5,2,14.4Z" transform="translate(-2 -5)" fill="#222"/>
                                </svg> --}}
                            </div>
                        </div>
                        <hr>
                    </div>
                </section>
            
                {{-- Diventa Host --}}
                <section class="host_cta">
                    <div class="main_container">
                        <div class="cta_box">
                            <div class="overlay">
                                <div class="box_test">
                                    <h2>Diventa Host</h2>
                                    <p>Condividi il tuo spazio per guadagnare qualcosa in più e scoprire nuove opportunità.</p>
                                    <div class="btn">Scopri di più</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            {{-- FOOTER --}}
            @include('partials.footer')
        </div>

    </body>
</html>
