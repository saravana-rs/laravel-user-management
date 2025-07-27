````markdown
# 🧑‍💼 Laravel User Management System

A simple Laravel-based **User Management System** featuring:

- ✅ Role-based access control (Admin & User)
- 🏠 Home and optional Work address input
- 🔐 User authentication using Blade templates
- 📦 REST API to fetch user profiles
- 🚨 Validation with toaster-style alerts
- 💡 Pure CSS styling without JavaScript or npm

---

## 🚀 Features

- User registration and login
- Role-based login: Admin vs User
- Admin: View and edit all users (excluding other admins)
- User: View and edit only their own profile
- REST API: `GET /api/users/{user_id}`
- Home address is mandatory; work address is optional
- Blade-based UI with clean CSS-only design

---

## 🛠️ Tech Stack

| Tool           | Description                     |
|----------------|---------------------------------|
| Laravel        | Backend framework               |
| Blade          | Templating engine               |
| MySQL          | Database                        |
| Pure CSS       | Styling with no frontend build  |

---

## 📂 Project Structure

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── API/
│   │   │   └── UserController.php
│   │   ├── AdminController.php
│   │   └── UserController.php
│   └── Requests/
│       └── UserRequest.php
├── Traits/
│   └── ApiResponder.php

resources/
├── views/
│   ├── admin/
│   │   ├── dashboard.blade.php
│   │   └── edit.blade.php
│   ├── users/
│   │   ├── dashboard.blade.php
│   │   └── edit.blade.php
│   ├── auth/
│   │   ├── login.blade.php
│   │   └── register.blade.php
│   └── layouts/
│       ├── app.blade.php
│       └── partials/
│           ├── flash.blade.php
│           └── nav.blade.php

routes/
├── api.php
└── web.php
````

---

## 🔧 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/user-management.git
cd user-management
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your database credentials.

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Seed the Admin User (Run Once)

```bash
php artisan db:seed
```

This will create a default admin user:

* **Email**: `admin@example.com`
* **Password**: `admin@123`
* **Role**: `admin`

> ⚠️ **Important**: Run this seeder only once to avoid duplicate admin entries.

### 6. Start Development Server

```bash
php artisan serve
```

Visit: [http://localhost:8000](http://localhost:8000)

---

## 👤 User Roles

| Role  | Permissions                            |
| ----- | -------------------------------------- |
| Admin | View/Edit all users (excluding admins) |
| User  | View/Edit only their own profile       |

---

## 📬 REST API

### Endpoint

```http
GET /api/users/{user_id}
```

### Sample Response

```json
{
  "status_code": 200,
  "message": "User details",
  "data": {
    "user_name": "home_page",
    "mobile": "9345345352",
    "dob": "14/01/1990",
    "gender": "Male",
    "Address": [
      {
        "address_type": "home",
        "address1": {
          "door/street": "1st Main Rd, Rajiv Nagar",
          "landmark": "Zxy building",
          "city": "Chennai",
          "state": "Tamilnadu",
          "country": "India"
        },
        "primary": "No"
      },
      {
        "address_type": "work",
        "address2": {
          "door/street": "West Cross Rd, Chinmayi Nagar",
          "landmark": "White Cross building",
          "city": "Brooklyn",
          "state": "New York",
          "country": "USA"
        },
        "primary": "No"
      }
    ]
  }
}
```

---

## 📋 Validation Rules

| Field        | Rules                        |
| ------------ | ---------------------------- |
| `user_name`  | Required                     |
| `mobile`     | Required (10 digits)         |
| `dob`        | Required                     |
| `gender`     | Required (Male/Female/Other) |
| Home Address | Required                     |
| Work Address | Optional                     |

---
