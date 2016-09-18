<?php

namespace Ced\VideothequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        /**
         * Comme @Template() est vide, il va chercher par défaut le fichier dans videothequeBundle/views/Admin/index.html.twig
         */
        return array();
    }
}
