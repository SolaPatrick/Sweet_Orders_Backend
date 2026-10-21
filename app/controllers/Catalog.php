<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/** Product catalog (FR2). Pages: C1 Home, C2 Menu, C3 Product details. */
class Catalog extends MY_Api_Controller
{
    public function categories()   { $this->planned('List categories'); }
    public function products()     { $this->planned('List and search products'); }
    public function product($id)   { $this->planned('Product details with size, flavor and frosting options', ['id' => $id]); }
}
