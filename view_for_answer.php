<?php

class ViewA{
    public function __construct($idTest,$idQuest){
        $this->idTest=$idTest;
        $this->idQuest=$idQuest;
    }
    private $idTest;
    private  $idQuest;
    public function matchForm($quest,$answer,$answer2){
        echo "  <table>
                <tr><td>
                      <textarea class = 'text_in_form' name='question' disabled>$quest</textarea>
                </td></tr>
                </table>
                <table>";
        for ($i = 0; $i<count($answer);$i++)
        {
            echo "<tr>
                        <td><textarea class = 'text_in_form' name='answer[$i]' disabled>$answer[$i]</textarea></td>
                        <td><textarea class = 'text_in_form' name='answer2[$i]' disabled>$answer2[$i]</textarea></td>
                    </tr>";
        }
        echo "</table>";
    }
    public function chooseForm($quest,$true,$answer){
        echo "  <table>
                <tr><td>
                      <textarea class = 'text_in_form' name='question' disabled>$quest</textarea>
                </td></tr>
                </table>
                <table>";
        for ($i = 0; $i<count($answer);$i++)
        {
            $tmp = ($true[$i]==1)?"checked='true'":"";
            echo "<tr>
                        <td><input type='checkbox' name='true[$i]' $tmp disabled><input type='text' name='true[$i]'  hidden value='N'></td>
                        <td><textarea class = 'text_in_form' name='answer[$i]'  disabled>$answer[$i]</textarea></td>
                    </tr>";
        }

        echo  "</table>";
    }
    public function openForm($quest, $answer){
        echo "<table>
                    <tr><td>
                        <textarea class = 'text_in_form' name='question' disabled>$quest</textarea>
                    </td></tr>
                    <tr><td>
                        <input class = 'text_in_form' type = 'text' name='answer' value='$answer' disabled>
                    </td></tr>
                </table>";
    }
}