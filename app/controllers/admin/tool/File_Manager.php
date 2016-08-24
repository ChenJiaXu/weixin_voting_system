<?php
class File_Manager extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/menu/Menu_model');
    }

    public function index(){

        $data['base_url'] = $this->config->item('base_url');

        $this->load_view('tool/file_manager',$data);

    }

    public function init_elfinder(){

        $this->load->helper('path');
        $opts = array(
            'debug' => true,
            'locale' => 'UTF-8',
            'roots' => array(
                array(
                    'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
                    'path'          => set_realpath('./upload/'),  // path to files (REQUIRED)
                    'alias'         => 'Home',
                    'URL'           => site_url('/upload/') . '/', // 上传文件夹
                    "tmbURL"        => $this->config->item('base_url') .'/upload/.tmb',//缩略图
                    'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
                    'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
                    'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
                    'accessControl' => 'access',                     // disable and hide dot starting files (OPTIONAL)
                    /*'attributes'    => array(
                        array( // restrict access to png files
                            'pattern' => '/.tmb/',
                            'write' => false,
                            'read'  => false,
                            'locked' => true
                        )
                    ),*/
                    'autoload'      => true,
                )
            )
        );
        $this->load->library('elfinder_lib', $opts);
    }

    /**
     * 加载视图
     *  路径 =>   $path
     *  数据 => $data
     */
    private function load_view($path,$data){
        $data['lefts'] = $this->Menu_model->access_the_menu();
        $this->load->view('admin/common/header',$data);
        $this->load->view('admin/common/left',$data);
        $this->load->view('admin/'.$path,$data);
        $this->load->view('admin/common/footer',$data);
    }
}