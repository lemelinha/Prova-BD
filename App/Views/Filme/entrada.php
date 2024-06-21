<main style="justify-content: center">
    <h1>Entrada de Filme</h1>
    <form>
        <select name="filme"></select>
        <select name="loja"></select>
        <input type="number" name="entrada" placeholder="Entrada" min="0" step="0">
        <input type="submit" value="Fazer Entrada">
    </form>
    <p id="retorno"></p>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '/get/lojas/for/forms',
                type: 'get',
                dataType: 'html'
            })
            .done(function (data) {
                $('select[name="loja"]').html(data)
            })

            $.ajax({
                url: '/get/filmes/for/forms',
                type: 'get',
                dataType: 'html'
            })
            .done(function (data) {
                $('select[name="filme"]').html(data)
            })
        })

        $('form').on('submit', function (e) {
            e.preventDefault()

            var retorno = $('#retorno')

            retorno.text('Efetuando Entrada...')

            $.ajax({
                url: '/entrada',
                type: 'post',
                dataType: 'json',
                data: $(this).serialize()
            })
            .done(function (data) {
                retorno.text(data.message)
            })
            .fail(function () {
                retorno.text('OPS! Algo deu errado no servidor')
            })
        })
    </script>
</main>