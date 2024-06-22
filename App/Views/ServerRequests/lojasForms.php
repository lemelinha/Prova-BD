<option value="" selected>Selecione uma loja</option>
<?php
    foreach ($this->lojas as $loja): 
        if ($loja->st_loja == 'D') continue;
    ?>
        <option value="<?= $loja->cd_loja ?>">Loja <?= $loja->cd_loja ?></option>
<?php endforeach;