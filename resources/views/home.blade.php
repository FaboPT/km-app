@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Html::form()->method('POST')->action(route('search'))->id('calculate-results')->open() !!}
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        {!! Html::label('Vehicle:', 'vehicle_id')->class('col-lg-2 col-form-label') !!}
                        <div class="col-lg-10">
                            {!! Html::select('vehicle_id', ['' => ''] + $vehicles)->class('form-control select2')->required()->attribute('data-placeholder', 'Select an a vehicle') !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                {!! Html::label('Departure latitude:', 'pointALatitude')->class('col-lg-4 col-form-label') !!}
                                <div class="col-lg-8">
                                    {!! Html::text('pointALatitude')->class('form-control')->required()->placeholder('Departure latitude') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                {!! Html::label('Departure longitude :', 'pointA')->class('col-lg-4 col-form-label') !!}
                                <div class="col-lg-8">
                                    {!! Html::text('pointALongitude')->class('form-control')->required()->placeholder('Departure longitude') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                {!! Html::label('Arrival latitude:', 'pointBLatitude')->class('col-lg-4 col-form-label') !!}
                                <div class="col-lg-8">
                                    {!! Html::text('pointBLatitude')->class('form-control')->required()->placeholder('Arrival latitude') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                {!! Html::label('Arrival longitude :', 'pointBLongitude')->class('col-lg-4 col-form-label') !!}
                                <div class="col-lg-8">
                                    {!! Html::text('pointBLongitude')->class('form-control')->required()->placeholder('Arrival longitude') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary float-right" id="search-trip">
                        calculate
                    </button>
                </div>
            </div>

            </form>
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
