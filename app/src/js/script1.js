/**
 * obtengo nodeList con articulos para imprimir en ellos datos recabados
 */
const articles = document.querySelectorAll('article');

/**
 * obtención de los templates del documento
 */
const templatezonaSensor = document.querySelector('#templatezonaSensor');
const templateareaSensor = document.querySelector('#templateareaSensor');

/**
 * Trata dos solicitudes con fetch,
 * añade valores a los templates de los sensores de zona
 * y las areas contenidas.
 * Trata las peticiones no resueltas imprimiendo en documento
 * mensaje.
 * 
 * @param {array} solicitudes urls servidor para solicitudes
 * @param {object} article articulo extraida del DOM
 * @return void
 */
const calcFidelidad = [];
let MedLuminosidad = 0;
let MedTemperatura = 0;
let MedHumedad = 0;
function pintasolicitudes( solicitudes, article ){

    const mediasMediciones = [];
    
    for( let i = 0; i < 2; i++ ){
        promise = fetch(`${solicitudes[i]}`);
        promise
        .then( response => {
            return response.json();
        })
        .then( data => {
            let clon ="clon";
            
            data.mediciones.forEach( (medicion,index) => {
                // console.log(medicion);
                let unidad = "";
                switch(medicion.magnitud){
                    case "luminosidad":
                        unidad = "%";
                        break;
                    case "medLuminosidad":
                        unidad = "%";
                        break;
                    case "temperatura":
                        unidad = "º";
                        break;
                    case "medTemperatura":
                        unidad = "º";
                        break;
                    case "humedad":
                        unidad = "%";
                        break;
                    case "medHumedad":
                        unidad = "%";
                        break;
                    case "densidad":
                        unidad = "%";
                        break;
                    default:
                        unidad = "";
                }
                if( medicion.magnitud === "fidelidad" ){ // Guardo objetos magnitud fidelidad en calcFidelidad[]

                    calcFidelidad.push(medicion);

                }
                else if ( medicion.magnitud == "medLuminosidad" || medicion.magnitud == "medTemperatura"
                        || medicion.magnitud == "medHumedad" || medicion.magnitud == "densidad" ){

                    this[clon+solicitudes[0]+index] = templatezonaSensor.content.cloneNode(true);
                    this[clon+solicitudes[0]+index].querySelector('.divz').classList.add(medicion.magnitud);
                    this[clon+solicitudes[0]+index].querySelector('.iconz').src = "images/icon/"+medicion.magnitud+".png"
                    this[clon+solicitudes[0]+index].querySelector('.valorz').innerHTML = medicion.valor+unidad;
                    article.querySelector(".mediciones").appendChild( this[clon+solicitudes[0]+index] );

                    if( medicion.magnitud == "densidad" ){ // % descuento por densidad en Zona

                        this[clon+solicitudes[0]+index] = templatezonaSensor.content.cloneNode(true);
                        this[clon+solicitudes[0]+index].querySelector('.divz').classList.add("descuentoDensidad");
                        this[clon+solicitudes[0]+index].querySelector('.iconz').src = "images/icon/descuento.png"
                        this[clon+solicitudes[0]+index].querySelector('.valorz').innerHTML=descuentoPorDensidadZona(medicion.valor)+unidad+" + % descuento fidelidad";
                        article.querySelector(".descuentos").appendChild( this[clon+solicitudes[0]+index] );
                        
                    }
                    if( medicion.magnitud == "medLuminosidad" ){
                        mediasMediciones.splice( 0 , 0, medicion.valor );
                        MedLuminosidad = medicion.valor;
                    }
                    if( medicion.magnitud == "medTemperatura" ){
                        mediasMediciones.splice( 1 , 0, medicion.valor );
                        MedTemperatura = medicion.valor;
                    }
                    if( medicion.magnitud == "medHumedad" ){
                        mediasMediciones.splice( 2 , 0, medicion.valor );
                        MedHumedad = medicion.valor;
                    }

                }
                
            })
            if( i == 1 ){ // cuando se haya completado los 2 peticiones Descuentos Climatología
                
                // funcion que usa promesa para obtener si Zona tiene descuento en comida o bebida, no funciona la promesa
                // descuentoAlimentos(  mediasMediciones[0], mediasMediciones[1], mediasMediciones[2] );

                const objetoDesAlimentacion = desAlimentos(  mediasMediciones[0], mediasMediciones[1], mediasMediciones[2] )

                const imagen = document.createElement('img');
                imagen.classList.add('iconz');
                objetoDesAlimentacion.desBebida == true ? imagen.src = "/images/icon/bebida.png":imagen.src = "/images/icon/bebidaNO.png";
                article.querySelector(".productos").appendChild( imagen );

                const imagen2 = document.createElement('img');
                imagen2.classList.add('iconz');
                objetoDesAlimentacion.desComida == true ? imagen2.src = "/images/icon/comida.png" : imagen2.src = "/images/icon/comidaNO.png";
                article.querySelector(".productos").appendChild( imagen2 );

            }
        })
        .catch( function ( error ) {
            const pError = document.createElement("p");
            const smsError = document.createTextNode("datos inaccesibles");
            pError.appendChild(smsError);
            pError.className = "smsError";
            article.querySelector(".mediciones").appendChild( pError );
            console.log(' Problema con la petición Fetch:' + error.message);
        });
    }

}

