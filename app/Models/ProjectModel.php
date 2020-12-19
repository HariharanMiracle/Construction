<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class ProjectModel extends Model
{
    protected $table = 'project';
    protected $allowedFields = ['customer_id', 'project_no', 'project_name', 'project_location', 'project_business', 'project_start_date', 'project_end_date', 'project_service_charge', 'project_consultancy_fee', 'created_on', 'updated_on', 'project_incharge'];
}