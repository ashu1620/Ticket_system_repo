# Ticket System

A Laravel-based web application for managing tickets and support requests. The project uses Laravel's Blade templating engine for the frontend and MySQL as the backend database.

---

## Features

* User authentication (login/register)
* Create, view, and update tickets
* Blade templating for dynamic, clean UI
* Responsive design with basic CSS
* MySQL database integration

---

## 🚀 Tech Stack

| Layer           | Technology          |
| --------------- | ------------------- |
| Backend         | Laravel(PHP)        |
| Frontend        | Blade, HTML/CSS, JS |
| Database        | MySQL               |
| Version Control | Git + GitHub        |

---

## Project Structure

```
/app         → Application logic (controllers)
/resources   → Views (Blade templates)
/routes      → Route definitions
/database    → Migrations
/public      → Publicly accessible files
```

---

## ⚙️ Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/ashu1620/Ticket_system_repo.git
   cd Ticket_system_repo
   ```

2. **Install dependencies**

   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Copy the `.env` file and set up your database**

   Update `.env` with your database credentials:

   ```
   DB_DATABASE= your_db_name
   DB_USERNAME= your_db_user
   DB_PASSWORD= your_db_password
   ```

4. **Run migrations**

   ```bash
   php artisan migrate
   ```

5. **Start the development server**

   ```bash
   php artisan serve
   ```

   Visit `http://localhost:8000` in your browser.

---

## 🛠️ Useful Commands

```bash

php artisan route:list             # Show all routes
```

---

---

