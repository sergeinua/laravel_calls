@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Calls list</div>
                    <div class="panel-body">

                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <table class="table-striped">
                            <tr>
                                <td>
                                    <a href="{{ URL::action('CallController@index',
                                    ['sort' => $sort_sender_num]) }}">sender num</a>
                                </td>
                                <td>
                                    <a href="{{ URL::action('CallController@index',
                                    ['sort' => $sort_recipient_num]) }}">recipient num</a>
                                </td>
                                <td>
                                    <p id="date_label">call initialized</p>
                                    {!! Form::open(['url' =>  '/', 'id' => 'date_picker_form', 'method' => 'get', 'class' => 'order clearfix']) !!}
                                    {!! Form::text('sort_date_start', '', ['id' => 'date_start', 'class' => 'datepicker', 'placeholder' => 'date from']) !!}
                                    {!! Form::text('sort_date_end', '', ['id' => 'date_end', 'class' => 'datepicker', 'placeholder' => 'date till']) !!}
                                    {!! Form::button('Sort', ['type' => 'submit', 'id' => 'date_form_submit', 'class' => 'btn btn-small btn-success']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>call connected</td>
                                <td>call finished</td>
                                <td>
                                    <a href="{{ URL::action('CallController@index',
                                    ['sort' => $sort_route]) }}">route</a>
                                </td>
                                <td>comment</td>
                                <td></td>
                                <td></td>
                            </tr>

                            @foreach($model as $item)

                                <tr>
                                    <td>{{ $item->sender_num }}</td>
                                    <td>{{ $item->recipient_num }}</td>
                                    <td>{{ date('d-m-Y H:i:s', $item->time_init) }}</td>
                                    <td>{{ date('d-m-Y H:i:s', $item->time_connected) }}</td>
                                    <td>{{ date('d-m-Y H:i:s', $item->time_finished) }}</td>
                                    <td>
                                        @if ($item->route == 0)
                                            incoming
                                        @else
                                            outgoing
                                        @endif
                                    </td>
                                    <td>{{ $item->comment }}</td>
                                    <td>
                                        <a href="{{ URL::action('CallController@edit',
                                            ['id' => $item->id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ URL::action('CallController@destroy',
                                            ['id' => $item->id]) }}"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach

                        </table>

                        {{ $model->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop