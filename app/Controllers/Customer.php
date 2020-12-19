<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\CustomerModel;

class Customer extends Controller{
	public function index(){
		$customerModel = new CustomerModel();
		$data['nav'] = "customer";
		$data['customer'] = $customerModel->orderBy('id', 'DESC')->findAll();
		echo view('head', $data);
		echo view('customer');
		return view('footer');
	}

	public function create(){
			$data['nav'] = "customer";
			echo view('head', $data);
			echo view('create-customer');
			return view('footer');
	}

	public function edit($id = null){
			$data['nav'] = "customer";
			$customerModel = new CustomerModel();
			$data['customer'] = $customerModel->where('id', $id)->first();
			echo view('head', $data);
			echo view('edit-customer');
			return view('footer');
	}

	public function delete($id = null){
			$customerModel = new CustomerModel();
            $data['customer'] = $customerModel->where('id', $id)->delete();
	        return redirect()->to(base_url('/Customer'));
	}

	public function search(){
			$customerModel = new CustomerModel();
			$search = $this->request->getVar('search');
			$data['customer'] = $customerModel->like('customer_name', $search)->orlike('customer_phone', $search)->orderBy('id', 'DESC')->find();
			echo view('head', $data);
			echo view('customer');
			return view('footer');
	}

	public function store(){
			$customerModel = new CustomerModel();
			$data = [
	            'customer_name' => $this->request->getVar('customer_name'),
	            'customer_address' => $this->request->getVar('customer_address'),
				'customer_phone' => $this->request->getVar('customer_phone'),
				'created_on' => date("Y-m-d h:i:s"),
	            'updated_on' => null,
	        ];
            $save = $customerModel->insert($data);
	        return redirect()->to(base_url('/Customer'));	
	}

	public function update(){
			$customerModel = new CustomerModel();
	        $id = $this->request->getVar('id');
	        $data = [
	            'customer_name' => $this->request->getVar('customer_name'),
	            'customer_address' => $this->request->getVar('customer_address'),
				'customer_phone' => $this->request->getVar('customer_phone'),
	            'updated_on' => date("Y-m-d h:i:s"),
	        ];
			$save = $customerModel->update($id, $data);
	        return redirect()->to(base_url('/Customer'));	
	}
}