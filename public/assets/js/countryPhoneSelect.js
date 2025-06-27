var input = document.querySelector("#phone");
window.intlTelInput(input, {
 //allowDropdown: false,
 autoInsertDialCode: true,
// autoPlaceholder: "off",
// dropdownContainer: document.body,
// excludeCountries: ["us"],
 formatOnDisplay: false,
 geoIpLookup: function(callback) {
   fetch("https://ipapi.co/json")
     .then(function(res) { return res.json(); })
     .then(function(data) { callback(data.country_code); })
     .catch(function() { callback("us"); });
 },
 hiddenInput: "full_number",
 initialCountry: "auto",
// localizedCountries: { 'de': 'Deutschland' },
//nationalMode: false,
// onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
 placeholderNumberType: "MOBILE",
 preferredCountries: ['us', 'gb','jp','cn', 'mg'],
 separateDialCode: true,
 //showFlags: false,
utilsScript: "/assets/inttelput/js/utils.js"
});

fetch("https://ipapi.co/json")
.then(function(res) { return res.json(); })
.then(function(data) {
  $("#country_selector").countrySelect({
    defaultCountry: data.country_code.toLowerCase(),
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    responsiveDropdown: true,
    preferredCountries: ['us', 'gb','jp','cn', 'mg']
  });
})
.catch(function() {
  $("#country_selector").countrySelect({
    defaultCountry: 'us',
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    responsiveDropdown: true,
    preferredCountries: ['us', 'gb','jp','cn', 'mg']
  });
});

$('#country_selector').on('change', function(){
    /*var countryData = $(this).countrySelect("getSelectedCountryData");
    iti = intlTelInput(input);
    iti.getSelectedCountryData(countryData);*/
});