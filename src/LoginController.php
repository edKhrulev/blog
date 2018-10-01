<?php
/**
 * Created by PhpStorm.
 * User: edkos
 * Date: 9/17/2018
 * Time: 12:02 AM
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends BaseController
{
    public function login(Request $r): Response
    {
        if ($r->getSession()->get('userName')){

            return new RedirectResponse('/user/list');
        }

        if ('POST' === $r->getMethod()) {

            $name = $r->request->get('name');
            $password = $r->request->get('password');
            $user = new User($name);
            $userExisted = $user->getUserByLogin()[0];

            if (password_verify($password, $userExisted['password'])) {

                if ($r->getSession()) {
                    $r->getSession()->set('userId', $userExisted['id']);
                    $r->getSession()->set('userName', $userExisted['name']);
                }

                return new RedirectResponse('/user/list');
            } else {
                return new RedirectResponse('/user/login');
            }
        }
        return new Response($this->twig->render('login.twig'));
    }
}