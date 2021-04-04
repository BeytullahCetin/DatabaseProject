<?php
include "header.php";
?>
<div class="container col-md-5  my-5">

    <form>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="" value="Name" readonly="">

        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Surname </label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="" value="Surname" readonly="">

        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Complaint&Request</label>

            <textarea class="form-control" rows="5"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<?php
include "footer.php";
?>