<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\CustomerModel;

class Customer extends Controller{
	public function create(){
        // session()->start();

		// if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == "ADMIN" && $_SESSION['user']['status'] == "ACTIVE"){
			// $settingModel = new SettingModel();
			// $data['setting'] = $settingModel->orderBy('id', 'ASC')->findAll();
			// $data['nav'] = "tags";
			// echo view('templates/admin-header', $data);
			return view('create-customer');
			// return view('templates/footer');
		// }
		// else{
		// 	session()->destroy();
		// 	session()->start();
		// 	$_SESSION['errLoginMsg'] = "Unauthorized access !!!";
		// 	return redirect()->to(base_url());
		// }
	}

	public function edit($id = null){
		// session()->start();
		
		// if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == "ADMIN" && $_SESSION['user']['status'] == "ACTIVE"){
			// $settingModel = new SettingModel();
			// $data['setting'] = $settingModel->orderBy('id', 'ASC')->findAll();
			// $data['nav'] = "tags";
			$customerModel = new CustomerModel();
	        $data['customer'] = $customerModel->where('id', $id)->first();
			// echo view('templates/admin-header', $data);
			return view('edit-customer', $data);
			// return view('templates/footer');
		// }
		// else{
		// 	session()->destroy();
		// 	session()->start();
		// 	$_SESSION['errLoginMsg'] = "Unauthorized access !!!";
		// 	return redirect()->to(base_url());
		// }        
	}

	public function delete($id = null){
        // session()->start();

		// if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == "ADMIN" && $_SESSION['user']['status'] == "ACTIVE"){
			$customerModel = new CustomerModel();
            $data['customer'] = $customerModel->where('id', $id)->delete();
            echo $data['customer']['id'];
	        // return redirect()->to(base_url('/AdminPanel/tags'));
		// }
		// else{
		// 	session()->destroy();
		// 	session()->start();
		// 	$_SESSION['errLoginMsg'] = "Unauthorized access !!!";
		// 	return redirect()->to(base_url());
		// }    
	}

	public function search(){
        // session()->start();

		// if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == "ADMIN" && $_SESSION['user']['status'] == "ACTIVE"){
			// $settingModel = new SettingModel();
			// $data['setting'] = $settingModel->orderBy('id', 'ASC')->findAll();
			// $data['nav'] = "tags";
			$customerModel = new CustomerModel();
			$search = $this->request->getVar('search');
			$data['customer'] = $customerModel->like('name', $search)->orlike('phone', $search)->orderBy('name', 'ASC')->find();
			// echo view('Templates/admin-header', $data);
			echo view('customer');
			// return view('Templates/footer');
		// }
		// else{
		// 	session()->destroy();
		// 	session()->start();
		// 	$_SESSION['errLoginMsg'] = "Unauthorized access !!!";
		// 	return redirect()->to(base_url());
		// }    
	}

	public function store(){
        // session()->start();

		// if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == "ADMIN" && $_SESSION['user']['status'] == "ACTIVE"){
			$customerModel = new CustomerModel();
			$data = [
	            'name' => $this->request->getVar('name'),
	            'address' => $this->request->getVar('address'),
	            'phone' => $this->request->getVar('phone'),
	        ];
            $save = $customerModel->insert($data);
            echo $save;
	        // return redirect()->to(base_url('/AdminPanel/tags'));	
		// }
		// else{
		// 	session()->destroy();
		// 	session()->start();
		// 	$_SESSION['errLoginMsg'] = "Unauthorized access !!!";
        //     return redirect()->to(base_url());
		// }    
	}

	public function update(){
        // session()->start();

		// if($_SESSION['isLoggedIn'] == 1 && $_SESSION['user']['privilege'] == "ADMIN" && $_SESSION['user']['status'] == "ACTIVE"){
			$customerModel = new CustomerModel();
	        $id = $this->request->getVar('id');
	        $data = [
	            'name' => $this->request->getVar('name'),
	            'address' => $this->request->getVar('address'),
	            'phone' => $this->request->getVar('phone'),
	        ];
            $save = $customerModel->update($id, $data);
            echo $save
	        // return redirect()->to(base_url('/AdminPanel/tags'));
		// }
		// else{
		// 	session()->destroy();
		// 	session()->start();
		// 	$_SESSION['errLoginMsg'] = "Unauthorized access !!!";
		// 	return redirect()->to(base_url());
		// }    
	}
}