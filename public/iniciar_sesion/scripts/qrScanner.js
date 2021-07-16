import {
    ajax
} from "./../../../js/ajax.js";

var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
        fps: 10,
        qrbox: 250
    });

function onScanSuccess(decodedText, decodedResult) {
    // Manejar en condición de éxito con el texto decodificado o el resultado.
    // console.log(`Scan result: ${decodedText}`, decodedResult);
    let resultado = `${decodedText}`;
    validarInicioSesion(resultado)
    // ...
    html5QrcodeScanner.clear();
    // ^ Detiene el escaner una vez se complete el escaneo
}

function onScanError(errorMessage) {
    console.log("Error message")
}


html5QrcodeScanner.render(onScanSuccess, onScanError);

function validarInicioSesion(codigo) {

    fetch('include/validarInicio.php', {
        method: 'POST', 
        body: JSON.stringify(codigo),
    })
        .then(res => res.ok ? res.json() : Promise.reject(res))
        .then( data => {
            if(data === 0) {
                alert("No se encontró ningún usuario")
                window.location.reload()
            } else {
                localStorage.setItem("user", JSON.stringify(data))
                let datos = parseInt(data.id_type_user)

                switch(datos) {
                    case 1: 
                        window.location.href = "../usuarios/admin/admin.php"
                    case 2:
                        window.location.href = "../usuarios/admin/profesor.php"
                }

            }
        } )
        .catch(err => {
            alert("Ocurrió un error")
        })
}