<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $allowedFields = ['name', 'address', 'phone'];
}