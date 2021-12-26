<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pr200</title>
    <meta name="description" content="Control Zonas">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body">
    
    <template id="templatezonaSensor">
        <!-- Media de luz, humedad y temperatura -->
        <div id="divz">
            <fecha id="fechaz"> </fecha>
            <magnitud id="magnitudz"> </magnitud>
            <valor id="valorz"> </valor>
        </div>
    </template>

    <template id="templateareaSensor">
        <!-- densidad y fidelidad -->
        <h3 id="areaa">  </h3> 
        <div id="diva">
            <fecha id="fechaa"> </fecha>
            <magnitud id="magnituda"> </magnitud>
            <valor id="valora"> </valor>
        </div>
    </template>

    <header class="header">
        <h1> Zonas de Almacenamiento </h1>
        <nav class="headernav">
            <ul>
                <li> <a id="datequipo" href="index.php">Datos equipo ></a> </li>
                <li> <a id="datprueba" href="prueba.php">Datos prueba ></a> </li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <article class ="article" id="article1">
            <section class ="section" id="section1">
                <h1 id="h1"> Z100 </h1> 
                <!-- <img src="images/almendras290x85.png" alt="" class="img"/> -->
            </section>
        </article>
        <article class ="article" id="article2">
            <section class ="section" id="section2">
                <h1 id="h1"> Z200 </h1> 
                <!-- <img src="images/cacahuetes290x85.png" alt="" class="img"/> -->
            </section>
        </article>
        <article class ="article" id="article3">
            <section class ="section" id="section3">
                <h1 id="h1"> Z300 </h1> 
                <!-- <img src="images/habas290x85.png" alt="" class="img"/> -->
            </section>
        </article>
        <article class ="article" id="article4">
            <section class ="section" id="section4">
                <h1 id="h1"> Z400 </h1> 
                <!-- <img src="images/nueces290x85.png" alt="" class="img"/> -->
            </section>
        </article>
        <article class ="article" id="article5">
            <section class ="section" id="section5">
                <h1 id="h1"> Z500 </h1> 
                <!-- <img src="images/pistachos290x85.png" alt="" class="img"/> -->
            </section>
        </article>
    </main>
    <footer class="footer">
        <section class="mercadosMateriasPrimas">
            <a href="#" class="imgfoot"> <img src="" alt="" /> </a>
        </section>
        <a href="api/docs/docapi.html">API</a>
    </footer>

    <script src="js/script1.js" language="javascript" ></script>
    <script src="js/script3.js" language="javascript" ></script>
    
</body>
</html>