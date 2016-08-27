@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Statistics</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <h2>Кількість дзвінків</h2>
                                <p><?= $total_calls; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h2>Кількість вхідних дзвінків</h2>
                                <p><?= $incoming_calls; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h2>Кількість вихідних дзвінків</h2>
                                <p><?= $outgoing_calls; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <h2>Середня тривалість дзвінка</h2>
                                <p><?= $avg_duration; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h2>Максимальна тривалість дзвінка</h2>
                                <p><?= $max_duration; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <h2>Найбільш часто вживаний Номер Б</h2>
                                <p><?= $most_recent_number; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop