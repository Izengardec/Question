<?php
require_once 'view_for_create.php';
require_once 'model_for_create.php';
require_once 'controller_for_create.php';
require_once 'connection.php';
$link = mysqli_connect($host,$user,$password,$database) or die("Ошибка".mysqli_error($link));
$view = new View($_GET['num']);
$model = new Model($link);
$controller = new Controller($model,$view);
$typeQ = 0;
if (isset($_POST['choose'])){
    $typeQ = 1;
} else if (isset($_POST['open'])){
    $typeQ = 2;
}
?>
<head>
    <link rel="stylesheet" type="text/css" href="main_style.css">
    <title>Create Test</title>
</head>
<body>
<?php
echo "<a style='margin: 0 20%; padding: 2px;' href = 'create_question.php?num=".$_GET['num']."'>Вернуться к выбору типа вопроса</a>";
$controller->showForm($typeQ);

?>

</body>