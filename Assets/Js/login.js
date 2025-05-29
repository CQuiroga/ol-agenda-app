$(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: './Auth/login.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    window.location.assign('Home/Views/Agenda.php');
                } 
                else if (jsonData.success == "2") {
                    $('#error').html('Error de conexión!').show();
                }
                else {
                    $('#error').html('Usuario o contraseña incorrectos!').show();
                }
            }
        });
    });
});