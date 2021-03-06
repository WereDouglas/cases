<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Case pro</title>


        <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>

        <link rel="stylesheet" href="<?= base_url(); ?>css/style.css">

        <link rel=icon href="<?= base_url(); ?>images/favicon.ico">
    </head>

    <body>
        <div class="login-wrap">
            <div class="login-html">
                <div class="row center-align" style="text-align: center;"> 
                    
                    <a href="<?php echo base_url();?>index.php/web"> <img  height="50px" width="50px" class="nav" src="<?= base_url(); ?>images/cp_logo.png" alt="Logo" /></a>
                    <h1 style="color:#FFF; margin:0;margin-bottom: 37px;" >Case Professional</h1> </div>
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                <div class="login-form">
                    <form id="station-form" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/home/login'  method="post">

                        <div class="sign-in-htm">
                            <?php echo $this->session->flashdata('msg'); ?>
                            <div class="group">
                                <label for="user" class="label">Contact</label>
                                <input id="emails" name="emails" type="text" class="input">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="passwords" name="passwords" type="password" class="input" data-type="password">
                            </div>
                            <div class="group">
                                <input id="check" type="checkbox" class="check" checked>
                                <label for="check"><span class="icon"></span> Keep me Signed in</label>
                            </div>
                            <div class="group">
                                <input type="submit" class="button" value="Sign In">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <a href="#forgot">Forgot Password?</a>
                            </div>
                            <div class="foot-lnk">
                                <a href="<?php echo base_url();?>index.php/web">About Case Professional</a>
                            </div>
                        </div>
                    </form>
                    <div class="sign-up-htm">
                        <form id="station-form" name="login-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/organisation/register'  method="post">

                            <div class="group">

                                <input  class="input" type="text" id="name" name="name" placeholder="Organisation name" required="" />
                                <span id="loading_name"  name ="loading_name"><img src="<?= base_url(); ?>images/loading.gif" alt="loading......" /></span>

                            </div>
                            <div class="group">

                                <input type="text" class="input" name="companyEmail" placeholder="Firm email" required="" />
                            </div>
                            <div class="group">

                                <input type="text" class="input" id="code" name="code" placeholder="Short name(code)" required="" />
                                <span id="loading_code"  name ="loading_code"><img src="<?= base_url(); ?>images/loading.gif" alt="loading......" /></span>
                            </div>
                            <div class="group">
                                <input type="text" class="input" id="username" name="username" placeholder="User name" required="" />
                            </div>
                            <div class="group">
                                <input type="text" class="input" id="contact" name="contact" placeholder="Contact/Phone" required="" />
                            </div>
                            <div class="group">
                                <span id="loading"  name ="loading"><img src="<?= base_url(); ?>images/loading.gif" alt="loading......" /></span>
                                <input type="email" class="input" name="userEmail" placeholder="Email" required="" />
                            </div>
                            <div class="group">
                                <input type="password" class="input" name="password" placeholder="Password" required="" />
                            </div>
                            <div class="group">
                                <div id="locationField">
                                    <div class="group">
                                        <input id="autocomplete" name="address" class="input" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
                                    </div>
                                    <input type="hidden" class=" form-control field " id="street_number" disabled="true" placeholder="Street Address"></input>
                                    <input type="hidden" class=" form-control field " id="route" disabled="true" placeholder="City"></input>
                                    <div class="group"><input class="field input" name="city" id="locality" disabled="true" placeholder="State"></input>
                                    </div>
                                    <div class="group">
                                        <input name="region" class="field input"id="administrative_area_level_1" disabled="true"></input>
                                    </div>
                                    <input type="hidden" class="field form-control" id="postal_code"  disabled="true" placeholder="Zip Code"></input>
                                    <div class="group">
                                        <input name="country" class="field input" id="country" disabled="true" placeholder="Country"></input>

                                    </div>
                                    <script>
                                        // This example displays an address form, using the autocomplete feature
                                        // of the Google Places API to help users fill in the information.

                                        // This example requires the Places library. Include the libraries=places
                                        // parameter when you first load the API. For example:
                                        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                                        var placeSearch, autocomplete;
                                        var componentForm = {
                                            street_number: 'short_name',
                                            route: 'long_name',
                                            locality: 'long_name',
                                            administrative_area_level_1: 'short_name',
                                            country: 'long_name',
                                            postal_code: 'short_name'
                                        };

                                        function initAutocomplete() {
                                            // Create the autocomplete object, restricting the search to geographical
                                            // location types.
                                            autocomplete = new google.maps.places.Autocomplete(
                                                    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                                                    {types: ['geocode']});

                                            // When the user selects an address from the dropdown, populate the address
                                            // fields in the form.
                                            autocomplete.addListener('place_changed', fillInAddress);
                                        }

                                        function fillInAddress() {
                                            // Get the place details from the autocomplete object.
                                            var place = autocomplete.getPlace();

                                            for (var component in componentForm) {
                                                document.getElementById(component).value = '';
                                                document.getElementById(component).disabled = false;
                                            }

                                            // Get each component of the address from the place details
                                            // and fill the corresponding field on the form.
                                            for (var i = 0; i < place.address_components.length; i++) {
                                                var addressType = place.address_components[i].types[0];
                                                if (componentForm[addressType]) {
                                                    var val = place.address_components[i][componentForm[addressType]];
                                                    document.getElementById(addressType).value = val;
                                                }
                                            }
                                        }

                                        // Bias the autocomplete object to the user's geographical location,
                                        // as supplied by the browser's 'navigator.geolocation' object.
                                        function geolocate() {
                                            if (navigator.geolocation) {
                                                navigator.geolocation.getCurrentPosition(function (position) {
                                                    var geolocation = {
                                                        lat: position.coords.latitude,
                                                        lng: position.coords.longitude
                                                    };
                                                    var circle = new google.maps.Circle({
                                                        center: geolocation,
                                                        radius: position.coords.accuracy
                                                    });
                                                    autocomplete.setBounds(circle.getBounds());
                                                });
                                            }
                                        }
                                    </script>
                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZn2XZuHCiSmUltMNn0dtUPqbGbyDfgs&libraries=places&callback=initAutocomplete"
                                    async defer></script>

                                </div>
                            </div>
                            <div class="group">
                                <select class="input" name="currency">
                                    <option selected value="">Select currency</option>
                                    <option value="America (United States) Dollars - USD">America (United States) Dollars – USD</option>
                                    <option value="Afghanistan Afghanis - AFN">Afghanistan Afghanis – AFN</option>
                                    <option value="Albania Leke - ALL">Albania Leke – ALL</option>
                                    <option value="Algeria Dinars - DZD">Algeria Dinars – DZD</option>
                                    <option value="Argentina Pesos - ARS">Argentina Pesos – ARS</option>
                                    <option value="Australia Dollars - AUD">Australia Dollars – AUD</option>
                                    <option value="Austria Schillings - ATS">Austria Schillings – ATS</OPTION>

                                    <option value="Bahamas Dollars - BSD">Bahamas Dollars – BSD</option>
                                    <option value="Bahrain Dinars - BHD">Bahrain Dinars – BHD</option>
                                    <option value="Bangladesh Taka - BDT">Bangladesh Taka – BDT</option>
                                    <option value="Barbados Dollars - BBD">Barbados Dollars – BBD</option>
                                    <option value="Belgium Francs - BEF">Belgium Francs – BEF</OPTION>
                                    <option value="Bermuda Dollars - BMD">Bermuda Dollars – BMD</option>
                                    <option value="BRF">Uganda – BRF</option>
                                    <option value="Brazil Reais - BRL">Brazil Reais – BRL</option>
                                    <option value="Bulgaria Leva - BGN">Bulgaria Leva – BGN</option>
                                    <option value="Canada Dollars - CAD">Canada Dollars – CAD</option>
                                    <option value="CFA BCEAO Francs - XOF">CFA BCEAO Francs – XOF</option>
                                    <option value="CFA BEAC Francs - XAF">CFA BEAC Francs – XAF</option>
                                    <option value="Chile Pesos - CLP">Chile Pesos – CLP</option>

                                    <option value="China Yuan Renminbi - CNY">China Yuan Renminbi – CNY</option>
                                    <option value="RMB (China Yuan Renminbi) - CNY">RMB (China Yuan Renminbi) – CNY</option>
                                    <option value="Colombia Pesos - COP">Colombia Pesos – COP</option>
                                    <option value="CFP Francs - XPF">CFP Francs – XPF</option>
                                    <option value="Costa Rica Colones - CRC">Costa Rica Colones – CRC</option>
                                    <option value="Croatia Kuna - HRK">Croatia Kuna – HRK</option>

                                    <option value="Cyprus Pounds - CYP">Cyprus Pounds – CYP</option>
                                    <option value="Czech Republic Koruny - CZK">Czech Republic Koruny – CZK</option>
                                    <option value="Denmark Kroner - DKK">Denmark Kroner – DKK</option>
                                    <option value="Deutsche (Germany) Marks - DEM">Deutsche (Germany) Marks – DEM</OPTION>
                                    <option value="Dominican Republic Pesos - DOP">Dominican Republic Pesos – DOP</option>
                                    <option value="Dutch (Netherlands) Guilders - NLG">Dutch (Netherlands) Guilders – NLG</OPTION>

                                    <option value="Eastern Caribbean Dollars - XCD">Eastern Caribbean Dollars – XCD</option>
                                    <option value="Egypt Pounds - EGP">Egypt Pounds – EGP</option>
                                    <option value="Estonia Krooni - EEK">Estonia Krooni – EEK</option>
                                    <option value="Euro - EUR">Euro – EUR</option>
                                    <option value="Fiji Dollars - FJD">Fiji Dollars – FJD</option>
                                    <option value="Finland Markkaa - FIM">Finland Markkaa – FIM</OPTION>

                                    <option value="France Francs - FRF*">France Francs – FRF*</OPTION>
                                    <option value="Germany Deutsche Marks - DEM">Germany Deutsche Marks – DEM</OPTION>
                                    <option value="Gold Ounces - XAU">Gold Ounces – XAU</option>
                                    <option value="Greece Drachmae - GRD">Greece Drachmae – GRD</OPTION>
                                    <option value="Guatemalan Quetzal - GTQ">Guatemalan Quetzal – GTQ</OPTION>
                                    <option value="Holland (Netherlands) Guilders - NLG">Holland (Netherlands) Guilders – NLG</OPTION>
                                    <option value="Hong Kong Dollars - HKD">Hong Kong Dollars – HKD</option>

                                    <option value="Hungary Forint - HUF">Hungary Forint – HUF</option>
                                    <option value="Iceland Kronur - ISK">Iceland Kronur – ISK</option>
                                    <option value="IMF Special Drawing Right - XDR">IMF Special Drawing Right – XDR</option>
                                    <option value="India Rupees - INR">India Rupees – INR</option>
                                    <option value="Indonesia Rupiahs - IDR">Indonesia Rupiahs – IDR</option>
                                    <option value="Iran Rials - IRR">Iran Rials – IRR</option>

                                    <option value="Iraq Dinars - IQD">Iraq Dinars – IQD</option>
                                    <option value="Ireland Pounds - IEP*">Ireland Pounds – IEP*</OPTION>
                                    <option value="Israel New Shekels - ILS">Israel New Shekels – ILS</option>
                                    <option value="ITL*">Italy Lire – ITL*</OPTION>
                                    <option value="JMD">Jamaica Dollars – JMD</option>
                                    <option value="JPY">Japan Yen – JPY</option>

                                    <option value="JOD">Jordan Dinars – JOD</option>
                                    <option value="KES">Kenya Shillings – KES</option>
                                    <option value="Korea (South) Won - KRW">Korea (South) Won – KRW</option>
                                    <option value="Kuwait Dinars - KWD">Kuwait Dinars – KWD</option>
                                    <option value="Lebanon Pounds - LBP">Lebanon Pounds – LBP</option>
                                    <option value="Luxembourg Francs - LUF">Luxembourg Francs – LUF</OPTION>

                                    <option value="Malaysia Ringgits - MYR">Malaysia Ringgits – MYR</option>
                                    <option value="Malta Liri - MTL">Malta Liri – MTL</option>
                                    <option value="Mauritius Rupees - MUR">Mauritius Rupees – MUR</option>
                                    <option value="Mexico Pesos - MXN">Mexico Pesos – MXN</option>
                                    <option value="Morocco Dirhams - MAD">Morocco Dirhams – MAD</option>
                                    <option value="Netherlands Guilders - NLG">Netherlands Guilders – NLG</OPTION>

                                    <option value="NZD">New Zealand Dollars – NZD</option>
                                    <option value="Norway Kroner - NOK">Norway Kroner – NOK</option>
                                    <option value="Oman Rials - OMR">Oman Rials – OMR</option>
                                    <option value="Pakistan Rupees - PKR">Pakistan Rupees – PKR</option>
                                    <option value="Palladium Ounces - XPD">Palladium Ounces – XPD</option>
                                    <option value="Peru Nuevos Soles - PEN">Peru Nuevos Soles – PEN</option>

                                    <option value="Philippines Pesos - PHP">Philippines Pesos – PHP</option>
                                    <option value="Platinum Ounces - XPT">Platinum Ounces – XPT</option>
                                    <option value="Poland Zlotych - PLN">Poland Zlotych – PLN</option>
                                    <option value="Portugal Escudos - PTE">Portugal Escudos – PTE</OPTION>
                                    <option value="Qatar Riyals - QAR">Qatar Riyals – QAR</option>
                                    <option value="Romania New Lei - RON">Romania New Lei – RON</option>
                                    <option value="RWF">Rwanda – RWF</option>
                                    <option value="Romania Lei - ROL">Romania Lei – ROL</option>
                                    <option value="RUB">Russia Rubles – RUB</option>
                                    <option value="SAR">Saudi Arabia Riyals – SAR</option>
                                    <option value="XAG">Silver Ounces – XAG</option>
                                    <option value="Singapore Dollars - SGD">Singapore Dollars – SGD</option>
                                    <option value="Slovakia Koruny - SKK">Slovakia Koruny – SKK</option>

                                    <option value="Slovenia Tolars - SIT">Slovenia Tolars – SIT</option>
                                    <option value="ZAR">South Africa Rand – ZAR</option>
                                    <option value="South Korea Won - KRW">South Korea Won – KRW</option>
                                    <option value="Spain Pesetas - ESP">Spain Pesetas – ESP</OPTION>
                                    <option value="Special Drawing Rights (IMF) - XDR">Special Drawing Rights (IMF) – XDR</option>
                                    <option value="Sri Lanka Rupees - LKR">Sri Lanka Rupees – LKR</option>

                                    <option value="Sudan Dinars - SDD">Sudan Dinars – SDD</option>
                                    <option value="Sweden Kronor - SEK">Sweden Kronor – SEK</option>
                                    <option value="Switzerland Francs - CHF">Switzerland Francs – CHF</option>
                                    <option value="Taiwan New Dollars - TWD">Taiwan New Dollars – TWD</option>
                                    <option value="Thailand Baht - THB">Thailand Baht – THB</option>
                                    <option value="Trinidad and Tobago Dollars - TTD">Trinidad and Tobago Dollars – TTD</option>
                                    <option value="TZS">Tanzania–TZS</option>
                                    <option value="Tunisia Dinars - TND">Tunisia Dinars – TND</option>
                                    <option value="Turkey New Lira - TRY">Turkey New Lira – TRY</option>
                                    <option value="UGX">Uganda – UGX</option>
                                    <option value="United Arab Emirates Dirhams - AED">United Arab Emirates Dirhams – AED</option>
                                    <option value="GBP">United Kingdom Pounds – GBP</option>
                                    <option value="USD">United States Dollars – USD</option>
                                    <option value="Venezuela Bolivares - VEB">Venezuela Bolivares – VEB</option>

                                    <option value="Vietnam Dong - VND">Vietnam Dong – VND</option>
                                    <option value="Zambia Kwacha - ZMK">Zambia Kwacha – ZMK</option>
                                </select>
                            </div>
                            <div class="group">
                                <div id="imagePreviews"></div>
                                <input type="file" name="orgfile" id="orgfile" class="input"/>
                            </div>
                            <div class="group">
                                <input type="submit" class="button" value="Sign Up">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <label for="tab-1">Already Member?</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


    </body>
