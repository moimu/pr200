// obtengo la articlos para imprimir en ellos
const article1 = document.querySelector('#article1');
const article2 = document.querySelector('#article2');
const article3 = document.querySelector('#article3');
const article4 = document.querySelector('#article4');
const article5 = document.querySelector('#article5');

const templatezonaSensor = document.querySelector('#templatezonaSensor');
const templateareaSensor = document.querySelector('#templateareaSensor');

/**
 * Trata la 2 solicitudes con fetch crea encabezado con nombreZona,
 * añade sensores de zona, además de areas de la zona y sensores.
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
                if( medicion.nombreArea == null ){
                    this[clon+solicitudes[0]+index] = templatezonaSensor.content.cloneNode(true);

                    this[clon+solicitudes[0]+index].querySelector('#divz').className = medicion.magnitud;

                    this[clon+solicitudes[0]+index].querySelector('#fechaz').innerHTML = medicion.fecha;
                    this[clon+solicitudes[0]+index].querySelector('#magnitudz').innerHTML = medicion.magnitud;
                    this[clon+solicitudes[0]+index].querySelector('#valorz').innerHTML = medicion.valor;
                    article.firstElementChild.appendChild( this[clon+solicitudes[0]+index] );
                }
                else{
                    this[clon+solicitudes[0]+index] = templateareaSensor.content.cloneNode(true);

                    this[clon+solicitudes[0]+index].querySelector('#diva').className = medicion.magnitud;

                    this[clon+solicitudes[0]+index].querySelector('#areaa').innerHTML = medicion.nombreArea;
                    this[clon+solicitudes[0]+index].querySelector('#fechaa').innerHTML = medicion.fecha;
                    this[clon+solicitudes[0]+index].querySelector('#magnituda').innerHTML = medicion.magnitud;
                    this[clon+solicitudes[0]+index].querySelector('#valora').innerHTML = medicion.valor;
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