<?php 

    class Welcom extends CI_Controller{
        public function todoc() {
            $id = $this->tank_auth->get_user_id();
            $this->mpdf->useOnlyCoreFonts = true;
            $filename = "POSTS";
            $data['member'] = $this->s_model->alldata($id);      
            $this->load->view('export_posts_doc_view', $data);
        }
    }

?>