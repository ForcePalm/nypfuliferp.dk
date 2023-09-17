<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Routing\Router;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Http\Exception\UnauthorizedException;

class UsersController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Openid'); // Load your custom Steam OpenID component
        $this->loadComponent('Authentication.Authentication');
        
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);

    $this->Authentication->allowUnauthenticated(['login', 'verify']);
}

    public function login()
    {
        $this->Openid->authenticate();
    }

    public function verify()
    {
        $this->Openid->verify();
    }

    public function logout()
    {
        $this->Authentication->logout();

        $this->redirect(['plugin' => 'PfuTheme', 'controller' => 'Pages', 'action' => 'display', 'home']);
    }
}