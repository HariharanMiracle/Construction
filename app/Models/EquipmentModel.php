<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class EquipmentModel extends Model
{
    protected $table = 'equipment';
    protected $allowedFields = ['equipment_no', 'equipment_name', 'created_on', 'updated_on'];
}