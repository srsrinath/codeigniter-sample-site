<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GalleryModel;

class UploadController extends BaseController{

    public function upload(){
        helper(['form']);
    $data=[];
    $data=[
    'meta_title' => 'Gallery site',
    'title' => 'Upload Image',
    'validation' => $this->validation, 
    ];
    $rule=[
        'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png,gif]',
        ];
        if($this->request->getMethod() == 'post')
        {   
            if($this->validate($rule)){
                $model=new GalleryModel();
                $file=$this->request->getFile('image');
                if($file->isValid() && !$file->hasMoved()){
                    $newName=$file->getRandomName();
                    if($file->move(FCPATH.'uploads/',$newName)){
                        
                        $data=[
                            'image' => $newName,
                        ];
                        $model->save($data);
                        return redirect()->to('/gallery');     
                    }
                    
                    else{
                        echo $file->getErrorString()." ".$file->getError();
                    }
                        
                }
                
            }
            else{
                $data['validation']=$this->validator;
            }
            
        }
        







        return view('gallery/upload',$data);
        //echo view('templates\footer');
        //return view('contactus',$data);
    }

}

