<?php

// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController {
/*----------------------------------------------------------- Display: ------------------------------------------------------------  */
    
    public function Account_Register() {

        $FormError = $this->FormControl();

        if ($FormError == null) {
           // var_dump(print_r(array_values($FormError)));
            $Name = $_POST["Username"];
            $Pass = $_POST["Password"];
            
            $this->Submit_Account($Name, $Pass);

            // session_start();

            $session = $this->get('session');
            $session->set('filter', array(
                'User' => $Name,
                'Shoppingcart' => '',
            ));
            
            return $this->render('Home.html.twig', [
            ]);
            
        } else {        
            // var_dump(print_r(array_values($FormError)));

            
            return $this->render('Account.html.twig', [
                'Errors' => $FormError,
            ]);
            
        }
    }

/*----------------------------------------------------------- Functions: ------------------------------------------------------------  */

    public function FormControl() {
        
        if(!empty($_POST)) {
            $name = $_POST['Username'];
            $password = $_POST['Password'];
            $errors = array();
            
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

/*----------------------------------------------------------- Database: ------------------------------------------------------------  */

    public function databaseconnection() {

        $dbServername = "localhost";
        $dbUsername = "root";
        $dbPassword = "mysql";
        $dbName = "AO-Webshop";
    
        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
        return $conn;
        }

    public function Submit_Account($dataName, $dataPass) {
        $conn = $this->databaseconnection();
        $Submit = "INSERT INTO Customer (ID, Name, Email, Code) VALUES (NULL, '$dataName' , 'No Email!!',  '$dataPass')";
        //var_dump($Submit);
        $result = mysqli_query($conn, $Submit);
    }

    public function Get_Account($dataName, $dataPass) {
        # code...
    }
}