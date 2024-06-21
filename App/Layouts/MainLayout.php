<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova BD</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/cdd96683ff.js" crossorigin="anonymous"></script>
    
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Transit -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.12/jquery.transit.min.js" integrity="sha512-ueXKWOB9liraz677EVGxz6H8nLk3RJjNv8Bfc0WrO9K9NyxROX3D/6bvZ9RYvAcYFxsVU+I0Jt/AMK0Nk8ya5g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <nav>
        <span>
            <label><i class="fa-solid fa-caret-right"></i>Lojas</label>
            <a href="/lojas">Lojas</a>
            <a href="/cadastrar/loja/form">Cadastrar</a>
        </span>
        <span>
            <label><i class="fa-solid fa-caret-right"></i>Filmes</label>
            <a href="/filmes">Filmes</a>
            <a href="/cadastrar/filme/form">Cadastrar</a>
        </span>
        <span>
            <label><i class="fa-solid fa-caret-right"></i>Categorias</label>
            <a href="/categorias">Categorias</a>
            <a href="/cadastrar/categoria/form">Cadastrar</a>
        </span>
        <span>
            <label><i class="fa-solid fa-caret-right"></i>Inventário</label>
            <a href="/entrada/form">Entrada</a>
            <a href="/saida/form">Saída</a>
        </span>
    </nav>
    <?php $this->renderView($this->page->view, $this->page->viewDirectory) ?>
    <script>
        $('nav span').on('click', function () {
            if ($(this).hasClass('open')) {
                $(this).transition({ height: '27px', marginTop: '0' })
                $(this).find('label i').transition({ rotate: '0' })
                
                $(this).removeClass('open')
                return
            }

            $(this).transition({ height: '81px', marginTop: '54px' })
            $(this).find('label i').transition({ rotate: '90deg' })
                
            $(this).addClass('open')
            return
        })
    </script>
</body>
</html>