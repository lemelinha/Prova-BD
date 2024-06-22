<?php
    $editar = isset($this->filme);
?>

<main style="justify-content: center">
    <h1><?= $editar?'Editar':'Cadastrar' ?> Filme</h1>
    <form>
        <input type="text" name="titulo" placeholder="Título" required value="<?= $editar?$this->filme->nm_filme:'' ?>">
        <textarea name="descricao" placeholder="Descrição" required><?= $editar?$this->filme->ds_filme:'' ?></textarea>
        <input type="number" name="valor" placeholder="Valor" step="0.01" min="0.01" max="9999.99" required value="<?= $editar?$this->filme->vl_filme:'' ?>">
        <select name="categoria" required></select>
        <input type="submit" value="<?= $editar?'Editar':'Cadastrar' ?>">
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
                $('select[name="categoria"]').val("<?= $editar?$this->filme->cd_filme:'' ?>")
            })
        })
        $('form').on('submit', function (e) {
            e.preventDefault()

            var retorno = $('#retorno')

            $.ajax({
                url: '<?= $editar?"/editar/filme/id/{$this->filme->cd_filme}":'/cadastrar/filme' ?>',
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