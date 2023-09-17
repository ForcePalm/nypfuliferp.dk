<?php
declare(strict_types=1);

namespace AdminTheme\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        $this->loadComponent('FormProtection');
        $this->loadComponent('Authentication.Authentication');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check
        if($this->request->getAttribute('identity')){
            if($this->request->getAttribute('identity')->get('group_id') != 2){
                $this->redirect(['plugin' => null]);
            }
        }
    }

}
