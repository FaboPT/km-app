@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('layouts.includes.back_button')
        </div>
        <div class="col-md-8">

            <h2 style="text-align: center">
                {{__('vehicles.vehicle')}}
            </h2>
        </div>
        <div class="col-md-2">
        </div>

    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Avg Consume Per km</th>
                    <th>Tank Capacity</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>{{$item->year_date}}</td>
                    <td>{{$item->make ? :''}}</td>
                    <td>{{$item->model ? : ''}}</td>
                    <td>{{$item->avg_consume ? : ''}}</td>
                    <td>{{$item->tank_capacity ? : ''}}</td>
                    <td>
                        <a href="{{route('vehicles.edit',$item->id)}}" data-widget="edit" data-toggle="tooltip"
                           title="" data-original-title="Edit">
                            <i class="fas fa-edit text-primary"></i>
                        </a>
                        <a href="" data-vehicle-name="{{$item->model}}" data-trid="{{$item->id}}"
                           onclick="$('.modal-vehicle-name').text($(this).data('vehicle-name'));
                                        $('#delete-vehicle').data('trid', $(this).data('trid'))" data-toggle="modal"
                           data-target="#deleteVehicleModal">
                            <i class="fas fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->




    <script>
        $("#delete-vehicle").on("click", function () {

            let trid = $(this).data('trid');

            if (trid) {
                $.ajax({
                    type: "DELETE",
                    url: "/vehicles/" + trid,
                    data: {
                        _token: "{{csrf_token()}}"
                    }
                })
                    .done(function () {
                        $("#deleteVehicleModal").modal('hide');
                        $('#tr_' + trid).hide('slow');

                    })
                    .fail(function () {
                        alert("error");
                    })
            } else {
                alert("error");
            }

        });
    </script>



@endsection
