<?php

namespace App\Controllers;
use Needs\Controller\Controller;

class IndexController extends Controller {
    public function redirect() {
        header('Location: /filmes');
    }
}
