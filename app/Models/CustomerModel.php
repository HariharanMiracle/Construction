<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $allowedFields = ['customer_name', 'customer_address', 'customer_phone', 'created_on', 'updated_on'];
}