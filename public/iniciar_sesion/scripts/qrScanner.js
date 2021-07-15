var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
        fps: 10,
        qrbox: 250
    });

function onScanSuccess(decodedText, decodedResult) {
    // Manejar en condición de éxito con el texto decodificado o el resultado.
    console.log(`Scan result: ${decodedText}`, decodedResult);
    let resultado = `${decodedText}`;
    document.getElementById("textExample").innerHTML = resultado;
    // ...
    html5QrcodeScanner.clear();
    // ^ Detiene el escaner una vez se complete el escaneo
}

function onScanError(errorMessage) {
    console.log("Error message")
}


html5QrcodeScanner.render(onScanSuccess, onScanError);