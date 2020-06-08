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
            
            return $this->render('home.html.twig', [
            ]);
            
        } else {        
            // var_dump(print_r(array_values($FormError)));
 
            return $this->render('account.html.twig', [
                'Errors' => $FormError,
            ]);
            
        }
    }

    public function Account_Login() {

        $Name = $_POST["Loginname"];
        $Pass = $_POST["Loginpass"];

        $LoginFormError = $this->FormLogin($Name, $Pass);

        if ($LoginFormError == null) {
            
            $Shoppingcart = "";
            
            $session = $this->get('session');
            $session->set('filter', array(
                'User' => $Name,
                'Shoppingcart_User' => $Shoppingcart,
            ));
            
            return $this->render('home.html.twig', [
            ]);
            
        } else {        
      
            return $this->render('account.html.twig', [
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

            if(empty($name)){
                $errors[] = "name is required";
            }
        
            if(empty($password)){
                $errors[] = "password cannot be left empty";
            }
        
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
           
            // echo "<ul>";
            // foreach ($errors as $error) {
            //     echo "<li>$error</li>";
            // }
            // echo "</ul>";
        
            return $errors;
        }  
    }

    public function FormLogin($Name, $Pass) {
        // $Name = $Name;
        // $PassWord = $Pass;
        $Loginerrors = array();
        
        $result = $this->Get_Account($Name);
        
        if (json_encode($result) != "[]") {
            foreach ($result as $row) {
                 
                if ($Name == $row["Name"]) {
                    // echo "Name is correct!!";
                    if ($Pass == $row["Code"]) {
                        
                        $session = $this->get('session');
                        $session->set('filter', array(
                            'User' => $Name,
                        ));

                        return $this->render('Home.html.twig', [
                        ]);
            
                    } else {
                        // echo "PassWord is incorrect!!";
                        $Loginerrors[] = '<i class="fas fa-exclamation-circle"></i> PassWord is incorrect!!';
                    }
                } else {
                    // echo "Name is incorrect!!";
                    $Loginerrors[] = '<i class="fas fa-exclamation-circle"></i> Name is incorrect!!'; 
                }         
            }       
        } else {
            // echo "<br> No user found";
            $Loginerrors[] = '<i class="fas fa-exclamation-circle"></i> No user found / Wrong name';
        }

        return $Loginerrors;
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

    public function Get_Account($dataName) {
        
        $conn = $this->databaseconnection();
        $Search = "SELECT * FROM `Customer` WHERE `Name` = '$dataName'";
        // var_dump($Submit);
        $result = mysqli_query($conn, $Search);
        // var_dump($result);
        
        return $result;
        
    }
}