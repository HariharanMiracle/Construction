<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Project_requirementsModel;

class Project_requirements extends Controller{
	public function index(){
		$project_requirementsModel = new Project_requirementsModel();
		$data['nav'] = "project_requirements";
		$data['project_requirements'] = $project_requirementsModel->orderBy('id', 'DESC')->findAll();
		echo view('head', $data);
		echo view('project_requirements');
		return view('footer');
	}

	public function create(){
			$data['nav'] = "project_requirements";
			echo view('head', $data);
			echo view('create-project_requirements');
			return view('footer');
	}

	public function edit($id = null){
			$data['nav'] = "project_requirements";
			$project_requirementsModel = new Project_requirementsModel();
			$data['project_requirements'] = $project_requirementsModel->where('id', $id)->first();
			echo view('head', $data);
			echo view('edit-project_requirements');
			return view('footer');
	}

	public function delete($id = null){
			$project_requirementsModel = new Project_requirementsModel();
            $data['project_requirements'] = $project_requirementsModel->where('id', $id)->delete();
	        return redirect()->to(base_url('/Project_requirements'));
	}

	// public function search(){
	// 		$project_requirementsModel = new Project_requirementsModel();
	// 		$search = $this->request->getVar('search');
	// 		$data['project_requirements'] = $project_requirementsModel->like('qwerty', $search)->orderBy('id', 'DESC')->find();
	// 		echo view('head', $data);
	// 		echo view('project_requirements');
	// 		return view('footer');
	// }

	public function store(){
			$project_requirementsModel = new Project_requirementsModel();
			$data = [
				'created_on' => date("Y-m-d h:i:s"),
	            'updated_on' => null,
	        ];
            $save = $project_requirementsModel->insert($data);
	        return redirect()->to(base_url('/Project_requirements'));	
	}

	public function update(){
			$project_requirementsModel = new Project_requirementsModel();
	        $id = $this->request->getVar('id');
	        $data = [
	            'updated_on' => date("Y-m-d h:i:s"),
	        ];
			$save = $project_requirementsModel->update($id, $data);
	        return redirect()->to(base_url('/Project_requirements'));	
	}
}