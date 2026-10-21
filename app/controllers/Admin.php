<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/** Admin panel (FR8). Pages: A1 to A9. */
class Admin extends MY_Api_Controller
{
    public function dashboard()               { $this->planned('A1 Dashboard: orders today, sales, today\'s schedule'); }

    public function orders()                  { $this->planned('A2 Orders list with filters'); }
    public function order($id)                { $this->planned('A3 Order details', ['id' => $id]); }
    public function order_status($id)         { $this->planned('A3 Change order status and notify the customer', ['id' => $id]); }

    public function products()                { $this->planned('A4 Products list'); }
    public function product_create()          { $this->planned('A5 Add product'); }
    public function product($id)              { $this->planned('A5 Product for editing', ['id' => $id]); }
    public function product_update($id)       { $this->planned('A5 Save product', ['id' => $id]); }
    public function product_delete($id)       { $this->planned('A4 Delete product', ['id' => $id]); }

    public function categories()              { $this->planned('A6 Categories list'); }
    public function category_create()         { $this->planned('A6 Add category'); }
    public function category_update($id)      { $this->planned('A6 Rename or reorder category', ['id' => $id]); }
    public function category_delete($id)      { $this->planned('A6 Delete category', ['id' => $id]); }

    public function slots()                   { $this->planned('A7 Time slots calendar'); }
    public function slots_generate()          { $this->planned('A7 Create slots for a date range'); }
    public function slot_update($id)          { $this->planned('A7 Change slot capacity or time', ['id' => $id]); }
    public function slot_delete($id)          { $this->planned('A7 Delete slot', ['id' => $id]); }
    public function block_date()              { $this->planned('A7 Block or reopen a date'); }

    public function payments()                { $this->planned('A8 Payments list'); }
    public function notifications()           { $this->planned('A9 Email and SMS log'); }
}
