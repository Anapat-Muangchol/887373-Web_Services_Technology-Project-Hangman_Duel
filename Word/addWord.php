<!DOCTYPE html>
<html>
<head>
	<title>HMD_Word</title>
	<meta charset="UTF-8">
</head>
<body>
<form method="post" action="insertWord.php">
<h2> add Word </h2>
<table>
	<tr>
		<th>	
			<td>Word:</td>
			<td><input type="txt" name="word"></td>
		</th>
		<th>
			<td>Translation:</td>
			<td><input type="txt" name="translation"></td>
		</th>
		<th>
			<td>Level:</td>
			<td><input type="txt" name="difficulty_level"></td>
		</th>
		<th>
			<td>Category:</td>
			<td><input type="txt" name="category_id"></td>
		</th>
		<th>
			&nbsp;&nbsp;<button type="submit">Add</button>
		</th>
	</tr>
</table>
</form>
<br>
<br>
<hr>
<br>
<br>
<form method="post" action="insertCategory.php">
<h2> add Category </h2>
<table>
	<tr>
		<th>
			<td>categoryName:</td>
			<td><input type="txt" name="category_name"></td>
		</th>
		<th>
			&nbsp;&nbsp;<button type="submit">Add</button>
		</th>
	</tr>
</table>
</form>
<br>
<br>
<hr>

</body>
</html>