<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Services\Helpers\Util;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    public function indexProductsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productsRepository = $em->getRepository(Product::class);

        $products = $productsRepository->getIndexProducts(Product::INDEX_COUNT);

        Util::dumpArray($products);


        return $this->render('product/indexProducts.html.twig',[
            'products' => $products
        ]);
    }
}
