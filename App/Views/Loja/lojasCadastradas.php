<main>
    <h1>Lojas Cadastrados</h1>
    <section class="lojas">

    </section>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '/get/lojas/for/display',
                type: 'get',
                dataType: 'html'
            })
            .done(function (data) {
                $('.lojas').html(data)
            })
        })
    </script>
</main>