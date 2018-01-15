<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->session->unset_userdata('category_id');
        $data['hero_header'] = TRUE;
        $data['main_content'] = $this->load->view('front_end_view/cart/view_cart', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }

    public function add_to_cart()
    {
        $this->session->set_userdata('cart_counter',$this->session->userdata('cart_counter')+1);
        $data = array(
            'id'      => $this->input->post('product_id'),
            'qty'     => $this->input->post('quantity'),
            'price'   => $this->input->post('product_price'),
            'name'    => $this->input->post('product_name'),
            'mcp_id' => $this->input->post('mcp_id'),
            'mcp_name' => $this->input->post('mcp_name'),
            'product_photo' => $this->input->post('product_photo')
        );

        $this->cart->insert($data);

        redirect(base_url().'product');
    }

    function remove($rowid) {
        if ($rowid==="all"){
            $this->session->set_userdata('cart_counter','0');
            $this->cart->destroy();
        }else{
            $this->session->set_userdata('cart_counter',$this->session->userdata('cart_counter')-1);
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        redirect('cart');
    }
    function update_cart(){

        $cart_info = $_POST['cart'] ;


        foreach( $cart_info as $id => $cart)
        {
            $rowid = $cart['rowid'];
            $name = $cart['name'];
            $price = $cart['price'];
            $id = $cart['id'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array(
                'rowid'      => $rowid,
                'qty'     => $qty,
                'price'   => $price,
                'amount' => $amount
            );

            $this->cart->update($data);
        }
        redirect('cart');
    }
    function check_out()
    {
        $this->session->unset_userdata('category_id');
        $data['hero_header'] = TRUE;
        $data['main_content'] = $this->load->view('front_end_view/cart/view_check_out', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }

    function submit_product()
    {
        $data['name']=$this->input->post('name');
        $data['email']=$this->input->post('email');
        $data['phone_number']=$this->input->post('phone_number');
        $data['address']=$this->input->post('address');



        $cart_info = $_POST['cart'] ;
//      print_r($cart_info);


        $invoice_id=$this->cart_model->add_into_invoice($data['name']);

        $this->session->set_userdata('printCart',$cart_info);
        $this->session->set_userdata('printUser',$data);
        $this->session->set_userdata('invoice_id',$invoice_id);

        foreach( $cart_info as $id => $cart)
        {
            $name = $cart['name'];
            $price = $cart['price']*$cart['qty'];
            $id = $cart['id'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $mcp_id=$cart['mcp_id'];
            $mcp_name=$cart['mcp_name'];
            $data = array(
                'product_id'=>$id,
                'mcp_id'=>$mcp_id,
                'quantity'     => $qty,
                'total_price'   => $price,
                'name' => $data['name'],
                'email'=>$data['email'],
                'phone_number'=>$data['phone_number'],
                'address'=>$data['address'],
                'tbl_invoice_invoice_id'=>$invoice_id
            );

            $this->cart_model->add_product_in_cart($data);
        }
        $this->session->set_userdata('cart_counter','0');
        $this->cart->destroy();
        redirect('cart/finish');
    }
    public function finish()
    {
        $this->session->unset_userdata('category_id');
        $data['hero_header'] = TRUE;
        $data['main_content'] = $this->load->view('front_end_view/cart/view_cart_successful', $data, TRUE);
        $this->load->view('front_end_view/master',$data);
    }


}
