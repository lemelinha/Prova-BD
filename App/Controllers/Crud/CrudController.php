<?php

namespace App\Controllers\Crud;
use Needs\Controller\Controller;
use App\Controllers\FilmeController;
use App\Controllers\CategoriaController;
use App\Controllers\LojaController;

class CrudController extends Controller {
    public function carregarFormCadastro ($cadastro) {
        switch ($cadastro['cadastrar']) {
            case 'filme':
                $this->render('filmeCadastrarForm', 'MainLayout', 'Filme');
                break;

            case 'categoria':
                $this->render('categoriaCadastrarForm', 'MainLayout', 'Categoria');
                break;

            case 'loja':
                $this->render('lojaCadastrarForm', 'MainLayout', 'Loja');
                break;
        }
    }

    public function cadastrar($cadastro) {
        switch ($cadastro['cadastrar']) {
            case 'filme':
                $filmeController = new FilmeController();
                $filmeController->cadastrarFilme();

                break;

            case 'categoria':
                $categoriaController = new CategoriaController();
                $categoriaController->cadastrarCategoria();

                break;

            case 'loja':
                $lojaController = new LojaController();
                $lojaController->cadastrarLoja();

                break;
        }
    }

    public function retornar ($retorno) {
        switch ($retorno['get']) {
            case 'filmes':
                $filmeController = new FilmeController();
                if ($retorno['for'] == 'display') {
                    $filmeController->retornarFilmes('display');
                } else if ($retorno['for'] == 'forms') {
                    $filmeController->retornarFilmes('forms');
                }

                break;

            case 'categorias':
                $categoriaController = new CategoriaController();
                if ($retorno['for'] == 'display') {
                    $categoriaController->retornarCategorias('display');
                } else if ($retorno['for'] == 'forms') {
                    $categoriaController->retornarCategorias('forms');
                }

                break;

            case 'lojas':
                $lojaController = new LojaController();
                if ($retorno['for'] == 'display') {
                    $lojaController->retornarLojas('display');
                } else if ($retorno['for'] == 'forms') {
                    $lojaController->retornarLojas('forms');
                }

                break;
        }
    }
}
