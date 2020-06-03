<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController {
/*----------------------------------------------------------- Display: ------------------------------------------------------------  */
    
    public function Account_Register() {

        $Name = $_POST["Username"];
        $Pass = $_POST["Password"];

        $FormError = $this->FormControl($Name, $Pass);

        if ($FormError == null) {
           // var_dump(print_r(array_values($FormError)));
            
            $this->Submit_Account($Name, $Pass);

            // session_start();

            $session = $this->get('session');
            $session->set('filter', array(
                'User' => $Name,
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

    public function Account_Login() {

        $Name = $_POST["Loginname"];
        $Pass = $_POST["Loginpass"];

        $LoginFormError = $this->FormControl($Name, $Pass);

        if ($LoginFormError == null) {
           // var_dump(print_r(array_values($LoginFormError)));
            
            $this->Submit_Account($Name, $Pass);

            // session_start();

            $session = $this->get('session');
            $session->set('filter', array(
                'User' => $Name,
            ));
            
            return $this->render('Home.html.twig', [
            ]);
            
        } else {        
            // var_dump(print_r(array_values($LoginFormError)));

            
            return $this->render('Account.html.twig', [
                'LoginErrors' => $LoginFormError,
            ]);
            
        }
    }

/*----------------------------------------------------------- Functions: ------------------------------------------------------------  */

    public function FormControl($DataName, $DataPass) {
        
        if(!empty($_POST)) {
            $name = $DataName;
            $password = $DataPass;
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