<?php
/**
 * home - Controller de exemplo
 *
 */
require_once("main-controller.php");

class LoginController extends MainController
{
	
	/**
	 * Carrega a página "/views/home/home-view.php"
	 */
    public function index() {
		// Título da página
		$this->title = 'LOGIN';
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

		require ABSPATH . '/view/login/index.php';

    } // index
    
    public function login() {
        echo("Tentando iniciar sessão...");
        
    }

    public function cadastro()
    {
        $this->title = 'Meu Cadastro';
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

		require ABSPATH . '/view/cadastro/index.php';
    }

} 