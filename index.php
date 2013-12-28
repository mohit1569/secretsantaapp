 <?php
        echo "hello world"; 
		echo "<br>";
        require("sdk/facebook.php");
        $config=array(
        "appId"=>"496015953851387",
        "secret"=>"19b2e1092f9c378d142e08369109a2d1"
        );
        $facebook=new Facebook($config);
        $user_id=$facebook->getUser();
		if($user_id)
		{
		$user=$facebook->api("/me","GET");
		
		
		echo "Welcome ".$user['name'];
		echo "<img src='https://graph.facebook.com/$user_id/picture'/>";
		
		/*$friends= $facebook->api("/me/friends?fields=id,name,gender","GET");
		echo "<ul>";
		foreach($friends['data'] as $friend)
		  {
		       echo "<li>{$friend['name']}</li>";
			  // echo "<img src='https://graph.facebook.com/{$friend['id']}/picture'/>";
		    }
		echo "</ul>";*/
		}
		else
		{
		 echo "Your are not Logged in";
		 $login_url=$facebook->getLoginUrl(array("scope"=>"email"));
		 echo  "<a href='$login_url'>Click Here To Login</a>";
		 }
		
		
 ?>