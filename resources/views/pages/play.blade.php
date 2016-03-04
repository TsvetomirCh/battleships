@extends('app')

@section('title') Play @parent @endsection

@section('content')

    <div class="col-md-8">
        <table class="table table-bordered table-condensed">
            <thead>
            <tr>
                <th>#</th>
                @for ($i = 'A'; $i <= 'J'; $i ++)
                    <th>{{$i}}</th>
                @endfor
            </tr>
            </thead>
            <tbody>
            @for ($i = 1; $i <= 10; $i ++)
                <tr>
                    <td>{{$i}}</td>
                    @for ($k = 'A'; $k <= 'J'; $k ++)
                        <td><input type="button" class="btn btn-block btn-info" onclick="fire('{{$i}}','{{$k}}')" value=" " id="{{$i}}{{$k}}"></td>
                    @endfor
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Ship name:</th>
                    <th>Ship size</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ships as $ship)
                    <tr>
                        <td>{{$ship->getName()}}</td>
                        <td>{{$ship->getLength()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3 id="msg"></h3>
    </div>
@endsection