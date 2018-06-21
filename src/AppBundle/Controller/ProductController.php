<?php
/**
 * Created by PhpStorm.
 * User: kajornjitsongsaen
 * Date: 22/4/18
 * Time: 15:02
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
class ProductController extends Controller
{
    public function overviewAction(Request $request)
    {
        $products = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Product')->findAll();
        return $this->render('AppBundle:product:overview.html.twig', ['products' => $products]);
    }

    public function addAction(Request $request)
    {
        $name = $request->get('name');
        $price = $request->get('price');
        $sku = $request->get('sku');

        $product = new Product($name, $price);
        $product->setSku($sku);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($product);
        $em->flush($product);

        return $this->redirectToRoute('product_overview');
    }
}