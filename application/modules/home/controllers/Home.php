<?php
    /**
     * Controller Name: Home
     * Description: front end Home
     * @author Surfiq Tech
     * Created date: 2020-07-01
     */
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Home extends MY_Controller
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
            $this->load->model(array("Home_model")); 
            $this->userData = $this->session->userdata('userdata');
        }
        /**
         * @author Surfiq Tech
         */
        public function index()
        {
            $data['userData'] = json_decode(json_encode($this->userData), True);
            $data['countries'] = $this->Home_model->getAllCountries();
            $data['states'] = $this->Home_model->getAllStates();
            $data['cities'] = $this->Home_model->getAllCities();
            
            $this->load->view('elements/front_topbar',$data);
            $this->load->view('index',$data);
            $this->load->view('elements/front_footer',$data);
        }  
        public function category($slug)
        {
            $data['userData'] = json_decode(json_encode($this->userData), True);
            // print_r($data['userData']); die();
            $data['slider_data'] = $this->Home_model->getSliderData();
            $data['categories_data_for_nav'] = $this->Home_model->get_nav_CategoriesData();
            $data['user_wish_list'] = $this->Home_model->get_wishlist_by_userId($data['userData']['id']);
            $data['sale_product_data'] =  $this->Home_model->get_on_sale_products();
            $data['categories_data_for_nav'] = $this->Home_model->get_nav_CategoriesData();
            $data['user_wish_list'] = $this->Home_model->get_wishlist_by_userId($data['userData']['id']);
            $slug_r = explode('-', $slug);
            $id = $slug_r[0];
            for($a = 1; $a<count($slug_r); $a++){
            $category_name .= ' '.str_replace('-', ' ', $slug_r[$a]);
            }
            $data['category_name'] = $category_name;
            $data['related_product_data'] = $this->Home_model->get_product_bySubCat_id($id);
            $this->load->view('elements/front_topbar',$data);
            $this->load->view('elements/navbar',$data);
            $this->load->view('elements/audio_popup',$data);
            $this->load->view('product_category',$data);
            $this->load->view('elements/front_footer',$data);
        }
        public function product_detail($id)
        {
            $data['categories_data_for_nav'] = $this->Home_model->get_nav_CategoriesData();
            $data['user_wish_list'] = $this->Home_model->get_wishlist_by_userId($data['userData']['id']);
            $data['userData'] = json_decode(json_encode($this->userData), True);
            if($data['userData'])
            {
                $data['user_wish_list'] = $this->Home_model->get_wishlist_by_userId($data['userData']['id']);
            }
            $first_star = $this->Home_model->getProductStar('1','3',$id);
            $second_star = $this->Home_model->getProductStar('2','3',$id);
            $three_star = $this->Home_model->getProductStar('3','3',$id);
            $four_star = $this->Home_model->getProductStar('4','3',$id);
            $five_star = $this->Home_model->getProductStar('5','3',$id);

            $total_star_ratings = $first_star + $second_star + $three_star + $four_star + $five_star;
            $totalStarVal = $first_star * 1 + $second_star * 2 + $three_star * 3 + $four_star * 4 + $five_star * 5;

            $cal_percentage_val = $totalStarVal / $total_star_ratings;

            if(is_nan($cal_percentage_val)){
                $cal_percentage_val = 0;
            }
            else{
                $cal_percentage_val = $cal_percentage_val;
            }
            $singlestarsData['first_star'] = $first_star;
            $singlestarsData['second_star'] = $second_star;
            $singlestarsData['three_star'] = $three_star;
            $singlestarsData['four_star'] = $four_star;
            $singlestarsData['five_star'] = $five_star;
            $singlestarsData['totalStarVal'] = $totalStarVal;
            $singlestarsData['total_star_ratings'] = $total_star_ratings;
            $singlestarsData['cal_percentage_val'] = $cal_percentage_val;
            // car star ratings
            // print_r($singlestarsData); die();
            $data['singlestarsData'] = $singlestarsData;
            $data['single_product_data'] = $this->Home_model->get_product_by_id($id);
            $data['product_image_data'] = $this->Home_model->get_product_image_by_id($id);
            $data['related_product_data'] = $this->Home_model->get_product_byCat_id($data['single_product_data'][0]->cat_id);
            $this->load->view('elements/front_topbar',$data);
            $this->load->view('elements/navbar',$data);
            $this->load->view('elements/audio_popup',$data);
            $this->load->view('product_detail',$data);
            $this->load->view('elements/front_footer',$data);
        }  
        public function add_cart()
        {
            $data = array(
                "id"  => $_POST["product_id"],
                "name"  => $_POST["product_name"],
                "qty"  => $_POST["quantity"],
                "price"  => $_POST["product_price"],
                'options' => array('product_image' => $_POST["product_image"],
                    'product_price_single'=> $_POST["product_price_single"])
            );
            $this->cart->insert($data); //return rowid 
        }
        public function cart()
        {
            $data['userData'] = json_decode(json_encode($this->userData), True);
            $data['categories_data_for_nav'] = $this->Home_model->get_nav_CategoriesData();
            $data['user_wish_list'] = $this->Home_model->get_wishlist_by_userId($data['userData']['id']);
            // foreach($this->cart->contents() as $product){
            // $product['id'];
            // $rel_sub_categories[] = $this->Home_model->getSubCatIdFromProduts($product['id']);
            // }
            $this->load->view('elements/front_topbar',$data);
            $this->load->view('elements/navbar',$data);
            $this->load->view('elements/audio_popup',$data);
            $this->load->view('cart',$data);
            $this->load->view('elements/front_footer',$data);
        }
        public  function remove_cart_item()
        {
            $row_id = $_POST["row_id"];
            $data = array(
                'rowid'  => $row_id,
                'qty'  => 0 );
            $response = $this->cart->update($data);
            echo json_encode($response);
        }
        public  function update_cart_item()
        {
            $row_id = $_POST["row_id"];
            foreach ($this->cart->contents() as $cart_item) {
                if($cart_item['rowid'] == $row_id){
                   $price_each =  $cart_item['options']['product_price_single'];
               }
           }
           $quantity = $_POST["quantity"];
           $product_new_price = $price_each * $quantity ; 
           $data = array(
            'rowid'  => $row_id,
            'qty'  => $quantity ,
            "price"  => $product_new_price,
        );
           $response = $this->cart->update($data);
           echo json_encode($response);
       }
       public function checkout()
       {
        $data['categories_data_for_nav'] = $this->Home_model->get_nav_CategoriesData();
        $data['user_wish_list'] = $this->Home_model->get_wishlist_by_userId($data['userData']['id']);
        $data['userData'] = json_decode(json_encode($this->userData), True);
        if($data['userData']){
            if($this->cart->contents()){
                $this->load->view('elements/front_topbar',$data);
                $this->load->view('elements/navbar',$data);
                $this->load->view('elements/audio_popup',$data);
                $this->load->view('checkout',$data);
                $this->load->view('elements/front_footer',$data);
            } else{
                redirect('home');
            }
        }else{
            redirect('login');
        }
    }
    public function confirm_order()
    {
        $data['userData'] = json_decode(json_encode($this->userData), True);
            // echo $data['userData']['email']; die();
        foreach($this->cart->contents() as $items)
        {
              $product_ids[] = $items['id'];
              $total_price += $items["price"];
              $product_quantity[] = $items["qty"];
        } 
        $user_booking_data = array(
            'customer_name' => $this->input->post('name'),
            'customer_phone' => $this->input->post('ph_number'),
            'state_shipping' => $this->input->post('province'),
            'city' => $this->input->post('city'),
            'city_shipping' => $this->input->post('area'),
            'address_shipping' => $this->input->post('address'),
            'area_house' => $this->input->post('location_name'),
            'lat' => $this->input->post('lat'),
            'long' => $this->input->post('long'),
            'user_id' =>  $data['userData']['id'],
            'product_id' => implode(',',$product_ids),
            'product_name' => implode(',',$product_quantity),
            'total_amount' => $total_price+80,
            'customer_email' => $data['userData']['email'],
            'order_status' => 0,
            'trans_date' => date('Y-m-d')
        );
             // print_r($user_booking_data); die();
          $res = $this->Home_model->addBooking($user_booking_data);
          $invoice_number = 1000 + $res;
          $invoice_number_sec = 'PK-'.$invoice_number;
          $add_invoice_number = $this->Home_model->updateBooking(array('invoice_id' => $invoice_number_sec,
            'transaction_id' => $invoice_number,
            'reference_no' => $invoice_number_sec,
        ), $res);
          if($res){
            $this->cart->destroy();
            $this->session->set_flashdata('success', 'Your Order has been posted , thanks for order.');
            redirect('home/deposit_slip/'.$res);
        } else{
         $this->session->set_flashdata('success', 'Something Went wrong please Try again.');
         redirect('home/checkout');
        }
        }
        public function deposit_slip($id)
        {

            $data['categories_data_for_nav'] = $this->Home_model->get_nav_CategoriesData();
            $data['user_wish_list'] = $this->Home_model->get_wishlist_by_userId($data['userData']['id']);
            $data['userData'] = json_decode(json_encode($this->userData), True);
            if($data['userData']){
                $data['order_data'] = $this->Home_model->get_order_by_id($id);
                $product_ids = $data['order_data']['product_id'];
                $product_id_array =  explode(',', $product_ids);
                for($i=0 ; $i<count($product_id_array); $i++){
                    $ordered_product_data[] = $this->Home_model->get_product_by_id($product_id_array[$i]);
                }
                $data['ordered_product_data'] = $ordered_product_data;
                $this->load->view('elements/front_topbar',$data);
                $this->load->view('elements/navbar',$data);
                $this->load->view('elements/audio_popup',$data);
                $this->load->view('deposit_slip',$data);
                $this->load->view('elements/front_footer',$data);
            }else{
                redirect('login');
            }
        }
        public function autocompleteAjax() {
          $result = $this->Home_model->selectStation($this->input->get("term"));
          function arrayTo_autocomplete($key)
          {
            $nameKey = ((!empty($key->title))? $key->title.' ':'');
            $nameKey1 .= ''.$key->id.'';
            $nameKey3 .= ((!empty($key->price))?$key->price.'':'');
            return array("label1"=>$nameKey,"label2"=>$nameKey1,"label4"=>$nameKey3,"value"=>$key->description  ,"id"=>$key->id);
        }
        $result = array_map('arrayTo_autocomplete', $result);
        echo json_encode($result);
        }
        public function searched_product()
        {
            $data['categories_data_for_nav'] = $this->Home_model->get_nav_CategoriesData();
            $data['user_wish_list'] = $this->Home_model->get_wishlist_by_userId($data['userData']['id']);
            $data['userData'] = json_decode(json_encode($this->userData), True);
            if($data['userData'])
            {
                $data['user_wish_list'] = $this->Home_model->get_wishlist_by_userId($data['userData']['id']);
            }
            $searched_term = $this->input->get('luxury_homes');
            $id = $this->input->get('reference_no');
            $data['single_product_data'] = $this->Home_model->get_product_by_id($id);
            $data['product_image_data'] = $this->Home_model->get_product_image_by_id($id);
            $data['related_product_data'] = $this->Home_model->get_product_byCat_id($data['single_product_data'][0]->cat_id);
            $this->load->view('elements/front_topbar',$data);
            $this->load->view('elements/navbar',$data);
            $this->load->view('elements/audio_popup',$data);
            $this->load->view('product_detail',$data);
            $this->load->view('elements/front_footer',$data);
        } 
        public function place_audio_order(){
            $userData = json_decode(json_encode($this->userData), True);
            if($userData){
               if(isset($_FILES['file'])){
                  $upload_path = 'assets/uploads/images/';
                  if (!empty($_FILES['file']['name']) && $_FILES['file']['error'] == 0) {
                    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $file_name = time().str_replace(' ','_',$_FILES['file']['name']).$ext;
                    move_uploaded_file($_FILES['file']['tmp_name'], $upload_path . $file_name);
                    $slider_image =time().str_replace(' ','_',$_FILES['file']['name']).$ext;
                    $data = array("audio" => $slider_image,
                        "user_id" => $userData['id'] ,
                        "cur_date" => date('Y-m-d') );
                    $result = $this->Home_model->insertAudio_order($data);
                }
            }
        }
        }

        public function add_to_wishlisht()
        {
            $user = json_decode(json_encode($this->userData), True);

            if($user){
                $product_id = $this->input->get('product_id');
                $response = $this->Home_model->check_wishlish_product($product_id , $user['id']); // check if already added 
                // print_r($response); die();
                if(empty($response)){
                    // echo 'here'; die();
                    $wishlist = array('user_id' => $user['id'],
                        'product_id' => $product_id,
                        'cur_date' => date('Y-m-d')
                    );
                    $res = $this->Home_model->add_wishlish($wishlist);
                }
                redirect('home/product_detail/'.$product_id);
            } else {
             redirect('login'); 
         }
        } 
        public function load_cart()
        {
            $data['userData'] = json_decode(json_encode($this->userData), True);
            $data['categories_data_for_nav'] = $this->Home_model->get_nav_CategoriesData();
            $data['user_wish_list'] = $this->Home_model->get_wishlist_by_userId($data['userData']['id']);
            $this->load->view('cart',$data);
        }
        public function commentAdd()
        {
            $error = '';
            $comment_name = '';
            $comment_content = '';
            $parent_comment_id = $this->input->post('comment_id');
            if($parent_comment_id==''){
                $parent_comment_id = 0;
            }
            $commetData = array(
                'cat_id' => 3,
                'product_id' => $this->input->post('product_id'),
                'user_id' => 0,
                'parent_comment_id' => $parent_comment_id,
                'product_ratings' => $this->input->post('product_ratings'),
                'comment_sender_name' => $this->input->post('comment_name'),
                'user_email' => $this->input->post('comment_email'),
                'comment' => $this->input->post('comment_content')
            );
            if($this->Home_model->saveCommentData($commetData)){
                $data = array(
                    'error'  => "Comment Successfully posted and it will show when admin is approved."
                );
                echo json_encode($data);
            }
            else{
                $data = array(
                    'error'  => "something went wrong"
                );
                echo json_encode($data);
            }
        }
        public function fetchComment() 
        {
            $product_id = $this->input->post('product_id');
            $getCommentData = $this->Home_model->getCommentDataByID($product_id);

            for ($i = 0; $i < count($getCommentData); $i++) {
                $singleCommentData = array();
                $singleCommentData = $getCommentData[$i];
                $commentID = $getCommentData[$i]['id'];
                $singleCommentData['replyComments'] = $this->Home_model->fetchReplyComment($commentID);
                $userCommentsData[] = $singleCommentData;
            }

            if (empty($userCommentsData)) {
                $response = array("success" => "0", "message" => "failed", "reason" => "Opps,something went wrong");
            } else {
                $response = array("success" => "1", "message" => "success", "yachtsCommentData" => $userCommentsData);
            }
            echo json_encode($response);
            exit;
        }
         public  function checkCoupon()
        {
            $coupon_code = $_POST["coupon_code"];
            $result = $this->Home_model->get_coupon_code($coupon_code);
            if($result){
                $discount = array(
                            'user_copon_amount' =>$result[0]['discount_code']
                                );
                $this->session->set_userdata($discount);
                $data = array('success'=>'1',
                                'data'=>$result);
            }else{
                $data = array('success'=>'0',
                          'data'=>$result);
            }
            echo json_encode($data);
            exit;
        }
}