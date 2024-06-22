<?php

namespace App\Controllers\Crud;
use Needs\Controller\Controller;
use App\Controllers\FilmeController;
use App\Controllers\CategoriaController;
use App\Controllers\LojaController;

class CrudController extends Controller {
    public function carregarForm ($uri) {
        if (isset($uri['cadastrar'])) {
            switch ($uri['cadastrar']) {
                case 'filme':
                    $this->render('filmeForm', 'MainLayout', 'Filme');
                    break;
    
                case 'categoria':
                    $this->render('categoriaForm', 'MainLayout', 'Categoria');
                    break;
    
                case 'loja':
                    $this->render('lojaForm', 'MainLayout', 'Loja');
                    break;
            }
            return;
        }
        if (isset($uri['editar'])) {
            switch ($uri['editar']) {
                case 'filme':
                    $filmeController = new FilmeController();
                    $filmeController->editarFilmeForm($uri['id']);

                    break;
    
                case 'categoria':
                    $categoriaController = new CategoriaController();
                    $categoriaController->editarCategoriaForm($uri['id']);

                    break;
    
                case 'loja':
                    $lojaController = new LojaController();
                    $lojaController->editarLojaForm($uri['id']);
                    
                    break;
            }
            return;
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

    public function editar($editar) {
        switch ($editar['editar']) {
            case 'filme':
                $filmeController = new FilmeController();
                $filmeController->editarFilme($editar['id']);

                break;

            case 'categoria':
                $categoriaController = new CategoriaController();
                $categoriaController->editarCategoria($editar['id']);

                break;

            case 'loja':
                $lojaController = new LojaController();
                $lojaController->editarLoja($editar['id']);

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

    public function deletar($data) {
        switch ($data['deletar']){
            case 'filme':
                $filmeController = new FilmeController();
                $filmeController->deletarFilme($data['id']);
                break;
                
            case 'categoria':
                $categoriaController = new CategoriaController();
                $categoriaController->deletarCategoria($data['id']);
                break;
            
            case 'loja':
                $lojaController = new LojaController();
                $lojaController->deletarLoja($data['id']);
                break;
        }
    }
}
