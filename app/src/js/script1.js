// 
/**
 * obtengo la articlos para imprimir en ellos datos recabados
 */
const article1 = document.querySelector('#article1');
const article2 = document.querySelector('#article2');
const article3 = document.querySelector('#article3');
const article4 = document.querySelector('#article4');
const article5 = document.querySelector('#article5');
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
                    case "temperatura":
                        unidad = "º";
                        break;
                    case "humedad":
                        unidad = "%";
                        break;
                    default:
                        unidad = "";
                }
                if( medicion.nombreArea == null ){
                    this[clon+solicitudes[0]+index] = templatezonaSensor.content.cloneNode(true);

                    this[clon+solicitudes[0]+index].querySelector('#divz').className = medicion.magnitud;

                    this[clon+solicitudes[0]+index].querySelector('#fechaz').innerHTML = medicion.fecha;
                    this[clon+solicitudes[0]+index].querySelector('#magnitudz').innerHTML = medicion.magnitud
                    this[clon+solicitudes[0]+index].querySelector('#valorz').innerHTML = medicion.valor+unidad;
                    article.firstElementChild.appendChild( this[clon+solicitudes[0]+index] );
                }
                else{
                    this[clon+solicitudes[0]+index] = templateareaSensor.content.cloneNode(true);

                    this[clon+solicitudes[0]+index].querySelector('#diva').className = medicion.magnitud;
                    // nombre de Area > Area == densidad (Densidad de Zona) Area == fidelidad (usosTarjetacliente)
                    this[clon+solicitudes[0]+index].querySelector('#areaa').innerHTML = medicion.nombreArea;
                    this[clon+solicitudes[0]+index].querySelector('#fechaa').innerHTML = medicion.fecha;
                    this[clon+solicitudes[0]+index].querySelector('#magnituda').innerHTML = medicion.magnitud;
                    this[clon+solicitudes[0]+index].querySelector('#valora').innerHTML = medicion.valor+unidad;
                    article.appendChild( this[clon+solicitudes[0]+index] );
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