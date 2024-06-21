<main>
    <h1>Categorias Cadastrados</h1>
    <section class="categorias">
        
    </section>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '/get/categorias/for/display',
                type: 'get',
                dataType: 'html'
            })
            .done(function (data) {
                $('.categorias').html(data)
            })
        })
    </script>
</main>