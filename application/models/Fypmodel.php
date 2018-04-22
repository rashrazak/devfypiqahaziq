<?php 

    class Fypmodel extends CI_Model{
        //register
        public function register_user( $fnamex, $addressx, $icppx, $hpx, $maybankx, $emailx , $passwordx,$city){
               
            $query = array(
            'emel' => $emailx,
            'password' => $passwordx,
            'fname' => $fnamex,
            'address' => $addressx,
            'hp' => $hpx,
            'icpp' => $icppx,
            'hp' => $hpx,
            'icpp' => $icppx,
            'maybankaccount' => $maybankx,
            'city'=> $city

            );  
            $this->db->insert('user', $query);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }
        public function register_sales( $idx){
            
                    //   $data = array(
                          
                    //       'userid' => $idx,
                    //       'tahun' => date("Y")
                          
                    //       );         
                    //   $this->db->insert('bulan',$data);
                     // $this->db->update('bulan',$data);
                      
          
        }
        //login
        public function get_user($emailx , $passwordx){
       
            $this->db->where('emel', $emailx);
            $this->db->where('password', $passwordx);
            $result = $this->db->get('user');
            if($result->num_rows() == 1){
                return $result->row(0)->id;
            } else {
                return false;
            }                       
        }
        public function upd8seller($user_id){
            $this->db->select('*');
            $this->db->where('id', $user_id);
            $query = $this->db->get('user');
            return $query->result();
        }
        public function upd8seller_confirm($data, $idx){
            $this->db->where('id',$idx);
            $this->db->update('user',$data);

        }
        //item
        public function ins_item($url,$item,$desc,$price,$id,$categ){
            $query = array(
                'userid'      => $id,
                'url'         => $url,
                'name'        => $item,
                'price'       => $price,
                'description' => $desc,
                'categ'       => $categ,
                'bought'      => 0,
                'sales'       => 0);
            
            $this->db->insert('items', $query);
            
            return true;
        }
        public function upd_item($url,$item,$desc,$price,$id,$categ){
            $query = array(
                'url'         => $url,
                'name'        => $item,
                'price'       => $price,
                'description' => $desc,
                'categ'       => $categ);

            $this->db->where('id',$id);
            $this->db->update('items', $query);
            
            return true;
        }
        public function hideitem($id){
            $query = array(
                'showpublic'         => 0
             );

            $this->db->where('id',$id);
            $this->db->update('items', $query);
            
            return true;
        }
        public function showitem($id){
            $query = array(
                'showpublic'         => 1
             );

            $this->db->where('id',$id);
            $this->db->update('items', $query);
            
            return true;
        }
        public function prepareItem($id){
            $query = array(
                'delivered'         => 'delivered'
             );

            $this->db->where('id',$id);
            $this->db->update('cart', $query);
            
            return true;
        }
        public function cancelItem($id,$reason){
            $query = array(
                'delivered'         => 'cannot',
                'reason'            => $reason
             );

            $this->db->where('id',$id);
            $this->db->update('cart', $query);
            
            return true;
        }
        public function del_item($id){

            $this->db->where('id',$id);
            $this->db->delete('items');
            return true;
        }
        public function del_cart($id){

            $this->db->where('id',$id);
            $this->db->delete('cart');
            return true;
        }
        public function read_item($user_id){

                $query 	= 'SELECT *'
                        . ' FROM `items`'
                        . ' WHERE `userid` = ?'
                        . ' ORDER BY price ASC';
                $bind 	= array( $user_id );		
                
                return $this->db->query( $query, $bind )->result_array();
        }
        public function read_item_customer($id){

            $query 	= 'SELECT *'
                    . ' FROM `items`'
                    . ' WHERE `id` = ?';
            $bind 	= array( $id );		
            
            return $this->db->query( $query, $bind )->result_array();
        }
        public function read_item_all(){

            $query 	= 'SELECT *'
                    . ' FROM `items`'
                    . ' WHERE `showpublic` = 1'
                    . ' ORDER BY bought DESC limit 10';		
            
            return $this->db->query( $query )->result_array();
        }
        public function read_item_allSearch(){

            $query 	= 'SELECT *'
                    . ' FROM `items`'
                    . ' WHERE `showpublic` = 1';		
            
            return $this->db->query( $query )->result_array();
        }
        public function read_item_update($user_id){

            $query 	= 'SELECT *'
                    . ' FROM `items`'
                    . ' WHERE `id` = ?'
                    . ' ORDER BY price ASC';
            $bind 	= array( $user_id );		
            
            return $this->db->query( $query, $bind )->result_array();
        }
        //customer
        public function checkCustomer($cust_email){
            $this->db->where("emailx",$cust_email); 
            $query = $this->db->get("cust_email");
            if ( !$query) {
                return 0;
            }else {
                return 1;
            } 
            
        }

        public function loginCustomer($cust_email){
            if( empty($cust_email) )
            {
                return array();
            }

            $query  = 'SELECT * FROM `cust_email`'
                    . ' WHERE `emailx` = ?';
            $bind   = array( $cust_email ); 
            return $this->db->query( $query, $bind )->row_array();
            
        }
        public function insertCustomer($user_data){
            $this->db->insert('cust_email', $user_data);
        }
        public function add_into_cart($cart){

            $query = array(
                'itemid' => $cart['id'],
                'email' => $cart['email'],
                'quantity' => $cart['quantity'],
                'status' => 'unpaid',
                'delivered' => 'undelivered'
            );
            $this->db->insert('cart', $query);
        }
        public function list_from_cart($email){
            $unpaid = 'unpaid';

            $query 	= 'SELECT a.*, b.*, a.`id` AS cartid'
            . ' FROM `cart` AS a'
            . ' INNER JOIN `items` AS b'
            . ' ON a.`itemid` = b.`id`'
            . ' WHERE a.`email` = ?'
            . ' AND a.`status` = ?'
            . ' ORDER BY a.`id` ASC';
            $bind 	= array( $email,$unpaid );	
            
            return $this->db->query( $query, $bind )->result();

        }
        public function paid_cart($email){
            $paid = 'paid';
            $query = array(
                'status'         => $paid
             );
            // $this->db->set('datebought', 'NOW()', FALSE);
            $this->db->where('email',$email);
            $this->db->update('cart', $query);
            
            return true;
        }
        public function getCompanyDetails($id){

            $query 	= 'SELECT *'
                    . ' FROM `user`'
                    . ' WHERE `id` = ?';
                    
                    $bind 	= array( $id );
            
            return $this->db->query( $query, $bind )->result_array();

        }
        //payment
        public function payment_receive($url,$items,$price,$email, $hp, $address){
           
            $query = array(
                'noitem'      => $items,
                'url'         => $url,
                'price'       => $price,
                'email'       => $email,    
                'hp'          => $hp,
                'address'     => $address,
                'paid'        => 0);


            $this->db->set('time', 'NOW()', FALSE);
            $this->db->insert('payment', $query);
            
            return true;

        }
        public function searchList($search){

            $this->db->select('*'); 
            $this->db->from('items');
            $this->db->join('user', 'user.id = items.userid');
            $this->db->where('items.showpublic',1);
            $this->db->like('items.name' , $search);
            $this->db->or_like('items.description' , $search);
            $this->db->or_like('user.city' , $search);
            $this->db->or_like('user.address' , $search);
            $this->db->order_by('bought desc');
            $query =$this->db->get();
            return $query->result_array();

        }
        public function historyList($email){

            $this->db->select('*'); 
            $this->db->from('payment');
            $this->db->where('email',$email);
            $query =$this->db->get();
            return $query->result_array();

        }
        public function recentBuyer( $user_id){
            $deliver = 'undelivered';
            $query 	= 'SELECT a.`name`, a.`price`, b.`email`, a.`url`, b.`id` '
            . ' FROM `items` as a'
            . ' LEFT JOIN `cart` as b'
            . ' ON a.`id` = b.`itemid`'
            . ' WHERE a.`userid` = ?'
            . ' AND b.`delivered` = ? ';
            $bind 	= array( $user_id, $deliver );

            return $this->db->query( $query, $bind )->result_array();
        }
        public function previousBuyer( $user_id){
            $deliver = 'delivered';
            $query 	= 'SELECT a.`name`, a.`price`, b.`email`, a.`url` '
            . ' FROM `items` as a'
            . ' LEFT JOIN `cart` as b'
            . ' ON a.`id` = b.`itemid`'
            . ' WHERE a.`userid` = ?'
            . ' AND b.`delivered` = ? ';
            $bind 	= array( $user_id, $deliver );

            return $this->db->query( $query, $bind )->result_array();
        }
        public function shopName($user_id){
            $this->db->select('fname');
            $this->db->where('id', $user_id);
            $query = $this->db->get('user');
            return $query->result_array();
        }

        public function signUp($url, $email, $password, $fname){
            $query = array(
                'name'      => $fname,
                'emailx'    => $email,
                'photourl'  => $url,
                'password' => $password,
                'type'     => 'manual');
            
            $this->db->insert('cust_email', $query);
            
            return true;
        }

        public function manualSelect($email){
            $query  = 'SELECT *'
                    . ' FROM `cust_email`'
                    . ' WHERE `emailx` = ?';
                    
                    $bind   = array( $email );
            
            return $this->db->query( $query, $bind )->row_array();
        }

        public function manualUpdate($url,$name,$email,$id,$password){
            $query = array(
                'photourl'         => $url,
                'name'        => $name,
                'emailx'       => $email,
                'password'       => $password);

            $this->db->where('id',$id);
            $this->db->update('cust_email', $query);
            
            return true;
        }

        
    }
       