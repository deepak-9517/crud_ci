<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
class StudentController extends BaseController
{
    public function index()
    {
        $model=new UserModel();
        $data['record']=$model->findAll();
        return view('index',$data);
    }
    public function register()
    {
        return view('register');
    }

public function registeruser(){
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'dob' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
            'password' => 'required|min_length[5]',
        ];
        $image=$this->request->getFile('image');
        if($this->validate($rules) && $image->isValid()){
                $imagefile=$image->getRandomName();
                $image->move(ROOTPATH .'public/uploads',$imagefile);
            $user=new UserModel();
            $data=[
                'name'=>$this->request->getPost('name'),
                'email'=>$this->request->getPost('email'),
                'dob'=>$this->request->getPost('dob'),
                'image'=>$imagefile,
                'password'=>md5($this->request->getPost('password')),
            ];
            $user->insert($data);
            session()->setFlashdata('success',"User Register Successfully...!");
            return redirect()->to('register');
        }else{
            
            $data['validation'] = $this->validator;
            return view('register', $data);
        }        
    }

    public function deleteuser($id){
       $user=new UserModel();
       $record=$user->find($id);
       $image=$record['image'];
       if(file_exists('uploads/'.$image)){
        unlink('uploads/'.$image);
       }
       $user->delete($id);
       session()->setFlashdata('success',"User Delete Successfully...!");
            return redirect()->to('/');
    }

    public function edituser($id){
        $validation = \Config\Services::validation();
        $user = new UserModel();
        $data['record']=$user->find($id);
        return view('edit',$data);
    }

    public function updateuser($id){
        $user=new UserModel();
        $dataInput=array();
        $rules=[
            'name'=>'required|trim',
            'email'=>'required|valid_email',
            'dob'=>'required',
        ];
        if($this->validate($rules)){
            $dataInput=[
                'name'=>$this->request->getPost('name'),
                'email'=>$this->request->getPost('email'),
                'dob'=>$this->request->getPost('dob'),
               ];
           $image=$this->request->getFile('image');
           if($image->isValid($image)){
            $data=$user->find($id);
            unlink('uploads/'.$data['image']);
            $imageFile=$image->getRandomName();
            $image->move(ROOTPATH.'public/uploads',$imageFile);
           $dataInput['image']=$imageFile;
           }
           if($this->request->getPost('password')){
            $dataInput['password']=md5($this->request->getPost('password'));
           }
           
        //    $dataInput=array_merge($dataInput,$data);
        $user->update($id, $dataInput);
        session()->setFlashdata('success','User update Successfully..!');
            return redirect()->to('user-edit/'.$id);
       
        }else{
            $data['validation'] = $this->validator;
            session()->setFlashdata('error','Name, Email, DOB field must be required...!');
            return redirect()->back()->with('error',$data);
        }
    }
}
