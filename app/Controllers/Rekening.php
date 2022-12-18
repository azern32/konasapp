<?php

namespace App\Controllers;

use App\Models\Model_Rekening;
use App\Models\Model_Rekening_Hutang;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestTrait;

class Rekening extends ResourceController{
    use RequestTrait;
    use ResponseTrait;
    
    public function view(){
        $tohead['dependencies'] = $this->dependency('head');
        $tobody['dependencies'] = $this->dependency();
        
        return view('head', $tohead)
        .view('navbar') // no need for dependency here
        .view('rekening', $tobody)
        .view('end');
    }

    public function list($options = null){
        if ($options == 'akunrekening') {
            $akun_rekening = new Model_Rekening();
        }
        if ($options == 'akunhutang') {
            $akun_rekening = new Model_Rekening_Hutang();
        }
        return $this->respond($akun_rekening->findAll());
    }

    public function add($options = null){
        if ($options == 'akunrekening') {
            $akun_rekening = new Model_Rekening();
        }
        if ($options == 'akunhutang') {
            $akun_rekening = new Model_Rekening_Hutang();
        }

        $akun_rekening->insert($_POST);

        $response = [
            'status'   => 200,
            'body'     => $_POST,
            'messages' => [
                'success' => 'Ta tambah ji',
            ]
        ];

        return $this->respond($response);
    }


    public function edit($kode_akun = null){
        $akun_rekening = new Model_Rekening();
        $data['toEdit'] = $akun_rekening->where('kode_akun', $kode_akun)->first();
        $data['req'] = $_POST;
        
        $akun_rekening->update($kode_akun, $_POST);

        $response = [
            'status'   => 200,
            'body'     => $data,
            'messages' => [
                'success' => $kode_akun,
            ]
        ];
        return $this->respond($response);
    }

    public function editHutang($kode_akun = null){
        $akun_rekening = new Model_Rekening_Hutang();
        $data['toEdit'] = $akun_rekening->where('kode_akun', $kode_akun)->first();
        $data['req'] = $_POST;
        
        $akun_rekening->update($kode_akun, $_POST);

        $response = [
            'status'   => 200,
            'body'     => $data,
            'messages' => [
                'success' => $kode_akun,
            ]
        ];
        return $this->respond($response);
    }


    public function remove(){
        # code...
    }

    public function activity(){
        # code...
    }










    
    // -----------------------------------------------------------------
    public function dependency($part=''){
        if ($part == 'head') {
            return [
                'css' => [
                    'Roboto Fonts'=>'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap',
                    'Material Symbols'=>'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined',
                    'Font Awesome' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
                    'myown'=>base_url()."/css/myown.css",
                ],
                'js'  => [
                    'jquery'=>"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js",
                    'polyfills'=>"https://polyfill.io/v3/polyfill.min.js?features=Array.prototype.find,Promise,Object.assign",
                    'popper'=>"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js",
                    'bootstrap'=>"https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js",
                ]
            ];
        } 
        
        return [
                // 'chartJS'=>"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.umd.js",
                'myown' => base_url()."/js/myown.js",
        ];
    

    }
}