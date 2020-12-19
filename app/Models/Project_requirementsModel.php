<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class Project_requirementsModel extends Model
{
    protected $table = 'project_requirements';
    protected $allowedFields = ['project_id', 'job_id', 'quantity', 'duration', 'created_on', 'updated_on'];
}