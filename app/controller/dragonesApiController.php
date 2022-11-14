<?php

require_once './app/model/dragonesModel.php';
require_once './app/view/apiView.php';
require_once './app/helper/authApiHelper.php';


class dragonesApiController {
    private $model;
    private $view;
    private $authHelper;

    private $data;

    public function __construct() {

        $this->model = new dragonesModel();
        $this->view = new apiView();
        $this->authHelper = new authApiHelper();

        $this->data = file_get_contents("php://input");

    }

    private function getData() {
        return json_decode($this->data);
    }

    public function showDragon($params = null) {

        if(!empty($params[':ID'])){

            $id = $params[':ID'];
 
            $dragon = $this->model->getDragonId($id);
 
           if(empty($dragon)){
                return $this->view->response("El dragon con el id=$id no existe", 404);
            }

            return $this->view->response($dragon, 200);

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

    public function getFields($params = null) {
        $params = [
            "sort" => "asc",
            "field" => "id",
            "where" => "dragones.id_mitologia_fk",
            "limit" => "18446744073709551610",
            "offset" => "0"
        ];
        if (isset($_GET['sort'])){ 
            $params["sort"] = $_GET['sort'];
        }
        if (isset($_GET['field'])){
            $params["field"] = $_GET['field'];
        }
        if (isset($_GET['where'])){
            $params["where"] = $_GET['where'];
        }
        if (isset($_GET['limit'])){
            $params["limit"] = $_GET['limit'];
            if (isset($_GET['offset'])){
                $pag = (($_GET['offset']-1)*$params["limit"]);
                $params["offset"] = $pag;
            }
        }
        

        $db = $this->model->getAllSortBy($params);
        $this->view->response($db);
    }
}
