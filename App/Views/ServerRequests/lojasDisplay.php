<?php
    foreach ($this->lojas as $loja): 
        if ($loja->st_loja == 'D') continue;
    ?>
        <div class="loja">
            <div class="loja-info">
                <h2>Loja <?= $loja->cd_loja ?></h2>
                <p><?= $loja->nm_endereco ?></p>
                <p>Bairro: <?= $loja->nm_bairro ?></p>
                <p>Cidade: <?= $loja->nm_cidade ?></p>
                <p>UF: <?= $loja->cd_estado ?></p>
            </div>
            <div class="btns">
                <i class="fa-solid fa-pen" id="<?= $loja->cd_loja ?>"></i>
                <i class="fa-solid fa-trash" id="<?= $loja->cd_loja ?>"></i>
            </div>
        </div>
<?php endforeach; ?>
<script>
    $('.fa-trash').on('click', function () {
        $.ajax({
            url: `/deletar/loja/id/${$(this).attr('id')}`,
            type: 'get',
            dataType: 'json',
            data: null
        })
        .done(function (data) {
            location.reload()
        })
    })
    $('.fa-pen').on('click', function () {
        location.href = `/editar/loja/id/${$(this).attr('id')}/form`
    })
</script>