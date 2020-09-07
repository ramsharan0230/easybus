@extends('layouts.admin')
@section('title','Income Report')
@section('content')
  <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Income<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Reports</a></li>
                    <li class="active">Income</li>
                </ol>
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="row equal_height">
                    <div class="col-lg-12">
                        <!-- Default box -->
                        <div class="box">

                            <!-- <div class="box-header">
                                <a href="add-destination.php" class="btn btn-success">Add New Tikets</a>
                            </div> -->
                            <div class="box-body ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="x_panel height_manage">
                                            <div class="x_title">
                                                <h2>Income In This Week</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <canvas id="total_passengers_week"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="x_panel height_manage">
                                            <div class="x_title">
                                                <h2>Income In This Month</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <canvas id="total_passengers"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>  
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script type="text/javascript">
    var week_days = <?php echo json_encode($week_days);?>;
    var month_days = <?php echo json_encode($month_days);?>;
    var weekly_income_total = <?php echo json_encode($weekly_income_total);?>;
    var monthly_income_total = <?php echo json_encode($monthly_income_total);?>;


    if ($("#total_passengers_week").length) { 
    var f = document.getElementById("total_passengers_week");
    new Chart(f, { type: "bar",
    data: { labels: week_days['date'], 
    datasets: 
        [
            { 
                label: "Income", 
                data: weekly_income_total, 
                backgroundColor: [
                    "#4bc0c0",
                    "#4bc0c0",
                    "#4bc0c0",
                    "#4bc0c0",
                    "#4bc0c0",
                    "#4bc0c0",
                    "#daa520"
                    ],
               /* backgroundColor: [*/
                    /*"#36a2eb", 
                    "#ff6384", 
                    "#ff9f40", 
                    "#ffcd56", 
                    "#4bc0c0", */

                    /*"#1d69d2",*/

                    /*"#4c3344",
                    "#687eda",
                    "#708488",
                    "ff0000",
                    "#ffd700",
                    "#40e0d0",
                    "#ff7373",
                    "#800000",
                    "#800080",
                    "#00ff00",
                    "#333333",
                    "#ff7f50",
                    "#c0d6e4",
                    "#808080",
                    "#ffff66",
                    "#3399ff",
                    "#ff4444",*/

                    /*],*/
            }
        ] 

    }, 
        options: 
        { scales: 
            { 
                yAxes: 
                [{ 
                    ticks: { 
                        beginAtZero: !0 
                    } 
                }] 
            } 
        } 

    }) 
}
if ($("#total_passengers").length) { 
    var f = document.getElementById("total_passengers");
    new Chart(f, { type: "bar",
    data: { labels: month_days['date'],
    datasets: 
        [
            { 
                label: "Income", 
                data: monthly_income_total, 
                backgroundColor: "#daa520",
               /* backgroundColor: [*/
                    /*"#36a2eb", 
                    "#ff6384", 
                    "#ff9f40", 
                    "#ffcd56", 
                    "#4bc0c0", */

                    /*"#1d69d2",*/

                    /*"#4c3344",
                    "#687eda",
                    "#708488",
                    "ff0000",
                    "#ffd700",
                    "#40e0d0",
                    "#ff7373",
                    "#800000",
                    "#800080",
                    "#00ff00",
                    "#333333",
                    "#ff7f50",
                    "#c0d6e4",
                    "#808080",
                    "#ffff66",
                    "#3399ff",
                    "#ff4444",*/

                    /*],*/
            }
        ] 

    }, 
        options: {
                scales: {
                    xAxes: [{
                        stacked: false,
                        beginAtZero: true,
                        scaleLabel: {
                            labelString: 'Month'
                        },
                        ticks: {
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }]
                }
            }

    }) 
}
</script>
@endpush