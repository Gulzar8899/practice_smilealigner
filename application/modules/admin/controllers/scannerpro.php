<?php
/**
 * Controller Name: Admin
 * Description: back end admin
 * @author Surfiq Tech
 * Created date: 2021-07-04
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Scannerpro extends MY_Controller
{
    /**
     * Setting class elements
     * @author Surfiq Tech
     */
    
    public $data;  
    /**
     * function to invoke necessary component
     * @author Surfiq Tech
     */
    function __construct()
    {
        parent::__construct();    
        $this->checkAdminLogin(); 
        $this->adminData = $this->session->userdata('adminData');
        $this->load->model(array("Admin_model"));
    }
    /**
     * @author Surfiq Tech
     */
    public function ScannerProList()
    {
        $data['admin_data']    = $this->adminData;
        $data['accepted_users'] = $this->Admin_model->ScannerProList();
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('ScannerPro/indexList.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function scannerProGrid()
    {
        $data['admin_data']    = $this->adminData;
        $data['accepted_users'] = $this->Admin_model->ScannerProList();
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('ScannerPro/indexGrid',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function profile()
    {
        $data['admin_data']    = $this->adminData;
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/profile.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function addScannerPro()
    {
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];
        $data['doctor_data'] = $this->Admin_model->getDoctorByID($adminID);
    
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('ScannerPro/add',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function submitscannerPro()
    {
        $upload_path = 'assets/uploads/images/';

        $developerData = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'age' => $this->input->post('age'),
                'phone_number' => $this->input->post('phone_number'),
                'password' => sha1($this->input->post('password')),
                'profile_image' => $this->input->post('developer_img_name'),
                'gender' => $this->input->post('gender'),
                'user_type_id' => 6,
                'is_active' => 1,
                'source' => 0,
                'created' => date('Y-m-d')
        );
        $developerID = $this->db->insert('users',$developerData);
        if($developerID)
        {
            $this->session->set_flashdata('success','Scanner Pro Added!');
            redirect('admin/Scannerpro/ScannerProList');
        }
        else{
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('admin/Scannerpro/ScannerProList');
        }
    }
    public function editScannerPro($id)
    {
        $data['admin_data']    = $this->adminData;
        $data['developer_data'] = $this->Admin_model->getDoctorByID($id);
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('ScannerPro/edit',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function udpateScannerProData()
    {
        $upload_path = 'assets/uploads/images/';

        $id = $this->input->post('developerID');

        $updateData['first_name'] = $this->input->post('first_name');  
        $updateData['last_name'] = $this->input->post('last_name');  
        $updateData['email'] = $this->input->post('email');    
        $updateData['age'] = $this->input->post('age');    
        $updateData['phone_number'] = $this->input->post('phone_number'); 
        if($this->input->post('password')!='') { 
            $updateData['password'] = sha1($this->input->post('password'));  
        }
        if($this->input->post('developer_img_name')!='') {
            $updateData['profile_image'] = $this->input->post('developer_img_name');     
        }
        $updateData['gender'] = $this->input->post('gender');

        $result = $this->Admin_model->udpatePlannerStatus($id , $updateData);
        if($result){
            $this->session->set_flashdata('success', "ScannerPro Updated");
            redirect('admin/Scannerpro/ScannerProList');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/Scannerpro');
        }
    }
    public function viewscannerPro($id)
    {
        $data['admin_data']    = $this->adminData;
        $data['developer_data'] = $this->Admin_model->getDoctorByID($id);
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('ScannerPro/show.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function deleteScannerProByID()
    {
        $recordID = $this->input->post('recordID');
        $table_name = $this->input->post('table_name');
        $resultData = $this->Admin_model->deleteDoctorByID($recordID, $table_name);
        
        if ($resultData) {
            //$this->session->set_flashdata('success', 'Doctor Deleted');
            $response = array("type"=>"success","message"=>"Scanner Pro Deleted"); 
        } 
        else {
            $this->session->set_flashdata('error', 'Seems to an error. Please try again later.');
            $response = array("type"=>"error","message"=>"Something went wrong"); 

        }

        echo json_encode($response);
        exit;
    } 
    public function doctorimgCrop()
    {
        $data = $_POST['image'];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);

        $image_name = 'assets/uploads/images/' . time() . '.png';
        $fileimage_name =  time() . '.png';

        file_put_contents($image_name, $data);
        echo $fileimage_name;
    }


}