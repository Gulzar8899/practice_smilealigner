<?php
/**
 * Controller Name: Admin
 * Description: back end admin
 * @author Surfiq Tech
 * Created date: 2021-07-04
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends MY_Controller
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
        $this->checkUserLogin();
        $this->userdata = $this->session->userdata('userdata');
        $this->load->model(array("Doctor_model","admin/Payment_model","admin/Document_model","admin/Admin_model","admin/Patient_model"));
        // $this->load->model(array("Admin_model","Patient_model","Document_model","Payment_model","doctor/Doctor_model"));
    }
    /**
     * @author Surfiq Tech
     */
    public function paymentList()
    {
         $data['userdata']    = $this->userdata;
        $adminID = $data['userdata']['id'];

        $data['allPatientList'] = $this->Doctor_model->getPatientListByID($adminID);

         $allPatientList=  $data['allPatientList'];
        $patient_data_array = array();
        for($i=0;$i<count($allPatientList); $i++){
            $chkpt_id = $allPatientList[$i]['pt_id'];
            $singleData = $allPatientList[$i];
            $single_product_data =  $this->Patient_model->getPatientInvoiceByID($chkpt_id);
            $singleData['patient_photos'] = $single_product_data;
            $patient_data_array[] = $singleData;

        }
        $data['allPatientListData'] = $patient_data_array;

        // echo "<pre>";
        // print_r( $data['allPatientListData']);
        // die();
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('payment/paymentList.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }


    public function viewPaymentHistory($id)
    {
         $data['userdata']    = $this->userdata;

        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $patientID =  $uriSegments[5];

        $data['allPatientListData'] = $this->Patient_model->getAllPatientList();
        $data['singlePatient'] = $this->Patient_model->getPatientByID($id);

        $data['getAllPaymentList'] = $this->Payment_model->getPaymentByPatientID($id);

        $data['payment'] = $this->Payment_model->getPaymentByIDLastRow($id);

        $allPatientList=  $data['getAllPaymentList'];
        $patient_data_array = array();
        for($i=0;$i<count($allPatientList); $i++){
            $chkpt_id = $allPatientList[$i]['photos_id'];
            $singleData = $allPatientList[$i];
            $single_product_data =  $this->Payment_model->getSinglePatientInvoiceByID($chkpt_id);
            $singleData['patient_photos'] = $single_product_data;
            $patient_data_array[] = $singleData;

        }
        $data['getAllPaymentListData'] = $patient_data_array;


        // echo "<pre>";
        // print_r( $data['getAllPaymentList']);
        // die();

        // foreach($data['getAllPaymentList'] as $paymentList){
        //     echo $paymentList['deposit_amount'];
        //     die();
        // }
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('payment/viewPaymentHistory.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }


    // public  function addPayment(){
    //  // echo "<pre>";
    //  // print_r($this->input->post());
    //  // die();
    //     $data['userdata']    = $this->userdata;
    //     $adminID = $data['userdata']['id'];
        
    //     $upload_path = 'assets/uploads/images/';
        
    //     $patientID = $this->input->post('patient_id');
    //     $patientData = array(
    //         'pt_cost_plan' => $this->input->post('payment_amount'),
    //     );

    //     // Add Cost Plan in Patient Table
    //     $result = $this->Patient_model->udpatePatientData($patientID , $patientData);

    //     if($result){

    //         //Invoice files
    //         for ($i = 0; $i < sizeof($_FILES['invoice_files']['name']); $i++) {
    //             if (!empty($_FILES['invoice_files']['name'][$i]) && $_FILES['invoice_files']['error'][$i] == 0) {

          
    //                 if($i == 0){

    //                     $file_type = 'Invoice';
    //                     $getDocument = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
    //                     $documentID = $getDocument['doc_id'];

    //                     if(empty($getDocument)){
    //                          $docsData = array(
    //                         'patient_id' => $patientID,
    //                         'file_type' => 'Invoice',
    //                         // 'des' => 'add',
    //                         'added_by' => $adminID,
    //                         'cur_date' => date('Y-m-d')
    //                         );

    //                         $documentID = $this->Doctor_model->insertDocument($docsData);
    //                     }

    //                 }

    //                 $file_name = time().str_replace(' ','_',$_FILES['invoice_files']['name'][$i]);
    //                 move_uploaded_file($_FILES['invoice_files']['tmp_name'][$i], $upload_path . $file_name);
    //                 $invoice_files['img'] =time().str_replace(' ','_',$_FILES['invoice_files']['name'][$i]);
    //                 $invoice_files['type'] = 'patient';
    //                 $invoice_files['key'] = 'Invoice';
    //                 $invoice_files['post_id'] = $documentID;
    //                 $invoice_files['user_id'] = $patientID;
    //                 $invoice_files['created_by'] = $adminID;

    //                 $result = $this->db->insert('photos',$invoice_files); 
                        
    //                     if($result){

    //                         // $patientID = $this->input->post('patientID');
    //                         $url = site_url('doctor/viewPatient/');    

    //                         $patientDetial =  $this->Patient_model->getPatientByID($patientID);

    //                         $doctorID = $patientDetial['doctor_id'];
    //                         $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);

    //                         $doctorName = $doctorDetial->first_name." ".$doctorDetial->last_name;
    //                         $doctorEmail = $doctorDetial->email;

    //                         $patientName = $patientDetial['pt_firstname']." ".$patientDetial['pt_lastname'];

    //                         $subject = "Invoice Has Been Added! ".$patientName;
    //                         // $message = "Dear " .$doctorName. " Invoice Has Been Successfully Added of Your Patient ".$patientName;
    //                         $message = "The Invoice is available for ".$patientName." is available now. You can view it through this ".$url.$patientID.".";

    //                         // Always set content-type when sending HTML email
    //                         $headers = "MIME-Version: 1.0" . "\r\n";
    //                         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //                         // More headers
    //                         $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

    //                         $mailRes = mail($doctorEmail,$subject,$message,$headers);
    //                     }

    //             }
    //         } 


    //     }
        
    //     redirect('doctor/payment/viewPaymentHistory/'.$patientID);
    //     if($result){
    //         $this->session->set_flashdata('success', "Payment Added");
    //         redirect('doctor/payment');
    //     } else {
    //         $this->session->set_flashdata('error', "Somethin went wrong!.");
    //         redirect('doctor/payment');
    //     }
    // }



    // public  function addDeposit(){
    //  // echo "<pre>";
    //  // print_r($this->input->post());
    //  // die();
    //     $data['userdata']    = $this->userdata;
    //     $adminID = $data['userdata']['id'];

    //     $patientID = $this->input->post('patient_id');
    //     $depositData = array(
    //         'patient_id' => $this->input->post('patient_id'),
    //         'deposit_date' => date("Y-m-d"),
    //         'deposit_amount' => $this->input->post('deposit_amount'),
    //         'deposit_type' => $this->input->post('deposit_type'),
    //     );

    //     // Add Cost Plan in Patient Table
    //     $result = $this->Payment_model->insertDepositAmount($depositData);
        

    //     $getPatientDepositAmount = $this->Patient_model->getPatientByID($patientID);

    //     if(!empty($getPatientDepositAmount)){
    //         $depositAmount = $getPatientDepositAmount['pt_amount_paid'] + $this->input->post('deposit_amount');
    //         $patientData = array(
    //             'pt_amount_paid' =>  $depositAmount,
    //         );

    //     }else{
    //         $patientData = array(
    //             'pt_amount_paid' => $this->input->post('deposit_amount'),
    //         );
    //     }
        
    //     // Add deposit Amount in Patient Table
    //     $updatePatient = $this->Patient_model->udpatePatientData($patientID , $patientData);

    //     redirect('doctor/payment/viewPaymentHistory/'.$patientID);
    //     if($result){
    //         $this->session->set_flashdata('success', "Payment Added");
    //         redirect('doctor/payment');
    //     } else {
    //         $this->session->set_flashdata('error', "Somethin went wrong!.");
    //         redirect('doctor/payment');
    //     }
    // }

        public function searchDepositPayment()
    {
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        $patientID = $this->input->post('patientID');
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');

          

        // $this->db->where('deposit_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');

        $this->db->where('patient_id >=', $patientID);
        $this->db->where('deposit_date >=', $date_from);
        $this->db->where('deposit_date <=', $date_to);
         $res = $this->db->get('payments');
         $result = $res->result_array();


        // $result = $this->db->where('deposit_date BETWEEN "'. $date_from . '" and "'. $date_to .'"');

        if ($result) {
            
            echo json_encode($result);
            exit;
        }
        // $result = $this->Payment_model->getDepositAmounts($patientID, $);


    }


     public  function getPatientImagetype(){

        $type = htmlspecialchars($_GET["imageType"]);
        $paymentID = htmlspecialchars($_GET["id"]);

        $table = 'payments';
        $getPhotosID =  $this->Payment_model->getPaymentByID($paymentID, $table);

        $photoID = $getPhotosID->photos_id;

        if($type){

            if($type == 'oral_opg_lateral'){
                $image_type = 'Intra Oral Images';
                $intra = $this->Payment_model->getImageByPhotosID($photoID, $image_type);
                
                $image_type = 'OPG Images';
                $opg = $this->Payment_model->getImageByPhotosID($photoID, $image_type);
                
                $image_type = 'Lateral C Images';
                 $lateral = $this->Payment_model->getImageByPhotosID($photoID, $image_type);

                $result = array_merge($intra, $opg, $lateral);

                echo json_encode($result);
                exit();

            }elseif($type == 'stl_file'){
                $image_type = 'STL File(3D File)';
            }elseif($type == 'scans_images'){
                $image_type = 'Scans';
            }elseif($type == 'treatment_plan_images'){
                $image_type = 'Treatment Plan';
            }elseif($type == 'ipr_file'){
                $image_type = 'IPR';
            }elseif($type == 'invoice'){
                $image_type = 'Invoice';
            }

        }
        // $patientID = $this->input->post('id');
        // $imageType = $this->input->post('imageType');

        $result = $this->Payment_model->getImageByPhotosID($photoID, $image_type);
        echo json_encode($result);



    }

     public function getdownloadPostFile($docType, $photoID)
    {
        $postData = $this->Payment_model->getPhotosTyoePostID($docType, $photoID);
        echo print($postData);

        for($i=0;$i<count($postData);$i++)
        {
            $imgPath = 'assets/uploads/images/'.$postData[$i]['img'];
            $postFile = $imgPath;
            $this->zip->read_file($postFile);
        }
        $this->zip->download(''.time().'.zip');
    }


}
