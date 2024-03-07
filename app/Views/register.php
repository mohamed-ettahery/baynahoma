<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 Register
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<style>
#regForm {
    margin: 21px auto;
    padding: 40px;
    width: 55%;
    margin-top: 105px;
    min-width: 300px;
  box-shadow: -18px 17px 65px -33px rgb(0 0 0 / 75%);
}
#regForm h1
{
  background: -webkit-linear-gradient(#ab6ab4, #6368d0);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
#regForm #prevBtn
{
  border-radius:8px;
}
#regForm #nextBtn
{
color: #FFF;
transition: ease-in-out .4s;
border-radius: 8px;
background: #4568DC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, var(--second), var(--primary));  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, var(--second), var(--primary)); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
#regForm #nextBtn:hover
{
background: -webkit-linear-gradient(to right, var(--second), var(--primary));  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, var(--second), var(--primary)); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
</style>
<!-- Start Register page -->
<div class="register-page">
    <div class="container">
      <?php
         if(session()->has("errors"))
         {
            foreach(session("errors") as $error)
            {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?= $error ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
            }
         } 
      ?>
      <form id="regForm" action="<?= site_url('Register/store') ?>" method="POST">

        <h1 class="text-center mb-3"> انشاء حساب جديد</h1>

            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <p><input type="text" name="firstName" value="<?=old('firstName')?>" placeholder="الاسم الشخصي" class="form-control" oninput="this.classList.remove('invalid');$('.fname-error').addClass('d-none');"></p>
                  <p class="text-danger fname-error d-none" style="margin-top: -16px;font-size: small;"> يجب ان يكون الاسم الشخصي بين 3 و 20 حرف</p>
                <p><input type="text" name="lastName" value="<?=old('lirstName')?>" placeholder="الاسم العائلي" class="form-control" oninput="this.classList.remove('invalid');$('.lname-error').addClass('d-none');"></p>
                  <p class="text-danger lname-error d-none" style="margin-top: -16px;font-size: small;"> يجب ان يكون الاسم العائلي بين 3 و 20 حرف</p>
                <p>
                  <label class="mb-3"> حدد البلد</label>
                  <select onchange="this.classList.remove('is-invalid');" style="width: 50%;" id="select-country" name="country" class="form-select form-control">
                      <option value="0"> تحديد البلد</option>
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
                </p>
            </div>
            <div class="tab"> 
            <h5>حدد تاريخ ميلادك:</h5>
              <div class="container mb-3">
                <div class="row">
                  <div class="col-4">
                    <label>اليوم</label>
                    <select onchange="this.classList.remove('is-invalid');" value="<?=old('day')?>" class="form-select form-control" id="select-days" name="day">
                      <option value="0"> حدد اليوم</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <label>الشهر</label>
                    <select onchange="this.classList.remove('is-invalid');" value="<?=old('month')?>" class="form-select form-control" id="select-months" name="month">
                      <option value="0"> حدد الشهر</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <label>السنه</label>
                    <select onchange="this.classList.remove('is-invalid');" value="<?=old('year')?>" class="form-select form-control" id="select-years" name="year">
                      <option value="0"> حدد السنه</option>
                    </select>
                  </div>
                </div>
              </div>
            <h5> حدد الجنس:</h5>
              <div class="container mb-3">
                <div class="row mb-3">
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" value="m" <?php if(old('gender')=='m') echo "checked" ?> type="radio" name="gender" id="flexRadio1">
                      <label class="form-check-label" for="flexRadio1">
                      ذكر
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" value="f" <?php if(old('gender')=='f') echo "checked" ?> type="radio" name="gender" id="flexRadio2">
                      <label class="form-check-label" for="flexRadio2">
                      أنثى
                      </label>
                    </div>
                  </div>
                </div>
                <div class="alert-sexe alert alert-danger d-flex align-items-center d-none" role="alert">
                  <i class="fa fa-close me-2"></i>
                  <div>
                  المرجو تحديد الجنس
                  </div>
                </div>
              </div>
              
            </div>
            <div class="tab">
              <p><input type="email" class="form-control" name="email" value="<?=old('email')?>" placeholder=" البريد الالكتروني" oninput="this.classList.remove('invalid');this.classList.remove('is-invalid');this.classList.remove('is-valid');$('.email-error').addClass('d-none');"></p>
                <p class="text-danger email-error d-none" style="margin-top: -16px;font-size: small;">  البريد الالكتروني غير صحيح  او مستعمل من قبل</p>
              <p><input type="number" class="form-control" name="phone" value="<?=old('phone')?>" placeholder=" رقم الهاتف" oninput="this.classList.remove('invalid');this.classList.remove('is-invalid');this.classList.remove('is-valid');$('.phone-error').addClass('d-none');"></p>
                <p class="text-danger phone-error d-none" style="margin-top: -16px;font-size: small;"> يجب ان يكون رقم الهاتف بين 8 و 16 رقم</p>
            </div>
            <div class="tab">
              <h5>معلومات تسجيل الدخول</h5>
              <p><input type="text" class="form-control" name="userName" value="<?=old('userName')?>" placeholder="اسم المستخدم" oninput="this.classList.remove('invalid');this.classList.remove('is-invalid');this.classList.remove('is-valid');$('.username-error').addClass('d-none');"></p>
                <p class="text-danger username-error d-none" style="margin-top: -16px;font-size: small;">  يجب ان يحتوي اسم المستخدم على الاقل 8 احرف</p>
              <p><input type="password" class="form-control" name="password" value="<?=old('password')?>" placeholder=" كلمه السر" oninput="this.classList.remove('invalid');this.classList.remove('is-invalid');this.classList.remove('is-valid');$('.psw-error').addClass('d-none');"></p>
                <p class="text-danger psw-error d-none" style="margin-top: -16px;font-size: small;">  يجب ان تتكون كلمه السر على الاقل 6 احرف</p>

              <div class="form-check mb-3">
                <input class="form-check-input" onclick="this.classList.remove('is-invalid');this.classList.remove('is-valid');" type="checkbox" value="" id="flexCheckPrivacy">
                <label class="form-check-label" for="flexCheckPrivacy">
                اوافق على شروط التسجيل <a href="#">سياسه الخصوصيه</a>
                </label>
              </div>
            </div>

            <div style="overflow:auto;">
              <div style="float:right;">
                  <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">رجوع</button>
                  <button type="button" class="btn" id="nextBtn" onclick="nextPrev(1)"> تسجيل</button>
              </div>
            </div>

          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          </div>

      </form>
      <div class="alert alert-danger mx-auto alert-respect-privacy" style="width: 55%;font-size: smaller;" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i>  يمنع كليا استخدام اي الفاظ نابيه اوخادشه للحياء <a href="<?=site_url('Home/privacy')?>"> سياسه الخصوصيه</a>
      </div>
    </div>
</div>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "تسجيل";
  } else {
    document.getElementById("nextBtn").innerHTML = "التالي";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
//   if (currentTab >= x.length) {
  if (currentTab >= 4) { //************************************************* */
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm(){
  var i, valid = true;
  var tabs = document.getElementsByClassName("tab"),emails=[],phones=[],usernames=[];
  emails.push("aa@gmail.com","bb@gmail.com");
  switch(currentTab)
  {
    case 0 :
            // tabs = document.getElementsByClassName("tab");
            inputs = tabs[0].getElementsByTagName("input");
            if(inputs[0].value == "" || inputs[0].value.length < 3 || inputs[0].value.length > 20)
            {
              inputs[0].className += " invalid";
              $('.fname-error').removeClass('d-none');
              valid = false; 
            }
            else
            {
              inputs[0].className += " is-valid";
            }

            if(inputs[1].value == "" || inputs[1].value.length < 3 || inputs[1].value.length > 20)
            {
              inputs[1].className += " invalid";
              $('.lname-error').removeClass('d-none');
              valid = false; 
            }
            else
            {
              inputs[1].className += " is-valid";
            }

            if($("#select-country").val()==0)
            {
              $("#select-country").addClass("is-invalid");
              valid = false; 
            }
            else
            {
              $("#select-country").addClass("is-valid");
            }

            // emails[]=''
            // emails.push("aa@gmail.com");
      break;
    case 1 : 
            var c=0,radios = document.getElementsByClassName("tab")[1].getElementsByTagName("input");
            for (i = 0; i < radios.length; i++) {
              if (radios[i].checked) {
                c++;
              }
            }
            if(c==0)
            {
              valid = false;
              $(".alert-sexe").removeClass("d-none");
            }
            else
            {
              $(".alert-sexe").addClass("d-none");
            }
            if($("#select-days").val()==0)
            {
              $("#select-days").addClass('is-invalid');
              valid = false;
            }
            if($("#select-months").val()==0)
            {
              $("#select-months").addClass('is-invalid');
              valid = false;
            }
            if($("#select-years").val()==0)
            {
              $("#select-years").addClass('is-invalid');
              valid = false;
            }
       break;
    case 2 : 
            inputs = tabs[2].getElementsByTagName("input");
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(inputs[0].value) && !emails.includes(inputs[0].value))
            {
              inputs[0].className += " is-valid";
              inputs[0].classList.remove('is-invalid');
              inputs[0].classList.remove('invalid');
            }
            else
            {
              inputs[0].className += " is-invalid invalid";
              $('.email-error').removeClass('d-none');
              inputs[0].classList.remove('is-valid');
              valid = false; 
            }

            if(inputs[1].value != "")
            {
              if(inputs[1].value.length < 8 || inputs[1].value.length > 16)
              {
                inputs[1].className += " is-invalid invalid";
                $('.phone-error').removeClass('d-none');
                inputs[1].classList.remove('is-valid');
                valid = false; 
              }
              else
              {
                inputs[1].classList.remove('is-invalid');
                inputs[1].classList.remove('invalid');
                inputs[1].className += " is-valid";
              }
            }
      break;
    case 3 :
            inputs = tabs[3].getElementsByTagName("input");
            if (inputs[0].value == "" || inputs[0].value.length < 8)
            {
              inputs[0].className += " is-invalid invalid";
              $('.username-error').removeClass('d-none');
              inputs[0].classList.remove('is-valid');
              valid = false; 
            }
            else
            {
              inputs[0].className += " is-valid";
              inputs[0].classList.remove('is-invalid');
              inputs[0].classList.remove('invalid');
            }

            if(inputs[1].value == "" || inputs[1].value.length < 6)
            {
              inputs[1].className += " is-invalid invalid";
              $('.psw-error').removeClass('d-none');
              inputs[1].classList.remove('is-valid');
              valid = false; 
            }
            else
            {
              inputs[1].classList.remove('is-invalid');
              inputs[1].classList.remove('invalid');
              inputs[1].className += " is-valid";
            }
            if($("#flexCheckPrivacy").prop("checked") == false)
            {
              $("#flexCheckPrivacy").removeClass('is-valid');
              $("#flexCheckPrivacy").addClass('is-invalid');
              valid = false;
            }
            else
            {
              $("#flexCheckPrivacy").removeClass('is-invalid');
              $("#flexCheckPrivacy").addClass('is-valid');
            }
       break;
  }
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid;
}
// function validateForm() {
//     // This function deals with validation of the form fields
//     var x, y, i, valid = true;
//     x = document.getElementsByClassName("tab");
//     y = x[currentTab].getElementsByTagName("input");
//     // A loop that checks every input field in the current tab:
//     for (i = 0; i < y.length; i++) {
//       // If a field is empty...
//       if (y[i].value == "") {
//         // add an "invalid" class to the field:
//         y[i].className += " invalid";
//         // and set the current valid status to false:
//         valid = false;
//       }
//     }
//     // ******************
//     if(currentTab == 1)
//     {
//       var c=0,radios = document.getElementsByClassName("tab")[1].getElementsByTagName("input");
//       for (i = 0; i < radios.length; i++) {
//         if (radios[i].checked) {
//           c++;
//         }
//       }
//       if(c==0)
//       {
//         valid = false;
//         $(".alert-sexe").removeClass("d-none");
//       }
//       else
//       {
//         $(".alert-sexe").addClass("d-none");
//       }
//     }
//     // ******************

//   // If the valid status is true, mark the step as finished and valid:
//   if (valid) {
//     document.getElementsByClassName("step")[currentTab].className += " finish";
//   }
//   return valid; // return the valid status
// }

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>
<!-- End Register page -->
<?php $this->endsection(); ?>