Travel CMS Travel CMS is a simple content management system for managing travel destinations. It includes a public-facing interface for viewing destinations and an admin panel for managing content, including destinations and admin users.

Features Public Area: Display a list of travel destinations with images and descriptions. View detailed information about each destination.

Admin Panel: Add, edit, and delete travel destinations. Upload and manage destination images. Add, edit, and delete admin users. Secure Login: Admin access is secured with hashed passwords. Responsive Design: A simple and user-friendly interface.

Prerequisites XAMPP (or a similar LAMP/WAMP stack) PHP version 7.4 or later MySQL

Installation 1.)Download or Clone the Repository: git clone https://github.com/your-username/travel-cms.git

2.)Set Up the Project Directory: Place the project folder (e.g., travel_cms) into the XAMPP htdocs directory C:\XAMPP\htdocs\travel_cms

3.Set Up the Database:

Open phpMyAdmin at http://localhost/phpmyadmin. Create a new database named travel_db. Import the provided travel_db.sql file: Click on the Import tab. Select the travel_db.sql file and click Go

Start XAMPP Services:

Open the XAMPP control panel and start Apache and MySQL. Usage Public Area:

Visit http://localhost/travel_cms/public/index.php. Browse the list of destinations or view detailed information about a specific destination. Admin Panel:

Go to http://localhost/travel_cms/public/login.php. Log in with the following default credentials: Username: admin Password: password123 Use the admin panel to: Manage destinations (add, edit, delete). Upload images for destinations. Manage admin users.

Directory for local usage

travel_cms/ ├── admin/ │ ├── 1.)edit_admin.php # Edit an admin user │ ├── 2.)edit_destination.php # Edit a travel destination │ ├── 3.)manage_admins.php # Manage admin users │ ├── 4.)manage_content.php # Manage travel destinations │ ├── 5.)new_admin.php # Add a new admin user │ ├── 6.)new_destination.php # Add a new travel destination

├── includes/ │ ├── db_connection.php # Database connection │ ├── functions.php # Utility functions │ ├── session.php # Session management ├── public/ │ ├── index.php # Public-facing homepage │ ├── login.php # Admin login page │ ├── logout.php # Admin logout page │ ├── destination.php # Detailed view of a destination │ ├── styles.css # CSS for styling │ └── images/ # Folder for uploaded images