<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\Length;

class ShoppingcartController extends AbstractController {
/*----------------------------------------------------------- Display: ------------------------------------------------------------  */
    

    public function Add_product(int $ID) {
        // $ID is product id
        $Shoppingcart = array(1,3,2);
        // var_dump($ID);
        for($check = count($Shoppingcart)-1; $check < count($Shoppingcart); $check++) {
            // echo "Check: ". $check. "<br>";
            if ($Shoppingcart[$check] != $ID) {
                array_push($Shoppingcart, $ID);
                // echo "<br> In de loop <br>";
                // var_dump($Shoppingcart);
            } else {
                
            }
        }
        // echo "<br> Uit de loop <br>";
        // var_dump($Shoppingcart);

        // $session = $this->get('session');
        // $session->set('filter', array(
        //     'Shoppingcart_User' => $Shoppingcart,
        // ));
        
        
        
        // var_dump(count($Shoppingcart));
        $Count_Shoppingcart = count($Shoppingcart);
        
        return $this->render('shoppingcart.html.twig', [
            // 'Shoppingcartitems' => $Shoppingcart,
            'ShoppingcartCount' => $Count_Shoppingcart,
        ]); 
    }

/*----------------------------------------------------------- Functions: ------------------------------------------------------------  */
    

}