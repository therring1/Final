<?php
session_start();  
$_SESSION['royalty'];
?>
<!DOCTYPE html>
<section class = "container">
  <h1 class = "title">Enter Payment Information</h1>
  <form id = "form" class = "form" action = "tk.php" method = "post">
    <input id="input-field" type="text" name="streetaddress" required="required" autocomplete="on" maxlength="45" placeholder="Streed Address"/>

      <input id="column-left" type="text" name="city" required="required" autocomplete="on" maxlength="20" placeholder="City"/>

      <input id="column-right" type="text" name="zipcode" required="required" autocomplete="on" pattern="[0-9]*" maxlength="5" placeholder="ZIP code"/>
      
      <input id="input-field" type="email" name="email" required="required" autocomplete="on" maxlength="40" placeholder="Email"/>
	<ul>
      <li>
        <label for = "name">Credit Card Number<img id = "ccimg" width = "30px" height = "15px" src = "images/credit.png"></label>
        <input type = "number" placeholder="Credit Card Number" id = "ccnumber" tabindex = "1" pattern="[0-9]{13,16}" required><p class="log"></p>
      </li>
      <li class = "small-input" style = "float:left;">
        <label for = "date">Expiry Date (MM/YY)</label>
        <input type = "text" placeholder="MM/YY" id = "ccexpiry" tabindex = "2" pattern="(?:(?:0[1-9]|1[0-2])/(?:1[0-9]|2[0-9])" required>
      </li>
      <li class = "small-input" style = "float:right;">
        <label for = "subject">CVC<img width = "30px" height = "15px" src = "images/cvc.png"></label>
        <input type = "text" placeholder="CVC" id = "cvc" class = "cvc" tabindex = "3" pattern="[0-9]{3,4}" required>
      </li>
    </ul>
    <input type = "submit" value = "Place Order" id = "submit"/>
  </form>
</section>
<script>
  $('#form').validate();
</script>

<script>
$(document).ready(function(){
  $.support.placeholder = (function(){
    var i = document.createElement('input');
    return 'placeholder' in i;
  })();
  
  if($.support.placeholder) {
    $('.form li').each(function(){
      $(this).addClass('js-hide-label');
    });
  }
});


$('.form li').find('input,textarea').on('keyup blur focus', function(e){
  var $this = $(this),
      $parent = $this.parent();
  
  if (e.type === 'keyup') {
    if ($this.val() === '') {
      $parent.addClass('js-hide-label');
    } else {
      $parent.removeClass('js-hide-label');
        }
    }
  
  else if (e.type === 'blur') {
    if ($this.val() === '') {
      $parent.addClass('js-hide-label');
    } else {
      $parent.removeClass('js-hide-label').addClass('js-unhighlight-label');
    }    
  }
  
  else if (e.type === 'focus') {
    if($this.val() !== '') {
      $parent.removeClass('js-unhighlight-label');
    }
  }
});

    $(function() {     $('#ccnumber').validateCreditCard(function(result) {
      	//Check card type
        if(result.card_type.name == 'visa')
          {
           $('#ccimg').attr("src","images/visa.png");
          }
      	else if(result.card_type.name == 'mastercard')
      		{
           $('#ccimg').attr("src","images/mc.png");            
          }
        });
   
  });

//Add slash to expiry date
$('#ccexpiry').keyup(function() {
  var date = $(this).val();
  if(date.length > 2){
  var index = 2;
  date = date.substr(0, index) + '/' + date.substr(index + 1);
  }
     $('#ccexpiry').val(date);    
});


</script>

<style>
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}


*,*:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  background: #eee
}

body, input, textarea {
  font: 1em/1.5 Arial, Helvetica, sans-serif;
}

.container {
  max-wdith: 25em;
  margin: 2em auto;
  width: 95%;
}

.title {
  font-size: 1.5em;
  padding: .5em 0;
  text-align: center;
  background: #1DA3A6;
  color: white;
  border-radius: 5px 5px 0 0;
}

/*
 Form Styling
*/
.form ul {
  background: white;
  margin-bottom: 1em;
}

.form li {
  border: 1px solid #ccc;
  border-bottom: 0;
  margin-bottom: 0px;
  position: relative;
}

.form li:first-child {
  border-top: 0;
}

.form li:last-child {
  border-bottom: 1px solid #ccc;
}

label, input, textarea {
  display: block;
  border: 0;
}

input, textarea {
  width: 100%;
  height: 100%;
  padding: 2.25em 1em 1em; 
}

textarea {
  height: 16em;
  resize: none;
}

label {
  font-size: 0.8125em;
  position: absolute;
  top: 1.23em;
  left: 1.23em;
  color: #1DA3A6;
  opacity: 1;
}

input[type="submit"] {
  background: #1DA3A6;
  margin-bottom: 1em;
  color: white;
  border-radius: 5px;
  padding: .75em;
  -webkit-appearance: none;
  -webkit-transition: .333s ease -webkit-transform;
  transition: .333s ease transform;
}

input[type="submit"]:hover {
  transform: scale(1.005);
  -webkit-transform: scale(1.005);
  cursor: pointer;
}

input[type="submit"]:active {
  -webkit-transform: scale(.975);
  transform: scale(.975);
}

.js-hide-label label {
  opacity: 0;
  top: 1.5em;
}

label {
    -webkit-transition: .333s ease top, .333s ease opacity;
    transition: .333s ease top, .333s ease opacity;
}

.js-unhighlight-label label {
  color: #999;
  font-weight: bold;
}

.js-error {
    border-color: #f13b3b !important; /* override all cases */
}
.js-error + li {
    border-top-color: #f13b3b;
}
.js-error label {
    color: #f13b3b;
}

.small-input {
	width: 50%;
}
#column-left {
  width: 47.4%;
  float: left;
  margin-bottom: 2px;
}
#column-right {
  width: 47%;
  float: right;
}
</style>