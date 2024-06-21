<?php
    foreach ($this->lojas as $loja): ?>
        <div class="loja">
            <div class="loja-info">
                <h2>Loja <?= $loja->cd_loja ?></h2>
                <p><?= $loja->nm_endereco ?></p>
                <p>Bairro: <?= $loja->nm_bairro ?></p>
                <p>Cidade: <?= $loja->nm_cidade ?></p>
                <p>UF: <?= $loja->cd_estado ?></p>
            </div>
            <div class="btns">
                <i class="fa-solid fa-pen"></i>
                <i class="fa-solid fa-trash"></i>
            </div>
        </div>
<?php endforeach;