<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\Length;

class ShoppingcartController extends AbstractController {
/*----------------------------------------------------------- Display: ------------------------------------------------------------  */
    

    public function Add_product($ID) {

        $Shoppincart = array(1,3);

        for($check = 0; $check == count($Shoppincart); $check++) {
            if ($Shoppincart[$check] != $ID) {
                array_push($Shoppincart, $ID);
            } else {
                
            }
        }
        // var_dump($Shoppincart);
        
        
        // var_dump(count($Shoppincart));
        $Count_Shoppincart = count($Shoppincart);
        
        return $this->render('Shoppingcart.html.twig', [
            'Shoppingcartitems' => $Shoppincart,
            'ShoppingcartCount' => $Count_Shoppincart,
        ]); 
    }

/*----------------------------------------------------------- Functions: ------------------------------------------------------------  */
    

}