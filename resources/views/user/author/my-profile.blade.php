@extends('user.layout.index')
@section('content')
<div class="content-body">
   <div class="container-fluid">
      <div class="row page-titles">
         <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Author Profile</a></li>
         </ol>
      </div>
    @if(Session::has('message'))
        <div class="alert alert-{{session('message')['type']}}">
            {{session('message')['text']}}
        </div>
    @endif
    @if($user)
    <form id="basic-validation" action="{{ route('update-author-profile') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Become Author</h4>
                    </div>
                    @csrf
                    <div class="card-body">
                        <div class="basic-form custom_file_input">
                        <h3 for="instagram">Cover Type</h3>
                        <hr>
                        <div class="basic-form">
                            <div class="mb-3 mb-0">
                                <label class="radio-inline me-3"><input type="radio" class="cover_type" data-size="500x500" name="cover_type" value="portrait" <?php if($user->cover_type == 'portrait'){echo 'checked';} ?> required> Portrait?</label>
                                <label class="radio-inline me-3"><input type="radio" class="cover_type" data-size="1350x500" name="cover_type" value="landscape" <?php if($user->cover_type == 'portrait'){echo 'landscape';} ?> required> Landscape?</label>
                            </div>
                        </div>
                        <b>Size (<small id="size">1350x500</small>)</b>

                        @if($user && $user->cover)
                        <div class="input-group mb-3">
                            <img width="50%" src="{{ asset($user->cover) }}" id="commonImage1" alt="">
                        </div>
                        @else
                        <div class="input-group mb-3">
                            <img width="50%" src="{{ asset('no-image.jpg') }}" id="commonImage1" alt="">
                        </div>
                        @endif
                        <div class="input-group mb-3">
                            <span class="input-group-text">Cover Photo</span>
                            <div class="form-file">
                                <input type="file" name="cover" class="form-file-input form-control" onchange="loadFile(event, 'commonImage1')">
                            </div>
                        </div>
                        @if($user && $user->profile)
                        <div class="input-group mb-3">
                            <img width="50%" src="{{ asset($user->profile) }}" id="commonImage2" alt="">
                        </div>
                        @else
                        <div class="input-group mb-3">
                            <img width="50%" src="{{ asset('no-image.jpg') }}" id="commonImage2" alt="">
                        </div>
                        @endif
                        <div class="input-group mb-3">
                            <span class="input-group-text">Profile Photo</span>
                            <div class="form-file">
                                <input type="file" name="profile" class="form-file-input form-control" onchange="loadFile(event, 'commonImage2')">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bio Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="name">Pen Name</label>
                                <input class="form-control form-control-lg" name="name" type="text" id="name" value="{{ $user->name }}" required>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="biography">Auto(Biography)</label>
                                <textarea class="form-control" rows="8" name="biography" id="biography" required>{{ $user->biography }}</textarea>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="">Achievements</label>
                                <textarea class="form-control" rows="8" name="achievement" id="achievement">{{ $user->achievement }}</textarea>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="email">Work Email</label>
                                <input class="form-control form-control-lg" name="email" type="email" id="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="website">Website</label>
                                <input class="form-control form-control-lg" name="website" type="text" id="website" value="{{ $user->website }}">
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="facebook">Facebook</label>
                                <input class="form-control form-control-lg" name="facebook" type="text" id="facebook" value="{{ $user->facebook }}">
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="twitter">Twitter</label>
                                <input class="form-control form-control-lg" name="twitter" type="text" id="twitter" value="{{ $user->twitter }}">
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="instagram">Instagram</label>
                                <input class="form-control form-control-lg" name="instagram" type="text" id="instagram" value="{{ $user->instagram }}">
                            </div>
                        </div>
                        <h3 for="instagram">Payment Details</h3>
                        <hr>
                        <div class="basic-form">
                            <div class="mb-3 mb-0">
                                <label class="radio-inline me-3"><input type="radio" name="payment" value="mobile_money" <?php if($user->payment == 'mobile_money'){ echo 'checked'; } ?> required> Mobile Money</label>
                                <label class="radio-inline me-3"><input type="radio" name="payment" value="bank_settelments" <?php if($user->payment == 'bank_settelments'){ echo 'checked'; } ?> required> Bank Settelments</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @else
    <form id="basic-validation" action="{{ route('update-author-profile') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Become Author</h4>
                    </div>
                    @csrf
                    <div class="card-body">
                        <div class="basic-form custom_file_input">
                        <h3 for="instagram">Cover Type</h3>
                        <hr>
                        <div class="basic-form">
                            <div class="mb-3 mb-0">
                                <label class="radio-inline me-3"><input type="radio" class="cover_type" data-size="1350x500" name="cover_type" value="portrait" required> Portrait?</label>
                                <label class="radio-inline me-3"><input type="radio" class="cover_type" data-size="500x500" name="cover_type" value="landscape" required> Landscape?</label>
                            </div>
                        </div>
                        <b>Size (<small id="size">1350x500</small>)</b>

                        <div class="input-group mb-3">
                            <img width="50%" src="{{ asset('no-image.jpg') }}" id="commonImage1" alt="">
                        </div>
                     
                        <div class="input-group mb-3">
                            <span class="input-group-text">Cover Photo</span>
                            <div class="form-file">
                                <input type="file" name="cover" class="form-file-input form-control" onchange="loadFile(event, 'commonImage1')" required>
                            </div>
                        </div>
                       
                        <div class="input-group mb-3">
                            <img width="50%" src="{{ asset('no-image.jpg') }}" id="commonImage2" alt="">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Profile Photo</span>
                            <div class="form-file">
                                <input type="file" name="profile" class="form-file-input form-control" onchange="loadFile(event, 'commonImage2')" required>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bio Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="name">Pen Name</label>
                                <input class="form-control form-control-lg" name="name" type="text" id="name" required>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="biography">Auto(Biography)</label>
                                <textarea class="form-control" rows="8" name="biography" id="biography" required></textarea>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="">Achievements</label>
                                <textarea class="form-control" rows="8" name="achievement" id="achievement"></textarea>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="email">Work Email</label>
                                <input class="form-control form-control-lg" name="email" type="email" id="email">
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="website">Website</label>
                                <input class="form-control form-control-lg" name="website" type="text" id="website">
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="facebook">Facebook</label>
                                <input class="form-control form-control-lg" name="facebook" type="text" id="facebook">
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="twitter">Twitter</label>
                                <input class="form-control form-control-lg" name="twitter" type="text" id="twitter">
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="instagram">Instagram</label>
                                <input class="form-control form-control-lg" name="instagram" type="text" id="instagram">
                            </div>
                        </div>
                        <h3 for="instagram">Payment Details</h3>
                        <hr>
                        <div class="basic-form">
                            <div class="mb-3 mb-0">
                                <label class="radio-inline me-3"><input type="radio" name="payment" value="mobile_money" required> Mobile Money</label>
                                <label class="radio-inline me-3"><input type="radio" name="payment" value="bank_settelments" required> Bank Settelments</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif
   </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.cover_type').on('change',function(){
            var size = $(this).data('size');
            $('#size').html(size);
        });
    });
</script>
@endsection