<?php

    foreach ($this->categorias as $categoria): ?>
        <div class="categoria">
            <p><?= $categoria->nm_categoria ?></p>
            <div class="btns">
                <i class="fa-solid fa-pen"></i>
                <i class="fa-solid fa-trash"></i>
            </div>
        </div>
<?php endforeach;