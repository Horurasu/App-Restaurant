<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use RestServer\RestController;
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';


//http://localhost/ACTIVIDAD_EXAMEN_7_TERM/actividad_examen_BEM/back_end_moviles/tablas/api/Ramen

class Api extends RestController {

    function __construct(){
        parent::__construct();
        $this->load->model('DAO');

        $this->load->library('form_validation');
    }

//-------------------------------------------------------------------------------------------------------------------RAMEN

    function ramen_post()
        {
            
            $this->form_validation->set_data($this->post());

            $this->form_validation->set_rules(
                "nombre",
                "nombre",
                "required|max_length[59]"
            );

            $this->form_validation->set_rules(
                "subnombre",
                "subnombre",
                "required|max_length[99]"
            );

            $this->form_validation->set_rules(
                "precio",
                "precio",
                "required"
            );

            $this->form_validation->set_rules(
                "descripcion",
                "descripcion",
                "required|max_length[299]" 
            );

            
            if ($this->form_validation->run()){ 
               
                $data = array(
                    "nombre" => $this->post('nombre'),
                    "subnombre" =>$this->post('subnombre'),
                    "precio" =>$this->post('precio'),
                    "descripcion" =>$this->post('descripcion')
    
                );
                $respuesta = $this->DAO->insert_modificar_entidad('Ramen',$data);
                if ($respuesta['status'] == '1') {
                    $response = array(
                        "status" => 1,
                        "message" => "Informacion guardada correctamente",
                        "data" => array(),
                        "errors" => array()
                    );
                }else{
                    $response = array(  
                        "status" => 0,
                        "message" => "Error al guardar informacion",
                        "data" => $Ubicaciones,
                        "errors" => array(
                            "error" => $respuesta['mensaje']
                        )
                    );
                    
                }
                $this->response($response,200); 
            
            } else {
                $response = array(
                    "status" =>400,
                    "status_text"=>"Bad request",
                    "message" =>"Info no enviada correctamente!",
                    "results"=>array(),
                    "errors" =>$this->form_validation->error_array()
                );
                $this->response($response,400);
            }

        } 

    function ramen_get(){
    
        $Ramen = $this->DAO->seleccionar_entidad('Ramen');
    
        $response = array(
            "status" => 1,
            "message" => "Informacion cargada correctamente",
            "data" => $Ramen,
            "errors" => array()
        );
        $this->response($response,200);
    }


    function ramen_put()
    {


        $this->form_validation->set_data($this->put());

            $this->form_validation->set_rules(
                "nombre",
                "nombre",
                "required|max_length[59]"
            );

            $this->form_validation->set_rules(
                "subnombre",
                "subnombre",
                "required|max_length[99]"
            );

            $this->form_validation->set_rules(
                "precio",
                "precio",
                "required"
            );

            $this->form_validation->set_rules(
                "descripcion",
                "descripcion",
                "required|max_length[299]" 
            );

            
            if ($this->form_validation->run()){ 




        $data = array(
            "nombre" => $this->put('nombre'),
            "subnombre" =>$this->put('subnombre'),
            "precio" =>$this->put('precio'),
            "descripcion" =>$this->put('descripcion')

        );
        $respuesta = $this->DAO->insert_modificar_entidad('Ramen',$data,array('id'=>$this->get('id')));
        if ($respuesta['status'] == '1') {
            $response = array(
                "status" => 1,
                "message" => "Informacion editada correctamente",
                "data" => array(),
                "errors" => array()
            );
        }else{
            $response = array(  
                "status" => 0,
                "message" => "Error al editar informacion",
                "data" => $Ubicaciones,
                "errors" => array(
                    "error" => $respuesta['mensaje']
                )
            );
            
        }
        $this->response($response,200); 

        } else {


        $response = array(
            "status" =>400,
            "status_text"=>"Bad request",
            "message" =>"Info no enviada correctamente!",
            "results"=>array(),
            "errors" =>$this->form_validation->error_array()
        );
        $this->response($response,400);
    }

    }


