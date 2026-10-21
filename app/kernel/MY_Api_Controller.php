<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * Base controller for every /api route.
 *
 * Sends the API security and CORS headers so the React app (Vite on
 * http://localhost:5173) can call the API, and answers in JSON.
 */
class MY_Api_Controller extends Controller
{
    public function before_action()
    {
        $this->security_headers->apply_api();
    }

    protected function json($data, int $code = 200)
    {
        http_response_code($code);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

    /**
     * Placeholder answer for a route whose logic is built in the development
     * phase. It confirms the route, method and controller are wired up.
     */
    protected function planned(string $feature, array $params = [])
    {
        $this->json([
            'route'   => strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET') . ' ' . parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH),
            'handler' => static::class . '::' . debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'],
            'feature' => $feature,
            'params'  => (object) $params,
            'status'  => 'route ready',
        ]);
    }
}
