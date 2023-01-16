<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>VG Reviews Main page</title>
    <link
      rel="stylesheet"
      href="../css/style.css"
    />
  </head>

  <body>

    <?php
    session_start();
    require '../../vendor/autoload.php';

    $loader = new Twig\Loader\FilesystemLoader('../templates');
    $twig = new Twig\Environment($loader, [
      'cache' => '../../dist',
    ]);

    include '../templates/navbar.php';
    include '../components/gallery_welcome_txt.php';
    include '../components/searchbar.php';
    include '../templates/gallery_elements.php';
    ?>
    
    <?php include '../components/menu.php'; ?>
    <?php include '../components/footer.php'; ?>
  </body>
  <script>
      // Get current page number from GET variable
      var currentPage = checkUndefinedOrNaN(parseInt(getUrlVars()["page"]));

      document.getElementById("button-next").addEventListener("click", function() {
        var nextPage = currentPage + 1;
        var newUrl = updateQueryString("page", nextPage);
        window.location.href = newUrl;
      });

      document.getElementById("button-prev").addEventListener("click", function() {
        var prevPage = currentPage - 1;
        if (prevPage < 1) { prevPage = 1; }
        var newUrl = updateQueryString("page", prevPage);
        window.location.href = newUrl;
      });

      // Function to get GET variables
      function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
      }
      function updateQueryString(key, value) {
        var baseUrl = [location.protocol, '//', location.host, location.pathname].join(''),
            urlQueryString = document.location.search,
            newParam = key + '=' + value,
            params = '?' + newParam;

        // If the "search" string exists, then build params from it
        if (urlQueryString) {
            var updateRegex = new RegExp('([\?&])' + key + '[^&]*');
            var removeRegex = new RegExp('([\?&])' + key + '=[^&;]+[&;]?');

            if( typeof value == 'undefined' || value == null || value == '' ) { // Remove param if value is empty
                params = urlQueryString.replace(removeRegex, "$1");
                params = params.replace( /[&;]$/, "" );

            } else if (urlQueryString.match(updateRegex) !== null) { // If param exists already, update it
                params = urlQueryString.replace(updateRegex, "$1" + newParam);

            } else { // Otherwise, add it to end of query string
                params = urlQueryString + '&' + newParam;
            }
        }

        // no parameter was set so we don't need the question mark
        params = params == '?' ? '' : params;

        return baseUrl + params;
      }

      function checkUndefinedOrNaN(value) {
        if (value == undefined || isNaN(value)) {
          return 1;
        }
        else {
          return value;
        }
      }
  </script>
</html>
