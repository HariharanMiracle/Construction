<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class StaffModel extends Model
{
    protected $table = 'staff';
    protected $allowedFields = ['staff_number', 'staff_name', 'staff_role', 'created_on', 'updated_on', 'contract'];
}