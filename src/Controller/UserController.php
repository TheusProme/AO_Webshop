<?php

// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController {
/*----------------------------------------------------------- Display: ------------------------------------------------------------  */
    
    public function Account_Register() {

        $FormError = $this->FormControl();

        return $this->render('Account.html.twig', [
            'Errors' => $FormError,
        ]);
    }

/*----------------------------------------------------------- Functions: ------------------------------------------------------------  */
    
    public function FormControl() {
        
        if(!empty($_POST)) {
            $name = $_POST['Username'];
            $password = $_POST['Password'];
        
            $namelen = strlen($name);
            $passwordlen = strlen($password);
            $max = 255;
            $minname = 2;
            $minpassword = 3;
        
            if($namelen < $minname){
                $errors[] = "name must be at least 2 characters";
            } elseif($namelen > $max){
                $errors[] = "name must be less than 255 characters";
            }
        
            if($passwordlen < $minpassword){
                $errors[] = "password must be at least 3 characters";
            } elseif($passwordlen > $max){
                $errors[] = "password must be less than 255 characters";
            }
        
            if(empty($name)){
                $errors[] = "name is required";
            }
        
            if(empty($password)){
                $errors[] = "password cannot be left empty";
            }
        
            // echo "<ul>";
            // foreach ($errors as $error) {
            //     echo "<li>$error</li>";
            // }
            // echo "</ul>";
        
            return $errors;
        }
        

    }
}