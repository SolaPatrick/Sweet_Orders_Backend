<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/** Online ordering and tracking (FR3, FR7). Pages: C4 Cart, C5 Checkout, C10 My Orders, C11 Order details. */
class Orders extends MY_Api_Controller
{
    public function create()      { $this->planned('Place an order and open the PayMongo checkout'); }
    public function index()       { $this->planned('My orders'); }
    public function show($id)     { $this->planned('Order details and status timeline', ['id' => $id]); }
    public function pay($id)      { $this->planned('Open a new payment page for an unpaid order', ['id' => $id]); }
    public function cancel($id)   { $this->planned('Cancel an unpaid order', ['id' => $id]); }
}
