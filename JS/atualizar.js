$(document).ready(function() {

    $("#Edit").on("submit", function(e) {
        e.preventDefault();
        var id = $("#id_func").val();

        var form = $(this).serialize()+ "&id1=" + encodeURIComponent(id);
        $.ajax({
            url: "update_func.php",
            type: "POST",
            data: form,

            success: function(response) {
                if (response.success) {
                    $("#message").removeClass("error").addClass("success")
                        .text(response.message).fadeIn().delay(3000).fadeOut();
                    $("#Edit")[0].reset();
                } else {
                    $("#message").removeClass("success").addClass("error")
                        .text(response.message).fadeIn().delay(3000).fadeOut();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro AJAX:", xhr.responseText, status, error);
                $("#message").removeClass("success").addClass("error")
                    .text("Erro ao processar a requisição!").fadeIn().delay(3000).fadeOut();
            }
        });
        window.location.href = "admin.php";
    });
});