var table = document.getElementById('alter');
var cells = table.getElementsByTagName('td');

for (var i = 0; i < cells.length; i++) {
    cells[i].onclick = function () {
        if (this.hasAttribute('data-clicked')) {
            return;
        }
        this.setAttribute('data-clicked', 'yes');
        this.setAttribute('data-text', this.innerHTML);

        var input = document.createElement('input');
        input.value = this.innerHTML;
        input.style.width = this.offsetWidth - (this.clientLeft * 2) + "px";
        input.style.height = this.offsetHeight - (this.clientTop * 2) + "px";
        input.style.border = "0px";
        input.style.fontFamily = "inherit";
        input.style.fontSize = "inherit";
        input.style.textAlign = "inherit";
        input.style.backgroundColor = "LightGoldenRodYellow";

        input.onblur = function () {
            var td = input.parentElement;
            var orig_text = input.parentElement.getAttribute('data-text');
            var current_text = this.value;

            if (orig_text != current_text) {
                $(document).ready(function () {
                    $("#alter").on("submit", function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: "alter_table.php",
                            type: "POST",
                            data: $(this).serialize(),
                            dataType: "json",
                            success: function (response) {
                                if (response.success) {
                                    $("#message").removeClass("error").addClass("success")
                                        .text(response.message).fadeIn().delay(3000).fadeOut();
                                    $("#formCadastro")[0].reset();
                                } else {
                                    $("#message").removeClass("success").addClass("error")
                                        .text(response.message).fadeIn().delay(3000).fadeOut();
                                }
                            },
                            error: function (xhr, status, error) {
                                console.log("Erro AJAX:", xhr.responseText, status, error);
                                $("#message").removeClass("success").addClass("error")
                                    .text("Erro ao processar a requisição!").fadeIn().delay(3000).fadeOut();
                            }
                        });
                    });
                });
                td.removeAttribute('data-clicked');
                td.removeAttribute('data-text');
                td.innerHTML = current_text;
                td.style.cssText = 'padding: 5px'; //trocar
                console.log(orig_text + ' is changed to ' + current_text);
            } else {
                td.removeAttribute('data-clicked');
                td.removeAttribute('data-text');
                td.innerHTML = orig_text;
                td.style.cssText = 'padding: 5px'; //trocar
                console.log('No changes made');
            }
        }

        input.onkeypress = function () {
            if (event.keyCode == 13) {
                this.blur();
            }
        }
        this.innerHTML = "";
        this.style.cssText = 'padding: 0px 0px';
        this.append(input);
        this.firstElementChild.select();
    }
}