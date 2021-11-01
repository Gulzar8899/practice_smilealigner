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
        $this->checkAdminLogin(); 
        $this->adminData = $this->session->userdata('adminData');
        $this->load->model(array("Admin_model","Patient_model","Document_model","Payment_model","doctor/Doctor_model"));
    }
    /**
     * @author Surfiq Tech
     */
    public function paymentList()
    {
        $data['admin_data']    = $this->adminData;
        $data['allPatientList'] = $this->Patient_model->getAllPatientList();


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


        // foreach($data['allPatientListData'] as $allPatient){
        //     echo $allPatient['doctor_id'];
        //     die();
        // }

        // echo "<pre>";
        // print_r( $data['allPatientListData']);
        // die();
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('payment/paymentList.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }


    public function viewPaymentHistory($id)
    {
        $data['admin_data']    = $this->adminData;

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

        //  echo "<pre>";
        // print_r( $data['singlePatient']);
        // die();
    
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('payment/viewPaymentHistory.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }


    public  function addPayment(){
   
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];
        
        $upload_path = 'assets/uploads/images/';
        $patientID = $this->input->post('patient_id');

        $patientPaymentData = array(
            'invoice_no' => $this->input->post('invoice_no'),
            'deposit_date' => date("Y-m-d"),
            'patient_id' => $patientID,
            'payment_amount' => $this->input->post('payment_amount'),
            'amount_type' => $this->input->post('amount_type'),
        );
        $payment_id = $this->Payment_model->insertDepositAmount($patientPaymentData);

        $invoice_no = $this->input->post('invoice_no');
        $pt_cost_plan = $this->input->post('payment_amount') + $this->input->post('pt_cost_plan');
        $patientData = array(
            'pt_cost_plan' => $pt_cost_plan,
        );
        // Add Cost Plan in Patient Table
        $result = $this->Patient_model->udpatePatientData($patientID , $patientData);

        if($result){
            //Invoice files
            for ($i = 0; $i < sizeof($_FILES['invoice_files']['name']); $i++) {
                if (!empty($_FILES['invoice_files']['name'][$i]) && $_FILES['invoice_files']['error'][$i] == 0) {

          
                    if($i == 0){

                        $file_type = 'Invoice';
                        $getDocument = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
                        $documentID = $getDocument['doc_id'];

                        if(empty($getDocument)){
                             $docsData = array(
                            'patient_id' => $patientID,
                            'file_type' => 'Invoice',
                            // 'des' => 'add',
                            'added_by' => $adminID,
                            'cur_date' => date('Y-m-d')
                            );

                            $documentID = $this->Doctor_model->insertDocument($docsData);
                        }

                    }

                    $file_name = time().str_replace(' ','_',$_FILES['invoice_files']['name'][$i]);
                    move_uploaded_file($_FILES['invoice_files']['tmp_name'][$i], $upload_path . $file_name);
                    $invoice_files['img'] =time().str_replace(' ','_',$_FILES['invoice_files']['name'][$i]);
                    $invoice_files['type'] = 'patient';
                    $invoice_files['key'] = 'Invoice';
                    $invoice_files['post_id'] = $documentID;
                    $invoice_files['user_id'] = $patientID;
                    $invoice_files['created_by'] = $adminID;

                    $this->db->insert('photos',$invoice_files); 
                    $insert_id = $this->db->insert_id();

                    // Insert photo ID
                    $depositData = array(
                        'photos_id' => $insert_id,
                    );

                    // Add Cost Plan in Patient Table
                    $result = $this->Payment_model->updateDepositAmount($payment_id, $depositData);
                        

                        $patientDetial =  $this->Patient_model->getPatientByID($patientID);

                        $doctorID = $patientDetial['doctor_id'];
                        $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);

                        $doctorName = $doctorDetial->first_name." ".$doctorDetial->last_name;
                        $doctorEmail = $doctorDetial->email;

                        $patientName = $patientDetial['pt_firstname']." ".$patientDetial['pt_lastname'];
                        if($doctorDetial->notification_alert == 'on'){

                            // $patientID = $this->input->post('patientID');
                            $url = site_url('doctor/viewPatient/');
                            $link = '<a href="'.$url.$patientID.'" target="_blank"><span style="">Click Here</span></a>';    
                            
                            $subject = "Invoice for ". $patientName ."  is available now!";
                            $message = "Invoice ".$invoice_no." for ". $patientName ." is available now. The total bill amount is ".$pt_cost_plan.".";
                            
                            // Always set content-type when sending HTML email
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            // More headers
                            $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

                            $mailRes = mail($doctorEmail,$subject,$message,$headers);
                        }

                    

                }
            } 


        }


        // redirect('admin/payment/viewPaymentHistory/'.$patientID);
        if($result){
            $this->session->set_flashdata('success', "Payment Added Successfully");
            redirect('admin/payment/viewPaymentHistory/'.$patientID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/payment/viewPaymentHistory/'.$patientID);
        }
    }

     public  function updatePayment(){
         // echo "<pre>";
         // print_r($this->input->post());
         // die();
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];
        
        $upload_path = 'assets/uploads/images/';
        $patientID = $this->input->post('patient_id');
        $paymentID = $this->input->post('payment_id');

        $patientPaymentData = array(
            // 'invoice_no' => $this->input->post('invoice_no'),
            // 'deposit_date' => date("Y-m-d"),
            // 'patient_id' => $patientID,
            'payment_amount' => $this->input->post('payment_amount'),
            // 'amount_type' => $this->input->post('amount_type'),
        );
        $payment_id = $this->Payment_model->updateDepositAmount($paymentID, $patientPaymentData);

        $oldPayment = $this->input->post('old_payment_amount');
        $newPayment = $this->input->post('payment_amount');
        $cost_plan = $this->input->post('pt_cost_plan');
        $invoice_no = $this->input->post('invoice_no');

        if($oldPayment > $newPayment){
            $total_cost_plan = $oldPayment - $newPayment;
            $pt_cost_plan = $cost_plan - $total_cost_plan;
        }elseif($oldPayment < $newPayment){
            $total_cost_plan = $newPayment - $oldPayment;
            $pt_cost_plan = $cost_plan + $total_cost_plan;
        }else{
            $pt_cost_plan = $cost_plan;
        }

        $patientData = array(
            'pt_cost_plan' => $pt_cost_plan,
        );
        // Add Cost Plan in Patient Table
        $result = $this->Patient_model->udpatePatientData($patientID , $patientData);

        if($result){
            //Invoice files
            for ($i = 0; $i < sizeof($_FILES['invoice_files']['name']); $i++) {
                if (!empty($_FILES['invoice_files']['name'][$i]) && $_FILES['invoice_files']['error'][$i] == 0) {

          
                    if($i == 0){

                        $file_type = 'Invoice';
                        $getDocument = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
                        $documentID = $getDocument['doc_id'];

                        if(empty($getDocument)){
                             $docsData = array(
                            'patient_id' => $patientID,
                            'file_type' => 'Invoice',
                            // 'des' => 'add',
                            'added_by' => $adminID,
                            'cur_date' => date('Y-m-d')
                            );

                            $documentID = $this->Doctor_model->insertDocument($docsData);
                        }

                    }

                    $file_name = time().str_replace(' ','_',$_FILES['invoice_files']['name'][$i]);
                    move_uploaded_file($_FILES['invoice_files']['tmp_name'][$i], $upload_path . $file_name);
                    $invoice_files['img'] =time().str_replace(' ','_',$_FILES['invoice_files']['name'][$i]);
                    $invoice_files['type'] = 'patient';
                    $invoice_files['key'] = 'Invoice';
                    $invoice_files['post_id'] = $documentID;
                    $invoice_files['user_id'] = $patientID;
                    $invoice_files['created_by'] = $adminID;

                    $this->db->insert('photos',$invoice_files); 
                    $insert_id = $this->db->insert_id();

                    // Insert photo ID
                    $depositData = array(
                        'photos_id' => $insert_id,
                    );


                     $paymentID = $this->input->post('payment_id');


                    // Add Cost Plan in Patient Table
                    $result = $this->Payment_model->updateDepositAmount($paymentID, $depositData);
                        

                        $patientDetial =  $this->Patient_model->getPatientByID($patientID);

                        $doctorID = $patientDetial['doctor_id'];
                        $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);

                        $doctorName = $doctorDetial->first_name." ".$doctorDetial->last_name;
                        $doctorEmail = $doctorDetial->email;

                        $patientName = $patientDetial['pt_firstname']." ".$patientDetial['pt_lastname'];
                        if($doctorDetial->notification_alert == 'on'){

                            // $patientID = $this->input->post('patientID');
                            $url = site_url('doctor/viewPatient/');
                            $link = '<a href="'.$url.$patientID.'" target="_blank"><span style="">Click Here</span></a>';    
                            
                            $subject = "Invoice for ". $patientName ."  is available now!";
                            $message = "Invoice ".$invoice_no." for ". $patientName ." is available now. The total bill amount is ".$pt_cost_plan.".";

                            // Always set content-type when sending HTML email
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            // More headers
                            $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

                            $mailRes = mail($doctorEmail,$subject,$message,$headers);
                        }

                    

                }
            } 


        }


        // redirect('admin/payment/viewPaymentHistory/'.$patientID);
        if($result){
            $this->session->set_flashdata('success', "Payment Updated Successfully");
            redirect('admin/payment/viewPaymentHistory/'.$patientID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/payment/viewPaymentHistory/'.$patientID);
        }
    }


    public function deletePaymentHistoryByID()
    {
        // code...
        $recordID = $this->input->post('recordID');
        $table_name = $this->input->post('table_name');

        // Get Payment Table Data for Deleting the Invoice PDF
        $getPaymentHistory = $this->Payment_model->getPaymentByID($recordID, $table_name);

        // Delete Payment File From Photos
        $photos_id = $getPaymentHistory->photos_id;
        $deletePhotos = $this->Payment_model->deletePaymentPhotosByID($photos_id);

        // Delete Deposit File Against Payment
        $depositInvoiceNo = $getPaymentHistory->invoice_no;
        $getDepositPhotos = $this->Payment_model->getDepositInvoiceNo($depositInvoiceNo);

        foreach($getDepositPhotos as $photos){
            $photos_id = $photos['photos_id'];
             $deletePhotos = $this->Payment_model->deletePaymentPhotosByID($photos_id);
        }


        // Delete Deposit BY ID
        $deleteDeposit = $this->Payment_model->deleteDepositByID($depositInvoiceNo);

        // Delete Payment BY ID
        $resultData = $this->Payment_model->deletePaymentByID($recordID, $table_name);

        
        if ($resultData) {
            //$this->session->set_flashdata('success', 'Doctor Deleted');
            $response = array("type"=>"success","message"=>"Payment/Deposit Invoice Deleted"); 
        } 
        else {
            $this->session->set_flashdata('error', 'Seems to an error. Please try again later.');
            $response = array("type"=>"error","message"=>"Something went wrong"); 

        }

        echo json_encode($response);
        exit;
    }


     public function deleteDepositPaymentHistoryByID()
    {
        // code...
        $recordID = $this->input->post('recordID');
        $table_name = $this->input->post('table_name');

        // Get Payment Table Data for Deleting the Invoice PDF
        $getPaymentHistory = $this->Payment_model->getPaymentByID($recordID, $table_name);

        // Delete Deposit Invoice File From Photos
        $photos_id = $getPaymentHistory->photos_id;
        $deletePhotos = $this->Payment_model->deletePaymentPhotosByID($photos_id);

        // Delete Deposit Row From Payment
        $resultData = $this->Payment_model->deletePaymentByID($recordID, $table_name);

        
        if ($resultData) {
            //$this->session->set_flashdata('success', 'Doctor Deleted');
            $response = array("type"=>"success","message"=>"Deposit Invoice Deleted"); 
        } 
        else {
            $this->session->set_flashdata('error', 'Seems to an error. Please try again later.');
            $response = array("type"=>"error","message"=>"Something went wrong"); 

        }

        echo json_encode($response);
        exit;
    }



    // Delete Payment Invoice
    public function deletePaymentInvoice()
    {
        $photos_id=$this->input->post('id');
        $deletePhotos=$this->Payment_model->deletePaymentPhotosByID($photos_id);
        echo json_encode($deletePhotos);
    }

    public  function addDeposit(){
     // echo "<pre>";
     // print_r($this->input->post());
     // die();
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];
        $upload_path = 'assets/uploads/images/';

        $patientID = $this->input->post('patient_id');
        $depositData = array(
            'patient_id' => $this->input->post('patient_id'),
            'invoice_no' => $this->input->post('invoice_no'),
            'deposit_date' => date("Y-m-d"),
            'deposit_amount' => $this->input->post('deposit_amount'),
            'deposit_type' => $this->input->post('deposit_type'),
            'amount_type' => $this->input->post('amount_type'),
        );

        // Add Cost Plan in Patient Table
        $payment_id = $this->Payment_model->insertDepositAmount($depositData);
        $pt_amount_paid = $this->input->post('deposit_amount') + $this->input->post('pt_amount_paid');

        // if(!empty($getPatientDepositAmount)){
        //     $depositAmount = $getPatientDepositAmount['pt_amount_paid'] + $this->input->post('deposit_amount');
        //     $patientData = array(
        //         'pt_amount_paid' =>  $depositAmount,
        //     );

        // }else{
        //     $patientData = array(
        //         'pt_amount_paid' => $this->input->post('deposit_amount'),
        //     );
        // }
        
       $patientData = array(
            'pt_amount_paid' => $pt_amount_paid,
        );
        // Add deposit Amount in Patient Table
        $updatePatient = $this->Patient_model->udpatePatientData($patientID , $patientData);

        $getPatientDepositAmount = $this->Patient_model->getPatientByID($patientID);

        if($updatePatient){

            $patientDetial =  $this->Patient_model->getPatientByID($patientID);
            $depAmount = $this->input->post('deposit_amount');
            $invoice_no = $this->input->post('invoice_no');
            $dueAmount = $getPatientDepositAmount['pt_cost_plan'] - $getPatientDepositAmount['pt_amount_paid'];

            $doctorID = $patientDetial['doctor_id'];
            $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);
            $doctorEmail = $doctorDetial->email;

            $patientName = $patientDetial['pt_firstname']." ".$patientDetial['pt_lastname'];

            if($doctorDetial->notification_alert == 'on'){
                $subject = "Thank you for your payment on ". $patientName ."’s invoice.";
                // $message = "Dear " .$doctorName. " Invoice Has Been Successfully Added of Your Patient ".$patientName;
                $message = "A deposit of Rs.".$depAmount." was made on Invoice#".$invoice_no." for ".$patientName.". Total due amount is Rs.".$dueAmount.".";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

                $mailRes = mail($doctorEmail,$subject,$message,$headers);
            }
        }

        // if($payment_id){
        //     //Invoice files
        //     for ($i = 0; $i < sizeof($_FILES['deposit_invoice_files']['name']); $i++) {
        //         if (!empty($_FILES['deposit_invoice_files']['name'][$i]) && $_FILES['deposit_invoice_files']['error'][$i] == 0) {

        //             if($i == 0){

        //                 $file_type = 'Invoice';
        //                 $getDocument = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
        //                 $documentID = $getDocument['doc_id'];

        //                 if(empty($getDocument)){
        //                      $docsData = array(
        //                     'patient_id' => $patientID,
        //                     'file_type' => 'Invoice',
        //                     // 'des' => 'add',
        //                     'added_by' => $adminID,
        //                     'cur_date' => date('Y-m-d')
        //                     );

        //                     $documentID = $this->Doctor_model->insertDocument($docsData);
        //                 }

        //             }

        //             $file_name = time().str_replace(' ','_',$_FILES['deposit_invoice_files']['name'][$i]);
        //             move_uploaded_file($_FILES['deposit_invoice_files']['tmp_name'][$i], $upload_path . $file_name);
        //             $invoice_files['img'] =time().str_replace(' ','_',$_FILES['deposit_invoice_files']['name'][$i]);
        //             $invoice_files['type'] = 'patient';
        //             $invoice_files['key'] = 'Invoice';
        //             $invoice_files['post_id'] = $documentID;
        //             $invoice_files['user_id'] = $patientID;
        //             $invoice_files['created_by'] = $adminID;

        //             $this->db->insert('photos',$invoice_files); 
        //             $insert_id = $this->db->insert_id();

        //             // Insert photo ID
        //             $depositData = array(
        //                 'photos_id' => $insert_id,
        //             );
                    
                   
        //             // Add Cost Plan in Patient Table
        //             $result = $this->Payment_model->updateDepositAmount($payment_id, $depositData);
                        
        //                 $patientDetial =  $this->Patient_model->getPatientByID($patientID);

        //                 $doctorID = $patientDetial['doctor_id'];
        //                 $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);

        //                 $doctorName = $doctorDetial->first_name." ".$doctorDetial->last_name;
        //                 $doctorEmail = $doctorDetial->email;

        //                 $patientName = $patientDetial['pt_firstname']." ".$patientDetial['pt_lastname'];

        //                 if($doctorDetial->notification_alert == 'on'){

        //                     // $patientID = $this->input->post('patientID');
        //                     $url = site_url('doctor/viewPatient/');    

                            

        //                     $subject = "Invoice Has Been Added! ".$patientName;
        //                     // $message = "Dear " .$doctorName. " Invoice Has Been Successfully Added of Your Patient ".$patientName;
        //                     $message = "The Invoice is available for ".$patientName." is available now. You can view it through this ".$url.$patientID.".";

        //                     // Always set content-type when sending HTML email
        //                     $headers = "MIME-Version: 1.0" . "\r\n";
        //                     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        //                     // More headers
        //                     $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

        //                     $mailRes = mail($doctorEmail,$subject,$message,$headers);
        //                 }

                    

        //         }
        //     } 


        // }

        // redirect('admin/payment/viewPaymentHistory/'.$patientID);
        if($updatePatient){
            $this->session->set_flashdata('success', "Deposit Amount Added Successfully");
            redirect('admin/payment/viewPaymentHistory/'.$patientID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/payment/viewPaymentHistory/'.$patientID);
        }
    }


    public  function updateDeposit(){
     // echo "<pre>";
     // print_r($this->input->post());
     // die();
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];
        $upload_path = 'assets/uploads/images/';

        $payment_id = $this->input->post('payment_id');
        $patientID = $this->input->post('patient_id');
        $depositData = array(
            // 'patient_id' => $this->input->post('patient_id'),
            // 'invoice_no' => $this->input->post('invoice_no'),
            // 'deposit_date' => date("Y-m-d"),
            'deposit_amount' => $this->input->post('deposit_amount'),
            'deposit_type' => $this->input->post('deposit_type'),
            // 'amount_type' => $this->input->post('amount_type'),
        );

        // Add Cost Plan in Patient Table
        $payment_id = $this->Payment_model->updateDepositAmount($payment_id, $depositData);

        $oldDeposit = $this->input->post('old_deposit_amount');
        $newDeposit = $this->input->post('deposit_amount');
        $depositAmount = $this->input->post('pt_amount_paid');

        if($oldDeposit > $newDeposit){
            $total_depositAmount = $oldDeposit - $newDeposit;
            $pt_amount_paid = $depositAmount - $total_depositAmount;
        }elseif($oldDeposit < $newDeposit){
            $total_depositAmount = $newDeposit - $oldDeposit;
            $pt_amount_paid = $depositAmount + $total_depositAmount;
        }else{
            $pt_amount_paid = $depositAmount;
        }

        // $pt_amount_paid = $this->input->post('deposit_amount') + $this->input->post('pt_amount_paid');

        // if(!empty($getPatientDepositAmount)){
        //     $depositAmount = $getPatientDepositAmount['pt_amount_paid'] + $this->input->post('deposit_amount');
        //     $patientData = array(
        //         'pt_amount_paid' =>  $depositAmount,
        //     );

        // }else{
        //     $patientData = array(
        //         'pt_amount_paid' => $this->input->post('deposit_amount'),
        //     );
        // }
        
       $patientData = array(
            'pt_amount_paid' => $pt_amount_paid,
        );
        // Add deposit Amount in Patient Table
        $updatePatient = $this->Patient_model->udpatePatientData($patientID , $patientData);

        $getPatientDepositAmount = $this->Patient_model->getPatientByID($patientID);

        if($updatePatient){

            $patientDetial =  $this->Patient_model->getPatientByID($patientID);
            $depAmount = $this->input->post('deposit_amount');
            $invoice_no = $this->input->post('invoice_no');
            $dueAmount = $getPatientDepositAmount['pt_cost_plan'] - $getPatientDepositAmount['pt_amount_paid'];

            $doctorID = $patientDetial['doctor_id'];
            $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);
            $doctorEmail = $doctorDetial->email;

            $patientName = $patientDetial['pt_firstname']." ".$patientDetial['pt_lastname'];

            if($doctorDetial->notification_alert == 'on'){
                $subject = "Thank you for your payment on ". $patientName ."’s invoice.";

                // $message = "Dear " .$doctorName. " Invoice Has Been Successfully Added of Your Patient ".$patientName;
                $message = "A deposit of Rs.".$depAmount." was made on Invoice#".$invoice_no." for ".$patientName.". Total due amount is Rs.".$dueAmount.".";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

                $mailRes = mail($doctorEmail,$subject,$message,$headers);
            }
        }

        // if($payment_id){
        //     //Invoice files
        //     for ($i = 0; $i < sizeof($_FILES['deposit_invoice_files']['name']); $i++) {
        //         if (!empty($_FILES['deposit_invoice_files']['name'][$i]) && $_FILES['deposit_invoice_files']['error'][$i] == 0) {

        //             if($i == 0){

        //                 $file_type = 'Invoice';
        //                 $getDocument = $this->Document_model->getDocumentDataByPatID($patientID, $file_type);
        //                 $documentID = $getDocument['doc_id'];

        //                 if(empty($getDocument)){
        //                      $docsData = array(
        //                     'patient_id' => $patientID,
        //                     'file_type' => 'Invoice',
        //                     // 'des' => 'add',
        //                     'added_by' => $adminID,
        //                     'cur_date' => date('Y-m-d')
        //                     );

        //                     $documentID = $this->Doctor_model->insertDocument($docsData);
        //                 }

        //             }

        //             $file_name = time().str_replace(' ','_',$_FILES['deposit_invoice_files']['name'][$i]);
        //             move_uploaded_file($_FILES['deposit_invoice_files']['tmp_name'][$i], $upload_path . $file_name);
        //             $invoice_files['img'] =time().str_replace(' ','_',$_FILES['deposit_invoice_files']['name'][$i]);
        //             $invoice_files['type'] = 'patient';
        //             $invoice_files['key'] = 'Invoice';
        //             $invoice_files['post_id'] = $documentID;
        //             $invoice_files['user_id'] = $patientID;
        //             $invoice_files['created_by'] = $adminID;

        //             $this->db->insert('photos',$invoice_files); 
        //             $insert_id = $this->db->insert_id();

        //             $paymentID = $this->input->post('payment_id');


        //             // Insert photo ID
        //             $depositData = array(
        //                 'photos_id' => $insert_id,
        //             );
                    
        //            // echo "<pre>";
        //            // print_r($paymentID);
        //            // print_r($depositData);
        //            // die();
        //             // Add Cost Plan in Patient Table
        //             $result = $this->Payment_model->updateDepositAmount($paymentID, $depositData);
                        
        //                 $patientDetial =  $this->Patient_model->getPatientByID($patientID);

        //                 $doctorID = $patientDetial['doctor_id'];
        //                 $doctorDetial =  $this->Admin_model->getDoctorProfile($doctorID);

        //                 $doctorName = $doctorDetial->first_name." ".$doctorDetial->last_name;
        //                 $doctorEmail = $doctorDetial->email;

        //                 $patientName = $patientDetial['pt_firstname']." ".$patientDetial['pt_lastname'];

        //                 if($doctorDetial->notification_alert == 'on'){

        //                     // $patientID = $this->input->post('patientID');
        //                     $url = site_url('doctor/viewPatient/');    

                            

        //                     $subject = "Invoice Has Been Added! ".$patientName;
        //                     // $message = "Dear " .$doctorName. " Invoice Has Been Successfully Added of Your Patient ".$patientName;
        //                     $message = "The Invoice is available for ".$patientName." is available now. You can view it through this ".$url.$patientID.".";

        //                     // Always set content-type when sending HTML email
        //                     $headers = "MIME-Version: 1.0" . "\r\n";
        //                     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        //                     // More headers
        //                     $headers .= 'From: Smilealigners <hr@smilealigners.in>' . "\r\n";

        //                     $mailRes = mail($doctorEmail,$subject,$message,$headers);
        //                 }

                    

        //         }
        //     } 


        // }

        // redirect('admin/payment/viewPaymentHistory/'.$patientID);
        if($updatePatient){
            $this->session->set_flashdata('success', "Deposit Amount Updated Successfully");
            redirect('admin/payment/viewPaymentHistory/'.$patientID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/payment/viewPaymentHistory/'.$patientID);
        }
    }

    public  function editPayment(){
        $payment_id = $this->input->post('id');
        $result = $this->Payment_model->getEditPaymentHistory($payment_id);
        echo json_encode($result);
    }


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
