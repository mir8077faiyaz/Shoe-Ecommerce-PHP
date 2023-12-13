<?php

$name=$_POST['name'];
$number=$_POST['number'];
echo '<tr>';
echo '    <th>Name</th>';
echo '    <th>Contact</th>';
echo '</tr>';
echo '<tr>';
echo '    <td>Alfreds Futterkiste</td>';
echo '    <td>Maria Anders</td>';
echo '</tr>';
echo '<tr>';
echo '    <td>'.$name.'</td>';
echo '    <td>'.$number.'</td>';
echo '</tr>';

?>