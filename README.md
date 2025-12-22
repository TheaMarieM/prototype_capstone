# Student Behavioral Incidents Monitoring System (BEU-Monitoring)

## 📖 Project Overview
The **Student Behavioral Incidents Monitoring System** is a web-based platform developed for the **Basic Education Unit (BEU)** of St. Paul University Philippines. [cite_start]It aims to digitize the recording of student conduct, replace manual logbooks, and utilize **Data Analytics** to identify behavioral trends and at-risk students[cite: 2, 44].

[cite_start]This system facilitates proactive intervention by allowing the Discipline Office to track patterns like bullying or tardiness in real-time, moving away from reactive, paper-based discipline[cite: 38, 47].

## 🚀 Key Features
* [cite_start]**Digital Incident Recording:** Secure logging of violations (Bullying, Tardiness, etc.) with support for scanned narrative reports[cite: 256].
* **Role-Based Access Control:**
    * [cite_start]**Discipline Chair (Admin):** Full control to log and manage incidents[cite: 252].
    * [cite_start]**Principal:** View-only access to Summary Reports for case validation and closure[cite: 253].
    * [cite_start]**Advisers:** View behavioral history for their specific advisees only[cite: 251].
    * [cite_start]**Parents/Students:** Restricted dashboard showing only attendance records (Tardiness/Absences) to protect confidentiality [cite: 259-261].
* [cite_start]**Data Analytics Dashboard:** Visualizes trends (e.g., "High frequency of bullying in Grade 7") and flags at-risk students [cite: 266-268].

## 🛠 Tech Stack
* [cite_start]**Framework:** Laravel 11 (PHP) [cite: 248]
* **Admin Panel:** Filament V3
* **Database:** MySQL
* **Frontend:** Blade / Livewire / Tailwind CSS

## ⚙️ Installation Guide

### Prerequisites
* PHP 8.2+
* Composer
* Node.js & NPM

### Setup Steps
1.  **Clone the Repository**
    ```bash
    git clone [https://github.com/YOUR-USERNAME/beu-monitoring.git](https://github.com/YOUR-USERNAME/beu-monitoring.git)
    cd beu-monitoring
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Environment Setup**
    * Copy the example environment file: `cp .env.example .env`
    * Configure your database credentials in `.env` (DB_DATABASE, etc.).

4.  **Database Migration**
    ```bash
    php artisan migrate:fresh
    ```

5.  **Create Admin User**
    ```bash
    php artisan make:filament-user
    # Follow prompts to create your login
    ```

6.  **Run the Server**
    ```bash
    php artisan serve
    ```
    Access the system at: `http://127.0.0.1:8000/admin`

## 👥 Contributors
* **Marithea Magno** - Researcher / Developer
* **Ariana Siddayao** - Researcher / Developer


---
[cite_start]*Compliance: This system is designed in accordance with ISO 25010 Software Quality Standards[cite: 197].*