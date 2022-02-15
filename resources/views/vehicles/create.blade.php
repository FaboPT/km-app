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
    {{ Form::open([
                 'route'=>['vehicles.store'],
                 'method'=>'POST',
                 'accept-charset'=>'UTF-8',
                 'class'=>'form-horizontal',
                 'enctype'=>"multipart/form-data"
         ])}}


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
                {{Form::label('year_date','Year:',['class'=>'col-lg-2 col-form-label'])}}
                <div class="col-lg-10">
                    {{Form::text('year_date',null, ['class'=>'form-control','placeholder'=>'Year', 'required'])}}
                </div>
            </div>

            <div class="form-group row">
                {{Form::label('make','Make:',['class'=>'col-lg-2 col-form-label'])}}
                <div class="col-lg-10">
                    {{Form::text('make',null, ['class'=>'form-control','placeholder'=>'Make', 'required'])}}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label('model','Model:',['class'=>'col-lg-2 col-form-label'])}}
                <div class="col-lg-10">
                    {{Form::text('model',null, ['class'=>'form-control','placeholder'=>'Model', 'required'])}}
                </div>
            </div>

            <div class="form-group row">
                {{Form::label('avg_consume','Avg Consume per km:',['class'=>'col-lg-2 col-form-label'])}}
                <div class="col-lg-10">
                    {{Form::number('avg_consume',null, ['class'=>'form-control','placeholder'=>'Avg Consume per km', 'required'])}}
                </div>
            </div>

            <div class="form-group row">
                {{Form::label('photo','Photo:',['class'=>'col-lg-2 col-form-label'])}}
                <div class="col-lg-10">
                    {{Form::file('photo',['class'=>'form-control','placeholder'=>'Photo'])}}
                </div>
            </div>

            <div class="form-group row">
                {{Form::label('url_photo','Url Photo:',['class'=>'col-lg-2 col-form-label'])}}
                <div class="col-lg-10">
                    {{Form::text('url_photo',null, ['class'=>'form-control','placeholder'=>'https://example.com'])}}
                </div>
            </div>

            {{Form::submit(__('vehicles.button.create'), ['class'=>'btn btn-outline-primary float-right'])}}
        </div>
    </div>
    {{ Form::close()}}


@stop

