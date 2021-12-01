// obtengo la secciones para imprimir en ellas
const section1 = document.querySelector('section1');
const section2 = document.querySelector('section2');
const section3 = document.querySelector('section3');
const section4 = document.querySelector('section4');
const section5 = document.querySelector('section5');

//defino variable para contener json solicitado
let jsonObjeto;

//url solicitud y tipo - inicio solicitud y respuesta esperada
const requestURL = "https://newflow.tech/pr-200-jsonPruebas/z100-1.json";
const request = new XMLHttpRequest();
request.open('GET', requestURL );
request.responseType = 'json';

// Envio solicitud server, parametro para send, json? para solicitud tipo PUT
request.send();
request.onload = function(){
    const jsonObjetoRivas = request.response;
    console.log(jsonObjetoRivas);
    // function(obj);
}


// https://newflow.tech/pr-200-jsonPruebas/z100-1.json
// https://newflow.tech/pr-200-jsonPruebas/z100-2.json
// https://newflow.tech/pr-200-jsonPruebas/z200-1.json
// https://newflow.tech/pr-200-jsonPruebas/z200-2.json
// https://newflow.tech/pr-200-jsonPruebas/z300-1.json
// https://newflow.tech/pr-200-jsonPruebas/z300-2.json
// https://newflow.tech/pr-200-jsonPruebas/z400-1.json
// https://newflow.tech/pr-200-jsonPruebas/z400-2.json
// https://newflow.tech/pr-200-jsonPruebas/z500-1.json
// https://newflow.tech/pr-200-jsonPruebas/z500-2.json