$(document).ready(function () {
    $('.submenu').click(function (e) {
      e.preventDefault();  // Impede o comportamento padrão do link
      const page = $(this).data('page');  // Recupera o valor do atributo data-page
      $('#initial-option').html('<div class="text-center my-4">Carregando...</div>');
      $('#initial-option').load(page + '.php');  // Carrega o conteúdo da página via AJAX
    });
  });
