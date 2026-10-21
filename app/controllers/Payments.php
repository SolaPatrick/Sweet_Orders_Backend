<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/** Payment gateway (FR5). Pages: C6 Order confirmed, C7 Payment failed. */
class Payments extends MY_Api_Controller
{
    public function webhook() { $this->planned('PayMongo webhook: verify signature, mark order paid'); }
}
