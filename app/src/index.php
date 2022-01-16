<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isla Mágica - Parque temático y acuático Sevilla</title>
    <meta name="description" content="Control Zonas">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tillana:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body">
    <!-- Media de luz, humedad, temperatura y densidad-->
    <template id="templatezonaSensor">
        <div class="divz">
            <img class="iconz"> </img>
            <valor class="valorz"> </valor>
        </div>
    </template>

    <header class="header">

        <img src="images/LOGO_IM-RGB.png" class="imglogo"></img>

        <section class="headersection">
            
            <nav class="headernav">  
                <img src="images/menu.png" class="imgmenu"></img> 
                <ul class="menu">
                    <li> <a id="datequipo" href="index.php">Datos equipo </a> </li>
                    <li> <a id="datprueba" href="prueba.php">Datos prueba </a> </li>
                </ul>
            </nav>

            <form onSubmit="return descuentosCliente()" name ="formularioContacto" method="get" action="index.php">
                <label><input type="text" name="uid" id="uid" placeholder=" uid cliente"></label>
                <button type="submit" class="boton"> Descuento </button>
            </form>

        </section>

    </header>
    <main class="main">

        <div class="contenedormapa">
            <img src="images/mapas/mapa.jpg" alt="mapaCompleto" class="mapa" id="img0"/>
            <img src="images/mapas/zonaSevillaPuertoDeIndias.jpg" alt="zonaSevillaPuertoDeIndias" class="mapa oculto" id="img1"/>
            <img src="images/mapas/zonaPuertaDeAmerica.jpg" alt="zonaPuertaDeAmerica" class="mapa oculto" id="img2"/>
            <img src="images/mapas/zonaAmazonia.jpg" alt="zonaAmazonia" class="mapa oculto" id="img3"/>
            <img src="images/mapas/zonaGuaridaDePiratas.jpg" alt="zonaGuaridaDePiratas" class="mapa oculto" id="img4"/>
            <img src="images/mapas/zonaElDorado.jpg" alt="zonaElDorado" class="mapa oculto" id="img5"/>
        </div>

        <section class="sectionZonas">

            <article class ="article" id="1">
               
                <header class="headerTituloZonas">
                    <h1 class="tituloZonas"> Sevilla, Puerto de Indias </h1>
                    <img src="images/flecha-abajo.png" alt="flecha-direccion" class="flechadireccion">
                </header>
                <section class ="oculto sectionZona" id="section1">
                    <div class="mediciones">
                        <h2> Mediciones </h2>
                    </div>
                    <div class="descuentos">
                        <h2> Descuentos </h2>
                    </div> 
                    <div class="productos">
                        <h2> Productos </h2>
                    </div> 
                </section>
                <section class ="oculto sectionArea" id="sectionareas1">   </section>
                <img src="images/mapas/responsive/SevillaPuertoDeIndias.png" alt="zonaSevillaPuertoDeIndias" class="imgresponsive oculto"/>

            </article>
            <article class ="article" id="2">
                
                <header class="headerTituloZonas">
                    <h1 class="tituloZonas"> Puerta de América </h1>
                    <img src="images/flecha-abajo.png" alt="flecha-direccion" class="flechadireccion">
                </header>
                <section class ="oculto sectionZona" id="section2"> 
                    <div class="mediciones">
                        <h2> Mediciones </h2>
                    </div>
                    <div class="descuentos">
                        <h2> Descuentos </h2>
                    </div> 
                    <div class="productos">
                        <h2> Productos </h2>
                    </div>  
                </section>
                <section class ="oculto sectionArea" id="sectionareas2">   </section>
                <img src="images/mapas/responsive/PuertaDeAmerica.png" alt="zonaSevillaPuertoDeIndias" class="imgresponsive oculto"/>

            </article>
            <article class ="article" id="3">
                
                <header class="headerTituloZonas">
                    <h1 class="tituloZonas"> Amazonia </h1>
                    <img src="images/flecha-abajo.png" alt="flecha-direccion" class="flechadireccion">
                </header>
                <section class ="oculto sectionZona" id="section3">   
                    <div class="mediciones">
                        <h2> Mediciones </h2>
                    </div>
                    <div class="descuentos">
                        <h2> Descuentos </h2>
                    </div> 
                    <div class="productos">
                        <h2> Productos </h2>
                    </div> 
                </section>
                <section class ="oculto sectionArea" id="sectionareas3">   </section>
                <img src="images/mapas/responsive/Amazonia.png" alt="zonaSevillaPuertoDeIndias" class="imgresponsive oculto"/>

            </article>
            <article class ="article" id="4">

                <header class="headerTituloZonas">
                    <h1 class="tituloZonas"> La Guarida de los Piratas </h1>
                    <img src="images/flecha-abajo.png" alt="flecha-direccion" class="flechadireccion">
                </header>
                <section class ="oculto sectionZona" id="section4"> 
                    <div class="mediciones">
                        <h2> Mediciones </h2>
                    </div>
                    <div class="descuentos">
                        <h2> Descuentos </h2>
                    </div> 
                    <div class="productos">
                        <h2> Productos </h2>
                    </div>               
                </section>
                <section class ="oculto sectionArea" id="sectionareas4">   </section>
                <img src="images/mapas/responsive/GuaridaDePiratas.png" alt="zonaSevillaPuertoDeIndias" class="imgresponsive oculto"/>

            </article>
            <article class ="article" id="5">

                <header class="headerTituloZonas">
                    <h1 class="tituloZonas"> El Dorado </h1>
                    <img src="images/flecha-abajo.png" alt="flecha-direccion" class="flechadireccion">
                </header>
                <section class ="oculto sectionZona" id="section5">  
                    <div class="mediciones">
                        <h2> Mediciones </h2>
                    </div>
                    <div class="descuentos">
                        <h2> Descuentos </h2>
                    </div> 
                    <div class="productos">
                        <h2> Productos </h2>
                    </div> 
                </section>
                <section class ="oculto sectionArea" id="sectionareas5">   </section>
                <img src="images/mapas/responsive/ElDorado.png" alt="zonaSevillaPuertoDeIndias" class="imgresponsive oculto"/>

            </article>

        </section>

    </main>

    <footer class="footer">

        <section class="mercadosMateriasPrimas">
            <a href="#" class="imgfoot"> <img src="" alt="" /> </a>
            <a href="https://github.com/moimu"><img src="images/GitHub-Mark-32px.png" alt="logoGithub" class="logofooter"/></a>
        </section>
        
        <a href="api/docs/docapi.html"><img src="images/api.png" alt="logoApi" class="logofooter"/></a>

    </footer>

    <script src="js/script1.js" language="javascript" ></script>
    <script src="js/script2.js" language="javascript" ></script>
    
</body>
</html>