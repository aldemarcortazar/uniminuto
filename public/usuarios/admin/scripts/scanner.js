let datosUsuario = JSON.parse(localStorage.getItem("user"));

var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
        fps: 60,
        qrbox: 250
    });

function onScanSuccess(decodedText, decodedResult) {
    // Manejar en condición de éxito con el texto decodificado o el resultado.
    // console.log(`Scan result: ${decodedText}`, decodedResult);
    let resultado = `${decodedText}`;
    cerrarSesion(resultado)
    // ...
    html5QrcodeScanner.clear();
    // ^ Detiene el escaner una vez se complete el escaneo
}

function onScanError(errorMessage) {
    console.log("Error message")
}

html5QrcodeScanner.render(onScanSuccess, onScanError);

function cerrarSesion(codigo) {

    if(codigo == datosUsuario.document) {
        fetch('include/registrarSalida.php', {
            method: 'POST', 
            body: JSON.stringify(codigo),
        })
            .then(res => res.ok ? res.json() : Promise.reject(res))
            .then( data => {
                if(data === 0) {
                    alert("No se encontró ningún usuario")
                    window.location.reload()
                } else {
                    window.location.href = "../../../index.php";
                }
            } )
            .catch(err => {
                alert("Ocurrió un error")
            })
    } else {
        alert("El código no coincide con la sesión actual")
        window.location.reload()
    }

    
}


function exportTableToExcel(tabla_ID, nom_docu = ''){

    // dataType nos permite simular la descarga de otro tipo de archivos, application/vnd.ms-excel
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tabla_ID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // añadir al nombre del documento la extencion de excel para poder ejecutarlo
    nom_docu = nom_docu?nom_docu+'.xls':'excel_data.xls';

    // Crear elemento para el enlace de descarga
    var downloadLink;
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
    var blob = new Blob(['ufeff', tableHTML], {
    type: dataType
    });
    navigator.msSaveOrOpenBlob( blob, nom_docu);
    }else{
    // Create a link to the file
    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

    // Establecer el nombre del archivo
    downloadLink.download = nom_docu;

    // Activando la función
    downloadLink.click();
}
}