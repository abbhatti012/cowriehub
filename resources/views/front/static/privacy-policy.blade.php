@extends('front.layout.index')
@section('content')
<div class="linking">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">PRIVACY POLICY</li>
        </ol>
    </div>
</div>
<section class="padding-top-30">
    <main id="content">
        <div class="container">
            <div class="space-bottom-1 space-bottom-lg-2 space-bottom-xl-3">
                <div class="pb-lg-4">
                    <div class="py-4 py-lg-5 py-xl-8">
                        <h6 class="font-weight-medium font-size-7 font-size-xs-25 text-center">PRIVACY POLICY</h6>
                    </div>
                    <div class="mb-5 mb-lg-8">
                        <p><?= $setting->privacy_policy ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
@endsection