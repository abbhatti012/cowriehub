@extends('front.layout.index')
@section('content')
    <main id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 border-right">
                    <h6 class="font-weight-medium font-size-7 pt-5 pt-lg-8  mb-5 mb-lg-7">My account</h6>
                    <div class="tab-wrapper">
                        <ul class="my__account-nav nav flex-column mb-0" role="tablist" id="pills-tab">
                            <li class="nav-item mx-0">
                                <a class="nav-link d-flex align-items-center px-0 active" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="false">
                                    <span class="font-weight-normal text-gray-600">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item mx-0">
                                <a class="nav-link d-flex align-items-center px-0" id="pills-two-example1-tab" data-toggle="pill" href="#pills-two-example1" role="tab" aria-controls="pills-two-example1" aria-selected="false">
                                    <span class="font-weight-normal text-gray-600">Orders</span>
                                </a>
                            </li>
                            <li class="nav-item mx-0">
                                <a class="nav-link d-flex align-items-center px-0" id="pills-three-example1-tab" data-toggle="pill" href="#pills-three-example1" role="tab" aria-controls="pills-three-example1" aria-selected="false">
                                    <span class="font-weight-normal text-gray-600">Downloads</span>
                                </a>
                            </li>
                            <li class="nav-item mx-0">
                                <a class="nav-link d-flex align-items-center px-0" id="pills-four-example1-tab" data-toggle="pill" href="#pills-four-example1" role="tab" aria-controls="pills-four-example1" aria-selected="false">
                                    <span class="font-weight-normal text-gray-600">Addresses</span>
                                </a>
                            </li>
                            <li class="nav-item mx-0">
                                <a class="nav-link d-flex align-items-center px-0" id="pills-five-example1-tab" data-toggle="pill" href="#pills-five-example1" role="tab" aria-controls="pills-five-example1" aria-selected="false">
                                    <span class="font-weight-normal text-gray-600">Account details</span>
                                </a>
                            </li>
                            <li class="nav-item mx-0">
                                <a class="nav-link d-flex align-items-center px-0" id="pills-six-example1-tab" data-toggle="pill" href="#pills-six-example1" role="tab" aria-controls="pills-six-example1" aria-selected="false">
                                    <span class="font-weight-normal text-gray-600">Wishlist</span>
                                </a>
                            </li>
                            <li class="nav-item mx-0">
                                <a class="nav-link d-flex align-items-center px-0" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" {{ __('Logout') }} >
                                    <span class="font-weight-normal text-gray-600">
                                        Logout
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    @if(Session::has('message'))
                        <div class="alert alert-{{session('message')['type']}}">
                            {{session('message')['text']}}
                        </div>
                    @endif
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
                                              <span class="flaticon-order font-size-10 btn-icon__inner"></span>
                                            </a>
                                            <div class="font-size-3 mb-xl-1">Orders</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="border border-left-0 py-6 text-center">
                                            <a href="#" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                                              <span class="flaticon-cloud-computing font-size-10 btn-icon__inner text-primary"></span>
                                            </a>
                                            <div class="font-size-3 mb-xl-1">Downloads</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="border border-left-0 py-6 text-center">
                                            <a href="#" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                                              <span class="flaticon-place font-size-10 btn-icon__inner text-primary"></span>
                                            </a>
                                            <div class="font-size-3 mb-xl-1">Addresses</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-6 text-center">
                                            <a href="#" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                                              <span class="flaticon-user-1 font-size-10 btn-icon__inner text-primary"></span>
                                            </a>
                                            <div class="font-size-3 mb-xl-1">Account Details</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="border border-left-0 py-6 text-center">
                                            <a href="#" class="btn bg-gray-200  rounded-circle px-4 mb-2">
                                              <span class="flaticon-heart font-size-10 btn-icon__inner text-primary"></span>
                                            </a>
                                            <div class="font-size-3 mb-xl-1">Wishlist</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="border border-left-0 py-6 text-center">
                                            <a href="#" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                                              <span class="flaticon-exit font-size-10 btn-icon__inner text-primary"></span>
                                            </a>
                                            <div class="font-size-3 mb-xl-1">Orders</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab">
                            <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-lg-2 mb-lg-4">
                                <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">orders</h6>
                                <table class="table">
                                    <thead>
                                        <tr class="border">
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium pl-3 pl-lg-5">Order</th>
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Date</th>
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Staus</th>
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Total</th>
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr class="border">
                                            <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">#30785</th>
                                            <td class="align-middle py-5">March 26, 2020</td>
                                            <td class="align-middle py-5">On hold</td>
                                            <td class="align-middle py-5">
                                                <span class="text-primary">$1,855.00</span> for 5 items</td>
                                            <td class="align-middle py-5">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-dark rounded-0 btn-wide font-weight-medium">View
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border">
                                            <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">#30785</th>
                                            <td class="align-middle py-5">March 26, 2020</td>
                                            <td class="align-middle py-5">On hold</td>
                                            <td class="align-middle py-5">
                                                <span class="text-primary">$1,855.00</span> for 5 items</td>
                                            <td class="align-middle py-5">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-dark rounded-0 btn-wide font-weight-medium">View
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border">
                                            <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">#30785</th>
                                            <td class="align-middle py-5">March 26, 2020</td>
                                            <td class="align-middle py-5">On hold</td>
                                            <td class="align-middle py-5">
                                                <span class="text-primary">$1,855.00</span> for 5 items</td>
                                            <td class="align-middle py-5">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-dark rounded-0 btn-wide font-weight-medium">View
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab">
                            <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-lg-2 mb-lg-4">
                                <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Downloads</h6>
                                <table class="table">
                                    <thead>
                                        <tr class="border">
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium pl-3 pl-md-5">Order</th>
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Date</th>
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Staus</th>
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Total</th>
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr class="border">
                                            <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">#30785</th>
                                            <td class="align-middle py-5">March 26, 2020</td>
                                            <td class="align-middle py-5">On hold</td>
                                            <td class="align-middle py-5">
                                                <span class="text-primary">$1,855.00</span> for 5 items</td>
                                            <td class="align-middle py-5">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-dark rounded-0 btn-wide font-weight-medium">View
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-four-example1" role="tabpanel" aria-labelledby="pills-four-example1-tab">
                            <div class="border-bottom mb-6 pb-6 mb-lg-8 pb-lg-9">
                                <form action="{{ route('billing-detail') }}" method="post" id="basic-validation">
                                    @csrf
                                    @if($billing)
                                        <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9">
                                            <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Address</h6>
                                            <div class="font-weight-medium font-size-22 mb-4 pb-xl-1">Billing Address</div>
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="js-form-message">
                                                        <label for="first_name">First name *</label>
                                                        <input type="text" class="form-control rounded-0 pl-3 placeholder-color-3" id="first_name" value="{{ $billing['first_name'] }}" name="first_name" placeholder="Please enter your first name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="js-form-message">
                                                        <label for="last_name">Last name *</label>
                                                        <input type="text" class="form-control rounded-0 pl-3 placeholder-color-3" id="last_name" name="last_name" value="{{ $billing['last_name'] }}" placeholder="Please enter your last name." required>
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
                                                        <input type="email" class="form-control rounded-0" name="email" value="{{ $billing['email'] }}" id="email" placeholder="Please enter your email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4 mb-md-0">
                                                    <div class="js-form-message">
                                                        <label for="address">Street Address *</label>
                                                        <input type="text" class="form-control rounded-0" name="address" id="address" value="{{ $billing['address'] }}" required placeholder="Please enter your address">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4 mb-md-0">
                                                    <div class="js-form-message">
                                                        <label for="phone">Phone *</label>
                                                        <input type="text" class="form-control rounded-0" name="phone" id="phone" value="{{ $billing['phone'] }}" required placeholder="Please enter your phone">
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-12 mb-5">
                                                <div class="js-form-message">
                                                    <label for="order_comments" class="form-label">Order notes (optional)</label>
                                                    <textarea name="notes" class="input-text form-control" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="8" cols="5">{{ $billing['notes'] }}</textarea>
                                                </div>
                                            </div>
                                                <div class="ml-3">
                                                    <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60 width-390">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9">
                                            <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Address</h6>
                                            <div class="font-weight-medium font-size-22 mb-4 pb-xl-1">Billing Address</div>
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
                                                <div class="ml-3">
                                                    <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60 width-390">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </form>
                            </div>
                            <!-- <div class="pl-md-5 pl-lg-9 space-bottom-2 space-bottom-lg-3">
                                <div class="font-weight-medium font-size-22 mb-4 pb-xl-1">Password Change</div>
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="js-form-message">
                                            <label for="exampleFormControlInput5">Current Password</label>
                                            <input type="password" class="form-control rounded-0" name="name" id="exampleFormControlInput5" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="js-form-message">
                                            <label for="exampleFormControlInput6">New Password</label>
                                            <input type="password" class="form-control rounded-0" name="name" id="exampleFormControlInput6" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-5">
                                        <div class="js-form-message">
                                            <label for="exampleFormControlInput7">Confirm new password</label>
                                            <input type="password" class="form-control rounded-0" name="name" id="exampleFormControlInput7" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60 width-390">Save Changes</button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="tab-pane fade" id="pills-five-example1" role="tabpanel" aria-labelledby="pills-five-example1-tab">
                            <div class="border-bottom mb-6 pb-6 mb-lg-8 pb-lg-9">
                                <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9">
                                    <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Account Details</h6>
                                    <div class="font-weight-medium font-size-22 mb-4 pb-xl-1">Edit Account</div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="js-form-message">
                                                <label for="exampleFormControlInput1">First name *</label>
                                                <input type="text" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput1" name="name" aria-label="Jack Wayley" placeholder="Ali" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="js-form-message">
                                                <label for="exampleFormControlInput2">Last name *</label>
                                                <input type="text" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput2" name="name" aria-label="Jack Wayley" placeholder="TUF.." required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="js-form-message">
                                                <label for="exampleFormControlInput3">Display name</label>
                                                <input type="text" class="form-control rounded-0" name="name" aria-label="Jack Wayley" id="exampleFormControlInput3" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4 mb-md-0">
                                            <div class="js-form-message">
                                                <label for="exampleFormControlInput4">Email address</label>
                                                <input type="email" class="form-control rounded-0" name="name" id="exampleFormControlInput4" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-md-5 pl-lg-9 space-bottom-2 space-bottom-lg-3">
                                <div class="font-weight-medium font-size-22 mb-4 pb-xl-1">Password Change</div>
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="js-form-message">
                                            <label for="exampleFormControlInput5">Current Password</label>
                                            <input type="password" class="form-control rounded-0" name="name" id="exampleFormControlInput5" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="js-form-message">
                                            <label for="exampleFormControlInput6">New Password</label>
                                            <input type="password" class="form-control rounded-0" name="name" id="exampleFormControlInput6" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-5">
                                        <div class="js-form-message">
                                            <label for="exampleFormControlInput7">Confirm new password</label>
                                            <input type="password" class="form-control rounded-0" name="name" id="exampleFormControlInput7" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60 width-390">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-six-example1" role="tabpanel" aria-labelledby="pills-six-example1-tab">
                            <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-lg-3">
                                <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Wishlist</h6>
                                <table class="table mb-0">
                                    <thead>
                                        <tr class="border">
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium pl-3 pl-md-5">Prouct</th>
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Price</th>
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Stock Staus</th>
                                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr class="border">
                                            <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">
                                                <div class="d-flex align-items-center">
                                                    <a class="d-block" href="#">
                                                        <img class="img-fluid" src="{{ asset('assets/img/books/cart.png') }}" alt="Image-Description">
                                                    </a>
                                                    <div class="ml-xl-4">
                                                        <div class="font-weight-normal">
                                                            <a href="#">The Overdue Life of Amy Byler</a>
                                                        </div>
                                                        <div class="font-size-2"><a href="#" class="text-gray-700" tabindex="0">Jay Shetty</a></div>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="align-middle py-5">$37</td>
                                            <td class="align-middle py-5">In Stock</td>
                                            <td class="align-middle py-5">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                            </td>
                                        </tr>
                                        <tr class="border">
                                            <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">
                                                <div class="d-flex align-items-center">
                                                    <a class="d-block" href="#">
                                                        <img class="img-fluid" src="{{ asset('assets/img/books/cart.png') }}" alt="Image-Description">
                                                    </a>
                                                    <div class="ml-xl-4">
                                                        <div class="font-weight-normal">
                                                            <a href="#">The Overdue Life of Amy Byler</a>
                                                        </div>
                                                        <div class="font-size-2"><a href="#" class="text-gray-700" tabindex="0">Jay Shetty</a></div>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="align-middle py-5">$37</td>
                                            <td class="align-middle py-5">In Stock</td>
                                            <td class="align-middle py-5">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                            </td>
                                        </tr>
                                        <tr class="border">
                                            <th class="pl-5 font-weight-normal align-middle py-6">
                                                <div class="d-flex align-items-center">
                                                    <a class="d-block" href="#">
                                                        <img class="img-fluid" src="{{ asset('assets/img/books/cart.png') }}" alt="Image-Description">
                                                    </a>
                                                    <div class="ml-xl-4">
                                                        <div class="font-weight-normal">
                                                            <a href="#">The Overdue Life of Amy Byler</a>
                                                        </div>
                                                        <div class="font-size-2"><a href="#" class="text-gray-700" tabindex="0">Jay Shetty</a></div>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="align-middle py-5">$37</td>
                                            <td class="align-middle py-5">In Stock</td>
                                            <td class="align-middle py-5">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@if($billing)
@section('scripts')
    <script>
        $(document).ready(function(){
            var country = "{{ $billing['country'] }}";
            $("#billing_country option").filter(function() {
            return $(this).val() == country;
            }).attr('selected', true);
        })
    </script>
@endsection
@endif