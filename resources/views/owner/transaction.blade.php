@extends('layouts.owner')

@section('title')
    <title>Transaction</title>
@endsection
@section('content')
@section('page_title')
    <h3 class="page-title mbot10">Transaction History</h3>
@endsection


<div class="col s12">
    @if($trans->count())
        <div class="table-responsive">
            <table class="table bordered striped ">
                <thead class="thead-inverse">
                <tr>
                    
                    <th>Date Created</th>
                    <th>Transaction Number</th>

                    <th>Description</th>
                    <th>Amount</th>
                  

                </tr>
                </thead>
                <tbody>
                @foreach($trans as $transaction)
                    <tr>
                        
                   
                        <td>{{$transaction->created_at}} </td>
                        <td>{{$transaction->ref_no}} </td>
                             <td>{{$transaction->description}}</td>
                        <td class="table-danger">RM {{ $transaction->amount }}</td>

                       
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$trans->links()}}
    @else
        <strong class="center-align">{{get_string('no_results')}}</strong>
    @endif
</div>
@endsection
