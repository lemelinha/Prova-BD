<main>
    <h1>Filmes Cadastrados</h1>
    <section class="filmes">
        
    </section>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '/get/filmes/for/display',
                type: 'get',
                dataType: 'html'
            })
            .done(function (data) {
                $('.filmes').html(data)
            })
        })
    </script>
</main>