<?

// Сбор статистики

$hl['en'] = array(

"title"=>"YC's StartUpSchool 2017 Localization project",
"lecture"=>"Lecture",
"wannaHelp"=>"I want to help",
"wTranslation"=>"with translation",
"en"=>"en",
"ru"=>"ru",

"options"=>"Options",
"toTheList"=>"To the list",
"showVideos"=>"show Videos",
"createDBCache"=>"Update cache",
"generateListFor"=>"Generate list for ",

);

$hl['ru'] = array(

"title"=>"Локализация лекций стартапШколы от Y Combinator",
"lecture"=>"Лекция",
"wannaHelp"=>"Хочу помочь",
"wTranslation"=>"с переводом",
"en"=>"анг",
"ru"=>"рус",

"options"=>"Меню...",
"toTheList"=>"К списку",
"showVideos"=>"Показать все видео",
"createDBCache"=>"Создать кэш",
"generateListFor"=>"Сгенерить список ",

);


$content = "";

ini_set("display_errors",$_GET['err']);
error_reporting(E_ALL & E_NOTICE);

define("TMP_FILE","tmp.txt");
define("CACHE_FILE","dateCache.csv");

$lectures = array_map('str_getcsv', file(CACHE_FILE));

/* $topicAtDou = "https://dou.ua/forums/topic/20438/";

$srchDou = "<span class=\"pageviews\" title=\"Количество просмотров\">" = "</span>"; */


/* array_walk($lectures, function(&$a) use ($lectures) {
      $a = array_combine($lectures[0], $a);
    });
    array_shift($lectures); */

array_shift($lectures);

/*
$lectures = "

Before startup	Что делать до стартапа	Paul Graham (YC)	ii1jcLg-eIQ	JTZwffpzChA	Чим займатися до стартапу
Why to start a startup	Как и почему запускать стартап	Sam Altman (YC), Dustin Moskovitz (Asana)	ZoqgAy3h4OM	ntw66xl-mqE	Як і чому запускати стартап
Startup Mechanics	Механика стартапа	Kirsty Nathoo (YC)	2_IpVq6vKR0		Механіка стартапу
Office hours		Yuri Sagalov (Amium)	abtHadERzXU		
How to Get Ideas and How to Measure	Как генерить идеи и что измерять	Stewart Butterfield (Slack) and Adam D'Angelo (Quora)	zsBjAuexPq4	NcPOgh7h5_Y	Як генерувати ідеї і що вимірювати
How to Build a Great Product I	Как создать продукт, часть 1-ая из 4	Emmett Shear (Twitch) Steve Huffman (Reddit), Michael Seibel (YC)	6IFR3WYSBFM	VuVZsqc7ovE	Як створити продукт, частина 1-ша з 4
How to Build a Great Product II	Как создать продукт, часть 2-ая из 4	Aaron Levie (Box)	qRt7mFuKwQY		Як створити продукт, частина 2-а з 4
How to Build a Great Product III	Как создать продукт, часть 3-ая из 4	Tracy Young (PlanGrid), Jason Lemkin (SaaStr), Harry Zhang (Lob), Solomon Hykes (Docker)	09GRs0FXdWQ	DDz41-FG9sI	Як створити продукт, частина 3-я з 4
How to Build a Great Product IV	Как создать продукт, часть 4-ая из 4	Jan Koum (WhatsApp)	s1Rd4UShDxQ	0bm_cLXJEpM	Як створити продукт, частина 4-а з 4
How to Get Users and Grow	Где взять пользователей и как расти	Alex Schultz (Facebook)	URiIsrdplbo		
Office hours		Adora Cheung and Avichal Garg	3ESoTBIDbpk		Де брати користувачів і як рости
How to Invent the Future I	Alan Kay	Как изобрести будущее I	ZDM33CMJvp8		Як винайти майбутнє I

";

*/

// print_r($lectures);

// echo "here";

// $val = explode("\n", trim($lectures));

?><meta charset='utf8'>
<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.8/typicons.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="css.css" crossorigin="anonymous">

<style>
body {margin-left: 50px;}

#container {
	margin: 0 auto;
}

nav {
/*	margin: 0 0 50px; */
}

