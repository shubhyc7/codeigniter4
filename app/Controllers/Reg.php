<?php
namespace App\Controllers;
use App\Models\Reg_religion_model;
use App\Models\Reg_model;

class Reg extends BaseController
{
   public function index()
   {
      $userModel = new Reg_religion_model();
      $data['user_religion'] = $userModel->orderBy('religion_id', 'DESC')->findAll();
      return view('reg_list',$data);
   }

   public function user_data()
   {
      $model = new Reg_model();
      $data = $model->get_result();
      echo json_encode($data);
   }

   function get_result()
   {
      $result_id = $_POST['result_id'];
      $model = new Reg_model();
      $conditions['id'] = $result_id;
      $results['result'] = $model->get_result($conditions);
      echo json_encode($results);		
   }

   public function action()
   {
		if(!empty($this->request->getPost()))
		{
         helper(['form', 'url']);
			$post_data =  $this->request->getPost();
         $isValidated = $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email',
            'mobile' => 'required|max_length[12]|numeric',
            // 'photo' => [
            //     'uploaded[file]',
            //     'mime_in[file, image/png, image/jpg,image/jpeg, image/gif]',
            //     'max_size[file, 4096]',
            // ],
         ]);

         if (!$isValidated) {
         $array = array('result'=>'0', 'message'=>$this->validator->getErrors());
            echo json_encode($array);
         } 
         else
         {
            $insert_data['name']			= $post_data['name'];
            $insert_data['email'] 		= $post_data['email'];
            $insert_data['mobile']	 	= $post_data['mobile'];
            $insert_data['religion']	= $post_data['religion'];
            $insert_data['gender']		= $post_data['gender'];
            $insert_data['caste']			= $post_data['caste'];
         
            if(!empty($this->request->getFile('educational_certificates')))
            {
               $educational_certificates = $this->request->getFile("educational_certificates");
               $type_educational_certificates = $educational_certificates->getClientMimeType();
               $valid_types_educational_certificates = array("application/pdf");
            
               if (in_array($type_educational_certificates, $valid_types_educational_certificates)) {
                  $pdf_educational_certificates = $educational_certificates->getName();
                  $explode = explode('.',$pdf_educational_certificates);
                  $ext = end($explode);
                  $pdf_name_educational_certificates = time().".".$ext;           
               
                  if ($educational_certificates->move("upload/educational_certificates", $pdf_name_educational_certificates)) {
                     $insert_data['educational_certificates'] = $pdf_name_educational_certificates;
                  }
               } 
            }

            if(!empty($this->request->getFile('photo')))
            {
               $file = $this->request->getFile("photo");
               $file_type = $file->getClientMimeType();
               $valid_file_types = array("image/png", "image/jpeg", "image/jpg");
            
               if (in_array($file_type, $valid_file_types)) {
                  $profile_image = $file->getName();
                  $explode = explode('.',$profile_image);
                  $ext = end($explode);
                  $file_name = time().".".$ext;
                  if ($file->move("upload/photo", $file_name)) {
                        $insert_data['photo'] = $file_name;
                  }
               } 
            }
   
            $model = new Reg_model();
            if(!empty($this->request->getPost('id')))
            {
               $result_id = $this->request->getPost('id');
               $model->edit_record('tbl_user', $insert_data, 'id = '.$result_id);
               $array = array('result'=>'1', 'message'=>"User Edited Successfully.");
                  
            }
            else
            {
               $model->insert_record('tbl_user',$insert_data);
               $array = array('result'=>'1', 'message'=>"User Added Successfully.");
            }

            echo json_encode($array);
         }
	   }
		else
		{
			$array = array('result'=>'0', 'message'=>"Form empty");
			echo json_encode($array);
		}
	}


}
