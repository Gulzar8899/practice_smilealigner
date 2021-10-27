<?php
    /**
     * model Name: Home_model
     * Description: front end Home_model
     * @author Muhammad Irfan Aslam
     * Created date: 2020-06-02
     */
    class Home_model extends CI_Model {
        function __construct() 
        {
            parent :: __construct();
        }
    function getMemberData($email)
    {
        $this->db->select("*");
        $this->db->from('users'); 
        $this->db->where('email', $email);
        $q = $this->db->get();
        return $q->result_array();
    }
    function get_users_user_id()
    {
        $this->db->select("*");
        $this->db->from('users'); 
        $this->db->where('user_type_id', '2');
        $this->db->where('is_active', 1);
        $q = $this->db->get();
        return $q->result();
    }
    function addBooking($invoice_data) {
        $this->db->insert('invoices', $invoice_data);
        return $this->db->insert_id();
    }
    
    function updateBooking($invoice_data, $invoice_id) {
        $this->db->where('id', $invoice_id)
        ->update('invoices', $invoice_data);
        return $this->db->affected_rows();
    }
    function get_user($id)
    {
        $this->db->select("*");
        $this->db->from('users'); 
        $this->db->where('id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    function get_order_by_invoice_id($referenceNo) {
        $result = $result = $this->db->select('*')
        ->from('invoices')
        ->where('transaction_id', $referenceNo)
        ->limit(1)
        ->get();
        if ($result) {
            return $result->row_array();
        } 
        else {
            return array();
        }
    }  
    function chkIpExist($ip)
    {
        $this->db->select("*");
        $this->db->from('usersdetails'); 
        $this->db->where('ip', $ip);
        $q = $this->db->get();
        return $q->result();
    }
    
    function getSliderData()
    {
        $this->db->select("*");
        $this->db->from('slider'); 
        $this->db->where('status',1);
        $this->db->order_by('id','DESC');
        $q = $this->db->get();
        return $q->result_array();
    }
    
    function getCategoriesData()
    {
        $this->db->select("*");
        $this->db->from('categories'); 
        $this->db->where('status',1);
        $this->db->order_by('id','DESC');
        $q = $this->db->get();
        return $q->result_array();
    }
    function get_product_byCat_id($id)
    {
        $this->db->select("*");
        $this->db->from('products'); 
        $this->db->where('status', '1');
        $this->db->where('cat_id', $id);
        $q = $this->db->get();
        return $q->result_array();
    }
    function get_product_by_id($id)
    {
        $this->db->select("*");
        $this->db->from('products'); 
        $this->db->where('id', $id);
        $q = $this->db->get();
        return $q->result();
    } 
    function get_product_image_by_id($id)
    {
        $this->db->select("*");
        $this->db->from('photos'); 
        $this->db->where('reference_no', $id);
        $q = $this->db->get();
        return $q->result();
    }
        function get_order_by_id($referenceNo) {
         $result = $this->db->select('*')
         ->from('invoices')
         ->where('id', $referenceNo)
         ->limit(1)
         ->get();
         if ($result) {
            return $result->row_array();
        } 
        else {
            return array();
        }
    }
    function selectStation($searchKey) {
        $this->db->or_like('title',$searchKey,'after');
        $this->db->or_like('description',$searchKey,'after');
        $this->db->limit('15');
        return $this->db->get("products")->result();
    }
    function insertAudio_order($data) {
        $this->db->insert('audio_orders', $data);
        return $this->db->insert_id();
    }
    function add_wishlish($invoice_data) {
        $this->db->insert('wishlist', $invoice_data);
        return $this->db->insert_id();
    }
    function get_wishlish_by_product_id($id)
    {
        $this->db->select("*");
        $this->db->from('wishlist'); 
        $this->db->where('product_id', $id);
        $q = $this->db->get();
        return $q->result();
    } 
    function get_wishlist_by_userId($id)
    {
        $this->db->select("*");
        $this->db->from('wishlist'); 
        $this->db->where('user_id', $id);
        $q = $this->db->get();
        return $q->result_array();
    }
    function get_nav_CategoriesData()
    {
        $this->db->select("*");
        $this->db->from('categories'); 
        $this->db->where('status',1);
        $this->db->order_by('id','DESC');
        $this->db->limit(4);
        $q = $this->db->get();
        return $q->result_array();
    }
    function get_on_sale_products()
    {
        $this->db->select("*");
        $this->db->from('products'); 
        $this->db->where('status', '1');
        $this->db->where('on_sale', 1);
        $this->db->order_by('id','DESC');
        $this->db->limit(4);
        $q = $this->db->get();
        return $q->result_array();
    }
    function saveCommentData($commentData) {
        $this->db->insert("comments", $commentData);
        return $this->db->insert_id();
    }
      function getCommentDataByID($product_id){
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->where('product_id', $product_id);
        $this->db->where('cat_id', 3);
        $this->db->where('parent_comment_id', 0);
        $this->db->where('status', 1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
     function fetchReplyComment($parent_id){
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->where('parent_comment_id', $parent_id);
        $this->db->where('cat_id', 3);
        $this->db->where('status', 1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    function getProductStar($star_val,$cat_id,$product_id){
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->where('product_ratings', $star_val);
        $this->db->where('cat_id', $cat_id);
        $this->db->where('product_id', $product_id);
        $this->db->where('status', 1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->num_rows();
    }
    function check_wishlish_product($id , $user_id)
    {
        $this->db->select("*");
        $this->db->from('wishlist'); 
        $this->db->where('product_id', $id);
        $this->db->where('user_id', $user_id);
        $q = $this->db->get();
        return $q->result();
    } 
    function get_coupon_code($id)
    {
        $this->db->select("*");
        $this->db->from('coupon_codes'); 
        $this->db->where('coupon_code', $id);
        $q = $this->db->get();
        return $q->result_array();
    }
    function getSubCatIdFromProduts($product_id)
    {
        $this->db->select("sub_cat_id");
        $this->db->from('products'); 
        $this->db->where('id',$product_id);
        $q = $this->db->get();
        return $q->result_array();
    }
    function fatchsubCatBy_catId($id)
    {
        $this->db->select("*");
        $this->db->from('sub_categories'); 
        $this->db->where('cat_id', $id);
        $q = $this->db->get();
        return $q->result_array();
    }
    function get_product_bySubCat_id($id)
    {
        $this->db->select("*");
        $this->db->from('products'); 
        $this->db->where('status', '1');
        $this->db->where('sub_cat_id', $id);
        $q = $this->db->get();
        return $q->result_array();
    }

     // Get All Countries
    function getAllCountries()
    {
        $this->db->select('*');
        $res = $this->db->get('countries');
        return $res->result();
    }

    // Get All Countries
    function getAllStates()
    {
        $this->db->select('*');
        $res = $this->db->get('states');
        return $res->result();
    }

    // Get All Countries
    function getAllCities()
    {
        $this->db->select('*');
        $res = $this->db->get('cities');
        return $res->result();
    }
}