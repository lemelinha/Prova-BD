<main style="justify-content: center">
    <h1>Cadastrar Categoria</h1>
    <form>
        <input type="text" name="categoria" placeholder="Nome da Categoria" required>
        <input type="submit" value="Cadastrar">
    </form>
    <p id="retorno">
        
    </p>
    <script>
        $('form').on('submit', function (e) {
            e.preventDefault()

            var retorno = $('#retorno')
            retorno.text('Cadastrando...')

            $.ajax({
                url: '/cadastrar/categoria',
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