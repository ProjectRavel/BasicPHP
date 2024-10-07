# PHP Learning Project

This repository contains my journey of learning PHP, focusing on basic PHP concepts, Object-Oriented Programming (OOP) in PHP, database integration with MySQL, and practical projects such as `materialStockAPP` and `feedbackAPP`.

## Table of Contents

- [About the Project](#about-the-project)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Projects](#projects)
  - [Material Stock App](#materialstockapp)
  - [Feedback App](#feedbackapp)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## About the Project

This project serves as a comprehensive study of PHP, starting from basic syntax, functions, and variables to more advanced topics like Object-Oriented Programming (OOP) and database management using MySQL. I have implemented two sample applications during the learning process:

1. **Material Stock App**: A simple app for managing material stock in a store or warehouse.
2. **Feedback App**: A feedback management system to gather and display user feedback.

These apps demonstrate the practical usage of PHP in handling backend logic and integrating databases using MySQL.

## Technologies Used

- **PHP**: Core programming language for this project.
- **MySQL**: Database management system for data storage and retrieval.
- **HTML/CSS**: Basic front-end for project interaction.
- **Bootstrap**: CSS framework to create responsive and professional layouts.
- **Laragon**: Local development environment used for PHP and MySQL setup.

## Installation

To set up this project locally, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/php-learning-project.git
    ```
2. Install Laragon or another local server to run PHP and MySQL.

3. Start your MySQL server through Laragon or use your preferred local environment.

4. Import the provided .sql files (found in the /db folder) to set up the database for materialStockAPP and feedbackAPP.

5. Navigate to the project directory and run the PHP server

```bash
cd php-learning-project
php -S localhost:8000
```
6. Open your browser and visit http://localhost:8000 to view the project.

## Usage
1. Navigate to the app's homepage.
2. For materialStockAPP, you can add, update, or delete material stock items.
3. For feedbackAPP, you can submit and view feedback from users.

## Projects
### MaterialStockAPP
The **Material Stock** App is a basic application that allows users to manage material stock. It includes features for adding new stock items, editing, and deleting entries. The app uses PHP for backend operations and MySQL for data storage.

### FeedbackAPP
The **Feedback App** allows users to submit their feedback. The feedback is stored in a MySQL database and can be retrieved and displayed on the app’s frontend. This project demonstrates handling forms, submitting data to the database, and retrieving records using PHP and MySQL.

## Contributing
Contributions are welcome! If you have suggestions to improve this project, feel free to open an issue or submit a pull request.


## Contact
**Name**: Ravel
**Email**: rafaelcodeid@gmail.com
**GitHub**: ProjectRavel
Feel free to reach out if you have any questions or want to collaborate!