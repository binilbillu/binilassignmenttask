<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");    
        $this->load->library("pagination");
        $this->load->model('filedata', 'filedata');
    }

    public function index()
    {

        $data['title'] = "List of Files";
       
        $totalCount=$this->filedata->totalrows();
        $config = array();
        $config["base_url"] = base_url() . "welcome/index";
        $config["total_rows"] = $totalCount;
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;


        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
         
        $config['first_link'] = 'First Page';
        $config['first_tag_open'] = '<span class="firstlink">';
        $config['first_tag_close'] = '</span>';
         
        $config['last_link'] = 'Last Page';
        $config['last_tag_open'] = '<span class="lastlink">';
        $config['last_tag_close'] = '</span>';
         
        $config['next_link'] = 'Next Page';
        $config['next_tag_open'] = '<span class="nextlink">';
        $config['next_tag_close'] = '</span>';

        $config['prev_link'] = 'Prev Page';
        $config['prev_tag_open'] = '<span class="prevlink">';
        $config['prev_tag_close'] = '</span>';

        $config['cur_tag_open'] = '<span class="curlink">';
        $config['cur_tag_close'] = '</span>';

        $config['num_tag_open'] = '<span class="numlink">';
        $config['num_tag_close'] = '</span>';


        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->filedata->fetch_filedata($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

      


        $content = $this->load->view('filelist', $data, true);

        $this->render($content);
    }

    public function uploadfileprocess()
    {

        
      
               
        if (!empty($_FILES['uploadFile']['name'])) {



            $albumpathfolder = FOLDERPATH;
            $error="";
                $config = array(
                    'upload_path' => $albumpathfolder,
                    'allowed_types' => 'txt|doc|docx|pdf|png|jpeg|jpg|gif',
                    'overwrite' => false,
                    'max_size' => '20480',
                );
                $this->load->library('upload', $config);
                $salt = random_string('alnum', 5);
                $fileName = date('ymdhis') . '_' . $salt;
                $config['file_name'] = $fileName;
                $this->upload->initialize($config);
                if ($this->upload->do_upload('uploadFile')) {
                    $albummodel_image = $this->upload->data();
                    $uploadedfile = $albummodel_image['file_name'];
                }else{
                    $error=$this->upload->display_errors();
                    $uploadedfile="";
                }
           

            if($uploadedfile){
                $result = $this->filedata->insert([
                    'filename' => $uploadedfile,
                    'filepath' => $albumpathfolder,
                    'filerealname'=>$_FILES['uploadFile']['name']
                    
                ]);
                $this->session->set_flashdata('successmessage', 'File uploaded successfully');
            }else{
                $this->session->set_flashdata('errormessage', $error);
            }
          
        } else {
            $this->session->set_flashdata('errormessage', 'Please select a file');
           
        }
        redirect('welcome');
       
    }

    public function filedelete($id,$filename){

        if($id!="" && $filename!="" ){
            $records = $this->filedata->find()
    ->select('*')
    ->where('fileid', $id)  
    ->where('filename', $filename)   
    ->get()
    ->result_array();
    if($records){

        if (unlink(FOLDERPATH.'/'.$records[0]['filename'])) {

            $this->filedata->find()->where('fileid', $id);
            $result = $this->filedata->update(['file_status'=>'1']);
            $this->session->set_flashdata('successmessage', 'File deleted successfully');

        }else{
            $this->session->set_flashdata('errormessage', 'Invalid request');  
        }


    }else{
        $this->session->set_flashdata('errormessage', 'Invalid request');  
    }

        }else{
            $this->session->set_flashdata('errormessage', 'Invalid request');
        }

        redirect('welcome');

    }

    
}
