<option value="" selected>Selecione uma categoria</option>
<?php
    foreach ($this->categorias as $categoria): 
        if ($categoria->st_categoria == 'D') continue;
    ?>
        <option value="<?= $categoria->cd_categoria ?>"><?= $categoria->nm_categoria ?></option>
<?php endforeach;