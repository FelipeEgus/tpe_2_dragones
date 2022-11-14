<?php

class dragonesModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_dragones;charset=utf8', 'root', '');
    }

    public function getDragonId($id) {

        $query = $this->db->prepare('SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id WHERE dragones.id = ?');
        $query->execute([$id]);
   
        return $query->fetchAll(PDO::FETCH_OBJ);

    }

    public function addDragon($raza,$descripcion,$repre,$id_mito) {

        $query = $this->db->prepare("INSERT INTO dragones (nombre_raza,descrip,representaciones,id_mitologia_fk) VALUES (?, ?, ?, ?)");
        $query->execute([$raza,$descripcion,$repre,$id_mito]);

        return $this->db->lastInsertId();

    }
    
    function deleteDragon($id) {
        
        $query = $this->db->prepare('DELETE FROM dragones WHERE id = ?');
        $query->execute([$id]);

    }

    function getAllSortBy($params) {
        $query = $this->db->prepare("SELECT dragones.id as id,nombre_raza, mitologias.mitologia as origen_mitologico, descrip, representaciones, id_mitologia_fk FROM `dragones` inner join mitologias on dragones.id_mitologia_fk = mitologias.id 
                                    WHERE dragones.id_mitologia_fk = $params[where] ORDER BY $params[field] $params[sort] LIMIT $params[limit] OFFSET $params[offset]");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}

