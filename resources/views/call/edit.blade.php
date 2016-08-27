@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Update a comment for the call # {{ $model->id }}</div>
                    <div class="panel-body">

                        {!! Form::open(['url' => "call/update/$model->id", 'method' => 'POST', 'class' => 'order clearfix']) !!}

                        <div class="form-group input-group-lg">
                            {!! Form::textarea('comment', $model->comment, ['placeholder' => 'comment', 'class' => 'form-control']) !!}
                        </div>

                        {!! Form::button('Update', ['id' => 'sub_form', 'type' => 'submit', 'class' => 'btn btn-lg btn-success']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop