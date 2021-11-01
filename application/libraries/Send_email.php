<?php

class Send_email
{
    private $CI;

    function __construct()
    {
        $this->CI =& get_instance();

    }

    public function send_mail($email, $message, $subject)
    {
        $this->CI->load->library('email');
//        $config['protocol'] = protocol;
//        $config['smtp_host'] = smtp_host;
//        $config['smtp_port'] = smtp_port;
//        $config['smtp_timeout'] = '7';
//        $config['smtp_user'] = "brijesh1903@gmail.com";
//        $config['smtp_pass'] = "";
//        $config['charset'] = 'utf-8';
//        $config['crlf'] = '\r\n';
//        $config['newline'] = '\r\n';
//        $config['mailtype'] = 'html';
//        $config['validate'] = TRUE;

        /*$config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'credosyssolutionsindia@gmail.com',
            'smtp_pass' => 'command2112',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );*/
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.smilealign.in',
            'smtp_port' => 2525,
            'smtp_user' => 'noreply@smilealign.in',
            'smtp_pass' => 'noreply123',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        
        /*
         *added by Dinesh 06-1-2018
        */
        /*$this->CI->email->SMTPOptions = array (
        'ssl' => array(
            'verify_peer'  => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true));*/
        
        

        $this->CI->email->initialize($config);
        $this->CI->email->set_newline("\r\n");
        $this->CI->email->set_newline("\r\n");
        $this->CI->email->from('hr@smilealign.com', 'Smile Aligners');
        $this->CI->email->to($email);
        $this->CI->email->subject($subject);
        $this->CI->email->message($message);
        
        
            
        $res = $this->CI->email->send();
//         echo $this->CI->email->print_debugger();
        return $res;
    }

    // 007

    public function sent_contact_mail($email, $message, $subject)
    {
        $this->CI->load->library('email');
        $config['protocol'] = protocol;
        $config['smtp_host'] = smtp_host;
        $config['smtp_port'] = smtp_port;
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = smtp_user;
        $config['smtp_pass'] = smtp_pass;
        $config['charset'] = 'utf-8';
        $config['crlf'] = '\r\n';
        $config['newline'] = '\r\n';
        $config['mailtype'] = 'html';
        $config['validate'] = TRUE;

        $this->CI->email->initialize($config);
        $this->CI->email->set_newline("\r\n");
        $this->CI->email->set_newline("\r\n");
        $this->CI->email->from($email, 'Smile Aligners');
        $this->CI->email->to("connect.smilealigners@gmil.com");
        $this->CI->email->subject($subject);
        $this->CI->email->message($message);

        $res = $this->CI->email->send();
        return $res;
    }
    // code end 007

//    public function send_sms($sms_message, $phone){
//        $smsapi = "http://enterprise.smsgupshup.com/GatewayAPI/rest?method=SendMessage&send_to=$phone&msg=$sms_message&msg_type=TEXT&userid=2000097898&auth_scheme=plain&password=Leni@759&v=1.1&format=text&mask=Astro";
//        $send_sms = file($smsapi);
//    }

    public function send_sms($sms_message, $phone){
        $request ="";
        $param=array();
        $param['user']= "Adinathmetalmart";
        $param['password'] = "united123";
        $param['msisdn'] = $phone;
        $param['sid'] = "ASTROO";
        $param['msg'] = "$sms_message";
        $param['fl']="0";
        foreach($param as $key=>$val) {
            $request.= $key."=".urlencode($val);
            $request.= "&";
        }
        $request = substr($request, 0, strlen($request)-1);
        $url ="http://fast.admarksolution.com/vendorsms/pushsms.aspx?".$request;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
//        echo $curl_scraped_page;
    }
//
//    public function send_sms_curl($sms_message, $phone){
//    $request ="";
//    $param=array();
//    $param['method']= "sendMessage";
//    $param['send_to'] = $phone;
//    $param['msg'] = $sms_message;
//    $param['userid'] = "2000097898";
//    $param['password'] = "Leni@759";
//    $param['v'] = "1.1";
//    $param['msg_type'] = "TEXT";
//    $param['auth_scheme'] = "PLAIN";
//    foreach($param as $key=>$val) {
//        $request.= $key."=".urlencode($val);
//        $request.= "&";
//    }
//    $request = substr($request, 0, strlen($request)-1);
//    $url ="http://enterprise.smsgupshup.com/GatewayAPI/rest?".$request;
//    $ch = curl_init($url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    $curl_scraped_page = curl_exec($ch);
//    curl_close($ch);
//    echo $curl_scraped_page;
//    }

//    public function send_sms_new($sms_message, $phone){
//        $request ="";
//        $param=array();
//        $param['user']= "Adinathmetalmart";
//        $param['password'] = "united123";
//        $param['msisdn'] = $phone;
//        $param['sid'] = "ASTROO";
//        $param['msg'] = "$sms_message";
//        $param['fl']="0";
//        foreach($param as $key=>$val) {
//            $request.= $key."=".urlencode($val);
//            $request.= "&";
//        }
//        $request = substr($request, 0, strlen($request)-1);
//        $url ="http://fast.admarksolution.com/vendorsms/pushsms.aspx?".$request;
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $curl_scraped_page = curl_exec($ch);
//        curl_close($ch);
//        echo $curl_scraped_page;
//    }


}