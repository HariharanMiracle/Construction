<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class Staff_resourceModel extends Model
{
    protected $table = 'staff_resource';
    protected $allowedFields = ['staff_id', 'project_id', 'work_duration', 'created_on', 'updated_on'];
}