@extends('admin.layout.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Currency</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Currency</li>
                </ol>
            </div>
        </div>
    </div>
</div>
        @if(Session::has('message'))
            <div class="alert alert-{{session('message')['type']}}">
                {{session('message')['text']}}
            </div>
        @endif
        <div class="row">
        @if(isset($_REQUEST['type']) && $_REQUEST['type'] == 'update')
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Currency</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('admin.add-currency', $currency->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="currency_symbol">Currency Symbol</label>
                                    <input class="form-control form-control-lg" name="currency_symbol" type="text" value="{{ $currency->currency_symbol }}" id="currency_symbol" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="currency_code">Currency Code</label>
                                    <input class="form-control form-control-lg" name="currency_code" type="text" value="{{ $currency->currency_code }}" id="currency_code" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="exchange_rate">Exchange Rate (1 dollar to %%)</label>
                                    <input class="form-control form-control-lg" name="exchange_rate" type="text" value="{{ $currency->exchange_rate }}" id="exchange_rate" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
         @else
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Currency</h4>
                    </div>
                    <form id="basic-validation" action="{{ route('admin.add-currency', 'add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="basic-form row col-md-12">
                                <div class="mb-3 col-md-6">
                                    <label for="currency_symbol">Currency Symbol</label>
                                    <input class="form-control form-control-lg" name="currency_symbol" type="text" id="currency_symbol" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="currency_code">Currency Code</label>
                                    <input class="form-control form-control-lg" name="currency_code" type="text" id="currency_code" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="exchange_rate">Exchange Rate (1 dollar to %%)</label>
                                    <input class="form-control form-control-lg" name="exchange_rate" type="text" id="exchange_rate" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Currencies</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Currency Symbol</th>
                                        <th>Currency Code</th>
                                        <th>Exchange Rate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @forelse($currencies as $currency)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $currency->currency_symbol }}</td>
                                        <td>{{ $currency->currency_code }}</td>
                                        <td>{{ $currency->exchange_rate }}</td>
                                        
                                        <td>
                                            @if($currency->default)
                                                ---
                                            @else
                                                <a href="{{ route('admin.delete-currency', $currency->id) }}" class="btn btn-danger shadow btn-xs sharp" title="Delete Currency"><i class="fa fa-trash"></i></a>
                                                <a href="?type=update&id={{ $currency->id }}" class="btn btn-info shadow btn-xs sharp" title="Edit Currency"><i class="fa fa-pencil"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
@endsection