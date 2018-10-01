<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;


class UserController extends BaseController
{

    public function register(Request $r): Response
    {
        if ($r->getSession()->get('userName')){
            return new RedirectResponse('/user/list');
        }

        if ('POST' === $r->getMethod()) {

            $name = $r->request->get('name');
            $passwordHash = password_hash($r->request->get('password'), PASSWORD_DEFAULT);
            $rePassword = $r->request->get('rePassword');

             $userExist = new User($name, $passwordHash, $rePassword);

                if (password_verify($rePassword, $passwordHash) === true) {

                    $userExist->save();

                    return new RedirectResponse('/');
                } else {
                    return new RedirectResponse('/user/register');
                }
            }
        return new Response($this->twig->render('register.twig'));
    }
}

