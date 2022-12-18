<?php

namespace App\Controllers;

use App\Models\Model_Rekening;
use App\Models\Model_Logs;
use App\Models\Model_Rekening_Hutang;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestTrait;



class Logs extends ResourceController{
    use RequestTrait;
    use ResponseTrait;
    

    public function index(){
        $tohead['dependencies'] = $this->dependency('head');
        $tobody['dependencies'] = $this->dependency();


        $akun_rekening = new Model_Rekening();
        $akun_hutang = new Model_Rekening_Hutang();

        $tobody['rekening'] = $akun_rekening->findAll();
        $tobody['hutang'] = $akun_hutang->findAll();

        return view('head', $tohead)
        .view('navbar') // no need for dependency here
        .view('logs', $tobody)
        .view('end');
    }

    public function getAkun(){
        $akun_rekening = new Model_Rekening();
        $akun_hutang = new Model_Rekening_Hutang();
        
        $response = [
            'status'   => 200,
            'rekening' => $akun_rekening->findAll(),
            'hutang'   => $akun_hutang->findAll(),
            'messages' => [
                'success' => 'wah',
            ]
        ];
        return $this->respond($response);
    }

    public function list(){
        $akun_rekening = new Model_Logs();
        return $this->respond($akun_rekening->findAll());
    }

    public function listby(){
        # code...
    }
    
    public function catat(){
        
    }








    // -----------------------------------------------------------------
    public function dependency($part=''){
        if ($part == 'head') {
            return [
                'css' => [
                    'Roboto Fonts'=>'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap',
                    'Material Symbols'=>'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined',
                    'Font Awesome' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
                    'Datatable' => 'https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css',
                    'DatatableResponsive' => 'https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css',
                    'myown'=>base_url()."/css/myown.css",
                ],
                'js'  => [
                    'jquery'=>"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js",
                    'polyfills'=>"https://polyfill.io/v3/polyfill.min.js?features=Array.prototype.find,Promise,Object.assign",
                    'popper'=>"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js",
                    'bootstrap'=>"https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js",
                    'Datables' => 'https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js',
                    'DatatablesBootstrap' => 'https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js', 
                    'DatatablesResponsive' => 'https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js', 
                ]
            ];
        } 
        
        return [
                // 'chartJS'=>"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.umd.js",
                'myown' => base_url()."/js/myown.js",
        ];
    

    }
}