nav ul {
	padding: 0;
  margin: 0;
	list-style: none;
	position: relative;
	}
	
nav ul li {
	display:inline-block;
	background-color: #6D8DD8;
	}

nav a {
	display:block;
	padding:5px 10px;	
	color:#FFF;
	font-size:120%;
/*	line-height: 40px; */
	text-decoration:none;
}

nav a:hover { 
	background-color: #000000; 
}

/* Hide Dropdowns by Default */
nav ul ul {
	display: none;
	position: absolute; 
/*	top: 40px; the height of the main nav */
}
	
/* Display Dropdowns on Hover */
nav ul li:hover > ul {
	display:inherit;
}
	
/* Fisrt Tier Dropdown */
nav ul ul li {
	width:170px;
	float:none;
	display:list-item;
	position: relative;
}

/* Second, Third and more Tiers	*/
nav ul ul ul li {
	position: relative;
	top:-60px; 
	left:170px;
}

	
/* Change this in order to change the Dropdown symbol */
li > a:after { content:  ''; }
li > a:only-child:after { content: ''; }

</style>

<div id="container">
    <nav>
        <ul>
            <li><a href="#">Options...</a>
            <!-- First Tier Drop Down -->
            <ul>
                <li><a href="?">To the list</a></li>
				<li><a href="?page=yt_desc&lang=ru">Generate RU list</a></li>
                <li><a href="?page=yt_desc&lang=ua">Generate UA list</a></li>
                <li><a href="?page=yt_desc&lang=en">Generate EN list</a></li>
                <li><a>----</a></li>
                <li><a href="?page=createCache">Create DB cache</a></li>
                <li><a>----</a></li>
				<li><a href="?page=showVideos">Show videos</a></li>
            </ul>        
            </li>
        </ul>
    </nav>

<?php

