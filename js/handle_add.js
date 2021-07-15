import { ajax } from "./ajax.js";

const handleAdd = (e) => {
    data={
        documento: e.target.docuumento.value,
        idTipDoc: e.target.idTipDoc.value,
        name:e.target.name.value,
        lastName:e.target.lastName.value,
        surName:e.target.surname.value,
        lastSurname:e.target.lasSurName.value,
        dateBirth:e.target.dateBirth.value,
        mobile:e.target.mobile.value,
        email:e.target.email.value,
        idArea:e.target.idArea.value,
        idTipUser:e.target.idTipUser,
    };
    ajax({
        url: '',
        method: 'POST',
        data,
        cbSuccess: ( { data:datos } ) => {
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