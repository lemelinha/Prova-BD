<?php
    foreach ($this->filmes as $filme): 
        if ($filme->st_filme == 'D') continue;
    ?>
        <div class="filme" id="<?= $filme->cd_filme ?>">
            <div class="filme-info">
                <h2><?= $filme->nm_filme ?></h2>
                <p><?= $filme->ds_filme ?></p>
                <p>R$<?= $filme->vl_filme ?></p>
                <p>Categoria: <?= $filme->st_categoria=='A'?$filme->nm_categoria:'unknown' ?></p>
            </div>
            <div class="filme-locacao">
                <?php
                    foreach ($this->inventario as $inventario): 
                        if ($filme->cd_filme != $inventario->id_filme || $filme->st_loja == 'D') continue;
                    ?>
                        <p><?= $inventario->qt_filme ?> exemplares na Loja <?= $inventario->id_loja ?></p>
                <?php endforeach; ?>
            </div>
            <div class="btns">
                <i class="fa-solid fa-trash" id="<?= $filme->cd_filme ?>"></i>
            </div>
        </div>
<?php endforeach; ?>

<script>
    $('.fa-trash').on('click', function () {
        $.ajax({
            url: `/deletar/filme/id/${$(this).attr('id')}`,
            type: 'get',
            dataType: 'json',
            data: null
        })
        .done(function (data) {
            location.reload()
        })
    })
</script>
