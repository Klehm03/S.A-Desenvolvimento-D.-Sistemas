$(document).ready(function() {
    $(".delete-btn").on("click", function(e) {
        e.preventDefault();
        var id = $(this).val();
        var nome = $(this).attr('name');

        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {id1:id,nome1:nome},
            
            success: function(response) {
                console.log("sucesso ajax",response);
                location.reload(true);
                

            },
            error: function(xhr, status, error) {
                console.log("Erro AJAX:", xhr.responseText, status, error);
                
            }
        });
    });
});