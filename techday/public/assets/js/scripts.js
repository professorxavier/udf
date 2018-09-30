$(document).ready(function () {
    $("#evento").DataTable({
        "destroy": true,
        "pageLength": 5,
        "processing": true, //Exibe a informação de que o conteúdo está sendo processado
        "dom": 'Bfrtip',
        "aaSorting": [[0, 'asc']],
        "oLanguage": {
            "sProcessing": "Aguarde enquanto os dados são carregados ...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
            "sInfoEmpty": "Exibindo 0 a 0 de 0 registros",
            "sInfo": "Exibindo de _START_ até _END_ de _TOTAL_ registros",
            "sInfoFiltered": "",
            "sSearch": "Buscar: ",
            "oPaginate": {
               "sFirst": "Início",
               "sPrevious": "Anterior",
               "sNext": "Próximo",
               "sLast": "Último"
            }
        }
    });
});

$(document).ready(function () {
    $('#txtemail').blur(function () {
        var regex = /^[a-z0-9][a-z0-9\._-]+@([a-z]+.)([a-z]+.)[a-z]{2,3}$/; // Verifica se antes do '@' tem letras, numeros ponto, underline e hífen, depois verifica o dominio do email (aceitando apenas letras) e verifica se tem ponto. ex.: email@email.com.br
        var email = $("#txtemail").val();

        // Verifica se está no padrão do regex
        if (regex.test(email)) {
            return true;
        } else {
            return false;
        }
    });
});