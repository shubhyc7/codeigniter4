<?php 
namespace App\Models;
use CodeIgniter\Model;

class Reg_model extends Model
{
    protected $table = 'tbl_user';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['name','email','mobile','religion','gender','caste','educational_certificates','photo'];

    public function get_result($conditions=NULL)
    {
      $builder = $this->db->table("tbl_user as user");
      $builder->select('user.*, rel.religion_name');
      $builder->join('user_religion as rel', 'user.religion = rel.religion_id','left');

      if(!empty($conditions['id']))
		  $builder->where("user.id = '".$conditions['id']."'");

      $data = $builder->get()->getResult();
      return $data;
    }

    public function insert_record($from,$data) 
    { 
      if($this->db->table($from)->insert($data))
        {
            return $this->db->insertID();
        }
        else
        {
            return false;
        }
    }

	  public function edit_record($from,$update_data,$cond)
    {
        return $this->db->table($from)->update($update_data,$cond);
    }

}