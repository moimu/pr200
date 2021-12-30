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
                // console.log(medicion);
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
                    
                    // this[clon+solicitudes[0]+index].querySelector('#fechaz').innerHTML = medicion.fecha;
                    this[clon+solicitudes[0]+index].querySelector('#magnitudz').innerHTML = medicion.magnitud
                    this[clon+solicitudes[0]+index].querySelector('#valorz').innerHTML = medicion.valor+unidad;

                    article.querySelector(".sectionZona").appendChild( this[clon+solicitudes[0]+index] );
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