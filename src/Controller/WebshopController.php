<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WebshopController extends AbstractController {
/*----------------------------------------------------------- Display: ------------------------------------------------------------  */
    
    public function Welcome() {

        $session = $this->get('session');
        $session->set('filter', array(
            'User' => "",
        ));

        return $this->render('Home.html.twig', [
        ]);
    }

    public function Product() {
        
        $Get_Products = $this->get_products();
        
        return $this->render('Product.html.twig', [
            'Products' => $Get_Products,
        ]);
    }

    public function Account() {
        $Error = '';
        $LoginError = '';

        return $this->render('Account.html.twig', [
            'Errors' => $Error,
            'LoginErrors' => $LoginError,
        ]);
    }

    public function Account_logout() {
        
        sleep(3);
        
        return $this->render('Home.html.twig', [
        ]);
    }

/*----------------------------------------------------------- Functions: ------------------------------------------------------------  */
    
    public function databaseconnection() {

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "mysql";
    $dbName = "AO-Webshop";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    return $conn;
    }

    public function get_products() {
        $products = [];
        $conn = $this->databaseconnection();
        $sql = "SELECT * FROM Products";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
        }
    }
    return $products;
    }

}