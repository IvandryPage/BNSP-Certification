# JUNIOR WEB PROGRAMMER // CERTIFICATION PROJECT

<div align="center">
  <p>✦ <i>Official web application developed for the Junior Web Programmer Certification standards.</i> ✦</p>
</div>

---

### // OVERVIEW
This system was engineered to meet the technical requirements of the **Junior Web Programmer Certification**. It demonstrates core competency in building functional, secure, and data-driven web applications using the PHP ecosystem.

The project focuses on implementing robust CRUD operations, session management, and relational database integration within a localized server environment.

### // TECHNICAL STACK
* **Server-Side** | PHP (Procedural/OOP)
* **Data Layer** | MySQL / MariaDB (Relational)
* **Environment** | XAMPP (Apache Server)
* **Frontend** | HTML5, CSS3, JavaScript

### // DATABASE PROVISIONING
To initialize the system's data layer, follow these protocols:

1. **Access phpMyAdmin** via your local XAMPP dashboard.
2. **Create a New Schema** (Recommended name: `db_certification` or as preferred).
3. **Import Source**: Locate the `.sql` file in the repository and execute the import.
4. **Configuration**: Synchronize the connection logic in `includes/db.php`:
   ```php
   define("DB_NAME", "your_database_name");
