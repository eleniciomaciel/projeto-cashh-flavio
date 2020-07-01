<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome/home_site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['acesso-restrito'] = 'welcome/index';
$route['home-gestor'] = 'gestor/LoginController/index';
$route['logout'] = 'welcome/logout';
$route['download-contrato'] = 'logista/logistaClientes/download';
$route['add-minhas-maquininhas'] = 'gestor/maquininhaController/index';
$route['lista_maquinas_nao_ativas'] = 'gestor/maquininhaController/getLista_maquininhas_select';
$route['lista-lojas'] = 'gestor/maquininhaController/getListaloja_select';
$route['adiciona-loja-com-maquininhas'] = 'gestor/maquininhaController/add_loja_maquininhas';
$route['lista-locom--suas-maquininhas'] = 'gestor/maquininhaController/add_maquinas_lojas';
$route['lista-dados-do-contrato/(:num)'] = 'gestor/UsuariosController/dadosContrato/$1';
