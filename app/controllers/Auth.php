<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/** Accounts and roles (FR1). Pages: C8 Login, C9 Register, C12 Profile. */
class Auth extends MY_Api_Controller
{
    public function register()  { $this->planned('Create a customer account'); }
    public function login()     { $this->planned('Log in and receive JWT access and refresh tokens'); }
    public function refresh()   { $this->planned('Exchange a refresh token for new tokens'); }
    public function logout()    { $this->planned('Revoke the refresh token'); }
    public function me()        { $this->planned('Get the logged-in user'); }
    public function update_me() { $this->planned('Update name, phone or password'); }
}
