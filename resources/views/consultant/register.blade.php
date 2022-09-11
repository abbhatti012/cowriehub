@extends('consultant.layout.index')
@section('content')
<style>
    .hard_cover, .digital_epub, .paper_back{
        display: none;
    }
    .iti--allow-dropdown{
        width: 100%;
    }
</style>
<div class="content-body">
   <div class="container-fluid">
      <div class="row page-titles">
         <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">My Consultant Account</a></li>
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
   @if(!$user)
    <form id="basic-validation" action="{{ route('consultant.consultant-signup') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bio Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="default_skill">Skills/Specialization</label>
                                <select class="form-control form-control-lg" name="skill" id="default_skill" required>
                                    <option value="" selected disabled>---Select Skill---</option>
                                   @forelse($skills as $skill)
                                    <option value="{{ $skill->skill }}">{{ $skill->skill }}</option>
                                   @empty
                                   @endforelse
                                   <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div style="display: none;" class="basic-form custom_file_input customSkill">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Custom Skill</span>
                                <div class="form-file">
                                    <input type="text" name="custom_skill" value="{{ old('custom_skill') }}" class="form-file-input form-control"  required>
                                </div>
                            </div>
                        </div>
                        <div class="basic-form custom_file_input">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Skills Certificate</span>
                                <div class="form-file">
                                    <input type="file" name="skill_certificate" class="form-file-input form-control"  required>
                                </div>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="address-country">Country Residance</label>
                                <select class="form-control form-control-lg" name="country" id="address-country"></select>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="phone">Address</label>
                                <input class="form-control form-control-lg" name="address"  value="{{ old('address') }}" type="text" id="address">
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="phone">Phone Number</label>
                                <input class="form-control form-control-lg" name="phone_number"  value="+233 " type="text" id="phone">
                            </div>
                        </div>
                       
                        <h4>Educational Background</h4><hr>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="institution">Institution</label>
                                <input class="form-control form-control-lg" name="institution" type="text" value="{{ old('institution') }}" id="institution"  required>
                            </div>
                        </div>
                        
                        <div class="basic-form">
                            <div class="mb-3 col-md-6">
                                <label for="year_of_completion">Year of completion</label>
                                <input class="form-control form-control-lg" name="year_of_completion" value="{{ old('year_of_completion') }}" type="date" id="year_of_completion" >
                            </div>
                            <div class="mb-3 col-md-6">
                                <input class="form-check-input" type="radio" name="present" id="present" value="present" >
                                <label class="form-check-label" for="present">
                                    Present?
                                </label>
                            </div>
                        </div>
                        <h4>National Identity</h4><hr>
                            <fieldset class="mb-3">
                                <div class="row">
                                    <label class="col-form-label col-sm-3 pt-0">ID Type:</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_type" id="natioanl_id" value="natioanl_id" checked="" required>
                                            <label class="form-check-label" for="natioanl_id">
                                                National ID
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_type" id="passport" value="passport" required>
                                            <label class="form-check-label" for="passport">
                                                Passport
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_type" id="driver_license" value="driver_license" required>
                                            <label class="form-check-label" for="driver_license">
                                                Drivers License
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="basic-form custom_file_input">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload ID</span>
                                    <div class="form-file">
                                        <input type="file" name="identity_card" class="form-file-input form-control" required>
                                    </div>
                                </div>
                            </div>
                            <h4>National Identity</h4><hr>
                            <div class="basic-form custom_file_input">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Selfie Verification</span>
                                    <div class="form-file">
                                        <input type="file" name="intro_viedo" class="form-file-input form-control" required accept="file_extension|audio/*|video/*|image/*|media_type">
                                    </div>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="description">Brief summary on their specialization and portfolio</label>
                                    <textarea name="description" class="form-file-input form-control" id="description" required>{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="basic-form custom_file_input">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload Portfolio</span>
                                    <div class="form-file" for="portfolio">
                                        <input type="file" name="portfolio" id="portfolio" class="form-file-input form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="basic-form custom_file_input">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="terms" id="terms" value="1" required>
                                    <label class="form-check-label" for="terms">
                                        I accept Terms and Conditions also privacy policy
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @elseif($user->status == 0)
    <form id="basic-validation" action="{{ route('consultant.update-consultant-signup', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bio Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="default_skill">Skills/Specialization</label>
                                <select class="form-control form-control-lg" name="skill" id="default_skill" required>
                                    <option value="" selected disabled>---Select Skill---</option>
                                   @forelse($skills as $skill)
                                    <option value="{{ $skill->skill }}" <?php if($skill->skill == $user->skill){echo 'selected';} ?>>{{ $skill->skill }}</option>
                                   @empty
                                   @endforelse
                                   <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div style="display: <?php if($user->custom_skill == ''){echo 'none';} ?>;" class="basic-form custom_file_input customSkill">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Custom Skill</span>
                                <div class="form-file">
                                    <input type="text" name="custom_skill" value="{{ $user->custom_skill }}" class="form-file-input form-control"  required>
                                </div>
                            </div>
                        </div>
                        <div class="basic-form custom_file_input">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Skills Certificate</span>
                                <div class="form-file">
                                    <input type="file" name="skill_certificate" class="form-file-input form-control">
                                </div>
                            </div>
                            <iframe src="{{ asset($user->skill_certificate) }}" frameborder="0"></iframe>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="address-country">Country Residance</label>
                                <select class="form-control form-control-lg" name="country" id="address-country"></select>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="phone">Address</label>
                                <input class="form-control form-control-lg" name="address"  value="{{ $user->address }}" type="text" id="address">
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="phone">Phone Number</label>
                                <input class="form-control form-control-lg" name="phone_number"  value="{{ $user->phone_number }}" type="text" id="phone">
                            </div>
                        </div>
                       
                        <h4>Educational Background</h4><hr>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="institution">Institution</label>
                                <input class="form-control form-control-lg" name="institution" type="text" value="{{ $user->institution }}" id="institution"  required>
                            </div>
                        </div>
                        
                        <div class="basic-form">
                            <div class="mb-3 col-md-6">
                                <label for="year_of_completion">Year of completion</label>
                                @if($user->year_of_completion == 'present')
                                <input class="form-control form-control-lg" name="year_of_completion" value="" type="date" id="year_of_completion" >
                                @else
                                <input class="form-control form-control-lg" name="year_of_completion" value="{{ $user->year_of_completion }}" type="date" id="year_of_completion" >
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <input class="form-check-input" type="radio" name="present" id="present" value="present" <?php if($user->year_of_completion == 'present'){echo 'checked';} ?>>
                                <label class="form-check-label" for="present">
                                    Present?
                                </label>
                            </div>
                        </div>
                        <h4>National Identity</h4><hr>
                            <fieldset class="mb-3">
                                <div class="row">
                                    <label class="col-form-label col-sm-3 pt-0">ID Type:</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_type" id="natioanl_id" value="natioanl_id" <?php if($user->id_type == 'natioanl_id'){echo 'checked';} ?> required>
                                            <label class="form-check-label" for="natioanl_id">
                                                National ID
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_type" id="passport" value="passport" <?php if($user->id_type == 'passport'){echo 'checked';} ?> required>
                                            <label class="form-check-label" for="passport">
                                                Passport
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="id_type" id="driver_license" value="driver_license" <?php if($user->id_type == 'driver_license'){echo 'checked';} ?> required>
                                            <label class="form-check-label" for="driver_license">
                                                Drivers License
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="basic-form custom_file_input">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload ID</span>
                                    <div class="form-file">
                                        <input type="file" name="identity_card" class="form-file-input form-control">
                                    </div>
                                </div>
                                <iframe src="{{ asset($user->identity_card) }}" frameborder="0"></iframe>
                            </div>
                            <h4>National Identity</h4><hr>
                            <div class="basic-form custom_file_input">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload Self Video</span>
                                    <div class="form-file">
                                        <input type="file" name="intro_viedo" class="form-file-input form-control" accept="file_extension|audio/*|video/*|image/*|media_type">
                                    </div>
                                </div>
                                <iframe src="{{ asset($user->intro_viedo) }}" frameborder="0"></iframe>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="description">Brief summary on their specialization and portfolio</label>
                                    <textarea name="description" class="form-file-input form-control" id="description" required>{{ $user->description }}</textarea>
                                </div>
                            </div>
                            <div class="basic-form custom_file_input">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload Portfolio</span>
                                    <div class="form-file" for="portfolio">
                                        <input type="file" name="portfolio" id="portfolio" class="form-file-input form-control">
                                    </div>
                                </div>
                                <iframe src="{{ asset($user->portfolio) }}" frameborder="0"></iframe>
                            </div>
                            <div class="basic-form custom_file_input">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="terms" id="terms" value="1"  <?php if($user->terms == 1){echo 'checked';} ?> required>
                                    <label class="form-check-label" for="terms">
                                        I accept Terms and Conditions also privacy policy
                                    </label>
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
    <div class="col-12"><hr>
        <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
            <div class="row">
                <div class="table-responsive mb-4">
                    <h4 class="text-primary"><i class="fas fa-plus"></i> Edit Profile</h4>
                    <p class="text-muted"></p>
                
                        <table class="table table-hover table-borderless">
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th>Detail</th>
                                </tr>
                                <tr>
                                    <th>Skill:</th>
                                    <td>{{ $user->skill }}</td>
                                </tr>
                                <tr>
                                    <th>Skill Certificate:</th>
                                    <td><iframe style="width: 70%; height: 300px;" src="{{ asset($user->skill_certificate) }}" frameborder="0"></iframe></td>
                                </tr>
                                <tr>
                                    <th>Phone Number:</th>
                                    <td>{{ $user->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Country:</th>
                                    <td>{{ $user->country }}</td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                <tr>
                                    <th>Institution:</th>
                                    <td>{{ $user->institution }}</td>
                                </tr>
                                <tr>
                                    <th>Year of completion:</th>
                                    <td>{{ $user->year_of_completion }}</td>
                                </tr>
                                <tr>
                                    <th>ID Type:</th>
                                    <td>{{ $user->id_type }}</td>
                                </tr>
                                <tr>
                                    <th>Identity Card:</th>
                                    <td><iframe style="width: 70%; height: 300px;" src="{{ asset($user->identity_card) }}" frameborder="0"></iframe></td>
                                </tr>
                                <tr>
                                    <th>Self Introduction:</th>
                                    <td><iframe style="width: 70%; height: 300px;" src="{{ asset($user->intro_viedo) }}" frameborder="0"></iframe></td>
                                </tr>
                                <tr>
                                    <th>Portfolio:</th>
                                    <td><iframe style="width: 70%; height: 300px;" src="{{ asset($user->portfolio) }}" frameborder="0"></iframe></td>
                                </tr>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{ $user->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
   </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#default_skill').on('change',function(){
            var value = $('#default_skill option:selected').val();
            if(value == 'other'){
                $('.customSkill').show();
            } else {
                $('.customSkill').hide();
            }
        });
    });
