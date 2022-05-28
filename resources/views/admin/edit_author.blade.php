@extends('admin.layout.index')
<style>
    <?php if($user): ?>
    <?php if($user->payment == 'mobile_money'): ?>
        .bank_fields{
            display: none;
        }
    <?php elseif($user->payment == 'bank_settelments'): ?>
        .mobile_money_fields{
            display: none;
        }
    <?php endif; ?>
    <?php else: ?>
        .mobile_money_fields, .bank_fields{
            display: none;
        }
    <?php endif; ?>
</style>
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
    <form id="basic-validation" action="{{ route('admin.author_profile_update', $user->id) }}" method="POST" enctype="multipart/form-data">
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
                                <label class="radio-inline me-3"><input type="radio" class="cover_type" data-size="1350x500" name="cover_type" value="landscape" <?php if($user->cover_type == 'landscape'){echo 'checked';} ?> required> Landscape?</label>
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
                                <label class="radio-inline me-3"><input type="radio" name="payment" onclick="paymentFields('mobile_money_fields', 'bank_fields')" value="mobile_money" <?php if($user->payment == 'mobile_money'){ echo 'checked'; } ?> required> Mobile Money</label>
                                <label class="radio-inline me-3"><input type="radio" name="payment" onclick="paymentFields('bank_fields', 'mobile_money_fields')" value="bank_settelments" <?php if($user->payment == 'bank_settelments'){ echo 'checked'; } ?> required> Bank Settelments</label>
                            </div>
                        </div>
                        <div class="mobile_money_fields">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="account_name">Account Name</label>
                                    <input class="form-control form-control-lg" name="account_name" type="text" id="account_name" value="{{ $user->account_name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="account_number">Account Number</label>
                                    <input class="form-control form-control-lg" name="account_number" type="text" id="account_number" value="{{ $user->account_number }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="networks">Mobile Money Networks</label>
                                    <select class="form-control form-control-lg" name="networks" required>
                                        <option <?php if($user->networks == 'mtn'){echo 'selected';} ?> value="mtn">MTN</option>
                                        <option <?php if($user->networks == 'at'){echo 'selected';} ?> value="at">AIrtelTigo</option>
                                        <option <?php if($user->networks == 'vc'){echo 'selected';} ?> value="vc">Vodafone Cash</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bank_fields">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="bank_account_name">Bank Account Name</label>
                                    <input class="form-control form-control-lg" name="bank_account_name" type="text" id="bank_account_name" value="{{ $user->bank_account_name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="bank_account_number">Bank Account Number</label>
                                    <input class="form-control form-control-lg" name="bank_account_number" type="text" id="bank_account_number	" value="{{ $user->bank_account_number	 }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="branch">Branch</label>
                                    <input class="form-control form-control-lg" name="branch" type="text" id="branch" value="{{ $user->branch }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="bank_name">Bank Name</label>
                                    <input class="form-control form-control-lg" name="bank_name" type="text" id="bank_name" value="{{ $user->bank_name }}" required>
                                </div>
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
<script>
    $(document).ready(function(){
        $('.cover_type').on('change',function(){
            var size = $(this).data('size');
            $('#size').html(size);
        });
    });
    function paymentFields(newClass, previousClass){
        $('.'+newClass).show();
        $('.'+previousClass).hide();
    }
</script>