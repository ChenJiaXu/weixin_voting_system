<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        
        $this->load->view('admin/tool/upload_form', array('error' => ' ' , 'base_url' => $this->config->item('base_url')));
    }

    public function do_upload()
    {
        $config['upload_path']      = './upload/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 0;
        $config['max_width']        = 0;
        $config['max_height']       = 0;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = $this->upload->display_errors();

            $this->output->set_content_type('application/json','utf-8')->set_output(json_encode($error));
        }
        else
        {
            $data = $this->upload->data();

            $this->output->set_content_type('application/json','utf-8')->set_output(json_encode($data));
        }

    }
}
?>