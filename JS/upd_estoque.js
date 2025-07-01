$(document).ready(function() {

    $("#Edit").on("submit", function(e) {
        e.preventDefault();
        var id = $("#prod_id").val();
        var form = $(this).serialize()+ "&id=" + encodeURIComponent(id);
        var formData = new FormData(this)
        $.ajax({
            url: "upd_estoque.php",
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false, 

            success: function(response) {
                if (response.success) {
                    $("#message").removeClass("error").addClass("success")
                        .text(response.message).fadeIn().delay(3000).fadeOut();
                    $("#Edit")[0].reset();
                    window.location.href = "admin.php";
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