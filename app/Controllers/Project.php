<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\ProjectModel;
use App\Models\CustomerModel;
use App\Models\StaffModel;
use App\Models\Project_requirementsModel;
use App\Models\JobModel;
use App\Models\EquipmentModel;
use App\Models\Equipment_resourceModel;

class Project extends Controller{
    public function req_form($id = null){
        $data['nav'] = "project";

        $projectModel = new ProjectModel();
        $data['project'] = $projectModel->where('id', $id)->first();
        
        $equipment_resourceModel = new Equipment_resourceModel();
        $data['equipment_resource'] = $equipment_resourceModel->where('project_id', $id)->orderBy('id', 'DESC')->findAll();
        
        echo count($data['equipment_resource']);
        // if(count($data['equipment_resource']) > 0){
        //     echo view('head', $data);
        //     echo '<br/><br/><br/>';
        //     echo '<div class="row">
        //         <div class="col-12 text-center">
        //             <h4>Form already filled</h4>
        //             <a href="'.base_url('Project').'">Bact to product</a>
        //         </div>
        //     </div>';
        //     echo '<br/><br/><br/>';
        //     return view('footer');
        // }

        $project_reqModel = new Project_requirementsModel();
        $data['project_requirements'] = $project_reqModel->where('project_id', $id)->orderBy('id', 'DESC')->findAll();

		$jobModel = new JobModel();
        $data['job'] = $jobModel->orderBy('id', 'DESC')->findAll();

		$staffModel = new StaffModel();
        $data['staff'] = $staffModel->orderBy('contract', 'ASC')->findAll();

        $equipmentModel = new EquipmentModel();
        $data['equipment'] = $equipmentModel->orderBy('id', 'DESC')->findAll();

        echo view('head', $data);
        echo view('req_form-project');
        return view('footer');
    }

    public function resourceStore(){
        $equipmentModel = new EquipmentModel();
        $data['equipment'] = $equipmentModel->orderBy('id', 'DESC')->findAll();

        $project_id = $this->request->getVar('project_id');

        $staffModel = new StaffModel();
        $data['staff'] = $staffModel->orderBy('contract', 'ASC')->findAll();

        foreach($data['staff'] as $staffObj){
            $staffId = $this->request->getVar('staff'.$staffObj['id']);
            
            // echo $staffObj['staff_name'].' - '.$staffId;
            // echo '<br/>';
        }

        // $staff = $this->request->getVar('staff1');




        // foreach ($this->input->post('staff') as $checkbox)
        // {
        //     echo $checkbox;
        // } 
        // $equipment_resourceModel = new Equipment_resourceModel();
        // foreach($data['equipment'] as $equipmentObj){
        //     if($this->request->getVar('quantity'.$equipmentObj['id']) != 0){
        //         $data = [
        //             'equipment_id' => $equipmentObj['id'],
        //             'project_id' => $project_id,
        //             'quantity' => $this->request->getVar('quantity'.$equipmentObj['id']),
        //             'required_duration' => $this->request->getVar('duration'.$equipmentObj['id']),
        //             'created_on' => date("Y-m-d h:i:s"),
        //             'updated_on' => null,
        //         ];
    
        //         $save = $equipment_resourceModel->insert($data);
        //     }
        // }
        // return redirect()->to(base_url('/Project'));	
    }

	public function index(){
		$data['nav'] = "project";
		$projectModel = new ProjectModel();
		$customerModel = new CustomerModel();
		$staffModel = new StaffModel();
		$jobModel = new JobModel();
		$project_requirementsModel = new Project_requirementsModel();
		$data['project'] = $projectModel->orderBy('id', 'DESC')->findAll();
		$data['customer'] = $customerModel->orderBy('id', 'DESC')->findAll();
        $data['staff'] = $staffModel->orderBy('id', 'DESC')->findAll();
        $data['project_requirements'] = $project_requirementsModel->orderBy('id', 'DESC')->findAll();
        $data['job'] = $jobModel->orderBy('id', 'DESC')->findAll();
        
        $i = 0;
        foreach($data['project'] as $projectObj){
            $data['project'][$i]['total_personnel_cost'] = 0;
            foreach($data['project_requirements'] as $project_requirementsObj){
                if($project_requirementsObj['project_id'] == $projectObj['id']){
                    foreach($data['job'] as $jobObj){
                        if($project_requirementsObj['job_id'] == $jobObj['id']){
                            $total = $project_requirementsObj['duration'] * $project_requirementsObj['quantity'] * $jobObj['job_rate'];
                            $data['project'][$i]['total_personnel_cost'] += $total;
                        }
                    }
                }
            }
            $i++;
        }

		echo view('head', $data);
		echo view('project');
		return view('footer');
	}

