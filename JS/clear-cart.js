$(document).ready(function() {
    $(".btn-clear").on("click", function() {

        $.ajax({
            url: "clear-cart.php",
            type: "POST",
            
            success: function(response) {
                console.log("sucesso ajax",response)
                location.reload(true)
                

            },
            error: function(xhr, status, error) {
                console.log("Erro AJAX:", xhr.responseText, status, error);
                
            }
        });
    });
});