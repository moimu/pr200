// obtengo la secciones para imprimir en ellas
const section1 = document.querySelector('#section1');
const section2 = document.querySelector('#section2');
const section3 = document.querySelector('#section3');
const section4 = document.querySelector('#section4');
const section5 = document.querySelector('#section5');

const templatezona = document.querySelector('#templatezona');
const templatezonaSensor = document.querySelector('#templatezonaSensor');
const templateareaSensor = document.querySelector('#templateareaSensor');

/**
 * Trata la 1era solicitud con fetch crea encabezado con nombreZona,
 * añade sensores de zona, además de areas de la zona y sensores.
 * 
 * @param {string} solicitud url servidor para solicitud
 * @param {object} seccion seccion extraida del DOM
 * @return void
 */
function pintasolicitud1( solicitud, solicitud2, seccion ){
    promise = fetch(`${solicitud}`);
    promise
        .then( response => {
            return response.json();
        })
        .then( data => {
            let clon ="clon";
            this[solicitud] = templatezona.content.cloneNode(true);
            this[solicitud].querySelector('#h1').innerHTML = data.mediciones[0].nombreZona;
            seccion.appendChild( this[solicitud] );

            data.mediciones.forEach( (medicion,index) => {
                // console.log(medicion);
                if( medicion.nombreArea == null ){
                    this[clon+solicitud+index] = templatezonaSensor.content.cloneNode(true);

                    this[clon+solicitud+index].querySelector('#divz').className = medicion.magnitud;

                    this[clon+solicitud+index].querySelector('#fechaz').innerHTML = medicion.fecha;
                    this[clon+solicitud+index].querySelector('#magnitudz').innerHTML = medicion.magnitud;
                    this[clon+solicitud+index].querySelector('#valorz').innerHTML = medicion.valor;
                    seccion.firstElementChild.appendChild( this[clon+solicitud+index] );
                }
                else{
                    this[clon+solicitud+index] = templateareaSensor.content.cloneNode(true);

                    this[clon+solicitud+index].querySelector('#diva').className = medicion.magnitud;

                    this[clon+solicitud+index].querySelector('#areaa').innerHTML = medicion.nombreArea;
                    this[clon+solicitud+index].querySelector('#fechaa').innerHTML = medicion.fecha;
                    this[clon+solicitud+index].querySelector('#magnituda').innerHTML = medicion.magnitud;
                    this[clon+solicitud+index].querySelector('#valora').innerHTML = medicion.valor;
                    seccion.appendChild( this[clon+solicitud+index] );
                }
            })
            
            pintasolicitud2(solicitud2 , seccion);
        })
        .catch( function ( error ) {
                console.log(' 1 Hubo un problema con la petición Fetch:' + error.message);
            });
}/**
 * Trata la 2nd solicitud con fetch y añade valores a la seccion editada,
 * con la funcion pintasolicitud1()
 * 
 * @param {string} solicitud url servidor para solicitud
 * @param {object} seccion seccion extraida del DOM
 * @return void
 */
function pintasolicitud2( solicitud, seccion ){
    promise = fetch(`${solicitud}`);
    promise
        .then( response => {
            return response.json();
        })
        .then( data => {
            // console.log( data );   console.log( data.mediciones[0].nombreZona );
            let clon ="clon";
            data.mediciones.forEach((medicion,index) => {
                // console.log(index);             console.log(medicion);
                if( medicion.nombreArea == null ){
                    this[clon+index] = templatezonaSensor.content.cloneNode(true);

                    this[clon+index].querySelector('#divz').className = medicion.magnitud;

                    this[clon+index].querySelector('#fechaz').innerHTML = medicion.fecha;
                    this[clon+index].querySelector('#magnitudz').innerHTML = medicion.magnitud;
                    this[clon+index].querySelector('#valorz').innerHTML = medicion.valor;
                    seccion.firstElementChild.appendChild( this[clon+index] );
                }
                else{
                    this[clon+index] = templateareaSensor.content.cloneNode(true);

                    this[clon+index].querySelector('#diva').className = medicion.magnitud;

                    this[clon+index].querySelector('#areaa').innerHTML = medicion.nombreArea;
                    this[clon+index].querySelector('#fechaa').innerHTML = medicion.fecha;
                    this[clon+index].querySelector('#magnituda').innerHTML = medicion.magnitud;
                    this[clon+index].querySelector('#valora').innerHTML = medicion.valor;
                    seccion.appendChild( this[clon+index] );
                }
            });
        })
        .catch( function ( error ) {
            console.log(' 2 Hubo un problema con la petición Fetch:' + error.message);
        });
}


const promiseUrlBase = fetch(`${solicitud}`);

let solicitud1 = "https://newflow.tech/pr-200-jsonPruebas/z100-1.php";
let solicitud2 = "https://newflow.tech/pr-200-jsonPruebas/z100-2.php";
pintasolicitud1( solicitud1, solicitud2, section1 );

let solicitud3 = "https://newflow.tech/pr-200-jsonPruebas/z200-1.php";
let solicitud4 = "https://newflow.tech/pr-200-jsonPruebas/z200-2.php";
pintasolicitud1( solicitud3, solicitud4, section2 );

let solicitud5 = "https://newflow.tech/pr-200-jsonPruebas/z300-1.php";
let solicitud6 = "https://newflow.tech/pr-200-jsonPruebas/z300-2.php";
pintasolicitud1( solicitud5, solicitud6, section3 );

let solicitud7 = "https://newflow.tech/pr-200-jsonPruebas/z400-1.php";
let solicitud8 = "https://newflow.tech/pr-200-jsonPruebas/z400-2.php";
pintasolicitud1( solicitud7, solicitud8, section4 );

let solicitud9 = "https://newflow.tech/pr-200-jsonPruebas/z500-1.php";
let solicitud10 = "https://newflow.tech/pr-200-jsonPruebas/z500-2.php";
pintasolicitud1( solicitud9, solicitud10, section5 );