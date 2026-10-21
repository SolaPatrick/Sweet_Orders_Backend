<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/** Page: C14 Contact. */
class Contact extends MY_Api_Controller
{
    public function send() { $this->planned('Send a contact form message to the café'); }
}
