<?php
session_start();
$cart = array();
if(isset($_SESSION["cart"]))
{
    $cart=$_SESSION["cart"];
}
$act=0;
$conn = new mysqli("localhost","root","1234","saiteja");
if($conn->connect_error)
    die("connect failed");
else
{
    $userdet=$conn->query("select name,activated from customer where email_address='".$_SESSION["email"]."';")->fetch_assoc();
    $uname=$userdet[name];
    $act=$userdet[activated];
    echo "welcome ".$uname;
    $_SESSION["username"]=$uname;
    echo "<br/><br/><br/>";?>

<html>
    <head>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    function searchitem(x)		
                
		 {			
			var xhr= new XMLHttpRequest(); 
				

			var url = 'gethint.php?js_var=' + x;
			xhr.open('GET', url, false);
			xhr.onreadystatechange = function () {
				if (xhr.readyState===4 && xhr.status===200) {
                                                var c=xhr.responseText;
                                                document.getElementById("p1").innerHTML=c;
				}
			}
			xhr.send();
                        return false;
		}
         function fo()
         {
             document.getElementById("p1").innerHTML="";
         }
</script>

    </head>
    <body>
        <p>
            search:</p><input type="text" id="sitem" onkeyup="searchitem(this.value)"/>
        <p id="p1"></p>
    </body>
</html>


    <?php
    $sqlitems ="select * from item;";
    $result = $conn->query($sqlitems);
    
    if($result->num_rows)
    {
        while($row=$result->fetch_assoc())
        {
            echo "<img src='$row[image]' height=40 width=40>id is $row[id],name is $row[name],price is $row[price]<br/>";
            echo "<a href='addtocart.php?id=$row[id]'>add to cart</a><br/><br/>";
        }
    }
    else
        echo "no items";
    echo "<br/><br/><br/>";
    echo "<a href='display.php'>view profile</a>";
    echo "<br/><br/>";
    echo "<a href='cart.php'>go to cart</a>";
    echo "<br/><br/>";
    if($act==0)
        echo "<a href='email.php?loggedin=1'>activate my account</a>";
    echo "<br/><br/><br/>";
    echo "<a href='logout.php'>logout</a>";
    
}
?>