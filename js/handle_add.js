import { ajax } from "./ajax.js";

const handleAdd = (e) => {
    console.log(e.target);

    const loder = document.getElementById('oculto');
    loder.classList.add('active');
    console.log(loder);

    const data = new FormData(e.target);
    ajax({
        url: 'api/api/user.php',
        method: 'POST',
        data,
        cbSuccess: ( datos ) => {
            loder.classList.remove('active');
            Swal.fire({
                title: 'Exito!',
                text: datos.statusText,
                icon: 'success',
                confirmButtonText: 'ok'
            });
            e.target.reset();
        },
        error: ( err ) => {
            Swal.fire({
                title: 'Error!',
                text: err.statusText,
                icon: 'error',
                confirmButtonText: 'ok'
            });
            e.target.reset();
        }
    });

}


export default handleAdd;