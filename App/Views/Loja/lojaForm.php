<?php 
    $editar = isset($this->loja);
?>

<main style="justify-content: center">
    <h1><?= $editar?'Editar':'Cadastrar' ?> Loja</h1>
    <form>
        <input type="text" name="endereco" placeholder="Endereço" required value="<?= $editar?$this->loja->nm_endereco:'' ?>">
        <input type="text" name="bairro" placeholder="Bairro" required value="<?= $editar?$this->loja->nm_bairro:'' ?>">
        <input type="text" name="cidade" placeholder="cidade" required value="<?= $editar?$this->loja->nm_cidade:'' ?>">
        <select name="estado" required>
            <option value="">Selecione um estado</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select>
        <input type="submit" value="<?= $editar?'Editar':'Cadastrar' ?>">
    </form>
    <p id="retorno">
        
    </p>
    <script>
        $(document).ready(function () {
            $('select[name="estado"]').val('<?= $editar?$this->loja->cd_estado:'' ?>')
        })
        $('form').on('submit', function (e) {
            e.preventDefault()

            var retorno = $('#retorno')

            $.ajax({
                url: '<?= $editar?"/editar/loja/id/{$this->loja->cd_loja}":'/cadastrar/loja' ?>',
                type: 'post',
                dataType: 'json',
                data: $(this).serialize()
            })
            .done(function (data) {
               retorno.text(data.message)
            })
            .fail(function () {
                retorno.text('OPS! Algo deu errado no servidor')
            })
        })
    </script>
</main>