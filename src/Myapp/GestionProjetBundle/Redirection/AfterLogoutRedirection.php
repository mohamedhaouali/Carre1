<?php
/**
 *
 */




namespace Myapp\GestionProjetBundle\Component\Redirection;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class AfterLogoutRedirection implements LogoutSuccessHandlerInterface
{
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    /**
     * @var \Symfony\Component\Security\Core\SecurityContextInterface
     */
    private $security;

    /**
     * @param SecurityContextInterface $security
     */
    public function __construct(RouterInterface $router, SecurityContextInterface $security)
    {
        $this->router = $router;
        $this->security = $security;
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function onLogoutSuccess(Request $request)
    {
        $roles = $this->security->getToken()->getRoles();
        $rolesTab = array_map(function ($role) {
            return $role->getRole();
        }, $roles);
        if (in_array('ROLE_RH', $rolesTab, true) || in_array('ROLE_SUPERVISOR', $rolesTab, true)||
            in_array('ROLE_NTERN', $rolesTab, true) || in_array('ROLE_ADMIN', $rolesTab, true))
               $response = new RedirectResponse($this->router->generate('fos_user_security_login'));
           else
               $response = new RedirectResponse($this->router->generate('home'));

           return $response;
    }
}