    function ramen_delete(){
        $filtro  = array(
            "id" => $this->get('id')
        );
        $this->DAO->eliminar_entidad('Ramen',$filtro);

         $response = array(
             "status" => 1,
             "message" => "Informacion Borrada correctamente ",
             "data" => array(),
             "errors" => array()
         );
         $this->response($response,200);

    }


//-------------------------------------------------------------------------------------------------------------------SUSHI

    function sushi_post()
        {
            $this->form_validation->set_data($this->post());

            $this->form_validation->set_rules(
                "nombre",
                "nombre",
                "required|max_length[59]"
            );

            $this->form_validation->set_rules(
                "subnombre",
                "subnombre",
                "required|max_length[99]"
            );

            $this->form_validation->set_rules(
                "precio",
                "precio",
                "required"
            );

            $this->form_validation->set_rules(
                "descripcion",
                "descripcion",
                "required|max_length[299]" 
            );

            
            if ($this->form_validation->run()){ 

            $data = array(
                "nombre" => $this->post('nombre'),
                "subnombre" =>$this->post('subnombre'),
                "precio" =>$this->post('precio'),
                "descripcion" =>$this->post('descripcion')

            );
            $respuesta = $this->DAO->insert_modificar_entidad('Sushi',$data);
            if ($respuesta['status'] == '1') {
                $response = array(
                    "status" => 1,
                    "message" => "Informacion guardada correctamente",
                    "data" => array(),
                    "errors" => array()
                );
            }else{
                $response = array(  
                    "status" => 0,
                    "message" => "Error al guardar informacion",
                    "data" => $Sushi,
                    "errors" => array(
                        "error" => $respuesta['mensaje']
                    )
                );
                
            }
            $this->response($response,200); 
            
            } else {
                $response = array(
                    "status" =>400,
                    "status_text"=>"Bad request",
                    "message" =>"Info no enviada correctamente!",
                    "results"=>array(),
                    "errors" =>$this->form_validation->error_array()
                );
                $this->response($response,400);
            }
        } 

    function sushi_get(){
    
        $Sushi = $this->DAO->seleccionar_entidad('Sushi');
    
        $response = array(
            "status" => 1,
            "message" => "Informacion cargada correctamente",
            "data" => $Sushi,
            "errors" => array()
        );
        $this->response($response,200);
    }


    function sushi_put()
    {

        $this->form_validation->set_data($this->put());

            $this->form_validation->set_rules(
                "nombre",
                "nombre",
                "required|max_length[59]"
            );

            $this->form_validation->set_rules(
                "subnombre",
                "subnombre",
                "required|max_length[99]"
            );

            $this->form_validation->set_rules(
                "precio",
                "precio",
                "required"
            );

            $this->form_validation->set_rules(
                "descripcion",
                "descripcion",
                "required|max_length[299]" 
            );

            
            if ($this->form_validation->run()){ 

        $data = array(
            "nombre" => $this->put('nombre'),
            "subnombre" =>$this->put('subnombre'),
            "precio" =>$this->put('precio'),
            "descripcion" =>$this->put('descripcion')

        );
        $respuesta = $this->DAO->insert_modificar_entidad('Sushi',$data,array('id'=>$this->get('id')));
        if ($respuesta['status'] == '1') {
            $response = array(
                "status" => 1,
                "message" => "Informacion editada correctamente",
                "data" => array(),
                "errors" => array()
            );
        }else{
            $response = array(  
                "status" => 0,
                "message" => "Error al editar informacion",
                "data" => $Sushi,
                "errors" => array(
                    "error" => $respuesta['mensaje']
                )
            );
            
        }
        $this->response($response,200); 
        
        } else {
            $response = array(
                "status" =>400,
                "status_text"=>"Bad request",
                "message" =>"Info no enviada correctamente!",
                "results"=>array(),
                "errors" =>$this->form_validation->error_array()
            );
            $this->response($response,400);
        }
    }


