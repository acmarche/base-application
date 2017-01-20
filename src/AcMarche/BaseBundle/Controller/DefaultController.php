<?php

namespace AcMarche\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="acmarche_home")
     */
    public function indexAction()
    {
        return $this->render('AcMarcheBaseBundle:Default:index.html.twig');
    }
}
