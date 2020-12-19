<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class Equipment_resourceModel extends Model
{
    protected $table = 'equipment_resource';
    protected $allowedFields = ['equipment_id', 'project_id', 'required_duration', 'quantity', 'created_on', 'updated_on'];
}