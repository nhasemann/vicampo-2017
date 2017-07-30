<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Wine Rating System</title>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <link
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
        crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
            integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
            crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-*.min.js"></script>

    <style>
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="start.php">Wine Rating System</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="customers.php">Customers</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="ratings.php">Ratings</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <?php
                        if (isset($_SESSION['started'])) {
                            echo "
                        <form method=\"post\" action=\"start.php\">
                            <button type=\"submit\" style = \"padding-top: 15px\"
                                    class=\"btn btn-link\" name=\"logout\">
                                Logout
                            </button>
                        </form>";
                        } else {
                            echo "<li ><a href = \"login.php\" >Login</a ></li>";
                        }?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>




<div class="container-fluid">
    <?php include($page); ?>
</div>

</body>

</html>