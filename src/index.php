<?php
namespace App;
require("./views/components/head.php");
require("./views/appointmentList.php");
require("./views/components/layout.php");

use App\DbSession;

use App\models\Appointment;

require("./DbSession.php");

$conexcion= new DbSession;
  


?>
