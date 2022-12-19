<?php

namespace App\Controllers;

use \App\Models\M_login;

class C_login extends BaseController
{
    protected $loginModel;
    public function __construct()
    {
        $this->loginModel = new M_login();
    }

    public function display()
    {
        return view('V_loginDisplay');
    }
    public function auth()
    {
        $session = \config\Services::session();

        $data = [
            'id' => $this->request->getVar('id'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ];
        $result = $this->loginModel->getLogin($data);
        if ($result) {
            $ses_data = [
                'logged_in'  => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to('/barang/display');
        } else {
            $session->setFlashdata('msg', 'Wrong Password');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