const headerTituloZonas = document.querySelectorAll(".headerTituloZonas");
const seccionesOcultas = document.querySelectorAll(".oculto");
const imagenesmapa = document.querySelectorAll(".mapa");
const imgresponsive = document.querySelectorAll(".imgresponsive");
const flechadireccion= document.querySelectorAll(".flechadireccion");


headerTituloZonas.forEach( element => element.addEventListener('click', visibilidadZonas ) );

/**
 * Asigno evento click a todos los header con el título de la zona,
 * al ejecutarlo funcion visibilidad muestra secciones con datos de esta zona, 
 * y oculta seccion previamente clickada.
 * Muestra la imagen mapa correspondiente a la zona, y oculta las demás.
 * Si el ancho de la pantalla es <= 1200 px muestra y oculta imágenes 
 * más pequeñas definidas en clase .imgresponsive dentro de 
 * la sección de Zona.
 * La img flecha para la zona visible gira (añadiendo clase css)
 */
function visibilidadZonas(event){

    let numimgmostrar = event.currentTarget.parentElement.id;

    // ocultar seccion si es visible 
    if( event.currentTarget.nextElementSibling.classList.contains('visible') ){

        event.currentTarget.nextElementSibling.classList.remove('visible');
        flechadireccion.forEach( imgflecha => imgflecha.classList.remove('girararriba'));
        imgresponsive.forEach( function (imagen){
            imagen.classList.add('oculto');
            imagen.classList.remove('visible');
        });
    }
    else{ // visibilizar seccion Zona

        seccionesOcultas.forEach( section => section.classList.remove('visible') );
        event.currentTarget.nextElementSibling.classList.add('visible');
        //girar flecha
        flechadireccion.forEach( imgflecha => imgflecha.classList.remove('girararriba'));
        flechadireccion[numimgmostrar-1].classList.add('girararriba');

        // imágenes grandes mapa o pequeñas dentro de sección de Zona
        if( window.screen.width <= 900 ){
            imgresponsive.forEach( imagen => imagen.classList.add('oculto') );
            imgresponsive[numimgmostrar-1].classList.remove('oculto');
            imgresponsive[numimgmostrar-1].classList.add('visible');
        }
        else{
            imagenesmapa.forEach( imagen => imagen.classList.add('oculto') );
            imagenesmapa[numimgmostrar].classList.remove('oculto');
            imagenesmapa[numimgmostrar].classList.add('visible');
        }
    }

}

/**
 * Función usada por formulario en el evento onSubmit
 * obtiene UID proporcionado por cliente , calcula fidelidad 
 * sumando todos los puntos del cliente por numero zonas donde registró
 * compras. calcula % descuento según fidelidad.
 * 
 * Muestra datos a cliente con window.alert , no retorna para no refrescar.
 * @returns false
 */
