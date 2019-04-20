<!DOCTYPE html>

<?php



require 'simple_html_dom.php';

$html = file_get_html('http://www.lospleimovil.cl/cartelera.php');

$shows = $html->find('div.caluga_cartelera');

$cantidad_shows = count($shows);

for ($i=0; $i < $cantidad_shows; $i++) { 
   $titulo[$i] = $shows[$i]->find('h3',0)->plaintext;
   $descripcion[$i] = $shows[$i]->find('p',0)->plaintext;   
   $imagen[$i] = "http://www.lospleimovil.cl/" . $shows[$i]->find('img',0)->src;
}
 

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        .contenido{
            margin-top: 60px;
        }
        .titulo{
            margin-top:10px;
            font-size: 20px;
            font-weight: 600;
            height: 45px;
        }
        .card-content{
            padding: 10px !important;
        }
        .card-content p{
            text-align: left;
            font-size: 14px;
            line-height: 16px;
            font-weight: 500;
            color: #777;
        }
    </style>
    
</head>
<body>

    <div class="navbar-fixed">
        <nav class="nav-extended blue">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center">Logo</a>
            </div>
            <div class="nav-content">
                <ul class="tabs tabs-transparent">
                    <li class="tab"><a class="active" href="#obras">Obras</a></li>
                    <li class="tab"><a href="#votacion">Votacion</a></li>
                </ul>
            </div>
        </nav>
    </div>
    
    <div id="obras" class="container contenido">
        <div class="row center">

            <?php 
            for ($i=0; $i < $cantidad_shows; $i++) { 
                  
                echo <<< EOT
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="$imagen[$i]" alt="$imagen[$i]">
                        </div>
                        <div class="card-content">
                            <h3 class="titulo">$titulo[$i]</h3>
                            <p>$descripcion[$i]</p>
                        </div>
                    </div>
                </div>

    
EOT;
            }
    
?>
        </div>
    </div>

    
    <div id="votacion" class="container contenido">
        <div class="row">
            <div class="col s12 btn-flat disabled"></div>
            <a href="#" id="readQR" class="col s12 waves-effect waves-light btn">Escanear Qr</a>
            <div class="col s12 btn-flat disabled"></div>
            <div class="col s12 btn-flat disabled"></div>
            <a href="#votos" class="col s12 waves-effect waves-light btn modal-trigger">Votar</a>
            <div class="col s12 btn-flat disabled"></div>
            <a href="#titulos" class="col s12 waves-effect waves-light btn modal-trigger">Proponer titulo</a>
            
        </div>
    </div>
    
    <div class="modal modal-fixed-footer" id="votos">
        <div class="modal-content">
            <form action="#" id="votosF">
                <p>
                    <label>
                        <input type="radio" name="voto" value="1" checked>
                        <span>Opcion 1</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input type="radio" name="voto" value="2">
                        <span>Opcion 2</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input type="radio" name="voto" value="3">
                        <span>Opcion 3</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input type="radio" name="voto" value="4">
                        <span>Opcion 4</span>
                    </label>
                </p>

            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" form="votosF" class="btn modal-close">Enviar</button>
        </div>

    </div>

    <div class="modal" id="titulos">
        <div class="modal-content">
            <form action="#" id="titulosF">
                <div class="input-field">
                    <input type="text" name="titulo" id="tituloL" class="validate">
                    <label for="tituloL">Titulo</label>
                </div>
                
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" form="titulosF" class="btn">Enviar</button>
        </div>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script>
        M.AutoInit();
    </script>

    

</body>
</html>
