@extends('front.layout.index')
@section('content')
<main id="content">
        <div class="py-3 py-lg-7">
            <h6 class="font-weight-medium font-size-7 text-center my-1">Contact Us</h6>
        </div>
        <div class="container">
            <div class="space-bottom-1 space-bottom-lg-2">
                <div class="pb-4">
                    <div class="col-lg-8 mx-auto">
                        <div class="bg-white mt-n10 mt-md-n13 pt-5 pt-lg-7 px-3 px-md-5 pl-xl-10 pr-xl-3">
                            <div class="ml-xl-4">
                            @if(Session::has('message'))
                                <div class="alert alert-{{session('message')['type']}}">
                                    {{session('message')['text']}}
                                </div>
                            @endif
                                <div>
                                    <h6 class="font-weight-medium font-size-10 mb-3 pb-xl-1">Add Necessary Detail</h6>
                                     <form id="basic-validation" action="{{ route('add-marketing-orders') }}" method="POST">
                                        <div class="row">
                                            @csrf
                                            <!-- Input -->
                                            <div class="col-sm-12 mb-5">
                                                <div class="js-form-message">
                                                    <label for="first_name">First Name</label>
                                                    <input id="first_name" type="text" class="form-control rounded-0" name="first_name" required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-5">
                                                <div class="js-form-message">
                                                    <label for="last_name">Last Name</label>
                                                    <input id="last_name" type="text" class="form-control rounded-0" name="last_name" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mb-5">
                                                <div class="js-form-message">
                                                    <label for="email">Email</label>
                                                    <input id="email" type="email" class="form-control rounded-0" name="email" required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-5">
                                                <div class="js-form-message">
                                                    <label for="phone">Phone</label>
                                                    <input id="phone" type="text" class="form-control rounded-0" name="phone" required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-5">
                                                <div class="js-form-message">
                                                    <label for="notes">Notes</label>
                                                    <textarea type="text" class="form-control rounded-0" name="notes" required=""></textarea>
                                                </div>
                                            </div>
                                                <input type="hidden" name="marketing_id" value="{{ $marketing_id }}">
                                            <div class="col d-flex justify-content-lg-start">
                                                <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60">Sumbit Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>

    </script>
@endsection