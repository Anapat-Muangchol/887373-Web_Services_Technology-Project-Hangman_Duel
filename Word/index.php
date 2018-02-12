<!DOCTYPE html>
<html>
<head>
	<title>Hangman Duel - Words Search</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" type="image/x-icon" href="../pic/Logo-HangManDuel-for-web.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<body>
<h2> Words Search </h2>
<table>
	<tr>
		<th>	
			<td>Word:</td>
			<td><input type="txt" id="word" name="word"></td>
		</th>
		<th>
			<td>Category:</td>
			<td>
                <select id="category_id">
                    <option value='all'>--- All ---</option>
                    <?php
                        $host = "localhost";
                        $username = "it57160558";
                        $password = "it57160558";
                        $db = "it57160558";
                        $conn = new mysqli($host,$username,$password,$db);
                        $conn->query("set names utf8");
                        $sql = "SELECT * FROM HMD_word_category";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_object()){
                            echo "<option value='".$row->category_id."'>".$row->category_name."</option>";
                        }
                    ?>
                </select>
            </td>
		</th>
        <th>
			<td>Length:</td>
			<td><input type="number" id="length" name="length" min="3" max="20"></td>
		</th>
		<th>
			&nbsp;&nbsp;<button id="search" onclick="search()">Search</button>
		</th>
	</tr>
</table>
<hr>
<div id="words"></div>
</body>

<script>
function search() {
    var word = document.getElementById("word").value;
    var e = document.getElementById("category_id");
    var category_id = e.options[e.selectedIndex].value;
    var length = document.getElementById("length").value;
    if(word=="")word="all";
    if(length=="")length="all";
    //alert("word:"+word+", category_id:"+category_id+", length:"+length);
    $.post("https://angsila.cs.buu.ac.th/~57160033/887373%20Web%20Services/HangmanDuel/Word/serchWord.php",
    {
        "word": word,
        "category_id": category_id,
        "length": length
    },function (data) {
        //alert(data);
        data = JSON.parse(data);
        var htmlRender = "<table border=1><tr><th>&nbsp;&nbsp;&nbsp;Word&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;Translation&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;Difficulty Level&nbsp;&nbsp;&nbsp;</th></tr>";
        $.each(data.words, function (index, word) {
            htmlRender += "<tr><td>"+word.word+"</td><td>"+word.translation+"</td><td>"+word.difficulty_level+"</td></tr>";
        });
        htmlRender += "</table>";
        document.getElementById('words').innerHTML = htmlRender;
    });
}
</script>

</html>