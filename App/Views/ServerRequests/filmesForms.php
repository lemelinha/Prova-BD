<option value="" selected>Selecione um Filme</option>
<?php
    foreach ($this->filmes as $filme): 
        if ($filme->st_filme == 'D') continue;
    ?>
        <option value="<?= $filme->cd_filme ?>"><?= $filme->nm_filme ?></option>
<?php endforeach;