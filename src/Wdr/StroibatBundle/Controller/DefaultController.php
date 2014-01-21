<?php

namespace Wdr\StroibatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
		$em = $this->getDoctrine()->getManager();
		$aEtapi = $em->getRepository('WdrStroibatBundle:Etapi')->findAll();
		$aSlider = $em->getRepository('WdrStroibatBundle:Slider')->findAll();
		$aProblems = $em->getRepository('WdrStroibatBundle:Problems')->findAll();
		$aFeedbacks = $em->getRepository('WdrStroibatBundle:Feedback')->findAll();

		return $this->render('WdrStroibatBundle:Default:index.html.twig', array(
			'etapi' => $aEtapi,
			'slider' => $aSlider,
			'problems' => $aProblems,
			'feedbacks' => $aFeedbacks,
		));
    }
}