    public function view($id = null){
        $data['nav'] = "project";
        $projectModel = new ProjectModel();
		$customerModel = new CustomerModel();
		$staffModel = new StaffModel();
		$jobModel = new JobModel();
		$project_requirementsModel = new Project_requirementsModel();
        $data['project'] = $projectModel->where('id', $id)->first();
		$data['customer'] = $customerModel->orderBy('id', 'DESC')->findAll();
        $data['staff'] = $staffModel->orderBy('id', 'DESC')->findAll();
        $data['project_requirements'] = $project_requirementsModel->orderBy('id', 'DESC')->findAll();
        $data['job'] = $jobModel->orderBy('id', 'DESC')->findAll();
        $data['project']['total_personnel_cost'] = 0;
        foreach($data['project_requirements'] as $project_requirementsObj){
            if($project_requirementsObj['project_id'] == $data['project']['id']){
                foreach($data['job'] as $jobObj){
                    if($project_requirementsObj['job_id'] == $jobObj['id']){
                        $total = $project_requirementsObj['duration'] * $project_requirementsObj['quantity'] * $jobObj['job_rate'];
                        $data['project']['total_personnel_cost'] += $total;
                    }
                }
            }
        }

        echo view('head', $data);
        echo view('view-project');
        return view('footer');
    }

	public function create(){
            $data['nav'] = "project";

            $customerModel = new CustomerModel();
            $data['customer'] = $customerModel->orderBy('id', 'DESC')->findAll();
            
    		$jobModel = new JobModel();
            $data['job'] = $jobModel->orderBy('id', 'DESC')->findAll();
            
            $staffModel = new StaffModel();
            $data['staff'] = $staffModel->orderBy('id', 'DESC')->findAll();

			echo view('head', $data);
			echo view('create-project');
			return view('footer');
	}

	public function edit($id = null){
            $customerModel = new CustomerModel();
            $data['customer'] = $customerModel->orderBy('id', 'DESC')->findAll();
            
    		$jobModel = new JobModel();
            $data['job'] = $jobModel->orderBy('id', 'DESC')->findAll();
            
            $staffModel = new StaffModel();
            $data['staff'] = $staffModel->orderBy('id', 'DESC')->findAll();

            $project_reqModel = new Project_requirementsModel();
            $data['project_requirements'] = $project_reqModel->orderBy('id', 'DESC')->findAll();

			$data['nav'] = "project";
            $projectModel = new ProjectModel();
			$data['project'] = $projectModel->where('id', $id)->first();
			echo view('head', $data);
			echo view('edit-project');
			return view('footer');
	}

	public function delete($id = null){
            $projectModel = new ProjectModel();
            
            $project_reqModel = new Project_requirementsModel();
            $data['project_requirements'] = $project_reqModel->where('project_id', $id)->orderBy('id', 'DESC')->findAll();

            foreach($data['project_requirements'] as $obj){
                $data['project_requirements'] = $project_reqModel->where('id', $obj['id'])->delete();
            }

            $data['project'] = $projectModel->where('id', $id)->delete();
	        return redirect()->to(base_url('/Project'));
	}

	public function search(){
            $projectModel = new ProjectModel();
			$search = $this->request->getVar('search');
            $data['project'] = $projectModel->like('project_no', $search)->orlike('project_name', $search)->orderBy('id', 'DESC')->find();
            $data['nav'] = "project";
            $customerModel = new CustomerModel();
            $staffModel = new StaffModel();
            $jobModel = new JobModel();
            $project_requirementsModel = new Project_requirementsModel();
            $data['customer'] = $customerModel->orderBy('id', 'DESC')->findAll();
            $data['staff'] = $staffModel->orderBy('id', 'DESC')->findAll();
            $data['project_requirements'] = $project_requirementsModel->orderBy('id', 'DESC')->findAll();
            $data['job'] = $jobModel->orderBy('id', 'DESC')->findAll();
            
            $i = 0;
            foreach($data['project'] as $projectObj){
                $data['project'][$i]['total_personnel_cost'] = 0;
                foreach($data['project_requirements'] as $project_requirementsObj){
                    if($project_requirementsObj['project_id'] == $projectObj['id']){
                        foreach($data['job'] as $jobObj){
                            if($project_requirementsObj['job_id'] == $jobObj['id']){
                                $total = $project_requirementsObj['duration'] * $project_requirementsObj['quantity'] * $jobObj['job_rate'];
                                $data['project'][$i]['total_personnel_cost'] += $total;
                            }
                        }
                    }
                }
                $i++;
            }
			echo view('head', $data);
			echo view('project');
			return view('footer');
	}

