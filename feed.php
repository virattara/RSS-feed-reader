<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/skeleton.css">
<link rel="stylesheet" type="text/css" href="css/normalize.css">

<html>
<head >
	<title>Rss Feeds</title>
<div style="position:absolute;top:0;right:0;" id="time"></div>
<div style="position:absolute;top:20px;right:0;" id="timer"></div>
<div style="position:absolute;top:20px;right:20px;" id="minute"></div>
</head>


<?php
//parsing xml data
$data =	"https://www.reddit.com/.rss";
$i=0;
$j=50;
$k=100;
$receivedData =   simplexml_load_file($data);

foreach ($receivedData as $processedData) {
?>
<!DOCTYPE html>
<div id="<?php echo $i.'main';?>">
<span class="row">&nbsp;</span>
<div class="container">
 	<div class="row">
 		<div class="one-third column">
			<img id="<?php echo $i;?>" class="u-max-full-width" src="">
		</div>
 		<div class="one-third column">
 			<h6 class="hero-heading"><?php echo $processedData->title;  ?></h6>
			<a id="<?php echo $j;?>" href="" onmouseover="load(this.id,'block')" onmouseout="load(this.id,'none')">
			<button class="buttons">Read More..</button></a>
		</div>
		<div class="one-third column">
			<button class="button-primary" id="<?php echo $i.'main';?>" onclick="hide(this.id)">Hide Feed</button>
			<div id="<?php echo $j.'prod';?>" style="display:none;">
				<?php echo 'Author Name ='.str_replace("/u/"," ",$processedData->author->name).'<br>Category: '.$processedData->category['term'].'<br>Updated: '.$processedData->updated;   ?>
			</div>
		</div>
	</div>
</div>
</div>

<script>
//html parsing using javascript $processedData->content[0] contains the main info.
var id = "<?php echo $i; ?>";

if (id > 5) {
var htmlString = '<?php echo str_replace("'"," ",$processedData->content[0]); ?>';
var mod = htmlString.replace("'"," ");
var parseHtml = new DOMParser();
var parsed = parseHtml.parseFromString(mod, "text/html");
var image  = parsed.getElementsByTagName('img');
var link = parsed.getElementsByTagName('a');

//image and link
	if (image[0] != null ) {
		document.getElementById("<?php echo $i;?>").setAttribute('src',image[0].getAttribute('src'));
		document.getElementById("<?php echo $j; ?>").setAttribute('href',link[4].getAttribute('href'));
	}
	else{
		document.getElementById("<?php echo $i; $i++; ?>").setAttribute('src',"./default.jpg");
		document.getElementById("<?php echo $j; $j++; ?>").setAttribute('href',link[2].getAttribute('href'));
	};

//Excerpt
function load(identity,text){
 	final = identity.concat('prod');
	document.getElementById(final).style.display = text;
}

//Hide Button
function hide(identity){
	document.getElementById(identity).remove();
}
}
else
{
	mainId = id.concat('main');
	document.getElementById(mainId).remove(); 	
};

</script>

<?php
}

?>


<script type="text/javascript">
//DATE and TIME(R)
date = new Date();
var minute = 0;
var value = 0;
var currentTime = 0;
window.setInterval(timer,1000);
function timer() {
	document.getElementById('time').innerHTML=date.toISOString();
	if(value<59){
	value = currentTime++;
	document.getElementById('timer').innerHTML=value;
	}
	else{
		value=0;
		currentTime=0;
		minute++;
			document.getElementById('minute').innerHTML=minute;
	};
}
</script>