<?php
/**
 * Created by PhpStorm.
 * User: edkos
 * Date: 9/18/2018
 * Time: 11:49 PM
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;


class ListController extends BaseController
{
    public function list(Request $r): Response
    {
        if (!$r->getSession()->get('userName')){
            return new RedirectResponse('/user/login');
        }

        if ('POST' === $r->getMethod()){

            $name  = $r->request->get(' ');
            $password = $r->request->get(' ');
            $content = $r->request->get('content');
            $user = new User($name, $password, $content);
            if ($r->getSession()->get('userId')) {
                $userId = $r->getSession()->get('userId');

                $user->saveListController($userId);

            }
                return new RedirectResponse('/user/list');
        }
        return new Response($this->twig->render('list.twig'));
    }
}