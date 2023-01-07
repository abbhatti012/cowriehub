@extends('front.layout.index')
@section('content')
    <div class="ship-process padding-top-30 padding-bottom-30">
        <div class="container">
            <ul class="row">
                <li class="col-sm-3">
                    <div class="media-left"> <i class="fa fa-check"></i> </div>
                    <div class="media-body"> <span>Step 1</span>
                        <h6>Shopping Cart</h6>
                    </div>
                </li>

                <li class="col-sm-3 current">
                    <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                    <div class="media-body"> <span>Step 2</span>
                        <h6>Shipping Details</h6>
                    </div>
                </li>

                <li class="col-sm-3">
                    <div class="media-left"> <i class="fa fa-check"></i> </div>
                    <div class="media-body"> <span>Step 3</span>
                        <h6>Confirmation</h6>
                    </div>
                </li>

                <li class="col-sm-3">
                    <div class="media-left"> <i class="fa fa-check"></i> </div>
                    <div class="media-body"> <span>Step 4</span>
                        <h6>Payment Methods</h6>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="modal fade" id="preOrderModalModal" tabindex="-1" aria-labelledby="preOrderModalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center text-success" id="preOrderModalModalLabel">Add Address</h5>
                </div>
                <form action="{{ route('billing-detail') }}" method="post" id="basic-validations">
                    <div class="modal-body">
                        @csrf
                        <div class="pt-lg-3">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="js-form-message">
                                        <label for="first_name">First name *</label>
                                        <input type="text" class="form-control rounded-0 pl-3 placeholder-color-3" id="first_name" name="first_name" placeholder="Please enter your first name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="js-form-message">
                                        <label for="last_name">Last name *</label>
                                        <input type="text" class="form-control rounded-0 pl-3 placeholder-color-3" id="last_name" name="last_name" placeholder="Please enter your last name." required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="js-form-message">
                                        <label for="billing_country" class="form-label">Country <abbr class="required" title="required">*</abbr></label>
                                        <select name="country" required id="billing_country" class="form-control country_to_state country_select  select2-hidden-accessible"
                                            autocomplete="country" tabindex="-1" aria-hidden="true">
                                            <option value="">Select a country…</option>
                                            <option value="AX">Åland Islands</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="PW">Belau</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="VG">British Virgin Islands</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo (Brazzaville)</option>
                                            <option value="CD">Congo (Kinshasa)</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CW">Curaçao</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="CI">Ivory Coast</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Laos</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao S.A.R., China</option>
                                            <option value="MK">Macedonia</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia</option>
                                            <option value="MD">Moldova</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="KP">North Korea</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PS">Palestinian Territory</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Reunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russia</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="ST">São Tomé and Príncipe</option>
                                            <option value="BL">Saint Barthélemy</option>
                                            <option value="SH">Saint Helena</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="SX">Saint Martin (Dutch part)</option>
                                            <option value="MF">Saint Martin (French part)</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia/Sandwich Islands</option>
                                            <option value="KR">South Korea</option>
                                            <option value="SS">South Sudan</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syria</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB" selected="selected">United Kingdom (UK)</option>
                                            <option value="US">United States (US)</option>
                                            <option value="UM">United States (US) Minor Outlying Islands</option>
                                            <option value="VI">United States (US) Virgin Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VA">Vatican</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <div class="js-form-message">
                                        <label for="email">Email address *</label>
                                        <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="Please enter your email" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <div class="js-form-message">
                                        <label for="address">Street Address *</label>
                                        <input type="text" class="form-control rounded-0" name="address" id="address" required placeholder="Please enter your address">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <div class="js-form-message">
                                        <label for="phone">Phone *</label>
                                        <input type="text" class="form-control rounded-0" name="phone" id="phone" required placeholder="Please enter your phone">
                                    </div>
                                </div>
                            
                                <div class="col-md-12 mb-5">
                                    <div class="js-form-message">
                                        <label for="order_comments" class="form-label">Order notes (optional)</label>
                                        <textarea name="notes" class="input-text form-control" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="8" cols="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60 width-390">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="padding-bottom-60">
        <div class="container">
            <form name="checkout" method="post" class="checkout woocommerce-checkout row mt-8" action="{{ route('pay-now') }}" id="basic-validation-form" enctype="multipart/form-data" novalidate="novalidate">
                <input type="hidden" name="payment_id" id="payment_id">
                <input type="hidden" name="is_coupon" value="{{ $data['is_coupon'] }}">
                <input type="hidden" name="coupon_code" value="{{ $data['coupon_code'] }}">
            <div class="pay-method">
                <div class="row">
                     @csrf
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>Billing Address</h2>
                            <hr>
                        </div>
                        @if(isset($_REQUEST['ref']) && !empty($_REQUEST['ref']))
                            <input type="hidden" name="ref" value="<?= $_REQUEST['ref'] ?>">
                        @else
                            <input type="hidden" name="ref" value="">
                        @endif

                        @if($is_hide_address)
                            @if($billing)
                                <div class="form-check form-check-inline existing_address">
                                    <label class="form-check-label" for="existing_address"> Use an existing address?
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="existing_address" value="option1">
                                    </label>
                                </div>
                            @else
                                <div class="form-check form-check-inline existing_address_model">
                                    <label class="form-check-label" for="existing_address_model"> Add forever address!
                                        <input class="form-check-input" type="radio" data-toggle="modal" data-target="#preOrderModalModal" name="existing_address_model" id="existing_address_model" value="option1">
                                    </label>
                                </div>
                            @endif
                        @endif
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="billing_first_name" class="form-label">First name <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text form-control" name="billing_first_name" id="billing_first_name" placeholder="" autocomplete="given-name" autofocus="autofocus" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="billing_last_name" class="form-label">Last name <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text form-control" name="billing_last_name" id="billing_last_name" placeholder="" value="" autocomplete="family-name" required>
                            </div>
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="billing_country" class="form-label">Country <abbr class="required" title="required">*</abbr></label>
                                        <select name="billing_country" required id="billing_country" class="form-control country_to_state country_select  select2-hidden-accessible"
                                            autocomplete="country" tabindex="-1" aria-hidden="true">
                                            <option value="">Select a country…</option>
                                            <option value="AX">Åland Islands</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="PW">Belau</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="VG">British Virgin Islands</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo (Brazzaville)</option>
                                            <option value="CD">Congo (Kinshasa)</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CW">Curaçao</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="CI">Ivory Coast</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Laos</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao S.A.R., China</option>
                                            <option value="MK">Macedonia</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia</option>
                                            <option value="MD">Moldova</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="KP">North Korea</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PS">Palestinian Territory</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Reunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russia</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="ST">São Tomé and Príncipe</option>
                                            <option value="BL">Saint Barthélemy</option>
                                            <option value="SH">Saint Helena</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="SX">Saint Martin (Dutch part)</option>
                                            <option value="MF">Saint Martin (French part)</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia/Sandwich Islands</option>
                                            <option value="KR">South Korea</option>
                                            <option value="SS">South Sudan</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syria</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB" selected="selected">United Kingdom (UK)</option>
                                            <option value="US">United States (US)</option>
                                            <option value="UM">United States (US) Minor Outlying Islands</option>
                                            <option value="VI">United States (US) Virgin Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VA">Vatican</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="billing_address" class="form-label">Street address <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="input-text form-control" name="billing_address" id="billing_address" required placeholder="House number and street name" value="" autocomplete="address-line1">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <label for="billing_phone" class="form-label">Phone <abbr class="required" title="required">*</abbr></label>
                                <input type="tel" class="input-text form-control" name="billing_phone" id="billing_phone" required placeholder="" value="" autocomplete="tel">
                            </div>
                            <div class="col-sm-6">
                                <label for="billing_email" class="form-label">Email address <abbr class="required" title="required">*</abbr></label>
                                <input type="email" class="input-text form-control" name="billing_email" id="billing_email" required placeholder="" value="" autocomplete="email">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>Shipping Address</h2>
                            <hr>
                        </div>
                        <div class="row">
                        @if($is_hide_address && !empty($shipping))
                        <div class="col-sm-2">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="use_shipping_address">Use existing shipping address
                                <input class="form-check-input" type="radio" name="billingAddress" id="use_shipping_address" value="option1">
                            </label>
                        </div>
                        </div>
                        @else
                        <div class="col-sm-2">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="use_billing_address">Use billing address
                                <input class="form-check-input" type="radio" name="billingAddress" id="use_billing_address" value="option1">
                            </label>
                        </div>
                        </div>
                        @endif
                        <div class="col-sm-2">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="use_new_address">New Address?
                                    <input class="form-check-input" type="radio" name="billingAddress" id="use_new_address">
                                </label>
                            </div>
                        </div>
                        </div>
                            @if(Auth::check() && Auth::user()->role != 'pos')
                                Delivery Type:
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="standard"> Standard
                                                <input class="form-check-input" type="radio" id="standard" name="delivery" value="standard" checked>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="express"> Express
                                                <input class="form-check-input" type="radio" id="express" name="delivery" value="express">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $cart)
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="standardDelivery col-sm-12">
                                        <label for="precise_location"> Choose Location</label>
                                        <select name="shipping" class="shippingChargesStandard shippingCharges form-control">
                                            <option value="" selected disabled data-price="0">---Choose Location</option>
                                            @foreach($locations as $location)
                                            @if($location->type == 'standard')
                                            <option value="{{ $location->location }}" required data-price = "{{ $location->price * $currency->exchange_rate }}">{{ $location->location }} <small>({{ $currency->currency_code }} {{ $location->price * $currency->exchange_rate }})</small></option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="display: none;" class="expressDelivery col-sm-12">
                                    <label for="precise_location"> Choose Location</label>
                                        <select name="shipping" class="shippingChargesExpress shippingCharges form-control">
                                            <option value="" selected disabled data-price="0">---Choose Location</option>
                                            @foreach($locations as $location)
                                            @if($location->type == 'express')
                                            <option value="{{ $location->location }}" required data-price = "{{ $location->price * $currency->exchange_rate }}">{{ $location->location }} <small>({{ $currency->currency_code }} {{ $location->price * $currency->exchange_rate }})</small></option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <br><br>
                                    <br><br> 
                                    <div class="col-sm-6">
                                        <label for="precise_location"> Enter Location
                                            <input class="form-control" id="precise_location" required placeholder="Enter precise location" type="text">
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="post_code"> Ghana Digital Address
                                            <input class="form-control" id="post_code" name="post_code" placeholder="Ghana Digital Address" type="text">
                                        </label>
                                    </div>
                                </div>
                                @endif

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="shipping_first_name" class="form-label">First name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text form-control" name="shipping_first_name" id="shipping_first_name" placeholder="" autocomplete="given-name" autofocus="autofocus" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="shipping_last_name" class="form-label">Last name <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text form-control" name="shippinglast_name" id="shipping_last_name" placeholder="" value="" autocomplete="family-name" required>
                                </div>
                                <div class="col-xs-4">
                                    <label for="shipping_address" class="form-label">Street address <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" class="input-text form-control" name="shipping_address" id="shipping_address" required placeholder="House number and street name" value="" autocomplete="address-line1">
                                </div>
                                <div class="col-xs-4">
                                    <label for="shipping_phone" class="form-label">Phone <abbr class="required" title="required">*</abbr></label>
                                    <input type="tel" class="input-text form-control" name="shipping_phone" id="shipping_phone" required placeholder="" value="" autocomplete="tel">
                                </div>
                                <div class="col-xs-4">
                                    <label for="shipping_email" class="form-label">Email address <abbr class="required" title="required">*</abbr></label>
                                    <input type="shipping_email" class="input-text form-control" name="shipping_email" id="shipping_email" required placeholder="" value="" autocomplete="email">
                                </div>
                                <div class="col-xs-12">
                                    <label for="shipping_order_comments" class="form-label">Order notes (optional)</label>
                                    <textarea name="shipping_notes" class="input-text form-control" id="shipping_order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="8" cols="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pro-btn">
                    <a href="{{ route('cart') }}" class="btn-round btn-light">Back to Shopping Cart</a> 
                    @if(Auth::check() && Auth::user()->role != 'pos')
                        <input type="hidden" id="proceed" value="0">
                        <button type="submit" class="btn-round mb-5 proceedToCheckout">Go For Confirmation</button>
                    @else
                        <input type="hidden" id="proceed" value="1">
                        <button type="submit" class="btn-round mb-5 proceedForAddress">Go To Confirmation</button>
                    @endif
                </div>
            </form>
        </div>
    </section>

    @php $subtotal = 0; @endphp
    @if(session('cart'))
    @foreach(session('cart') as $id => $cart)
        
        @if($cart['is_preorder'] == 1)
            @php 
                $singlePrice = round((((($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity'])/100 )* 10), 2);
                $subtotal = $subtotal +  $singlePrice;
            @endphp
        @else
            @php 
                $singlePrice = ($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity'];
                $subtotal = $subtotal +  $singlePrice;
            @endphp
        @endif
    @endforeach
    @endif
    <input type="hidden" class="totalPrice">
    <input type="hidden" class="subtotalValue" value="{{ $subtotal }}">
@endsection
@section('scripts')
        @if($billing)
            <script>
                $(document).on('ready',function(){
                    $('#existing_address').on('change',function(){
                        $('#billing_first_name').val("{{ $billing['first_name'] }}");
                        $('#billing_last_name').val("{{ $billing['last_name'] }}");
                        $("#billing_country option").filter(function() {
                            return $(this).val() == "{{ $billing['country'] }}";
                        }).attr('selected', true);
                        $('#billing_address').val("{{ $billing['address'] }}");
                        $('#billing_email').val("{{ $billing['email'] }}");
                        $('#billing_phone').val("{{ $billing['phone'] }}");
                        $('#billing_order_comments').val("{{ $billing['notes'] }}");
                    });
                });
            </script>
        @endif
        @if($shipping)
        <script>
            $(document).on('ready',function(){
                $('.use_shipping_address').on('change',function(){
                    $('#shipping_first_name').val("{{ $shipping['first_name'] }}");
                    $('#shipping_last_name').val("{{ $shipping['last_name'] }}");
                    $("#shipping_country option").filter(function() {
                        return $(this).val() == "{{ $shipping['country'] }}";
                    }).attr('selected', true);
                    $('#shipping_address').val("{{ $shipping['address'] }}");
                    $('#shipping_email').val("{{ $shipping['email'] }}");
                    $('#shipping_phone').val("{{ $shipping['phone'] }}");
                    $('#shipping_order_comments').val("{{ $shipping['notes'] }}");
                });
            });
        </script>
        @endif
    <script>
        var is_submit = 0;
        $(document).on('ready',function(){
            $('#use_billing_address').on('change',function(){
                $('#shipping_first_name').val($('#billing_first_name').val());
                    $('#shipping_last_name').val($('#billing_last_name').val());
                    $("#shipping_country option").val($('#billing_country').val()).attr('selected', true);
                    $('#shipping_address').val($('#billing_address').val());
                    $('#shipping_email').val($('#billing_email').val());
                    $('#shipping_phone').val($('#billing_phone').val());
            })
            $('#use_new_address').on('change',function(){
                $('#shipping_first_name').val('');
                    $('#shipping_last_name').val('');
                    $("#shipping_country option").val('');
                    $('#shipping_address').val('');
                    $('#shipping_email').val('');
                    $('#shipping_phone').val('');
            })
            $('input[name="delivery"]').on('change',function(){
                var type = $(this).val();
                if(type == 'standard'){
                    $('.standardDelivery').show();
                    $('.expressDelivery').hide();
                } else if(type == 'express'){
                    $('.expressDelivery').show();
                    $('.standardDelivery').hide();
                }
           });
            
            $("#basic-validation-form").validate({
                submitHandler: function (form) {
                    var proceed = $('#proceed').val();
                    if (proceed == 1 && is_submit == 0){
                        proceedForAddress(); return false;
                    } else if(proceed == 0 && is_submit == 0) {
                        proceedToCheckout(); return false;
                    } else {
                        form.submit; return true;
                    }
                }
            })
            
            function proceedToCheckout(){
                var shippingCharges = $('.shippingCharges option:selected').val();
                var preciseLocation = $('#precise_location').val();
                var postCode = $('#post_code').val();
                
                if(shippingCharges == ''){
                    $.notify('Please choose location');
                    return false;
                } else if(preciseLocation == ''){
                    $.notify('Please choose your precise location');
                    return false;
                } else {
                    $.ajax({
                        type : 'POST',
                        url : "{{ route('before-payment') }}",
                        data : {
                            '_token' : '{{ csrf_token() }}',
                            shippingCharges : shippingCharges,
                            preciseLocation : preciseLocation,
                            postCode : postCode,
                            totalPrice : parseInt($('.totalPrice').val()),
                            subTotal : parseInt($('.subtotalValue').val()),
                            shippingPrice : parseInt($('.shippingCharges option:selected').data('price'))
                        },
                        success : function(data){
                            is_submit = 1;
                            $('#payment_id').val(data);
                            $('#basic-validation-form').submit();
                            // location.href = "{{ route('checkout') }}?token="+data;
                        }
                    });
                }
            };
            function proceedForAddress(){
                $.ajax({
                    type : 'POST',
                    url : "{{ route('pos-before-payment') }}",
                    data : {
                        '_token' : '{{ csrf_token() }}',
                        totalPrice : parseInt($('.totalPrice').val()),
                        subTotal : parseInt($('.subtotalValue').val()),
                    },
                    success : function(data){
                        is_submit = 1;
                        $('#payment_id').val(data);
                        $('#basic-validation-form').submit();
                        // location.href = "{{ route('checkout') }}?token="+data;
                    }
                });
            };
            var shippingPriceStandard = $('.subtotalValue').val();
            var totalPrice = $('.totalPrice').text();
            $(document).on('change','.shippingChargesStandard',function(){
                $('.shippingChargesStandard option:selected').each(function(){
                    var price = $(this).data('price');
                    $('.totalPrice').val(+shippingPriceStandard + +price);
                });
            });
            var shippingPriceExpress = $('.subtotalValue').val();
            $(document).on('change','.shippingChargesExpress',function(){
                $('.shippingChargesExpress option:selected').each(function(){
                    var price = $(this).data('price')
                    $('.totalPrice').val(+shippingPriceExpress + +price);
                });
            });
        });
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeEQgpHcPzV4BwOa60xgE9AwhlofidWh8&libraries=places"></script>
    <script>
        function initialize() {
          var input = document.getElementById('precise_location');
          var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('city2').value = place.name;
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
