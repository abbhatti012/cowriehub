@extends('pos.layout.index')
@section('content')
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
    <?php else: ?>
        .bank_fields{
            display: none;
        }
    <?php endif; ?>
    <?php else: ?>
        .mobile_money_fields{
            display: none;
        }
        .bank_fields{
            display: none;
        }
    <?php endif; ?>
</style>
<div class="content-body">
   <div class="container-fluid">
      <div class="row page-titles">
         <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Add Payment Detail</a></li>
         </ol>
      </div>
    @if(Session::has('message'))
        <div class="alert alert-{{session('message')['type']}}">
            {{session('message')['text']}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
   @if($user)
    <form id="basic-validation" action="{{ route('pos.update-payment-detail') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 for="instagram">Payment Details</h3>
                        <hr>
                        <div class="basic-form">
                            <div class="mb-3 mb-0">
                                <label class="radio-inline me-3"><input type="radio" name="payment" onclick="paymentFields('mobile_money_fields', 'bank_fields')" value="mobile_money" <?php if($user->payment == 'mobile_money'){ echo 'checked'; } ?> required> Mobile Money</label>
                                <label class="radio-inline me-3"><input type="radio" name="payment" onclick="paymentFields('bank_fields', 'mobile_money_fields')" value="bank_settelments" <?php if($user->payment == 'bank_settelments'){ echo 'checked'; } ?> required> Bank Info</label>
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
                                    <label for="networks">Mobile Money Network</label>
                                    <select class="form-control form-control-lg" name="networks" required>
                                        <option <?php if($user->networks == 'mtn'){echo 'selected';} ?> value="mtn">MTN</option>
                                        <option <?php if($user->networks == 'at'){echo 'selected';} ?> value="at">AirtelTigo</option>
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
        </div>
    </form>
    @else
    <form id="basic-validation" action="{{ route('consultant.update-payment-detail') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 for="instagram">Payment Details</h3>
                        <hr>
                        <div class="basic-form">
                            <div class="mb-3 mb-0">
                                <label class="radio-inline me-3"><input type="radio" name="payment" onclick="paymentFields('mobile_money_fields', 'bank_fields')" value="mobile_money" required> Mobile Money</label>
                                <label class="radio-inline me-3"><input type="radio" name="payment" onclick="paymentFields('bank_fields', 'mobile_money_fields')" value="bank_settelments" required> Bank Info</label>
                            </div>
                        </div>
                        <div class="mobile_money_fields">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="account_name">Account Name</label>
                                    <input class="form-control form-control-lg" name="account_name" type="text" id="account_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="account_number">Account Number</label>
                                    <input class="form-control form-control-lg" name="account_number" type="text" id="account_number" required>
                                </div>
                                <div class="mb-3">
                                    <label for="networks">Mobile Money Network</label>
                                    <select class="form-control form-control-lg" name="networks" required>
                                        <option value="mtn">MTN</option>
                                        <option value="at">AirtelTigo</option>
                                        <option value="vc">Vodafone Cash</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bank_fields">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="bank_account_name">Bank Account Name</label>
                                    <input class="form-control form-control-lg" name="bank_account_name" type="text" id="bank_account_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="bank_account_number">Bank Account Number</label>
                                    <input class="form-control form-control-lg" name="bank_account_number" type="text" id="bank_account_number" required>
                                </div>
                                <div class="mb-3">
                                    <label for="branch">Branch</label>
                                    <input class="form-control form-control-lg" name="branch" type="text" id="branch" required>
                                </div>
                                <div class="mb-3">
                                    <label for="bank_name">Bank Name</label>
                                    <input class="form-control form-control-lg" name="bank_name" type="text" id="bank_name" required>
                                </div>
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
@section('scripts')
<script>
    $(document).ready(function(){
        
    });
    function paymentFields(newClass, previousClass){
        $('.'+newClass).show();
        $('.'+previousClass).hide();
    }
</script>
@endsection