<?php include 'db_connection.php'; if(isset($_POST['finish'])){ $name = '"'.$dbConnection->real_escape_string($_POST['name']).'"';
		$email 		= '"'.$dbConnection->real_escape_string($_POST['email']).'"';
		$password 	= '"'.password_hash($dbConnection->real_escape_string($_POST['password']), PASSWORD_DEFAULT).'"';
		$gender 	= '"'.$dbConnection->real_escape_string($_POST['gender']).'"';
		
		$sqlInsertUser = $dbConnection->query("INSERT INTO multi_step_form_users (name, password, email, gender) VALUES($name, $password, $email, $gender)");
 
		if($sqlInsertUser === false){
			$message = 'Error: ' . $dbConnection->error;
		}else{
			$message =  'Last inserted record is : ' .$dbConnection->insert_id ; 
		}
	}
?>
<html>
<head>
<title>Multi step registration form PHP, JQuery, MySQLi</title>

<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cstyle%3E%0Abody%7Bfont-family%3Atahoma%3Bfont-size%3A12px%3B%7D%0A%23signup-step%7Bmargin%3Aauto%3Bpadding%3A0%3Bwidth%3A53%25%7D%0A%23signup-step%20li%7Blist-style%3Anone%3B%20float%3Aleft%3Bpadding%3A5px%2010px%3Bborder-top%3A%23004C9C%201px%20solid%3Bborder-left%3A%23004C9C%201px%20solid%3Bborder-right%3A%23004C9C%201px%20solid%3Bborder-radius%3A5px%205px%200%200%3B%7D%0A.active%7Bcolor%3A%23FFF%3B%7D%0A%23signup-step%20li.active%7Bbackground-color%3A%23004C9C%3B%7D%0A%23signup-form%7Bclear%3Aboth%3Bborder%3A1px%20%23004C9C%20solid%3Bpadding%3A20px%3Bwidth%3A50%25%3Bmargin%3Aauto%3B%7D%0A.demoInputBox%7Bpadding%3A%2010px%3Bborder%3A%20%23CDCDCD%201px%20solid%3Bborder-radius%3A%204px%3Bbackground-color%3A%20%23FFF%3Bwidth%3A%2050%25%3B%7D%0A.signup-error%7Bcolor%3A%23FF0000%3B%20padding-left%3A15px%3B%7D%0A.message%20%7B%20%09color%3A%20%23fb4314%3B%09font-size%3A%2019px%3B%09font-weight%3A%20bold%3B%09padding%3A%2010px%3B%09text-align%3A%20center%3B%20width%3A%20100%25%3B%7D%0A.btnAction%7Bpadding%3A%205px%2010px%3Bbackground-color%3A%20%23F00%3Bborder%3A%200%3Bcolor%3A%20%23FFF%3Bcursor%3A%20pointer%3B%20margin-top%3A15px%3B%7D%0Alabel%7Bline-height%3A35px%3B%7D%0Ah1%7B%0A%09margin%3A3px%200%3Bfont-size%3A13px%3B%09text-decoration%3Aunderline%3B%09text-align%3Acenter%3B%7D%0A.tLink%7B%0A%09font-family%3Atahoma%3B%09size%3A12px%3B%09padding-left%3A10px%3B%09text-align%3Acenter%3B%7D%0A%3C%2Fstyle%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;style&gt;" title="&lt;style&gt;" />

