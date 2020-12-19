<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Test extends Controller{
    public function index(){
        echo view('head');
        echo view('test');
        return view('footer');
    }

    public function test(){
        echo view('head');
        echo view('test1');
        return view('footer');
    }
}