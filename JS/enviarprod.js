$(document).ready(function() {
    $("#product-form").on("submit", function(e) {
        e.preventDefault(); // Impede o envio tradicional do form
        var formData = new FormData(this); // <-- necessário para enviar arquivos
        $.ajax({
            url: "cad_prod.php",
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false, // <-- necessário para FormData
            processData: false, // <-- necessário para FormData
            success: function(response) {
                if (response.success) {
                    $("#message").removeClass("error").addClass("success")
                        .text(response.message).fadeIn().delay(3000).fadeOut();
                    $("#product-form")[0].reset();
                } else {
                    $("#message").removeClass("success").addClass("error")
                        .text(response.message).fadeIn().delay(3000).fadeOut();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro AJAX:", xhr.responseText, status, error);
                $("#message").removeClass("success").addClass("error")
                    .text(xhr.responseText).fadeIn().delay(3000).fadeOut();
            }
        });
    });

})