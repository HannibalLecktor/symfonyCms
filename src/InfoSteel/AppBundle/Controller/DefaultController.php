<?php

namespace InfoSteel\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => 'fans');
    }

    /**
     * @Route("/send-mail")
     * @Template("InfoSteelAppBundle:Default:index.html.twig")
     */
    public function mailAction()
    {
        $mailer = $this->get('mailer');

        $message = $mailer->createMessage()
            ->setSubject('You have Completed Registration!')
            ->setFrom($this->container->getParameter('mailer_sender'))
            ->setTo('fans7288@gmail.com')
            ->setBody(
                "test",
                'text/html'
            )
        ;
        $mailer->send($message);

        return array();
    }
}
