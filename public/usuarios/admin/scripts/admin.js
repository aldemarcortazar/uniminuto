$(document).ready(function () {

    const datosUsuario = JSON.parse(localStorage.getItem("user"))

    registrosTabla()

    function registrosTabla() {
        let documento = datosUsuario.document
        
        $.post("include/registrosTabla.php", {documento},
            function (response) {
                const data = JSON.parse(response)
                let template = ''

                data.forEach(element => {
                    template += `
                                    <tr>
                                        <td>${element.document}</td>
                                        <td>${element.name_type_doc}</td>
                                        <td>${element.name}</td>
                                        <td>${element.last_name}</td>
                                        <td>${element.surname}</td>
                                        <td>${element.last_surname}</td>
                                        <td>${element.date_birth}</td>
                                        <td>${element.mobile}</td>
                                        <td>${element.email}</td>
                                        <td>${element.name_area}</td>
                                        <td>${element.name_type_user}</td>
                                        <td>${element.date_entry}</td>
                                        <td>${element.date_exit}</td>
                                    </tr>
                    `
                });

                $('#user_info').html(template);
            }
        );
    }

    

});