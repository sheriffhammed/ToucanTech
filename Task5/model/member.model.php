<?php

// Get all the members based on school ID and return all member is no school was selected
function get_member_by_school($school_id){
    global $db;

    try {
        if($school_id){
            $query = "SELECT M.id, M.name, M.email, S.school_name, S.country FROM members M LEFT JOIN schools S ON M.schoolId = S.id WHERE M.schoolId = :school_id ORDER BY M.id ASC";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':school_id', $school_id);
        }
        else{
            $query = "SELECT M.id, M.name, M.email, S.school_name, S.country FROM members M LEFT JOIN schools S ON M.schoolId = S.id ORDER BY M.id ASC";
            $stmt = $db->prepare($query);
        }
        $stmt->execute();
        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
       
        return json_encode($members, true);
    } catch (PDOException $e) {
        echo "Error". $e->getMessage();
    }
}

function get_member($member_id){
    global $db;    
    $query = "SELECT * FROM members WHERE id = :member_id ";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $member_id);       
    $stmt->execute();
    $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();    
    return json_encode($members, true);
   
}


// Delete member by member id
function delete_member($id){
    global $db;

    $query= "DELETE FROM members WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $stmt->closeCursor();
}

// Insert new member
function create_new_member($name, $email, $school){
     global $db;
     $query = "INSERT INTO members (name, email, schoolId) VALUES (:member_name, :email, :school)";
     $stmt = $db->prepare($query);
     $stmt->bindValue(':member_name', $name);
     $stmt->bindValue(':email', $email);
     $stmt->bindValue(':school', $school);
     $res =$stmt->execute();
     $stmt->closeCursor();

     if(!$res){
        echo "Error adding member";
     }else{
        echo "New member added successfully!";
     }
}