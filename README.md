# PHP Part II
This repository contains exercises and learning materials for the PHP Part II course.


## Tasks
- **CRUD APP**: 
  - Description: A Create, Read, Update, Delete (CRUD) application built with PHP with toast and other dynamic state update.
  - Code [Here](Exercises/PHP-MAMP/phpDir/src/CRUDApp)
- **Calculator**:
  - Description: A basic calculator
  - Code [Here](Exercises/PHP-MAMP/phpDir/src/calculator)
  - Demo [Here](http://adelansari.great-site.net/calculator/)
- **Measurement Conversion**:
  - Description: A utility for converting between different units of measurement.
  - Code [Here](Exercises/PHP-MAMP/phpDir/src/measurement-conversion)
  - Demo [Here](http://adelansari.great-site.net/measurement-conversion/)

## Dependency
PHP-MAMP is a set of docker images that include a MAMP stack ([macOS](https://www.apple.com/macos/monterey/), [Apache](https://www.apache.org/), [MySQL](https://www.mysql.com/), [PHP8](https://www.php.net/) and [phpMyAdmin](https://www.phpmyadmin.net/) all in one handy package.
- **Install Docker**
  - If you haven't installed Docker, you can download it from the [official Docker website](https://www.docker.com/products/docker-desktop/). Follow the instructions provided for your specific operating system.
   


## Setup Guide

Follow these steps to get the project up and running on your local machine:

1. **Clone the repository**

   Open your terminal and run the following command:

   ```bash
   git clone https://github.com/adelansari/PHP_II
   ```

2. **Navigate to the project directory**
   Change your current directory to the cloned repository:
   ```bash
   cd PHP_II/PHP-MAMP
   ```
3. **Check Docker installation**
   Make sure Docker is up and running on your computer by typing the following command in your terminal:
   ```bash
   docker ps
   ```
4. **Start the Docker containers**
   Run the following command in your terminal:
   ```bash
   docker-compose up
   ```
5. **Verify the setup**
   Open your web browser and visit `http://localhost:8005`. You should see the Apache application running.

6. **Access phpMyAdmin**
   Visit `http://localhost:9080` in your web browser. You should see the phpMyAdmin interface and your MySQL database should show it is connected.

7. **Verify the practice folders**
   Visit `http://localhost:8005/PHP_practice01/index.php`. You should see all the practices from 0 - 10 for the folder PHP_practice01.