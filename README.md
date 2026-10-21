# Sweet Orders Online: LavaLust API

Backend for Sweet Orders Online, the cake and pastry ordering site for Clayanna's Café.
Built on the LavaLust 4 PHP MVC framework. The React site is in `Sweet_Orders_Frontend`.

This stage covers the assignment's project setup and initial routes: LavaLust is configured,
connects to MySQL, allows the React app through CORS, and every API route the site map needs
is wired to a controller. Each route answers with a placeholder that names its handler and
feature; the real logic comes in the development phase. Framework docs: [LAVALUST.md](LAVALUST.md).

## Requirements

PHP 8.1 or newer with `pdo_mysql`, and MySQL or MariaDB (XAMPP includes both).

## Run locally

### Option A: PHP built-in server

```bash
cp .env.example .env     # set DB_USER and DB_PASSWORD, then create the database below
php lava serve           # http://localhost:3000
```

### Option B: XAMPP

1. Copy this folder to `C:\xampp\htdocs\sweet_orders_backend`.
2. Copy `.env.example` to `.env` and set `APP_URL=http://localhost/sweet_orders_backend`.
3. In the React app's `.env`, set `VITE_API_URL=http://localhost/sweet_orders_backend`.
4. Start Apache and MySQL in the XAMPP control panel.

### Database

Create an empty database named `sweet_orders` (Navicat or phpMyAdmin, or):

```sql
CREATE DATABASE sweet_orders CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Check it works: open `/api/health`. It should say `"database": "connected"`.

## Routes

All routes are in [app/config/routes.php](app/config/routes.php). `{id}` only matches numbers.

| Module | Method and path | Controller | Site map pages |
|---|---|---|---|
| Info | `GET /`, `GET /api`, `GET /api/health` | Home, Health | |
| Accounts (FR1) | `POST /api/auth/register`, `/login`, `/refresh`, `/logout`; `GET` and `PUT /api/auth/me` | Auth | C8, C9, C12 |
| Catalog (FR2) | `GET /api/categories`, `/api/products`, `/api/products/{id}` | Catalog | C1, C2, C3 |
| Scheduling (FR4) | `GET /api/slots`, `/api/slots/dates` | Slots | C5 |
| Ordering (FR3, FR7) | `POST /api/orders`; `GET /api/orders`, `/api/orders/{id}`; `POST /api/orders/{id}/pay`, `/cancel` | Orders | C4, C5, C10, C11 |
| Payments (FR5) | `POST /api/payments/webhook` | Payments | C6, C7 |
| Contact | `POST /api/contact` | Contact | C14 |
| Admin (FR8) | `GET /api/admin/dashboard` | Admin | A1 |
| | `GET /api/admin/orders`, `/orders/{id}`; `PUT /orders/{id}/status` | Admin | A2, A3 |
| | `GET`, `POST /api/admin/products`; `GET`, `PUT`, `DELETE /products/{id}` | Admin | A4, A5 |
| | `GET`, `POST /api/admin/categories`; `PUT`, `DELETE /categories/{id}` | Admin | A6 |
| | `GET /api/admin/slots`; `POST /slots/generate`, `/slots/block-date`; `PUT`, `DELETE /slots/{id}` | Admin | A7 |
| | `GET /api/admin/payments`, `/api/admin/notifications` | Admin | A8, A9 |

Example:

```bash
curl http://localhost:3000/api/products/12
# {"route": "GET /api/products/12", "handler": "Catalog::product", "feature": "...", "params": {"id": "12"}, "status": "route ready"}
```

Unknown routes return a JSON 404.

## What was configured

- `.env` drives the app URL, environment, database and allowed CORS origins (`CORS_ORIGINS`).
- `app/config/config.php`: base URL from `APP_URL`, Asia/Manila timezone, JSON error pages in `app/views/errors_json/`.
- `app/kernel/MY_Api_Controller.php`: base controller that sends the API and CORS headers and JSON responses.
- `public/index.php`: small fix so routes resolve when the project runs from an XAMPP subfolder.
