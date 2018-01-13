<?php
	session_start();
	include 'lib/database.php';
	$str = "SELECT `post_id`, `title`, `votes` FROM `post`";
	$result = mysqli_query($conn, $str) or die("error");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Posts</title>

	<script type="text/javascript">
		function upvote(postid) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    getUpvote(this);
			    }
			};
			xhttp.open("GET", "http://localhost/railway/upvote.php?postid="+postid, true);
			xhttp.send();

			function getUpvote(text)
			{
				var votes = text.responseText;
				//console.log(votes);
				document.getElementById('post_'+postid).innerHTML = votes;
			}
		}

		function downvote(postid) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    getUpvote(this);
			    }
			};
			xhttp.open("GET", "http://localhost/railway/downvote.php?postid="+postid, true);
			xhttp.send();

			function getUpvote(text)
			{
				var votes = text.responseText;
				//console.log(votes);
				document.getElementById('post_'+postid).innerHTML = votes;
			}
		}

	</script>
</head>
<body>
<?php
	while($row=mysqli_fetch_assoc($result))
	{
?>
		<span id="title"><?php echo $row['title']; ?></span> <button onclick="upvote(<?php echo $row['post_id']; ?>);"> upvote </button> <button onclick="downvote(<?php echo $row['post_id']; ?>);"> downvote </button> <span id="<?php echo 'post_'.$row['post_id'] ?>"><?php echo $row['votes'] ?></span><br />
<?php
	}
?>
</body>
</html>
