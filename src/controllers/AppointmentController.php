<?php

namespace App\controllers;

use App\Core\View;
use App\Models\Appointment;




class AppointmentController {

    public function __construct()
    {
        if (isset ($_GET["action"]) && ($_GET["action"] =="create")) 
        {
        $this->create();
        }
        
       $this->index();
    }


    public function index():void {
         $appointment= new Appointment();
         $appointments= $appointment->all();

         new View("appointmentList",
         ["appointments"=>$appointments,]);
   }


public function create ():void
{
    echo "hola";
}


}






