<html>

<div id="card">
  <div class="insidecard">
    <h2 class="cardtitle" style="margin-left:-10px">Generic Card</h2>
    <form action="" id="cardform">
      <div class="inputcont">
        <label for="cardnum">CREDIT CARD NUMBER</label>
        <input name="cardnum" maxlength="19" required="required" type="text" placeholder="0000-0000-0000-0000" id="cardnum"/>
      </div>
      <div class="inputcont" id="cvccont"> 
        <label for="cvv">CVV CODE</label>
        <input name="cvv" maxlength="4" required="required" type="text" placeholder="XXX / XXXX" id="cvv"/>
      </div>
      <div class="inputcont" id="expiration"> 
        <label>EXPIRATION DATE</label><br/>
        <select required="required" id="month">
          <option disabled="disabled" selected="selected">MM</option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
        </select><span class="spacing"> -   </span>
        <select required="required" id="year">
          <option disabled="disabled" selected="selected">YY</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
          <option>25</option>
          <option>26</option>
        </select>
      </div>
      <div class="inputcont">
        <label for="name">NAME ON CARD</label>
        <input name="name" required="required" type="text" placeholder="John Smith" id="name"/>
      </div>
    </form>
  </div>
</div>
<div class="center">
  <button id="submitform" type="submit" form="cardform">Submit  </button>
</div>
<div class="alert alert-info"><a class="close" style="font-size:3.5em" href="#" data-dismiss="alert" aria-label="close">&times;</a><span>We currently only accept Visa, MasterCard, American Express, and Discover. Thank you for your patronage!    </span></div>
</html>
<style>
body {
  background-color: #2B2B2B;
}

#card {
  margin: 100px auto 0px auto;
  background-image: url("http://www.vector-finder.com/site-images/too_big/wavy_blue_background_dryicons.jpg");
  height: 315px;
  width: 500px;
  padding-bottom: 15px;
  border-radius: 15px;
}

.cardtitle {
  color: black;
  padding-top: 25px;
  padding-bottom: 5px;
}

.insidecard {
  margin-left: 25px;
  margin-right: 25px;
}

input {
  width: 100%;
  font-size: 1.2em;
  border-radius: 5px;
  border: 2px solid #CCCCCC;
  padding-top: 5px;
  padding-bottom: 5px;
}

input:focus {
  border: 2px solid #808080;
}

.inputcont {
  margin-top: 15px;
}

#cvccont {
  width: 150px;
  display: inline-block;
}

#expiration {
  float: right;
  margin-right: 15px;
  display: inline-block;
}

select {
  font-size: 1.2em;
  padding: 5px 3px 5px 3px;
}

span.spacing {
  font-size: 1.5em;
  margin: 0px 2px 0px 2px;
}

#submitform {
  margin-top: 50px;
  height: 50px;
  width: 200px;
  background: #008fcc;
  color: white;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
  font-size: 30px;
  border: 1px solid black;
  transition: background-color 500ms, color 500ms;
}

#submitform:hover {
  background-color: #006b99;
  color: white;
}
.alert{
  width:600px;
  margin: 40px auto 0px auto;
}
.center {
  background: inherit;
  text-align: center;
}
span{
  font-weight:500;
  font-size:1.2em;
}
</style>
<script>
function validate(n) {
  n = n.toString();
  var arr = n.length % 2 === 0 ? n.split("").map(function(index, currentValue) {
    return currentValue % 2 === 0 ? index * 2 : index * 1
  }) : n.split("").map(function(index, currentValue) {
    return currentValue % 2 === 1 ? index * 2 : index * 1
  })
  arr = arr.map(function(index) {
    if (arr[arr.indexOf(index)] > 9) {
      return index - 9
    } else {
      return index
    }
  })
  return arr.reduce(function(a, b) {
    return a + b
  }) % 10 === 0 ? true : false;
}
//
var type = "Generic Card";
var acceptedArr = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 8, 189];
var fullName;
$('#name').bind('input propertychange', function() {
  fullName = ($(this).val())
});
var cvv;
$('#cvv').bind('input propertychange', function() {
  cvv = ($(this).val())
});

