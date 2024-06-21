<?php

namespace App\Controllers;
use Needs\Controller\Controller;
use App\Models\Filme;

class FilmeController extends Controller {
    public function filmes () {
        $this->render('filmesCadastrados', 'MainLayout', 'Filme');
    }

    public function cadastrarFilme () {
        $titulo = $_POST['titulo']??null;
        $desc = $_POST['descricao']??null;
        $valor = $_POST['valor']??null;
        $categoria = $_POST['categoria']??null;

        $FilmeModel = new Filme();
        $FilmeModel->cadastrarFilme($titulo, $desc, $valor, $categoria);

        echo json_encode(['erro' => false, 'message' => 'Filme Cadastrada com sucesso!']);
    }

    public function retornarFilmes ($for) {
        $FilmeModel = new Filme();

        $this->filmes = $FilmeModel->retornarFilmes();

        if ($for == 'display') {
            $this->renderView('filmesDisplay', 'ServerRequests');
        } else if ($for == 'forms') {
            $this->renderView('filmesForms', 'ServerRequests');
        }
    }

    public function entradaForm () {
        $this->render('entrada', 'MainLayout', 'Filme');
    }

    public function entrada() {
        $filme = $_POST['filme']??null;
        $loja = $_POST['loja']??null;
        $entrada = $_POST['entrada']??null;

        $FilmeModel = new Filme();
        $FilmeModel->entrada($filme, $loja, $entrada);
        echo json_encode(['erro' => false, 'message' => 'Entrada efetuada com sucesso!']);
    }
}