    function sushi_delete(){
        $filtro  = array(
            "id" => $this->get('id')
        );
        $this->DAO->eliminar_entidad('Sushi',$filtro);

         $response = array(
             "status" => 1,
             "message" => "Informacion Borrada correctamente ",
             "data" => array(),
             "errors" => array()
         );
         $this->response($response,200);

    }


    //------------------------------------------------------------------------------------------------------------------- DRINK

    function drink_post()
        {
            $this->form_validation->set_data($this->post());

            $this->form_validation->set_rules(
                "nombre",
                "nombre",
                "required|max_length[59]"
            );

            $this->form_validation->set_rules(
                "subnombre",
                "subnombre",
                "required|max_length[99]"
            );

            $this->form_validation->set_rules(
                "precio",
                "precio",
                "required"
            );

            $this->form_validation->set_rules(
                "descripcion",
                "descripcion",
                "required|max_length[299]" 
            );

            
            if ($this->form_validation->run()){ 


            $data = array(
                "nombre" => $this->post('nombre'),
                "subnombre" =>$this->post('subnombre'),
                "precio" =>$this->post('precio'),
                "descripcion" =>$this->post('descripcion')

            );
            $respuesta = $this->DAO->insert_modificar_entidad('Drink',$data);
            if ($respuesta['status'] == '1') {
                $response = array(
                    "status" => 1,
                    "message" => "Informacion guardada correctamente",
                    "data" => array(),
                    "errors" => array()
                );
            }else{
                $response = array(  
                    "status" => 0,
                    "message" => "Error al guardar informacion",
                    "data" => $Drink,
                    "errors" => array(
                        "error" => $respuesta['mensaje']
                    )
                );
                
            }
            $this->response($response,200); 

            } else {
                $response = array(
                    "status" =>400,
                    "status_text"=>"Bad request",
                    "message" =>"Info no enviada correctamente!",
                    "results"=>array(),
                    "errors" =>$this->form_validation->error_array()
                );
                $this->response($response,400);
            }
        } 

    function drink_get(){
    
        $Drink = $this->DAO->seleccionar_entidad('Drink');
    
        $response = array(
            "status" => 1,
            "message" => "Informacion cargada correctamente",
            "data" => $Drink,
            "errors" => array()
        );
        $this->response($response,200);
    }


    function drink_put()
    {
        $this->form_validation->set_data($this->put());

        $this->form_validation->set_rules(
            "nombre",
            "nombre",
            "required|max_length[59]"
        );

        $this->form_validation->set_rules(
            "subnombre",
            "subnombre",
            "required|max_length[99]"
        );

        $this->form_validation->set_rules(
            "precio",
            "precio",
            "required"
        );

        $this->form_validation->set_rules(
            "descripcion",
            "descripcion",
            "required|max_length[299]" 
        );

            
        if ($this->form_validation->run()){ 

        $data = array(
            "nombre" => $this->put('nombre'),
            "subnombre" =>$this->put('subnombre'),
            "precio" =>$this->put('precio'),
            "descripcion" =>$this->put('descripcion')

        );
        $respuesta = $this->DAO->insert_modificar_entidad('Drink',$data,array('id'=>$this->get('id')));
        if ($respuesta['status'] == '1') {
            $response = array(
                "status" => 1,
                "message" => "Informacion editada correctamente",
                "data" => array(),
                "errors" => array()
            );
        }else{
            $response = array(  
                "status" => 0,
                "message" => "Error al editar informacion",
                "data" => $Drink,
                "errors" => array(
                    "error" => $respuesta['mensaje']
                )
            );
            
        }
        $this->response($response,200); 

        } else {
            $response = array(
                "status" =>400,
                "status_text"=>"Bad request",
                "message" =>"Info no enviada correctamente!",
                "results"=>array(),
                "errors" =>$this->form_validation->error_array()
            );
            $this->response($response,400);
        }
    }


