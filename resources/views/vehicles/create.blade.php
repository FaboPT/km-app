@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Html::form()->method('POST')->action(route('vehicles.store'))->class('form-horizontal')->acceptsFiles()->open() !!}


    <div class="row">
        <div class="col-md-2">

            @include('layouts.includes.back_button')
        </div>

        <div class="col-md-8">
            <h2 style="text-align: center"> {{__('vehicles.create')}}</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-group row">
                {!! Html::label('Year:', 'year_date')->class('col-lg-2 col-form-label') !!}
                <div class="col-lg-10">
                    {!! Html::text('year_date')->class('form-control')->placeholder('Year')->required() !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Html::label('Make:', 'make')->class('col-lg-2 col-form-label') !!}
                <div class="col-lg-10">
                    {!! Html::text('make')->class('form-control')->placeholder('Make')->required() !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Html::label('Model:', 'model')->class('col-lg-2 col-form-label') !!}
                <div class="col-lg-10">
                    {!! Html::text('model')->class('form-control')->placeholder('Model')->required() !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Html::label('Avg Consume per km:', 'avg_consume')->class('col-lg-2 col-form-label') !!}
                <div class="col-lg-10">
                    {!! Html::text('avg_consume')->class('form-control')->placeholder('Avg Consume per km')->required() !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Html::label('Tank Capacity:', 'tank_capacity')->class('col-lg-2 col-form-label') !!}
                <div class="col-lg-10">
                    {!! Html::number('tank_capacity')->class('form-control')->placeholder('Tank Capacity')->required() !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Html::label('Photo:', 'photo')->class('col-lg-2 col-form-label') !!}
                <div class="col-lg-10">
                    {!! Html::file('photo')->class('form-control') !!}
                </div>
            </div>

            <div class="form-group row">
                {!! Html::label('Url Photo:', 'url_photo')->class('col-lg-2 col-form-label') !!}
                <div class="col-lg-10">
                    {!! Html::text('url_photo')->class('form-control')->placeholder('https://example.com') !!}
                </div>
            </div>

            {!! Html::submit(__('vehicles.button.create'))->class('btn btn-outline-primary float-right') !!}
        </div>
    </div>
    </form>


@stop
