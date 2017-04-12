<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Weather Widget</title>
        <style>
            body{
                width: 960px;
                margin: 0 auto;
            }
            .userForm{
                padding-top:50px;
            }
        </style>
    </head>
    <body>

        <!--submit this form to form_processing.php-->
        <form class ="userForm" name="weatherForm" action="weather/get" method="GET">

            City: <input type="text" name="city" placeholder="city"/><br />
            Country: <input type="text" name="country" placeholder="country"/><br />
            <input type="submit" name="submit" value="Submit" />
        </form>
        <br />
        <hr />

    </body>
</html>