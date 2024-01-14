<?php 
include_once("../model/db.php");
include_once("../model/school.model.php");


// Check if the action parameter is set
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Call the appropriate function based on the action parameter
    switch ($action) {
        case 'addSchool':
            addNewSchool();
            break;
        case 'loadAll':
            get_member_by_school(NULL);
            break;
    }
}


function addNewSchool(){
    // accepting and validating user input
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_EMAIL);
   

    $res = create_new_school($name, $country);

    echo $res;
}

function getAllSchools(){
   $school_id = 1;
    get_member_by_school(NULL);
    // print_r($result);
    // echo json_encode($result);
}