switch($_GET['page']) {

	default:

		foreach($lectures as $key=>$val) {

			// echo "$key--<br>--$val[2]";

			$i++;

			// $props = explode("\t",$val);

		$JSON1 = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&id=$val[13]&key=AIzaSyBO19ATkFObaB51xlpAW3Oy9B1aIdw_S68");
		$JSON1_Data = json_decode($JSON1, true);
		$views = $JSON1_Data['items'][0]['statistics']['viewCount'];
		$likes = $JSON1_Data['items'][0]['statistics']['likeCount'];

		$JSON2 = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&id=$val[12]&key=AIzaSyBO19ATkFObaB51xlpAW3Oy9B1aIdw_S68");
		$JSON2_Data = json_decode($JSON2, true);
		$viewsOriginal = $JSON2_Data['items'][0]['statistics']['viewCount'];

		$odd = $subsRU = $subsEN = $helpIsNeeded = $subsEN = "";
		if ($i % 2 == 0) $odd = 'pure-table-odd';

		if (!empty($val['14']) && $val['14']!="no") $subsUK = "<a class='pure-button button-xsmall' href='stats.php?page=download&title=$val[4]&id=$val[14]&lang=uk'>uk</a>";
		if (!empty($val['13']) && $val['13']!="no") $subsRU = "<a class='pure-button button-xsmall' href='stats.php?page=download&title=$val[3]&id=$val[13]&lang=ru'>ru</a>";
		if (!empty($val['12']) && $val['12']!="no") $subsEN = "<a class='pure-button button-xsmall' href='stats.php?page=download&title=$val[2]&id=$val[12]&lang=en'>en</a>";

		if ($val['9'] == "processing") $helpIsNeeded = "<a class='button-warning pure-button' href='https://docs.google.com/spreadsheets/d/$val[16]/edit#gid=2115922395'>with translation</a>";

		if (!empty($val['12'])) {

		$content .= "

		<tr class='$odd'>
			<td>
			<!--<i class='icono-video'></i>-->
			<!-- <a href='#img$i'><b>$val[2]</b></a>-->
			<a href='https://youtu.be/$val[13]'><b>$val[2]</b></a>
			<br><span title='$val[5]'>" . substr($val['5'], 0, 30) . "...</span>

<a class='lightbox' href='#_' id='img$i'>
<!-- <iframe width='560' height='315' src='https://www.youtube.com/embed/$val[13]' frameborder='0' allowfullscreen></iframe> -->
</a>

			<div style='color: #ccc; font-size: 90%; margin-top: 1%'>
			<span title='" . round($views*100/$viewsOriginal,2). "%' class='typcn typcn-eye'></span> $views
			<span class='typcn typcn-thumbs-up'></span> $likes
			<span class='typcn typcn-document'></span> " . $JSON1_Data['items'][0]['statistics']['commentCount'] . "


			</div>
			</td>
			<!-- <td>" .  $JSON1_Data['items'][0]['statistics']['dislikeCount']  . "</td> -->
			<!-- <td>" . $JSON1_Data['items'][0]['statistics']['commentCount'] . "</td> -->
			<td>
				$subsEN
				$subsRU
			</td>

			<td>
				$helpIsNeeded
			</td>

		</tr>";

		$total = $views + $total;
		$totalLikes = $likes + $totalLikes;
		}
		}

		echo "<h2>YC's StartUpSchool 2017 Localization project</h2>

		<table class=''>
			<tr>
				<td colspan=4><!--<span class='typcn typcn-chart-bar'></span> --> 
					<span class='typcn typcn-eye'></span> <b>$total</b> &nbsp; 
					<span class='typcn typcn-thumbs-up'></span> <b>$totalLikes</b>
				</td>
			</tr>
		</table><br>


		<table class='pure-table'>
			<thead><tr><th>Lecture</th><!--<th>Edit</th><th>Cmnts</th>--><th><span class='typcn typcn-download '></span> CC</th><th><!--<span class='typcn typcn-arrow-repeat'></span>--> I want to help</th></tr></thead>
			$content
		</table>

		";


	break;

	case "download":

		// echo "Here";

		downloadTitles($_GET['lang'],$_GET['id'],$_GET['title']);

	break;

	case "showVideos":

		// echo "Here";

		echo "<h1>Videos</h1>" . generateVideos($lectures);

	break;

	case "createCache":

		$result = "Not created";

	
	if (file_put_contents(CACHE_FILE, file_get_contents("https://docs.google.com/spreadsheets/d/1J5ykYWeA9HMO1QHHMirr2LAax5CQGEbwMagiMEK5dqM/export?format=csv&gid=0"))) 

		$result = "created";

		echo "Cache $result";

		break;

	case "yt_desc":

		$i = 0;

		foreach($lectures as $key=>$val) {

			$title = array(
				"ru" => $val['3'],
				"ua" => $val['4'],
				"en" => $val['2'],
			);

	if (!empty($val['13'])) {

		switch($_GET['html']) {
		
		default: 

		echo "$i. " . $title[$_GET['lang']] . "<br>
		https://youtu.be/$val[13]<br><br>
		
		";

		break;

		case "true":

		echo "$i. <a href='https://youtu.be/$val[13]'>" . $title[$_GET['lang']] . "</a>\n";

			break;

		}



	$i++;

	}

		

		}
	
	break;

	case "get":

	break;

	case "upload";

				file_put_contents(TMP_FILE, file_get_contents("http://video.google.com/timedtext?lang=$_GET[lang]&fmt=vtt&v=$_GET[id]"));

	break;

}

function downloadTitles($lang, $id, $title) {

		file_put_contents(TMP_FILE, file_get_contents("http://video.google.com/timedtext?lang=$lang&fmt=vtt&v=$id"));

		$filename = "$title.$lang.vtt";

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
		header("Content-Disposition: attachment; filename=\"$filename\"");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize(TMP_FILE));
    @ob_clean();
    @flush();
		readfile(TMP_FILE);

}

function generateVideos($val, $i=0) {

	foreach ($val as $key=>$props) {

		if (!empty($props['13'])) {
		
		$toc .= "<li><a href='#$i'>$props[3]</a></li>\n";

		$content .= "

		<h2><a name='$i'></a>$i. $props[3]</h2>
		<p>Лекторы: $props[5]</p>
		<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/$props[13]\" frameborder=\"0\" allowfullscreen></iframe>
		<br><a href='https://www.youtube.com/watch?v=$props[12]'>Source video</a>

		";

		$i++;

		}

	}

	return "<h2>Оглавление</h2><ol>$toc</ol>$content";

}

?>

</div>
</div>