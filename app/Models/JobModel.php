<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class JobModel extends Model
{
    protected $table = 'job';
    protected $allowedFields = ['job_role', 'job_rate', 'created_on', 'updated_on'];
}