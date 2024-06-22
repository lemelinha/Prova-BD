<?php
    foreach ($this->categorias as $categoria): 
        if ($categoria->st_categoria == 'D') continue;
    ?>
        <div class="categoria">
            <p><?= $categoria->nm_categoria ?></p>
            <div class="btns">
                <i class="fa-solid fa-trash" id="<?= $categoria->cd_categoria ?>"></i>
            </div>
        </div>
<?php endforeach; ?>
<script>
    $('.fa-trash').on('click', function () {
        $.ajax({
            url: `/deletar/categoria/id/${$(this).attr('id')}`,
            type: 'get',
            dataType: 'json',
            data: null
        })
        .done(function (data) {
            location.reload()
        })
    })
</script>