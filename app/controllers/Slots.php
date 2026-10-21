<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/** Pickup and delivery scheduling (FR4). Page: C5 Checkout. */
class Slots extends MY_Api_Controller
{
    public function index() { $this->planned('Time slots for a date, with capacity and lead time'); }
    public function dates() { $this->planned('Dates that still have open slots, and blocked dates'); }
}
