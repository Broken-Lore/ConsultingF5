<?php

namespace App\controllers;

use App\Core\View;
use App\Models\Appointment;

class AppointmentController
{
    public function __construct()
    {
        if (isset($_GET["action"]) && ($_GET["action"] == "create")) {
            $this->create();
            return;
        }
        if (isset($_GET["action"]) && ($_GET["action"] == "store")) {
            $this->store($_POST);
            return;
        }
        if (isset($_GET["action"]) && ($_GET["action"] == "edit")) {
            $this->edit($_GET["id"]);
            return;
        }
        if (isset($_GET["action"]) && ($_GET["action"] == "update")) {
            $this->update($_POST, $_GET["id"]);
            return;
        }
        if (isset($_GET["action"]) && ($_GET["action"] == "delete")) {
            $this->delete($_GET["id"]);
            return;
        }
        $this->index();
    }

    public function index(): void
    {
        $appointment = new Appointment();
        $appointments = $appointment->all();

        new View(
            "appointmentList",
            ["appointments" => $appointments,]
        );
    }

    public function create(): void
    {
        new View("createAppointment");
    }
    
    public function store($name, $topic): void 
    {
        $newAppointment = new Appointment(); 
        $newAppointment->save();
        $this->index();
    }
}
