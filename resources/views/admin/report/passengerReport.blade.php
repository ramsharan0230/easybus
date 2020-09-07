@extends('layouts.admin')
@section('content')
  <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>All Tickets<small>EASYBUS</small></h1>
                <ol class="breadcrumb">
                    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Reports</a></li>
                    <li class="active">All Tickets</li>
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
                                                <h2>Tickets Sold In This Week</h2>
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
                                                <h2>Tickets Sold In This Month</h2>
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
	if ($("#total_passengers_week").length) { 
    var f = document.getElementById("total_passengers_week");
    new Chart(f, { type: "bar",
    data: { labels: ["Day=1", "Day=2","Day=3", "Day=4", "Day=5", "Day=6", "Today"], 
    datasets: 
        [
            { 
                label: "Sold Tickets", 
                data: [ 501,  310,  140, 657, 755, 436, 609,  ], 
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
    data: { labels: [1, 2, 3, 4, 5, 6, 7, 8 , 9 , 10, 11, 12, 13, 14 ,15 ,16 ,17 ,18,19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31], 
    datasets: 
        [
            { 
                label: "Sold Tickets", 
                data: [ 501,  310,  140,  238,  345, 543, 435, 234, 453, 354, 657, 755, 334, 431, 401, 541, 763, 436, 609, 809, 224, 549, 555, 345, 542, 233, 545, 654, 234, 514, 521,], 
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
</script>
@endpush