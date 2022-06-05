$(document).ready(function() {

    $('.btn-novo').click(function(e) {
        e.preventDefault()

        //limpar todas as informaçoes
        $('.modal-title').empty()
        $('.modal-body').empty()

        //incluir textos
        $('.modal-title').append('Adicionar novo registro')

        //incluir formulario
        $('.modal-body').load('src/tipo/visao/form-tipo.html.')

        //incluir função do botão de salvar
        $('.btn-salvar').attr('data-operation', 'insert')

        //abrir modal
        $('#modal-tipo').modal('show')


    })
})