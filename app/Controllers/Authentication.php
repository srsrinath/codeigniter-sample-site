<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;



class Authentication extends BaseController{

    protected $user;

	public function __construct()
	{
		$this->user = new UserModel();
	}

    public function registerView()
    {
        $data=[
            'meta_title' => 'Gallery site',
            'title' => 'Registration',
            'validation' => $this->validation
        ];
              
        return view('auth/register',$data);
    }
    public function register()
    {
        //dd($this->validation);
        $data=[
            'meta_title' => 'Gallery site',
            'title' => 'Registration',
            'validation' => $this->validation,

        ];
        $rules=[
            'name' => 'required|min_length[6]|max_length[10]',
            'email' => 'required|valid_email|is_unique[students.email]',
            'password' => 'required|min_length[6]|max_length[8]',
            'confirmpassword' => 'required|matches[password]',
        ];
        if($this->request->getMethod() == 'post')
        {
            
      
            if($this->validate($rules)){
                $model=new Usermodel();
                    $newData=[
                        'name' => $this->request->getVar('name'),
                        'email' => $this->request->getVar('email'),
                        'password' => $this->request->getVar('password'),
                        'confirmpassword' => $this->request->getVar('confirmpassword'),
                    ];
                   // dd($newData);
                    $model->save($newData);
                    $session=session();
                    $session->setFlashdata('success','Registration Successful ');
                    return redirect()->to('/login');
            }
            else{
        //        echo "ready to save";
                $data['validation']=$this->validator;
        
            }
        } 
        return view('auth/register',$data);
    }
    public function login()
    {
        helper(['form']);
        $data=[];
       $data=[
           'meta_title' => 'Gallery site',
           'title' => 'Login', 
           'validation' => $this->validation,

       ];
       $rules=[
        'email' => 'required|valid_email',
        'password' => 'required|min_length[6]|max_length[8]|validateUser[email,password]',
       
    ];
        $errors=[
            'password' => [
                'validateUser' => 'Email or password don\'t match'
            ]
            ];
            if ($this->request->getMethod() == 'post') {
                if ($this->validate($rules, $errors)) {
                    $user=$this->user->where('email', $this->request->getVar('email'))
                        ->first();

                    $this->setUserSession($user);
                    return redirect()->to('/dashboard');
                } else {
                    $data['validation']=$this->validator;
                }
            }
        echo view('auth/login',$data);
    }
    
    private function setUserSession($user){
        //dd($user);
        $data=[
            'id' => $user->id,
			'name' => $user->name,
			'email' => $user->email,
			'isLoggedIn' => true,
	
        ];
          
    session()->set($data);
    return true;
    }
    public function dashboard()
    {
        $data=[
            'meta_title' => 'Gallery site',
            //'title' => 'This is a contact page',
        ];
        
        
        return view('pages/dashboard',$data);
    }
    public function logout(){
        session()->remove('isLoggedIn');
        session()->destroy();
        return redirect()->to('/');
    }
}
