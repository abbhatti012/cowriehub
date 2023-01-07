@extends('front.layout.index')
@section('content')
    <section class="login-sec padding-top-30 padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5>Add Below Necessary Detail</h5>
                    @if(Session::has('message'))
                        <div class="alert alert-{{session('message')['type']}}">
                            {{session('message')['text']}}
                        </div>
                    @endif
                    <form id="basic-validation" action="{{ route('add-marketing-orders') }}" method="POST">
                        @csrf
                        <ul class="row">
                            <li class="col-md-6">
                                <label>First Name
                                    <input type="text" class="form-control"  name="first_name" required>
                                </label>
                            </li>
                            <li class="col-md-6">
                                <label>Last Name
                                    <input type="text" class="form-control"  name="last_name" required>
                                </label>
                            </li>
                            <li class="col-md-6">
                                <label>Email
                                    <input type="text" class="form-control" name="email" required>
                                </label>
                            </li>
                            <li class="col-md-6">
                                <label>Phone Number
                                    <input type="text" class="form-control" name="phone" placeholder="">
                                </label>
                            </li>
                            <li class="col-md-6">
                                <label>Notes
                                    <textarea type="text" class="form-control rounded-0" name="notes" required=""></textarea>
                                </label>
                            </li>
                        
                            <li class="col-sm-12 text-left">
                                <button type="submit" class="btn-round">Sumbit</button>
                            </li>
                        </ul>
                        <input type="hidden" name="marketing_id" value="{{ $marketing_id }}">
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>

    </script>
@endsection