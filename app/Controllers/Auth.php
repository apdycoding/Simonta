<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\App;
use Google\Service\AlertCenter\User;
use phpDocumentor\Reflection\Types\Null_;

class Auth extends BaseController
{
    private $google_client = Null;
    protected $userModel;

    public function __construct()
    {
        // require_once APPPATH . "vendor/autoload.php";
        $this->userModel = new UserModel();

        include_once APPPATH . "../vendor/autoload.php";
        $this->google_client = new \Google_Client();
        $this->google_client->setClientId('923290339983-stplpr2919beo9mfi9ruvmmadm1borru.apps.googleusercontent.com'); //masukkan ClientID anda 
        $this->google_client->setClientSecret('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'); //masukkan Client Secret Key anda
        $this->google_client->setRedirectUri('http://localhost:8080/auth/loginWithGoogle'); //Masukkan Redirect Uri anda
        $this->google_client->addScope('email');
        $this->google_client->addScope('profile');
    }

    public function index()
    {
        // jika ada session maka redirect ke home
        if (session('isLoggedIn') == true) {
            return redirect()->to('/home');
        }
        return redirect()->to('/login');
    }
    public function login()
    {

        // $data = '<a href ="' . $this->google_client->createAuthUrl() . '"><img src="serti/google.png" alt="login with google" width="40%"></a>';
        $data = '<a href ="' . $this->google_client->createAuthUrl() . '"> Create Account With Google </a>';

        $button['googleButton'] = $data;
        if (session('isLoggedIn') == true) {
            return redirect()->to('/home');
        }
        return view('auth/login', $button);
    }

    public function loginWithGoogle($var = null)
    {
        $token = $this->google_client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if (!isset($token['error'])) {
            $this->google_client->setAccessToken($token['access_token']);
            session()->set('AccessToken', $token['access_token']);

            $googleService = new \Google_Service_Oauth2($this->google_client);
            $data = $googleService->userinfo->get();
            // echo "<prev>";
            // print_r($data);
            // die;
            $userData = [];
            // jika isAlreadyregister ada id account google yang terlogin
            if ($this->userModel->isAlreadyRegister($data['id'])) {
                //    jika ada id terlogin true
                $agent = $this->request->getUserAgent();
                $userData = [
                    'nameUser' => $data['givenName'] . " " . $data['familyName'],
                    'emailUser' => $data['email'],
                    'isactive' => 'nonActived',
                    'roleUser' => 'walisantri',
                    // 'isLoggedIn' => true,
                    // password default
                    'password'  => password_hash('12345', PASSWORD_BCRYPT),
                    'picture' => $data['picture'],
                    'agent' => $agent->getAgentString(),
                    'browser' => $agent->getBrowser(),
                    'mobile' => $agent->getMobile(),
                    'platform' => $agent->getPlatform(),
                ];
                // dd($userData);
                // update success
                $this->userModel->updateUserData($userData, $data['id']);
                return redirect()->to('/');
            } else {
                $agent = $this->request->getUserAgent();
                // false /login baru
                $userData = [
                    'oauth_id' => $data['id'],
                    'nameUser' => $data['givenName'] . " " . $data['familyName'],
                    'emailUser' => $data['email'],
                    'isactive' => 'nonActived',
                    'roleUser' => 'walisantri',
                    'isLoggedIn' => true,
                    // password default
                    'password'  => password_hash('12345', PASSWORD_BCRYPT),
                    'picture' => $data['picture'],
                    // 'server' => $this->request->getUserAgent(),
                    'agent' => $agent->getAgentString(),
                    'browser' => $agent->getBrowser(),
                    'mobile' => $agent->getMobile(),
                    'platform' => $agent->getPlatform(),
                    // 'server' => $this->request->getServer(),
                    // 'ip' => $this->request->getIPAddress()
                ];
                // dd($userData);
                // insert account data google [success]
                $this->userModel->save($userData);
                return redirect()->to('/');
            }

            session()->set($userData);
            return true;

            // session()->set("LoggedUserData", $userData);
        } else {
            session()->setFlashdata('error', 'some thing wrong');
            // return redirect()->back()->with('error', 'Password anda salah');
            return redirect()->to('auth/login');
        }

        // succesfull
        return redirect()->to('auth/login');
    }


    // login konvensional 

    private function setUsersession($user)
    {
        $agent = $this->request->getUserAgent();

        $data = [
            'user_id' => $user['user_id'],
            'nameUser' => $user['nameUser'],
            'emailUser' => $user['emailUser'],
            'phoneUser' => $user['phoneUser'],
            'roleUser' => $user['roleUser'],
            'isactive' => $user['isactive'],
            'isLoggedIn' => true,
            // 'photos' => $user['photos'],
            'agent' => $agent->getAgentString(),
            'browser' => $agent->getBrowser(),
            'mobile' => $agent->getMobile(),
            'platform' => $agent->getPlatform(),
        ];

        // update perangkat yang digunakan ketika login terakhir
        $this->userModel->update($user['user_id'], $data);
        session()->set($data);
        // set session terlogin
        return true;
    }

    public function loginproses()
    {
        // ambil data dari form
        $post = $this->request->getVar();
        // where berdasarkan email
        $user = $this->userModel->where('emailUser', $post['email'])
            ->first();

        // jika salah email
        if ($user) {

            // jika akun belum aktif
            if ($user['isactive'] == 'actived') {

                // verify password
                if (password_verify($post['password'], $user['password'])) {

                    // dd($user);
                    // jika berhasil login cetak session dari function diatas
                    $this->setUsersession($user);

                    return redirect()->to('/home');
                    // 
                } else {
                    return redirect()->back()->with('error', 'Password anda salah');
                }
            } else {
                return redirect()->back()->with('error', 'Account anda belum aktif');
            }
        } else {
            return redirect()->back()->with('error', 'Login anda gagal');
        }
    }

    // end login konvesional


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        return view('auth/register');
    }
}
