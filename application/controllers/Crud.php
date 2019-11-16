<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
        $this->load->helper('url');
	}

	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
	}

	function export_doc(){
		$phpWord = new PhpWord();
        $section = $phpWord ->addSection();
        $header = array('size' => 16, 'bold' => true);
        
        // Add Image
        $section->addImage('https://images-na.ssl-images-amazon.com/images/I/61NRsJeymIL._SL1500_.jpg',array('width' => 150));  
        
        // 2. Advanced table
        $section->addTextBreak(1);
        $section->addText(htmlspecialchars('table'), $header);
        $styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
        $styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
        $fontStyle = array('bold' => true, 'align' => 'center');
        $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
        $table = $section->addTable('Fancy Table');
        $table->addRow(900);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Row 1'), $fontStyle);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Row 2'), $fontStyle);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Row 3'), $fontStyle);
        $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Row 4'), $fontStyle);

       
	  $user = $this->db->get('user')->result();
	//  $data['user'] = $this->m_data->tampil_data()->result();
       foreach($user as $row){
           $table->addRow();
           $table->addCell(2000)->addText(htmlspecialchars($row->nama));
           $table->addCell(2000)->addText(htmlspecialchars($row->alamat));
       }
       
       
        // //$temp_count = 1;
        // foreach ($user as $u){
        // $table->addCell(2000)->addText(htmlspecialchars($tampil_data[$key]->alamat));
        //     if($temp_count == 4){
        //         $table->addRow();
        //        $temp_count = 0;
        //     }
        //     $temp_count++;
        // }

        // for ($i = 1; $i <= 4; $i++) {
        // $table->addRow();
        // $table->addCell(2000)->addText(htmlspecialchars("Cell {$i}"));
        // $table->addCell(2000)->addText(htmlspecialchars("Cell {$i}"));
        // $table->addCell(2000)->addText(htmlspecialchars("Cell {$i}"));
        // $table->addCell(2000)->addText(htmlspecialchars("Cell {$i}"));
        // }

        // // Save file
        $writer = new Word2007($phpWord);
        $filename ='simple';

        header('Content-Type: application/msword');
        header('Content-Dispotition: attachment;filename="'. $filename . '.docx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
	}
}