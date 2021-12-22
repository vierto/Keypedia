@extends('layout')
@section('container')

<table class="view-table" border="solid 1px">
    <thead>
        <tr>
            <th>History</th>
            <th>Transaction Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($histories as $history)
            <form action="/viewHistory/{{$history->id}}" method="POST">
                @csrf
                <tr>
                    <td>{{ $history->id }}</td>
                    <td><a href="/viewTransactionHistory/{{$history->id}}">{{ $history->transaction_history }}</a></td>
                </tr>
            </form>
        @endforeach
    </tbody>
</table>

@endsection