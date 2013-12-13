<?php

namespace Wdr\StroibatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WdrStroibatBundle:Default:index.html.twig');
    }
}
