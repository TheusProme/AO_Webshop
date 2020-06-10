<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\Length;
use App\Model\ShoppingCartModel as shop;

class ShoppingcartController extends AbstractController {
/*----------------------------------------------------------- Display: ------------------------------------------------------------  */
    

    public function Add_product($ID) {
        // $session = $this->get('session');

        $cart = new shop();  // roept constructor aan van aparte Shoppingcart class,
                // in deze constructor wordt de sessie uitgelezen en is het object al "gevuld"met de bestaande inhoud

        $cart->add($ID);   // voegt toe en slaat op in sessie

        $cart_contents = $cart->getAllItems();

        $cart_price = $cart->getTotalPrice();
        
        //$Count_Shoppingcart = count($Shoppingcart);
        
        // return $this->render('shoppingcart.html.twig', [
        //     // 'Shoppingcartitems' => $Shoppingcart,
        //     'ShoppingcartCount' => $Count_Shoppingcart,
        // ]); 
    }

/*----------------------------------------------------------- Functions: ------------------------------------------------------------  */
    

}