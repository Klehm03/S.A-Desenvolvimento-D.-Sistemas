$(document).ready(function() {
    $(".somar").on("click", function() {
        var calculo = "somar";
        var quant = $(this).val();
        var produto = $(this).attr('name');

        $.ajax({
            url: "somar-subtrair.php",
            type: "POST",
            data: {expressao:calculo,quantidade:quant,id_produto:produto},
            
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

$(document).ready(function() {
    $(".subtrair").on("click", function() {
        var calculo = "subtrair";
        var quant = $(this).val();
        var produto = $(this).attr('name');

        $.ajax({
            url: "somar-subtrair.php",
            type: "POST",
            data: {expressao:calculo,quantidade:quant,id_produto:produto},
            
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