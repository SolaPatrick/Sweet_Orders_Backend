<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * GET /api/health: shows that the API runs and can reach MySQL.
 */
class Health extends MY_Api_Controller
{
    public function index()
    {
        $database = 'not configured';
        if (getenv('DB_NAME')) {
            try {
                $this->call->database();
                $database = $this->db->raw('SELECT 1')->fetchColumn() ? 'connected' : 'error';
            } catch (Throwable $e) {
                $database = 'error';
            }
        }
        $this->json([
            'status'   => 'ok',
            'app'      => "Sweet Orders Online API",
            'database' => $database,
            'time'     => date('c'),
        ]);
    }
}
