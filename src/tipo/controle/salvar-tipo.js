$(document).ready(function() {

    $('.btn-salvar').click(function(e) {
        e.preventDefault()
        let dados = $('#form-tipo').serialize()

        dados += `&operacao=${$('.btn-salvar').attr('data-operational')}`

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            assync: true,
            data: dados,
            url: 'src/tipo/modelo/salvar-tipo.php',
            sucess: function(dados) {
                Swal.fire({
                    title: 'rifasoriginais',
                    text: dados.mensagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                })

                $('#modal-tipo').modal('hide')
            }
        })
    })

})