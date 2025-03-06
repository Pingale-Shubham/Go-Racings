
document.getElementById('ae_captcha_api').innerHTML = "<div style='float: left; height: 60px; width: 280px; height: 60px; min-width: 170px; border: 1px solid; border-radius: 8px; margin-bottom: 13px; margin-right: 10px; ' id='divcaptcha'><img src='./captcha-generator/img_gen.php' style='height: 100%; width: 100%; object-fit: contain; box-sizing: border-box;'></div><a class='fa fa-refresh' type='button' onclick='newcaptcha()'></a>";


function newcaptcha(){
  var dataString = 'index=1';
  var url = "captcha-generator/captcha.php"
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      html = this.responseText;
      if (html!=1){
        document.getElementById('divcaptcha').innerHTML = html;
        //window.location="../goracings/login.php";
      }
    }
  };
  xhttp.open("POST", url, true);
  xhttp.send();
}

document.addEventListener("DOMContentLoaded", function() {
  newcaptcha();
});
