<?php
/**
 * home - Controller de exemplo
 *
 */
require_once("main-controller.php");

class HomeController extends MainController
{
	
	/**
	 * Carrega a página "/views/home/home-view.php"
	 */
    public function index() {
		// Título da página
		$this->title = 'GOOD FOOD - Início';
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

		require ABSPATH . '/view/home/index.php';

    } // index
	
} // class HomeController