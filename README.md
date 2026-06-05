# InstaLook

## Project Overview

InstaLook is a web application developed as a full-stack academic project. The platform allows users to browse products, manage a shopping cart, place orders, and view personalized outfits.

The project also includes a Java desktop console application connected to the same MariaDB database. This application allows users to create and manage outfits that are later displayed in the web platform.

---

## Technologies Used

### Backend

* PHP 8
* MariaDB
* PDO
* Apache

### Frontend

* HTML5
* CSS3
* JavaScript

### Desktop Application

* Java 17
* JDBC
* MariaDB Java Driver

### Infrastructure

* Ubuntu Server
* Docker
* Cron Jobs

---

## Main Features

### User Management

* User registration
* User login
* Session management
* Protected dashboard

### Product Catalog

* Dynamic product listing from database
* Product images
* Product descriptions
* Product stock management

### Shopping Cart

* Add products to cart
* View cart contents
* Order confirmation process

### Administration Panel

Administrator can:

* Create products
* Edit products
* Delete products
* Upload product images
* Manage catalog content

### Outfit Management

A Java console application allows users to:

* View users
* View products
* Create outfits
* View outfits
* Delete outfits

All outfit information is stored in the same MariaDB database used by the website.

### User Outfit Visualization

Each user can view their own outfits from the web dashboard.

---

## Database Structure

Main tables used:

* usuarios
* productos
* categorias
* pedidos
* detalles_pedido
* outfits
* outfit_productos

---

## Java Console Application

The desktop application connects directly to the InstaLook database using JDBC.

Available options:

1. View users
2. View products
3. Create outfit
4. View outfits
5. Delete outfit
6. Exit

The generated executable can be downloaded directly from the user dashboard.

---

## Security Measures

* Session validation
* Admin-only product management
* Prepared SQL statements
* Password hashing
* Input validation
* Access control for protected pages

---

## Backup Strategy

Regular backups are configured using Cron.

Backups include:

* MariaDB database
* Website files
* Java application source code
* Executable JAR file

---

## Installation

### Clone repository

```bash
git clone <repository-url>
```

### Configure database

Create a MariaDB database named:

```text
instalook
```

Import the SQL structure and data.

### Configure PHP

Edit:

```text
config/database.php
```

and update database credentials.

### Configure Java

Edit:

```text
DatabaseConnection.java
```

and update:

* Database host
* Username
* Password

### Compile Java Application

```bash
javac --release 8 \
-cp "lib/*" \
-d out \
src/com/instalook/*.java
```

Generate executable:

```bash
jar cfe instalook-manager.jar \
com.instalook.Main \
-C build .
```

---

## Learning Outcomes

This project allowed me to practice:

* PHP backend development
* SQL database design
* User authentication
* CRUD operations
* Session handling
* Java database connectivity (JDBC)
* Integration between web and desktop applications
* Linux server administration
* Backup automation

---

## Author

Developed as an educational full-stack project using PHP, MariaDB, Java, and Linux server technologies.
