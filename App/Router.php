<?php

namespace App;

/**
 *  Classe referente às rotas do projeto.
 * 
 */
abstract class Router {
    /**
     *  Função de declaração de rotas
     * 
     *  Esta função declara as rotas do projeto e
     *  armazena no atributo 'routes' da instância
     * 
     *  @return void
     */
    protected function declareRoutes(){

        $routes['redirect'] = [
            'router' => '/',
            'controller' => 'IndexController',
            'action' => 'redirect'
        ];

        $routes['filmes'] = [
            'router' => '/filmes',
            'controller' => 'FilmeController',
            'action' => 'filmes'
        ];

        $routes['categorias'] = [
            'router' => '/categorias',
            'controller' => 'CategoriaController',
            'action' => 'categorias'
        ];

        $routes['lojas'] = [
            'router' => '/lojas',
            'controller' => 'LojaController',
            'action' => 'lojas'
        ];

        $routes['cadastrarForm'] = [
            'router' => '/cadastrar/[a-z]+/form',
            'controller' => 'Crud\\CrudController',
            'action' => 'carregarForm'
        ];

        $routes['cadastrar'] = [
            'router' => '/cadastrar/[a-z]+',
            'controller' => 'Crud\\CrudController',
            'action' => 'cadastrar'
        ];

        $routes['editarForm'] = [
            'router' => '/editar/[a-z]+/id/[0-9]+/form',
            'controller' => 'Crud\\CrudController',
            'action' => 'carregarForm'
        ];

        $routes['editar'] = [
            'router' => '/editar/[a-z]+/id/[0-9]+',
            'controller' => 'Crud\\CrudController',
            'action' => 'editar'
        ];

        $routes['delete'] = [
            'router' => '/deletar/[a-z]+/id/[0-9]+',
            'controller' => 'Crud\\CrudController',
            'action' => 'deletar'
        ];

        $routes['retornar'] = [
            'router' => '/get/[a-z]+/for/[a-z]+',
            'controller' => 'Crud\\CrudController',
            'action' => 'retornar'
        ];

        $routes['entradaForm'] = [
            'router' => '/entrada/form',
            'controller' => 'FilmeController',
            'action' => 'entradaForm'
        ];

        $routes['entrada'] = [
            'router' => '/entrada',
            'controller' => 'FilmeController',
            'action' => 'entrada'
        ];

        $routes['saidaForm'] = [
            'router' => '/saida/form',
            'controller' => 'FilmeController',
            'action' => 'saidaForm'
        ];

        $routes['saida'] = [
            'router' => '/saida',
            'controller' => 'FilmeController',
            'action' => 'saida'
        ];

        $this->routes = $routes;
    }
}
