# AliNotes

**AliNotes** is a lightweight web application built with pure PHP (no frameworks) to simplify product ordering and shipping logistics for a small distribution company.

It was originally created to replace manual paperwork and improve internal processes, especially those related to client product requests and transportation permits required by the Port of La Guaira.

---

## 📦 Features

- Add and manage product requests (client orders).
- Mark products as invoiced and generate a **shopping list** of pending items.
- Generate **transportation permits** with complete information:
  - Client
  - Shopping list
  - Driver
  - Vehicle
  - Type of permit
- Export permits as PDFs and print as many copies as needed.
- Modules to manage:
  - Drivers
  - Vehicles
  - Clients

---

## ⚙️ Tech Stack

- **PHP (no framework)**
- **MySQL**
- **HTML/CSS**
- **DOMPDF** (PDF generation)

---

## 🚀 Installation

1. Upload the project files to your PHP server (e.g. Apache or Nginx with PHP support).
2. Create a MySQL database and import the structure (SQL file if included).
3. Configure your database connection in the config file (e.g. `/includes/connection.php` or similar).
4. Access the system via your browser.

> ⚠️ No need for Composer or Laravel. Just upload and configure the database.

---

## 📋 Usage

1. Create a product request from a client.
2. Add products and mark them as invoiced when ready.
3. Generate a **shopping list** for remaining items.
4. Go to the "Permits" section, choose:
   - Permit type
   - Shopping list
   - Driver
   - Vehicle
5. Generate and print the PDF permit.

---

## 📄 License

This project is for personal and educational use. No license has been applied.

---

## ✍️ Author

**Luis Salazar**  
[GitHub Profile](https://github.com/Luise1001)
