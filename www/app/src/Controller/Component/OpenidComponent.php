<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Http\Client;

class OpenidComponent extends Component
{
    private $steamOpenIdUrl = 'https://steamcommunity.com/openid/login'; // Steam OpenID URL
    private $returnUrl = 'users/verify'; // Replace with your verification action URL

    public function initialize(array $config): void
    {
        parent::initialize($config);
    }

    // Method to initiate the Steam OpenID authentication flow
    public function authenticate()
    {
        // Generate a unique OpenID realm (your website's base URL)
        $realm = Router::url('/', true);

        // Construct the Steam OpenID authentication URL
        $authUrl = $this->steamOpenIdUrl . '?' . http_build_query([
            'openid.ns'         => 'http://specs.openid.net/auth/2.0',
            'openid.mode'       => 'checkid_setup',
            'openid.return_to'  => $realm . $this->returnUrl,
            'openid.realm'      => $realm,
            'openid.identity'   => 'http://specs.openid.net/auth/2.0/identifier_select',
            'openid.claimed_id' => 'http://specs.openid.net/auth/2.0/identifier_select',
        ]);

        // Redirect the user to the Steam OpenID authentication URL
        $this->getController()->redirect($authUrl);
    }

    // Method to handle the Steam OpenID response
    public function verify()
    {
        $usersTable = TableRegistry::getTableLocator()->get('Users'); // Replace 'Users' with your user table name
        $http = new Client();

        $request = $this->getController()->getRequest();

        // Ensure that this is a valid OpenID response
        if (!$request->getQuery('openid_mode') || $request->getQuery('openid_mode') !== 'id_res') {
            // Handle invalid response
            // You can redirect the user to an error page or display an error message
            // Log and handle the error as needed
            return $this->getController()->redirect(['controller' => 'Pages', 'action' => 'error']);
        }

        // Get the SteamID from the OpenID response
        $steamId = $request->getQuery('openid_claimed_id');

        // Perform verification and user authentication logic as needed
        // In this section, you can add code to fetch the user's Steam profile using the Steam Web API

        // Replace 'YOUR_STEAM_API_KEY' with your actual Steam Web API key
        $apiKey = Configure::read('steamApiKey');
        $profileUrl = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key={$apiKey}&steamids={$steamId}";

        
        $response = $http->get($profileUrl);

        if ($response->getStatusCode() == 200) {

            $profileData = json_decode($response->getBody(), true);
            $user = $usersTable->find()->where(['steam_id' => $profileData['response']['players'][0]['steamid']])->first();
            // Extract and use the user's profile information as needed
            if(!$user){
                $user = $usersTable->newEmptyEntity();

                $data = [
                    'steam_id'      => $profileData['response']['players'][0]['steamid'],
                    'name'          => $profileData['response']['players'][0]['personaname'],
                    'avatar'        => $profileData['response']['players'][0]['avatar'],
                    'avatar_medium' => $profileData['response']['players'][0]['avatarmedium'],
                    'avatar_full'   => $profileData['response']['players'][0]['avatarfull'],
                    'group_id'      => 1,
                ];

                $user = $usersTable->patchEntity($user, $data);

                if ($usersTable->save($user)) {
                    $this->getController()->Authentication->setIdentity($user);
                    return $this->getController()->redirect(['plugin' => 'PfuTheme', 'controller' => 'Pages', 'action' => 'display', 'home']);
                }

            }else{

                $data = [
                    'name'          => $profileData['response']['players'][0]['personaname'],
                    'avatar'        => $profileData['response']['players'][0]['avatar'],
                    'avatar_medium' => $profileData['response']['players'][0]['avatarmedium'],
                    'avatar_full'   => $profileData['response']['players'][0]['avatarfull'],
                ];

                $user = $usersTable->patchEntity($user, $data);

                if ($usersTable->save($user)) {

                    $this->getController()->Authentication->setIdentity($user);
                    return $this->getController()->redirect(['plugin' => 'PfuTheme', 'controller' => 'Pages', 'action' => 'display', 'home']);
                }
            }
        }
    }
}
