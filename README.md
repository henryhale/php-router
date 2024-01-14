<div align=center>

# php-router
a better php routing mechanism

</div>

## overview
PHP Router is a tested attempt to enhance the design of the [php-router](https://github.com/phprouter/main) project on GitHub.

This repository contains source code for a better design that uses [classes](https://www.php.net/manual/en/book.classobj) and adds features like asset handling. In addition to the features, better error handling and redirections are introduced in this design.

Significant differences from the original router include dynamic routing and project setup.

## getting started

### preresquities
Basic understanding of HTML and PHP language is required and installed on your machine.

### steps
1. Set up your project directory
   
   Clone or download this repository to your machine.

   Now you have two options here:
   - Place all downloaded the files under the root directory (html, htdocs, ow www) of your web server
   - Place the downloaded folder under the root directory (html, htdocs, ow www) of your web server. Create a virtual host on your web server and point it to that folder.
  
2. In the browser, go to `http://localhost` or `http://127.0.0.1` and you should see the homepage. 
   
   In case you created a virtual host, open it in the browser.

>NOTE:
>- Feel free to check out the source code as it is documented.
>- You may delete all routes in the `routes.php` file and create your own.
>- For better error handling, you may consider keeping the `/404` route.

## contributing
Contributions are welcome! Feel free to open an issue or open pull requests proposing a change.

## license
Copyright &copy; 2024 [Henry Hale](https://github.com/henryhale).

Released under the [MIT License](https://github.com/henryhale/viteshell/blob/master/LICENSE.txt).
