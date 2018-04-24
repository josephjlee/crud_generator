<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'news/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'news/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'news/index.html';
            $config['first_url'] = base_url() . 'news/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->News_model->total_rows($q);
        $news = $this->News_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'news_data' => $news,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('news/news_list', $data);
    }

    public function read($id) 
    {
        $row = $this->News_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'JUDUL' => $row->JUDUL,
		'ISI' => $row->ISI,
		'IS_ACTIVE' => $row->IS_ACTIVE,
		'TANGGAL' => $row->TANGGAL,
	    );
            $this->load->view('news/news_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('news'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('news/create_action'),
	    'ID' => set_value('ID'),
	    'JUDUL' => set_value('JUDUL'),
	    'ISI' => set_value('ISI'),
	    'IS_ACTIVE' => set_value('IS_ACTIVE'),
	    'TANGGAL' => set_value('TANGGAL'),
	);
        $this->load->view('news/news_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'JUDUL' => $this->input->post('JUDUL',TRUE),
		'ISI' => $this->input->post('ISI',TRUE),
		'IS_ACTIVE' => $this->input->post('IS_ACTIVE',TRUE),
		'TANGGAL' => $this->input->post('TANGGAL',TRUE),
	    );

            $this->News_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('news'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->News_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('news/update_action'),
		'ID' => set_value('ID', $row->ID),
		'JUDUL' => set_value('JUDUL', $row->JUDUL),
		'ISI' => set_value('ISI', $row->ISI),
		'IS_ACTIVE' => set_value('IS_ACTIVE', $row->IS_ACTIVE),
		'TANGGAL' => set_value('TANGGAL', $row->TANGGAL),
	    );
            $this->load->view('news/news_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('news'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'JUDUL' => $this->input->post('JUDUL',TRUE),
		'ISI' => $this->input->post('ISI',TRUE),
		'IS_ACTIVE' => $this->input->post('IS_ACTIVE',TRUE),
		'TANGGAL' => $this->input->post('TANGGAL',TRUE),
	    );

            $this->News_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('news'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->News_model->get_by_id($id);

        if ($row) {
            $this->News_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('news'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('news'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('JUDUL', 'judul', 'trim|required');
	$this->form_validation->set_rules('ISI', 'isi', 'trim|required');
	$this->form_validation->set_rules('IS_ACTIVE', 'is active', 'trim|required');
	$this->form_validation->set_rules('TANGGAL', 'tanggal', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "news.xls";
        $judul = "news";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "JUDUL");
	xlsWriteLabel($tablehead, $kolomhead++, "ISI");
	xlsWriteLabel($tablehead, $kolomhead++, "IS ACTIVE");
	xlsWriteLabel($tablehead, $kolomhead++, "TANGGAL");

	foreach ($this->News_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->JUDUL);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ISI);
	    xlsWriteNumber($tablebody, $kolombody++, $data->IS_ACTIVE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TANGGAL);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=news.doc");

        $data = array(
            'news_data' => $this->News_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('news/news_doc',$data);
    }

}

/* End of file News.php */
/* Location: ./application/controllers/News.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-15 08:05:54 */
/* http://harviacode.com */