<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use RestServer\RestController;
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';


class Demo extends RestController {
    //es de tipo de GET [method _get]
    function index_get(){
      echo "esto es un metodo get";
    }

    function mi_funcion_post(){
      echo "esto es un metodo post";
    }
    function mi_funcion_put(){
      echo "esto es un metodo post";
    }

    function mi_funcion_delete(){
      echo "esto es un metodo post";
    }

  }
