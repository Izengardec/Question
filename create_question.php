<head>
    <link rel="stylesheet" type="text/css" href="main_style.css">
    <link rel="stylesheet" type="text/css" href="choose_style.css">
    <title>Create Test</title>
</head>
<body>
    <?php
        echo "<form action='question.php?num=".$_GET['num']."' method='post'>";
    ?>
        <table>
            <tr><td>
                <input type = "submit" name = 'choose' value = "Вопрос с выбором">
            </tr></td>
            <tr><td>
                    <input type = "submit" name = 'match' value = "Соответствие">
            </tr></td>
            <tr><td>
                    <input type = "submit" name = 'open' value = "Открытый вопрос">
            </tr></td>
            <tr><td>
                    <?php echo "<a href='create_test.php?num=".$_GET['num']."'>Назад</a>";?>
            </tr></td>
        </table>
    </form>
</body>

