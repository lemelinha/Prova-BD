<?php
    foreach ($this->filmes as $filme): ?>
        <div class="filme">
            <div class="filme-info">
                <h2><?= $filme->nm_filme ?></h2>
                <p><?= $filme->ds_filme ?></p>
                <p>R$<?= $filme->vl_filme ?></p>
                <p>Categoria: <?= $filme->nm_categoria ?></p>
            </div>
            <div class="filme-locacao">
                <?php
                    foreach ($this->inventario as $inventario): 
                        if ($filme->cd_filme != $inventario->id_filme) continue;
                    ?>
                        <p><?= $inventario->qt_filme ?> exemplares na Loja <?= $inventario->id_loja ?></p>
                <?php endforeach; ?>
            </div>
            <div class="btns">
                <i class="fa-solid fa-pen"></i>
                <i class="fa-solid fa-trash"></i>
            </div>
        </div>
<?php endforeach;
