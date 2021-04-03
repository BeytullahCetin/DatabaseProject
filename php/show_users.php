<?php
include "header.php";
?>
<div class="container col-md-8 my-5">

    <div class="accordion" id="accordionExample">

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Users
                </button>
            </h2>
            <table class="table" id="collapseOne">
                <thead>
                    <tr>
                        <th scope="col">Operations</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Number</th>
                        <th scope="col">Number2</th>
                        <th scope="col">Door No</th>
                        <th scope="col">Entry Date</th>
                    </tr>
                </thead>
            </table>


        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Old Users
                </button>

            </h2>
            <table class="table" id="collapseTwo">
                <thead>
                    <tr>

                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Number</th>
                        <th scope="col">Number2</th>
                        <th scope="col">Door No</th>
                        <th scope="col">Entry Date</th>
                    </tr>
                </thead>
            </table>

        </div>

    </div>

</div>

<?php
include "footer.php";
?>