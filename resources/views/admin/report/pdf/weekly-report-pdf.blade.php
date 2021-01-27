<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weekly Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="col-sm-12" style="margin-bottom: 20px">
            <h4>Weekly income Report ({{ 'From '.$dayOneWeekAgo.' To '.$todayDate }})</h4>
        </div>
    <div class="row">
        <div class="col-sm-12">
            <table id="example1" class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>S.N.</th>
                        <th>Bus Name</th>
                        <th>Bus No</th>
                        <th>Seat No. </th>
                        <th>Booked By/Phone</th>
                        <th>Booked Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Price(Rs. )</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                @foreach($weeklyTickets as $key=>$weeklyTicket)
                <tr>
                    <td>{{ $key+1 }}.</td>
                    <td>{{ $weeklyTicket->bus->bus_name }}</td>
                    <td>{{ $weeklyTicket->bus->bus_number }}</td>
                    <td>{{ $weeklyTicket->seat_id }}</td>
                    <td>{{ $weeklyTicket->name.'/'.$weeklyTicket->phone }}</td>
                    <td>{{ $weeklyTicket->booked_on }}</td>
                    <td>{{ $weeklyTicket->from }}</td>
                    <td>{{ $weeklyTicket->to }}</td>
                    <td>{{ $weeklyTicket->price }}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8"><strong>Total</strong></td>
                        <td><strong>{{ 'Rs'.'. '.$sumWeekly }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" 
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>