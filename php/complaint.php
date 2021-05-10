<?php
include "header.php";
?>
<div class="container col-md-5  my-5">

    <form method="POST">
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="" value="<?php echo  $_SESSION['user']['userName']; ?>" readonly="">

        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Surname </label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="" value="<?php echo  $_SESSION['user']['userSurname']; ?>" readonly="">

        </div>
        <div>
        <label for="exampleInputEmail1"> Complaint Title </label>
        <select class="form-select" aria-label="Default select example" name="complaintTitle">
        
            <option value="1" >Garrage</option>
            <option value="2">Other</option>
        </select>
        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Complaint&Request</label>

            <textarea class="form-control" rows="5"></textarea>
        </div>


        <button type="submit" class="btn btn-primary" name="complaint submit">Submit</button>
    </form>
</div>


<?php
include "footer.php";
?>