@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'search', 'method' => 'POST','id'=>'calculate-results']) !!}
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        {{Form::label('vehicle_id','Vehicle:',['class'=>'col-lg-2 col-form-label'])}}
                        <div class="col-lg-10">
                            {{Form::select('vehicle_id',[null=>null]+$vehicles,null,['class'=>'form-control select2', 'required', 'data-placeholder'=>'Select an a vehicle'])}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                {{Form::label('pointALatitude','Departure latitude:',['class'=>'col-lg-4 col-form-label'])}}
                                <div class="col-lg-8">
                                    {{Form::text('pointALatitude',null,['class'=>'form-control', 'required', 'placeholder'=>'Departure latitude'])}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                {{Form::label('pointA','Departure longitude :',['class'=>'col-lg-4 col-form-label'])}}
                                <div class="col-lg-8">
                                    {{Form::text('pointALongitude',null,['class'=>'form-control', 'required', 'placeholder'=>'Departure longitude'])}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                {{Form::label('pointBLatitude','Arrival latitude:',['class'=>'col-lg-4 col-form-label'])}}
                                <div class="col-lg-8">
                                    {{Form::text('pointBLatitude',null,['class'=>'form-control', 'required', 'placeholder'=>'Arrival latitude'])}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                {{Form::label('pointBLongitude','Arrival longitude :',['class'=>'col-lg-4 col-form-label'])}}
                                <div class="col-lg-8">
                                    {{Form::text('pointBLongitude',null,['class'=>'form-control', 'required', 'placeholder'=>'Arrival longitude'])}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary float-right" id="search-trip">
                        calculate
                    </button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="showResultsSearch" class="card">
                <div class="card-body">
                    <b> Cost: </b> <span id="cost-price"></span>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('#showResultsSearch').hide();
        $('#calculate-results').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{route('search')}}',
                method: 'POST',
                dataType: 'json',
                data: $('#calculate-results').serialize(),
                success: function (data) {
                    $('#showResultsSearch').show();
                    $('#cost-price').text(data);
                }
            });
        });
    </script>
@endsection
