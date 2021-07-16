var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
        fps: 10,
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

    fetch('include/registrarSalida.php', {
        method: 'POST', 
        body: JSON.stringify(codigo),
    })
        .then(res => res.ok ? res.json() : Promise.reject(res))
        .then( data => {
            if(data === 0) {
                alert("No se encontró ningún usuario")
                // window.location.reload()
            } else {
                window.location.href = "../../../index.php";
            }
        } )
        .catch(err => {
            alert("Ocurrió un error")
        })
}