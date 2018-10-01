<?php
/**
 * Created by PhpStorm.
 * User: edkos
 * Date: 9/25/2018
 * Time: 11:54 PM
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class blogController extends BaseController
{
    public function blog(Request $r):Response
    {
        if ('GET' === $r->getMethod()) {

            $name = $r->request->get(' ');
            $password = $r->request->get(' ');
            $content = $r->request->get('content');
            $user = new User($name, $password, $content);
            $comments = $user->showUserContent();
        }

        $data = ['comments' => $comments];
        return new Response($this->twig->render('blog.twig', $data));
    }
}