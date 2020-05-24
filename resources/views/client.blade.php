@extends('layouts.app')
@section('title', 'Search Payments')
@section('content')
    <!-- Main container -->
    <div class="container">
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <!-- Search form -->
                <form method="GET" href="{{URL('search/'.$id)}}">
                    <div class="input-group mb-3">
                        <input type="text" name="daterange" class="form-control" value="{{date("Y/m/d")}} - {{date("Y/m/d")}}"/>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-search">Search</button>
                            <a href="{{ url('/clients') }}" type="submit" class="btn btn-outline-secondary">
                                Back
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <!-- Results data -->
                @if($requested)
                    @if (!empty($clientPayments))
                        @foreach($clientPayments as $key=>$payment)
                            <div class="alert alert-secondary" role="alert">
                                Amount: <b>{{$payment->amount}}</b> on: {{$payment->created_at}}
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-primary" role="alert">
                            I don't have any payments for this client!
                        </div>
                    @endif
                @endif
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>
    <!-- Init Date Range Picker -->
    <script type="text/javascript">
        $(function () {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }, function (start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection
