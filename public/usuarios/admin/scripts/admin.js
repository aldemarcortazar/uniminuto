$(document).ready(function () {

    registrosTabla()

    function registrosTabla() {
        
        $.post("include/registrosTabla.php", {},
            function (response) {
                const data = JSON.parse(response)
                let template = ''

                data.forEach(element => {
                    template += `
                                    <tr>
                                        <td>${element.document}</td>
                                        <td>${element.name_type_doc}</td>
                                        <td>${element.name} ${element.last_name} ${element.surname} ${element.last_surname}</td>
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