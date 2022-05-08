<style>
    .row-cols-lg-3>*{
        flex: 0 0 50%;
        max-width: 50%;
    }
</style>
@extends('front.layout.index')
@section('content')
<main id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab">
                        <div class="pt-5 pt-lg-8 pl-md-5 pl-lg-9 space-bottom-2 space-bottom-lg-3 mb-xl-1">
                            <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Dashboard</h6>
                            <div class="ml-lg-1 mb-4">
                                <span class="font-size-22">Hello alitfn58</span>
                                <span class="font-size-2"> (not alitfn58? <a class="link-black-100" href="#">Log out</a>)</span>
                            </div>
                            <div class="mb-4">
                                <p class="mb-0 font-size-2 ml-lg-1 text-gray-600">From your account dashboard you can view your <span class="text-dark">recent orders,</span> manage your <span class="text-dark">shipping and billing addresses,</span> and edit your <span class="text-dark">password and account details.</span></p>
                            </div>
                            <div class="row no-gutters row-cols-1 row-cols-md-2 row-cols-lg-3">
                                <div class="col">
                                    <div class="border py-6 text-center">
                                        <a href="#" class="btn btn-primary rounded-circle px-4 mb-2">
                                            <span class="fa fa-user font-size-10 btn-icon__inner"></span>
                                        </a>
                                        <div class="font-size-3 mb-xl-1">Authors</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="border border-left-0 py-6 text-center">
                                        <a href="#" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                                            <span class="fa fa-book font-size-10 btn-icon__inner"></span>
                                        </a>
                                        <div class="font-size-3 mb-xl-1">Books</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="border border-left-0 py-6 text-center">
                                        <a href="#" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                                            <span class="fa fa-shopping-cart horn font-size-10 btn-icon__inner text-primary"></span>
                                        </a>
                                        <div class="font-size-3 mb-xl-1">Sales</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="border border-left-0 py-6 text-center">
                                        <a href="#" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                                            <span class="fa fa-bullhorn font-size-10 btn-icon__inner text-primary"></span>
                                        </a>
                                        <div class="font-size-3 mb-xl-1">Marketing Packages</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection