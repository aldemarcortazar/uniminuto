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
                // let datos = parseInt(data.id_type_user)

                if(data == "Ok") {
                    Swal.fire({
                        title: 'Exito!',
                        text: "Registrado correctamente",
                        icon: 'success',
                        confirmButtonText: 'ok'
                    });

                    setTimeout(() =>{
                        location.reload();
                    },1300);
                } else if(data == "Error"){
                    Swal.fire({
                        title: 'Error!',
                        text: "Error al registar",
                        icon: 'error',
                        confirmButtonText: 'ok'
                    });

                    setTimeout(() =>{
                        location.reload();
                    },1300);
                } else if(data == "Ok2") {
                    Swal.fire({
                        title: 'Exito!',
                        text: "Salida exitosa",
                        icon: 'success',
                        confirmButtonText: 'ok'
                    });

                    setTimeout(() =>{
                        location.reload();
                    },1300);
                }
            }
        } )
        .catch(err => {
            alert("Ocurrió un error")
        })
}