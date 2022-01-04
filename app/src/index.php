<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isla Mágica</title>
    <meta name="description" content="Control Zonas">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body">
    <!-- Media de luz, humedad y temperatura -->
    <template id="templatezonaSensor">
        <div class="divz">
            <img class="iconz"> </img>
            <magnitud id="magnitudz"> </magnitud>
            <valor id="valorz"> </valor>
        </div>
    </template>
    <!-- densidad y fidelidad -->
    <template id="templateareaSensor">
        <h3 id="areaa">  </h3> 
        <div class="diva">
            <magnitud id="magnituda"> </magnitud>
            <valor id="valora"> </valor>
        </div>
    </template>

    <header class="header">

        <h1> Isla Mágica </h1>
        <nav class="headernav">
            <ul>
                <li> <a id="datequipo" href="index.php">Datos equipo ></a> </li>
                <li> <a id="datprueba" href="prueba.php">Datos prueba ></a> </li>
            </ul>
        </nav>
        <form onSubmit="return descuentosCliente()" name ="formularioContacto" method="get" action="index.php">
            <label>UID cliente:<input type="text" name="uid" id="uid"></label>
            <button type="submit"> Consultar descuentos </button>
        </form>

    </header>
    <main class="main">
        <div id="contenedormapa">
            <img src="images/mapas/mapa.jpg" alt="mapaCompleto" class="mapa" id="img0"/>
            <img src="images/mapas/zonaSevillaPuertoDeIndias.jpg" alt="zonaSevillaPuertoDeIndias" class="mapa oculto" id="img1"/>
            <img src="images/mapas/zonaPuertaDeAmerica.jpg" alt="zonaPuertaDeAmerica" class="mapa oculto" id="img2"/>
            <img src="images/mapas/zonaAmazonia.jpg" alt="zonaAmazonia" class="mapa oculto" id="img3"/>
            <img src="images/mapas/zonaGuaridaDePiratas.jpg" alt="zonaGuaridaDePiratas" class="mapa oculto" id="img4"/>
            <img src="images/mapas/zonaElDorado.jpg" alt="zonaElDorado" class="mapa oculto" id="img5"/>
        </div>
        <section>
            <article class ="article" id="1">
                <h1 class="tituloZonas"> Sevilla, Puerto de Indias </h1>
                <section class ="oculto sectionZona" id="section1">
                    <!-- <img src="images/almendras290x85.png" alt="" class="img"/> -->
                </section>
                <section class ="oculto sectionArea" id="sectionareas1">   </section>
            </article>
            <article class ="article" id="2">
                <h1 class="tituloZonas"> Puerta de América </h1>
                <section class ="oculto sectionZona" id="section2"> 
                    <!-- <img src="images/cacahuetes290x85.png" alt="" class="img"/> -->
                </section>
                <section class ="oculto sectionArea" id="sectionareas2">   </section>
            </article>
            <article class ="article" id="3">
                <h1 class="tituloZonas"> Amazonia </h1>
                <section class ="oculto sectionZona" id="section3">   
                    <!-- <img src="images/habas290x85.png" alt="" class="img"/> -->
                </section>
                <section class ="oculto sectionArea" id="sectionareas3">   </section>
            </article>
            <article class ="article" id="4">
                <h1 class="tituloZonas"> La Guarida de los Piratas </h1>
                <section class ="oculto sectionZona" id="section4"> 
                    <!-- <img src="images/nueces290x85.png" alt="" class="img"/> -->
                </section>
                <section class ="oculto sectionArea" id="sectionareas4">   </section>
            </article>
            <article class ="article" id="5">
                <h1 class="tituloZonas"> El Dorado </h1>
                <section class ="oculto sectionZona" id="section5">  
                    <!-- <img src="images/pistachos290x85.png" alt="" class="img"/> -->
                </section>
                <section class ="oculto sectionArea" id="sectionareas5">   </section>
            </article>
        </section>

    </main>

    <footer class="footer">
        <section class="mercadosMateriasPrimas">
            <a href="#" class="imgfoot"> <img src="" alt="" /> </a>
        </section>
        <a href="api/docs/docapi.html">API</a>
    </footer>

    <script src="js/script1.js" language="javascript" ></script>
    <script src="js/script2.js" language="javascript" ></script>
    
</body>
</html>