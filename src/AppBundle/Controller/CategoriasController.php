<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Categorias;
use AppBundle\Form\CategoriasType;


/**
 * @Route("/categorias")
 */


class CategoriasController extends Controller
{
    /**
     * @Route("", name="categorias")
     */
    public function categoriasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categorias = $em->getRepository('AppBundle:Categorias')->findAll();

        return $this->render('categorias/categorias.html.twig', array(
          'categorias' => $categorias
        ));
    }

    /**
     * @Route("/crear", name="categorias_crear")
     */

    public function crearCategoriaAction(Request $request)
    {
        $categorias = new Categorias();

        $categoriasForm = $this->categoriasForm($categorias);

        $categoriasForm->handleRequest($request);

        if($categoriasForm->isValid()){
          $em = $this->getDoctrine()->getManager();

          $em->persist($categorias);
          $em->flush();

          $this->get('session')->getFlashBag()->add('mensaje', 'Registro creado');

          return $this->redirect($this->generateUrl('categorias'));
        }

        return $this->render('categorias/crear.html.twig', array(
          'categorias_form' => $categoriasForm->createView()
        ));
    }

    public function categoriasForm(Categorias $entity)
    {
      $form = $this->createForm(new CategoriasType(), $entity);

      return $form;
    }
}
