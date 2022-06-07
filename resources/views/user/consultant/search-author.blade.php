@extends('user.layout.index')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Search Author</a></li>
                </ol>
            </div>
            <div class="row page-titles">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Search Author</h4>
                        </div>
                        <form id="basic-validation" action="{{ route('author.sales') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="basic-form row col-md-12">
                                    <div class="col-xl-4 mb-3">
                                        <div class="input-group search-area">
                                            <input type="text" class="form-control typeahead" name="author" placeholder="Search Author">
                                            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script>
        $(document).ready(function(){
            var path = "{{ route('autocomplete') }}";
            $('input.typeahead').typeahead({
                source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                        return process(data);
                    });
                },
                updater: function(selection){
                    var response = JSON.stringify(selection)
                    response = JSON.parse(response);
                    setTimeout(function(){
                        location.href = "<?php echo route('author-detail', "") ?>/"+response.id;
                    },500)
                }
            });
        });
    </script>
@endsection