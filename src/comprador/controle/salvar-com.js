$(document).ready(function() {

    $('.btn-salvar').click(function(e) {
        e.preventDefault()
        let dados = $('#form-com').serialize()

        dados += `&operacao=${$('.btn-salvar').attr('data-operation')}`

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            assync: true,
            data: dados,
            url: 'src/comprador/modelo/salvar-com.php',
            success: function(dados) {
                Swal.fire({
                    title: 'rifasoriginais',
                    text: dados.mensagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                })

                $('#modal-com').modal('hide')
            }
        })
    })

})