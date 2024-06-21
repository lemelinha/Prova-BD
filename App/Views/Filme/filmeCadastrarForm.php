<main style="justify-content: center">
    <h1>Cadastrar Filme</h1>
    <form>
        <input type="text" name="titulo" placeholder="Título" required>
        <textarea name="descricao" placeholder="Descrição" required></textarea>
        <input type="number" name="valor" placeholder="Valor" step="0.01" min="0.01" max="9999.99" required>
        <select name="categoria" required></select>
        <input type="submit" value="Cadastrar">
    </form>
    <p id="retorno">
        
    </p>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '/get/categorias/for/forms',
                type: 'get',
                dataType: 'html'
            })
            .done(function (data) {
                $('select[name="categoria"]').html(data)
            })
        })
        $('form').on('submit', function (e) {
            e.preventDefault()

            var retorno = $('#retorno')

            $.ajax({
                url: '/cadastrar/filme',
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