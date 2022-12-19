<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if(! session()->get('logged_in')){
            // maka redirct ke halaman login
            return redirect()->to('/login'); 
        }else{
        $data['content_view'] = "V_barangDisplay.php";
        return view('V_template',$data );
        }
    }
}
