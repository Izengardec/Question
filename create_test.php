<?php
    require_once 'model_tests.php';
    require_once 'connection.php';
    $link=mysqli_connect($host,$user,$password,$database) or die("Ошибка".mysqli_error($link));
    mysqli_set_charset($link,"utf8");
    if (isset($_POST['rename'])){
        $query = "UPDATE `tests` SET `name`='".$link->real_escape_string($_POST['rename'])."' WHERE idtest=".$link->real_escape_string($_GET['num']);
        $result=mysqli_query($link,$query)or die("Ошибка запроса".mysqli_error($link));
    }
    if (isset($_GET['form'])){
        $model = new TestModel($link,$link->real_escape_string($_GET['num']));
        $numQ = $model->insertQ($link->real_escape_string(htmlspecialchars($_POST['question'])),$link->real_escape_string($_GET['form']));
        if ($_GET['form']==2){
            $model->insertOpenA($link->real_escape_string(htmlspecialchars ($_POST['answer'])),$numQ);
        } else if ($_GET['form']==1){
            $stack = array();
            $stack2 = array();
            foreach ($_POST['true'] as $i ) {
                $i = ($i != 'N') ? 1 : 0;
                array_push($stack,$i);
            }
            foreach ($_POST['answer'] as $i ) {
                array_push($stack2,$i);
            }
            for ($i = 0; $i < count($stack); $i++){
                $model->insertChooseA($link->real_escape_string(htmlspecialchars($stack[$i])),$link->real_escape_string(htmlspecialchars($stack2[$i])),$numQ);
            }
        } else if ($_GET['form']==0){
            $stack = array();
            $stack2 = array();
            foreach ($_POST['answer'] as $i ) {
                array_push($stack,$i);
            }
            foreach ($_POST['answer2'] as $i ) {
                array_push($stack2,$i);
            }
            for ($i = 0; $i < count($stack); $i++){
                $model->insertMatchA($link->real_escape_string(htmlspecialchars($stack[$i])),$link->real_escape_string(htmlspecialchars($stack2[$i])),$numQ);
            }
        }
    }
    $query = "SELECT `idtest`, `name` FROM `tests` WHERE idtest='".$link->real_escape_string(htmlspecialchars($_GET[num]))."' ";
    $result=mysqli_query($link,$query)or die("Ошибка запроса".mysqli_error($link));
    $row=mysqli_fetch_row($result);

?>
<head>
    <link rel="stylesheet" type="text/css" href="main_style.css">
    <title>Create Test</title>
</head>
<body>
    <?php
        echo "<form action=\"create_test.php?num=$row[0]\" class=\"insert_q\" method=\"POST\">
              <a href = 'index.php'>Вернуться к тестам</a>
              <input type = \"text\" name= \"rename\" value = \"$row[1]\"  required>";
    ?>
    <input type = "submit" value = "Переименовать">
    </form>
    <?php
        echo "<form action=\"create_question.php?num=$row[0]\" class=\"insert_q\" method=\"POST\">";
    ?>
        <input type = "submit" value = "Создать вопрос">
    </form>
    <table style="text-align:left;">
    <?
        $query = "SELECT `id`, `text`,`type` FROM `texts_question` WHERE idtest=$row[0]";
        $result=mysqli_query($link,$query)or die("Ошибка запроса".mysqli_error($link));
        mysqli_close($link);
        for ($i = 0; $i<mysqli_num_rows($result);++$i){
            $row=mysqli_fetch_row($result);
            echo "<tr><td><a href = 'answer.php?num=".$_GET['num']."&quest=$row[0]&form=$row[2]'>$row[1]</a></td><td></td></tr>";
        }
    ?>
    </table>
</body>
