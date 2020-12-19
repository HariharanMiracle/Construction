<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\EquipmentModel;

class Equipment extends Controller{
	public function index(){
		$equipmentModel = new EquipmentModel();
		$data['nav'] = "equipment";
		$data['equipment'] = $equipmentModel->orderBy('id', 'DESC')->findAll();
		echo view('head', $data);
		echo view('equipment');
		return view('footer');
	}

	public function create(){
            $data['nav'] = "equipment";
			echo view('head', $data);
			echo view('create-equipment');
			return view('footer');
	}

	public function edit($id = null){
			$data['nav'] = "equipment";
            $equipmentModel = new EquipmentModel();
			$data['equipment'] = $equipmentModel->where('id', $id)->first();
			echo view('head', $data);
			echo view('edit-equipment');
			return view('footer');
	}

	public function delete($id = null){
			$equipmentModel = new EquipmentModel();
            $data['equipment'] = $equipmentModel->where('id', $id)->delete();
	        return redirect()->to(base_url('/Equipment'));
	}

	public function search(){
            $equipmentModel = new EquipmentModel();
			$search = $this->request->getVar('search');
			$data['equipment'] = $equipmentModel->like('staff_number', $search)->orlike('staff_name', $search)->orderBy('id', 'DESC')->find();
			echo view('head', $data);
			echo view('equipment');
			return view('footer');
	}

	public function store(){
			$equipmentModel = new EquipmentModel();
			$data = [
	            'equipment_no' => $this->request->getVar('equipment_no'),
	            'equipment_name' => $this->request->getVar('equipment_name'),
				'created_on' => date("Y-m-d h:i:s"),
	            'updated_on' => null,
	        ];
            $save = $equipmentModel->insert($data);
	        return redirect()->to(base_url('/Equipment'));	
	}

	public function update(){
			$equipmentModel = new EquipmentModel();
	        $id = $this->request->getVar('id');
	        $data = [
                'equipment_no' => $this->request->getVar('equipment_no'),
	            'equipment_name' => $this->request->getVar('equipment_name'),
	            'updated_on' => date("Y-m-d h:i:s"),
	        ];
			$save = $equipmentModel->update($id, $data);
	        return redirect()->to(base_url('/Equipment'));	
	}
}