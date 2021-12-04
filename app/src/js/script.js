// obtengo la secciones para imprimir en ellas
const section1 = document.querySelector('section1');
const section2 = document.querySelector('section2');
const section3 = document.querySelector('section3');
const section4 = document.querySelector('section4');
const section5 = document.querySelector('section5');

/**
 * Crea array con resultado de varias solicitudes
 * @param {array} solicitudes 
 */
function mostrar( solicitudes ){
    let objects = [];
    solicitudes.forEach( (element, index) => {
        promise = fetch(`${element}`);
        promise
            .then(response=>{
                return response.json();
            })
            .then( data =>{
                objects.push( data );
                // console.log( data );
            })
    });

    console.log( objects );

}
let ar1 = ["https://newflow.tech/pr-200-jsonPruebas/z100-1.php","https://newflow.tech/pr-200-jsonPruebas/z100-2.php"];
mostrar (ar1);
let ar2 = ["https://newflow.tech/pr-200-jsonPruebas/z200-1.php","https://newflow.tech/pr-200-jsonPruebas/z200-2.php"];
mostrar (ar2);
let ar3 = ["https://newflow.tech/pr-200-jsonPruebas/z300-1.php","https://newflow.tech/pr-200-jsonPruebas/z300-2.php"];
mostrar (ar3);
let ar4 = ["https://newflow.tech/pr-200-jsonPruebas/z400-1.php","https://newflow.tech/pr-200-jsonPruebas/z400-2.php"];
mostrar (ar4);
let ar5 = ["https://newflow.tech/pr-200-jsonPruebas/z500-1.php","https://newflow.tech/pr-200-jsonPruebas/z500-2.php"];
mostrar (ar5);




// baseEndpoint = "https://newflow.tech/pr-200-jsonPruebas/z100-2.php";
// promise1 = fetch(`${baseEndpoint}`);
// promise1
//     .then( response =>{
//         return response.json();
//     })
//     .then( data =>{
//         console.log( data );
//     })