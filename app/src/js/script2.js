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
 * @param {array} solicitudes urls servidor para solicitud
 * @param {object} seccion seccion extraida del DOM
 * @return void
 */
function pintasolicitud1( solicitudes, seccion ){
    promise = fetch(`${solicitudes[0]}`);
    promise
        .then( response => {
            return response.json();
        })
        .then( data => {
            let clon ="clon";
            this[solicitudes[0]] = templatezona.content.cloneNode(true);
            this[solicitudes[0]].querySelector('#h1').innerHTML = data.mediciones[0].nombreZona;
            seccion.appendChild( this[solicitudes[0]] );

            data.mediciones.forEach( (medicion,index) => {
                // console.log(medicion);
                if( medicion.nombreArea == null ){
                    this[clon+solicitudes[0]+index] = templatezonaSensor.content.cloneNode(true);

                    this[clon+solicitudes[0]+index].querySelector('#divz').className = medicion.magnitud;

                    this[clon+solicitudes[0]+index].querySelector('#fechaz').innerHTML = medicion.fecha;
                    this[clon+solicitudes[0]+index].querySelector('#magnitudz').innerHTML = medicion.magnitud;
                    this[clon+solicitudes[0]+index].querySelector('#valorz').innerHTML = medicion.valor;
                    seccion.firstElementChild.appendChild( this[clon+solicitudes[0]+index] );
                }
                else{
                    this[clon+solicitudes[0]+index] = templateareaSensor.content.cloneNode(true);

                    this[clon+solicitudes[0]+index].querySelector('#diva').className = medicion.magnitud;

                    this[clon+solicitudes[0]+index].querySelector('#areaa').innerHTML = medicion.nombreArea;
                    this[clon+solicitudes[0]+index].querySelector('#fechaa').innerHTML = medicion.fecha;
                    this[clon+solicitudes[0]+index].querySelector('#magnituda').innerHTML = medicion.magnitud;
                    this[clon+solicitudes[0]+index].querySelector('#valora').innerHTML = medicion.valor;
                    seccion.appendChild( this[clon+solicitudes[0]+index] );
                }
            })
            
            pintasolicitud2( solicitudes[1] , seccion);
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

let sol = "https://newflow.tech/pr-200-jsonPruebas/allurl.php"
promiseUrlBase = fetch(`${sol}`);
promiseUrlBase
    .then( response => {
        return response.json();
    })
    .then( data => {
        // console.log(data);
        let cont = 0;
        const section = "section";
        let contSection = 1;
        let solicitudes = [];

        data.forEach( url =>{
            // console.log(url);
            if( cont == 2 ){
                console.log(solicitudes);
                pintasolicitud1( solicitudes, this[section+contSection] );
                contSection++;
                cont = 0;
                solicitudes.length = 0;
            }
            solicitudes.push(url);
            cont++;
        });
        pintasolicitud1( solicitudes, this[section+contSection] );

    })
    .catch( function ( error ) {
        console.log(' Problema con la petición Fetch total urls:' + error.message);
    });