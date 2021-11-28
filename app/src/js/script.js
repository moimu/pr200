// obtengo la secciones para imprimir en ellas
const section1 = document.querySelector('section1');
const section2 = document.querySelector('section2');
const section3 = document.querySelector('section3');
const section4 = document.querySelector('section4');
const section5 = document.querySelector('section5');

//defino variable para contener json solicitado
let jsonObjeto;

//url solicitud y tipo
const requestURL = "http://52.204.244.109";
const request = new XMLHttpRequest();

// inicio solicitud, defino respuesta esperada
request.open('GET', requestURL );
request.responseType = 'json';

// Enviar solicitud al server, parametro para send, json? para solicitud tipo PUT
request.send();
request.onload = function(){
    // objeto json recibido
    const jsonObjetoRivas = request.response;
    console.log(jsonObjetoRivas);
    // function(obj);
}
