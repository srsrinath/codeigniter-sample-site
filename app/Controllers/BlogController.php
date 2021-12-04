<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;


class BlogController extends BaseController
{

    public function post(){
        helper(['form']);
    $data=[];
    $data=[
    'meta_title' => 'Blog site',
    'title' => 'Create Post',
    'validation' => $this->validation, 
    ];
    $rule=[
        'description' =>'required',
        'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png,gif]',
        ];
        if($this->request->getMethod() == 'post')
        {   
            if($this->validate($rule)){
                $model=new BlogModel();
                $file=$this->request->getFile('image');
                if($file->isValid() && !$file->hasMoved()){
                    $newName=$file->getRandomName();
                    if($file->move(FCPATH.'uploads/posts/',$newName)){
                        
                        $data=[
                            'image' => $newName,
                            'description'  => $this->request->getPost('description'),
                        ];
                        $model->save($data);
                        return redirect()->to('/blogs');
                        echo "<p>".$file->getName()."upload successfully</p>";     
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
        return view('blog/post',$data);
        //echo view('templates\footer');
        //return view('contactus',$data);
    }
    public function blogs()
    {
        $data=[
            'meta_title' => 'Gallery site',
            'title' => 'List of Blogs',
        ];
        $model=new BlogModel();
        $data['blogs']=$model->findAll();
                
        
        return view('blog/blogs',$data);
    }
    public function edit($id)
    {
        $data=[
            'meta_title' => 'Blog site',
            'title' => 'Edit Post',
            'validation' => $this->validation, 
            ];   
        $model=new BlogModel();
        $data['post']=$model->find($id);
    
        return view('/blog/edit',$data);
    }
    
    public function update($id){
        $model=new BlogModel();
        $post_item=$model->find($id);
        $old_image=$post_item['image'];
         $data=[];  
        $file=$this->request->getFile('image');
        if($file->isValid() && !$file->hasMoved()){
            if(file_exists(FCPATH.'uploads/posts/'.$old_image)){
                unlink(FCPATH.'uploads/posts/'.$old_image);
                $imageName=$file->getRandomName();
                $file->move(FCPATH.'uploads/posts/',$imageName);
            $data['image']=$imageName;
            }
            
            
        }    
        $data=[
            'description' => $this->request->getPost('description'),
        ];
            $model->update($id, $data);
            return redirect()->to('/blogs');
        
         
    }
        public function delete($id){
            $model=new BlogModel();
            $post_item=$model->find($id);
            $old_image=$post_item['image'];
            if(file_exists(FCPATH.'uploads/posts/'.$old_image)){
                unlink('uploads/posts/'.$old_image);
            }
            $model->delete($id);
            return redirect()->to('/blogs')->with('success','Blog Deleted Successfully');
        }
    
}
