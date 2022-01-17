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
<body class="body a">
    <!-- Media de luz, humedad, temperatura y densidad-->
    <template id="templatezonaSensor">
        <div class="divz">
            <img class="iconz"> </img>
            <valor class="valorz"> </valor>
        </div>
    </template>

    <header class="header ">

        <img src="images/LOGO_IM-RGB.png" class="imglogo"></img>

        <section class="headersection">
            
            <nav class="headernav">  
                <ul class="menu">
                    <li> <a href="index.php" class="b boton" tabindex="1">Datos equipo </a> </li>
                    <li> <a href="prueba.php" class="b boton" tabindex="2">Datos prueba </a> </li>
                    <li> <button id="button" tabindex="3">Dark Mode</button> </li>
                </ul>
            </nav>

            <form onSubmit="return descuentosCliente()" name ="formularioContacto" method="get" action="index.php">
                <label><input type="text" name="uid" id="uid" placeholder=" uid cliente" tabindex="4"></label>
                <button type="submit" class="boton b" tabindex="5"> Descuento </button>
            </form>

        </section>

    </header>
    <main class="main ">

        <div class="contenedormapa">
            <img src="images/mapas/mapa.jpg" alt="mapaCompleto" class="mapa" id="img0"/>
            <img src="images/mapas/zonaSevillaPuertoDeIndias.jpg" alt="zonaSevillaPuertoDeIndias" class="mapa oculto" id="img1"/>
            <img src="images/mapas/zonaPuertaDeAmerica.jpg" alt="zonaPuertaDeAmerica" class="mapa oculto" id="img2"/>
            <img src="images/mapas/zonaAmazonia.jpg" alt="zonaAmazonia" class="mapa oculto" id="img3"/>
            <img src="images/mapas/zonaGuaridaDePiratas.jpg" alt="zonaGuaridaDePiratas" class="mapa oculto" id="img4"/>
            <img src="images/mapas/zonaElDorado.jpg" alt="zonaElDorado" class="mapa oculto" id="img5"/>
        </div>

        <section class="sectionZonas">

            <article class ="article b" id="1">
               
                <header class="headerTituloZonas" >
                    <h1 class="tituloZonas"> Sevilla, Puerto de Indias </h1>
                    <button tabindex="6" class="botonflecha">
                        <img src="images/flecha-abajo.png" alt="flecha-direccion" class="flechadireccion" >
                    </button>
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
                <img src="images/mapas/responsive/SevillaPuertoDeIndias.png" alt="zonaSevillaPuertoDeIndias" class="imgresponsive oculto"/>

            </article>
            <article class ="article b" id="2">
                
                <header class="headerTituloZonas" >
                    <h1 class="tituloZonas"> Puerta de América </h1>
                    <button tabindex="7" class="botonflecha">
                        <img src="images/flecha-abajo.png" alt="flecha-direccion" class="flechadireccion" >
                    </button>                </header>
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
                <img src="images/mapas/responsive/PuertaDeAmerica.png" alt="zonaSevillaPuertoDeIndias" class="imgresponsive oculto"/>

            </article>
            <article class ="article b" id="3">
                
                <header class="headerTituloZonas">
                    <h1 class="tituloZonas"> Amazonia </h1>
                    <button tabindex="8" class="botonflecha">
                        <img src="images/flecha-abajo.png" alt="flecha-direccion" class="flechadireccion" >
                    </button>                </header>
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
                <img src="images/mapas/responsive/Amazonia.png" alt="zonaSevillaPuertoDeIndias" class="imgresponsive oculto"/>

            </article>
            <article class ="article b" id="4">

                <header class="headerTituloZonas">
                    <h1 class="tituloZonas"> La Guarida de los Piratas </h1>
                    <button tabindex="9" class="botonflecha">
                        <img src="images/flecha-abajo.png" alt="flecha-direccion" class="flechadireccion" >
                    </button>                </header>
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
                <img src="images/mapas/responsive/GuaridaDePiratas.png" alt="zonaSevillaPuertoDeIndias" class="imgresponsive oculto"/>

            </article>
            <article class ="article b" id="5">

                <header class="headerTituloZonas">
                    <h1 class="tituloZonas"> El Dorado </h1>
                    <button tabindex="10" class="botonflecha">
                        <img src="images/flecha-abajo.png" alt="flecha-direccion" class="flechadireccion" >
                    </button>                </header>
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
                <img src="images/mapas/responsive/ElDorado.png" alt="zonaSevillaPuertoDeIndias" class="imgresponsive oculto"/>

            </article>

        </section>

    </main>

    <footer class="footer b">

        <a href="https://github.com/moimu"><img src="images/GitHub-Mark-32px.png" alt="logoGithub" class="logofooter"/></a>
        <a href="api/docs/docapi.html"><img src="images/api.png" alt="logoApi" class="logofooter"/></a>

    </footer>

    <script src="js/script1.js" language="javascript" ></script>
    <script src="js/script3.js" language="javascript" ></script>
    
</body>
</html>