<?php

namespace App\Controllers;
use Needs\Controller\Controller;
use App\Models\Loja;

class LojaController extends Controller {
    public function lojas () {
        $this->render('lojasCadastradas', 'MainLayout', 'Loja');
    }

    public function cadastrarLoja () {
        $endereco = $_POST['endereco']??null;
        $bairro = $_POST['bairro']??null;
        $cidade = $_POST['cidade']??null;
        $estado = $_POST['estado']??null;

        $LojaModel = new Loja();
        $LojaModel->cadastrarLoja($endereco, $bairro, $cidade, $estado);
        echo json_encode(['erro' => false, 'message' => 'Loja Cadastrada com sucesso!']);
    }

    public function retornarLojas ($for) {
        $LojaModel = new Loja();
        
        $this->lojas = $LojaModel->retornarLojas();
        
        if ($for == 'display') {
            $this->renderView('lojasDisplay', 'ServerRequests');
        } else if ($for == 'forms') {
            $this->renderView('lojasForms', 'ServerRequests');
        }
    }

    public function deletarLoja($id) {
        $LojaModel = new Loja();
        $LojaModel->deletarLoja($id);
        echo json_encode(['erro' => false, 'message' => 'Loja deletado com sucesso!']);
    }

    public function editarLojaForm($id) {
        $LojaModel = new Loja();
        $this->loja = $LojaModel->retornarLojas($id)[0];
        $this->render('lojaForm', 'MainLayout', 'Loja');
    }

    public function editarLoja($id) {
        $endereco = $_POST['endereco']??null;
        $bairro = $_POST['bairro']??null;
        $cidade = $_POST['cidade']??null;
        $estado = $_POST['estado']??null;

        $LojaModel = new Loja();
        $LojaModel->editarLoja($endereco, $bairro, $cidade, $estado, $id);
        echo json_encode(['erro' => false, 'message' => 'Loja editado com sucesso!']);
    }
}
