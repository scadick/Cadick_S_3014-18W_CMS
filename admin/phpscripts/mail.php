<?php
	//echo "From mail file";
	function submitMessage($direct, $username, $email, $url, $password) {
		//echo "From submitmessage()";
		$to = $email;
		$subject = "New User Message";
		$extra = "Reply to: jertz@jertz.com";
		$msg = "Username: ".$username."\n\nPassword: ".$password."\n\nURL: ".$url;
		mail($to,$subject,$msg,$extra);
	}
?>