    function drink_delete(){
        $filtro  = array(
            "id" => $this->get('id')
        );
        $this->DAO->eliminar_entidad('Drink',$filtro);

         $response = array(
             "status" => 1,
             "message" => "Informacion Borrada correctamente ",
             "data" => array(),
             "errors" => array()
         );
         $this->response($response,200);

    }



    //------------------------------------------------------------------------------------------------------------------- Dessert

    function dessert_post()
        {
            $this->form_validation->set_data($this->post());

            $this->form_validation->set_rules(
                "nombre",
                "nombre",
                "required|max_length[59]"
            );

            $this->form_validation->set_rules(
                "subnombre",
                "subnombre",
                "required|max_length[99]"
            );

            $this->form_validation->set_rules(
                "precio",
                "precio",
                "required"
            );

            $this->form_validation->set_rules(
                "descripcion",
                "descripcion",
                "required|max_length[299]" 
            );

            
            if ($this->form_validation->run()){ 

            $data = array(
                "nombre" => $this->post('nombre'),
                "subnombre" =>$this->post('subnombre'),
                "precio" =>$this->post('precio'),
                "descripcion" =>$this->post('descripcion')

            );
            $respuesta = $this->DAO->insert_modificar_entidad('Dessert',$data);
            if ($respuesta['status'] == '1') {
                $response = array(
                    "status" => 1,
                    "message" => "Informacion guardada correctamente",
                    "data" => array(),
                    "errors" => array()
                );
            }else{
                $response = array(  
                    "status" => 0,
                    "message" => "Error al guardar informacion",
                    "data" => $Dessert,
                    "errors" => array(
                        "error" => $respuesta['mensaje']
                    )
                );
                
            }
            $this->response($response,200); 

            } else {
                $response = array(
                    "status" =>400,
                    "status_text"=>"Bad request",
                    "message" =>"Info no enviada correctamente!",
                    "results"=>array(),
                    "errors" =>$this->form_validation->error_array()
                );
                $this->response($response,400);
            }
        } 

    function dessert_get(){
    
        $Dessert = $this->DAO->seleccionar_entidad('Dessert');
    
        $response = array(
            "status" => 1,
            "message" => "Informacion cargada correctamente",
            "data" => $Dessert,
            "errors" => array()
        );
        $this->response($response,200);
    }


    function dessert_put()
    {
        $this->form_validation->set_data($this->put());

        $this->form_validation->set_rules(
            "nombre",
            "nombre",
            "required|max_length[59]"
        );

        $this->form_validation->set_rules(
            "subnombre",
            "subnombre",
            "required|max_length[99]"
        );

        $this->form_validation->set_rules(
            "precio",
            "precio",
            "required"
        );

        $this->form_validation->set_rules(
            "descripcion",
            "descripcion",
            "required|max_length[299]" 
        );

        
        if ($this->form_validation->run()){ 

        $data = array(
            "nombre" => $this->put('nombre'),
            "subnombre" =>$this->put('subnombre'),
            "precio" =>$this->put('precio'),
            "descripcion" =>$this->put('descripcion')

        );
        $respuesta = $this->DAO->insert_modificar_entidad('Dessert',$data,array('id'=>$this->get('id')));
        if ($respuesta['status'] == '1') {
            $response = array(
                "status" => 1,
                "message" => "Informacion editada correctamente",
                "data" => array(),
                "errors" => array()
            );
        }else{
            $response = array(  
                "status" => 0,
                "message" => "Error al editar informacion",
                "data" => $Dessert,
                "errors" => array(
                    "error" => $respuesta['mensaje']
                )
            );
            
        }
        $this->response($response,200); 

        } else {
            $response = array(
                "status" =>400,
                "status_text"=>"Bad request",
                "message" =>"Info no enviada correctamente!",
                "results"=>array(),
                "errors" =>$this->form_validation->error_array()
            );
            $this->response($response,400);
        }
    }


    function dessert_delete(){
        $filtro  = array(
            "id" => $this->get('id')
        );
        $this->DAO->eliminar_entidad('Dessert',$filtro);

         $response = array(
             "status" => 1,
             "message" => "Informacion Borrada correctamente ",
             "data" => array(),
             "errors" => array()
         );
         $this->response($response,200);

    }



    
    //------------------------------------------------------------------------------------------------------------------- Extra

