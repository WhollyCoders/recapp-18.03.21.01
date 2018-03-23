<?php
// ***** Test Code *****

$id         =       NULL;
$name       =       'SC Losing To Live';
$location   =       'Annandale VA';
$details    =       'Program will take place in Myrtle Beach';

$competition_data = array(

    'competition_id'        =>      $id,
    'competition_name'      =>      $name,
    'competition_location'  =>      $location,
    'competition_details'   =>      $details

);

$Competition = new Competition($connection);
$Competition->addCompetition($competition_data);
?>