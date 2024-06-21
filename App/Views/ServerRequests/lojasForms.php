<option value="" selected>Selecione uma loja</option>
<?php
    foreach ($this->lojas as $loja): ?>
        <option value="<?= $loja->cd_loja ?>">Loja <?= $loja->cd_loja ?></option>
<?php endforeach;