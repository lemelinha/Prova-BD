<?php
    $editar = isset($this->categoria);
?>

<main style="justify-content: center">
    <h1><?= $editar?'Editar':'Cadastrar' ?> Categoria</h1>
    <form>
        <input type="text" name="categoria" placeholder="Nome da Categoria" required value="<?= $editar?$this->categoria->nm_categoria:'' ?>">
        <input type="submit" value="<?= $editar?'Editar':'Cadastrar' ?>">
    </form>
    <p id="retorno">
        
    </p>
    <script>
        $('form').on('submit', function (e) {
            e.preventDefault()

            var retorno = $('#retorno')
            retorno.text('Cadastrando...')

            $.ajax({
                url: '<?= $editar?"/editar/categoria/id/{$this->categoria->cd_categoria}":'/cadastrar/categoria' ?>',
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