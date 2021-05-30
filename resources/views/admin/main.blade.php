@extends('admin.layout')

@section('content')

<div class="row">
    <div class="col-lg-12" style="text-align: center">
        <div >
            <h2>PT Mentol</h2>
        </div>
        <br/>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-item" data-toggle="modal">New item</a>
        </div>
    </div>
</div>
<br/>
    @if ($message = Session::get('success'))

<div class="alert alert-success">
    <p id="msg">{{ $message }}</p>
</div>
@endif

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

<form action="{{ route('admin.destroy',$item->id) }}" method="POST">
    <a class="btn btn-info" id="show-item" data-toggle="modal" data-id="{{ $item->id }}" >Show</a>
    <a href="javascript:void(0)" class="btn btn-success" id="edit-item" data-toggle="modal" data-id="{{ $item->id }}">Edit </a>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <a id="delete-item" data-id="{{ $item->id }}" class="btn btn-danger delete-user">Delete</a></td>
</form>
</td>
</tr>
@endforeach

</table>
    {!! $items->links() !!}

<div class="modal fade" id="crud-modal" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-name" id="itemCrudModal"></h4>
            </div>
        <div class="modal-body">
            <form name="itemForm" action="{{ route('admin.store') }}" method="POST">
            <input type="hidden" name="item_id" id="item_id" >
        @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" id="name" class="form-control" placeholder="name">
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                        <input type="text" name="category" id="category" class="form-control" placeholder="category">
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input type="text" name="amount" id="amount" class="form-control" placeholder="amount">
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" id="price" class="form-control" placeholder="price">
                    </div>
                </div>    
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>

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
                                <tr><td colspan="2" style="text-align: right "><a href="{{ route('admin.index') }}" class="btn btn-danger">OK</a> </td></tr>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection