# php-video-game-reviews

This is a GitHub repository for a video-games gallery mockup website. Made using PHP + SCSS + JS + HTML, to work on a typical LAMP stack.

## Requirements

Before you will use this repository make sure that you have installed:

- **XAMPP or equivalent**

  - Visit this link **[Downloading XAMPP](https://www.apachefriends.org/pl/index.html)** then download appropriate installer and install it.
  
- **NPM**

  - Node.js is required for some of the stylistic linters in this project. Visit this link **[Downloading NPM](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)** then download appropriate installer and install it.
  
  
- **Twig**

  - Make sure that PHP Twig is installed, either manually, or by Composer. Some of the localization will fail if Twig is not installed. **[Downloading Twig](https://twig.symfony.com/)**
  

- **PHP** and **SCSS**

  - Visit this link **[PHP download](https://www.php.net/downloads.php)** then download the appropriate version for your operating system and install it.
  - Follow the instructions in **[Sass download](https://sass-lang.com/install)** and download the appropriate files for your operating system.

If you have every required dependency, you should be ready to start using this repository, and to build and run the website.

## Installation

To build and run the website, copy the htdocs folder into your existing XAMPP or equivalent installation. 

You will also need to run the vgreviews.sql script in the MySQL database, to create the required tables.

Proceed with your program's steps required to host the website on localhost. The website landing page is located at http://localhost:8080/content/main/index.php

You may access the admininistrative part of the website, if you log in with the admin account. To log in with the admin account, delete the existing account in the database, and register through the register panel as admin. Make sure to log in, and the hidden admin panel will be unlocked.
