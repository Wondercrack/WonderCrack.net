<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<title>Wondy</title>
	<link rel="stylesheet" href="/styles/documents.css">
	
	<meta charset="utf-8">
    <title>Wondy</title>
 
    <!-- Include jQuery, this can be omitted if it's already included -->
    <script type="text/javascript" src="/javascript/jquery-3.1.1.min.js"></script>
 
    <!-- Include the default theme -->
    <link rel="stylesheet" href="/texteditor/minified/themes/default.min.css" type="text/css" media="all" />
 
    <!-- Include the editors JS -->
    <script type="text/javascript" src="/texteditor/minified/jquery.sceditor.bbcode.min.js"></script>
	
	<script src="/javascript/texteditor.js"></script>
 
    <!-- Text editor -->
    <script>
    $(function() {
        $("textarea").sceditor({
            plugins: "xhtml",
            style: "/texteditor/minified/jquery.sceditor.default.min.css"
        });
    });
    </script>


</head>

<body>
	<div id="editor">
		<textarea type="text" style="width: 1200px; height: 500px"></textarea>
	</div>
	<div id="nav">
		<div id="top_nav">
			<li><a class="active" href="documents.php">Documents</a></li>
			<li><a href="/html_php/games.php">Games</a></li>
			<li><a href="/html_php/other.php">Other</a></li>
		</div>
		<div id="home_nav">
		<li style="float:left"><a href="/index.html">Home</a></li>
		</div>
		<div id="left_nav">
			<li><a href="newdoc.html">New Document</a></li>
			<li><a href="newdoc.html">New Document</a></li>
			<li><a href="newdoc.html">New Document</a></li>
			<li><a href="newdoc.html">New Document</a></li>
		</div>
	</div>
	<div id="text_filename">
		<form method="post" id="saveform" style=" text-align: center; font-size: 30">
			Title:<br id="save_title" style=>
			<input type="submit" class="styledButton" name="Save" value="select"></input> 
			<input type="text" id="filename" name="firstname" style="width: 1088px; height: 33px; font-size: 18px"><br>
		</form>	
	</div>


</body>


</html>