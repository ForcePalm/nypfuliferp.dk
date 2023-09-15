<?php
use Cake\Controller\Controller;

class UsersController extends Controller
{
    public function login()
    {
        // Define the Steam OpenID URL
        $steamOpenIDUrl = 'https://steamcommunity.com/openid/login';

        // Define the return URL where Steam will redirect the user after authentication
        $returnUrl = Router::url(['controller' => 'Users', 'action' => 'verify'], true);

        // Define the OpenID parameters
        $params = [
            'openid.ns'         => 'http://specs.openid.net/auth/2.0',
            'openid.mode'       => 'checkid_setup',
            'openid.return_to'  => $returnUrl,
            'openid.realm'      => 'http://forcepalm.dk/', // Replace with your actual realm URL
            'openid.identity'   => 'http://specs.openid.net/auth/2.0/identifier_select',
            'openid.claimed_id' => 'http://specs.openid.net/auth/2.0/identifier_select',
        ];

        // Build the query string for the OpenID request
        $queryString = http_build_query($params);

        // Construct the Steam OpenID login URL
        $steamLoginUrl = "{$steamOpenIDUrl}?{$queryString}";

        // Redirect the user to the Steam login page
        $this->redirect($steamLoginUrl);
    }

    public function verify()
    {
    $user = $this->Openid->getVerifiedPerson();

    if ($user) {
        // Check if the user already exists in your database
        $existingUser = $this->Users->findBySteamId($user['steamId'])->first();

        if (!$existingUser) {
            // User doesn't exist, create a new account
            $newUser = $this->Users->newEntity([
                'steam_id' => $user['steamId'],
                'username' => $user['username'],
                'profile_url' => $user['profileUrl'],
                // Add other user-related data here
            ]);

            if ($this->Users->save($newUser)) {
                // User account created successfully
            } else {
                // Handle the case where the user account creation fails
            }
        } else {
            // User already exists, log them in
            // Implement your login logic here
        }
    } else {
        // Authentication failed
    }
    }

    public function logout()
    {
        // Destroy the user's session to log them out
        $this->getRequest()->getSession()->destroy();
    
        // Optionally, you can redirect the user to a logged-out page or the home page
        return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
    }
}