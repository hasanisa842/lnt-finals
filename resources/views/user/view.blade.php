@extends('user.layout')

@section('content')

<div class="row">
    <div class="col-lg-12" style="text-align: center">
        <div >
            <h2>PT Mentol</h2>
        </div>
        <br/>
    </div>
</div>

    <table class="table table-bordered">
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Amount</th>
        <th>Price</th>
        <th width="280px">Action</th>
    </tr>

@foreach ($items as $item)
    <tr {{ $item->id }}>
    <td>{{ $item->id }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->category }}</td>
    <td>{{ $item->amount }}</td>
    <td>{{ $item->price }}</td>
    <td>

<form action="{{ route('user.show',$item->id) }}" method="GET">
    <a class="btn btn-info" id="show-item" data-toggle="modal" data-id="{{ $item->id }}" >Show</a>
    <a href="javascript:void(0)" class="btn btn-success" id="edit-item" data-toggle="modal" data-id="{{ $item->id }}">Edit </a>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</form>
</td>
</tr>
@endforeach

</table>
    {!! $items->links() !!}

<div class="modal fade" id="crud-modal-show" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-name" id="itemCrudModal-show"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2"></div>
                        <div class="col-xs-10 col-sm-10 col-md-10 ">
                        @if(isset($item->name))
                            <table>
                                <tr><td><strong>Name:</strong></td><td>{{$item->name}}</td></tr>
                                <tr><td><strong>Category:</strong></td><td>{{$item->category}}</td></tr>
                                <tr><td><strong>Amount:</strong></td><td>{{$item->amount}}</td></tr>
                                <tr><td><strong>Price:</strong></td><td>{{$item->price}}</td></tr>
                                <tr><td colspan="2" style="text-align: right "><a href="{{ route('user.index') }}" class="btn btn-danger">OK</a> </td></tr>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection