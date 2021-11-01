<?php
/**
 * Controller Name: Admin
 * Description: back end admin
 * @author Surfiq Tech
 * Created date: 2021-07-02
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting extends MY_Controller
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
        $this->load->model(array("Admin_model", "Import_model"));
        $this->load->library('Excel');
    }
    /**
     * @author Surfiq Tech
    */

    //Import main page
    public function import(){
        $data['admin_data']    = $this->adminData;
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('Setting/index.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }

    //To import patient data
    public function importPatientInfo(){
        if(isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            // error_reporting(E_ALL);
            // ini_set('display_errors', TRUE);
            // ini_set('display_startup_errors', TRUE);
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++) {
                    $doctor_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    if(empty($doctor_id)){
                        $doctor_id = 1;
                    }
                    $pt_firstname = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $pt_lastname = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $pt_gender = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    // $pt_email = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $pt_age = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    // $pt_scan_impression = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    // $pt_objective = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    // $pt_referal = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    // $type_of_treatment = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    // $type_of_case = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    // $arc_treated = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    // $ipr_performed = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    // $attachment_placed = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    // $pt_treatment_plan = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    // $pt_approval = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    // $pt_approval_date = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    // $pt_custom_status = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    // $pt_case_type = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                    // $pt_aligners = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                    // $pt_aligners_dispatch = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                    // $pt_cost_plan = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                    // $pt_amount_paid = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                    // $pt_shipping_details = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
                    // $pt_billing_address = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
                    // $pt_dispatch_date = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
                    $pt_status = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $added_by = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $cur_date = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $status = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    
                    $data[] = array(
                        'doctor_id'             => $doctor_id,
                        'pt_firstname'          => $pt_firstname,
                        'pt_lastname'           => $pt_lastname,
                        'pt_gender'             => $pt_gender,
                        // 'pt_email'              => $pt_email,
                        'pt_age'                => $pt_age,
                        // 'pt_scan_impression'    => $pt_scan_impression,
                        // 'pt_objective'          => $pt_objective,
                        // 'pt_referal'            => $pt_referal,
                        // 'type_of_treatment'     => $type_of_treatment,
                        // 'type_of_case'          => $type_of_case,
                        // 'arc_treated'           => $arc_treated,
                        // 'ipr_performed'         => $ipr_performed,
                        // 'attachment_placed'     => $attachment_placed,
                        // 'pt_treatment_plan'     => $pt_treatment_plan,
                        // 'pt_approval'           => $pt_approval,
                        // 'pt_approval_date'      => $pt_approval_date,
                        // 'pt_custom_status'      => $pt_custom_status,
                        // 'pt_case_type'          => $pt_case_type,
                        // 'pt_aligners'           => $pt_aligners,
                        // 'pt_aligners_dispatch'  => $pt_aligners_dispatch,
                        // 'pt_cost_plan'          => $pt_cost_plan,
                        // 'pt_amount_paid'        => $pt_amount_paid,
                        // 'pt_shipping_details'   => $pt_shipping_details,
                        // 'pt_billing_address'    => $pt_billing_address,
                        // 'pt_dispatch_date'      => $pt_dispatch_date,
                        'pt_status'             => $pt_status,
                        'added_by'              => $added_by,
                        'cur_date'              => $cur_date,
                        'status'                => $status
                        
                    );
                }
            }
            
            $this->Import_model->insertPatientData($data);
            $this->session->set_flashdata('success', "Patients Imported Successfully");
            redirect('admin/patient/patientListing');

        }
    }

    public function importDoctorInfo(){
        if(isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            // error_reporting(E_ALL);
            // ini_set('display_errors', TRUE);
            // ini_set('display_startup_errors', TRUE);
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++) {
                    $first_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $last_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $phone_number = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $age = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $gst_no = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $gender = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $notification_alert = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $user_type_id = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $is_active = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $added_by = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $created = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $updated = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $data[] = array(
                        'first_name'            => $first_name,
                        'last_name'             => $last_name,
                        'phone_number'          => $phone_number,
                        'email'                 => $email,                        
                        'age'                   => $age,
                        'gst_no'                => $gst_no,
                        'gender'                => $gender,
                        'notification_alert'    => $notification_alert,
                        'user_type_id'          => $user_type_id,
                        'is_active'             => $is_active,
                        'added_by'              => $added_by,
                        'created'               => $created,
                        'updated'               => $updated
                    );
                }
            }
        
            $this->Import_model->insertDoctorData($data);
            $this->session->set_flashdata('success', "Doctors Imported Successfully");
            redirect('admin/doctors');

        }
    }

    
}