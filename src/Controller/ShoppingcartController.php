<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\Length;

class ShoppingcartController extends AbstractController {
/*----------------------------------------------------------- Display: ------------------------------------------------------------  */
    

    public function Add_product($ID) {

        $Shoppingcart = array(1,3);
        var_dump($ID);
        for($check = 0; $check == count($Shoppingcart); $check++) {
            if ($Shoppingcart[$check] != $ID) {
                array_push($Shoppincart, $ID);
                var_dump($Shoppingcart);
            } else {
                
            }
        }
        var_dump($Shoppingcart);
        
        
        // var_dump(count($Shoppingcart));
        $Count_Shoppingcart = count($Shoppingcart);
        
        // return $this->render('Shoppingcart.html.twig', [
        //     'Shoppingcartitems' => $Shoppingcart,
        //     'ShoppingcartCount' => $Count_Shoppingcart,
        // ]); 
    }

/*----------------------------------------------------------- Functions: ------------------------------------------------------------  */
    

}