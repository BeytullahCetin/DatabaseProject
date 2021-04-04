<?php include "header.php"; ?>

<?php

if (isset($_GET['startingDate'])) {
    $startingDate = $_GET['startingDate'];
} else {
    $startingDate = date("Y-m-d", mktime(0, 0, 0, date("m") - 1, 1));
}

if (isset($_GET['endingDate'])) {
    $endingDate = $_GET['endingDate'];
} else {
    $endingDate = date("Y-m-d", mktime(0, 0, 0, date("m"), 0));
}

echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    
    <script type='text/javascript'>
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    // Draw the chart and set the chart values
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Due Incomes'," . 100 . "],
      ['Expense'," . 600 . "],
      ['Unpaid Dues'," . 1500 . "]
    ]);
    
      // Optional; add a title and set the width and height of the chart
      var options = {'title':'Income Expense', 'width':600, 'height':350};
    
      // Display the chart inside the <div> element with id='piechart'
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
    </script>";

?>

<div class="container col-md-8 my-5">

    <div class="d-flex container justify-content-center">
        <div id='piechart'></div>
    </div>

    <div class="d-flex container justify-content-center">
        <form class="row row-cols-lg-auto g-3 align-items-center" method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

            <div class="form-floating mb-3">
                <input class="form-control" type="date" id="startingDate" name="startingDate" value="<?php echo "$startingDate"; ?>">
                <label for="expenseDate">Starting Date:</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="date" id="endingDate" name="endingDate" value="<?php echo "$endingDate"; ?>">
                <label for="endingDate">Ending Date</label>
            </div>


            <div class="form-group d-grid gap-2 mb-3">
                <input class="btn btn-primary" type="submit" value=Show>
            </div>

        </form>

    </div>


    <div class="row">

        <div class="accordion" id="accordionExample">

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Selected Expense Report
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                    <div class="accordion-body">
                        Selected Expense Report
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Lifetime Expense Report
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                    <div class="accordion-body">
                        Lifetime Expense Report
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<?php include "footer.php"; ?>