$('#cvv').bind('keydown', function(e) {
  if (acceptedArr.indexOf(e.keyCode) !== -1) {
    return;
  } else {
    e.preventDefault();
  }
});

var cardNum;

$("#cardnum").bind("input propertychange", function() {
  cardNum = ($(this).val());
  type = "Generic Card"
  checkCard(cardNum);
  if (type == "Generic Card") {
    $("#card").css("background-image", "url('http://www.vector-finder.com/site-images/too_big/wavy_blue_background_dryicons.jpg')");
    $("h2").css("color", "black");
    $("label").css("color", "black");
  }

  if (type == "American Express") {
    $("#card").css("background", "url('https://serve.com/onevip2/img/hero-bg-slide1.jpg')")
    $("h2").css("color", "white")
    $("label").css("color", "white")
  }

  if (type == "Visa") {
    $("#card").css("background", "url('http://www.expitrans.com/wp-content/uploads/expi_background.jpg')")

  }
  if (type == "MasterCard") {
    $("#card").css("background", "url('http://www.skilliezelectric.com/wp-content/uploads/2014/06/background1.jpg')")
    $("h2").css("color", "white");
    $("label").css("color", "white")
  }
  if (type == "Discover") {
    $("#card").css("background", "url('http://www.publicdomainpictures.net/pictures/130000/nahled/brown-gradient-background.jpg')")
    $("h2").css("color", "white");
    $("label").css("color", "white")

  }

});

$('#cardnum').bind('keydown', function(e) {
  if (acceptedArr.indexOf(e.keyCode) !== -1) {

    if (e.keyCode !== 189 && e.keyCode !== 8) {
      if (cardNum.length == 4 && cardNum.replace(/-/, "").length == 4) {
        $("#cardnum").val($("#cardnum").val() + "-")
      }

      if (cardNum.length == 9 && cardNum.replace(/-/g, "").length == 8) {
        $("#cardnum").val($("#cardnum").val() + "-")
      }

      if (cardNum.length == 14 && cardNum.replace(/-/g, "").length == 12) {
        $("#cardnum").val($("#cardnum").val() + "-")
      }
    } else if (e.keyCode == 8) {
      return;
    }
  } else {
    e.preventDefault();
  }
});

$("#submitform").click(function(e) {
  var expiMonth = $("#month").val();
  var expiYear = "20" + $("#year").val();
  if (validate(cardNum)) {
    if(today.getFullYear().toString() == expiYear) {
      if((today.getMonth()+1).toString()==expiMonth) {
        alert("Date is expired.")
        e.preventDefault();
      }
      else{
        return;
      }
    }
    else if(today.getFullYear() < Number(expiYear)){
      return;
    }
    else{
      alert("Date is expired.")
      e.preventDefault();
    }
  } 
  else {
    alert("Card number is invalid.")
    e.preventDefault();
  }
});

var today = new Date();

function amex(num) {
  var arr = ["34", "37"];
  if (arr.indexOf(num.substr(0, 2)) !== -1) {
    return type = "American Express"
  }
}

function discover(num) {
  var arr = ["6011"]
  if (num.substr(0, 4) == arr[0]) {
    return type = "Discover"
  }
}

function masterCard(num) {
  var arr = ["51", "52", "53", "54", "55"];
  if (arr.indexOf(num.substr(0, 2)) !== -1) {
    return type = "MasterCard"
  }
}

function visa(num) {
  var arr = ["4"]
  if (arr.indexOf(num.substr(0, 1)) !== -1) {
    return type = "Visa"
  }
}

function checkCard(pass) {

  amex(pass);

  masterCard(pass);

  discover(pass);

  visa(pass);

  $("h2").text(type)

}
</script>