    public function store(){
            $jobModel = new JobModel();
            $dataJob['job'] = $jobModel->orderBy('id', 'DESC')->findAll();

            $total = 0;
            foreach($dataJob['job'] as $jobObj){
                if($this->request->getVar('quantity'.$jobObj['id']) != 0){
                    $total += ($this->request->getVar('quantity'.$jobObj['id']) * $this->request->getVar('duration'.$jobObj['id']) * $jobObj['job_rate']);
                }
            }


            $project_consultancy_fee = ($total * 10) / 100;
            $project_service_charge = ($total * 15) / 100;
            $projectModel = new ProjectModel();
			$data = [
	            'customer_id' => $this->request->getVar('customer_id'),
                'project_no' => $this->request->getVar('project_no'),
	            'project_name' => $this->request->getVar('project_name'),
	            'project_location' => $this->request->getVar('project_location'),
	            'project_business' => $this->request->getVar('project_business'),
	            'project_start_date' => $this->request->getVar('project_start_date'),
                'project_end_date' => $this->request->getVar('project_end_date'),
                'project_incharge' => $this->request->getVar('project_incharge'),
				'created_on' => date("Y-m-d h:i:s"),
                'updated_on' => null,
                'project_service_charge' => $project_service_charge,
                'project_consultancy_fee' => $project_consultancy_fee,
            ];
            $project_id = $projectModel->insert($data);

            $project_reqModel = new Project_requirementsModel();
            foreach($dataJob['job'] as $jobObj){
                if($this->request->getVar('quantity'.$jobObj['id']) != 0){
                    $data1 = [
                        'project_id' => $project_id,
                        'job_id' => $jobObj['id'],
                        'quantity' => $this->request->getVar('quantity'.$jobObj['id']),
                        'duration' => $this->request->getVar('duration'.$jobObj['id']),
                        'created_on' => date("Y-m-d h:i:s"),
                        'updated_on' => null,
                    ];

                    $save = $project_reqModel->insert($data1);
                }
            }
	        return redirect()->to(base_url('/Project'));	
    }

	public function update(){
            $jobModel = new JobModel();
            $dataJob['job'] = $jobModel->orderBy('id', 'DESC')->findAll();

            $total = 0;
            foreach($dataJob['job'] as $jobObj){
                if($this->request->getVar('quantity'.$jobObj['id']) != 0){
                    $total += ($this->request->getVar('quantity'.$jobObj['id']) * $this->request->getVar('duration'.$jobObj['id']) * $jobObj['job_rate']);
                }
            }

            $project_consultancy_fee = ($total * 10) / 100;
            $project_service_charge = ($total * 15) / 100;
			$projectModel = new ProjectModel();
	        $id = $this->request->getVar('id');
	        $data = [
                'customer_id' => $this->request->getVar('customer_id'),
                'project_no' => $this->request->getVar('project_no'),
	            'project_name' => $this->request->getVar('project_name'),
	            'project_location' => $this->request->getVar('project_location'),
	            'project_business' => $this->request->getVar('project_business'),
	            'project_start_date' => $this->request->getVar('project_start_date'),
                'project_end_date' => $this->request->getVar('project_end_date'),
                'project_incharge' => $this->request->getVar('project_incharge'),
                'project_service_charge' => $project_service_charge,
                'project_consultancy_fee' => $project_consultancy_fee,
	            'updated_on' => date("Y-m-d h:i:s"),
	        ];
            $projectId = $projectModel->update($id, $data);

            $project_reqModel = new Project_requirementsModel();
            foreach($dataJob['job'] as $jobObj){
                if($this->request->getVar('quantity'.$jobObj['id']) != 0){
                    if($this->request->getVar('project_requirements'.$jobObj['id']) == 0){
                        // new
                        $data1 = [
                            'project_id' => $project_id,
                            'job_id' => $jobObj['id'],
                            'quantity' => $this->request->getVar('quantity'.$jobObj['id']),
                            'duration' => $this->request->getVar('duration'.$jobObj['id']),
                            'created_on' => date("Y-m-d h:i:s"),
                            'updated_on' => null,
                        ];
    
                        $save = $project_reqModel->insert($data1);
                    }
                    else{
                        // update
                        $data = [
                            'job_id' => $jobObj['id'],
                            'quantity' => $this->request->getVar('quantity'.$jobObj['id']),
                            'duration' => $this->request->getVar('duration'.$jobObj['id']),
                            'updated_on' => date("Y-m-d h:i:s"),
                        ];
                        $save = $project_reqModel->update($this->request->getVar('project_requirements'.$jobObj['id']), $data);
                    }
                }
            }
	        return redirect()->to(base_url('/Project'));	
	}
}