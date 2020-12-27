<table id="example1" class="table vendor-table table-striped">
                        <thead class="vendor-head">
                            <tr>
                                <th>S.N.</th>
                                <th>Booked By</th>
                                <th>Bus</th>
                                <th>From</th>
                                <th>To</th>
                                @if($counter==1)
                                <th>Counter</th>
                                @endif
                                <th>Price</th>
                                <th>Date</th>
                                <th>Shift</th>
                                <th>Booked On</th>
                                
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($bookingReports as $report)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    {{$report->name}}<br>
                                    ({{$report->phone}})
                                </td>
                                <td>{{$report->bus->bus_name}}({{$report->bus->bus_number}})</td>
                                <td>{{$report->from}}</td>
                                <td>@if($report->sub_destination)
                                    {{$report->sub_destination}}
                                    @else
                                    {{$report->to}}
                                    @endif
                                </td>
                                @if($counter==1)
                                <td>{{$report->counter->name}}</td>
                                @endif
                                <td>{{$report->price}}</td>
                                <td>{{$report->date}}</td>
                                <td>{{$report->shift}}</td>
                                <td>{{$report->booked_on}}</td>

                            </tr>
                            @php($i++)
                            @endforeach
                        </tbody>
                    </table>