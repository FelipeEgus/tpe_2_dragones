<?php

require_once './app/model/dragonesModel.php';
require_once './app/model/orderModel.php';
require_once './app/view/apiView.php';
require_once './app/helper/authApiHelper.php';


class dragonesApiController {
    private $model;
    private $orderModel;
    private $view;
    private $authHelper;

    private $data;

    public function __construct() {

        $this->model = new dragonesModel();
        $this->view = new apiView();
        $this->authHelper = new authApiHelper();
        $this->orderModel = new orderModel();

        $this->data = file_get_contents("php://input");

    }

    private function getData() {
        return json_decode($this->data);
    }

    public function showDragones($params = null) {

        $dragones = $this->model->getDragones();
        $this->view->response($dragones);

    }

    function showDragonMitologia($params = null){

        if(!empty($params[':mitologia'])){

            $mitologia = $params[':mitologia'];
 
            $dragones = $this->model->getDragonMitologia($mitologia);
 
           if(empty($dragones)){
                return $this->view->response("La mitologia no tiene dragones registrados", 404);
            }

            return $this->view->response($dragones, 200);

        }

    }

    public function showDragonId($params = null) {

        if(!empty($params[':ID'])){

            $id = $params[':ID'];
 
            $dragones = $this->model->getDragonId($id);
 
           if(empty($dragones)){
                return $this->view->response("El dragon con el id=$id no existe", 404);
            }

            return $this->view->response($dragones, 200);

        }

    }

    public function addDragon($params = null) {
        
        if(!$this->authHelper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
        
        $dragon = $this->getData();

        if (empty($dragon->nombre_raza) || empty($dragon->descrip) || empty($dragon->representaciones) || empty($dragon->id_mitologia_fk )){
            $this->view->response("Alguno de los campos esta vacio o es erroneo", 400);
        } else {
            $id = $this->model->addDragon($dragon->nombre_raza ,$dragon->descrip,$dragon->representaciones ,$dragon->id_mitologia_fk );
            $dragon = $this->model->getDragonId($id);
            $this->view->response($dragon, 201);
        } 

    }

    public function deleteDragon($params = null) {

        $id = $params[':ID'];

        $dragon = $this->model->getDragonId($id);

        if ($dragon) {
            $this->model->deleteDragon($id);
            $this->view->response($dragon);
        } else {
            $this->view->response("El dragon con el id=$id no existe", 404);
        }

    }

    public function orderDragon($params = null){
    
        if(!empty($params[':order'])){
            $order = $params[':order'];
            $dragones = $this->orderModel->orderDragon($order);
        }

        return $this->view->response($dragones, 200);

    }

    public function orderNombre($params = null){

        if(!empty($params[':order'])){
            $order = $params[':order'];
            $dragones = $this->orderModel->orderNombre($order);
        }

        return $this->view->response($dragones, 200);

    }

    public function orderMitologia($params = null){
    
        if(!empty($params[':order'])){
            $order = $params[':order'];
            $dragones = $this->orderModel->orderMitologia($order);
        }

        return $this->view->response($dragones, 200);

    }

    public function orderDescrip($params = null){

        if(!empty($params[':order'])){
            $order = $params[':order'];
            $dragones = $this->orderModel->orderDescrip($order);
        }

        return $this->view->response($dragones, 200);

    }

    public function orderRepre($params = null){

        if(!empty($params[':order'])){
            $order = $params[':order'];
            $dragones = $this->orderModel->orderRepre($order);
        }

        return $this->view->response($dragones, 200);

    }

    public function showLimit($params = null){

        if(!empty($params[':pag'])){

            $pag = $params[':pag'];
            $num = ($pag - 1)*5 ;
 
            $dragones = $this->orderModel->getDragonLimit($num);

            return $this->view->response($dragones, 200);

        }
    }

}
