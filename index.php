<?php
    require_once 'connection.php';
    if (isset($_POST['name_test'])){
        $link=mysqli_connect($host,$user,$password,$database) or die("Ошибка".mysqli_error($link));
        mysqli_set_charset($link,"utf8");
        $query = "INSERT INTO tests(`name`) VALUES ('".$link->real_escape_string($_POST['name_test'])."')";

        $result=mysqli_query($link,$query)or die("Ошибка запроса".mysqli_error($link));
        mysqli_close($link);
    }

?>
<head>
    <link rel="stylesheet" type="text/css" href="main_style.css">
    <title>Main</title>
</head>
<body>
    <form class="insert_q" method='POST'>
        <input type = "text" name="name_test" required>
        <input type = "submit" value = "Создать тест">
    </form>
    <!-- подгрузка тестов что имеются -->
    <?
        $link=mysqli_connect($host,$user,$password,$database) or die("Ошибка".mysqli_error($link));
        mysqli_set_charset($link,"utf8");
        $query = "SELECT * FROM `tests`";
        $result=mysqli_query($link,$query)or die("Ошибка запроса".mysqli_error($link));
        mysqli_close($link);
        echo "<table> <tr><td>Название теста</td></tr>";
        for ($i = 0; $i<mysqli_num_rows($result);++$i){
            $row=mysqli_fetch_row($result);
            echo "<tr><td><a href = 'create_test.php?num=$row[0]'>$row[1]</a></td></tr>";
        }
        echo "</table>";
    ?>
</body>
