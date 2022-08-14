@extends('admin.layout.index')
@section('content')
<style>
    .hard_cover, .digital_epub, .paper_back{
        display: none;
    }
    .selectExtraField{
        width: 400px;
        height: 200px;
    }
</style>
<link rel="stylesheet" href="{{asset('admin_assets/vendor/select2/css/select2.min.css')}}">
<div class="content-body">
   <div class="container-fluid">
      <div class="row page-titles">
         <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Add Book</a></li>
         </ol>
      </div>
    @if(Session::has('message'))
        <div class="alert alert-{{session('message')['type']}}">
            {{session('message')['text']}}
        </div>
    @endif
   
    <form id="basic-validation" action="{{ route('insert-book', 0) }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Detail</h4>
                    </div>
                    @csrf
                    <input type="hidden" name="post_type" value="add">
                    <div class="card-body">
                        <div class="basic-form custom_file_input">
                        <h3 for="instagram">Cover Type</h3>
                        <hr>
                        <div class="basic-form">
                            <div class="mb-3 mb-0">
                                <label class="radio-inline me-3"><input type="radio" class="cover_type" data-size="500x500" name="cover_type" value="portrait" required> Portrait?</label>
                                <label class="radio-inline me-3"><input type="radio" class="cover_type" data-size="1350x500" name="cover_type" value="landscape" checked required> Landscape?</label>
                            </div>
                        </div>
                        <b>Size (<small id="size">1350x500</small>)</b>
                        <div class="input-group mb-3">
                            <img width="50%" src="{{ asset('no-image.jpg') }}" id="commonImage1" alt="">
                        </div>
                     
                        <div class="input-group mb-3">
                            <span class="input-group-text">Hero Image</span>
                            <div class="form-file">
                                <input type="file" name="hero_image" class="form-file-input form-control" onchange="loadFile(event, 'commonImage1')" required>
                            </div>
                        </div>
                       
                        <div class="input-group mb-3">
                            <img width="50%" src="{{ asset('no-image.jpg') }}" id="commonImage2" alt="">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Book Cover Photo</span>
                            <div class="form-file">
                                <input type="file" name="cover" class="form-file-input form-control" onchange="loadFile(event, 'commonImage2')" required>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Sample PDF</span>
                            <div class="form-file">
                                <input type="file" name="sample" class="form-file-input form-control" required>
                            </div>
                        </div>
                        <h4>Select Extra Fields</h4><hr>
                        <div class="mb-3 col-md-12">
                            <div class="mt-4">
                                <!-- <select class="js-example-programmatic-multi selectExtraField" id="selectExtraField" multiple="multiple" name="fields[]" required></select> -->
                                <select class="selectExtraField" id="selectExtraField" multiple="multiple" name="fields[]" required></select>
                            </div>
                        </div>
                        <div class="extraFieldsHere"></div>
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
                                <label for="title">Title</label>
                                <input class="form-control form-control-lg" name="title" type="text" id="title" required>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input class="form-control form-control-lg" name="price" type="number" id="price" required>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" class="form-control" name="subtitle" id="subtitle" required>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="synopsis">Synopsis</label>
                                <textarea class="form-control" rows="8" name="synopsis" id="synopsis" required></textarea>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="genre">Genre</label>
                                <select class="form-control form-control-lg" name="genre" id="genre" required>
                                    @foreach($genres as $genre)
                                        <optgroup label="{{ $genre->title }}"></optgroup>
                                        @foreach($genre->subgenres  as $sub)
                                        <option value="{{ $sub->id }}">{{ $sub->title }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="publisher">Add Sub-authors</label>
                                <input class="typeahead form-control form-control-lg" type="text">
                            </div>
                        </div>
                        <input type="hidden" name="sub_author" id="sub_author" value="">
                        <div class="co-authors-here">
                            
                        </div>
                        <br>
                        <br>
                        <h4>Publication</h4><hr>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="publisher">Publisher</label>
                                <input class="form-control form-control-lg" name="publisher" type="text" id="publisher" required>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="country">Country</label>
                                <select id="country" name="country" class="form-control" required>
                                    <option value="" selected="">Choose Country</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Åland Islands">Åland Islands</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Bouvet Island">Bouvet Island</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Territories">French Southern Territories</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guernsey">Guernsey</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jersey">Jersey</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macao">Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Pitcairn">Pitcairn</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russian Federation">Russian Federation</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Helena">Saint Helena</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Timor-leste">Timor-leste</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Viet Nam">Viet Nam</option>
                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                    <option value="Western Sahara">Western Sahara</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <label for="publication_date">Date</label>
                                <input class="form-control form-control-lg" name="publication_date" type="date" id="publication_date" required>
                            </div>
                        </div>
                        <h4>Book Format</h4><hr>
                        <div class="basic-form">
                            <div class="mb-3">
                                <div class="form-check custom-checkbox mb-3 checkbox-danger">
                                    <input type="checkbox" class="form-check-input bookFormat" name="hardcover" id="hard_cover">
                                    <label class="form-check-label" for="hard_cover">Hardcover</label>
                                </div>
                            </div>
                        </div>
                        <div class="hard_cover">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="hard_price">Price</label>
                                    <input class="form-control form-control-lg" name="hard_price" type="number" id="hard_price" required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="hard_page">Page Count</label>
                                    <input class="form-control form-control-lg" name="hard_page" type="number" id="hard_page" required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="hard_isbn">ISBN</label>
                                    <input class="form-control form-control-lg" name="hard_isbn" type="text" id="hard_isbn" required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="hard_weight">Weight</label>
                                    <input class="form-control form-control-lg" name="hard_weight" type="number" id="hard_weight" required>
                                </div>
                            </div>
                            <fieldset class="mb-3">
                                <div class="row">
                                    <label class="col-form-label col-sm-3 pt-0">Shipped to Cowriehub?</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hard_ship" value="1" checked="" required>
                                            <label class="form-check-label">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hard_ship" value="0" required>
                                            <label class="form-check-label">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset style="display: none;" class="mb-3 hard_allow_preorders">
                                <div class="row">
                                    <label class="col-form-label col-sm-3 pt-0">Allow Preorders?</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="herd_allow_preorder" value="1" checked="" required>
                                            <label class="form-check-label">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="herd_allow_preorder" value="0" required>
                                            <label class="form-check-label">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="basic-form hard_shipment_date">
                                        <div class="mb-3">
                                            <label for="shipment_date">Shipment Date</label>
                                            <input class="form-control form-control-lg" name="hard_shipment_date" type="date" min="<?= date('Y-m-d'); ?>" id="shipment_date" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="hard_stock">Number in stock</label>
                                    <input class="form-control form-control-lg" name="hard_stock" type="number" id="hard_stock">
                                </div>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <div class="form-check custom-checkbox mb-3 checkbox-danger">
                                    <input type="checkbox" class="form-check-input bookFormat" name="paperback" id="paper_back" >
                                    <label class="form-check-label" for="paper_back">PaperBack</label>
                                </div>
                            </div>
                        </div>
                        <div class="paper_back">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="paper_price">Price</label>
                                    <input class="form-control form-control-lg" name="paper_price" type="number" id="paper_price" required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="paper_page">Page Count</label>
                                    <input class="form-control form-control-lg" name="paper_page" type="number" id="paper_page" required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="paper_isbn">ISBN</label>
                                    <input class="form-control form-control-lg" name="paper_isbn" type="text" id="paper_isbn" required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="paper_weight">Weight</label>
                                    <input class="form-control form-control-lg" name="paper_weight" type="number" id="paper_weight" required>
                                </div>
                            </div>
                            <fieldset class="mb-3">
                                <div class="row">
                                    <label class="col-form-label col-sm-3 pt-0">Shipped to Cowriehub?</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paper_ship" value="1" checked="" required>
                                            <label class="form-check-label">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paper_ship" value="0" required>
                                            <label class="form-check-label">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset style="display: none;" class="mb-3 paper_allow_preorders">
                                <div class="row">
                                    <label class="col-form-label col-sm-3 pt-0">Allow Preorders?</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paper_allow_preorder" value="1" checked="" required>
                                            <label class="form-check-label">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paper_allow_preorder" value="0" required>
                                            <label class="form-check-label">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="basic-form paper_shipment_date">
                                        <div class="mb-3">
                                            <label for="shipment_date">Shipment Date</label>
                                            <input class="form-control form-control-lg" name="paper_shipment_date" type="date" min="<?= date('Y-m-d'); ?>" id="shipment_date" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="paper_stock">Number in stock</label>
                                    <input class="form-control form-control-lg" name="paper_stock" type="number" id="paper_stock">
                                </div>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="mb-3">
                                <div class="form-check custom-checkbox mb-3 checkbox-danger">
                                    <input type="checkbox" class="form-check-input bookFormat" name="digital" id="digital_epub" >
                                    <label class="form-check-label" for="digital_epub">Digital (ePUB)</label>
                                </div>
                            </div>
                        </div>
                        <div class="digital_epub">
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="digital_price">Price</label>
                                    <input class="form-control form-control-lg" name="digital_price" type="number" id="digital_price">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="digital_page">Page Count</label>
                                    <input class="form-control form-control-lg" name="digital_page" type="number" id="digital_page">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="mb-3">
                                    <label for="digital_isbn">ISBN</label>
                                    <input class="form-control form-control-lg" name="digital_isbn" type="text" id="digital_isbn">
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Upload ePUB</span>
                                <div class="form-file">
                                    <input type="file" name="epub" class="form-file-input form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
   </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('admin_assets/vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin_assets/js/plugins-init/select2-init.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script>
    $(document).ready(function(){

        let dropdown = $('#selectExtraField');
        dropdown.empty();
        dropdown.prop('selectedIndex', 0);

        const url = "<?php echo asset('data.json') ?>";
        $.getJSON(url, function (data) {
            $.each(data, function (key, entry) {
                dropdown.append($('<option></option>').attr('value', entry).text(entry));
            })
        });
        $('.selectExtraField').on('change',function(){
            var html;
            $('.selectExtraField option:selected').each(function(){
                html += '<div class="basic-form">'+
                            '<div class="mb-3">'+
                                '<label for="title">'+$(this).val()+'</label>'+
                                '<input class="form-control form-control-lg" name="extraFieldValue[]" type="text">'+
                                '<input class="form-control form-control-lg" name="extraFieldLabel[]" value="'+$(this).val()+'" type="hidden">'+
                            '</div>'+
                        '</div>';
            });
            $('.extraFieldsHere').html(html);
        })

        $('#sub_author').val('');
        $('.bookFormat').on('click',function(){
            var id = $(this).attr('id');
            if($(this).is(":checked")){
                $('.'+id).show();
            } else {
                $('.'+id).hide();
            }
        });
        $('.cover_type').on('change',function(){
            var size = $(this).data('size');
            $('#size').html(size);
        });
        let authorsArray = [];
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            },
            updater: function(selection){
                var response = JSON.stringify(selection)
                response = JSON.parse(response);
                var checkIfExists = $.inArray(response.id, authorsArray);
                if (checkIfExists == -1) {
                    authorsArray.push(response.id);
                    $('.co-authors-here').append('<span class="badge badge-xl light badge-info remove-'+response.id+'">'+response.name+'<i class="fa fa-times removeItem" data-id="'+response.id+'"></i></span>');
                    $('#sub_author').val(authorsArray);
                }
            }
        });
        $(document).on('click','.removeItem',function(){
            var id = $(this).data('id');
            $('.remove-'+id).remove();
            authorsArray = jQuery.grep(authorsArray, function(value) {
                return value != id;
            });
            $('#sub_author').val(authorsArray);
        });
        $('input[name="hard_ship"]').on('change',function(){
            var type = $(this).val();
            if(type == 0){
                $('.hard_allow_preorders').show();
            } else if(type == 1){
                $('.hard_allow_preorders').hide();
            }
        });
        $('input[name="herd_allow_preorder"]').on('change',function(){
            var type = $(this).val();
            if(type == 0){
                $('.hard_shipment_date').hide();
            } else if(type == 1){
                $('.hard_shipment_date').show();
            }
        });
        $('input[name="paper_ship"]').on('change',function(){
            var type = $(this).val();
            if(type == 0){
                $('.paper_allow_preorders').show();
            } else if(type == 1){
                $('.paper_allow_preorders').hide();
            }
        });
        $('input[name="paper_allow_preorder"]').on('change',function(){
            var type = $(this).val();
            if(type == 0){
                $('.paper_shipment_date').hide();
            } else if(type == 1){
                $('.paper_shipment_date').show();
            }
        });
    });
</script>
@endsection