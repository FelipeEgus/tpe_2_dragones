<?php

class orderModel {

    private $db;

    public function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_dragones;charset=utf8', 'root', '');
    
    }

    function orderDragon($order = null) {

        switch($order){
        
            case 'DESC':
            case'desc':
                
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ORDER BY dragones.id desc');
            
            break;

            case 'ASC':
            case'asc':
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ORDER BY dragones.id  asc');
            break;
            
            default:
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id');
            break;
        }
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function orderNombre($order = null){

        switch($order){

            case 'DESC':
            case'desc':
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ORDER BY dragones.nombre_raza desc');
            break;

            case 'ASC':
            case'asc':
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id  ORDER BY dragones.nombre_raza  asc');
            break;

            default:
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ');
            break;
        }

        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ); 

    }

    function orderMitologia($order = null){

        switch($order){

            case 'DESC':
            case'desc':
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ORDER BY mitologias.id desc');
            break;

            case 'ASC':
            case'asc':
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ORDER BY mitologias.id asc');
            break;

            default:
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ');
            break;
        }

        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ); 

    }

    function orderDescrip($order = null){

        switch($order){

            case 'DESC':
            case'desc':
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ORDER BY dragones.descrip desc');
            break;

            case 'ASC':
            case'asc':
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ORDER BY dragones.descrip asc');
            break;

            default:
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ');
            break;
        }

        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ); 

    }

    function orderRepre($order = null){

        switch($order){

            case 'DESC':
            case'desc':
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ORDER BY dragones.representaciones desc');
            break;

            case 'ASC':
            case'asc':
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ORDER BY dragones.representaciones asc');
            break;

            default:
                $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk 
                                            FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id ');
            break;
        }

        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ); 

    }

    function getDragonLimit($number){

        $query = $this->db->prepare("SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk FROM dragones inner join mitologias on dragones.id_mitologia_fk = mitologias.id LIMIT 5 offset $number");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);

    }
}