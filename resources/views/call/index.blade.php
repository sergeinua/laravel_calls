@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Calls list</div>
                    <div class="panel-body">

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
                                <td>call initialized</td>
                                <td>call connected</td>
                                <td>call finished</td>
                                <td>
                                    <a href="{{ URL::action('CallController@index',
                                    ['sort' => $sort_route]) }}">route</a>
                                </td>
                                <td>comment</td>
                            </tr>
                            @foreach($model as $item)

                                <tr>
                                    <td>{{ $item->sender_num }}</td>
                                    <td>{{ $item->recipient_num }}</td>
                                    <td>{{ $item->time_init }}</td>
                                    <td>{{ $item->time_connected }}</td>
                                    <td>{{ $item->time_finished }}</td>
                                    <td>{{ $item->route }}</td>
                                    <td>{{ $item->comment }}</td>
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