</script>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<script src='https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js?1549804213570'></script>
<script>
    // International telephone format
    // $("#phone").intlTelInput();
    // get the country data from the plugin
    var countryData = window.intlTelInputGlobals.getCountryData(),
    input = document.querySelector("#phone"),
    addressDropdown = document.querySelector("#address-country");

    // init plugin
    var iti = window.intlTelInput(input, {
    hiddenInput: "full_phone",
    utilsScript: "https://intl-tel-input.com/node_modules/intl-tel-input/build/js/utils.js?1549804213570" // just for formatting/placeholders etc
    });

    // populate the country dropdown
    for (var i = 0; i < countryData.length; i++) {
    var country = countryData[i];
    var optionNode = document.createElement("option");
    optionNode.value = country.iso2;
    var textNode = document.createTextNode(country.name);
    optionNode.appendChild(textNode);
    addressDropdown.appendChild(optionNode);
    }
    // set it's initial value
    addressDropdown.value = iti.getSelectedCountryData().iso2;

    // listen to the telephone input for changes
    input.addEventListener('countrychange', function(e) {
    addressDropdown.value = iti.getSelectedCountryData().iso2;
    });

    // listen to the address dropdown for changes
    addressDropdown.addEventListener('change', function() {
    iti.setCountry(this.value);
    });
</script>
@endsection