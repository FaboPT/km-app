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
    {{ Form::model($item, [
                 'route'=>['vehicles.update',$item->id],
                 'method'=>'PUT',
                 'accept-charset'=>'UTF-8',
                 'class'=>'form-horizontal'
         ])}}


    <div class="row">
        <div class="col-md-2">

            @include('layouts.includes.back_button')
        </div>

        <div class="col-md-8">
            <h2 style="text-align: center"> {{__('vehicles.edit')}}: <b>{{$item->model}}</b></h2>
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
                    {{Form::File('photo',['class'=>'form-control','placeholder'=>'Photo'])}}
                </div>
            </div>

            <div class="form-group row">
                {{Form::label('url_photo','Url Photo:',['class'=>'col-lg-2 col-form-label'])}}
                <div class="col-lg-10">
                    {{Form::text('url_photo','https://', ['class'=>'form-control'])}}
                </div>
            </div>

            {{Form::submit(__('vehicles.save'), ['class'=>'btn btn-outline-primary float-right'])}}
        </div>
    </div>
    {{ Form::close()}}


@stop

