@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('layouts.includes.back_button')
        </div>
        <div class="col-md-8">

            <h2 style="text-align: center">
                {{__('vehicles.vehicle')}}
                <small>List</small>
            </h2>
        </div>
        <div class="col-md-2">
            <h2>
                <a href="{{route('vehicles.create')}}" type="button" class="btn btn-success float-right "><i
                        class="nav-icon fas fa-plus-square"></i> {{__('vehicles.create')}}</a>
            </h2>
        </div>

    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped dataTables">
                <thead>
                <tr>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Avg Consume Per km</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($items as $item)
                    <tr id="tr_{{$item->id}}">
                        <td>{{$item->year_date}}</td>
                        <td>{{$item->make ? :''}}</td>
                        <td>{{$item->model ? : ''}}</td>
                        <td>{{$item->avg_consume ? : ''}}</td>
                        <td>
                            <a href="{{route('vehicles.show',$item->id)}}" data-widget="show" data-toggle="tooltip"
                               title="" data-original-title="Show">
                                <i class="fas fa-eye text-info"></i>
                            </a>
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
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Avg Consume Per km</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- Modal delete Vehicle -->
    <div class="modal" id="deleteVehicleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title modal-vehicle-name"></h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <h5>You want delete this vehicle!</h5>
                    <h5>Are you sure?</h5>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-danger" id="delete-vehicle">Delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


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
