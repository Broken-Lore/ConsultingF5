<?php require("components/head.php");?>
<div class="container">
    <a class="position-absolute" href="index.php"><button type="button" class="btn" style="margin-top: 12px"><--</button></a>
    <h1 class="d-flex justify-content-center p-3">EDIT APPOINTMENT</h1>
    <form action='?action=update&id=<?php echo $data["appointments"]->getId() ?>' method="post">
    <ul class="list-group lh-lg">
        <li class="list-group-item" style="border:none">
            <label>ID</label><br>
            <input value='<?php echo $data["appointments"]->getId() ?>' class="m-0 p-0 container border border-2 border-dark" disabled="disabled">
        </li>
        <li class="list-group-item" style="border:none">
            <label>Name</label><br>
            <input required value='<?php echo $data["appointments"]->getName() ?>' class="m-0 p-0 container border border-2 border-dark" maxlength="20" type="text" name="name" id="name" required>
        </li>
        <li class="list-group-item" style="border:none">
            <label>Topic</label><br>
            <textarea class="m-0 p-0 form-control border border-2 border-dark" aria-label="With textarea" maxlength="100" type="text"
            name="topic" id="topic" required><?php echo $data["appointments"]->getTopic() ?></textarea>
        </li>
        <li class="list-group-item" style="border:none">
            <label>Date</label><br>
            <input value='<?php echo $data["appointments"]->getDate() ?>' class="m-0 p-0 container border border-2 border-dark" disabled="disabled">
        </li>
    </ul>
    
    <div class="m-0 p-0 container-fluid btn-group-vertical position-absolute bottom-0 start-0 p-2 flex-grow-1 btn bg-success" role="group" aria-label="Basic mixed styles example">
        <button  type="submit" class="p-2 flex-grow-1 btn bg-success">UPDATE APPOINTMENT</button>
    </div>
    </form>
</div>
<?php require("components/layout.php");?>