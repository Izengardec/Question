<?php
require_once 'QuestionInfo.php';
require_once 'view_for_answer.php';
require_once 'model_answer.php';
require_once 'controller_for_create.php';
require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка".mysqli_error($link));
$view = new ViewA($_GET['num'],$_GET['quest']);
$model = new CreateAModel($link);
?>
<head>
    <link rel="stylesheet" type="text/css" href="main_style.css">
    <title>Create Test</title>
</head>
<body>
<?php
echo "<a style='margin: 0 20%; padding: 2px;' href = 'create_test.php?num=".$_GET['num']."'>Вернуться к выбору вопроса</a>";
if ($_GET['form']==0){
    $tmp = $model->getMatchQ($link->real_escape_string($_GET['quest']));
    $view->matchForm($tmp->value3[0],$tmp->value1,$tmp->value2);
} else if($_GET['form']==1){
    $tmp = $model->getChooseQ($link->real_escape_string($_GET['quest']));
    $view->chooseForm($tmp->value3[0],$tmp->value1,$tmp->value2);
} else if ($_GET['form']==2){
    $tmp = $model->getOpenQ($link->real_escape_string($_GET['quest']));
    $view->openForm($tmp->value2[0],$tmp->value1[0]);
}
?>
</body>