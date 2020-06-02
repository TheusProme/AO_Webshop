<?php

// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WebshopController extends AbstractController {
/*----------------------------------------------------------- Display: ------------------------------------------------------------  */
    
    public function Welcome()
    {
        $number = random_int(0, 10);

        return $this->render('Home.html.twig', [
            'Number' => $number,
        ]);
    }

    public function Product()
    {

        return $this->render('Product.html.twig', [
        ]);
    }

/*----------------------------------------------------------- Functions: ------------------------------------------------------------  */

}