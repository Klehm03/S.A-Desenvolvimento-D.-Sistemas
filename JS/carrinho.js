$(document).ready(function() {
    $(".carrinho").on("submit", function(e) {
        e.preventDefault(); // Impede o envio tradicional do form
        


        $.ajax({
            url: "cad_carrinho.php",
            type: "POST",
            data: $(this).serialize(), 
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $("#message").removeClass("error").addClass("success")
                        .text(response.message).fadeIn().delay(3000).fadeOut();
                    window.location.href = "carrinho.php"; // Redireciona para a página do carrinho
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
    });
});
