<?php require_once("components/head.php");?>

<div class="container">
    <h1 class="d-flex justify-content-center p-3">Booked appointments: </h1>
    <table class="table table-hover border border-dark table-responsive-lg">
        <thead style="background-color:aqua">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Topic</th>
            <th scope="col">Date</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="modal-dialog-scrollable" >
            <?php
                foreach ($data["appointments"] as $appointment){
                   echo "
                   <tr>
                        <td> {$appointment->getId()}</td>
                        <td> {$appointment->getName()}</td>
                        <td> {$appointment->getTopic()}</td>
                        <td> {$appointment->getDate()}</td>
                        <td>x</td>
                   </tr>";  
                }       
            ?>
        </tbody>
    </table>
    <div class="m-0 p-0 container-fluid btn-group-vertical position-absolute bottom-0 start-0 " role="group" aria-label="Basic mixed styles example">
        <a href="?action=create" class='p-2 flex-grow-1 btn bg-success'>
            <button type='button' class='p-2 flex-grow-1 btn bg-success'>NEW APPOINTMENT</button>
        </a>
        <a href="./views/editAppointments.php" class="p-2 flex-grow-1 btn bg-warning">
        <button type="button" class="p-2 flex-grow-1 btn bg-warning">EDIT APPOINTMENT</button>
        </a>
    </div>
</div>

<?php require_once("components/layout.php");?>