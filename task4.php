<?php 

 /* 
* Add a function description here 
* Add a description of the return values here 
*/ 

private function checkDefaultEmailValid($userId=null) 
{
    
    // Return -1 if userId is empty
    if(empty($userId)) { 
        return -1; 
    } 

    // Retrieve the default email for the user based on the user ID
    $defaultEmail = $this->getDefaultEmailByUserId($userId); 

    // Check if the default email is empty 
    if(empty($defaultEmail)) 
    { 
        $this->set_default_email($userId); 
        $defaultEmail = 
        $this->getDefaultEmailByUserId($userId);
    } 

    // Return -1 if the default email is empty
    if(empty($defaultEmail)) 
    { 
        return -1; 
    } 

    // Check if the default email has been validated at least once and was validated within the last 12 months, the return 1 if condition are met
    if($defaultEmail['valid'] >=1 and ($defaultEmail['validated_on'] > (time() - strtotime('-12 months')))) 
    { 
    return 1; 
    } 

    // Retrieve the email address from the $defaultEmail array 
    $email = $defaultEmail['email']; 

    // Check if the email is empty or not a valid email address, the return 2 if the email is empty or not a valid email
    if (empty($email) or !filter_var($email, 
    FILTER_VALIDATE_EMAIL)) { 
    return 2; 
    } 

    //  validate the email address by Calling  the checkIfValid method 
    $validationResults = $this->checkIfValid($email); 

    // Return 0 if the email is not validated and 1 if otherwise
    if( ! $validationResults ) { 
    return 0; 
    } else { 
    return 1; 
    } 
}


?>