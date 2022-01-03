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
function pintasolicitudes( solicitudes, article ){

    for( let i = 0; i < 2; i++ ){
        promise = fetch(`${solicitudes[i]}`);
        promise
        .then( response => {
            return response.json();
        })
        .then( data => {
            let clon ="clon";
            
            data.mediciones.forEach( (medicion,index) => {
                console.log(medicion);
                unidad = "";
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
                if( medicion.magnitud === "fidelidad" ){
                    // Guardo objetos con valores uid Cliente y puntos fidelidad array calcFidelidad 
                    calcFidelidad.push(medicion);
                }
                else if ( medicion.magnitud == "medLuminosidad" || medicion.magnitud == "medTemperatura"
                           || medicion.magnitud == "medHumedad" || medicion.magnitud == "densidad"  ){

                    this[clon+solicitudes[0]+index] = templatezonaSensor.content.cloneNode(true);
                    this[clon+solicitudes[0]+index].querySelector('.divz').classList.add(medicion.magnitud);
                    this[clon+solicitudes[0]+index].querySelector('#magnitudz').innerHTML = medicion.magnitud
                    this[clon+solicitudes[0]+index].querySelector('#valorz').innerHTML = medicion.valor+unidad;
                    article.querySelector(".sectionZona").appendChild( this[clon+solicitudes[0]+index] );

                    if( medicion.magnitud == "densidad" ){

                        this[clon+solicitudes[0]+index] = templatezonaSensor.content.cloneNode(true);
                        this[clon+solicitudes[0]+index].querySelector('.divz').classList.add("descuentoDensidad");
                        this[clon+solicitudes[0]+index].querySelector('#magnitudz').innerHTML = "Descuento Densidad"
                        this[clon+solicitudes[0]+index].querySelector('#valorz').innerHTML = descuentoPorDensidadZona(medicion.valor)+unidad;
                        article.querySelector(".sectionZona").appendChild( this[clon+solicitudes[0]+index] );
                        
                    }
                }
                else if ( medicion.tituloArea != null ){
                    
                    this[clon+solicitudes[0]+index] = templateareaSensor.content.cloneNode(true);

                    this[clon+solicitudes[0]+index].querySelector('.diva').classList.add(medicion.magnitud);
                    // nombre de Area > Area == densidad (Densidad de Zona) Area == fidelidad (usosTarjetacliente)
                    this[clon+solicitudes[0]+index].querySelector('#areaa').innerHTML = medicion.tituloArea;
                    // this[clon+solicitudes[0]+index].querySelector('#fechaa').innerHTML = medicion.fecha;

                    // this[clon+solicitudes[0]+index].querySelector('#magnituda').innerHTML = medicion.magnitud;
                    // this[clon+solicitudes[0]+index].querySelector('#valora').innerHTML = medicion.valor+unidad;

                    article.querySelector(".sectionArea").appendChild( this[clon+solicitudes[0]+index] );
                }
            })
        })
        .catch( function ( error ) {
            const pError = document.createElement("p");
            const smsError = document.createTextNode("Solicitud datos inaccesible.");
            pError.appendChild(smsError);
            pError.className = "smsError";
            article.firstElementChild.appendChild( pError );
            console.log(' Problema con la petición Fetch:' + error.message);
        });
    }
}


const tituloZonas = document.querySelectorAll(".tituloZonas");
const seccionesOcultas = document.querySelectorAll(".oculto");
const imagenesmapa = document.querySelectorAll(".mapa");

tituloZonas.forEach( element => element.addEventListener('click', visibilidad ) );

/**
 * Asigno evento click a todos los h1 con el título de la zona,
 * al ejecutarlo funcion visivilidad muestra secciones con datos de esta zona, 
 * y oculta seccion previamente clickada.
 * Muestra la imagen mapa correspondiente a la zona, y oculta las demás.
 */
function visibilidad(event){

    seccionesOcultas.forEach( section => section.classList.remove('visible') );
    event.currentTarget.nextElementSibling.classList.add('visible');
    event.currentTarget.nextElementSibling.nextElementSibling.classList.add('visible');

    imagenesmapa.forEach( section => section.classList.add('oculto') );
    let numimgmostrar = event.currentTarget.parentElement.id;
    imagenesmapa[numimgmostrar].classList.remove('oculto');
    imagenesmapa[numimgmostrar].classList.add('visible');
}

/**
 * 
 * @returns false
 */
function descuentosCliente(){

    // Calculo fidelidad y % de descuento

    let uidbuscado = document.forms[0].elements[0].value;
    let puntosFidelidad = 0;
    let descuento = 0;
    calcFidelidad.forEach( function (object){
        // console.log(object.cliente);
        if( object.cliente == uidbuscado ){
            // console.log(object.cliente);
            // console.log(object.valor);
            puntosFidelidad += parseInt(object.valor);
        }
        
    });

    if( puntosFidelidad === 0 ){
        window.alert('Cliente no registrado');
    }
    else{
        if( puntosFidelidad >= 2 ){
            descuento = puntosFidelidad*0.5;
        }
        else{
            descuento = 0;
        }
        if( descuento > 15 ){
            descuento = 15;
        }
        window.alert( "Total puntos fidelidad: "+puntosFidelidad+" Descuento: "+descuento+"%" );
    }

    return (false);
}

/**
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
 * 
 * @param {int} medluz 
 * @param {int} medtemperatura 
 * @param {int} medhumedad 
 * @returns {descuentobebida, descuentoComida}
 */
function descuentoPorClimaZona( medluz, medtemperatura, medhumedad ){
    
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

// Descuento en comida y bebida api interna


function descuentoAlimentos(medLuminosidad, medTemperatura, medHumedad){

    const endpoint = 'https://pr200.newflow.tech/api/apidescuentos.php';
    const promesa = fetch( `${endpoint}`, {

        method: 'POST',
        headers:
        {   'Content-Type': 'application/json',
            // "x-api-key" : '043b1ef8-8333-4b98-b7a8-f35f26b15bcc'
        },
        body: {
            "medcantluz": medLuminosidad,
            "medtemperatura": medTemperatura,
            "medhumedad": medHumedad
        }
        
    });
    promesa
    .then( response => {
        return response.json();   
    })
    .then( data => {
        console.log('descuentos alimentos: ');
        console.log(data);
    })
    .catch( handleError );

}

function handleError(){
    console.log(' Problema con la petición Fetch:' + error.message);
}