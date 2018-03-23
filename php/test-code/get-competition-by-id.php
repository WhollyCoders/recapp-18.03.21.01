<?php
$Competition = new Competition($connection);

$id = 3;
echo $competition_data = $Competition->getCompetitionByID($id);
?>