<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\StaffModel;
use App\Models\JobModel;

class Staff extends Controller{
	public function index(){
		$staffModel = new StaffModel();
		$jobModel = new JobModel();
		$data['nav'] = "staff";
		$data['staff'] = $staffModel->orderBy('id', 'DESC')->findAll();
		$data['job'] = $jobModel->orderBy('id', 'DESC')->findAll();
		echo view('head', $data);
		echo view('staff');
		return view('footer');
	}

	public function create(){
            $data['nav'] = "staff";
		    $jobModel = new JobModel();
		    $data['job'] = $jobModel->orderBy('id', 'DESC')->findAll();
			echo view('head', $data);
			echo view('create-staff');
			return view('footer');
	}

	public function edit($id = null){
			$data['nav'] = "staff";
            $staffModel = new StaffModel();
            $jobModel = new JobModel();
		    $data['job'] = $jobModel->orderBy('id', 'DESC')->findAll();
			$data['staff'] = $staffModel->where('id', $id)->first();
			echo view('head', $data);
			echo view('edit-staff');
			return view('footer');
	}

	public function delete($id = null){
			$staffModel = new StaffModel();
            $data['staff'] = $staffModel->where('id', $id)->delete();
	        return redirect()->to(base_url('/Staff'));
	}

	public function search(){
            $staffModel = new StaffModel();
            $jobModel = new JobModel();
		    $data['job'] = $jobModel->orderBy('id', 'DESC')->findAll();
			$search = $this->request->getVar('search');
			$data['staff'] = $staffModel->like('staff_number', $search)->orlike('staff_name', $search)->orderBy('id', 'DESC')->find();
			echo view('head', $data);
			echo view('staff');
			return view('footer');
	}

	public function store(){
			$staffModel = new StaffModel();
			$data = [
	            'staff_number' => $this->request->getVar('staff_number'),
	            'staff_name' => $this->request->getVar('staff_name'),
				'staff_role' => $this->request->getVar('staff_role'),
				'contract' => $this->request->getVar('contract'),
				'created_on' => date("Y-m-d h:i:s"),
	            'updated_on' => null,
	        ];
            $save = $staffModel->insert($data);
	        return redirect()->to(base_url('/Staff'));	
	}

	public function update(){
			$staffModel = new StaffModel();
	        $id = $this->request->getVar('id');
	        $data = [
                'staff_number' => $this->request->getVar('staff_number'),
	            'staff_name' => $this->request->getVar('staff_name'),
				'staff_role' => $this->request->getVar('staff_role'),
				'contract' => $this->request->getVar('contract'),
	            'updated_on' => date("Y-m-d h:i:s"),
	        ];
			$save = $staffModel->update($id, $data);
	        return redirect()->to(base_url('/Staff'));	
	}
}