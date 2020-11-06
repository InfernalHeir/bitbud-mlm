<?php ini_set('display_errors',1);
session_start();
include "../dbconnection.php";

if(isset($_COOKIE['sponser']))
{
 $sponser_id_cookie=$_COOKIE['sponser'];    
 $select_name=$conn->prepare("SELECT `fullname` FROM `user_registration` WHERE `user_id`='$sponser_id_cookie'");
 $select_name->execute();
 $select_names=$select_name->fetchAll();
}

if(isset($_SESSION['user_id']))
{
    header('location:https://bitbud.biz/bitbud_dir/index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

    <?php include("headpart/head.php");
	?>

<body>

   <?php include("headpart/header.php");
	?>
	<style>
	 .toggle {
    background: none;
    border: none;
    color: #283a5e;
    font-weight: 600;
    padding: 0px;
    position: absolute;
    right: 2.175em;
    top: 30%;
    z-index: 9;
}



.fa {
    font-size: 20px !important;
}   
	</style>
	<!-- ================================
         END HEADER AREA
================================= -->

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <div class="breadcrumb-inner">
                        <h2 class="breadcrumb__title">sign up.</h2>
                        <ul class="breadcrumb__list">
                            <li class="active__list-item"><a href="index.html">home</a></li>
                            
                            <li>sign up</li>
                        </ul>
                    </div><!-- end breadcrumb-inner -->
                    <div class="text-outline">sign up</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hero-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START FORM AREA
================================= -->
<section class="form-shared">
    <div class="container">
        <div class="contact-form-action">
            <div class="form-heading text-center">
               <h3 class="form__title">Create an account!</h3>
            </div>
			
			    <div class="row">
						<div class="col-lg-6">
						    <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="text" id="Sponsor-Id" placeholder="Sponsor-Id (Optional)" onblur="sponser()" onkeypress="allowAlphaNumericSpace(event)" value='<?php if(isset($_COOKIE['sponser'])){echo $_COOKIE['sponser'];}  ?>' <?php if(isset($_COOKIE['sponser'])){echo "readonly";}  ?>>
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="text" id="first_name" placeholder="First Name" required="" autocomplete="off">
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="text" id="username" placeholder="Username Ex-User123" required="" autocomplete="off" onkeypress="allowAlphaNumericSpace(event)">
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="email" id="email" placeholder="Email Address" required="">
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="password" id="txtPassword" placeholder="Password" required="" autocomplete="off">
                            </div><!-- end col-lg-12 -->

						</div>
						<div class="col-lg-6">
							<div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="text" id="spn_name" placeholder="Sponsor Name" value='<?php if(isset($_COOKIE['sponser'])){foreach($select_names as $na){echo $na['fullname'];}}  ?>' readonly>
                            </div><!-- end col-lg-12 -->


                        <script>
                        
                        function allowAlphaNumericSpace(e) {
                        var code = ('charCode' in e) ? e.charCode : e.keyCode;
  if (!(code > 47 && code < 58) && // numeric (0-9)
    !(code > 64 && code < 91) && // upper alpha (A-Z)
    !(code > 96 && code < 123)) { // lower alpha (a-z)
    e.preventDefault();
  }
}
                        
                        function sponser()
                        {
                        var sponser_id=$('#Sponsor-Id').val();
                        $.ajax({
                        url:'sponser',
                        type:'POST',
                        data:{sponser_id:sponser_id},
                        success:function(data)
                        {
                            $('#spn_name').val(data);
                        }
                            
                        })
                        }
                        </script>
                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="text" id="last_name" placeholder="Last Name" required="" autocomplete="off">
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="number" id="mobile_no" placeholder="Mobile No (Optional)" autocomplete="off">
                            </div><!-- end col-lg-12 -->

                                  <div class="col-lg-12 col-sm-12 form-group">
                <div class="form-group">
                   
                <select  id="country" value="select country" style="width:100%;" class="form-control form-control-lg" name="country" required>
  <option>-Select Country-</option>
  <option>Afghanistan</option>
  <option>Åland Islands</option>
  <option>Albania</option>
  <option>Algeria</option>
  <option>American Samoa</option>
  <option>Andorra</option>
  <option>Angola</option>
  <option>Anguilla</option>
  <option>Antarctica</option>
  <option>Antigua and Barbuda</option>
  <option>Argentina</option>
  <option>Armenia</option>
  <option>Aruba</option>
  <option>Australia</option>
  <option>Austria</option>
  <option>Azerbaijan</option>
  <option>Bahamas</option>
  <option>Bahrain</option>
  <option>Bangladesh</option>
  <option>Barbados</option>
  <option>Belarus</option>
  <option>Belgium</option>
  <option>Belize</option>
  <option>Benin</option>
  <option>Bermuda</option>
  <option>Bhutan</option>
  <option>Bolivia, Plurinational State of</option>
  <option>Bonaire, Sint Eustatius and Saba</option>
  <option>Bosnia and Herzegovina</option>
  <option>Botswana</option>
  <option>Bouvet Island</option>
  <option>Brazil</option>
  <option>British Indian Ocean Territory</option>
  <option>Brunei Darussalam</option>
  <option>Bulgaria</option>
  <option>Burkina Faso</option>
  <option>Burundi</option>
  <option>Cambodia</option>
  <option>Cameroon</option>
  <option>Canada</option>
  <option>Cape Verde</option>
  <option>Cayman Islands</option>
  <option>Central African Republic</option>
  <option>Chad</option>
  <option>Chile</option>
  <option>China</option>
  <option>Christmas Island</option>
  <option>Cocos (Keeling) Islands</option>
  <option>Colombia</option>
  <option>Comoros</option>
  <option>Congo</option>
  <option>Congo, the Democratic Republic of the</option>
  <option>Cook Islands</option>
  <option>Costa Rica</option>
  <option>Côte d'Ivoire</option>
  <option>Croatia</option>
  <option>Cuba</option>
  <option>Curaçao</option>
  <option>Cyprus</option>
  <option>Czech Republic</option>
  <option>Denmark</option>
  <option>Djibouti</option>
  <option>Dominica</option>
  <option>Dominican Republic</option>
  <option>Ecuador</option>
  <option>Egypt</option>
  <option>El Salvador</option>
  <option>Equatorial Guinea</option>
  <option>Eritrea</option>
  <option>Estonia</option>
  <option>Ethiopia</option>
  <option>Falkland Islands (Malvinas)</option>
  <option>Faroe Islands</option>
  <option>Fiji</option>
  <option>Finland</option>
  <option>France</option>
  <option>French Guiana</option>
  <option>French Polynesia</option>
  <option>French Southern Territories</option>
  <option>Gabon</option>
  <option>Gambia</option>
  <option>Georgia</option>
  <option>Germany</option>
  <option>Ghana</option>
  <option>Gibraltar</option>
  <option>Greece</option>
  <option>Greenland</option>
  <option>Grenada</option>
  <option>Guadeloupe</option>
  <option>Guam</option>
  <option>Guatemala</option>
  <option>Guernsey</option>
  <option>Guinea</option>
  <option>Guinea-Bissau</option>
  <option>Guyana</option>
  <option>Haiti</option>
  <option>Heard Island and McDonald Islands</option>
  <option>Holy See (Vatican City State)</option>
  <option>Honduras</option>
  <option>Hong Kong</option>
  <option>Hungary</option>
  <option>Iceland</option>
  <option>India</option>
  <option>Indonesia</option>
  <option>Iran, Islamic Republic of</option>
  <option>Iraq</option>
  <option>Ireland</option>
  <option>Isle of Man</option>
  <option>Israel</option>
  <option>Italy</option>
  <option>Jamaica</option>
  <option>Japan</option>
  <option>Jersey</option>
  <option>Jordan</option>
  <option>Kazakhstan</option>
  <option>Kenya</option>
  <option>Kiribati</option>
  <option>Korea, Democratic People's Republic of</option>
  <option>Korea, Republic of</option>
  <option>Kuwait</option>
  <option>Kyrgyzstan</option>
  <option>Lao People's Democratic Republic</option>
  <option>Latvia</option>
  <option>Lebanon</option>
  <option>Lesotho</option>
  <option>Liberia</option>
  <option>Libya</option>
  <option>Liechtenstein</option>
  <option>Lithuania</option>
  <option>Luxembourg</option>
  <option>Macao</option>
  <option>Macedonia, the former Yugoslav Republic of</option>
  <option>Madagascar</option>
  <option>Malawi</option>
  <option>Malaysia</option>
  <option>Maldives</option>
  <option>Mali</option>
  <option>Malta</option>
  <option>Marshall Islands</option>
  <option>Martinique</option>
  <option>Mauritania</option>
  <option>Mauritius</option>
  <option>Mayotte</option>
  <option>Mexico</option>
  <option>Micronesia, Federated States of</option>
  <option>Moldova, Republic of</option>
  <option>Monaco</option>
  <option>Mongolia</option>
  <option>Montenegro</option>
  <option>Montserrat</option>
  <option>Morocco</option>
  <option>Mozambique</option>
  <option>Myanmar</option>
  <option>Namibia</option>
  <option>Nauru</option>
  <option>Nepal</option>
  <option>Netherlands</option>
  <option>New Caledonia</option>
  <option>New Zealand</option>
  <option>Nicaragua</option>
  <option>Niger</option>
  <option>Nigeria</option>
  <option>Niue</option>
  <option>Norfolk Island</option>
  <option>Northern Mariana Islands</option>
  <option>Norway</option>
  <option>Oman</option>
  <option>Pakistan</option>
  <option>Palau</option>
  <option>Palestinian Territory, Occupied</option>
  <option>Panama</option>
  <option>Papua New Guinea</option>
  <option>Paraguay</option>
  <option>Peru</option>
  <option>Philippines</option>
  <option>Pitcairn</option>
  <option>Poland</option>
  <option>Portugal</option>
  <option>Puerto Rico</option>
  <option>Qatar</option>
  <option>Réunion</option>
  <option>Romania</option>
  <option>Russian Federation</option>
  <option>Rwanda</option>
  <option>Saint Barthélemy</option>
  <option>Saint Helena, Ascension and Tristan da Cunha</option>
  <option>Saint Kitts and Nevis</option>
  <option>Saint Lucia</option>
  <option>Saint Martin (French part)</option>
  <option>Saint Pierre and Miquelon</option>
  <option>Saint Vincent and the Grenadines</option>
  <option>Samoa</option>
  <option>San Marino</option>
  <option>Sao Tome and Principe</option>
  <option>Saudi Arabia</option>
  <option>Senegal</option>
  <option>Serbia</option>
  <option>Seychelles</option>
  <option>Sierra Leone</option>
  <option>Singapore</option>
  <option>Sint Maarten (Dutch part)</option>
  <option>Slovakia</option>
  <option>Slovenia</option>
  <option>Solomon Islands</option>
  <option>Somalia</option>
  <option>South Africa</option>
  <option>South Georgia and the South Sandwich Islands</option>
  <option>South Sudan</option>
  <option>Spain</option>
  <option>Sri Lanka</option>
  <option>Sudan</option>
  <option>Suriname</option>
  <option>Svalbard and Jan Mayen</option>
  <option>Swaziland</option>
  <option>Sweden</option>
  <option>Switzerland</option>
  <option>Syrian Arab Republic</option>
  <option>Taiwan, Province of China</option>
  <option>Tajikistan</option>
  <option>Tanzania, United Republic of</option>
  <option>Thailand</option>
  <option>Timor-Leste</option>
  <option>Togo</option>
  <option>Tokelau</option>
  <option>Tonga</option>
  <option>Trinidad and Tobago</option>
  <option>Tunisia</option>
  <option>Turkey</option>
  <option>Turkmenistan</option>
  <option>Turks and Caicos Islands</option>
  <option>Tuvalu</option>
  <option>Uganda</option>
  <option>Ukraine</option>
  <option>United Arab Emirates</option>
  <option>United Kingdom</option>
  <option>United States</option>
  <option>United States Minor Outlying Islands</option>
  <option>Uruguay</option>
  <option>Uzbekistan</option>
  <option>Vanuatu</option>
  <option>Venezuela, Bolivarian Republic of</option>
  <option>Viet Nam</option>
  <option>Virgin Islands, British</option>
  <option>Virgin Islands, U.S.</option>
  <option>Wallis and Futuna</option>
  <option>Western Sahara</option>
  <option>Yemen</option>
  <option>Zambia</option>
  <option>Zimbabwe</option>
</select>    
                   
                </div>
                </div>


                            <div class="col-lg-12 col-sm-12 form-group">
                                <input class="form-control" type="Password" id="conPassword" placeholder="Confirm Password" required="">
                                <button type="button" id="btnToggle" class="toggle"><i id="eyeIcon" class="fa fa-eye"></i></button>
                            </div><!-- end col-lg-12 -->

                        </div><!-- end row -->
				</div><!-- end row -->
				
							<div class="col-lg-12 col-sm-12 col-xs-12 form-condition">
                               <input type="checkbox" id="chb2">
                               I agree to Bitcon's <a href="terms.php">Terms of Services</a><br>
                               
                                <div class="custom-checkbox">
                                    <!--
                                    <input type="checkbox" id="chb2">
                                    <label for="chb2">I agree to Bitcon's <a href="terms.php">Terms of Services</a></label>-->
                                </div>
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 col-xs-12 form-group text-center">
                                
                                <button class="theme-btn register-btn" type="submit" onclick="register()">Register Account</button>
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12 col-sm-12 col-xs-12 account-assist text-center">
                                
                                <p class="account__desc">Already have an account?<a href="login.php">Login</a></p>
                            </div><!-- end col-lg-12 -->
				
            
        </div><!-- end contact-form -->
    </div><!-- end container -->
</section><!-- end form-shared -->
<!-- ================================
       START FORM AREA
================================= -->
<script>
                    var passwordInput = document.getElementById('txtPassword');
                    var conInput = document.getElementById('conPassword');
    var toggle = document.getElementById('btnToggle');
    var icon =  document.getElementById('eyeIcon');

function togglePassword() {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    conInput.type='text';
    icon.classList.add("fa-eye-slash");
    //toggle.innerHTML = 'hide';
  }
  
  
  else {
    passwordInput.type = 'password';
    conInput.type='password';
    icon.classList.remove("fa-eye-slash");
    //toggle.innerHTML = 'show';
  }
}

function checkInput() {
  //if (passwordInput.value === '') {
  //toggle.style.display = 'none';
  //toggle.innerHTML = 'show';
  //  passwordInput.type = 'password';
  //} else {
  //  toggle.style.display = 'block';
  //}
}

toggle.addEventListener('click', togglePassword, false);
passwordInput.addEventListener('keyup', checkInput, false);
                </script>



<!-- ================================
         END FOOTER AREA
================================= -->
    <?php include("headpart/footer.php");
	?>
	
	<script>
	    
	  function  register()
	  {
	      
	     var sponser_id=$('#Sponsor-Id').val();
         var username=$('#username').val();
         var mobile_no=$('#mobile_no').val();
         var first_name=$('#first_name').val();
         var last_name=$('#last_name').val();
         var email=$('#email').val();
         var country=$('#country').val();
         var password=$('#txtPassword').val();
         var con_pass=$('#conPassword').val();
         
         if(document.getElementById('chb2').checked==false)
         {
           $('body').topAlertjs({
            type: 'error',
           message: 'Please Agree With Terms and Services!',
          close: true,
           duration: 3
               
           });
         }
         else
         {
             $.ajax({
                                url:'reg',
                                type:'POST',
                                data:{sponser_id:sponser_id,username:username,mobile_no:mobile_no,first_name:first_name,last_name:last_name,email:email,country:country,password:password,con_pass:con_pass},
                                beforeSend:function()
                                {
                                    $('.loader-container').show();
                                },
                                success:function(data)
                                {
                                if(data=="Successfully Registration")
                                {
                                    
                                    window.location.href='https://bitbud.biz/bitbud_dir/index.php';
                                }
                                else
                                {
                                $('.loader-container').hide();    
                                $('body').topAlertjs({
                                type: 'error',
                                message: data,
                                close: true,
                                duration: 3
               
                                });    
                                    
                                }
                                }
                                    
                                    
                                })
         }
         
	      
	  }
	</script>
	
</body>

</html>