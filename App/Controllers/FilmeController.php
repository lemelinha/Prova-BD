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

        [$this->filmes, $this->inventario] = $FilmeModel->retornarFilmes();

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

    public function saidaForm () {
        $this->render('saida', 'MainLayout', 'Filme');
    }

    public function saida() {
        $filme = $_POST['filme']??null;
        $loja = $_POST['loja']??null;
        $saida = $_POST['saida']??null;
        
        $FilmeModel = new Filme();

        if (!$FilmeModel->temEstoqueDisponivel($filme, $loja, $saida)) {
            echo json_encode(['message' => "Não temos essa quantidade na loja $loja"]);
            die();
        }

        $FilmeModel->saida($filme, $loja, $saida);
        echo json_encode(['erro' => false, 'message' => 'Saída efetuada com sucesso!']);
    }

    public function deletarFilme($id) {
        $FilmeModel = new Filme();
        $FilmeModel->deletarFilme($id);
        echo json_encode(['erro' => false, 'message' => 'Filme deletado com sucesso!']);
    }
}
