document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
  
    form.addEventListener("submit", function (event) {
      event.preventDefault(); // Prevent default form submission
  
      // Perform form validation
      if (validateForm()) {
        // If form is valid, submit the form
        form.submit();
        // alert("Your registration has been submitted successfully!");
      }
    });
  
    // Function to validate the form
    function validateForm() {
      // Get form elements
      const country = document.getElementById("UserCountry").value;
      const state = document.getElementById("UserState").value;
      const district = document.getElementById("UserDistirct").value;
      const taluka = document.getElementById("UserTaluka").value;    
  
    // If all validations pass, return true
    return true;
  }
  });
  
  // Update regions based on selected country
  document.getElementById("UserCountry").addEventListener("change", updateStates);
  
  // Update districts based on selected state
  document.getElementById("UserState").addEventListener("change", updateDistricts);
  
  // Update talukas based on selected district
  document.getElementById("UserDistirct").addEventListener("change", updateTalukas);
  
  function updateStates() {
    var countrySelect = document.getElementById("UserCountry");
    var stateSelect = document.getElementById("UserState");
    var districtSelect = document.getElementById("UserDistirct");
    var talukaSelect = document.getElementById("UserTaluka");
  
    // Clear previous region options
    // countrySelect.innerHTML = "<option value=''>Select Country</option>";
    stateSelect.innerHTML = "<option value=''>Select State</option>";
    districtSelect.innerHTML = "<option value=''>Select District</option>";
    talukaSelect.innerHTML = "<option value=''>Select Taluka</option>";
  
    // Get the selected country
    var selectedCountry = countrySelect.value;
  
    // Add states based on the selected country
  
    if (selectedCountry === "India") {
      // Populate states for India
      var indianStates = ["Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jharkhand", "Karnataka", "Kerala", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh", "Uttarakhand", "West Bengal",]; indianStates.forEach(function (state) {
        var option = document.createElement("option");
        option.text = state;
        option.value = state;
        stateSelect.add(option);
      });
    } else if (selectedCountry === "USA") {
      // Populate states for USA
      var usaStates = ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming",];
      usaStates.forEach(function (state) {
        var option = document.createElement("option");
        option.text = state;
        option.value = state;
        stateSelect.add(option);
      });
    }
  }
  
  
  
  function updateDistricts() {
    var stateSelect = document.getElementById("UserState");
    var districtSelect = document.getElementById("UserDistirct");
    var talukaSelect = document.getElementById("UserTaluka");
  
    // Clear previous district and taluka options
    districtSelect.innerHTML = "<option value=''>Select District</option>";
    talukaSelect.innerHTML = "<option value=''>Select Taluka</option>";
  
    // Get the selected state
    var selectedState = stateSelect.value;
  
    // Add districts based on the selected state
    if (selectedState === "Andhra Pradesh") {
      addOptionsToSelect(
      [// Districts of Andhra Pradesh
        "Anantapur", "Chittoor", "East Godavari", "Guntur", "Kadapa", "Krishna", "Kurnool", "Nellore", "Prakasam", "Srikakulam", "Visakhapatnam", "Vizianagaram", "West Godavari" 
      ],
        districtSelect
      );
    } else if (selectedState === "Arunachal Pradesh") {
      addOptionsToSelect(
      [// Districts of Arunachal Pradesh
        "Tawang", "West Kameng", "East Kameng", "Papum Pare", "Kurung Kumey", "Kra Daadi", "Lower Subansiri", "Upper Subansiri", "West Siang", "East Siang", "Siang", "Upper Siang", "Lower Siang", "Lower Dibang Valley", "Dibang Valley", "Anjaw", "Lohit", "Namsai", "Changlang", "Tirap", "Longding", 
      ],
        districtSelect
      );
    }
    else if (selectedState === "Assam") {
      addOptionsToSelect(
      [//Districts of Assam
        "Baksa", "Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo", "Chirang", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Dima Hasao (North Cachar Hills)", "Goalpara", "Golaghat", "Hailakandi", "Hojai", "Jorhat", "Kamrup", "Kamrup Metropolitan", "Karbi Anglong", "Karimganj", "Kokrajhar", "Lakhimpur", "Majuli", "Morigaon", "Nagaon", "Nalbari", "Sivasagar", "Sonitpur", "South Salmara-Mankachar", "Tinsukia", "Udalguri", "West Karbi Anglong" 
      ],
        districtSelect
      );
    } else if (selectedState === "Bihar") {
      addOptionsToSelect(
      [//Districts of bihar
        "Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Bhojpur (Arrah)", "Buxar", "Darbhanga", "East Champaran (Motihari)", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Kaimur (Bhabua)", "Katihar", "Khagaria", "Kishanganj", "Lakhisarai", "Madhepura", "Madhubani", "Munger (Monghyr)", "Muzaffarpur", "Nalanda", "Nawada", "Pashchim Champaran (Bettiah)", "Patna", "Purba Champaran (Motihari)", "Purnia (Purnea)", "Rohtas", "Saharsa", "Samastipur", "Saran (Chapra)", "Sheikhpura", "Sheohar", "Sitamarhi", "Siwan", "Supaul" 
      ],
        districtSelect
      );
    } else if (selectedState === "Chhattisgarh") {
      addOptionsToSelect(
      [//Districts of Chhattisgarh
        "Balod", "Baloda Bazar", "Balrampur", "Bastar", "Bemetara", "Bijapur", "Bilaspur", "Dantewada (South Bastar)", "Dhamtari", "Durg", "Gariaband", "Janjgir-Champa", "Jashpur", "Kabirdham (Kawardha)", "Kanker (North Bastar)", "Kondagaon", "Korba", "Koriya", "Mahasamund", "Mungeli", "Narayanpur", "Raigarh", "Raipur (Capital)", "Rajnandgaon", "Sukma", "Surajpur", "Surguja" 
      ],
        districtSelect
      );
    } else if (selectedState === "Goa") {
      addOptionsToSelect(
      [//Districts of Goa
        "North Goa", "South Goa" 
      ],
        districtSelect
      );
    } else if (selectedState === "Gujarat") {
      addOptionsToSelect(
      [//Districts of Gujrat 
        "Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Botad", "Chhota Udaipur", "Dahod", "Dang", "Devbhoomi Dwarka", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kutch", "Kheda", "Mahisagar", "Mehsana", "Morbi", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Valsad" 
      ],
        districtSelect
      );
    } else if (selectedState === "Haryana") {
      addOptionsToSelect(
      [//Districts of Haryana
        "Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram (Gurgaon)", "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Kurukshetra", "Mahendragarh", "Nuh", "Palwal", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat", "Yamunanagar" 
      ],
        districtSelect
      );
    } else if (selectedState === "Himachal Pradesh") {
      addOptionsToSelect(
      [//Districts of Himachal Pradesh
        "Bilaspur", "Chamba", "Hamirpur", "Kangra", "Kinnaur", "Kullu", "Lahaul and Spiti", "Mandi", "Shimla", "Sirmaur", "Solan", "Una" 
      ],
        districtSelect
      );
    } else if (selectedState === "Jharkhand") {
      addOptionsToSelect(
      [//Disrticts of Jharkhand
        "Bokaro", "Chatra", "Deoghar", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribagh", "Jamtara", "Khunti", "Koderma", "Latehar", "Lohardaga", "Pakur", "Palamu", "Ramgarh", "Ranchi", "Sahibganj", "Seraikela Kharsawan", "Simdega", "West Singhbhum" 
      ],
        districtSelect
      );
    }
    if (selectedState === "Karnataka") {
      addOptionsToSelect(
      [// Districts of Karnataka
        "Bagalkot", "Ballari (Bellary)", "Belagavi (Belgaum)", "Bengaluru (Bangalore) Rural", "Bengaluru (Bangalore) Urban", "Bidar", "Chamarajanagar", "Chikballapur", "Chikkamagaluru (Chikmagalur)", "Chitradurga", "Dakshina Kannada", "Davangere", "Dharwad", "Gadag", "Hassan", "Haveri", "Kalaburagi (Gulbarga)", "Kodagu (Coorg)", "Kolar", "Koppal", "Mandya", "Mysuru (Mysore)", "Raichur", "Ramanagara", "Shivamogga (Shimoga)", "Tumakuru (Tumkur)", "Udupi", "Uttara Kannada (Karwar)", "Vijayapura (Bijapur)", "Yadgir" 
      ],
        districtSelect
      );
    } else if (selectedState === "Kerala") {
      addOptionsToSelect(
      [// Districts of Kerala
        "Alappuzha (Alleppey)", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam (Quilon)", "Kottayam", "Kozhikode (Calicut)", "Malappuram", "Palakkad", "Pathanamthitta", "Thiruvananthapuram", "Thrissur", "Wayanad" 
      ],
        districtSelect
      );
    }
    if (selectedState === "Madhya Pradesh") {
      addOptionsToSelect(
      [// Districts of Madhya Pradesh
        "Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa (East Nimar)", "Khargone (West Nimar)", "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Panna", "Raisen", "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna", "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha" 
      ],
        districtSelect
      );
    } else if (selectedState === "Maharashtra") {
      addOptionsToSelect(
      [// Districts of Maharashtra
        "Ahmednagar", "Akola", "Amravati", "Aurangabad", "Beed", "Bhandara", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalgaon", "Jalna", "Kolhapur", "Latur", "Mumbai City", "Mumbai Suburban", "Nagpur", "Nanded", "Nandurbar", "Nashik", "Osmanabad", "Palghar", "Parbhani", "Pune", "Raigad", "Ratnagiri", "Sangli", "Satara", "Sindhudurg", "Solapur", "Thane", "Wardha", "Washim", "Yavatmal"
      ],
        districtSelect
      );
    } else if (selectedState === "Manipur") {
      addOptionsToSelect(
      [// Districts of Manipur
        "Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West", "Jiribam", "Kakching", "Kamjong", "Kangpokpi", "Noney", "Pherzawl", "Senapati", "Tamenglong", "Tengnoupal", "Thoubal", "Ukhrul", 
      ],
        districtSelect
      );
    } else if (selectedState === "Meghalaya") {
      addOptionsToSelect(
      [// Districts of Meghalaya
        "East Garo Hills", "East Jaintia Hills", "East Khasi Hills", "North Garo Hills", "Ri Bhoi", "South Garo Hills", "South West Garo Hills", "South West Khasi Hills", "West Garo Hills", "West Jaintia Hills", "West Khasi Hills", 
      ],
        districtSelect
      );
    }
    if (selectedState === "Mizoram") {
      addOptionsToSelect(
      [// Districts of Mizoram
        "Aizawl", "Champhai", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip", 
      ],
        districtSelect
      );
    } else if (selectedState === "Nagaland") {
      addOptionsToSelect(
      [// Districts of Nagaland
        "Dimapur", "Kiphire", "Kohima", "Longleng", "Mokokchung", "Mon", "Peren", "Phek", "Tuensang", "Wokha", "Zunheboto", 
      ],
        districtSelect
      );
    } else if (selectedState === "Odisha") {
      addOptionsToSelect(
      [// Districts of Odisha 
        "Angul", "Balangir", "Balasore (Baleswar)", "Bargarh (Baragarh)", "Bhadrak", "Boudh (Bauda)", "Cuttack", "Deogarh (Debagarh)", "Dhenkanal", "Gajapati", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara", "Kendujhar (Keonjhar)", "Khordha", "Koraput", "Malkangiri", "Mayurbhanj", "Nabarangpur", "Nayagarh", "Nuapada", "Puri", "Rayagada", "Sambalpur", "Subarnapur (Sonepur)", "Sundargarh" 
      ],
        districtSelect
      );
    } else if (selectedState === "Punjab") {
      addOptionsToSelect(
      [// Districts of Punjab
        "Amritsar", "Barnala", "Bathinda", "Faridkot", "Fatehgarh Sahib", "Fazilka", "Ferozepur", "Gurdaspur", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Muktsar", "Pathankot", "Patiala", "Rupnagar", "Sahibzada Ajit Singh Nagar (Mohali)", "Sangrur", "Tarn Taran" 
      ],
        districtSelect
      );
    } else if (selectedState === "Rajasthan") {
      addOptionsToSelect(
      [// Districts of Rajasthan
        "Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bhilwara", "Bikaner", "Bundi", "Chittorgarh", "Churu", "Dausa", "Dholpur", "Dungarpur", "Hanumangarh", "Jaipur", "Jaisalmer", "Jalore", "Jhalawar", "Jhunjhunu", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Pratapgarh", "Rajsamand", "Sawai Madhopur", "Sikar", "Sirohi", "Sri Ganganagar", "Tonk", "Udaipur" 
      ],
        districtSelect
      );
    } else if (selectedState === "Sikkim") {
      addOptionsToSelect(
      [// Districts of Sikkim
        "East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim", 
      ],
        districtSelect
      );
    } else if (selectedState === "Tamil Nadu") {
      addOptionsToSelect(
      [// Districts of Tamil Nadu
        "Ariyalur", "Chengalpattu", "Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kallakurichi", "Kanchipuram", "Kanyakumari", "Karur", "Krishnagiri", "Madurai", "Nagapattinam", "Namakkal", "Nilgiris", "Perambalur", "Pudukkottai", "Ramanathapuram", "Ranipet", "Salem", "Sivaganga", "Tenkasi", "Thanjavur", "Theni", "Thoothukudi (Tuticorin)", "Tiruchirappalli", "Tirunelveli", "Tirupathur", "Tiruppur", "Tiruvallur", "Tiruvannamalai", "Tiruvarur", "Vellore", "Viluppuram", "Virudhunagar", 
      ],
        districtSelect
      );
    }
    if (selectedState === "Telangana") {
      addOptionsToSelect(
      [// Districts of Telangana
        "Adilabad", "Bhadradri Kothagudem", "Hyderabad", "Jagtial", "Jangaon", "Jayashankar Bhupalpally", "Jogulamba Gadwal", "Kamareddy", "Karimnagar", "Khammam", "Komaram Bheem Asifabad", "Mahabubabad", "Mahabubnagar", "Medak", "Medchal-Malkajgiri", "Mulugu", "Nagarkurnool", "Nalgonda", "Nirmal", "Nizamabad", "Peddapalli", "Rajanna Sircilla", "Rangareddy", "Sangareddy", "Siddipet", "Suryapet", "Vikarabad",  "Wanaparthy", "Warangal Rural", "Warangal Urban", "Yadadri Bhuvanagiri", 
      ],
        districtSelect
      );
    } else if (selectedState === "Tripura") {
      addOptionsToSelect(
      [// Districts of Tripura
        "Dhalai", "Gomati", "Khowai", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura", 
      ],
        districtSelect
      );
    } else if (selectedState === "Uttar Pradesh") {
      addOptionsToSelect(
      [// Districts of Uttar Pradesh 
        "Agra", "Aligarh", "Allahabad", "Ambedkar Nagar", "Amethi", "Amroha", "Auraiya", "Azamgarh", "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda", "Barabanki", "Bareilly", "Basti", "Bhadohi", "Bijnor", "Budaun", "Bulandshahr", "Chandauli", "Chitrakoot", "Deoria", "Etah", "Etawah", "Faizabad", "Farrukhabad", "Fatehpur", "Firozabad", "Gautam Buddh Nagar", "Ghaziabad", "Ghazipur", "Gonda", "Gorakhpur", "Hamirpur", "Hapur", "Hardoi", "Hathras", "Jalaun", "Jaunpur", "Jhansi", "Kannauj", "Kanpur Dehat", "Kanpur Nagar", "Kasganj", "Kaushambi", "Kushinagar", "Lakhimpur Kheri", "Lalitpur", "Lucknow", "Maharajganj", "Mahoba", "Mainpuri", "Mathura", "Mau", "Meerut", "Mirzapur", "Moradabad", "Muzaffarnagar", "Pilibhit", "Pratapgarh", "Rae Bareli", "Rampur", "Saharanpur", "Sambhal", "Sant Kabir Nagar", "Shahjahanpur", "Shamli", "Shravasti", "Siddharthnagar", "Sitapur", "Sonbhadra", "Sultanpur", "Unnao", "Varanasi" 
      ],
        districtSelect
      );
    } else if (selectedState === "Uttarakhand") {
      addOptionsToSelect(
      [// Districts of Uttarakhand 
        "Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri Garhwal", "Pithoragarh", "Rudraprayag", "Tehri Garhwal", "Udham Singh Nagar", "Uttarkashi" 
      ],
        districtSelect
      );
    } else if (selectedState === "West Bengal") {
      addOptionsToSelect(
      [// Districts of West Bengal 
        "Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur", "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata", "Malda", "Murshidabad", "Nadia", "North 24 Parganas", "Paschim Bardhaman", "Paschim Medinipur", "Purba Bardhaman", "Purba Medinipur", "Purulia", "South 24 Parganas", "Uttar Dinajpur" 
      ],
        districtSelect
      );
    }
    // Add more conditions for other states if needed
  }
  
  function updateTalukas() {
    var districtSelect = document.getElementById("UserDistirct");
    var talukaSelect = document.getElementById("UserTaluka");
  
    // Clear previous taluka options
    talukaSelect.innerHTML = "<option value=''>Select Taluka</option>";
  
    // Get the selected district
    var selectedDistrict = districtSelect.value;
  
    // Add talukas based on the selected district
    // Andhra Pradesh
    if (selectedDistrict === "Anantapur") {
      addOptionsToSelect(
      [//Talukas of Anantapur 
        "Agali", "Amadagur", "Amarapuram", "Anantapur", "Atmakur", "Bathalapalle", "Beluguppa", "Bommanahal", "Brahmasamudram", "Bukkapatnam", "Bukkaraya Samudram", "Chennekothapalle", "Chilamathur", "D. Hirehal", "Dharmavaram", "Gandlapenta", "Garladinne", "Gooty", "Gorantla", "Gudibanda", "Gummagatta", "Guntakal", "Hindupur", "Kadiri", "Kalyandurg", "Kambadur", "Kanaganapalle", "Kanekal", "Kothacheruvu", "Kudair", "Kundurpi", "Lepakshi", "Madakasira", "Mudigubba", "Nallacheruvu", "Nallamada", "Nambulipulikunta", "Narpala", "Obuladevaracheruvu", "Pamidi", "Parigi", "Peddapappur", "Peddavadugur", "Penukonda", "Putlur", "Puttaparthi", "Ramagiri", "Raptadu", "Rayadurg", "Roddam", "Rolla", "Settur", "Singanamala", "Somandepalle", "Tadimarri", "Tadpatri", "Talupula", "Tanakal", "Uravakonda", "Vajrakarur", "Vidapanakal", "Yadiki", "Yellanur" 
      ],
        talukaSelect
      );
    } else if (selectedDistrict === "Chittoor") {
      addOptionsToSelect(
       [// Talukas of Chittoor 
        "B.Kothakota", "Baireddipalle", "Bangarupalem", "Buchinaidu Kandriga", "Chandragiri", "Chinnagottigallu", "Chittoor", "Chowdepalle", "Gangadhara Nellore", "G.D.Nellore", "Gudipala", "Gudupalle", "Kalikiri", "Kambhamvaripalle", "Karvetinagar", "KVB Puram", "Kuppam", "Madanapalle", "Mulakalacheruvu", "Nagalapuram", "Nagari", "Nindra", "Pakala", "Palamaner", "Peddamandyam", "Peddapanjani", "Penumuru", "Pichatur", "Pileru", "Punganur", "Puthalapattu", "Ramachandrapuram", "Ramasamudram", "Ramakuppam", "Renigunta", "Rompicherla", "S.R.Puram", "Santhipuram", "Satyavedu", "Somala", "Srirangarajapuram", "Thamballapalle", "Thavanampalle", "Tirupati (Urban)", "Tirupati (Rural)", "Vadamalapeta", "Varadaiahpalem", "Vayalpad", "Vedurukuppam", "V.Kota", "Yadamari", "Yerpedu" 
      ],
        talukaSelect
      );
    } else if (selectedDistrict === "East Godavari") {
      addOptionsToSelect(
       [// Talukas of Godavari 
        "B.Kothakota", "Baireddipalle", "Bangarupalem", "Buchinaidu Kandriga", "Chandragiri", "Chinnagottigallu", "Chittoor", "Chowdepalle", "Gangadhara Nellore", "G.D.Nellore", "Gudipala", "Gudupalle", "Kalikiri", "Kambhamvaripalle", "Karvetinagar", "KVB Puram", "Kuppam", "Madanapalle", "Mulakalacheruvu", "Nagalapuram", "Nagari", "Nindra", "Pakala", "Palamaner", "Peddamandyam", "Peddapanjani", "Penumuru", "Pichatur", "Pileru", "Punganur", "Puthalapattu", "Ramachandrapuram", "Ramasamudram", "Ramakuppam", "Renigunta", "Rompicherla", "S.R.Puram", "Santhipuram", "Satyavedu", "Somala", "Srirangarajapuram", "Thamballapalle", "Thavanampalle", "Tirupati (Urban)", "Tirupati (Rural)", "Vadamalapeta", "Varadaiahpalem", "Vayalpad", "Vedurukuppam", "V.Kota", "Yadamari", "Yerpedu" 
      ],
        talukaSelect
      );
    } else if (selectedDistrict === "Guntur") {
      addOptionsToSelect(
      [// Talukas of Guntur 
       "Amaravathi", "Atchampet", "Bapatla", "Bellamkonda", "Bollapalle", "Chilakaluripet", "Dachepalle", "Duggirala", "Guntur East", "Guntur West", "Ipur", "Kakumanu", "Karempudi", "Kollipara", "Krosuru", "Macherla", "Mangalagiri", "Medikonduru", "Nadendla", "Nagaram", "Narasaraopeta", "Nizampatnam", "Pedakurapadu", "Pedanandipadu", "Phirangipuram", "Piduguralla", "Ponnur", "Prathipadu", "Repalle", "Rompicherla", "Sattenapalle", "Savalyapuram", "Tadikonda", "Tenali", "Thullur", "Tsundur", "Veldurthi", "Vemuru", "Vinukonda" 
      ],
        talukaSelect
      );
    } else if (selectedDistrict === "Krishna") {
      addOptionsToSelect(
      [// Talukas of Krishna 
       "Agiripalli", "Avanigadda", "Bantumilli", "Bapulapadu", "Challapalli", "Chatrai", "Chillakallu", "G.Konduru", "Gannavaram", "Gudivada", "Gudlavalleru", "Guduru", "Ibrahimpatnam", "Jaggayyapeta", "Kanchikacherla", "Kaikaluru", "Koduru", "Kruthivennu", "Machilipatnam", "Mandavalli", "Mudinepalle", "Mylavaram", "Nandigama", "Nandivada", "Nuzvid", "Pamidimukkala", "Pedana", "Pedaparupudi", "Penamaluru", "Penuganchiprolu", "Reddigudem", "Tiruvuru", "Vatsavai", "Veerullapadu", "Vijayawada Central", "Vijayawada East", "Vijayawada West", "Vissannapeta" 
      ],
        talukaSelect
      );
    } else if (selectedDistrict === "Kurnool") {
      addOptionsToSelect(
      [// Talukas of Kurunool 
       "Adoni", "Allagadda", "Alur", "Aspari", "Atmakur", "Banaganapalle", "Bandi Atmakur", "Bethamcherla", "C.Belagal", "Chagalamarri", "Devanakonda", "Dhone", "Dornipadu", "Gadivemula", "Gonegandla", "Gospadu", "Halaharvi", "Holagunda", "Jupadu Bungalow", "Kallur", "Kodumur", "Koilkuntla", "Kosigi", "Kurnool", "Mahanandi", "Mantralayam", "Midthur", "Nandyal", "Nandikotkur", "Orvakal", "Pamulapadu", "Panyam", "Pathikonda", "Peapully", "Rudravaram", "Sanjamala", "Srisailam", "Tuggali", "Uyyalawada", "Veldurthi", "Velgode", "Yemmiganur" 
      ],
        talukaSelect
      );
    } else if (selectedDistrict === "Nellore") {
      addOptionsToSelect(
      [// Talukas of Nellore 
       "Allur", "Ananthasagaram", "Atmakur", "Buchireddipalem", "Chejerla", "Dagadarthi", "Dakkili", "Duttalur", "Gudur", "Indukurpet", "Jaladanki" 
      ],
        talukaSelect
      );
    } else if (selectedDistrict === "Prakasam") {
      addOptionsToSelect(
      [// Talukas of Prakasam 
       "Addanki", "Ardhaveedu", "Ballikurava", "Bestavaripeta", "Chandra Sekhara Puram", "Chimakurthi", "Chinnaganjam", "Chirala", "Cumbum", "Darsi", "Dornala", "Giddaluru", "Gudluru", "Hanumanthunipadu", "Inkollu", "J Panguluru", "Kanigiri", "Karempudi", "Kondapi", "Korisapadu", "Kurichedu", "Lingasamudram", "Markapur", "Marripudi", "Martur", "Naguluppalapadu", "Ongole", "Parchur", "Pedacherlo Palle", "Podili", "Ponnaluru", "Pullalacheruvu", "Racherla", "Santhamaguluru", "Singarayakonda", "Tangutur", "Thallur", "Tripurantakam", "Veligandla", "Vetapalem", "Yerragondapalem" 
      ],
        talukaSelect
      );
    } else if (selectedDistrict === "Srikakulam") {
      addOptionsToSelect(
       [// Talukas of Srikakulam 
       "Amadalavalasa", "Burja", "Etcherla", "Ganguvarisigadam", "Gara", "Hiramandalam", "Ichchapuram", "Jalumuru", "Kanchili", "Kaviti", "Kotabommali", "Kothuru", "Laveru", "Meliaputti", "Nandigam", "Narasannapeta", "Palakonda", "Palasa", "Patapatnam", "Polaki", "Ponduru", "Rajam", "Ranastalam", "Santhabommali", "Santhakaviti", "Sarubujjili", "Seethampeta", "Sompeta", "Srikakulam", "Tekkali", "Vajrapukotturu", "Vangara" 
      ],
        talukaSelect
      );
    } else if (selectedDistrict === "SriPottiSriramuluNellore") {
      addOptionsToSelect(
      [// Talukas of SriPottiSriramuluNellore 
       "Allur", "Ananthasagaram", "Atmakur", "Buchireddipalem", "Chejerla", "Dagadarthi", "Dakkili", "Duttalur", "Gudur", "Indukurpet", "Jaladanki", "Kaligiri", "Kavali", "Kodavalur", "Kondapuram", "Kovur", "Manubolu", "Marripadu", "Muthukur", "Nellore", "Ojili", "Podalakur", "Rapur", "Sangam", "Seetharamapuram", "Sydapuram", "Thotapalligudur", "Udayagiri", "Vakadu", "Varikuntapadu", "Venkatachalam", "Vinjamur" 
      ],
        talukaSelect
      );
    } else if (selectedDistrict === "Visakhapatnam") {
      addOptionsToSelect(
      [// Talukas of Visakhapatnam 
       "Anakapalle", "Anandapuram", "Araku Valley", "Atchutapuram", "Bheemunipatnam", "Butchayyapeta", "Cheedikada", "Chintapalle", "Devarapalle", "Dumbriguda", "G.Madugula", "Gajuwaka", "Golugonda", "Hukumpeta", "K.Kotapadu", "Kasimkota", "Kotauratla", "Madugula", "Makavarapalem", "Munagapaka", "Nakkapalle", "Narsipatnam", "Paravada", "Paderu", "Padmanabham", "Pendurthi", "Pusapatirega", "Rambilli", "Ravikamatham", "Rolugunta", "Sabbavaram", "S.Rayavaram", "Visakhapatnam (Rural)", "Visakhapatnam (Urban)", "Yelamanchili" 
      ],
        talukaSelect
      );
    } else if (selectedDistrict === "Vizianagaram") {
      addOptionsToSelect(
      [// Talukas of Vizianagaram 
       "Badangi", "Bobbili", "Bondapalle", "Cheepurupalli", "Dattirajeru", "Denkada", "Gajapathinagaram", "Garividi", "Garugubilli", "Gurla", "Jami", "Komarada", "Kothavalasa", "Kurupam", "Lakkavarapukota", "Makkuva", "Mentada", "Merakamudidam", "Nellimarla", "Parvathipuram", "Pusapatirega", "Ramabhadrapuram", "Salur", "Seethanagaram", "Therlam", "Vepada", "Vizianagaram" 
      ],
        talukaSelect
      );
    } else if (selectedDistrict === "West Godavari") {
      addOptionsToSelect(
      [// Talukas of West Godavari 
       "Achanta", "Akividu", "Attili", "Bhimadole", "Bhimavaram", "Buttayagudem", "Devarapalli", "Denduluru", "Dwarakatirumala", "Elamanchili", "Eluru", "Ganapavaram", "Iragavaram", "Jangareddigudem", "Jeelugumilli", "Kalla", "Kamavarapukota", "Kovvur", "Kukunoor", "Lingapalem", "Nallajerla", "Narasapuram", "Nidadavole", "Palakoderu", "Palakollu", "Pedapadu", "Pedavegi", "Pentapadu", "Peravali", "Poduru", "Polavaram", "Tadepalligudem", "T.Narasapuram", "Undi", "Undrajavaram", "Unguturu", "Veeravasaram", "Velerupadu", "Yelamanchili" 
      ],
        talukaSelect
      );
    } 

    // Arunachal Pradesh
    else if (selectedDistrict === "Anjaw") {
      addOptionsToSelect(
          ["Hawai", "Hayuliang", "Kibithoo"],
          talukaSelect
      );
  } else if (selectedDistrict === "Changlang") {
      addOptionsToSelect(
          ["Changlang", "Chongkham", "Jairampur", "Kharsang", "Miao", "Nampong", "Rima Putaka", "Vijoynagar"],
          talukaSelect
      );
  } else if (selectedDistrict === "Dibang Valley") {
      addOptionsToSelect(
          ["Anelih", "Anini", "Dambuk", "Desali", "Etalin", "Koraliang", "Roing", "Sinyik"],
          talukaSelect
      );
  } else if (selectedDistrict === "East Kameng") {
      addOptionsToSelect(
          ["Bameng", "Chayang Tajo", "Khenewa", "Lada", "Pakke Kessang", "Pipu", "Seijosa", "Seppa", "Sonajuli"],
          talukaSelect
      );
  } else if (selectedDistrict === "East Siang") {
      addOptionsToSelect(
          ["Bilat", "Boleng", "Koyu", "Mebo", "Nari", "Pasighat", "Riga", "Ruksin", "Sille-Oyan"],
          talukaSelect
      );
  } else if (selectedDistrict === "Kra Daadi") {
    addOptionsToSelect(
        ["Pania", "Pip Sorang", "Sangram", "Taliha"],
        talukaSelect
    );
} else if (selectedDistrict === "Kurung Kumey") {
    addOptionsToSelect(
        ["Chambang", "Nyapin", "Pania", "Sangram", "Taliha"],
        talukaSelect
    );
} else if (selectedDistrict === "Lohit") {
    addOptionsToSelect(
        ["Chongkham", "Hayuliang", "Lathao", "Loiliang", "Mahadevpur", "Namsai", "Piyong", "Sunpura", "Tezu", "Wakro"],
        talukaSelect
    );
} else if (selectedDistrict === "Longding") {
  addOptionsToSelect(
      ["Kanubari", "Longding", "Pumao"],
      talukaSelect
  );
} else if (selectedDistrict === "Lower Dibang Valley") {
  addOptionsToSelect(
      ["Anini", "Dambuk", "Desali", "Etalin", "Koraliang", "Roing", "Sinyik"],
      talukaSelect
  );
} else if (selectedDistrict === "Lower Siang") {
  addOptionsToSelect(
      ["Bigo", "Bilasipara", "Jomlo Mobuk", "Nari-Koyu", "Rumgong"],
      talukaSelect
  );
} else if (selectedDistrict === "Lower Subansiri") {
  addOptionsToSelect(
      ["Daporijo", "Dumporijo", "Kaying", "Limeking", "Raga", "Sarli", "Taliha"],
      talukaSelect
  );
} else if (selectedDistrict === "Namsai") {
  addOptionsToSelect(
      ["Chongkham", "Lathao", "Lekang", "Mahadevpur", "Namsai", "Piyong", "Wakro"],
      talukaSelect
  );
} else if (selectedDistrict === "Papum Pare") {
  addOptionsToSelect(
      ["Doimukh", "Itanagar", "Sagalee", "Sangdupota", "Yachuli"],
      talukaSelect
  );
} else if (selectedDistrict === "Siang") {
  addOptionsToSelect(
      ["Boleng", "Koyu", "Mebo", "Nari", "Pasighat", "Riga", "Ruksin", "Sille-Oyan"],
      talukaSelect
  );
} else if (selectedDistrict === "Tawang") {
  addOptionsToSelect(
      ["Balemu", "Dirang", "Jang", "Kitsi", "Lumla", "Nafra", "Thembang", "Tawang", "Thingbu", "Zemithang"],
      talukaSelect
  );
} else if (selectedDistrict === "Tirap") {
  addOptionsToSelect(
      ["Borduria", "Kanubari", "Khonsa", "Laju", "Longding", "Noglo", "Pumao"],
      talukaSelect
  );
} else if (selectedDistrict === "Upper Siang") {
  addOptionsToSelect(
      ["Bigo", "Bilasipara", "Jomlo Mobuk", "Nari-Koyu", "Rumgong"],
      talukaSelect
  );
} else if (selectedDistrict === "Upper Subansiri") {
  addOptionsToSelect(
      ["Daporijo", "Dumporijo", "Kaying", "Limeking", "Raga", "Sarli", "Taliha"],
      talukaSelect
  );
} else if (selectedDistrict === "West Kameng") {
  addOptionsToSelect(
      ["Bhalukpong", "Bomdila", "Dirang", "Kalaktang", "Nafra", "Rupa", "Thembang"],
      talukaSelect
  );
} else if (selectedDistrict === "West Siang") {
  addOptionsToSelect(
      ["Along", "Bagra", "Darak", "Kamba", "Likabali", "Liromoba", "Mechuka", "Monigong", "Pakam", "Tato"],
      talukaSelect
  );
} 

// Assam
else if (selectedDistrict === "Baksa") {
  addOptionsToSelect(
      ["Baksa"],
      talukaSelect
  );
} else if (selectedDistrict === "Barpeta") {
  addOptionsToSelect(
      ["Barpeta"],
      talukaSelect
  );
} else if (selectedDistrict === "Biswanath") {
  addOptionsToSelect(
      ["Biswanath"],
      talukaSelect
  );
} else if (selectedDistrict === "Bongaigaon") {
  addOptionsToSelect(
      ["Bongaigaon"],
      talukaSelect
  );
} else if (selectedDistrict === "Cachar") {
  addOptionsToSelect(
      ["Cachar"],
      talukaSelect
  );
} else if (selectedDistrict === "Charaideo") {
  addOptionsToSelect(
      ["Charaideo"],
      talukaSelect
  );
} else if (selectedDistrict === "Chirang") {
  addOptionsToSelect(
      ["Chirang"],
      talukaSelect
  );
} else if (selectedDistrict === "Darrang") {
  addOptionsToSelect(
      ["Darrang"],
      talukaSelect
  );
} else if (selectedDistrict === "Dhemaji") {
  addOptionsToSelect(
      ["Dhemaji"],
      talukaSelect
  );
} else if (selectedDistrict === "Dhubri") {
  addOptionsToSelect(
      ["Dhubri"],
      talukaSelect
  );
} else if (selectedDistrict === "Dibrugarh") {
  addOptionsToSelect(
      ["Dibrugarh"],
      talukaSelect
  );
} else if (selectedDistrict === "Dima Hasao (North Cachar Hills)") {
  addOptionsToSelect(
      ["Dima Hasao (North Cachar Hills)"],
      talukaSelect
  );
} else if (selectedDistrict === "Goalpara") {
  addOptionsToSelect(
      ["Goalpara"],
      talukaSelect
  );
} else if (selectedDistrict === "Golaghat") {
  addOptionsToSelect(
      ["Golaghat"],
      talukaSelect
  );
} else if (selectedDistrict === "Hailakandi") {
  addOptionsToSelect(
      ["Hailakandi"],
      talukaSelect
  );
} else if (selectedDistrict === "Hojai") {
  addOptionsToSelect(
      ["Hojai"],
      talukaSelect
  );
} else if (selectedDistrict === "Jorhat") {
  addOptionsToSelect(
      ["Jorhat"],
      talukaSelect
  );
} else if (selectedDistrict === "Kamrup") {
  addOptionsToSelect(
      ["Kamrup"],
      talukaSelect
  );
} else if (selectedDistrict === "Kamrup Metropolitan") {
  addOptionsToSelect(
      ["Kamrup Metropolitan"],
      talukaSelect
  );
} else if (selectedDistrict === "Karbi Anglong") {
  addOptionsToSelect(
      ["Karbi Anglong"],
      talukaSelect
  );
} else if (selectedDistrict === "Karimganj") {
  addOptionsToSelect(
      ["Karimganj"],
      talukaSelect
  );
} else if (selectedDistrict === "Kokrajhar") {
  addOptionsToSelect(
      ["Kokrajhar"],
      talukaSelect
  );
} else if (selectedDistrict === "Lakhimpur") {
  addOptionsToSelect(
      ["Lakhimpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Majuli") {
  addOptionsToSelect(
      ["Majuli"],
      talukaSelect
  );
} else if (selectedDistrict === "Morigaon") {
  addOptionsToSelect(
      ["Morigaon"],
      talukaSelect
  );
} else if (selectedDistrict === "Nagaon") {
  addOptionsToSelect(
      ["Nagaon"],
      talukaSelect
  );
} else if (selectedDistrict === "Nalbari") {
  addOptionsToSelect(
      ["Nalbari"],
      talukaSelect
  );
} else if (selectedDistrict === "Sivasagar") {
  addOptionsToSelect(
      ["Sivasagar"],
      talukaSelect
  );
} else if (selectedDistrict === "Sonitpur") {
  addOptionsToSelect(
      ["Sonitpur"],
      talukaSelect
  );
} else if (selectedDistrict === "South Salmara-Mankachar") {
  addOptionsToSelect(
      ["South Salmara-Mankachar"],
      talukaSelect
  );
} else if (selectedDistrict === "Tinsukia") {
  addOptionsToSelect(
      ["Tinsukia"],
      talukaSelect
  );
} else if (selectedDistrict === "Udalguri") {
  addOptionsToSelect(
      ["Udalguri"],
      talukaSelect
  );
} else if (selectedDistrict === "West Karbi Anglong") {
  addOptionsToSelect(
      ["West Karbi Anglong"],
      talukaSelect
  );
}

// Bihar
else if (selectedDistrict === "Araria") {
    addOptionsToSelect(
        ["Araria"],
        talukaSelect
    );
} else if (selectedDistrict === "Arwal") {
    addOptionsToSelect(
        ["Arwal"],
        talukaSelect
    );
} else if (selectedDistrict === "Aurangabad") {
    addOptionsToSelect(
        ["Aurangabad"],
        talukaSelect
    );
} else if (selectedDistrict === "Banka") {
    addOptionsToSelect(
        ["Banka"],
        talukaSelect
    );
} else if (selectedDistrict === "Begusarai") {
    addOptionsToSelect(
        ["Begusarai"],
        talukaSelect
    );
} else if (selectedDistrict === "Bhagalpur") {
    addOptionsToSelect(
        ["Bhagalpur"],
        talukaSelect
    );
} else if (selectedDistrict === "Bhojpur (Arrah)") {
    addOptionsToSelect(
        ["Bhojpur (Arrah)"],
        talukaSelect
    );
} else if (selectedDistrict === "Buxar") {
    addOptionsToSelect(
        ["Buxar"],
        talukaSelect
    );
} else if (selectedDistrict === "Darbhanga") {
    addOptionsToSelect(
        ["Darbhanga"],
        talukaSelect
    );
} else if (selectedDistrict === "East Champaran (Motihari)") {
    addOptionsToSelect(
        ["East Champaran (Motihari)"],
        talukaSelect
    );
} else if (selectedDistrict === "Gaya") {
    addOptionsToSelect(
        ["Gaya"],
        talukaSelect
    );
} else if (selectedDistrict === "Gopalganj") {
    addOptionsToSelect(
        ["Gopalganj"],
        talukaSelect
    );
} else if (selectedDistrict === "Jamui") {
    addOptionsToSelect(
        ["Jamui"],
        talukaSelect
    );
} else if (selectedDistrict === "Jehanabad") {
    addOptionsToSelect(
        ["Jehanabad"],
        talukaSelect
    );
} else if (selectedDistrict === "Kaimur (Bhabua)") {
    addOptionsToSelect(
        ["Kaimur (Bhabua)"],
        talukaSelect
    );
} else if (selectedDistrict === "Katihar") {
    addOptionsToSelect(
        ["Katihar"],
        talukaSelect
    );
} else if (selectedDistrict === "Khagaria") {
    addOptionsToSelect(
        ["Khagaria"],
        talukaSelect
    );
} else if (selectedDistrict === "Kishanganj") {
    addOptionsToSelect(
        ["Kishanganj"],
        talukaSelect
    );
} else if (selectedDistrict === "Lakhisarai") {
    addOptionsToSelect(
        ["Lakhisarai"],
        talukaSelect
    );
} else if (selectedDistrict === "Madhepura") {
    addOptionsToSelect(
        ["Madhepura"],
        talukaSelect
    );
} else if (selectedDistrict === "Madhubani") {
    addOptionsToSelect(
        ["Madhubani"],
        talukaSelect
    );
} else if (selectedDistrict === "Munger (Monghyr)") {
    addOptionsToSelect(
        ["Munger (Monghyr)"],
        talukaSelect
    );
} else if (selectedDistrict === "Muzaffarpur") {
    addOptionsToSelect(
        ["Muzaffarpur"],
        talukaSelect
    );
} else if (selectedDistrict === "Nalanda") {
    addOptionsToSelect(
        ["Nalanda"],
        talukaSelect
    );
} else if (selectedDistrict === "Nawada") {
    addOptionsToSelect(
        ["Nawada"],
        talukaSelect
    );
} else if (selectedDistrict === "Pashchim Champaran (Bettiah)") {
    addOptionsToSelect(
        ["Pashchim Champaran (Bettiah)"],
        talukaSelect
    );
} else if (selectedDistrict === "Patna") {
    addOptionsToSelect(
        ["Patna"],
        talukaSelect
    );
} else if (selectedDistrict === "Purba Champaran (Motihari)") {
    addOptionsToSelect(
        ["Purba Champaran (Motihari)"],
        talukaSelect
    );
} else if (selectedDistrict === "Purnia (Purnea)") {
    addOptionsToSelect(
        ["Purnia (Purnea)"],
        talukaSelect
    );
} else if (selectedDistrict === "Rohtas") {
    addOptionsToSelect(
        ["Rohtas"],
        talukaSelect
    );
  } else if (selectedDistrict === "Saharsa") {
    addOptionsToSelect(
        ["Saharsa"],
        talukaSelect
    );
} else if (selectedDistrict === "Samastipur") {
    addOptionsToSelect(
        ["Samastipur"],
        talukaSelect
    );
} else if (selectedDistrict === "Saran (Chapra)") {
    addOptionsToSelect(
        ["Saran (Chapra)"],
        talukaSelect
    );
} else if (selectedDistrict === "Sheikhpura") {
    addOptionsToSelect(
        ["Sheikhpura"],
        talukaSelect
    );
} else if (selectedDistrict === "Sheohar") {
    addOptionsToSelect(
        ["Sheohar"],
        talukaSelect
    );
} else if (selectedDistrict === "Sitamarhi") {
    addOptionsToSelect(
        ["Sitamarhi"],
        talukaSelect
    );
} else if (selectedDistrict === "Siwan") {
    addOptionsToSelect(
        ["Siwan"],
        talukaSelect
    );
} else if (selectedDistrict === "Supaul") {
    addOptionsToSelect(
        ["Supaul"],
        talukaSelect
    );
}

// Chhattisgarh 
else if (selectedDistrict === "Balod") {
  addOptionsToSelect(
      ["Balod", "Gunderdehi", "Dondi", "Dondilohara", "Gurur"],
      talukaSelect
  );
} else if (selectedDistrict === "Baloda Bazar") {
  addOptionsToSelect(
      ["Baloda Bazar", "Bhatapara", "Kasdol", "Palari", "Simga"],
      talukaSelect
  );
} else if (selectedDistrict === "Balrampur") {
  addOptionsToSelect(
      ["Balrampur", "Rajpur", "Ramanujganj", "Shankargarh", "Wadrafnagar"],
      talukaSelect
  );
} else if (selectedDistrict === "Bastar") {
  addOptionsToSelect(
      ["Jagdalpur", "Bastar", "Lohandiguda", "Tokapal", "Bade Rajpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Bemetara") {
  addOptionsToSelect(
      ["Bemetara", "Berla", "Nawagarh", "Saja", "Thankhamharia"],
      talukaSelect
  );
} else if (selectedDistrict === "Bijapur") {
  addOptionsToSelect(
      ["Bijapur", "Bhairamgarh", "Bhopalpattnam", "Usur"],
      talukaSelect
  );
} else if (selectedDistrict === "Bilaspur") {
  addOptionsToSelect(
      ["Bilaspur", "Bilha", "Kota", "Lormi", "Pendra Road"],
      talukaSelect
  );
} else if (selectedDistrict === "Dantewada (South Bastar)") {
  addOptionsToSelect(
      ["Dantewada", "Gidam", "Katekalyan", "Kuwakonda"],
      talukaSelect
  );
} else if (selectedDistrict === "Dhamtari") {
  addOptionsToSelect(
      ["Dhamtari", "Kurud", "Nagri", "Magarlod"],
      talukaSelect
  );
} else if (selectedDistrict === "Durg") {
  addOptionsToSelect(
      ["Durg", "Bhilai", "Patan", "Gurur", "Dhamdha"],
      talukaSelect
  );
} else if (selectedDistrict === "Gariaband") {
  addOptionsToSelect(
      ["Gariaband", "Chhura", "Deobhog", "Mainpur", "Rajim"],
      talukaSelect
  );
} else if (selectedDistrict === "Janjgir-Champa") {
  addOptionsToSelect(
      ["Janjgir", "Champa", "Pamgarh", "Sakti", "Baradwar"],
      talukaSelect
  );
} else if (selectedDistrict === "Jashpur") {
  addOptionsToSelect(
      ["Jashpur", "Bagicha", "Kunkuri", "Manora", "Duldula"],
      talukaSelect
  );
} else if (selectedDistrict === "Kabirdham (Kawardha)") {
  addOptionsToSelect(
      ["Kawardha", "Pandariya", "Bodla"],
      talukaSelect
  );
} else if (selectedDistrict === "Kanker (North Bastar)") {
  addOptionsToSelect(
      ["Kanker", "Antagarh", "Bhanupratappur", "Charama", "Durgkondal"],
      talukaSelect
  );
} else if (selectedDistrict === "Kondagaon") {
  addOptionsToSelect(
      ["Kondagaon", "Makdi", "Pharasgaon", "Bade Dongar"],
      talukaSelect
  );
} else if (selectedDistrict === "Korba") {
  addOptionsToSelect(
      ["Korba", "Katghora", "Pali", "Kartala"],
      talukaSelect
  );
} else if (selectedDistrict === "Koriya") {
  addOptionsToSelect(
      ["Baikunthpur", "Bharatpur", "Manendragarh", "Sonhat"],
      talukaSelect
  );
} else if (selectedDistrict === "Mahasamund") {
  addOptionsToSelect(
      ["Mahasamund", "Bagbahara", "Basna", "Pithora", "Saraipali"],
      talukaSelect
  );
} else if (selectedDistrict === "Mungeli") {
  addOptionsToSelect(
      ["Mungeli", "Lormi", "Patharia"],
      talukaSelect
  );
} else if (selectedDistrict === "Narayanpur") {
  addOptionsToSelect(
      ["Narayanpur", "Orchha"],
      talukaSelect
  );
} else if (selectedDistrict === "Raigarh") {
  addOptionsToSelect(
      ["Raigarh", "Kharsia", "Sarangarh", "Lailunga", "Gharghoda"],
      talukaSelect
  );
} else if (selectedDistrict === "Raipur (Capital)") {
  addOptionsToSelect(
      ["Raipur", "Abhanpur", "Arang", "Tilda", "Gobranawapara"],
      talukaSelect
  );
} else if (selectedDistrict === "Rajnandgaon") {
  addOptionsToSelect(
      ["Rajnandgaon", "Dongargarh", "Khairagarh", "Chhuikhadan", "Manpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Sukma") {
  addOptionsToSelect(
      ["Sukma", "Chhindgarh", "Kontaa"],
      talukaSelect
  );
} else if (selectedDistrict === "Surajpur") {
  addOptionsToSelect(
      ["Surajpur", "Bishrampur", "Oudgi", "Pratappur"],
      talukaSelect
  );
} else if (selectedDistrict === "Surguja") {
  addOptionsToSelect(
      ["Ambikapur", "Lakhanpur", "Sitapur", "Lundra", "Batouli"],
      talukaSelect
  );
}

// Goa
else if (selectedDistrict === "North Goa") {
  addOptionsToSelect(
      ["Bardez", "Bicholim", "Pernem", "Ponda", "Sattari", "Tiswadi", "Valpoi"],
      talukaSelect
  );
} else if (selectedDistrict === "South Goa") {
  addOptionsToSelect(
      ["Canacona", "Mormugao", "Quepem", "Salcete", "Sanguem"],
      talukaSelect
  );
}

// Gujarat
else if (selectedDistrict === "Ahmedabad") {
  addOptionsToSelect(
      ["Ahmedabad City", "Daskroi", "Detroj-Rampura", "Dhandhuka", "Dholera", "Dholka", "Mandal", "Sanand", "Viramgam"],
      talukaSelect
  );
} else if (selectedDistrict === "Amreli") {
  addOptionsToSelect(
      ["Amreli", "Babra", "Bagasara", "Dhari", "Jafrabad", "Khambha", "Kunkavav Vadia", "Lathi", "Lilia", "Rajula", "Savarkundla"],
      talukaSelect
  );
} else if (selectedDistrict === "Anand") {
  addOptionsToSelect(
      ["Anand", "Anklav", "Borsad", "Khambhat", "Petlad", "Sojitra", "Tarapur", "Umreth"],
      talukaSelect
  );
} else if (selectedDistrict === "Aravalli") {
  addOptionsToSelect(
      ["Bayad", "Bhiloda", "Dhansura", "Malpur", "Meghraj", "Modasa"],
      talukaSelect
  );
} else if (selectedDistrict === "Banaskantha") {
  addOptionsToSelect(
      ["Amirgadh", "Bhabhar", "Danta", "Dantiwada", "Deesa", "Deodar", "Dhanera", "Kankrej", "Lakhani", "Palanpur", "Tharad", "Vadgam", "Vav"],
      talukaSelect
  );
} else if (selectedDistrict === "Bharuch") {
  addOptionsToSelect(
      ["Amod", "Ankleshwar", "Bharuch", "Hansot", "Jambusar", "Jhagadia", "Netrang", "Vagra", "Valia"],
      talukaSelect
  );
} else if (selectedDistrict === "Bhavnagar") {
  addOptionsToSelect(
      ["Bhavnagar", "Ghogha", "Gariadhar", "Jesar", "Mahuva", "Palitana", "Sihor", "Talaja", "Umrala", "Vallabhipur"],
      talukaSelect
  );
} else if (selectedDistrict === "Botad") {
  addOptionsToSelect(
      ["Botad", "Gadhada"],
      talukaSelect
  );
} else if (selectedDistrict === "Chhota Udaipur") {
  addOptionsToSelect(
      ["Chhota Udaipur", "Bodeli", "Jetpur Pavi", "Kavant", "Naswadi", "Sankheda"],
      talukaSelect
  );
} else if (selectedDistrict === "Dahod") {
  addOptionsToSelect(
      ["Dahod", "Devgadh Baria", "Dhanpur", "Fatepura", "Garbada", "Limkheda", "Sanjeli", "Singvad", "Zalod"],
      talukaSelect
  );
} else if (selectedDistrict === "Dang") {
  addOptionsToSelect(
      ["Ahwa", "Subir", "Waghai"],
      talukaSelect
  );
} else if (selectedDistrict === "Devbhoomi Dwarka") {
  addOptionsToSelect(
      ["Bhanvad", "Dwarka", "Kalyanpur", "Khambhalia"],
      talukaSelect
  );
} else if (selectedDistrict === "Gandhinagar") {
  addOptionsToSelect(
      ["Dehgam", "Gandhinagar", "Kalol", "Mansa"],
      talukaSelect
  );
} else if (selectedDistrict === "Gir Somnath") {
  addOptionsToSelect(
      ["Gir Gadhada", "Kodinar", "Patan-Veraval", "Sutrapada", "Talala", "Una"],
      talukaSelect
  );
} else if (selectedDistrict === "Jamnagar") {
  addOptionsToSelect(
      ["Dhrol", "Jamjodhpur", "Jamnagar", "Jodiya", "Kalavad", "Lalpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Junagadh") {
  addOptionsToSelect(
      ["Junagadh", "Bhesan", "Junagadh", "Keshod", "Manavadar", "Mangrol", "Mendarda", "Malia", "Visavadar", "Vanthali"],
      talukaSelect
  );
} else if (selectedDistrict === "Kutch") {
  addOptionsToSelect(
      ["Abdasa", "Anjar", "Bhachau", "Bhuj", "Gandhidham", "Lakhpat", "Mandvi", "Mundra", "Nakhatrana", "Rapar"],
      talukaSelect
  );
} else if (selectedDistrict === "Kheda") {
  addOptionsToSelect(
      ["Kapadvanj", "Kathlal", "Kheda", "Mahemdavad", "Mahudha", "Matar", "Nadiad", "Thasra", "Vaso"],
      talukaSelect
  );
} else if (selectedDistrict === "Mahisagar") {
  addOptionsToSelect(
      ["Balasinor", "Kadana", "Khanpur", "Lunawada", "Santrampur", "Virpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Mehsana") {
  addOptionsToSelect(
      ["Becharaji", "Jotana", "Kadi", "Kheralu", "Mehsana", "Satlasana", "Unjha", "Vadnagar", "Vijapur", "Visnagar"],
      talukaSelect
  );
} else if (selectedDistrict === "Morbi") {
  addOptionsToSelect(
      ["Halvad", "Morbi", "Maliya", "Tankara", "Wankaner"],
      talukaSelect
  );
} else if (selectedDistrict === "Narmada") {
  addOptionsToSelect(
      ["Dediapada", "Garudeshwar", "Nandod", "Sagbara", "Tilakwada"],
      talukaSelect
  );
} else if (selectedDistrict === "Navsari") {
  addOptionsToSelect(
      ["Chikhli", "Gandevi", "Jalalpore", "Khergam", "Navsari", "Vansda"],
      talukaSelect
  );
} else if (selectedDistrict === "Panchmahal") {
  addOptionsToSelect(
      ["Godhra", "Ghoghamba", "Halol", "Jambughoda", "Kalol", "Lunawada", "Morva Hadaf", "Santrampur", "Shehera"],
      talukaSelect
  );
} else if (selectedDistrict === "Patan") {
  addOptionsToSelect(
      ["Chanasma", "Harij", "Patan", "Radhanpur", "Sami", "Sankheswar", "Sarasvati", "Sidhpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Porbandar") {
  addOptionsToSelect(
      ["Kutiyana", "Porbandar", "Ranavav"],
      talukaSelect
  );
} else if (selectedDistrict === "Rajkot") {
  addOptionsToSelect(
      ["Dhoraji", "Gondal", "Jamkandorna", "Jasdan", "Jetpur", "Kotda Sangani", "Lodhika", "Paddhari", "Rajkot", "Upleta"],
      talukaSelect
  );
} else if (selectedDistrict === "Sabarkantha") {
  addOptionsToSelect(
      ["Bhiloda", "Himmatnagar", "Idar", "Khedbrahma", "Poshina", "Prantij", "Talod", "Vadali", "Vijaynagar"],
      talukaSelect
  );
} else if (selectedDistrict === "Surat") {
  addOptionsToSelect(
      ["Bardoli", "Choryasi", "Kamrej", "Mahuva", "Mandvi", "Mangrol", "Olpad", "Palsana", "Umarpada"],
      talukaSelect
  );
} else if (selectedDistrict === "Surendranagar") {
  addOptionsToSelect(
      ["Chotila", "Chuda", "Dasada", "Dhrangadhra", "Halvad", "Lakhtar", "Limbdi", "Muli", "Sayla", "Thangadh", "Wadhwan"],
      talukaSelect
  );
} else if (selectedDistrict === "Tapi") {
  addOptionsToSelect(
      ["Dolvan", "Kukarmunda", "Nizar", "Songadh", "Uchchhal", "Vyara"],
      talukaSelect
  );
} else if (selectedDistrict === "Valsad") {
  addOptionsToSelect(
      ["Dharampur", "Kaprada", "Pardi", "Umargam", "Valsad", "Vapi"],
      talukaSelect
  );
}

//Harayana 
else if (selectedDistrict === "Ambala") {
  addOptionsToSelect(
      ["Ambala", "Barara", "Naraingarh", "Shahzadpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Bhiwani") {
  addOptionsToSelect(
      ["Badhra", "Bhiwani", "Loharu", "Siwani", "Tosham"],
      talukaSelect
  );
} else if (selectedDistrict === "Charkhi Dadri") {
  addOptionsToSelect(
      ["Badhra", "Charkhi Dadri"],
      talukaSelect
  );
} else if (selectedDistrict === "Faridabad") {
  addOptionsToSelect(
      ["Ballabgarh", "Faridabad"],
      talukaSelect
  );
} else if (selectedDistrict === "Fatehabad") {
  addOptionsToSelect(
      ["Bhattu Kalan", "Fatehabad", "Ratia", "Tohana"],
      talukaSelect
  );
} else if (selectedDistrict === "Gurugram (Gurgaon)") {
  addOptionsToSelect(
      ["Farrukhnagar", "Gurugram", "Manesar", "Pataudi", "Sohna"],
      talukaSelect
  );
} else if (selectedDistrict === "Hisar") {
  addOptionsToSelect(
      ["Adampur", "Barwala", "Hansi", "Hisar", "Narnaund", "Uklana"],
      talukaSelect
  );
} else if (selectedDistrict === "Jhajjar") {
  addOptionsToSelect(
      ["Bahadurgarh", "Beri", "Jhajjar", "Matenhail"],
      talukaSelect
  );
} else if (selectedDistrict === "Jind") {
  addOptionsToSelect(
      ["Alewa", "Jind", "Julana", "Narwana", "Pillukhera", "Safidon", "Uchana"],
      talukaSelect
  );
} else if (selectedDistrict === "Kaithal") {
  addOptionsToSelect(
      ["Cheeka", "Guhla", "Kaithal", "Pundri", "Rajound"],
      talukaSelect
  );
} else if (selectedDistrict === "Karnal") {
  addOptionsToSelect(
      ["Assandh", "Gharaunda", "Indri", "Karnal", "Nilokheri", "Nissing"],
      talukaSelect
  );
} else if (selectedDistrict === "Kurukshetra") {
  addOptionsToSelect(
      ["Ladwa", "Pehowa", "Shahabad", "Thanesar"],
      talukaSelect
  );
} else if (selectedDistrict === "Mahendragarh") {
  addOptionsToSelect(
      ["Ateli", "Kanina", "Mahendragarh", "Nangal Chaudhary", "Narnaul"],
      talukaSelect
  );
} else if (selectedDistrict === "Nuh") {
  addOptionsToSelect(
      ["Ferozepur Jhirka", "Nagina", "Nuh", "Punahana", "Taoru"],
      talukaSelect
  );
} else if (selectedDistrict === "Palwal") {
  addOptionsToSelect(
      ["Hassanpur", "Hathin", "Palwal"],
      talukaSelect
  );
} else if (selectedDistrict === "Panchkula") {
  addOptionsToSelect(
      ["Barwala", "Kalka", "Panchkula", "Raipur Rani"],
      talukaSelect
  );
} else if (selectedDistrict === "Panipat") {
  addOptionsToSelect(
      ["Israna", "Madlauda", "Panipat", "Samalkha"],
      talukaSelect
  );
} else if (selectedDistrict === "Rewari") {
  addOptionsToSelect(
      ["Bawal", "Dharuhera", "Kosli", "Rewari"],
      talukaSelect
  );
} else if (selectedDistrict === "Rohtak") {
  addOptionsToSelect(
      ["Kalanaur", "Maham", "Rohtak", "Sampla"],
      talukaSelect
  );
} else if (selectedDistrict === "Sirsa") {
  addOptionsToSelect(
      ["Baragudha", "Dabwali", "Ellenabad", "Rania", "Sirsa"],
      talukaSelect
  );
} else if (selectedDistrict === "Sonipat") {
  addOptionsToSelect(
      ["Ganaur", "Gohana", "Kharkhoda", "Mohana", "Rai", "Sonipat"],
      talukaSelect
  );
} else if (selectedDistrict === "Yamunanagar") {
  addOptionsToSelect(
      ["Bilaspur", "Chhachhrauli", "Jagadhri", "Mustafabad", "Radaur", "Sadhaura", "Saraswati Nagar", "Yamunanagar"],
      talukaSelect
  );
}

//Himachal Pradesh
else if (selectedDistrict === "Bilaspur") {
  addOptionsToSelect(
      ["Bilaspur Sadar", "Ghumarwin", "Jhanduta", "Naina Devi"],
      talukaSelect
  );
} else if (selectedDistrict === "Chamba") {
  addOptionsToSelect(
      ["Bhalai", "Bhattiyat", "Chamba", "Churah", "Dalhousie", "Pangi", "Salooni"],
      talukaSelect
  );
} else if (selectedDistrict === "Hamirpur") {
  addOptionsToSelect(
      ["Bhoranj", "Hamirpur", "Nadaun", "Sujanpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Kangra") {
  addOptionsToSelect(
      ["Baijnath", "Baroh", "Dehra Gopipur", "Fatehpur", "Harchakian", "Indora", "Jaisinghpur", "Jawalamukhi", "Jawali", "Kangra", "Kotla", "Kullu", "Lambagaon", "Nagrota Bagwan", "Nurpur", "Palampur", "Rait", "Shahpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Kinnaur") {
  addOptionsToSelect(
      ["Hangrang", "Kalpa", "Morang", "Poo", "Sangla"],
      talukaSelect
  );
} else if (selectedDistrict === "Kullu") {
  addOptionsToSelect(
      ["Ani", "Banjar", "Kullu", "Manali", "Nirmand"],
      talukaSelect
  );
} else if (selectedDistrict === "Lahaul and Spiti") {
  addOptionsToSelect(
      ["Lahaul", "Spiti"],
      talukaSelect
  );
} else if (selectedDistrict === "Mandi") {
  addOptionsToSelect(
      ["Baldwara", "Balh", "Chachyot", "Chohar", "Dharmpur", "Gohar", "Joginder Nagar", "Karsog", "Kotli", "Padhar", "Sarkaghat", "Sundernagar", "Tihra"],
      talukaSelect
  );
} else if (selectedDistrict === "Shimla") {
  addOptionsToSelect(
      ["Chaupal", "Theog", "Dodra Kwar", "Jubbal", "Kotkhai", "Rampur", "Rohru", "Shimla Rural", "Shimla Urban"],
      talukaSelect
  );
} else if (selectedDistrict === "Sirmaur") {
  addOptionsToSelect(
      ["Nahan", "Paonta Sahib", "Rajgarh", "Sangrah", "Shillai"],
      talukaSelect
  );
} else if (selectedDistrict === "Solan") {
  addOptionsToSelect(
      ["Arki", "Baddi", "Kandaghat", "Nalagarh", "Ramshehar", "Solan"],
      talukaSelect
  );
} else if (selectedDistrict === "Una") {
  addOptionsToSelect(
      ["Amb", "Bangana", "Gagret", "Haroli", "Una"],
      talukaSelect
  );
}

//Jharkhand
else if (selectedDistrict === "Bokaro") {
  addOptionsToSelect(
      ["Bermo", "Chas", "Gomia", "Kasmar", "Nawadih", "Petarwar"],
      talukaSelect
  );
} else if (selectedDistrict === "Chatra") {
  addOptionsToSelect(
      ["Chatra", "Gidhaur", "Hunterganj", "Itkhori", "Kanhachatti", "Kunda", "Lawalong", "Mayurhand", "Pratappur", "Simaria", "Simeria"],
      talukaSelect
  );
} else if (selectedDistrict === "Deoghar") {
  addOptionsToSelect(
      ["Deoghar", "Madhupur", "Margo Munda", "Mohandari", "Sarath", "Sarwan", "Sonaraithari"],
      talukaSelect
  );
} else if (selectedDistrict === "Dhanbad") {
  addOptionsToSelect(
      ["Baghmara", "Dhanbad", "Govindpur", "Nirsa", "Tundi"],
      talukaSelect
  );
} else if (selectedDistrict === "Dumka") {
  addOptionsToSelect(
      ["Dumka", "Gopikandar", "Jama", "Jarmundi", "Kathikund", "Masalia", "Ramgarh", "Ranishwar", "Shikaripara", "Sarath"],
      talukaSelect
  );
} else if (selectedDistrict === "East Singhbhum") {
  addOptionsToSelect(
      ["Baharagora", "Dhalbhumgarh", "Ghatshila", "Musabani", "Potka"],
      talukaSelect
  );
} else if (selectedDistrict === "Garhwa") {
  addOptionsToSelect(
      ["Bhandaria", "Bishunpura", "Chinia", "Dandai", "Danda", "Garhwa", "Kandi", "Majhion", "Manjhiaon", "Meral", "Nagar Untari", "Ramkanda", "Ramna", "Ranka"],
      talukaSelect
  );
} else if (selectedDistrict === "Giridih") {
  addOptionsToSelect(
      ["Bagodar", "Bengabad", "Birni", "Deori", "Dhanwar", "Dumri", "Gande", "Giridih", "Jamua", "Pirtand", "Sariya", "Tisri"],
      talukaSelect
  );
} else if (selectedDistrict === "Godda") {
  addOptionsToSelect(
      ["Bashanpur", "Boarijore", "Godda", "Mahagama", "Meherma", "Pathargama", "Poreyahat", "Sundarpahari", "Thakurgangti"],
      talukaSelect
  );
} else if (selectedDistrict === "Gumla") {
  addOptionsToSelect(
      ["Bharno", "Basia", "Bishunpur", "Chainpur", "Dumri", "Ghaghra", "Gumla", "Kamdara", "Kolebira", "Kurdeg", "Palkot", "Raidih", "Sisai"],
      talukaSelect
  );
} else if (selectedDistrict === "Hazaribagh") {
  addOptionsToSelect(
      ["Barhi", "Barkagaon", "Barkatha", "Bishnugarh", "Chalkusa", "Chauparan", "Churchu", "Dadi", "Daru", "Ichak", "Katkamsandi", "Keredari", "Padma", "Ramgarh"],
      talukaSelect
  );
} else if (selectedDistrict === "Jamtara") {
  addOptionsToSelect(
      ["Jamtara", "Karma Tand", "Nala", "Narayanpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Khunti") {
  addOptionsToSelect(
      ["Arki", "Khunti", "Murhu", "Rania", "Torpa"],
      talukaSelect
  );
} else if (selectedDistrict === "Koderma") {
  addOptionsToSelect(
      ["Domchanch", "Jainagar", "Koderma", "Markacho", "Satgawan"],
      talukaSelect
  );
} else if (selectedDistrict === "Latehar") {
  addOptionsToSelect(
      ["Balumath", "Barwadih", "Chandwa", "Garu", "Latehar", "Manika", "Mahuatand"],
      talukaSelect
  );
} else if (selectedDistrict === "Lohardaga") {
  addOptionsToSelect(
      ["Bhandra", "Kairo", "Kuru", "Lohardaga", "Peshrar", "Senha"],
      talukaSelect
  );
} else if (selectedDistrict === "Pakur") {
  addOptionsToSelect(
      ["Amrapara", "Hiranpur", "Littipara", "Maheshpur", "Pakur", "Pakuria"],
      talukaSelect
  );
} else if (selectedDistrict === "Palamu") {
  addOptionsToSelect(
      ["Bishrampur", "Chhatarpur", "Hariharganj", "Hussainabad", "Lesliganj", "Manatu", "Manika", "Medininagar", "Nawa Bazar", "Padwa", "Pandu", "Panki", "Patan", "Tarhasi"],
      talukaSelect
  );
} else if (selectedDistrict === "Ramgarh") {
  addOptionsToSelect(
      ["Barkagaon", "Chitarpur", "Dulmi", "Gola", "Mandu", "Patratu", "Ramgarh"],
      talukaSelect
  );
} else if (selectedDistrict === "Ranchi") {
  addOptionsToSelect(
      ["Angara", "Bero", "Burmu", "Chanho", "Itki", "Kanke", "Khelari", "Lapung", "Mandar", "Namkum", "Ormanjhi", "Ratu", "Sonahatu", "Silli", "Tamar"],
      talukaSelect
  );
} else if (selectedDistrict === "Sahibganj") {
  addOptionsToSelect(
      ["Barharwa", "Borio", "Mandro", "Pathna", "Rajmahal", "Sahibganj", "Taljhari", "Udhwa"],
      talukaSelect
  );
} else if (selectedDistrict === "Seraikela Kharsawan") {
  addOptionsToSelect(
      ["Chandil", "Ichagarh", "Kuchai", "Nimdih", "Rajnagar", "Seraikela", "Kharsawan"],
      talukaSelect
  );
} else if (selectedDistrict === "Simdega") {
  addOptionsToSelect(
      ["Bano", "Bansjore", "Bolba", "Jaldega", "Kersai", "Kolebira", "Kurdeg", "Simdega", "Thethaitangar"],
      talukaSelect
  );
} else if (selectedDistrict === "West Singhbhum") {
  addOptionsToSelect(
      ["Anandpur", "Bandgaon", "Chaibasa", "Chakradharpur", "Gudri", "Hatgamharia", "Jagannathpur", "Jhinkpani", "Khuntpani", "Manoharpur", "Manjhari", "Noamundi", "Sonua", "Tantnagar", "Tonto"],
      talukaSelect
  );
}

// Karnataka
else if (selectedDistrict === "Bagalkot") {
  addOptionsToSelect(
      ["Badami", "Bagalkot", "Bilgi", "Hunagund", "Jamkhandi", "Mudhol"],
      talukaSelect
  );
} else if (selectedDistrict === "Ballari (Bellary)") {
  addOptionsToSelect(
      ["Ballari", "Hadagalli", "Hagaribommanahalli", "Hoovina Hadagalli", "Hospet", "Kampli", "Kudligi", "Sandur", "Siruguppa"],
      talukaSelect
  );
} else if (selectedDistrict === "Belagavi (Belgaum)") {
  addOptionsToSelect(
      ["Athani", "Bailhongal", "Belgaum", "Chikkodi", "Gokak", "Hukkeri", "Khanapur", "Mudalagi", "Nippani", "Ramdurg", "Raybag", "Sankeshwar", "Saundatti"],
      talukaSelect
  );
} else if (selectedDistrict === "Bengaluru (Bangalore) Rural") {
  addOptionsToSelect(
      ["Devanahalli", "Doddaballapura", "Hoskote", "Nelamangala"],
      talukaSelect
  );
} else if (selectedDistrict === "Bengaluru (Bangalore) Urban") {
  addOptionsToSelect(
      ["Anekal", "Bangalore East", "Bangalore North", "Bangalore South", "Bangalore West", "Dasanapura", "Yelahanka"],
      talukaSelect
  );
} else if (selectedDistrict === "Bidar") {
  addOptionsToSelect(
      ["Aurad", "Basavakalyan", "Bhalki", "Bidar", "Humnabad"],
      talukaSelect
  );
} else if (selectedDistrict === "Chamarajanagar") {
  addOptionsToSelect(
      ["Chamarajanagar", "Gundlupet", "Kollegal", "Yelandur"],
      talukaSelect
  );
} else if (selectedDistrict === "Chikballapur") {
  addOptionsToSelect(
      ["Bagepalli", "Chikballapur", "Chintamani", "Gauribidanur", "Gudibanda", "Sidlaghatta"],
      talukaSelect
  );
} else if (selectedDistrict === "Chikkamagaluru (Chikmagalur)") {
  addOptionsToSelect(
      ["Chikmagalur", "Kaduru", "Koppa", "Mudigere", "Narasimharajapura", "Sringeri", "Tarikere"],
      talukaSelect
  );
} else if (selectedDistrict === "Chitradurga") {
  addOptionsToSelect(
      ["Challakere", "Chitradurga", "Hiriyur", "Holalkere", "Hosadurga", "Molakalmuru"],
      talukaSelect
  );
} else if (selectedDistrict === "Dakshina Kannada") {
  addOptionsToSelect(
      ["Bantwal", "Belthangady", "Karkala", "Mangaluru", "Moodabidri", "Puttur", "Sullia", "Ullal", "Uppinangady"],
      talukaSelect
  );
} else if (selectedDistrict === "Davangere") {
  addOptionsToSelect(
      ["Channagiri", "Davanagere", "Harihar", "Honnali", "Jagalur"],
      talukaSelect
  );
} else if (selectedDistrict === "Dharwad") {
  addOptionsToSelect(
      ["Dharwad", "Hubli", "Kalghatgi", "Kundgol", "Navalgund"],
      talukaSelect
  );
} else if (selectedDistrict === "Gadag") {
  addOptionsToSelect(
      ["Gadag", "Mundargi", "Nargund", "Ron", "Shirahatti"],
      talukaSelect
  );
} else if (selectedDistrict === "Hassan") {
  addOptionsToSelect(
      ["Alur", "Arsikere", "Belur", "Channarayapatna", "Hassan", "Holenarasipura", "Sakleshpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Haveri") {
  addOptionsToSelect(
      ["Byadgi", "Hangal", "Haveri", "Hirekerur", "Ranebennur", "Savanur", "Shiggaon"],
      talukaSelect
  );
} else if (selectedDistrict === "Kalaburagi (Gulbarga)") {
  addOptionsToSelect(
      ["Afzalpur", "Aland", "Chincholi", "Chitapur", "Gulbarga", "Jevargi", "Sedam"],
      talukaSelect
  );
} else if (selectedDistrict === "Kodagu (Coorg)") {
  addOptionsToSelect(
      ["Madikeri", "Somvarpet", "Virajpet"],
      talukaSelect
  );
} else if (selectedDistrict === "Kolar") {
  addOptionsToSelect(
      ["Bangarapet", "Kolar", "Malur", "Mulbagal", "Srinivaspur"],
      talukaSelect
  );
} else if (selectedDistrict === "Koppal") {
  addOptionsToSelect(
      ["Gangavathi", "Koppal", "Kushtagi", "Yelburga"],
      talukaSelect
  );
} else if (selectedDistrict === "Mandya") {
  addOptionsToSelect(
      ["Krishnarajpet", "Maddur", "Malavalli", "Mandya", "Nagamangala", "Pandavapura", "Srirangapatna"],
      talukaSelect
  );
} else if (selectedDistrict === "Mysuru (Mysore)") {
  addOptionsToSelect(
      ["Heggadadevankote", "Hunsur", "Krishnarajanagara", "Mysuru", "Nanjangud", "Piriyapatna", "Tirumakudal Narsipur"],
      talukaSelect
  );
} else if (selectedDistrict === "Raichur") {
  addOptionsToSelect(
      ["Deodurga", "Lingsugur", "Manvi", "Raichur", "Sindhanur"],
      talukaSelect
  );
} else if (selectedDistrict === "Ramanagara") {
  addOptionsToSelect(
      ["Channapatna", "Kanakapura", "Magadi", "Ramanagara"],
      talukaSelect
  );
} else if (selectedDistrict === "Shivamogga (Shimoga)") {
  addOptionsToSelect(
      ["Bhadravati", "Hosanagara", "Sagara", "Shikaripura", "Shimoga", "Soraba", "Tirthahalli"],
      talukaSelect
  );
} else if (selectedDistrict === "Tumakuru (Tumkur)") {
  addOptionsToSelect(
      ["Chikkanayakana Halli", "Gubbi", "Koratagere", "Kunigal", "Madhugiri", "Pavagada", "Sira", "Tiptur", "Tumkur"],
      talukaSelect
  );
} else if (selectedDistrict === "Udupi") {
  addOptionsToSelect(
      ["Brahmavar", "Hebri", "Karkala", "Kundapura", "Udupi"],
      talukaSelect
  );
} else if (selectedDistrict === "Uttara Kannada (Karwar)") {
  addOptionsToSelect(
      ["Ankola", "Bhatkal", "Dandeli", "Haliyal", "Honnavar", "Karwar", "Kumta", "Mundgod", "Siddapur", "Sirsi", "Yellapur"],
      talukaSelect
  );
} else if (selectedDistrict === "Vijayapura (Bijapur)") {
  addOptionsToSelect(
      ["Basavana Bagewadi", "Bijapur", "Indi", "Muddebihal", "Sindagi"],
      talukaSelect
  );
} else if (selectedDistrict === "Yadgir") {
  addOptionsToSelect(
      ["Gurmitkal", "Shahapur", "Shorapur", "Yadgir"],
      talukaSelect
  );
}

// Kerala
else if (selectedDistrict === "Alappuzha (Alleppey)") {
  addOptionsToSelect(
      ["Ambalappuzha", "Chengannur", "Cherthala", "Haripad", "Karthikappally", "Kuttanad", "Mavelikkara"],
      talukaSelect
  );
} else if (selectedDistrict === "Ernakulam") {
  addOptionsToSelect(
      ["Aluva", "Kothamangalam", "Kunnathunad", "Muvattupuzha", "North Paravur", "Perumbavoor", "Kochi", "Kanayannur"],
      talukaSelect
  );
} else if (selectedDistrict === "Idukki") {
  addOptionsToSelect(
      ["Devikulam", "Idukki", "Nedumkandam", "Peermade", "Thodupuzha", "Udumbanchola"],
      talukaSelect
  );
} else if (selectedDistrict === "Kannur") {
  addOptionsToSelect(
      ["Iritty", "Kannur", "Payyannur", "Taliparamba", "Thalassery"],
      talukaSelect
  );
} else if (selectedDistrict === "Kasaragod") {
  addOptionsToSelect(
      ["Hosdurg", "Kasaragod", "Manjeshwaram", "Vellarikundu"],
      talukaSelect
  );
} else if (selectedDistrict === "Kollam (Quilon)") {
  addOptionsToSelect(
      ["Karunagappally", "Kottarakkara", "Kunnathur", "Kollam", "Pathanapuram", "Punalur"],
      talukaSelect
  );
} else if (selectedDistrict === "Kottayam") {
  addOptionsToSelect(
      ["Changanasserry", "Kanjirappally", "Kottayam", "Meenachil", "Vaikom"],
      talukaSelect
  );
} else if (selectedDistrict === "Kozhikode (Calicut)") {
  addOptionsToSelect(
      ["Koyilandy", "Kozhikode", "Thamarassery", "Vatakara"],
      talukaSelect
  );
} else if (selectedDistrict === "Malappuram") {
  addOptionsToSelect(
      ["Eranad", "Kondotty", "Nilambur", "Perinthalmanna", "Ponnani", "Tirur", "Tirurangadi"],
      talukaSelect
  );
} else if (selectedDistrict === "Palakkad") {
  addOptionsToSelect(
      ["Alathur", "Chittur", "Mannarkkad", "Ottappalam", "Palakkad"],
      talukaSelect
  );
} else if (selectedDistrict === "Pathanamthitta") {
  addOptionsToSelect(
      ["Adoor", "Kozhencherry", "Ranni", "Thiruvalla"],
      talukaSelect
  );
} else if (selectedDistrict === "Thiruvananthapuram") {
  addOptionsToSelect(
      ["Chirayinkeezhu", "Nedumangad", "Neyyattinkara", "Thiruvananthapuram"],
      talukaSelect
  );
} else if (selectedDistrict === "Thrissur") {
  addOptionsToSelect(
      ["Chalakudy", "Chavakkad", "Irinjalakuda", "Kodungallur", "Mukundapuram", "Thalappilly", "Thrissur"],
      talukaSelect
  );
} else if (selectedDistrict === "Wayanad") {
  addOptionsToSelect(
      ["Mananthavady", "Sulthan Bathery", "Vythiri"],
      talukaSelect
  );
}

// Madhya Pradesh
else if (selectedDistrict === "Agar Malwa") {
  addOptionsToSelect(
      ["Agar", "Susner"],
      talukaSelect
  );
} else if (selectedDistrict === "Alirajpur") {
  addOptionsToSelect(
      ["Alirajpur", "Jobat"],
      talukaSelect
  );
} else if (selectedDistrict === "Anuppur") {
  addOptionsToSelect(
      ["Anuppur", "Kotma", "Pushprajgarh"],
      talukaSelect
  );
} else if (selectedDistrict === "Ashoknagar") {
  addOptionsToSelect(
      ["Ashoknagar", "Chanderi", "Mungaoli", "Shadora"],
      talukaSelect
  );
} else if (selectedDistrict === "Balaghat") {
  addOptionsToSelect(
      ["Balaghat", "Baihar", "Katangi", "Kirnapur", "Lanji", "Paraswada", "Waraseoni"],
      talukaSelect
  );
} else if (selectedDistrict === "Barwani") {
  addOptionsToSelect(
      ["Barwani", "Niwali", "Pati", "Rajpur", "Sendhwa", "Thikri"],
      talukaSelect
  );
} else if (selectedDistrict === "Betul") {
  addOptionsToSelect(
      ["Amla", "Athner", "Betul", "Bhainsdehi", "Chicholi", "Ghoradongri", "Multai", "Shahpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Bhind") {
  addOptionsToSelect(
      ["Ater", "Bhind", "Gohad", "Lahar", "Mehgaon"],
      talukaSelect
  );
} else if (selectedDistrict === "Bhopal") {
  addOptionsToSelect(
      ["Berasia", "Bhopal"],
      talukaSelect
  );
} else if (selectedDistrict === "Burhanpur") {
  addOptionsToSelect(
      ["Burhanpur", "Khaknar", "Nepanagar"],
      talukaSelect
  );
} else if (selectedDistrict === "Chhatarpur") {
  addOptionsToSelect(
      ["Badamalhera", "Bada Malhera", "Bijawar", "Buxwaha", "Chandla", "Chhatarpur", "Gaurihar", "Lavkushnagar", "Maharajpur", "Nowgong", "Rajpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Chhindwara") {
  addOptionsToSelect(
      ["Amarwara", "Chaurai", "Chhindwara", "Harrai", "Jamai", "Mohkhed", "Pandhurna", "Parasia", "Sausar", "Tamia"],
      talukaSelect
  );
} else if (selectedDistrict === "Damoh") {
  addOptionsToSelect(
      ["Damoh", "Hatta", "Jabera", "Pathariya", "Patera", "Tendukheda"],
      talukaSelect
  );
} else if (selectedDistrict === "Datia") {
  addOptionsToSelect(
      ["Bhander", "Datia", "Indergarh", "Seondha"],
      talukaSelect
  );
} else if (selectedDistrict === "Dewas") {
  addOptionsToSelect(
      ["Bagli", "Dewas", "Kannod", "Khategaon", "Sonkatch", "Tonkkhurd"],
      talukaSelect
  );
} else if (selectedDistrict === "Dhar") {
  addOptionsToSelect(
      ["Badnawar", "Dhar", "Dharampuri", "Gandhwani", "Kukshi", "Manawar", "Sardarpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Dindori") {
  addOptionsToSelect(
      ["Dindori", "Shahpura"],
      talukaSelect
  );
} else if (selectedDistrict === "Guna") {
  addOptionsToSelect(
      ["Aron", "Chachoura", "Guna", "Kumbhraj", "Miyana", "Raghogarh"],
      talukaSelect
  );
} else if (selectedDistrict === "Gwalior") {
  addOptionsToSelect(
      ["Bhitarwar", "Dabra", "Ghatigaon", "Gwalior"],
      talukaSelect
  );
} else if (selectedDistrict === "Harda") {
  addOptionsToSelect(
      ["Handia", "Harda", "Khirkiya"],
      talukaSelect
  );
} else if (selectedDistrict === "Hoshangabad") {
  addOptionsToSelect(
      ["Babai", "Bankhedi", "Hoshangabad", "Itarsi", "Pipariya", "Seoni Malwa", "Sohagpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Indore") {
  addOptionsToSelect(
      ["Depalpur", "Indore", "Mhow", "Sanwer"],
      talukaSelect
  );
} else if (selectedDistrict === "Jabalpur") {
  addOptionsToSelect(
      ["Jabalpur", "Kundam", "Majholi", "Panagar", "Patan", "Shahpura", "Sihora"],
      talukaSelect
  );
} else if (selectedDistrict === "Jhabua") {
  addOptionsToSelect(
      ["Jhabua", "Meghnagar", "Petlawad", "Ranapur", "Thandla"],
      talukaSelect
  );
} else if (selectedDistrict === "Katni") {
  addOptionsToSelect(
      ["Bahoriband", "Badwara", "Dhimarkheda", "Katni", "Rithi"],
      talukaSelect
  );
} else if (selectedDistrict === "Khandwa (East Nimar)") {
  addOptionsToSelect(
      ["Harsud", "Khandwa", "Pandhana", "Punasa"],
      talukaSelect
  );
} else if (selectedDistrict === "Khargone (West Nimar)") {
  addOptionsToSelect(
      ["Bhagwanpura", "Kasrawad", "Khargone", "Maheshwar", "Segaon"],
      talukaSelect
  );
} else if (selectedDistrict === "Mandla") {
  addOptionsToSelect(
      ["Bichhiya", "Ghughari", "Mandla", "Nainpur", "Niwas"],
      talukaSelect
  );
} else if (selectedDistrict === "Mandsaur") {
  addOptionsToSelect(
      ["Bhanpura", "Garoth", "Malhargarh", "Mandsaur", "Sitamau"],
      talukaSelect
  );
} else if (selectedDistrict === "Morena") {
  addOptionsToSelect(
      ["Ambah", "Joura", "Kailaras", "Morena", "Porsa"],
      talukaSelect
  );
} else if (selectedDistrict === "Narsinghpur") {
  addOptionsToSelect(
      ["Gadarwara", "Gotegaon", "Kareli", "Narsinghpur", "Tendukheda"],
      talukaSelect
  );
} else if (selectedDistrict === "Neemuch") {
  addOptionsToSelect(
      ["Jawad", "Manasa", "Neemuch", "Rampura"],
      talukaSelect
  );
} else if (selectedDistrict === "Panna") {
  addOptionsToSelect(
      ["Ajaygarh", "Amanganj", "Devendranagar", "Gunnor", "Panna", "Pawai"],
      talukaSelect
  );
} else if (selectedDistrict === "Raisen") {
  addOptionsToSelect(
      ["Begumganj", "Bareli", "Gairatganj", "Mandideep", "Obedullaganj", "Raisen", "Silwani"],
      talukaSelect
  );
} else if (selectedDistrict === "Rajgarh") {
  addOptionsToSelect(
      ["Biaora", "Jirapur", "Khilchipur", "Narsinghgarh", "Rajgarh", "Sarangpur", "Talen"],
      talukaSelect
  );
} else if (selectedDistrict === "Ratlam") {
  addOptionsToSelect(
      ["Alot", "Bajna", "Jaora", "Piploda", "Ratlam", "Sailana"],
      talukaSelect
  );
} else if (selectedDistrict === "Rewa") {
  addOptionsToSelect(
      ["Gurh", "Hanumana", "Huzur", "Mangawan", "Mauganj", "Raipur Karchuliyan", "Semariya", "Sirmaur", "Teonthar"],
      talukaSelect
  );
} else if (selectedDistrict === "Sagar") {
  addOptionsToSelect(
      ["Banda", "Bina", "Deori", "Khurai", "Malthone", "Rehli", "Sagar", "Shahgarh"],
      talukaSelect
  );
} else if (selectedDistrict === "Satna") {
  addOptionsToSelect(
    ["Amarpatan", "Maihar", "Nagod", "Raghurajnagar", "Ramnagar", "Majhgawan"],
    talukaSelect
);
} else if (selectedDistrict === "Sehore") {
addOptionsToSelect(
    ["Ashta", "Budhni", "Ichhawar", "Nasrullaganj", "Sehore", "Shyampur"],
    talukaSelect
);
} else if (selectedDistrict === "Seoni") {
addOptionsToSelect(
    ["Barghat", "Chhapara", "Dhuma", "Dongar Parasia", "Ghansor", "Keolari", "Kurai", "Lakhnadon", "Seoni", "Seoni-Malwa"],
    talukaSelect
);
} else if (selectedDistrict === "Shahdol") {
addOptionsToSelect(
    ["Anuppur", "Beohari", "Jaisinghnagar", "Jaitpur", "Jaithari", "Kotma", "Pushprajgarh", "Shahdol", "Sohagpur"],
    talukaSelect
);
} else if (selectedDistrict === "Shajapur") {
addOptionsToSelect(
    ["Agar", "Badnagar", "Ghatiya", "Maksi", "Shajapur", "Shujalpur", "Susner"],
    talukaSelect
);
} else if (selectedDistrict === "Sheopur") {
addOptionsToSelect(
    ["Karhal", "Sheopur", "Vijaypur"],
    talukaSelect
);
} else if (selectedDistrict === "Shivpuri") {
addOptionsToSelect(
    ["Badarwas", "Karera", "Khaniyadhana", "Kolaras", "Narwar", "Pichhore", "Pohri", "Shivpuri"],
    talukaSelect
);
} else if (selectedDistrict === "Sidhi") {
addOptionsToSelect(
    ["Churhat", "Gopadbanas", "Majhauli", "Rampur Naikin", "Sihawal", "Chitrangi"],
    talukaSelect
);
} else if (selectedDistrict === "Singrauli") {
addOptionsToSelect(
    ["Chitrangi", "Deosar", "Singrauli"],
    talukaSelect
);
} else if (selectedDistrict === "Tikamgarh") {
addOptionsToSelect(
    ["Baldeogarh", "Jatara", "Niwari", "Orchha", "Palera", "Prithvipur", "Tikamgarh"],
    talukaSelect
);
} else if (selectedDistrict === "Ujjain") {
addOptionsToSelect(
    ["Badnagar", "Ghatiya", "Khacharod", "Mahidpur", "Nagda", "Tarana", "Ujjain"],
    talukaSelect
);
} else if (selectedDistrict === "Umaria") {
addOptionsToSelect(
    ["Bandhogarh", "Chandia", "Manpur", "Pali", "Umaria"],
    talukaSelect
);
} else if (selectedDistrict === "Vidisha") {
addOptionsToSelect(
    ["Basoda", "Gyaraspur", "Kurwai", "Lateri", "Nateran", "Sironj", "Shamshabad", "Vidisha"],
    talukaSelect
);
}
    // maharashtra
    else if (selectedDistrict === "Ahmednagar") {
      addOptionsToSelect(
          ["Ahmednagar", "Akola", "Jamkhed", "Karjat", "Kopargaon", "Newasa", "Parner", "Pathardi", "Rahata", "Rahuri", "Sangamner", "Shevgaon", "Shrigonda", "Shrirampur", "Nevasa", "Shani Shingnapur"],
          talukaSelect
      );
  } else if (selectedDistrict === "Akola") {
      addOptionsToSelect(
          ["Akola", "Akot", "Balapur", "Murtijapur", "Patur", "Telhara", "Barshitakli", "Alegaon", "Risod", "Washim", "Manora", "Karanja", "Lohara", "Malegaon", "Pandhurna"],
          talukaSelect
      );
  } else if (selectedDistrict === "Amravati") {
      addOptionsToSelect(
          ["Amravati", "Achalpur", "Bhatkuli", "Chandur Bazar", "Chandur Railway", "Daryapur", "Dhamangaon Railway", "Morshi", "Nandgaon Khandeshwar", "Teosa", "Warud"],
          talukaSelect
      );
  } else if (selectedDistrict === "Aurangabad") {
      addOptionsToSelect(
          ["Aurangabad", "Gangapur", "Kannad", "Khuldabad", "Paithan", "Phulambri", "Sillod", "Soegaon", "Vaijapur"],
          talukaSelect
      );
  } else if (selectedDistrict === "Beed") {
      addOptionsToSelect(
          ["Beed", "Ashti", "Georai", "Kaij", "Majalgaon", "Parli", "Patoda", "Ambajogai", "Wadwani"],
          talukaSelect
      );
  } else if (selectedDistrict === "Bhandara") {
      addOptionsToSelect(
          ["Bhandara", "Lakhandur", "Lakhani", "Mohadi", "Pauni", "Sakoli", "Tumsar"],
          talukaSelect
      );
  } else if (selectedDistrict === "Buldhana") {
      addOptionsToSelect(
          ["Buldhana", "Chikhli", "Deolgaon Raja", "Jalgaon (Jamod)", "Khamgaon", "Lonar", "Malkapur", "Mehkar", "Motala", "Nandura", "Sangrampur", "Shegaon", "Sindkhed Raja", "Buldana", "Deulgaon Raja"],
          talukaSelect
      );
  } else if (selectedDistrict === "Chandrapur") {
      addOptionsToSelect(
          ["Chandrapur", "Ballarpur", "Bhadrawati", "Brahmapuri", "Chimur", "Gondpipri", "Korpana", "Mul", "Nagbhir", "Pombhurna", "Rajura", "Sawali", "Warora"],
          talukaSelect
      );
  } else if (selectedDistrict === "Dhule") {
      addOptionsToSelect(
          ["Dhule", "Sakri", "Shirpur", "Sindkhede"],
          talukaSelect
      );
  } else if (selectedDistrict === "Gadchiroli") {
      addOptionsToSelect(
          ["Gadchiroli", "Armori", "Aheri", "Chamorshi", "Desaiganj (Vadasa)", "Dhanora", "Etapalli", "Korchi", "Mulchera", "Sironcha"],
          talukaSelect
      );
  } else if (selectedDistrict === "Gondia") {
      addOptionsToSelect(
          ["Gondia", "Amgaon", "Arjuni Morgaon", "Deori", "Goregaon", "Sadak Arjuni", "Tirora"],
          talukaSelect
      );
  } else if (selectedDistrict === "Hingoli") {
      addOptionsToSelect(
          ["Hingoli", "Aundha (Nagnath)", "Basmath", "Kalamnuri", "Sengaon"],
          talukaSelect
      );
  } else if (selectedDistrict === "Jalgaon") {
      addOptionsToSelect(
          ["Jalgaon", "Amalner", "Bhadgaon", "Bhusawal", "Bodwad", "Chalisgaon", "Chopda", "Dharangaon", "Erandol", "Jalgaon Jamod", "Muktainagar", "Pachora", "Parola", "Raver", "Yawal"],
          talukaSelect
      );
  } else if (selectedDistrict === "Jalna") {
      addOptionsToSelect(
          ["Jalna", "Ambad", "Badnapur", "Bhokardan", "Ghansawangi", "Jafferabad", "Mantha", "Partur"],
          talukaSelect
      );
  } else if (selectedDistrict === "Kolhapur") {
      addOptionsToSelect(
          ["Kolhapur", "Ajra", "Bavda", "Bhudargad", "Chandgad", "Gadhinglaj", "Hatkanangle", "Kagal", "Karvir", "Panhala", "Radhanagari", "Shahuwadi", "Shirol"],
          talukaSelect
      );
  } else if (selectedDistrict === "Latur") {
      addOptionsToSelect(
          ["Latur", "Ahmadpur", "Ausa", "Chakur", "Deoni", "Jalkot", "Nilanga", "Renapur", "Shirur-Anantpal", "Udgir"],
          talukaSelect
      );
  } else if (selectedDistrict === "Mumbai City") {
      addOptionsToSelect(
          ["Mumbai City"],
          talukaSelect
      );
  } else if (selectedDistrict === "Mumbai Suburban") {
      addOptionsToSelect(
          ["Mumbai Suburban"],
          talukaSelect
      );
  } else if (selectedDistrict === "Nagpur") {
      addOptionsToSelect(
          ["Nagpur", "Hingna", "Kamptee", "Katol", "Kalmeshwar", "Kuhi", "Mauda", "Parseoni", "Ramtek", "Savner", "Umred"],
          talukaSelect
      );
  } else if (selectedDistrict === "Nanded") {
      addOptionsToSelect(
          ["Nanded", "Ardhapur", "Bhokar", "Biloli", "Deglur", "Dharmabad", "Hadgaon", "Himayatnagar", "Kandhar", "Kinwat", "Loha", "Mahoor", "Mudkhed", "Mukhed", "Naigaon", "Umri", "Arni", "Babhulgaon", "Basmathnagar"],
          talukaSelect
      );
  } else if (selectedDistrict === "Nandurbar") {
      addOptionsToSelect(
          ["Nandurbar", "Akkalkuwa", "Akrani", "Nawapur", "Shahade", "Talode"],
          talukaSelect
      );
  } else if (selectedDistrict === "Nashik") {
      addOptionsToSelect(
          ["Nashik", "Baglan", "Chandvad", "Deola", "Dindori", "Igatpuri", "Kalwan", "Malegaon", "Nandgaon", "Niphad", "Peint", "Sinnar", "Surgana", "Trimbak", "Yevla"],
          talukaSelect
      );
  } else if (selectedDistrict === "Osmanabad") {
      addOptionsToSelect(
          ["Osmanabad", "Bhoom", "Kalamb", "Lohara", "Murum", "Paranda", "Tuljapur", "Umarga", "Washi", "Vashi"],
          talukaSelect
      );
  } else if (selectedDistrict === "Palghar") {
      addOptionsToSelect(
          ["Palghar", "Boisar", "Dahanu", "Jawhar", "Mokhada", "Talasari", "Vada", "Vikramgad"],
          talukaSelect
      );
  } else if (selectedDistrict === "Parbhani") {
      addOptionsToSelect(
          ["Parbhani", "Gangakhed", "Jintur", "Manwath", "Palam", "Purna", "Sailu", "Sonpeth"],
          talukaSelect
      );
  } else if (selectedDistrict === "Pune") {
      addOptionsToSelect(
          ["Pune", "Ambegaon", "Baramati", "Bhor", "Daund", "Haveli", "Indapur", "Junnar", "Khed", "Mawal", "Mulshi", "Purandhar", "Shirur", "Velhe"],
          talukaSelect
      );
  } else if (selectedDistrict === "Raigad") {
      addOptionsToSelect(
          ["Raigad", "Alibag", "Karjat", "Khalapur", "Mangaon", "Mhasala", "Murud", "Panvel", "Pen", "Poladpur", "Roha", "Shrivardhan", "Sudhagad", "Tala", "Uran"],
          talukaSelect
      );
  } else if (selectedDistrict === "Ratnagiri") {
      addOptionsToSelect(
          ["Ratnagiri", "Chiplun", "Dapoli", "Guhagar", "Khed", "Lanja", "Mandangad", "Rajapur", "Ratnagiri", "Sangameshwar"],
          talukaSelect
      );
  } else if (selectedDistrict === "Sangli") {
      addOptionsToSelect(
          ["Sangli", "Atpadi", "Islampur", "Kadegaon", "Kavathemahankal", "Khanapur", "Miraj", "Palus", "Shirala", "Tasgaon", "Walwa"],
          talukaSelect
      );
  } else if (selectedDistrict === "Satara") {
      addOptionsToSelect(
          ["Satara", "Jaoli", "Khandala", "Khatav", "Koregaon", "Mahabaleshwar", "Man", "Patan", "Phaltan", "Wai"],
          talukaSelect
      );
  } else if (selectedDistrict === "Sindhudurg") {
      addOptionsToSelect(
          ["Sindhudurg", "Devgad", "Dodamarg", "Kankavli", "Kudal", "Malvan", "Sawantwadi", "Vengurla"],
          talukaSelect
      );
  } else if (selectedDistrict === "Solapur") {
      addOptionsToSelect(
          ["Solapur", "Akkalkot", "Barshi", "Karmala", "Madha", "Malshiras", "Mangalvedhe", "Mohol", "Pandharpur", "Sangole", "Solapur", "Tasgaon", "Vairag"],
          talukaSelect
      );
  } else if (selectedDistrict === "Thane") {
      addOptionsToSelect(
          ["Thane", "Ambarnath", "Bhiwandi", "Kalyan", "Murbad", "Shahapur", "Ulhasnagar", "Vasai", "Vikramgad"],
          talukaSelect
      );
  } else if (selectedDistrict === "Wardha") {
      addOptionsToSelect(
          ["Wardha", "Arvi", "Ashti", "Deoli", "Hinganghat", "Samudrapur", "Seloo", "Sindi", "Wardha"],
          talukaSelect
      );
  } else if (selectedDistrict === "Washim") {
      addOptionsToSelect(
          ["Washim", "Karanja", "Malegaon", "Mangrulpir", "Manora", "Risod", "Shirpur", "Washim"],
          talukaSelect
      );
  } else if (selectedDistrict === "Yavatmal") {
      addOptionsToSelect(
          ["Yavatmal", "Arni", "Babulgaon", "Darwha", "Digras", "Ghatanji", "Kalamb", "Kelapur", "Mahagaon", "Maregaon", "Ner", "Pandharkaoda", "Pusad", "Ralegaon", "Umarkhed", "Wani", "Yavatmal"],
          talukaSelect
      );
  }

// Manipur
else if (selectedDistrict === "Bishnupur") {
  addOptionsToSelect(
      ["Bishnupur", "Moirang", "Nambol", "Kumbi", "Lilong (Thoubal)", "Thanga"],
      talukaSelect
  );
} else if (selectedDistrict === "Chandel") {
  addOptionsToSelect(
      ["Chandel", "Chakpikarong", "Machi", "Tengnoupal"],
      talukaSelect
  );
} else if (selectedDistrict === "Churachandpur") {
  addOptionsToSelect(
      ["Churachandpur", "Bukpi", "Henglep", "Lamka", "Singhat"],
      talukaSelect
  );
} else if (selectedDistrict === "Imphal East") {
  addOptionsToSelect(
      ["Imphal East", "Andro", "Heingang", "Khurai", "Khetrigao", "Lamlai", "Sawombung", "Wangkhei"],
      talukaSelect
  );
} else if (selectedDistrict === "Imphal West") {
  addOptionsToSelect(
      ["Imphal West", "Imphal", "Lamphelpat", "Patsoi", "Sekmai Bazar", "Wangoi"],
      talukaSelect
  );
} else if (selectedDistrict === "Jiribam") {
  addOptionsToSelect(
      ["Jiribam", "Borobekra", "Jiribam", "Kalikhola"],
      talukaSelect
  );
} else if (selectedDistrict === "Kakching") {
  addOptionsToSelect(
      ["Kakching", "Wangjing", "Waikhong", "Kakching", "Sugnu", "Wangu"],
      talukaSelect
  );
} else if (selectedDistrict === "Kamjong") {
  addOptionsToSelect(
      ["Kamjong", "Kasom Khullen", "Phungyar", "Kamjong", "Kasom Khullen", "Phungyar"],
      talukaSelect
  );
} else if (selectedDistrict === "Kangpokpi") {
  addOptionsToSelect(
      ["Kangpokpi", "Saitu Gamphazol", "Saikul"],
      talukaSelect
  );
} else if (selectedDistrict === "Noney") {
  addOptionsToSelect(
      ["Noney", "Noney"],
      talukaSelect
  );
} else if (selectedDistrict === "Pherzawl") {
  addOptionsToSelect(
      ["Pherzawl", "Pherzawl"],
      talukaSelect
  );
} else if (selectedDistrict === "Senapati") {
  addOptionsToSelect(
      ["Senapati", "Karong", "Koutruk", "Purul", "Tadubi", "Saikul", "Thangal"],
      talukaSelect
  );
} else if (selectedDistrict === "Tamenglong") {
  addOptionsToSelect(
      ["Tamenglong", "Nungba", "Tamei", "Tousem"],
      talukaSelect
  );
} else if (selectedDistrict === "Tengnoupal") {
  addOptionsToSelect(
      ["Tengnoupal", "Moreh"],
      talukaSelect
  );
} else if (selectedDistrict === "Thoubal") {
  addOptionsToSelect(
      ["Thoubal", "Heirok", "Kasom Khullen", "Lilong (Thoubal)", "Thoubal", "Wangjing", "Waikhong"],
      talukaSelect
  );
} else if (selectedDistrict === "Ukhrul") {
  addOptionsToSelect(
      ["Ukhrul", "Chingai", "Jessami", "Ukhrul"],
      talukaSelect
  );
}

// Meghalay
else if (selectedDistrict === "East Garo Hills") {
  addOptionsToSelect(
      ["Resubelpara", "Songsak", "Kharkutta", "Samanda", "Williamnagar"],
      talukaSelect
  );
} else if (selectedDistrict === "East Jaintia Hills") {
  addOptionsToSelect(
      ["Khliehriat", "Amlarem", "Laskein"],
      talukaSelect
  );
} else if (selectedDistrict === "East Khasi Hills") {
  addOptionsToSelect(
      ["Mylliem", "Mawphlang", "Mawsynram", "Mawryngkneng", "Shella Bholaganj", "Sohra", "Mawkynrew", "Pynursla", "Raliang", "Mawsynram"],
      talukaSelect
  );
} else if (selectedDistrict === "North Garo Hills") {
  addOptionsToSelect(
      ["Resubelpara", "Bajengdoba", "Rongram"],
      talukaSelect
  );
} else if (selectedDistrict === "Ri Bhoi") {
  addOptionsToSelect(
      ["Nongpoh", "Umsning", "Jirang"],
      talukaSelect
  );
} else if (selectedDistrict === "South Garo Hills") {
  addOptionsToSelect(
      ["Baghmara", "Chokpot", "Gasuapara"],
      talukaSelect
  );
} else if (selectedDistrict === "South West Garo Hills") {
  addOptionsToSelect(
      ["Ampati", "Betasing", "Rongram"],
      talukaSelect
  );
} else if (selectedDistrict === "South West Khasi Hills") {
  addOptionsToSelect(
      ["Mairang", "Mawthadraishan", "Mawkyrwat", "Ranikor"],
      talukaSelect
  );
} else if (selectedDistrict === "West Garo Hills") {
  addOptionsToSelect(
      ["Tura", "Dadenggiri", "Selsella", "Betasing", "Zikzak"],
      talukaSelect
  );
} else if (selectedDistrict === "West Jaintia Hills") {
  addOptionsToSelect(
      ["Jowai", "Amlarem", "Mawthadraishan", "Mawkyrwat"],
      talukaSelect
  );
} else if (selectedDistrict === "West Khasi Hills") {
  addOptionsToSelect(
      ["Nongstoin", "Rambrai-Jyrngam", "Mawthadraishan", "Mawkyrwat"],
      talukaSelect
  );
}

// Mizoram 
else if (selectedDistrict === "Aizawl") {
  addOptionsToSelect(
      ["Aibawk", "Bilkhawthlir", "Darlawn", "Dawrpui", "East Lungdar", "Kangpokpi", "Kawnpui", "Kolasib", "Lawngtlai", "Lengpui", "Lunglei", "Mamit", "North Vanlaiphai", "Phullen", "Phulpui", "Phulpui", "Serchhip", "Tawi"],
      talukaSelect
  );
} else if (selectedDistrict === "Champhai") {
  addOptionsToSelect(
      ["Aibawk", "Biate", "Bukpui", "Champhai", "Darlawn", "Farkawn", "Hnahthial", "Kawnpui", "Kolasib", "Lawngtlai", "Lengpui", "Lunglei", "Mamit", "North Vanlaiphai", "Phullen", "Phulpui", "Serchhip", "Tawi"],
      talukaSelect
  );
} else if (selectedDistrict === "Kolasib") {
  addOptionsToSelect(
      ["Aibawk", "Biate", "Bukpui", "Champhai", "Darlawn", "Farkawn", "Hnahthial", "Kawnpui", "Kolasib", "Lawngtlai", "Lengpui", "Lunglei", "Mamit", "North Vanlaiphai", "Phullen", "Phulpui", "Serchhip", "Tawi"],
      talukaSelect
  );
} else if (selectedDistrict === "Lawngtlai") {
  addOptionsToSelect(
      ["Aibawk", "Biate", "Bukpui", "Champhai", "Darlawn", "Farkawn", "Hnahthial", "Kawnpui", "Kolasib", "Lawngtlai", "Lengpui", "Lunglei", "Mamit", "North Vanlaiphai", "Phullen", "Phulpui", "Serchhip", "Tawi"],
      talukaSelect
  );
} else if (selectedDistrict === "Lunglei") {
  addOptionsToSelect(
      ["Aibawk", "Biate", "Bukpui", "Champhai", "Darlawn", "Farkawn", "Hnahthial", "Kawnpui", "Kolasib", "Lawngtlai", "Lengpui", "Lunglei", "Mamit", "North Vanlaiphai", "Phullen", "Phulpui", "Serchhip", "Tawi"],
      talukaSelect
  );
} else if (selectedDistrict === "Mamit") {
  addOptionsToSelect(
      ["Aibawk", "Biate", "Bukpui", "Champhai", "Darlawn", "Farkawn", "Hnahthial", "Kawnpui", "Kolasib", "Lawngtlai", "Lengpui", "Lunglei", "Mamit", "North Vanlaiphai", "Phullen", "Phulpui", "Serchhip", "Tawi"],
      talukaSelect
  );
} else if (selectedDistrict === "Saiha") {
  addOptionsToSelect(
      ["Aibawk", "Biate", "Bukpui", "Champhai", "Darlawn", "Farkawn", "Hnahthial", "Kawnpui", "Kolasib", "Lawngtlai", "Lengpui", "Lunglei", "Mamit", "North Vanlaiphai", "Phullen", "Phulpui", "Serchhip", "Tawi"],
      talukaSelect
  );
} else if (selectedDistrict === "Serchhip") {
  addOptionsToSelect(
      ["Aibawk", "Biate", "Bukpui", "Champhai", "Darlawn", "Farkawn", "Hnahthial", "Kawnpui", "Kolasib", "Lawngtlai", "Lengpui", "Lunglei", "Mamit", "North Vanlaiphai", "Phullen", "Phulpui", "Serchhip", "Tawi"],
      talukaSelect
  );
}

// Nagaland
else if (selectedDistrict === "Dimapur") {
  addOptionsToSelect(
      ["Dimapur", "Niuland"],
      talukaSelect
  );
} else if (selectedDistrict === "Kiphire") {
  addOptionsToSelect(
      ["Kiphire", "Seyochung"],
      talukaSelect
  );
} else if (selectedDistrict === "Kohima") {
  addOptionsToSelect(
      ["Kohima", "Jakhama", "Chiephobozou"],
      talukaSelect
  );
} else if (selectedDistrict === "Longleng") {
  addOptionsToSelect(
      ["Longleng", "Tamlu"],
      talukaSelect
  );
} else if (selectedDistrict === "Mokokchung") {
  addOptionsToSelect(
      ["Mokokchung", "Alongkima", "Impur"],
      talukaSelect
  );
} else if (selectedDistrict === "Mon") {
  addOptionsToSelect(
      ["Mon", "Aboi", "Tizit"],
      talukaSelect
  );
} else if (selectedDistrict === "Peren") {
  addOptionsToSelect(
      ["Peren", "Jalukie"],
      talukaSelect
  );
} else if (selectedDistrict === "Phek") {
  addOptionsToSelect(
      ["Phek", "Chozuba"],
      talukaSelect
  );
} else if (selectedDistrict === "Tuensang") {
  addOptionsToSelect(
      ["Tuensang", "Noksen", "Noklak"],
      talukaSelect
  );
} else if (selectedDistrict === "Wokha") {
  addOptionsToSelect(
      ["Wokha", "Bhandari"],
      talukaSelect
  );
} else if (selectedDistrict === "Zunheboto") {
  addOptionsToSelect(
      ["Zunheboto", "Satakha"],
      talukaSelect
  );
}

// Odisha
else if (selectedDistrict === "Angul") {
  addOptionsToSelect(
      ["Angul", "Athmallik", "Chhendipada", "Kaniha", "Pallahara", "Talcher"],
      talukaSelect
  );
} else if (selectedDistrict === "Balangir") {
  addOptionsToSelect(
      ["Balangir", "Belpara", "Kantabanji", "Loisingha", "Patnagarh", "Puintala", "Titlagarh", "Tureikela"],
      talukaSelect
  );
} else if (selectedDistrict === "Balasore (Baleswar)") {
  addOptionsToSelect(
      ["Balasore", "Bahanaga", "Baliapal", "Bampada", "Basta", "Berhampur", "Bhograi", "Chandipur", "Jaleswar", "Khaira", "Nilagiri", "Oupada", "Raibania", "Remuna", "Sahadevkhunta", "Singla", "Soro"],
      talukaSelect
  );
} else if (selectedDistrict === "Bargarh (Baragarh)") {
  addOptionsToSelect(
      ["Bargarh", "Ambabhona", "Attabira", "Barpali", "Bhatli", "Bijepur", "Burden", "Melchhamunda", "Padampur", "Sohella"],
      talukaSelect
  );
} else if (selectedDistrict === "Bhadrak") {
  addOptionsToSelect(
      ["Bhadrak", "Basudebpur", "Bhandaripokhari", "Chandbali", "Dhamanagar", "Dhusuri", "Tihidi"],
      talukaSelect
  );
} else if (selectedDistrict === "Boudh (Bauda)") {
  addOptionsToSelect(
      ["Boudh", "Bolangir", "Harabhanga", "Kantamal", "Kharbandh", "Purunakatak", "Sonepur"],
      talukaSelect
  );
} else if (selectedDistrict === "Cuttack") {
  addOptionsToSelect(
      ["Cuttack", "Athagarh", "Badamba", "Banki", "Choudwar", "Cuttack Sadar", "Mahanga", "Narsinghpur", "Nischintakoili", "Salepur", "Tangi"],
      talukaSelect
  );
} else if (selectedDistrict === "Deogarh (Debagarh)") {
  addOptionsToSelect(
      ["Deogarh", "Barkote", "Biramitrapur", "Deogarh", "Reamal", "Tileibani"],
      talukaSelect
  );
} else if (selectedDistrict === "Dhenkanal") {
  addOptionsToSelect(
      ["Dhenkanal", "Gondia", "Hindol", "Kamakshyanagar", "Kankadahad", "Parajang"],
      talukaSelect
  );
} else if (selectedDistrict === "Gajapati") {
  addOptionsToSelect(
      ["Gajapati", "Adva", "Gosani", "Kashinagar", "Mohana", "Nuagada", "R.Udayagiri", "Rayagada", "Serango", "T.Laxmipur"],
      talukaSelect
  );
} else if (selectedDistrict === "Ganjam") {
  addOptionsToSelect(
      ["Ganjam", "Aska", "Beguniapada", "Bellaguntha", "Bhanjanagar", "Brahmapur", "Chikiti", "Dharakote", "Digapahandi", "Ganjam", "Gopalpur", "Hinjilicut", "Jarada", "Kabisuryanagar", "Khalikote", "Kodala", "Patapur", "Purushottampur", "Ramagiri", "Rambha", "Sheragada", "Surada", "Tarsingi"],
      talukaSelect
  );
} else if (selectedDistrict === "Jagatsinghpur") {
  addOptionsToSelect(
      ["Jagatsinghpur", "Balikuda", "Biridi", "Ersama", "Kujang", "Naugaon", "Paradip", "Raghunathpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Jajpur") {
  addOptionsToSelect(
      ["Jajpur", "Badachana", "Balichandrapur", "Bari", "Binjharpur", "Danagadi", "Dasarathapur", "Dharmasala", "Jajpur Road", "Jakhapura", "Korei", "Kuakhia", "Mangalpur",         "Rasulpur", "Sukinda"],
      talukaSelect
  );
} else if (selectedDistrict === "Jharsuguda") {
  addOptionsToSelect(
      ["Jharsuguda", "Banaharpali", "Belpahar", "Brajarajnagar", "Jharsuguda", "Kolabira", "Laikera"],
      talukaSelect
  );
} else if (selectedDistrict === "Kalahandi") {
  addOptionsToSelect(
      ["Kalahandi", "Bhawanipatna", "Dharmagarh", "Jaipatna", "Junagarh", "Koksara", "Lanjigarh", "Madanpur Rampur", "Narla", "T. Rampur"],
      talukaSelect
  );
} else if (selectedDistrict === "Kandhamal") {
  addOptionsToSelect(
      ["Kandhamal", "Baliguda", "Belaghara", "Brahmanigaon", "Chakapad", "Daringibadi", "G. Udayagiri", "Gochhapada", "K. Nuagaon", "Khajuripada", "Kotagarh", "Phiringia", "Phulbani", "Phulbani Town", "Raikia", "Tikabali", "Tumudibandha"],
      talukaSelect
  );
} else if (selectedDistrict === "Kendrapara") {
  addOptionsToSelect(
      ["Kendrapara", "Aul", "Derabish", "Garadapur", "Kendrapara", "Mahakalapada", "Marshaghai", "Pattamundai", "Rajkanika"],
      talukaSelect
  );
} else if (selectedDistrict === "Kendujhar (Keonjhar)") {
  addOptionsToSelect(
      ["Kendujhar", "Anandapur", "Bansapal", "Champua", "Ghasipura", "Ghatgaon", "Harichandanpur", "Jhumpura", "Joda", "Keonjhar", "Patna", "Saharapada", "Telkoi"],
      talukaSelect
  );
} else if (selectedDistrict === "Khordha") {
  addOptionsToSelect(
      ["Khordha", "Balianta", "Balipatna", "Begunia", "Bhubaneswar", "Chandaka", "Jatni", "Khordha", "Tangi"],
      talukaSelect
  );
} else if (selectedDistrict === "Koraput") {
  addOptionsToSelect(
      ["Koraput", "Bandhugaon", "Boriguma", "Damanjodi", "Jeypur", "Kakiriguma", "Koraput", "Laxmipur", "Machhakund", "Malkangiri", "Nandapur", "Narayanpatna", "Pottangi", "Sunabeda", "Taliput", "Thuria"],
      talukaSelect
  );
} else if (selectedDistrict === "Malkangiri") {
  addOptionsToSelect(
      ["Malkangiri", "Chitrakonda", "Golmunda", "Kudumulugumma", "Malkangiri", "Mathili", "Mudulipada", "Orkel"],
      talukaSelect
  );
} else if (selectedDistrict === "Mayurbhanj") {
  addOptionsToSelect(
      ["Mayurbhanj", "Bahalda", "Bangriposi", "Baripada", "Barsahi", "Betnoti", "Bisoi", "Gorumahisani", "Jamda", "Kaptipada", "Karanjia", "Khunta", "Morada", "Rairangpur", "Raruan", "Saraskana", "Suliapada", "Thakurmunda", "Tiring", "Tiring"],
      talukaSelect
  );
} else if (selectedDistrict === "Nabarangpur") {
  addOptionsToSelect(
      ["Nabarangpur", "Bijapur", "Dabugam", "Jharigam", "Kosagumuda", "Nabarangpur", "Nandahandi", "Papadahandi", "Raighar", "Tarbha", "Tentulikhunti", "Umarkote"],
      talukaSelect
  );
} else if (selectedDistrict === "Nayagarh") {
  addOptionsToSelect(
      ["Nayagarh", "Daspalla", "Fategarh", "Gania", "Khandapada", "Nayagarh", "Nuagan", "Odagaon", "Ranapur", "Sarankul"],
      talukaSelect
  );
} else if (selectedDistrict === "Nuapada") {
  addOptionsToSelect(
      ["Nuapada", "Boden", "Jonk", "Khariar", "Khariar Road", "Sinapali", "Sinapali"],
      talukaSelect
  );
} else if (selectedDistrict === "Puri") {
  addOptionsToSelect(
      ["Puri", "Astaranga", "Brahmagiri", "Chandanpur", "Delanga", "Gadisagada", "Gop", "Kakatpur", "Konark", "Krushna Prasad", "Nimapara", "Pipili", "Ramachandi", "Satyabadi"],
      talukaSelect
  );
} else if (selectedDistrict === "Rayagada") {
  addOptionsToSelect(
      ["Rayagada", "Bissam Cuttack", "Chandrapur", "Gudari", "Gunupur", "Kalyansinghpur", "Kashipur", "Kolnara", "Muniguda", "Padmapur", "Rayagada", "Ramanaguda", "Tikiri"],
      talukaSelect
  );
} else if (selectedDistrict === "Sambalpur") {
  addOptionsToSelect(
      ["Sambalpur", "Ainthapali", "Burla", "Charamal", "Dhanupali", "Dhanupali", "Hirakud", "Jujomura", "Katarbaga", "Kisinda", "Naktideul", "Rairakhol", "Sasan"],
      talukaSelect
  );
} else if (selectedDistrict === "Subarnapur (Sonepur)") {
  addOptionsToSelect(
      ["Subarnapur", "Binika", "Birmaharajpur", "Dunguripali", "Rampur", "Sonepur", "Tarabha"],
      talukaSelect
  );
} else if (selectedDistrict === "Sundargarh") {
  addOptionsToSelect(
    ["Sundargarh", "Balishankara", "Balisankara", "Balisankara", "Barsuan", "Biramitrapur", "Bisra", "Bondamunda", "Brahmani Tarang", "Gurundia", "Hatibari", "Hemgir", "K. Balang", "Koida", "Kutra", "Lafripada", "Lahunipada", "Lathikata", "Lephripara", "Luhunga", "Mahulpali", "Nuagaon", "Olapur", "Rajgangpur", "Rajgangpur", "Rajgangpur", "Rourkela", "Rourkela", "Rourkela", "Sagda", "Sundargarh", "Talasara", "Tensa", "Ujalpur"],
    talukaSelect
);
}

// Punjab 
else if (selectedDistrict === "Amritsar") {
  addOptionsToSelect(
      ["Ajnala", "Amritsar", "Attari", "Baba Bakala", "Fatehgarh Churian", "Jandiala Guru", "Majitha", "Rajasansi", "Rayya", "Tarn Taran"],
      talukaSelect
  );
} else if (selectedDistrict === "Barnala") {
  addOptionsToSelect(
      ["Barnala", "Barnala", "Bhadaur", "Tapa"],
      talukaSelect
  );
} else if (selectedDistrict === "Bathinda") {
  addOptionsToSelect(
      ["Bathinda", "Bathinda", "Bhagta Bhaika", "Maur", "Rampura Phul", "Talwandi Sabo"],
      talukaSelect
  );
} else if (selectedDistrict === "Faridkot") {
  addOptionsToSelect(
      ["Faridkot", "Faridkot", "Jaitu", "Kotkapura", "Rampura Phul"],
      talukaSelect
  );
} else if (selectedDistrict === "Fatehgarh Sahib") {
  addOptionsToSelect(
      ["Amloh", "Bassi Pathana", "Fatehgarh Sahib", "Khamanon", "Sirhind -Fategarh"],
      talukaSelect
  );
} else if (selectedDistrict === "Fazilka") {
  addOptionsToSelect(
      ["Abohar", "Fazilka", "Jalalabad", "Kilianwali"],
      talukaSelect
  );
} else if (selectedDistrict === "Ferozepur") {
  addOptionsToSelect(
      ["Fazilka", "Ferozepur", "Ghall Khurd", "Guru Har Sahai", "Kasba", "Makhu", "Mallanwala Khas", "Mamdot", "Zira"],
      talukaSelect
  );
} else if (selectedDistrict === "Gurdaspur") {
  addOptionsToSelect(
      ["Batala", "Bhoa", "Dera Baba Nanak", "Dhar Kalan", "Dinanagar", "Doraha", "Dunera", "Fatehgarh Churian", "Gurdaspur", "Kalanaur", "Pathankot", "Qadian", "Sri Hargobindpur", "Sujanpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Hoshiarpur") {
  addOptionsToSelect(
      ["Bassi Kalan", "Dasua", "Garhdiwala", "Hajipur", "Hoshiarpur", "Mahilpur", "Mukerian", "Sham Chaurasi", "Talwara"],
      talukaSelect
  );
} else if (selectedDistrict === "Jalandhar") {
  addOptionsToSelect(
      ["Adampur", "Bhogpur", "Jalandhar - I", "Jalandhar - II", "Jalandhar Cantt", "Kapurthala", "Kartarpur", "Lohian Khas", "Nakodar", "Phillaur", "Shahkot"],
      talukaSelect
  );
} else if (selectedDistrict === "Kapurthala") {
  addOptionsToSelect(
      ["Bhulath", "Kapurthala", "Phagwara", "Sultanpur Lodhi"],
      talukaSelect
  );
} else if (selectedDistrict === "Ludhiana") {
  addOptionsToSelect(
      ["Jagraon", "Khanna", "Ludhiana - I", "Ludhiana - II", "Machhiwara", "Paying", "Raikot", "Samrala", "Sidhwan Bet"],
      talukaSelect
  );
} else if (selectedDistrict === "Mansa") {
  addOptionsToSelect(
      ["Bhikhi", "Budhlada", "Mansa", "Sardulgarh"],
      talukaSelect
  );
} else if (selectedDistrict === "Moga") {
  addOptionsToSelect(
      ["Bagha Purana", "Dharamkot", "Kot Isse Khan", "Moga"],
      talukaSelect
  );
} else if (selectedDistrict === "Muktsar") {
  addOptionsToSelect(
      ["Gidderbaha", "Malout", "Muktsar"],
      talukaSelect
  );
} else if (selectedDistrict === "Pathankot") {
  addOptionsToSelect(
      ["Dhar Kalan", "Pathankot", "Sujanpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Patiala") {
  addOptionsToSelect(
      ["Nabha", "Patiala", "Rajpura", "Samana", "Sanaur", "Shutrana"],
      talukaSelect
  );
} else if
(selectedDistrict === "Rupnagar") {
  addOptionsToSelect(
      ["Anandpur Sahib", "Morinda", "Nurpur Bedi", "Rupnagar"],
      talukaSelect
  );
} else if (selectedDistrict === "Sahibzada Ajit Singh Nagar (Mohali)") {
  addOptionsToSelect(
      ["Kharar", "Mohali", "Dera Bassi", "Kurali"],
      talukaSelect
  );
} else if (selectedDistrict === "Sangrur") {
  addOptionsToSelect(
      ["Barnala", "Dhuri", "Lehragaga", "Malerkotla", "Moonak", "Sangrur", "Sherpur", "Sunam"],
      talukaSelect
  );
} else if (selectedDistrict === "Tarn Taran") {
  addOptionsToSelect(
      ["Bhikhiwind", "Fatehabad", "Goindwal", "Khadoor Sahib", "Patti", "Tarn Taran"],
      talukaSelect
  );
}

// Rajasthan
else if (selectedDistrict === "Ajmer") {
  addOptionsToSelect(
      ["Ajmer", "Beawar", "Bhinay", "Kekri", "Kishangarh", "Masuda", "Nasirabad"],
      talukaSelect
  );
} else if (selectedDistrict === "Alwar") {
  addOptionsToSelect(
      ["Alwar", "Behror", "Kathumar", "Kishangarh Bas", "Rajgarh", "Thanagazi", "Tijara"],
      talukaSelect
  );
} else if (selectedDistrict === "Banswara") {
  addOptionsToSelect(
      ["Bagidora", "Garhi", "Ghatol", "Kushalgarh", "Sajjangarh"],
      talukaSelect
  );
} else if (selectedDistrict === "Baran") {
  addOptionsToSelect(
      ["Atru", "Chhabra", "Kishanganj", "Mangrol", "Shahbad"],
      talukaSelect
  );
} else if (selectedDistrict === "Barmer") {
  addOptionsToSelect(
      ["Barmer", "Baytoo", "Gudha Malani", "Pachpadra", "Ramsar", "Sheo"],
      talukaSelect
  );
} else if (selectedDistrict === "Bharatpur") {
  addOptionsToSelect(
      ["Bharatpur", "Bayana", "Deeg", "Kaman", "Kumher", "Nadbai", "Nagar"],
      talukaSelect
  );
} else if (selectedDistrict === "Bhilwara") {
  addOptionsToSelect(
      ["Asind", "Beejoliya", "Bhilwara", "Hurstonganj", "Kotri", "Mandal"],
      talukaSelect
  );
} else if (selectedDistrict === "Bikaner") {
  addOptionsToSelect(
      ["Bikaner", "Dungargarh", "Kolayat", "Lunkaransar", "Nokha", "Poogal"],
      talukaSelect
  );
} else if (selectedDistrict === "Bundi") {
  addOptionsToSelect(
      ["Bundi", "Hindoli", "Indragarh", "Keshoraipatan", "Nainwa"],
      talukaSelect
  );
} else if (selectedDistrict === "Chittorgarh") {
  addOptionsToSelect(
      ["Bari Sadri", "Begun", "Chittorgarh", "Dungla", "Gangrar", "Kapasan", "Nimbahera", "Rashmi", "Rawatbhata"],
      talukaSelect
  );
} else if (selectedDistrict === "Churu") {
  addOptionsToSelect(
      ["Churu", "Ratangarh", "Rajgarh", "Sardarshahar", "Taranagar"],
      talukaSelect
  );
} else if (selectedDistrict === "Dausa") {
  addOptionsToSelect(
      ["Baswa", "Dausa", "Lalsot", "Mahwa", "Sikrai"],
      talukaSelect
  );
} else if (selectedDistrict === "Dholpur") {
  addOptionsToSelect(
      ["Bari", "Dholpur", "Rajakhera"],
      talukaSelect
  );
} else if (selectedDistrict === "Dungarpur") {
  addOptionsToSelect(
      ["Aspur", "Dungarpur", "Sagwara", "Simalwara"],
      talukaSelect
  );
} else if (selectedDistrict === "Hanumangarh") {
  addOptionsToSelect(
      ["Bhadra", "Hanumangarh", "Nohar", "Pilibanga", "Rawatsar", "Sangaria"],
      talukaSelect
  );
} else if (selectedDistrict === "Jaipur") {
  addOptionsToSelect(
      ["Amber", "Bassi", "Chaksu", "Chomu", "Jaipur", "Jamwa Ramgarh", "Kotputli", "Mauzamabad", "Phagi", "Sambhar"],
      talukaSelect
  );
} else if (selectedDistrict === "Jaisalmer") {
  addOptionsToSelect(
      ["Fatehgarh", "Jaisalmer", "Pokaran"],
      talukaSelect
  );
} else if (selectedDistrict === "Jalore") {
  addOptionsToSelect(
      ["Ahore", "Bhinmal", "Jalore", "Raniwara", "Sanchore", "Sayla"],
      talukaSelect
  );
} else if (selectedDistrict === "Jhalawar") {
  addOptionsToSelect(
      ["Atru", "Bakani", "Jhalrapatan", "Khanpur", "Manohar Thana", "Pirawa"],
      talukaSelect
  );
} else if (selectedDistrict === "Jhunjhunu") {
  addOptionsToSelect(
      ["Buhana", "Chirawa", "Jhunjhunu", "Khetri", "Nawalgarh", "Udaipurwati"],
      talukaSelect
  );
} else if (selectedDistrict === "Jodhpur") {
  addOptionsToSelect(
      ["Balesar", "Bhopalgarh", "Luni", "Osian", "Phalodi", "Shergarh", "Sojat", "Jodhpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Karauli") {
  addOptionsToSelect(
      ["Hindaun", "Karauli", "Mandrail", "Nadoti", "Sapotra"],
      talukaSelect
  );
} else if (selectedDistrict === "Kota") {
  addOptionsToSelect(
      ["Digod", "Itawa", "Kota", "Pipalda", "Ramganj Mandi", "Sangod"],
      talukaSelect
  );
} else if (selectedDistrict === "Nagaur") {
  addOptionsToSelect(
      ["Deedwana", "Didwana", "Jayal", "Khinvsar", "Ladnu", "Makrana", "Merta", "Nagaur", "Parbatsar", "Riyan Bari", "Degana"],
      talukaSelect
  );
} else if (selectedDistrict === "Pali") {
  addOptionsToSelect(
      ["Bali", "Desuri", "Jaitaran", "Marwar Junction", "Pali", "Raipur", "Rohat", "Sojat", "Sumerpur"],
      talukaSelect
  );
} else if (selectedDistrict === "Pratapgarh") {
  addOptionsToSelect(
      ["Arnod", "Peepalkhoont", "Pratapgarh", "Suket"],
      talukaSelect
  );
}
      else if (selectedDistrict === "Rajsamand") {
        addOptionsToSelect(
            ["Amet", "Bhilwara", "Deogarh", "Kekri", "Nathdwara", "Railmagra", "Rajsamand"],
            talukaSelect
        );
    } else if (selectedDistrict === "Sawai Madhopur") {
        addOptionsToSelect(
            ["Bonli", "Chauth Ka Barwara", "Gangapur", "Khandar", "Malarna Doongar", "Sawai Madhopur"],
            talukaSelect
        );
    } else if (selectedDistrict === "Sikar") {
        addOptionsToSelect(
            ["Danta Ramgarh", "Fatehpur", "Lachhmangarh", "Neem Ka Thana", "Sikar", "Sri Madhopur"],
            talukaSelect
        );
    } else if (selectedDistrict === "Sirohi") {
        addOptionsToSelect(
            ["Abu Road", "Ahore", "Pindwara", "Reodar", "Sheoganj", "Sirohi"],
            talukaSelect
        );
    } else if (selectedDistrict === "Sri Ganganagar") {
        addOptionsToSelect(
            ["Anupgarh", "Ganganagar", "Ghumadwala", "Karir", "Padampur", "Raisinghnagar", "Sadulshahar", "Suratgarh"],
            talukaSelect
        );
    } else if (selectedDistrict === "Tonk") {
        addOptionsToSelect(
            ["Deoli", "Malpura", "Niwai", "Peeplu", "Todaraisingh", "Tonk", "Uniara"],
            talukaSelect
        );
    } else if (selectedDistrict === "Udaipur") {
        addOptionsToSelect(
            ["Girwa", "Gogunda", "Jhadol", "Kherwara", "Kotra", "Lasadiya", "Mavli", "Salumbar", "Sarada", "Vallabhnagar"],
            talukaSelect
        );
    }

// Sikkim
else if (selectedDistrict === "East Sikkim") {
  addOptionsToSelect(
      ["Gangtok", "Rongli", "Rhenock", "Chujachen", "Khamdong"],
      talukaSelect
  );
} else if (selectedDistrict === "North Sikkim") {
  addOptionsToSelect(
      ["Chungthang", "Dzongu", "Kabi", "Lachen", "Lachung", "Mangan"],
      talukaSelect
  );
} else if (selectedDistrict === "South Sikkim") {
  addOptionsToSelect(
      ["Namchi", "Ravong", "Ravongla", "Yangang", "Yoksam"],
      talukaSelect
  );
} else if (selectedDistrict === "West Sikkim") {
  addOptionsToSelect(
      ["Gyalshing", "Khor", "Okhrey", "Rinchenpong", "Soreng", "Yangang"],
      talukaSelect
  );
}

//Tamil Nadu
else if (selectedDistrict === "South Sikkim") {
  addOptionsToSelect(
      ["Namchi", "Ravong", "Ravongla", "Yangang", "Yoksam"],
      talukaSelect
  );
} else if (selectedDistrict === "West Sikkim") {
  addOptionsToSelect(
      ["Gyalshing", "Khor", "Okhrey", "Rinchenpong", "Soreng", "Yangang"],
      talukaSelect
  );
}

// Telangana
else if (selectedDistrict === "Ariyalur") {
  addOptionsToSelect(
    ["Ariyalur", "Sendurai", "Udayarpalayam"],
    talukaSelect
  );
} else if (selectedDistrict === "Chennai") {
  addOptionsToSelect(
    ["Chennai", "Thiruvallur"],
    talukaSelect
  );
} else if (selectedDistrict === "Chengalpattu") {
  addOptionsToSelect(
    ["Chengalpattu", "Cheyyur", "Madurantakam", "Tambaram", "Thiruporur"],
    talukaSelect
  );
} else if (selectedDistrict === "Coimbatore") {
  addOptionsToSelect(
    ["Coimbatore", "Mettupalayam", "Pollachi", "Sulur", "Valparai"],
    talukaSelect
  );
} else if (selectedDistrict === "Cuddalore") {
  addOptionsToSelect(
    ["Cuddalore", "Chidambaram", "Kattumannarkoil", "Panruti", "Virudhachalam"],
    talukaSelect
  );
} else if (selectedDistrict === "Dharmapuri") {
  addOptionsToSelect(
    ["Dharmapuri", "Harur", "Palacode", "Pennagaram"],
    talukaSelect
  );
} else if (selectedDistrict === "Dindigul") {
  addOptionsToSelect(
    ["Dindigul", "Kodaikanal", "Natham", "Nilakkottai", "Oddanchatram", "Palani"],
    talukaSelect
  );
} else if (selectedDistrict === "Erode") {
  addOptionsToSelect(
    ["Erode", "Bhavani", "Gobichettipalayam", "Perundurai", "Sathyamangalam"],
    talukaSelect
  );
} else if (selectedDistrict === "Kallakurichi") {
  addOptionsToSelect(
    ["Kallakurichi", "Chinnasalem", "Kalvarayan Hills", "Sankarapuram", "Thiyagadurgam"],
    talukaSelect
  );
} else if (selectedDistrict === "Kanchipuram") {
  addOptionsToSelect(
    ["Kanchipuram", "Chengalpattu", "Tambaram", "Uthiramerur"],
    talukaSelect
  );
} else if (selectedDistrict === "Kanyakumari") {
  addOptionsToSelect(
    ["Agastheeswaram", "Kalkulam", "Thovalai", "Vilavancode"],
    talukaSelect
  );
} else if (selectedDistrict === "Karur") {
  addOptionsToSelect(
    ["Aravakurichi", "Karur", "Krishnarayapuram"],
    talukaSelect
  );
} else if (selectedDistrict === "Krishnagiri") {
  addOptionsToSelect(
    ["Hosur", "Krishnagiri", "Uthangarai"],
    talukaSelect
  );
} else if (selectedDistrict === "Madurai") {
  addOptionsToSelect(
    ["Madurai East", "Madurai West", "Peraiyur", "Tirumangalam", "Usilampatti"],
    talukaSelect
  );
} else if (selectedDistrict === "Nagapattinam") {
  addOptionsToSelect(
    ["Kilvelur", "Mayiladuthurai", "Nagapattinam", "Sirkali", "Tirukuvalai", "Vedaranyam"],
    talukaSelect
  );
} else if (selectedDistrict === "Namakkal") {
  addOptionsToSelect(
    ["Namakkal", "Paramathi", "Rasipuram", "Tiruchengode"],
    talukaSelect
  );
} else if (selectedDistrict === "Nilgiris") {
  addOptionsToSelect(
    ["Coonoor", "Gudalur", "Kotagiri", "Udhagamandalam"],
    talukaSelect
  );
} else if (selectedDistrict === "Perambalur") {
  addOptionsToSelect(
    ["Kunnam", "Perambalur", "Veppanthattai"],
    talukaSelect
  );
} else if (selectedDistrict === "Pudukkottai") {
  addOptionsToSelect(
    ["Alangudi", "Aranthangi", "Gandarvakottai", "Kulathur", "Pudukkottai", "Thirumayam"],
    talukaSelect
  );
} else if (selectedDistrict === "Ramanathapuram") {
  addOptionsToSelect(
    ["Kamuthi", "Mudukulathur", "Paramakudi", "Ramanathapuram", "Rameswaram"],
    talukaSelect
  );
} else if (selectedDistrict === "Ranipet") {
  addOptionsToSelect(
    ["Arcot", "Arni", "Ranipet", "Walajah"],
    talukaSelect
  );
} else if (selectedDistrict === "Salem") {
  addOptionsToSelect(
    ["Attur", "Edappadi", "Gangavalli", "Mettur", "Omalur",      "Salem", "Sankagiri", "Valapady", "Yercaud"],
    talukaSelect
  );
} else if (selectedDistrict === "Sivaganga") {
  addOptionsToSelect(
    ["Devakottai", "Karaikkudi", "Sivaganga", "Thirupathur"],
    talukaSelect
  );
} else if (selectedDistrict === "Tenkasi") {
  addOptionsToSelect(
    ["Alangulam", "Kadayam", "Kuruvikulam", "Sankarankovil", "Shenkottai", "Sivagiri", "Tenkasi", "Veerakeralamputhur"],
    talukaSelect
  );
} else if (selectedDistrict === "Thanjavur") {
  addOptionsToSelect(
    ["Budalur", "Kumbakonam", "Orathanadu", "Papanasam", "Pattukkottai", "Peravurani", "Thanjavur", "Thiruvaiyaru", "Thiruvidaimarudur"],
    talukaSelect
  );
} else if (selectedDistrict === "Theni") {
  addOptionsToSelect(
    ["Andipatti", "Bodinayakanur", "Periyakulam", "Theni"],
    talukaSelect
  );
} else if (selectedDistrict === "Thoothukudi (Tuticorin)") {
  addOptionsToSelect(
    ["Ettayapuram", "Kovilpatti", "Ottapidaram", "Sathankulam", "Srivaikuntam", "Thoothukudi", "Tiruchendur", "Vilathikulam"],
    talukaSelect
  );
} else if (selectedDistrict === "Tiruchirappalli") {
  addOptionsToSelect(
    ["Lalgudi", "Manachanallur", "Musiri", "Srirangam", "Thiruverumbur", "Thottiyam", "Tiruchirappalli", "Thuraiyur"],
    talukaSelect
  );
} else if (selectedDistrict === "Tirunelveli") {
  addOptionsToSelect(
    ["Alangulam", "Ambasamudram", "Nanguneri", "Palayamkottai", "Radhapuram", "Sankarankovil", "Tenkasi", "Tirunelveli", "Veppathur"],
    talukaSelect
  );
} else if (selectedDistrict === "Tirupathur") {
  addOptionsToSelect(
    ["Ambur", "Natrampalli", "Tirupathur", "Vaniyambadi"],
    talukaSelect
  );
} else if (selectedDistrict === "Tiruppur") {
  addOptionsToSelect(
    ["Avanashi", "Palladam", "Tiruppur", "Udumalaipettai"],
    talukaSelect
  );
} else if (selectedDistrict === "Vellore") {
  addOptionsToSelect(
    ["Arakkonam", "Arcot", "Gudiyattam", "Katpadi", "Vaniyambadi", "Vellore", "Walajapet"],
    talukaSelect
  );
} else if (selectedDistrict === "Viluppuram") {
  addOptionsToSelect(
    ["Gingee", "Kallakkurichi", "Sankarapuram", "Tindivanam", "Tirukoilur", "Ulundurpettai", "Vanur", "Vikravandi", "Viluppuram"],
    talukaSelect
  );
} else if (selectedDistrict === "Virudhunagar") {
  addOptionsToSelect(
    ["Aruppukkottai", "Kariapatti", "Rajapalayam", "Sattur", "Sivakasi", "Srivilliputhur", "Tiruchuli", "Vembakottai", "Virudhunagar"],
    talukaSelect
  );
}

//Tripura
else if (selectedDistrict === "Dhalai") {
  addOptionsToSelect(
    ["Ambassa", "Gandacherra", "Longtharai Valley", "Salema"],
    talukaSelect
  );
} else if (selectedDistrict === "Gomati") {
  addOptionsToSelect(
    ["Amarpur", "Bagma", "Matabari", "Udaipur"],
    talukaSelect
  );
} else if (selectedDistrict === "Khowai") {
  addOptionsToSelect(
    ["Khowai", "Teliamura"],
    talukaSelect
  );
} else if (selectedDistrict === "North Tripura") {
  addOptionsToSelect(
    ["Dharmanagar", "Kadamtala", "Kanchanpur", "Panisagar"],
    talukaSelect
  );
} else if (selectedDistrict === "Sepahijala") {
  addOptionsToSelect(
    ["Bishalgarh", "Jirania", "Melaghar", "Sonamura"],
    talukaSelect
  );
} else if (selectedDistrict === "South Tripura") {
  addOptionsToSelect(
    ["Amarpur", "Bakal", "Rajnagar", "Rupaichari"],
    talukaSelect
  );
} else if (selectedDistrict === "Unakoti") {
  addOptionsToSelect(
    ["Kailashahar", "Kumarghat", "Pecharthal"],
    talukaSelect
  );
} else if (selectedDistrict === "West Tripura") {
  addOptionsToSelect(
    ["Dukli", "Jampuijala", "Kalyanpur", "Mandai", "Mohonpur"],
    talukaSelect
  );
}

//Uttar Pradesh
else if (selectedDistrict === "Agra") {
  addOptionsToSelect(
    ["Achnera", "Etmadpur", "Kiraoli", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Aligarh") {
  addOptionsToSelect(
    ["Atrauli", "Bannadevi", "Gonda", "Iglas", "Koil", "Khair", "Koil", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Allahabad") {
  addOptionsToSelect(
    ["Bara", "Karchana", "Meja", "Phulpur", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Ambedkar Nagar") {
  addOptionsToSelect(
    ["Akbarpur", "Jalalpur", "Sadar", "Tanda"],
    talukaSelect
  );
} else if (selectedDistrict === "Amethi") {
  addOptionsToSelect(
    ["Gauriganj", "Musafirkhana", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Amroha") {
  addOptionsToSelect(
    ["Amroha", "Dhanaura", "Hasanpur", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Auraiya") {
  addOptionsToSelect(
    ["Bidhuna", "Eka", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Azamgarh") {
  addOptionsToSelect(
    ["Azamgarh", "Lalganj", "Mehnagar", "Nizamabad", "Phulpur", "Sadar", "Sagri", "Tarwa"],
    talukaSelect
  );
} else if (selectedDistrict === "Baghpat") {
  addOptionsToSelect(
    ["Baghpat", "Baraut"],
    talukaSelect
  );
} else if (selectedDistrict === "Bahraich") {
  addOptionsToSelect(
    ["Kaiserganj", "Mahasi", "Nanpara", "Payagpur", "Risia", "Sadar", "Shivpur"],
    talukaSelect
  );
} else if (selectedDistrict === "Ballia") {
  addOptionsToSelect(
    ["Bairia", "Belthara", "Bansdih", "Dhanapur", "Raniganj", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Balrampur") {
  addOptionsToSelect(
    ["Balrampur", "Tulsipur", "Utraula", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Banda") {
  addOptionsToSelect(
    ["Atarra", "Baberu", "Banda", "Kamasin", "Naraini"],
    talukaSelect
  );
} else if (selectedDistrict === "Barabanki") {
  addOptionsToSelect(
    ["Fatehpur", "Fatehpur", "Haidergarh", "Nawabganj", "Ramnagar", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Bareilly") {
  addOptionsToSelect(
    ["Aonla", "Baheri", "Bareilly", "Faridpur", "Meerganj", "Nawabganj", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Basti") {
  addOptionsToSelect(
    ["Basti", "Bhanpur", "Harraiya", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Bhadohi") {
  addOptionsToSelect(
    ["Aurai", "Gyanpur", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Bijnor") {
  addOptionsToSelect(
    ["Bijnor", "Chandpur", "Dhampur", "Najibabad", "Nagina", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Budaun") {
  addOptionsToSelect(
    ["Bilsi", "Bisauli", "Dataganj", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Bulandshahr") {
  addOptionsToSelect(
    ["Anupshahr", "Bulandshahr", "Khurja", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Chandauli") {
  addOptionsToSelect(
    ["Chakia", "Chandauli", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Chitrakoot") {
  addOptionsToSelect(
    ["Karwi", "Mau", "Manikpur"],
    talukaSelect
  );
} else if (selectedDistrict === "Deoria") {
  addOptionsToSelect(
    ["Bhatpar Rani", "Deoria", "Rampur Karkhana", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Etah") {
  addOptionsToSelect(
    ["Aliganj", "Awagarh", "Jalesar", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Etawah") {
  addOptionsToSelect(
    ["Auraiya", "Bharthana", "Etawah", "Jaswantnagar", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Faizabad") {
  addOptionsToSelect(
    ["Bikapur", "Faizabad", "Milkipur", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Farrukhabad") {
  addOptionsToSelect(
    ["Amritpur", "Kaimganj", "Kamalganj", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Fatehpur") {
  addOptionsToSelect(
    ["Bindki", "Fatehpur", "Khaga", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Firozabad") {
  addOptionsToSelect(
    ["Firozabad", "Jasrana", "Sadar", "Shikohabad", "Tundla"],
    talukaSelect
  );
} else if (selectedDistrict === "Gautam Buddh Nagar") {
  addOptionsToSelect(
    ["Bisrakh", "Dadri", "Jewar", "Noida", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Ghaziabad") {
  addOptionsToSelect(
    ["Ghaziabad", "Hapur", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Ghazipur") {
  addOptionsToSelect(
    ["Ghazipur", "Jakhanian", "Muhamadabad Gohna", "Sadar", "Zamania"],
    talukaSelect
  );
} else if (selectedDistrict === "Gonda") {
  addOptionsToSelect(
    ["Colonelganj", "Gonda", "Mankapur", "Sadar", "Tarabganj"],
    talukaSelect
  );
} else if (selectedDistrict === "Gorakhpur") {
  addOptionsToSelect(
    ["Chauri Chaura", "Cuncunni", "Gola", "Haveli", "Khajni", "Pipraich", "Sadar", "Sahajanwa"],
    talukaSelect
  );
} else if (selectedDistrict === "Hamirpur") {
  addOptionsToSelect(
    ["Maudaha", "Rath", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Hapur") {
  addOptionsToSelect(
    ["Garhmukteshwar", "Hapur", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Hardoi") {
  addOptionsToSelect(
    ["Bilgram", "Hardoi", "Sadar", "Sandila", "Shahabad"],
    talukaSelect
  );
} else if (selectedDistrict === "Hathras") {
  addOptionsToSelect(
    ["Hathras", "Sadar", "Sasni"],
    talukaSelect
  );
} else if (selectedDistrict === "Jalaun") {
  addOptionsToSelect(
    ["Jalaun", "Kalpi", "Konch", "Madhogarh", "Orai", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Jaunpur") {
  addOptionsToSelect(
    ["Jaunpur", "Kerakat", "Mariahu", "Mungra Badshahpur", "Rampur", "Sadar", "Shahganj"],
    talukaSelect
  );
} else if (selectedDistrict === "Jhansi") {
  addOptionsToSelect(
    ["Babina", "Chirgaon", "Garautha", "Jhansi", "Mauranipur", "Moth", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Kannauj") {
  addOptionsToSelect(
    ["Chhibramau", "Gursahaiganj", "Sadar", "Tirwa"],
    talukaSelect
  );
} else if (selectedDistrict === "Kanpur Dehat") {
  addOptionsToSelect(
    ["Akbarpur", "Bilhaur", "Rasulabad", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Kanpur Nagar") {
  addOptionsToSelect(
    ["Bhognipur", "Bilhaur", "Ghatampur", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Kasganj") {
  addOptionsToSelect(
    ["Amapur", "Kasganj", "Patiyali", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Kaushambi") {
  addOptionsToSelect(
    ["Karari", "Manjhanpur", "Sadar", "Newada"],
    talukaSelect
  );
} else if (selectedDistrict === "Kushinagar") {
  addOptionsToSelect(
    ["Hata", "Kaptanganj", "Padrauna", "Sadar", "Tamkuhi Raj"],
    talukaSelect
  );
} else if (selectedDistrict === "Lakhimpur Kheri") {
  addOptionsToSelect(
    ["Gola Gokarannath", "Lakhimpur", "Mailani", "Mohammadi", "Nighasan", "Palia", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Lalitpur") {
  addOptionsToSelect(
    ["Mahroni", "Talbehat", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Lucknow") {
  addOptionsToSelect(
    ["Bakshi Ka Talab", "Malihabad", "Mohaan", "Sadar", "Sarojini Nagar"],
    talukaSelect
  );
} else if (selectedDistrict === "Maharajganj") {
  addOptionsToSelect(
    ["Maharajganj", "Nautanwa", "Pharenda", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Mahoba") {
  addOptionsToSelect(
    ["Charkhari", "Kulpahar", "Mahoba", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Mainpuri") {
  addOptionsToSelect(
    ["Karhal", "Kishni", "Mainpuri", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Mathura") {
  addOptionsToSelect(
    ["Chhata", "Govardhan", "Mant", "Mat", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Mau") {
  addOptionsToSelect(
    ["Madhuban", "Mau", "Mohammadabad", "Rasra", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Meerut") {
  addOptionsToSelect(
    ["Baghpat", "Kharkhauda", "Meerut", "Mawana", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Mirzapur") {
  addOptionsToSelect(
    ["Chunar", "Lalganj", "Marihan", "Mirzapur", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Moradabad") {
  addOptionsToSelect(
    ["Bilari", "Chandausi", "Kanth", "Sadar", "Thakurdwara"],
    talukaSelect
  );
} else if (selectedDistrict === "Muzaffarnagar") {
  addOptionsToSelect(
    ["Baghra", "Budhana", "Jansath", "Kairana", "Khatauli", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Pilibhit") {
  addOptionsToSelect(
    ["Bisalpur", "Pilibhit", "Puranpur", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Pratapgarh") {
  addOptionsToSelect(
    ["Kunda", "Lalganj", "Patti", "Raniganj", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Rae Bareli") {
  addOptionsToSelect(
    ["Bachhrawan", "Dalmau", "Lalganj", "Rae Bareli", "Sadar", "Sareni", "Unchahar"],
    talukaSelect
  );
} else if (selectedDistrict === "Rampur") {
  addOptionsToSelect(
    ["Bilaspur", "Milak", "Rampur", "Sadar", "Shahabad", "Suar"],
    talukaSelect
  );
} else if (selectedDistrict === "Saharanpur") {
  addOptionsToSelect(
    ["Behat", "Deoband", "Nakur", "Sadar", "Sarsawan"],
    talukaSelect
  );
} else if (selectedDistrict === "Sambhal") {
  addOptionsToSelect(
    ["Asmoli", "Chandausi", "Gunnaur", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Sant Kabir Nagar") {
  addOptionsToSelect(
    ["Bhinga", "Khalilabad", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Shahjahanpur") {
  addOptionsToSelect(
    ["Jalalabad", "Powayan", "Shahjahanpur", "Sadar", "Tilhar"],
    talukaSelect
  );
} else if (selectedDistrict === "Shamli") {
  addOptionsToSelect(
    ["Kairana", "Sadar", "Shamli"],
    talukaSelect
  );
} else if (selectedDistrict === "Shravasti") {
  addOptionsToSelect(
    ["Bhinga", "Ikauna", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Siddharthnagar") {
  addOptionsToSelect(
    ["Bansi", "Biswan", "Domariaganj", "Itwa", "Sadar", "Uska Bazar"],
    talukaSelect
  );
} else if (selectedDistrict === "Sitapur") {
  addOptionsToSelect(
    ["Biswan", "Laharpur", "Mahmoodabad", "Misrikh", "Pahala", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Sonbhadra") {
  addOptionsToSelect(
    ["Duddhi", "Ghorawal", "Myorpur", "Robertsganj", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Sultanpur") {
  addOptionsToSelect(
    ["Amethi", "Gauriganj", "Jaisinghpur", "Kadipur", "Lambhua", "Musafirkhana", "Sadabad", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Unnao") {
  addOptionsToSelect(
    ["Bangermau", "Bighapur", "Ganj Muradabad", "Hasanganj", "Puranpur", "Sadar"],
    talukaSelect
  );
} else if (selectedDistrict === "Varanasi") {
  addOptionsToSelect(
    ["Pindra", "Sadar", "Sevapuri", "Varanasi"],
    talukaSelect
  );
}

//Uttarakhand
else if (selectedDistrict === "Almora") {
  addOptionsToSelect(
    ["Almora", "Bhikiyasain", "Chaukhutiya", "Dwarahat", "Jainti", "Kapkot", "Ranikhet", "Sult"],
    talukaSelect
  );
} else if (selectedDistrict === "Bageshwar") {
  addOptionsToSelect(
    ["Bageshwar", "Chaukori", "Garud", "Kapkote"],
    talukaSelect
  );
} else if (selectedDistrict === "Chamoli") {
  addOptionsToSelect(
    ["Augustmuni", "Chamoli Gopeshwar", "Karnaprayag", "Pokhari", "Tharali"],
    talukaSelect
  );
} else if (selectedDistrict === "Champawat") {
  addOptionsToSelect(
    ["Barakot", "Champawat", "Lohaghat", "Pati"],
    talukaSelect
  );
} else if (selectedDistrict === "Dehradun") {
  addOptionsToSelect(
    ["Chakrata", "Dehradun", "Kalsi", "Rishikesh", "Tyuni", "Vikasnagar"],
    talukaSelect
  );
} else if (selectedDistrict === "Haridwar") {
  addOptionsToSelect(
    ["Bhagwanpur", "Haridwar", "Laksar", "Roorkee"],
    talukaSelect
  );
} else if (selectedDistrict === "Nainital") {
  addOptionsToSelect(
    ["Betalghat", "Dhari", "Haldwani", "Kaladhungi", "Nainital", "Ramnagar"],
    talukaSelect
  );
} else if (selectedDistrict === "Pauri Garhwal") {
  addOptionsToSelect(
    ["Dhumakot", "Kot", "Lansdowne", "Pauri", "Thalisain"],
    talukaSelect
  );
} else if (selectedDistrict === "Pithoragarh") {
  addOptionsToSelect(
    ["Berinag", "Chamoli", "Didihat", "Dharchula", "Gangolihat", "Munsyari", "Pithoragarh"],
    talukaSelect
  );
} else if (selectedDistrict === "Rudraprayag") {
  addOptionsToSelect(
    ["Augustmuni", "Jakholi", "Kot", "Rudraprayag"],
    talukaSelect
  );
} else if (selectedDistrict === "Tehri Garhwal") {
  addOptionsToSelect(
    ["Chamba", "Dhanaulti", "Deoprayag", "Ghansali", "Jakhnidhar", "Kirtinagar", "Narendra Nagar", "Pratapnagar", "Tehri"],
    talukaSelect
  );
} else if (selectedDistrict === "Udham Singh Nagar") {
  addOptionsToSelect(
    ["Bajpur", "Gadarpur", "Jaspur", "Kashipur", "Kichha", "Khatima", "Kichha", "Pantnagar", "Sitarganj"],
    talukaSelect
  );
} else if (selectedDistrict === "Uttarkashi") {
  addOptionsToSelect(
    ["Bhatwari", "Dunda", "Dharasu", "Mori", "Naugaon", "Purola", "Uttarkashi"],
    talukaSelect
  );
}

//West Bengal
 else if (selectedDistrict === "Alipurduar") {
    addOptionsToSelect(
      ["Alipurduar", "Falakata", "Kalchini", "Madarihat", "Alipurduar - II"],
      talukaSelect
    );
  } else if (selectedDistrict === "Bankura") {
    addOptionsToSelect(
      ["Bankura - I", "Bankura - II", "Barjora", "Chhatna", "Gangajalghati", "Hirbandh", "Indpur", "Jaypur", "Khatra", "Mejhia", "Onda", "Patrasayer", "Raipur", "Saltora", "Sarenga", "Sonamukhi", "Taldangra"],
      talukaSelect
    );
  } else if (selectedDistrict === "Birbhum") {
    addOptionsToSelect(
      ["Bolpur Sriniketan", "Dubrajpur", "Illambazar", "Khoyrasol", "Labpur", "Mayureswar - I", "Mayureswar - II", "Mohammad Bazar", "Nalhati - I", "Nalhati - II", "Nanoor", "Rajnagar", "Rampurhat - I", "Rampurhat - II", "Sainthia", "Suri - I", "Suri - II"],
      talukaSelect
    );
  } else if (selectedDistrict === "Cooch Behar") {
    addOptionsToSelect(
      ["Cooch Behar - I", "Cooch Behar - II", "Dinhata - I", "Dinhata - II", "Mathabhanga - I", "Mathabhanga - II", "Mekliganj", "Sitalkuchi", "Sitai", "Tufanganj - I", "Tufanganj - II"],
      talukaSelect
    );
  } else if (selectedDistrict === "Dakshin Dinajpur") {
    addOptionsToSelect(
      ["Balurghat", "Banshihari", "Gangarampur", "Harirampur", "Kumarganj", "Tapan"],
      talukaSelect
    );
  } else if (selectedDistrict === "Darjeeling") {
    addOptionsToSelect(
      ["Darjeeling Pulbazar", "Fulbari - Mirik", "Jorebunglow Sukhiapokhri", "Kalimpong I", "Kalimpong II", "Kurseong", "Matigara", "Phansidewa", "Rajganj", "Rangli Rangliot"],
      talukaSelect
    );
  } else if (selectedDistrict === "Hooghly") {
    addOptionsToSelect(
      ["Arambagh", "Balagarh", "Chandannagar", "Chinsurah - Magra", "Dhaniakhali", "Goghat - I", "Goghat - II", "Haripal", "Jangipara", "Pandua", "Polba - Dadpur", "Pursura", "Serampur Uttarpara", "Singur", "Tarakeswar"],
      talukaSelect
    );
  } else if (selectedDistrict === "Howrah") {
    addOptionsToSelect(
      ["Amta I", "Amta II", "Bagnan I", "Bagnan II", "Bally Jagachha", "Domjur", "Jagatballavpur", "Panchla", "Sankrail", "Shyampur I", "Shyampur II", "Udaynarayanpur"],
      talukaSelect
    );
  } else if (selectedDistrict === "Jalpaiguri") {
    addOptionsToSelect(
      ["Dabgram Fulbari", "Dhupguri", "Jalpaiguri", "Kalchini", "Kumargram", "Madarihat Birpara", "Mal", "Matiali", "Maynaguri", "Mekhliganj", "Metelli", "Nagrakata", "Rajganj"],
      talukaSelect
    );
  } else if (selectedDistrict === "Jhargram") {
    addOptionsToSelect(
      ["Binpur - I", "Binpur - II", "Jamboni", "Jhargram", "Sankrail"],
      talukaSelect
    );
  } else if (selectedDistrict === "Kalimpong") {
    addOptionsToSelect(
      ["Algarah", "Gorubathan", "Kalimpong - I", "Kalimpong - II"],
      talukaSelect
    );
  } else if (selectedDistrict === "Kolkata") {
    addOptionsToSelect(
      ["Kolkata", "Kolkata"],
      talukaSelect
    );
  } else if (selectedDistrict === "Malda") {
    addOptionsToSelect(
      ["Bamangola", "Bhutni", "Chanchal - I", "Chanchal - II", "English Bazar", "Gazole", "Habibpur", "Harishchandrapur - I", "Harishchandrapur - II", "Kaliachak - I", "Kaliachak - II", "Manikchak", "Old Malda", "Ratua - I", "Ratua - II", "Sujapur"],
      talukaSelect
    );
  } else if (selectedDistrict === "Murshidabad") {
    addOptionsToSelect(
      ["Beldanga I", "Beldanga II", "Berhampore", "Bhagawangola I", "Bhagawangola II", "Domkal", "Farakka", "Hariharpara", "Jalangi", "Kandi", "Khargram", "Lalgola", "Murarai I", "Murarai II", "Nabagram", "Nawda", "Raghunathganj I", "Raghunathganj II", "Raninagar I", "Raninagar II", "Sagardighi", "Samserganj", "Suti I", "Suti II"],
      talukaSelect
    );
  } else if (selectedDistrict === "Nadia") {
    addOptionsToSelect(
      ["Chakdaha", "Chapra", "Hanskhali", "Haringhata", "Kaliganj", "Karimpur I", "Karimpur II", "Krishnaganj", "Krishnagar I", "Krishnagar II", "Nabadwip", "Nakashipara", "Ranaghat I", "Ranaghat II", "Santipur", "Shantipur", "Tehatta I", "Tehatta II"],
      talukaSelect
    );
  } else if (selectedDistrict === "North 24 Parganas") {
    addOptionsToSelect(
      ["Ashoknagar Kalyangarh", "Amdanga", "Baduria", "Bagda", "Bangaon", "Barasat I", "Barasat II", "Barasat III", "Basirhat I", "Basirhat II", "Bongaon", "Deganga", "Gaighata", "Habra I", "Habra II", "Haroa", "Hasnabad", "Minakhan", "Rajarhat", "Sandeshkhali I", "Sandeshkhali II", "Swarupnagar"],
      talukaSelect
    );
  } else if (selectedDistrict === "Paschim Bardhaman") {
    addOptionsToSelect(
      ["Asansol I", "Asansol II", "Barabani", "Jamuria", "Raniganj"],
      talukaSelect
    );
  } else if (selectedDistrict === "Paschim Medinipur") {
    addOptionsToSelect(
      ["Belda", "Binpur - I", "Binpur - II", "Chandrakona - I", "Chandrakona - II", "Dantan - I", "Dantan - II", "Daspur - I", "Daspur - II", "Debra", "Garbeta - I", "Garbeta - II", "Ghatal", "Gopiballavpur - I", "Gopiballavpur - II", "Jamboni", "Jhargram", "Keshiary", "Keshpur", "Medinipur Sadar", "Nayagram", "Salboni", "Sankrail", "Sanskriti", "Sutahata"],
      talukaSelect
    );
  } else if (selectedDistrict === "Purba Bardhaman") {
    addOptionsToSelect(
      ["Arambagh", "Bardhaman - I", "Bardhaman - II", "Bhatar", "Galsi - I", "Galsi - II", "Jamalpur", "Kalna - I", "Kalna - II", "Katwa - I", "Katwa - II", "Khandaghosh", "Mangolkote", "Manteswar", "Memari - I", "Memari - II", "Purbasthali - I", "Purbasthali - II", "Raina - I", "Raina - II"],
      talukaSelect
    );
  } else if (selectedDistrict === "Purba Medinipur") {
    addOptionsToSelect(
      ["Bhagabanpur - I", "Bhagabanpur - II", "Contai - I", "Contai - II", "Egra - I", "Egra - II", "Haldia", "Khejuri - I", "Khejuri - II", "Mahisadal", "Moyna", "Nandakumar", "Panskura", "Ramnagar - I", "Ramnagar - II", "Sahid Matangini", "Sutahata", "Tamluk"],
      talukaSelect
    );
  } else if (selectedDistrict === "Purulia") {
    addOptionsToSelect(
      ["Arsha", "Baghmundi", "Balarampur", "Barabazar", "Hura", "Jhalda - I", "Jhalda - II", "Manbazar - I", "Manbazar - II", "Neturia", "Para", "Puncha", "Purulia - I", "Purulia - II", "Raghunathpur - I", "Raghunathpur - II", "Santuri"],
      talukaSelect
    );
  } else if (selectedDistrict === "South 24 Parganas") {
    addOptionsToSelect(
      ["Baruipur", "Basanti", "Bhangar - I", "Bhangar - II", "Bishnupur - I", "Bishnupur - II", "Budge Budge - I", "Budge Budge - II", "Canning - I", "Canning - II", "Diamond Harbour - I", "Diamond Harbour - II", "Falta", "Jaynagar - I", "Jaynagar - II", "Kakdwip", "Kulpi", "Magrahat - I", "Magrahat - II", "Mandirbazar", "Mathurapur - I", "Mathurapur - II", "Namkhana", "Patharpratima", "Sagar", "Sonarpur - Uttar", "Thakurpukur Mahestola"],
      talukaSelect
    );
  } else if (selectedDistrict === "Uttar Dinajpur") {
    addOptionsToSelect(
      ["Goalpokhar - I", "Goalpokhar - II", "Habibpur", "Harirampur", "Islampur", "Itahar", "Karandighi", "Kaliaganj", "Raiganj"],
      talukaSelect
    );
  }
}

  
  // Function to add options to a select element
  function addOptionsToSelect(optionsArray, selectElement) {
    optionsArray.forEach(function (option) {
      var optionElement = document.createElement("option");
      optionElement.value = option;
      optionElement.textContent = option;
      selectElement.appendChild(optionElement);
    });
  }
  