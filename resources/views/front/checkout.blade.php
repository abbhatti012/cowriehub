@extends('front.layout.index')
@section('content')
<div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Checkout</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ url('/') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="{{ route('cart') }}" class="h-primary">Cart</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Checkout
                </nav>
            </div>
        </div>
    </div>
    <div id="content" class="site-content bg-punch-light space-bottom-3">
        <div class="col-full container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article id="post-6" class="post-6 page type-page status-publish hentry">
                        <header class="entry-header space-top-2 space-bottom-1 mb-2">
                            <h4 class="entry-title font-size-7 text-center">Checkout</h4>
                        </header>
                        <!-- .entry-header -->

                        <div class="modal fade" id="preOrderModalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                        Add address
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="border-bottom">
                                            <form action="{{ route('billing-detail') }}" method="post" id="basic-validations">
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
                                                <div class="modal-footer border-top-0 d-flex text-right">
                                                    <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60 width-390">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="entry-content">
                            <div class="woocommerce">
                                <form name="checkout" method="post" class="checkout woocommerce-checkout row mt-8" action="{{ route('pay-now', $payment->id) }}" id="basic-validation" enctype="multipart/form-data" novalidate="novalidate">
                                    @csrf
                                    @if(isset($_REQUEST['ref']) && !empty($_REQUEST['ref']))
                                        <input type="hidden" name="ref" value="<?= $_REQUEST['ref'] ?>">
                                    @else
                                        <input type="hidden" name="ref" value="">
                                    @endif
                                    <div class="col2-set col-md-6 col-lg-7 col-xl-8 mb-6 mb-md-0" id="customer_details">
                                        <div class="px-4 pt-5 bg-white border">
                                            <div id="payment" class="woocommerce-checkout-payment">
                                                <ul class="wc_payment_methods payment_methods methods">
                                                    @if($is_hide_address)
                                                        @if($billing)
                                                            <li class="wc_payment_method existing_address">
                                                                <input id="existing_address" type="radio" class="input-radio">
                                                                <label for="existing_address">Use an existing address? </label>
                                                            </li>
                                                        @else
                                                            <li class="wc_payment_method existing_address_model" data-toggle="modal" data-target="#preOrderModalModal">
                                                                <input id="existing_address_model" type="radio" class="input-radio">
                                                                <label for="existing_address_model">Add forever address! </label>
                                                            </li>
                                                        @endif
                                                    @endif
                                                </ul>
                                            </div>

                                            <div class="woocommerce-billing-fields">

                                                <h3 class="mb-4 font-size-3">Billing Address</h3>

                                                <div class="woocommerce-billing-fields__field-wrapper row">
                                                    <p class="col-lg-6 mb-4d75 form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                                                        <label for="billing_first_name" class="form-label">First name <abbr class="required" title="required">*</abbr></label>
                                                        <input type="text" class="input-text form-control" name="billing_first_name" id="billing_first_name" placeholder="" autocomplete="given-name" autofocus="autofocus" required>
                                                    </p>

                                                    <p class="col-lg-6 mb-4d75 form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
                                                        <label for="billing_last_name" class="form-label">Last name <abbr class="required" title="required">*</abbr></label>
                                                        <input type="text" class="input-text form-control" name="billing_last_name" id="billing_last_name" placeholder="" value="" autocomplete="family-name" required>
                                                    </p>

                                                    <p class="col-12 mb-4d75 form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field" data-priority="40">
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
                                                    </p>

                                                    <p class="col-12 mb-3 form-row form-row-wide address-field validate-required" data-priority="50">
                                                        <label for="billing_address" class="form-label">Street address <abbr class="required" title="required">*</abbr></label>
                                                        <input type="text" class="input-text form-control" name="billing_address" id="billing_address" required placeholder="House number and street name" value="" autocomplete="address-line1">
                                                    </p>

                                                    <p class="col-12 mb-4d75 form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                                        <label for="billing_phone" class="form-label">Phone <abbr class="required" title="required">*</abbr></label>
                                                            <input type="tel" class="input-text form-control" name="billing_phone" id="billing_phone" required placeholder="" value="" autocomplete="tel">
                                                    </p>

                                                    <p class="col-12 mb-4d75 form-row form-row-last validate-required validate-email" id="billing_email_field" data-priority="110">
                                                        <label for="billing_email" class="form-label">Email address <abbr class="required" title="required">*</abbr></label>
                                                        <input type="email" class="input-text form-control" name="billing_email" id="billing_email" required placeholder="" value="" autocomplete="email">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="woocommerce-billing-fields">

                                                <h3 class="mb-4 font-size-3">Shipping details</h3>
                                                @if($is_hide_address && !empty($shipping))
                                                <div id="payment" class="woocommerce-checkout-payment">
                                                    <ul class="wc_payment_methods payment_methods methods">
                                                        <li class="wc_payment_method use_shipping_address">
                                                            <input id="use_shipping_address" type="radio" name="billingAddress" class="input-radio">
                                                            <label for="use_shipping_address">Use existing shipping address </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @else
                                                <div id="payment" class="woocommerce-checkout-payment">
                                                    <ul class="wc_payment_methods payment_methods methods">
                                                        <li class="wc_payment_method use_billing_address">
                                                            <input id="use_billing_address" type="radio" name="billingAddress" class="input-radio">
                                                            <label for="use_billing_address">Use billing address </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @endif
                                                <div id="payment" class="woocommerce-checkout-payment">
                                                    <ul class="wc_payment_methods payment_methods methods">
                                                        <li class="wc_payment_method use_new_address">
                                                            <input id="use_new_address" type="radio" name="billingAddress" class="input-radio">
                                                            <label for="use_new_address">New Address?</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="woocommerce-billing-fields__field-wrapper row">
                                                    <p class="col-lg-6 mb-4d75 form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                                                        <label for="shipping_first_name" class="form-label">First name <abbr class="required" title="required">*</abbr></label>
                                                        <input type="text" class="input-text form-control" name="shipping_first_name" id="shipping_first_name" placeholder="" autocomplete="given-name" autofocus="autofocus" required>
                                                    </p>

                                                    <p class="col-lg-6 mb-4d75 form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
                                                        <label for="shipping_last_name" class="form-label">Last name <abbr class="required" title="required">*</abbr></label>
                                                        <input type="text" class="input-text form-control" name="shippinglast_name" id="shipping_last_name" placeholder="" value="" autocomplete="family-name" required>
                                                    </p>

                                                    <p class="col-12 mb-4d75 form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field" data-priority="40">
                                                        <label for="shipping_country" class="form-label">Country <abbr class="required" title="required">*</abbr></label>
                                                        <select name="shipping_country" required id="shipping_country" class="form-control country_to_state country_select  select2-hidden-accessible"
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
                                                    </p>

                                                    <p class="col-12 mb-3 form-row form-row-wide address-field validate-required" data-priority="50">
                                                        <label for="shipping_address" class="form-label">Street address <abbr class="required" title="required">*</abbr></label>
                                                        <input type="text" class="input-text form-control" name="shipping_address" id="shipping_address" required placeholder="House number and street name" value="" autocomplete="address-line1">
                                                    </p>

                                                    <p class="col-12 mb-4d75 form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                                        <label for="shipping_phone" class="form-label">Phone <abbr class="required" title="required">*</abbr></label>
                                                            <input type="tel" class="input-text form-control" name="shipping_phone" id="shipping_phone" required placeholder="" value="" autocomplete="tel">
                                                    </p>

                                                    <p class="col-12 mb-4d75 form-row form-row-last validate-required validate-email" id="billing_email_field" data-priority="110">
                                                        <label for="shipping_email" class="form-label">Email address <abbr class="required" title="required">*</abbr></label>
                                                        <input type="shipping_email" class="input-text form-control" name="shipping_email" id="shipping_email" required placeholder="" value="" autocomplete="email">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-4 pt-5 bg-white border border-top-0 mt-n-one">
                                            <div class="woocommerce-additional-fields">
                                                <h3 class="mb-4 font-size-3">Additional information</h3>
                                                <div class="woocommerce-additional-fields__field-wrapper">
                                                    <p class="col-12 mb-4d75 px-0 form-row notes" id="order_comments_field" data-priority="">
                                                        <label for="shipping_order_comments" class="form-label">Order notes (optional)</label>
                                                        <textarea name="shipping_notes" class="input-text form-control" id="shipping_order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="8" cols="5"></textarea>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 id="order_review_heading" class="d-none">Your order</h3>
                                    <div id="order_review" class="col-md-6 col-lg-5 col-xl-4 woocommerce-checkout-review-order">
                                        <div id="checkoutAccordion" class="border border-gray-900 bg-white mb-5">
                                        @if($payment->is_preorder == 0)
                                            <div  class="p-4d875 border">
                                                <div id="checkoutHeadingOnee" class="checkout-head">
                                                    <a href="#" class="text-dark d-flex align-items-center justify-content-between"
                                                        data-toggle="collapse"
                                                        data-target="#checkoutCollapseOnee"
                                                        aria-expanded="true"
                                                        aria-controls="checkoutCollapseOnee">

                                                        <h3 class="checkout-title mb-0 font-weight-medium font-size-3">Your order</h3>

                                                        <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                        </svg>

                                                        <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                        </svg>
                                                    </a>
                                                </div>

                                                <div id="checkoutCollapseOnee" class="mt-4 checkout-content collapse show"
                                                    aria-labelledby="checkoutHeadingOnee"
                                                    data-parent="#checkoutAccordion">
                                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                                            @foreach(session('cart') as $id => $cart)
                                                            <tr class="cart_item">
                                                                <td class="product-name">
                                                                    {{ $cart['title'] }}&nbsp; <strong class="product-quantity">× {{ $cart['quantity'] }}</strong>
                                                                </td>
                                                                <td class="product-total">
                                                                    @if($cart['is_preorder'] == 1)
                                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol singlePrice{{$cart['id']}}">GHS <sup>{{ round((((($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity'])/100 )* 10), 2)  }}</sup>  <del>{{ ($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity']  }}</del></span>
                                                                    @else
                                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol singlePrice{{$cart['id']}}">GHS {{ ($cart['extraPrice'] + $cart['bookPrice']) * $cart['quantity']  }}</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            @endif

                                            <div  class="p-4d875 border">
                                                <div id="checkoutHeadingOne" class="checkout-head">
                                                    <a href="#" class="text-dark d-flex align-items-center justify-content-between"
                                                        data-toggle="collapse"
                                                        data-target="#checkoutCollapseOne"
                                                        aria-expanded="true"
                                                        aria-controls="checkoutCollapseOne">

                                                        <h3 class="checkout-title mb-0 font-weight-medium font-size-3">Cart Totals</h3>

                                                        <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                        </svg>

                                                        <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                @if($payment->is_preorder == 1)
                                                <div id="checkoutCollapseOne" class="mt-4 checkout-content collapse show"
                                                    aria-labelledby="checkoutHeadingOne"
                                                    data-parent="#checkoutAccordion">
                                                    <table class="shop_table shop_table_responsive">
                                                        <tbody>
                                                            <tr class="checkout-subtotal">
                                                                <th>Subtotal</th>
                                                                <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">GHS </span class="subTotalPrice">{{ $payment->subtotal }}</span></td>
                                                            </tr>

                                                            <tr class="order-shipping">
                                                                <th>Shipping</th>
                                                                <td data-title="Shipping">GHS 0</td>
                                                            </tr>
                                                            
                                                            <tr class="order-shipping">
                                                                <th>Total Price</th>
                                                                <td data-title="Shipping">GHS <span class="totalPrice">{{ $payment->subtotal }}</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @else
                                                <div id="checkoutCollapseOne" class="mt-4 checkout-content collapse show"
                                                    aria-labelledby="checkoutHeadingOne"
                                                    data-parent="#checkoutAccordion">
                                                    <table class="shop_table shop_table_responsive">
                                                        <tbody>
                                                            <tr class="checkout-subtotal">
                                                                <th>Subtotal</th>
                                                                <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">GHS </span><span class="subTotalPrice">{{ $payment->subtotal }}</span></span></td>
                                                            </tr>

                                                            <tr class="order-shipping">
                                                                <th>Shipping</th>
                                                                <td data-title="Shipping">GHS {{ $payment->shipping_price }}</td>
                                                            </tr>
                                                            
                                                            <tr class="order-shipping">
                                                                <th>Total Price</th>
                                                                <td data-title="Shipping">GHS <span class="totalPrice">{{ $payment->total_amount }}</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                            </div>
                                            @if(Auth::check() && Auth::user()->role != 'pos')
                                            <div class="p-4d875 border">
                                                <div id="checkoutHeadingThree" class="checkout-head">
                                                    <a href="#" class="text-dark d-flex align-items-center justify-content-between"
                                                        data-toggle="collapse"
                                                        data-target="#checkoutCollapseThree"
                                                        aria-expanded="true"
                                                        aria-controls="checkoutCollapseThree">

                                                        <h3 class="checkout-title mb-0 font-weight-medium font-size-3">Coupon</h3>

                                                        <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                        </svg>

                                                        <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                        </svg>
                                                    </a>
                                                </div>

                                                <div id="checkoutCollapseThree" class="mt-4 checkout-content collapse show"
                                                    aria-labelledby="checkoutHeadingThree"
                                                    data-parent="#checkoutAccordion">
                                                    <div class="coupon">
                                                        <label for="coupon_code">Coupon:</label>
                                                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code" autocomplete="off">
                                                        <input type="button" class="button" name="apply_coupon" id="apply_coupon" value="Apply coupon">
                                                    </div>
                                                    <div class="coupoMessage"></div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="p-4d875 border">
                                                <table  class="shop_table shop_table_responsive">
                                                    <tbody>
                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            @if($payment->is_preorder == 1)
                                                                <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">GHS  <span class="totalPrice">{{ $payment->subtotal }}</span></strong> </td>
                                                            @else
                                                                <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">GHS  <span class="totalPrice">{{ $payment->total_amount }}</span></strong> </td>
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        @if($role != 'pos')
                                            <div class="p-4d875 border">
                                                <div id="checkoutHeadingThreee" class="checkout-head">
                                                    <a href="#" class="text-dark d-flex align-items-center justify-content-between"
                                                        data-toggle="collapse"
                                                        data-target="#checkoutCollapseThreee"
                                                        aria-expanded="true"
                                                        aria-controls="checkoutCollapseThreee">

                                                        <h3 class="checkout-title mb-0 font-weight-medium font-size-3">Payment</h3>

                                                        <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                        </svg>

                                                        <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                
                                                <div id="checkoutCollapseThreee" class="mt-4 checkout-content collapse show"
                                                    aria-labelledby="checkoutHeadingThreee"
                                                    data-parent="#checkoutAccordion">
                                                    <div id="payment" class="woocommerce-checkout-payment">
                                                        <ul class="wc_payment_methods payment_methods methods">
                                                            <li class="wc_payment_method payment_method_bacs">
                                                                <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="flutterwave" required data-order_button_text="">

                                                                <label for="payment_method_bacs">By flutterwave</label>
                                                                <div class="payment_box payment_method_bacs" style="display: block;">
                                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                                </div>
                                                            </li>
                                                        @if(isset($location) && $location->is_cod == 1)
                                                        @else
                                                            <li class="wc_payment_method payment_method_cod">
                                                                <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="">

                                                                <label for="payment_method_cod">Cash on delivery </label>
                                                                <div class="payment_box payment_method_cod" style="display: block;">
                                                                    <p>Pay with cash upon delivery.</p>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <input type="hidden" id="is_coupon" name="is_coupon" value="0">
                                        <input type="hidden" id="coupon_value" name="coupon_code" value="">
                                        <div class="form-row place-order">
                                            <button type="submit" class="button alt btn btn-dark btn-block rounded-0 py-4" name="woocommerce_checkout_place_order" id="place_order" data-value="Place order">Place order</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </article>
                </main>
            </div>
        </div>
    </div>
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
            $('#apply_coupon').on('click',function(){
                var code = $('#coupon_code').val();
                if(code == ''){
                    $.notify('Please enter coupon code first')
                    return false;
                }
                $.ajax({
                    type : 'GET',
                    url : '{{ route("admin.check-coupon") }}',
                    data : {
                        code : code,
                        type : "{{ $payment->is_preorder }}",
                        token : "{{ $_GET['token'] }}"
                    },
                    success : function(data){
                        if(data.status == true){
                            for(var i = 0; i < data.data.length; i++){
                                $('.singlePrice'+data.data[i].id).text(data.data[i].price);
                            }
                            var totalPrice = $('.totalPrice').html();
                            var subTotalPrice = $('.subTotalPrice').html();
                            $('.subTotalPrice').html(+subTotalPrice - +data.totalPrice);
                            $('.coupoMessage').html('Congratulations you just saved GHS'+data.totalPrice);
                            $('.totalPrice').text(+totalPrice - +data.totalPrice)
                            $.notify('Coupon applied successfully','success');
                            $('.coupoMessage').css('color','green');
                            $('#apply_coupon').prop('disabled',true);
                            $('#coupon_code').val('');
                            $('#coupon_value').val(code);
                            $('#is_coupon').val(1);
                        } else {
                            $.notify(data.message);
                        }
                    }
                });
            });
        });
    </script>
@endsection