<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22http%3A%2F%2Fcode.jquery.com%2Fjquery-1.10.2.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;script&gt;" title="&lt;script&gt;" />
<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%3E%0Afunction%20validate()%20%7B%0Avar%20output%20%3D%20true%3B%0A%24(%22.signup-error%22).html('')%3B%0Aif(%24(%22%23personal-field%22).css('display')%20!%3D%20'none')%20%7B%0A%09if(!(%24(%22%23name%22).val()))%20%7B%0A%09%09output%20%3D%20false%3B%0A%09%09%24(%22%23name-error%22).html(%22Name%20required!%22)%3B%0A%09%7D%0A%09if(!(%24(%22%23email%22).val()))%20%7B%0A%09%09output%20%3D%20false%3B%0A%09%09%24(%22%23email-error%22).html(%22Email%20required!%22)%3B%0A%09%7D%09%0A%09if(!%24(%22%23email%22).val().match(%2F%5E(%5B%5Cw-%5C.%5D%2B%40(%5B%5Cw-%5D%2B%5C.)%2B%5B%5Cw-%5D%7B2%2C4%7D)%3F%24%2F))%20%7B%0A%09%09%24(%22%23email-error%22).html(%22Invalid%20Email!%22)%3B%0A%09%09output%20%3D%20false%3B%0A%09%7D%0A%7D%0A%0Aif(%24(%22%23password-field%22).css('display')%20!%3D%20'none')%20%7B%0A%09if(!(%24(%22%23user-password%22).val()))%20%7B%0A%09%09output%20%3D%20false%3B%0A%09%09%24(%22%23password-error%22).html(%22Password%20required!%22)%3B%0A%09%7D%09%0A%09if(!(%24(%22%23confirm-password%22).val()))%20%7B%0A%09%09output%20%3D%20false%3B%0A%09%09%24(%22%23confirm-password-error%22).html(%22Confirm%20password%20required!%22)%3B%0A%09%7D%09%0A%09if(%24(%22%23user-password%22).val()%20!%3D%20%24(%22%23confirm-password%22).val())%20%7B%0A%09%09output%20%3D%20false%3B%0A%09%09%24(%22%23confirm-password-error%22).html(%22Password%20not%20matched!%22)%3B%0A%09%7D%09%0A%7D%0Areturn%20output%3B%0A%7D%0A%24(document).ready(function()%20%7B%0A%09%24(%22%23next%22).click(function()%7B%0A%09%09var%20output%20%3D%20validate()%3B%0A%09%09if(output)%20%7B%0A%09%09%09var%20current%20%3D%20%24(%22.active%22)%3B%0A%09%09%09var%20next%20%3D%20%24(%22.active%22).next(%22li%22)%3B%0A%09%09%09if(next.length%3E0)%20%7B%0A%09%09%09%09%24(%22%23%22%2Bcurrent.attr(%22id%22)%2B%22-field%22).hide()%3B%0A%09%09%09%09%24(%22%23%22%2Bnext.attr(%22id%22)%2B%22-field%22).show()%3B%0A%09%09%09%09%24(%22%23back%22).show()%3B%0A%09%09%09%09%24(%22%23finish%22).hide()%3B%0A%09%09%09%09%24(%22.active%22).removeClass(%22active%22)%3B%0A%09%09%09%09next.addClass(%22active%22)%3B%0A%09%09%09%09if(%24(%22.active%22).attr(%22id%22)%20%3D%3D%20%24(%22li%22).last().attr(%22id%22))%20%7B%0A%09%09%09%09%09%24(%22%23next%22).hide()%3B%0A%09%09%09%09%09%24(%22%23finish%22).show()%3B%09%09%09%09%0A%09%09%09%09%7D%0A%09%09%09%7D%0A%09%09%7D%0A%09%7D)%3B%0A%09%24(%22%23back%22).click(function()%7B%20%0A%09%09var%20current%20%3D%20%24(%22.active%22)%3B%0A%09%09var%20prev%20%3D%20%24(%22.active%22).prev(%22li%22)%3B%0A%09%09if(prev.length%3E0)%20%7B%0A%09%09%09%24(%22%23%22%2Bcurrent.attr(%22id%22)%2B%22-field%22).hide()%3B%0A%09%09%09%24(%22%23%22%2Bprev.attr(%22id%22)%2B%22-field%22).show()%3B%0A%09%09%09%24(%22%23next%22).show()%3B%0A%09%09%09%24(%22%23finish%22).hide()%3B%0A%09%09%09%24(%22.active%22).removeClass(%22active%22)%3B%0A%09%09%09prev.addClass(%22active%22)%3B%0A%09%09%09if(%24(%22.active%22).attr(%22id%22)%20%3D%3D%20%24(%22li%22).first().attr(%22id%22))%20%7B%0A%09%09%09%09%24(%22%23back%22).hide()%3B%09%09%09%0A%09%09%09%7D%0A%09%09%7D%0A%09%7D)%3B%0A%7D)%3B%0A%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;script&gt;" title="&lt;script&gt;" />
</head>
<body>


<div class='tLink'><strong>Tutorial Link:</strong></div>




<h1>Multi step registration form PHP, JQuery, MySQLi</h1>




<div class="message"><?php if(isset($message)) echo $message; ?></div>




<ul id="signup-step">
	

<li id="personal" class="active">Personal Detail</li>


	

<li id="password">Password</li>


	

<li id="general">General</li>


</ul>




<form name="frmRegistration" id="signup-form" method="post">
	

<div id="personal-field">
		<label>Name</label><span id="name-error" class="signup-error"></span>
		

<div><input type="text" name="name" id="name" class="demoInputBox"/></div>


		<label>Email</label><span id="email-error" class="signup-error"></span>
		

<div><input type="text" name="email" id="email" class="demoInputBox" /></div>


	</div>


	

<div id="password-field" style="display:none;">
		<label>Enter Password</label><span id="password-error" class="signup-error"></span>
		

<div><input type="password" name="password" id="user-password" class="demoInputBox" /></div>


		<label>Re-enter Password</label><span id="confirm-password-error" class="signup-error"></span>
		

<div><input type="password" name="confirm-password" id="confirm-password" class="demoInputBox" /></div>


	</div>


	

<div id="general-field" style="display:none;">
		
		<label>Gender</label>
		

<div>
		<select name="gender" id="gender" class="demoInputBox">
<option value="male">Male</option>
<option value="female">Female</option>
		</select></div>


	</div>


	

<div>
		<input class="btnAction" type="button" name="back" id="back" value="Back" style="display:none;">
		<input class="btnAction" type="button" name="next" id="next" value="Next" >
		<input class="btnAction" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
	</div>


</form>


</body>
</html>