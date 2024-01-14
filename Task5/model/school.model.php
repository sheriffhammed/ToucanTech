<?php

// Get all the members based on school ID and return all member is no school was selected
function get_school_by_country($country){
    global $db;

    try {
        if($country){
            $query = "SELECT * FROM schools WHERE country = :country ORDER BY id ASC";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':country', $country);
        }
        else{
            $query = "SELECT * FROM schools  ORDER BY id ASC";
            $stmt = $db->prepare($query);
        }
        $stmt->execute();
        $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
       
        return json_encode($schools, true);
    } catch (PDOException $e) {
        echo "Error". $e->getMessage();
    }
}


// Delete member by member id
function delete_school($id){
    global $db;

    $query= "DELETE FROM schools WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $stmt->closeCursor();
}

// Insert new member
function create_new_school($name, $country){
     global $db;
     $query = "INSERT INTO schools (school_name, country) VALUES (:name, :country)";
     $stmt = $db->prepare($query);
     $stmt->bindValue(':name', $name);
     $stmt->bindValue(':country', $country);
    
     $res =$stmt->execute();
     $stmt->closeCursor();

     if(!$res){
        echo "Error adding member";
     }else{
        echo "New school added successfully!";
     }
}