</html>
<script src="<?= base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
                                        $(function () {
                                            $("#orgfile").on("change", function ()
                                            {
                                                var files = !!this.files ? this.files : [];
                                                if (!files.length || !window.FileReader)
                                                    return; // no file selected, or no FileReader support

                                                if (/^image/.test(files[0].type)) { // only image file
                                                    var reader = new FileReader(); // instance of the FileReader
                                                    reader.readAsDataURL(files[0]); // read the local file

                                                    reader.onloadend = function () { // set image data as background of div
                                                        $("#imagePreviews").css("background-image", "url(" + this.result + ")");
                                                    }
                                                }
                                            });
                                        });
</script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#loading').hide();
        $('#loading_name').hide();
        $('#loading_code').hide();
        $("#email2").blur(function () {

            var user = $(this).val();
            if (user != null) {

                $('#loading').show();
                $.post("<?php echo base_url() ?>index.php/organisation/exists", {
                    user: $(this).val()
                }, function (response) {
                    // alert(response);
                    $('#loading').hide();
                    setTimeout(finishAjax('loading', escape(response)), 400);
                });
            }
            function finishAjax(id, response) {
                $('#' + id).html(unescape(response));
                $('#' + id).fadeIn();
            }


        });

        $("#name").blur(function () {

            var name = $(this).val();
            if (name != null) {

                $('#loading_name').show();
                $.post("<?php echo base_url() ?>index.php/organisation/name", {
                    name: $(this).val()
                }, function (response) {
                    // alert(response);
                    $('#loading_name').hide();
                    setTimeout(finishAjax('loading_name', escape(response)), 400);
                });
            }
            function finishAjax(id, response) {
                $('#' + id).html(unescape(response));
                $('#' + id).fadeIn();
            }


        });

        $("#code").blur(function () {

            var code = $(this).val();
            if (code != null) {

                $('#loading_code').show();
                $.post("<?php echo base_url() ?>index.php/organisation/code", {
                    code: $(this).val()
                }, function (response) {
                    // alert(response);
                    $('#loading_code').hide();
                    setTimeout(finishAjax('loading_code', escape(response)), 400);
                });
            }
            function finishAjax(id, response) {
                $('#' + id).html(unescape(response));
                $('#' + id).fadeIn();
            }
        });


    });


</script>


