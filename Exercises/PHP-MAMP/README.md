# PHP-MAMP

PHP-MAMP is a set of docker images that include a MAMP stack ([macOS](https://www.apple.com/macos/monterey/), [Apache](https://www.apache.org/), [MySQL](https://www.mysql.com/), [PHP8](https://www.php.net/) and [phpMyAdmin](https://www.phpmyadmin.net/) all in one handy package.

## Using the image

### On the command line

This is the quickest way

```
docker-compose up
```

### Steps

1. git clone https://github.com/kalwar/PHP-MAMP
2. Make sure docker is up and running in your computer by typing: `docker ps` in terminal
3. Run `docker-compose up` in project root folder of PHP-MAMP
4. Check Docker Desktop
5. Open the Apache application in `http://localhost:8005`
6. Copy or drag and drop `PHP_practice01` and `PHP_practice01` from itsLearning Practice folder to `src/` folder of PHP-MAMP
7. phpMyadmin in `http://localhost:9080` And mySQL database should show it is connected

- Go to http://localhost:8005//PHP_practice01/index.php-For the folder PHP_practice01: you should see all the Practice from 0 - 10
- Now, your task is to read comment from 0.php till 5.php and write code and see results in browser
- Navigate to http://localhost:8005//PHP_practice01/index.php
- Check results by clicking on Practice Section 0, Practice Section 1 ... Practice Section 5
