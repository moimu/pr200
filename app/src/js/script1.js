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
                    // this[clon+solicitudes[0]+index].querySelector('#magnitudz').innerHTML = medicion.magnitud
                    this[clon+solicitudes[0]+index].querySelector('#valorz').innerHTML = medicion.valor+unidad;
                    article.querySelector(".sectionZona").appendChild( this[clon+solicitudes[0]+index] );

                    if( medicion.magnitud == "densidad" ){ // % descuento por densidad en Zona

                        this[clon+solicitudes[0]+index] = templatezonaSensor.content.cloneNode(true);
                        this[clon+solicitudes[0]+index].querySelector('.divz').classList.add("descuentoDensidad");
                        this[clon+solicitudes[0]+index].querySelector('.iconz').src = "images/icon/descuento.png"
                        // this[clon+solicitudes[0]+index].querySelector('#magnitudz').innerHTML = "Descuento Densidad"
                        this[clon+solicitudes[0]+index].querySelector('#valorz').innerHTML = descuentoPorDensidadZona(medicion.valor)+unidad;
                        article.querySelector(".sectionZona").appendChild( this[clon+solicitudes[0]+index] );
                        
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
            if( i == 1 ){ // cuando se haya completado los 2 peticiones Descuentos Climatología
                
                // descuentoAlimentos(  mediasMediciones[0], mediasMediciones[1], mediasMediciones[2] );
                // console.log( desAlimentos(  mediasMediciones[0], mediasMediciones[1], mediasMediciones[2] ) );
                const objetoDesAlimentacion = desAlimentos(  mediasMediciones[0], mediasMediciones[1], mediasMediciones[2] )

                const imagen = document.createElement('img');
                imagen.classList.add('iconz');
                objetoDesAlimentacion.desBebida == true ? imagen.src = "/images/icon/bebida.png":imagen.src = "/images/icon/bebidaNO.png";
                article.querySelector(".sectionZona").appendChild( imagen );

                const imagen2 = document.createElement('img');
                imagen2.classList.add('iconz');
                objetoDesAlimentacion.desComida == true ? imagen2.src = "/images/icon/comida.png" : imagen2.src = "/images/icon/comidaNO.png";
                article.querySelector(".sectionZona").appendChild( imagen2 );

            }
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
 * Consulta si la zona tieneescuento en comida y bebida 
 * mediante api interna que retorna json de consultar a bd
 * 
 * @param {*} medLuminosidad 
 * @param {*} medTemperatura 
 * @param {*} medHumedad 
 * @returns object
 */
function descuentoAlimentos(medLuminosidad, medTemperatura, medHumedad){

    const endpoint = 'https://pr200.newflow.tech/api/apidescuentos.php';
    const promesa = fetch( `${endpoint}`, {
        method: 'POST',
        headers:
        {   'Content-Type': 'application/json',
            'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: JSON.stringify({
            "medcantluz": medLuminosidad,
            "medtemperatura": medTemperatura,
            "medhumedad": medHumedad
        })
    });
    promesa
    .then( response => {
        // console.log( response.json() );
        // return response.json();   
        return response.json();
    })
    .then( data => {
        console.log('descuentos alimentos: ');
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
 * @param {*} medLuminosidad 
 * @param {*} medTemperatura 
 * @param {*} medHumedad 
 * @returns object
 */
function desAlimentos( medLuminosidad, medTemperatura, medHumedad ){

    let desComida;
    let desBebida;
    if( medLuminosidad<50 && medTemperatura<20 && medHumedad<50){
        desComida = true; desBebida = true;
    }else if( medLuminosidad<50 && medTemperatura<20 && medHumedad>=50){
        desComida = false; desBebida = true;
    }else if( medLuminosidad<50 && medTemperatura>=20 && medHumedad<50){
        desComida = true; desBebida = false;
    }else if( medLuminosidad<50 && medTemperatura>=20 && medHumedad>=50){
        desComida = true; desBebida = false;
    }else if( medLuminosidad>=50 && medTemperatura<20 && medHumedad<50){
        desComida = false; desBebida = true;
    }else if( medLuminosidad>=50 && medTemperatura<20 && medHumedad>=50){
        desComida = true; desBebida = true;
    }else if( medLuminosidad>=50 && medTemperatura>=20 && medHumedad<50){
        desComida = true; desBebida = false;
    }else{
        desComida = true; desBebida = true;
    }

    return {desComida, desBebida};

}