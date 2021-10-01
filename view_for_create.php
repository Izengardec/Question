<?php
class View{
    public function __construct($idTest){
        $this->idTest=(int) $idTest;
    }
    protected $idTest;
    public function matchForm(){
        echo "<form action='create_test.php?num=$this->idTest&form=0' method='post'>
                <table>
                <tr><td>
                      <p>Вопрос</p>
                </td></tr>
                <tr><td>
                      <textarea class = 'text_in_form' name='question' required></textarea>
                </td></tr>
                </table>
                <table>
                <tr>
                    <td>Соответствие №1</td>
                    <td>Соответствие №2</td>
                    <td>Включить вопрос</td>
                </tr>";
        for ($i = 0; $i<6;$i++)
        {
            $tmp = ($i<=1)?"disabled":"";
            echo "<tr>
                        <td><textarea class = 'text_in_form' name='answer[$i]' required></textarea></td>
                        <td><textarea class = 'text_in_form' name='answer2[$i]' required></textarea></td>
                        <td><input type='checkbox' id = 'chek$i' checked = 'true' $tmp></td>
                    </tr>";
        }
        echo "<tr><td><input type = 'submit'></td></tr>
                </table>
              </form>
              <script src='script.js'></script>";
    }
    public function chooseForm(){
        echo "<form action='create_test.php?num=$this->idTest&form=1' method='post'>
                <table>
                <tr><td>
                      <p>Вопрос</p>
                </td></tr>
                <tr><td>
                      <textarea class = 'text_in_form' name='question' required></textarea>
                </td></tr>
                </table>
                <table>
                <tr>
                    <td>Правильность</td>
                    <td>Ответ</td>
                    <td>Включить вопрос</td>
                </tr>";
        for ($i = 0; $i<6;$i++)
        {
            $tmp = ($i<=1)?"disabled":"";
            echo "<tr>
                        <td><input type='checkbox' name='true[$i]'><input type='text' name='true[$i]' hidden value='N'></td>
                        <td><textarea class = 'text_in_form' name='answer[$i]' required></textarea></td>
                        <td><input type='checkbox' id = 'chek$i' checked = 'true' $tmp></td>
                    </tr>";
        }

              echo  "<tr><td><input type = 'submit'></td></tr>
                   </table>
              </form>
              <script src='scriptchoose.js'></script>";
    }
    public function openForm(){
        echo "<form action='create_test.php?num=$this->idTest&form=2' method='post'>
                <table>
                <tr><td>
                      <p>Введти вопрос</p>
                </td></tr>
                    <tr><td>
                        <textarea class = 'text_in_form' name='question' required></textarea>
                    </td></tr>
                    <tr><td>
                      <p>Введти ответ</p>
                </td></tr>
                    <tr><td>
                        <input class = 'text_in_form' type = 'text' name='answer' required>
                    </td></tr>
                    <tr><td>
                        <input type = 'submit'>
                    </td></tr>
                </table>
              </form>";
    }
}