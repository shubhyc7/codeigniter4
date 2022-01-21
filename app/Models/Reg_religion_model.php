<?php 
namespace App\Models;
use CodeIgniter\Model;

class Reg_religion_model extends Model
{
    protected $table = 'user_religion';

    protected $primaryKey = 'religion_id';
    
    protected $allowedFields = ['religion_id','religion_name'];
}