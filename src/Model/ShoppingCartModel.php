<?php
namespace App\Model;

use Symfony\Component\HttpFoundation\Session\Session;

class ShoppingCartModel {
    // Voeg 4 public properties toe aan de class:
    public $cart;
    
    public $Item;
    public $Totalitems;
    public $TotalPrice;


// Maak een constructor aan in de phpfile class waarmee de waardes van de 4 properties gezet 
// kunnen worden wanneer je een nieuw object aanmaakt gebasseerd op de Shoppingcart class:
    public function __construct() {

        $this->session = new Session();
        $filter = $this->session->get('filter');
        var_dump($filter);
        $CurrentShoppingcart = $filter['Shoppingcart_User'];
        
        $this->cart = $CurrentShoppingcart;
    }


    public function Add($ProductName) {
        
        $cart = $this->cart;

        var_dump(count($cart));

        if (count($cart) == 0) {
            // leeg
            $cart;
        } else {
        
            for($check = 0; $check < count($cart); $check++) {
                // echo "Check: ". $check. "<br>";
                if ($cart[$check] != $ProductName) {
                    $cart["$ProductName"] = +1;
                    //echo $cart;

                    $this->cart = $cart;

                    $filter['Shoppingcart_User'] = $cart;
                } else {
                    
                }
            }
        }
    }

    public function getAllItems() {
        $this->Shoppingcart;
    }

    public function getTotalPrice() {
        $Price = $this->Shoppingcart;
        
        
    }
}