    function extra_post()
        {
            $this->form_validation->set_data($this->post());

            $this->form_validation->set_rules(
                "nombre",
                "nombre",
                "required|max_length[59]"
            );

            $this->form_validation->set_rules(
                "subnombre",
                "subnombre",
                "required|max_length[99]"
            );

            $this->form_validation->set_rules(
                "precio",
                "precio",
                "required"
            );

            $this->form_validation->set_rules(
                "descripcion",
                "descripcion",
                "required|max_length[299]" 
            );

            
            if ($this->form_validation->run()){ 
            
            $data = array(
                "nombre" => $this->post('nombre'),
                "subnombre" =>$this->post('subnombre'),
                "precio" =>$this->post('precio'),
                "descripcion" =>$this->post('descripcion')

            );
            $respuesta = $this->DAO->insert_modificar_entidad('Extra',$data);
            if ($respuesta['status'] == '1') {
                $response = array(
                    "status" => 1,
                    "message" => "Informacion guardada correctamente",
                    "data" => array(),
                    "errors" => array()
                );
            }else{
                $response = array(  
                    "status" => 0,
                    "message" => "Error al guardar informacion",
                    "data" => $Extra,
                    "errors" => array(
                        "error" => $respuesta['mensaje']
                    )
                );
                
            }
            $this->response($response,200); 
            } else {
                $response = array(
                    "status" =>400,
                    "status_text"=>"Bad request",
                    "message" =>"Info no enviada correctamente!",
                    "results"=>array(),
                    "errors" =>$this->form_validation->error_array()
                );
                $this->response($response,400);
            }
        } 

    function extra_get(){
    
        $Extra = $this->DAO->seleccionar_entidad('Extra');
    
        $response = array(
            "status" => 1,
            "message" => "Informacion cargada correctamente",
            "data" => $Extra,
            "errors" => array()
        );
        $this->response($response,200);
    }


    function extra_put()
    {

        $this->form_validation->set_data($this->put());

        $this->form_validation->set_rules(
            "nombre",
            "nombre",
            "required|max_length[59]"
        );

        $this->form_validation->set_rules(
            "subnombre",
            "subnombre",
            "required|max_length[99]"
        );

        $this->form_validation->set_rules(
            "precio",
            "precio",
            "required"
        );

        $this->form_validation->set_rules(
            "descripcion",
            "descripcion",
            "required|max_length[299]" 
        );

        
        if ($this->form_validation->run()){ 

        $data = array(
            "nombre" => $this->put('nombre'),
            "subnombre" =>$this->put('subnombre'),
            "precio" =>$this->put('precio'),
            "descripcion" =>$this->put('descripcion')

        );
        $respuesta = $this->DAO->insert_modificar_entidad('Extra',$data,array('id'=>$this->get('id')));
        if ($respuesta['status'] == '1') {
            $response = array(
                "status" => 1,
                "message" => "Informacion editada correctamente",
                "data" => array(),
                "errors" => array()
            );
        }else{
            $response = array(  
                "status" => 0,
                "message" => "Error al editar informacion",
                "data" => $Extra,
                "errors" => array(
                    "error" => $respuesta['mensaje']
                )
            );
            
        }
        $this->response($response,200); 

        } else {
            $response = array(
                "status" =>400,
                "status_text"=>"Bad request",
                "message" =>"Info no enviada correctamente!",
                "results"=>array(),
                "errors" =>$this->form_validation->error_array()
            );
            $this->response($response,400);
        }
    }


    function extra_delete(){
        $filtro  = array(
            "id" => $this->get('id')
        );
        $this->DAO->eliminar_entidad('Extra',$filtro);

         $response = array(
             "status" => 1,
             "message" => "Informacion Borrada correctamente ",
             "data" => array(),
             "errors" => array()
         );
         $this->response($response,200);

    }



      
}