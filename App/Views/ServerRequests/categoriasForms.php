<option value="" selected>Selecione uma categoria</option>
<?php
    foreach ($this->categorias as $categoria): ?>
        <option value="<?= $categoria->cd_categoria ?>"><?= $categoria->nm_categoria ?></option>
<?php endforeach;