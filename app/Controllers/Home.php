<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use \App\Models\GalleryModel;


class Home extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $data=[
            'meta_title' => 'Ci4_site',
        ];
        
        
        return view('pages/index',$data);
    }
    
    public function about()
    {
        $data=[
            'meta_title' => 'Ci4_site',
            'title' => 'This is a about page',
        ];
        
        
        return view('pages/about',$data);
    }
    
    public function contact()
    {
        $data=[
            'meta_title' => 'Ci4_site',
            'title' => 'This is a contact page',
        ];
        
        
        return view('pages/contactus',$data);
    }
    public function gallery()
    {
        $data=[
            'meta_title' => 'Ci4_site',
            'title' => 'List of Photos',
        ];
        $model=new GalleryModel();
        $data['photos']=$model->findAll();
        
        
        
        return view('pages/gallery',$data);
    }

}
