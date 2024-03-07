<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 Search
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start Search page -->
<div class="search-page p-5">
    <img src="<?=base_url('images/copy-space-wavy-white-background-layers_23-2148845469.jpg')?>" class="bg-img"/>
    <div class="container">
        <div class="form-content mx-auto">
            <form action="<?=site_url('Search/result')?>" class="search-peaople-form">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-4 text-center title"> البحث المتقدم <i class="fa-brands fa-searchengin"></i> </h3>
                    </div>
                    <div class="col-12">
                        <h6 class="mb-2"> ابحث عن ؟</h6>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-check" style="padding-right: 5.5em;">
                                    <img src="<?=base_url('images/man-face.jpg')?>" class="clipart clipart-man rounded-circle border border-2 d-block" style="width:200px"/>
                                    <input class="form-check-input d-none" type="radio" value="m" name="gender" <?php if(isset($_GET['gender'])&&$_GET['gender']=='m')echo "checked"; ?> id="sexeRadio1">
                                    <label class="form-check-label" for="sexeRadio1" style="margin-right: 23%;">ذكر</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-check" style="padding-right: 5.5em;">
                                    <img src="<?=base_url('images/woman-face.webp')?>" class="clipart clipart-woman rounded-circle border border-2 d-block" style="width:200px"/>
                                    <input class="form-check-input d-none" type="radio" value="f" name="gender" id="sexeRadio2">
                                    <label class="form-check-label" for="sexeRadio2" style="margin-right: 23%;">أنثى</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="col-12">
                        <h6 class="mb-2"> اريد العمر ان يكون بين</h6>
                    </div>
                    <div class="col-12 p-3 mb-4">
                        <div class="row">
                            <div class="col-4">
                                <select class="form-select select-age" name="min-age" aria-label="Default select example">
                                  <option value="0"> الكل</option>
                                </select>
                            </div>
                            <div class="col-4 text-center">و</div>
                            <div class="col-4">
                                <select class="form-select select-age" name="max-age" aria-label="Default select example">
                                  <option value="0"> الكل</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="col-md-6 mb-3">
                       <h6 class="mb-2">  تحديد البلد</h6>
                        <select  style="width: 50%;" id="select-country" name="country" class="form-select form-control">
                            <option value="0"> الكل</option>
                            <option>السعودية</option>
                            <option>الإمارات</option>
                            <option>الكويت</option>
                            <option>قطر</option>
                            <option>البحرين</option>
                            <option>عمان</option>
                            <option>اليمن</option>
                            <option>الأردن</option>
                            <option>سورية</option>
                            <option>لبنان</option>
                            <option>فلسطين</option>
                            <option>مصر</option>
                            <option>العراق</option>
                            <option>المغرب</option>
                            <option>الجزائر</option>
                            <option>تونس</option>
                            <option>ليبيا</option>
                            <option>السودان</option>
                            <option>الصومال</option>
                            <option>غير ذلك</option>
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Antarctica</option>
                            <option>American Samoa</option>
                            <option>Andorra</option>
                            <option>Angola</option>
                            <option>Antigua and Barbuda</option>
                            <option>Azerbaijan</option>
                            <option>Argentina</option>
                            <option>Australia</option>
                            <option>Austria</option>
                            <option>Bahamas</option>
                            <option>Bangladesh</option>
                            <option>Armenia</option>
                            <option>Barbados</option>
                            <option>Belgium</option>
                            <option>Bermuda</option>
                            <option>Bhutan</option>
                            <option>Bolivia </option>
                            <option>Bosnia and Herzegovina</option>
                            <option>Botswana</option>
                            <option>Bouvet Island</option>
                            <option>Brazil</option>
                            <option>Belize</option>
                            <option>British Indian </option>
                            <option>Solomon Islands</option>
                            <option>Virgin Islands </option>
                            <option>Brunei Darussalam</option>
                            <option>Bulgaria</option>
                            <option>Myanmar</option>
                            <option>Burundi</option>
                            <option>Belarus</option>
                            <option>Cambodia</option>
                            <option>Cameroon</option>
                            <option>Canada</option>
                            <option>Cabo Verde</option>
                            <option>Cayman Islands</option>
                            <option>Central African</option>
                            <option>Sri Lanka</option>
                            <option>Chad</option>
                            <option>Chile</option>
                            <option>China</option>
                            <option>Taiwan</option>
                            <option>Christmas Island</option>
                            <option>Cocos  Islands</option>
                            <option>Colombia</option>
                            <option>Comoros</option>
                            <option>Mayotte</option>
                            <option>Congo</option>
                            <option>Congo (Democrati)</option>
                            <option>Cook Islands</option>
                            <option>Costa Rica</option>
                            <option>Croatia</option>
                            <option>Cuba</option>
                            <option>Cyprus</option>
                            <option>Czechia</option>
                            <option>Benin</option>
                            <option>Denmark</option>
                            <option>Dominica</option>
                            <option>Dominican Republic</option>
                            <option>Ecuador</option>
                            <option>El Salvador</option>
                            <option>Equatorial Guinea</option>
                            <option>Ethiopia</option>
                            <option>Eritrea</option>
                            <option>Estonia</option>
                            <option>Faroe Islands</option>
                            <option>Falkland -Malvinas</option>
                            <option>South Georgia</option>
                            <option>Fiji</option>
                            <option>Finland</option>
                            <option>Åland Islands</option>
                            <option>France</option>
                            <option>French Guiana</option>
                            <option>French Polynesia</option>
                            <option>French Southern</option>
                            <option>Djibouti</option>
                            <option>Gabon</option>
                            <option>Georgia</option>
                            <option>Gambia</option>
                            <option>Germany</option>
                            <option>Ghana</option>
                            <option>Gibraltar</option>
                            <option>Kiribati</option>
                            <option>Greece</option>
                            <option>Greenland</option>
                            <option>Grenada</option>
                            <option>Guadeloupe</option>
                            <option>Guam</option>
                            <option>Guatemala</option>
                            <option>Guinea</option>
                            <option>Guyana</option>
                            <option>Haiti</option>
                            <option>Heard Island</option>
                            <option>Holy See</option>
                            <option>Honduras</option>
                            <option>Hong Kong</option>
                            <option>Hungary</option>
                            <option>Iceland</option>
                            <option>India</option>
                            <option>Indonesia</option>
                            <option>Iran </option>
                            <option>Ireland</option>
                            <option>Italy</option>
                            <option>Jamaica</option>
                            <option>Japan</option>
                            <option>Kazakhstan</option>
                            <option>Kenya</option>
                            <option>Korea </option>
                            <option>Kyrgyzstan</option>
                            <option>Lesotho</option>
                            <option>Latvia</option>
                            <option>Liberia</option>
                            <option>Liechtenstein</option>
                            <option>Lithuania</option>
                            <option>Luxembourg</option>
                            <option>Macao</option>
                            <option>Madagascar</option>
                            <option>Malawi</option>
                            <option>Malaysia</option>
                            <option>Maldives</option>
                            <option>Mali</option>
                            <option>Malta</option>
                            <option>Martinique</option>
                            <option>Mauritania</option>
                            <option>Mauritius</option>
                            <option>Mexico</option>
                            <option>Monaco</option>
                            <option>Mongolia</option>
                            <option>Moldova</option>
                            <option>Montenegro</option>
                            <option>Montserrat</option>
                            <option>Mozambique</option>
                            <option>Namibia</option>
                            <option>Nauru</option>
                            <option>Nepal</option>
                            <option>Netherlands</option>
                            <option>Curaçao</option>
                            <option>Aruba</option>
                            <option>Sint Maarten</option>
                            <option>Bonaire</option>
                            <option>New Caledonia</option>
                            <option>Vanuatu</option>
                            <option>New Zealand</option>
                            <option>Nicaragua</option>
                            <option>Niger</option>
                            <option>Nigeria</option>
                            <option>Niue</option>
                            <option>Norfolk Island</option>
                            <option>Norway</option>
                            <option>Northern Mariana Islands</option>
                            <option>United States Minor</option>
                            <option>Micronesia </option>
                            <option>Marshall Islands</option>
                            <option>Palau</option>
                            <option>Pakistan</option>
                            <option>Panama</option>
                            <option>Papua New Guinea</option>
                            <option>Paraguay</option>
                            <option>Peru</option>
                            <option>Philippines</option>
                            <option>Pitcairn</option>
                            <option>Poland</option>
                            <option>Portugal</option>
                            <option>Guinea-Bissau</option>
                            <option>Timor-Leste</option>
                            <option>Puerto Rico</option>
                            <option>Réunion</option>
                            <option>Romania</option>
                            <option>Russian Federation</option>
                            <option>Rwanda</option>
                            <option>Saint Barthélemy</option>
                            <option>Saint Helena</option>
                            <option>Saint Kitts and Nevis</option>
                            <option>Anguilla</option>
                            <option>Saint Lucia</option>
                            <option>Saint Martin (French)</option>
                            <option>Saint Pierre and Miquelon</option>
                            <option>Saint Vincen</option>
                            <option>San Marino</option>
                            <option>Sao Tome and Principe</option>
                            <option>Senegal</option>
                            <option>Serbia</option>
                            <option>Seychelles</option>
                            <option>Sierra Leone</option>
                            <option>Singapore</option>
                            <option>Slovakia</option>
                            <option>Viet Nam</option>
                            <option>Slovenia</option>
                            <option>South Africa</option>
                            <option>Zimbabwe</option>
                            <option>Spain</option>
                            <option>South Sudan</option>
                            <option>Western Sahara</option>
                            <option>Suriname</option>
                            <option>Svalbard and Jan </option>
                            <option>Swaziland</option>
                            <option>Sweden</option>
                            <option>Switzerland</option>
                            <option>Tajikistan</option>
                            <option>Thailand</option>
                            <option>Togo</option>
                            <option>Tokelau</option>
                            <option>Tonga</option>
                            <option>Trinidad and Tobago</option>
                            <option>Turkey</option>
                            <option>Turkmenistan</option>
                            <option>Turks and Caicos Islands</option>
                            <option>Tuvalu</option>
                            <option>Uganda</option>
                            <option>Ukraine</option>
                            <option>Macedonia</option>
                            <option>بريطانيا</option>
                            <option>Guernsey</option>
                            <option>Jersey</option>
                            <option>Isle of Man</option>
                            <option>Tanzania</option>
                            <option>United States</option>
                            <option>Virgin Islands </option>
                            <option>Burkina Faso</option>
                            <option>Uruguay</option>
                            <option>Uzbekistan</option>
                            <option>Venezuela </option>
                            <option>Wallis and Futuna</option>
                            <option>Samoa</option>
                            <option>Zambia</option>
                            <option>Côte d'Ivoire</option>
                            <option>Korea North Korea</option>
                            <option>Lao </option>
                        </select>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" name="submit" class="btn">إبحث الأن <i class="fa-solid fa-angles-left"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Search page -->
<?php $this->endsection(); ?>