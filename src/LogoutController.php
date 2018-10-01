<?php
/**
 * Created by PhpStorm.
 * User: edkos
 * Date: 9/22/2018
 * Time: 11:09 PM
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LogoutController extends BaseController
{
    public function logout(Request $r): Response
    {
        if ($r->getSession()) {
            $r->getSession()->invalidate();
            
            return new RedirectResponse('/user/login');

         }
    }
}