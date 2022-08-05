
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Numerology Calculator :: 8 Subjects</title>
<link rel="stylesheet" href="ajax/css/jquery.ui.all.css" />
	<script src="ajax/js/jquery-1.4.2.js" type="text/javascript"></script>
	<script src="ajax/js/jquery.ui.core.js" type="text/javascript"></script>
	<script src="ajax/js/jquery.ui.widget.js" type="text/javascript"></script>
	<script src="ajax/js/jquery.ui.datepicker.js" type="text/javascript"></script>
  <script src="js/ajaxsubmit.js" type="text/javascript"></script>

  <script type="text/javascript">
  	$(function() {
  		$( "#datepicker" ).datepicker({
  			changeMonth: true,
  			changeYear: true,
            	showOn: "button",
  			buttonImage: "images/date.png",
  			buttonImageOnly: true
  		});
  	});
  	</script>
<style type="text/css">
/*<![CDATA[*/

body{
background:#CCCCCC;
font-family:Georgia;
color:#333333;
text-align:center;
text-shadow:#F0F0F0 0px 0px 1px;
}

#wraper{
  width:900px;
  border:1px solid #808080;
  background:#FFFFFF;
  margin:auto;
  height:500px;
         	border-radius: 8px;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
}

#header{
width: 96%;
padding:2px 2px 2px 2px;
margin:10px auto;
background:transparent;
height:100px;
color:#333333;
       	border-radius: 8px;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
}

#content{
border:1px solid #808080;
width: 96%;
padding:2px 2px 2px 2px;
margin:10px auto;
height:300px;
}

#left{
border:0px solid #003366;
height:300px;
width:60%;
padding:2px 2px 2px 2px;
margin:10px 15px auto;
text-align: left;
float:left;
}

#right{
float:right;
height:200px;
width:32%;
padding:2px 2px 2px 2px;
margin:10px 15px 10px auto;
text-align:left;
}

input, select{
  border:1px solid #D8D8D8;
  height:38px;
  color:#727272;
  float:auto;
 margin-left:50px;
  font-weight:bold;
border-radius: 4px;
-webkit-border-radius: 4px;
}

input:hover, select:hover{
  border:1px solid #003366;
  color:#727272;
}

label{
  font-weight:bold;
  float:auto;

}

INPUT:focus, SELECT:focus, TEXTAREA:focus {background: #F0F0F0; color:#333333;   border:1px solid #003366;
}

.button{
  background:#333333;
  color:#F0F0F0;
}
.radio{
  height:15px;
  width:15px;
  border:0px solid;
}


legend {
	color:#003366; /* IE styles legends with blue text by default */
	!margin-left:7px;
    font-weight:bold;
    font-size:20px;
    margin-bottom:10px;
}
fieldset {
	border:1px solid #dedede; /* Default fieldset borders vary cross browser, so make them the same */
    margin-bottom:10px;
}
fieldset div {
	overflow:hidden; /* Contain the floating elements */
	display:inline-block; /* Give layout in ie to contain float */
}
fieldset div {display:block;} /* Reset element back to block leaving layout in ie */

label {
	float:left; /* Take out of flow so the input starts at the same height */
	width:30em; /* Set a width so the inputs line up */
    margin-left:0px;
}

.chk{
  float:none;
  width:20px;
  height:15px;
  width:15px;
  border:none;
}

.error{
background:#ECECFF;
border:1px solid #C0C0C0;
color:#CC0000;
     	border-radius: 9px;
	-moz-border-radius: 9px;
	-webkit-border-radius: 9px;
}

.correct{
background:#ECECFF;
padding:5px;
height:30px;
border:1px solid #C0C0C0;
color:#006600;
border-radius: 9px;
-moz-border-radius: 9px;
-webkit-border-radius: 9px;
}
/*]]>*/
</style>
</head>
<body>
<?php

if(isset($_POST['go'])){

  //PROCESS THE REQUEST
  numerology(strtolower($_POST['user']), $_POST['method']);

}

//MAIN FUNCTION
function numerology($str, $method){


$i=$tot=$net=$res=0;
$nval=[];

if($method=='CHALDEAN'){
  $nval = array('a'=>1, 'b'=>2, 'c'=>3, 'd'=>4, 'e'=>5, 'f'=>8, 'g'=>3, 'h'=>5, 'i'=>1, 'j'=>1, 'k'=>2, 'l'=>3, 'm'=>4, 'n'=>5, 'o'=>7, 'p'=>8, 'q'=>1, 'r'=>2, 's'=>3, 't'=>4, 'u'=>6, 'v'=>6, 'w'=>6, 'x'=>5, 'y'=>1, 'z'=>7);
}
else{
  $nval = array('a'=>1, 'b'=>2, 'c'=>3, 'd'=>4, 'e'=>5, 'f'=>6, 'g'=>7, 'h'=>8, 'i'=>9, 'j'=>1, 'k'=>2, 'l'=>3, 'm'=>4, 'n'=>5, 'o'=>6, 'p'=>7, 'q'=>8, 'r'=>9, 's'=>1, 't'=>2, 'u'=>3, 'v'=>4, 'w'=>5, 'x'=>6, 'y'=>7, 'z'=>8);
}


        //calc word by word
        for($i=0;$i<strlen($str);$i++){
        $tot=$tot+$nval[$str[$i]];
        }
       
        $res=digitval($tot);
        $_GET['result']='<fieldset>
        <legend>'.$method.'</legend>
        <h2>'.strtoupper($_POST['user']).'</h2><h1>'.$res.'</h1>
        </fieldset>';
}


function digitval($number) {
  $res=$rem=$sum=0; 

   while($number > 0){
  		$rem = $number % 10;
  		$number = $number / 10;
  		$sum = $sum + $rem;
    }
    
    $res=$sum;
    if(strlen($sum)>=2){
    $res=digitval($sum);
    }

   return $res;
}


?>

<div id="wraper">
<div id="header"><h1>Numerology Calculator</h1>
</div>
<div id="left">
<form action="" method="post" id='frm1' name='frm1'>
<fieldset>
<legend>Personal Details</legend>
<label>Name:*</label><input type="text" name='user' id='user' size="30" maxlength="40" tabindex="1" /><br /><br />
<!--<label>Date of Birth:*</label><input type="text" name="t_dob" id='datepicker' value="" size="30" maxlength="10" tabindex="3"  />
<br /><br />-->
<label>Method:*</label>
<input type="radio" id="method"  value="CHALDEAN" name="method" class="radio" tabindex="4" />
<label class="chk">CHALDEAN</label>
<input type="radio" id="method2" value="PYTHOGOREAN" name="method" class="radio" tabindex="5" /> <label class="chk">PYTHOGOREAN</label>
<br /><br /><br/>
<input type='submit' id="go" name="go" value="Get Result" class='button' />
</fieldset>
</form>
</div>

<?php if(isset($_POST['go'])){ ?>
<div id="right">
<?php
echo $_GET['result'];
?>
<?php } ?>
</div>
</div>



</body>
</html>