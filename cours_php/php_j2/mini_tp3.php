<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: red;
            display: flex;
            justify-content: center;
            align-content: center;
            padding-top: 150px;
        }

        table {
            border: solid black;
            text-align: center;
            width: 500px;
            height: 500px;
            font-size: x-large;
            font-weight: bold;
        }

        tr {
            background-color: white;
        }

        td {
            border: solid black;
        }
    </style>
</head>

<body>
    <table>
        <?php
        for ($i = 1; $i < 11; $i++) {
            echo "<tr>";
            for ($j = 1; $j < 11; $j++) {
                echo "<td>";
                echo $i * $j;
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>