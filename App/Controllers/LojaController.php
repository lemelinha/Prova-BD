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
}