function descuentosCliente(){

    // Calculo fidelidad y % de descuento
    const uidbuscado = document.forms[0].elements[0].value;
    let puntosFidelidad = 0;
    let descuento = 0;
    let zonasvisitadas = 0;

    calcFidelidad.forEach( function (object){
        if( object.cliente == uidbuscado ){
            puntosFidelidad += parseInt(object.valor);
            zonasvisitadas++;
        }
    });
    const fidelidad = puntosFidelidad * zonasvisitadas;

    if( puntosFidelidad === 0 ){
        window.alert('Cliente no registrado');
    }
    else{
        if( fidelidad >= 2 ){
            descuento = fidelidad * 0.5;
            if( descuento > 15 ){
                descuento = 15;
            }
        }
        else{
            descuento = 0;
        }
        
        window.alert( "Fidelidad cliente: "+fidelidad+" Descuento: "+descuento+"%" );
    }

    return (false);
}

/**
 * Calculo descuento por densidad existente en la zona
 * según condiciones requeridas en proyecto.
 * 
 * @param {int} densidad 
 * @returns descuentoDensidad
 */
function descuentoPorDensidadZona( densidad ){
    
    // Calculo % de descuento por densidad
    let descuentoDensidad = 0;
    if ( densidad < 50 ) {
        descuentoDensidad = 15;
    } else if ( densidad >= 50 && densidad < 75 ) {
        descuentoDensidad = 10;
    } else if ( densidad >= 75 && densidad < 100 ) {
        descuentoDensidad = 5;
    }
    return descuentoDensidad;
}

/**
 * Consulta si la zona tiene descuento en comida y bebida 
 * mediante api interna que retorna json de consultar a bd
 * AÚN NO FUNCIONA
 * 
 * @param {float} medLuminosidad 
 * @param {float} medTemperatura 
 * @param {float} medHumedad 
 * @returns object
 */
function descuentoAlimentos( medLuminosidad, medTemperatura, medHumedad ){

    const endpoint = 'https://pr200.newflow.tech/api/apidescuentos.php';
    const promesa = fetch( `${endpoint}`, {
        method: 'POST',
        headers:
        {   'Content-Type': 'application/json',
            'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: JSON.stringify({
            medcantluz: medLuminosidad,
            medtemperatura: medTemperatura,
            medhumedad: medHumedad
        })
    });
    promesa
    .then( response => {
        // console.log( response.json() );
        return response.json();
    })
    .then( data => {
        // console.log('descuentos alimentos: ');
        console.log(data);
    })
    .catch( function handleError( error ){ 
        console.log(' Problema con la petición Fetch:' + error.message);
    });

}

/**
 * Calculo si clientes tienen descuentos en comida y bebida
 * Según condiciones de climatología requeridas en proyecto.
 * 
 * @param {float} medLuminosidad 
 * @param {float} medTemperatura 
 * @param {float} medHumedad 
 * @returns object
 */
function desAlimentos( medLuminosidad, medTemperatura, medHumedad ){
 
    let desComida;
    let desBebida;
    if( medLuminosidad<50 && medTemperatura<20 && medHumedad<50){
        desComida = true; desBebida = true;
    }else if( medLuminosidad<50 && medTemperatura<20 && medHumedad>=50 ){
        desComida = false; desBebida = true;
    }else if( medLuminosidad<50 && medTemperatura>=20 && medHumedad<50 ){
        desComida = true; desBebida = false;
    }else if( medLuminosidad<50 && medTemperatura>=20 && medHumedad>=50 ){
        desComida = true; desBebida = false;
    }else if( medLuminosidad>=50 && medTemperatura<20 && medHumedad<50 ){
        desComida = false; desBebida = true;
    }else if( medLuminosidad>=50 && medTemperatura<20 && medHumedad>=50 ){
        desComida = true; desBebida = true;
    }else if( medLuminosidad>=50 && medTemperatura>=20 && medHumedad<50 ){
        desComida = true; desBebida = false;
    }else{
        desComida = true; desBebida = true;
    }

    return {desComida, desBebida};

}

/**
 * Evento de click sobre boton para crear el modo oscuro 
 * en la aplicación añade clase darkmode a elementos, 
 * o la quita en cada click al boton.
 */
const button = document.getElementById("button");
const elementosb =  document.querySelectorAll(".b") ;
button.addEventListener('click', function(){
    if(button.textContent == "Dark Mode"){
        button.textContent = "White Mode";
        color1 = "black";
        color2 = "white";
    }
    else{
        button.textContent = "Dark Mode";
        color1 = "white";
        color2 = "black";
    }
    document.body.classList.toggle("darkmode");
    
    elementosb.forEach(element => {
        element.classList.toggle("whitemode");
    });
});