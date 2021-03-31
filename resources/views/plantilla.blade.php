<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
        <script src="https://kit.fontawesome.com/5b5467fb30.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        
            
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <title>Hello, world!</title>


        <style>
            .tituloNav{
                text-shadow: 0.1em 0.1em #000;
                color: #0088cc;
            }
            .copyright {
                bottom:0;
                clear: both;
                position: relative;
                width: 100%;
                height:70px;
                margin-top:300px;
                text-align: center;
              
            }
            .container{
                margin-top: 70px;
                position:relative;
                height: 100%;
                max-height: auto;
            }
            .titulo{
                text-shadow: 0.03em 0.03em #000;
                text-align: center;
            }
            .colorLabel{
                color: #ccc;
            }
        </style>

    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="navbar-nav">
                    <h3 class="color1 tituloNav ">Gonzalo Sepúlveda Y.</h3>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="mr-auto"></ul>
                    <ul class="navbar-nav">
                        <li class="nav-item active  ">
                            <a class="nav-link" href="{{route('home')}}" >Inicio <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>


        <div class="container ">
            @yield('seccion')
        </div>

        <!-- ----------------------------FOOTER ----------------- -->
        <footer>
            <div class="copyright bg-dark">
                <h4 class="tituloNav">&copy; <?= date('Y') ?> Copyright.</h4>
            </div>
        </footer>

      <!--------SCRIPT --------> 
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    </body>
</html>