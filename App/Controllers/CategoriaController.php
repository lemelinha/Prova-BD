<?php

namespace App\Controllers;
use Needs\Controller\Controller;
use App\Models\Categoria;

class CategoriaController extends Controller {
    public function categorias () {
        $this->render('categoriasCadastradas', 'MainLayout', 'Categoria');
    }

    public function cadastrarCategoria () {
        $nomeCategoria = $_POST['categoria']??null;

        $CategoriaModel = new Categoria();
        $CategoriaModel->cadastrarCategoria($nomeCategoria);
        echo json_encode(['erro' => false, 'message' => 'Categoria Cadastrada com sucesso!']);
    }

    public function retornarCategorias ($for) {
        $CategoriaModel = new Categoria();
        $this->categorias = $CategoriaModel->retornarCategorias();

        if ($for == 'display') {
            $this->renderView('categoriasDisplay', 'ServerRequests');
        } else if ($for == 'forms') {
            $this->renderView('categoriasForms', 'ServerRequests');
        }
    }
}
