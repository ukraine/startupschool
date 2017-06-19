<?
// Проверка и импорт титров
// error_reporting(E_ALL);

// ".\r\n\r\n"
// ([а-я .?, ])\n\n\n([а-яA-Я ])

$lang['en'] = array('en-US','english');
$lang['ru'] = array('ru-RU','russian');
$lang['uk'] = array('uk-UK','ukrainian');

if (empty($_GET['lang'])) $_GET['lang'] = "en";

$lecture = $_GET['lecture'];
define("LECTURE",$lecture);
define("LANGUAGE",$lang[$_GET['lang']]['1']);
define("LANGCODE",$_GET['lang']);


// Данные для доступа к БД
// DB login details
define("DB_HOST","localhost");
define("DB_USER", "trof");
define("DB_PASS", "6iB3PJ6hkCJS5winYtQiQ");
define("DB_NAME", "trof");

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/*

UPDATE `titles` 
SET `" . LANGUAGE . "` = concat(`russian`,'.') 
where `lecture` = '" . LECTURE . "' 
and `english` like '%.%' 
and `" . LANGUAGE . "` not like '%.%';

UPDATE `titles` 
SET `" . LANGUAGE . "` = concat('>> ',`russian`) 
where `lecture` = '5' 
and `english` like '%>>%' 
and `" . LANGUAGE . "` not like '%>>%';

*/

// $fileName = "How to Build a Product I, Michael Seibel, Steve Huffman, Emmett Shear - CS-183F." . $lang[$_GET['lang']] . ".srt";
// echo $fileName; // $fileName = "How to Get Ideas and How to Measure - Stewart Butterfield & Adam D'Angelo." . $lang[$_GET['lang']] . ".srt";
// $fileName = "How to Build a Product III - Jason Lemkin, Solomon Hykes, Tracy Young and Harry Zhang - CS183F." . $lang[$_GET['lang']] . ".srt";
// $fileName = "Startup Mechanics - Kirsty Nathoo - CS183F." . $lang[$_GET['lang']] . ".srt";
// $fileName = "How to Build a Product IV - Jan Koum - CS183F." . $lang[$_GET['lang']] . ".srt";
// $fileName = "How to Get Users and Grow - Alex Schultz - CS183F." . $lang[$_GET['lang']]['0'] . ".srt";
// $fileName = "How to Invent the Future I - CS183F." . $lang[$_GET['lang']]['0'] . ".srt";
// $fileName = "How to Invent the Future II - CS183F." . $lang[$_GET['lang']]['0'] . ".srt";
// $fileName = "How to Think About PR - CS183F." . $lang[$_GET['lang']]['0'] . ".srt";
// $fileName = "How to Find Product Market Fit - CS183F." . $lang[$_GET['lang']]['0'] . ".srt";
// $fileName = "How to Build a Product II, Aaron Levie - Box - CS183F." . $lang[$_GET['lang']]['0'] . ".srt";
// $fileName = "How to Get Ideas and How to Measure - Stewart Butterfield & Adam DAngelo." . $lang[$_GET['lang']]['0'] . ".srt";
// $fileName = "How to Find Product Market Fit - CS183F." . $lang[$_GET['lang']]['0'] . ".srt";
$fileName = "Startup Mechanics - Kirsty Nathoo - CS183F." . $lang[$_GET['lang']]['0'] . ".srt";



$titles = trim(file_get_contents($fileName));

echo "
<style type='text/css'>
table td {padding: 5px; border: 1px solid #ccc;}
td[0] {width: 200px;}
</style>

Params:
<br>

<br>
<b>&lecture=NUM</b> number of a lecture to work with<br>
<b>&lang=en|ru</b> language Subtitles file to work with<br>
<b>&page=plainText</b><br>

<br>
1. <a href='?lang=" . LANGCODE . "&lecture=" . LECTURE . "&page=insertOriginal'><b>Initial titles insertion</b></a> - SQL code for the subtitles readingfrom the " . LANGCODE . " file <br>
2. <a href='?lang=" . LANGCODE . "&lecture=" . LECTURE . "&page=updateRussianEditedTitles'><b>SQL code to update " . LANGCODE . " titles</b></a> - assumes that we have " . LANGCODE . " file to read from<br>
3. <a href='?lang=" . LANGCODE . "&lecture=" . LECTURE . "&page=compareVersions'><b>Lines w missing chars</b></a> w missing periods, exclamation, questions marks, etc<br>
4. <a href='?lang=" . LANGCODE . "&lecture=" . LECTURE . "&page=plainText'><b>Plain text </b></a> - without timecodes and numbers<br>

<h2>Details</h2><table cellspacing=0>
<td>Lang </td><td><b>" . $lang[$_GET['lang']]['0'] . " - " . $lang[$_GET['lang']]['1'] . "</b></td><tr>\n
<td>File </td><td><b>$fileName</b></td><tr>\n
<td>Lecture </td><td><b>" . LECTURE . "</b></td><tr>\n
<td>Sentences </td><td><b>" . substr_count($titles, '.') . "</b></td><tr>\n
<td>Questions</td><td> <b>" . substr_count($titles, '?') . "</b></td><tr>
\n";

// English titles

switch(LANGUAGE) {

	default:

$titles = explode("

",$titles);


	break;

case "russian":

	$titles = str_replace("\n\n\n\n","\n\n\n",$titles);

// Russian titles
$titles = explode("


",$titles);
	
	break;

case "ukrainian":

	$titles = str_replace("\n\n\n\n","\n\n\n",$titles);

// Russian titles
$titles = explode("



",$titles);
	
	break;


}

// print_r($titles);

function insertOriginalTitles($titles, $lecture, $insertUpdate="") {

	foreach ($titles as $key=>$val) {

/*
// russian
	$props = explode("



", $val); */

// English
/*
$props = explode("
", $val);

$props = explode("
", $val);

*/
$props = explode("


", $val);

// print_r($props);

switch($insertUpdate) {

	default:

		$values .= "($lecture, '$props[0]', '$props[1]', '" . str_replace("'","\'",$props[2]) . "'),\n\n";

	break;

	case "showContentLinesOnly":

		$values .= "$props[2]\n";

	break;

	case "updateFromExisting";

	$content = str_replace("'","\'",trim("$props[2]\n$props[3]"));

		$values .= "update `titles`	
		set `" . LANGUAGE . "` = '$content'
		where `number` = '$props[0]'
		and `lecture` = '$lecture';\n\n";

	break;

	case "updateRussianFirstTime";

		$i++;

		$values .= "update `titles`
		set `" . LANGUAGE . "` = '" . trim("$props[0]") . "'
		where `number` = '$i'
		and lecture = $lecture;\n\n";


		/*
		$values .= "update `titles`
		set `" . LANGUAGE . "` = '" . trim("$val") . "'
		where `number` = '$i'
		and `lecture` = '$lecture';\n\n";

		*/

	break;


}

}

return "<br>\n\nINSERT INTO
`titles` (lecture, number, timestamp, english) values
$values

update `titles` set `" . LANGUAGE . "` = `english` where `" . LANGUAGE . "` like '%xxx%' and `lecture` = " . LECTURE . " AND `english` != '';

UPDATE `titles` 
SET `" . LANGUAGE . "` = concat(`" . LANGUAGE . "`,'.') 
where `lecture` = '" . LECTURE . "' 
and `english` like '%.%' 
and `" . LANGUAGE . "` not like '%.%';

UPDATE `titles` 
SET `" . LANGUAGE . "` = concat('>> ',`" . LANGUAGE . "`) 
where `lecture` = '" . LECTURE . "' 
and `english` like '%>>%' 
and `" . LANGUAGE . "` not like '%>>%';


UPDATE `titles` 
SET `" . LANGUAGE . "` = replace(`" . LANGUAGE . "`, ',.', '.')
where `lecture` = '" . LECTURE . "' 

";

}


function insertRussianTitles($titles) {

	foreach ($titles as $key=>$val) {

	$i++;

	$values .= "update titles set `" . LANGUAGE . "` = '$val' where number = $i;\n\n";

	}

	return "INSERT INTO
	`titles` (number, english) values
	$values ";

}

function generateTitles($link, $action="") {

// AND INSTR('.', `russian`) = 0 // in a case to show lines without dot

$sql = "SELECT * FROM `titles` WHERE lecture ='" . LECTURE . "'";
// $sql = "SELECT * FROM `titles` WHERE `english` LIKE '%..%' and lecture ='" . LECTURE . "'";
// $sql = "SELECT * FROM `titles` WHERE `english` LIKE '%>>%' and lecture ='" . LECTURE . "'";
// $sql = "SELECT * FROM `titles` WHERE INSTR('.', `english`) = 0 and lecture ='" . LECTURE . "'";

$sql1 = "UPDATE `titles` 
SET `" . LANGUAGE . "` = concat(`russian`,'.') 
where `lecture` = '" . LECTURE . "' 
and `english` like '%.%' 
and `" . LANGUAGE . "` not like '%.%'";


	$sql_res = mysqli_query($link, $sql);
	$num_rows = mysqli_num_rows($sql_res);

echo "<tr><td>Subtitles </td><td><b>$num_rows</b></td><tr>\n\n";

	for ($i=0; $i<$num_rows; $i++) {
		$row = mysqli_fetch_array($sql_res);

		$language = LANGUAGE;

	switch ($action) {

	default:

		$values .= "$row[number]\n$row[timestamp]\n" . trim($row[$language]) . "\r\r\n";
		break;

	case "plainText":

		$values .= trim($row[$language]) . "\n";
		break;

	case "compareVersions":

		if (substr_count($row['russian'], '.') === 0) {

			$values .= "<tr>
			<td>$row[number]</td>
			<td>" . $newstring = substr(trim($row['english']), -20, 20) . "</td>
			<td>" . $newstring = mb_substr(trim($row['russian']), -40, 40) . "</td>
			</tr>
			";

		}

		break;

	}

}

// $values = "<br>total chars: ". strlen($values) . "<br><br>\n\n" . $values;

return $values;

}

function displayTextAs($content, $type="") {

	$srch = array("\n", "\r", "  ");
	$content = str_replace($srch," ", $content);

	$srch = array(". ", "? ", ">>", "\n\n\n\n");
	$rplc = array(".\n\n", "?\n\n", "\n\n>>", "\n\n");

	$content = str_replace($srch, $rplc, $content);

	switch ($type) {

		default:
		break;

		case "split":
		$preContent = str_split($content, 2500);

		$content = "";

		foreach ($preContent as $key=>$val) { $i++; $content.="\n\n\n\nPart $i:\n\n$val"; }

		break;

	}

	return $content;

}



// echo "total rows found $sql_res";

switch($_GET['page']) {

	default:

		echo generateTitles($link);
		break;

	case "plainText";

		$content = generateTitles($link, "plainText");

		$lines_arr = preg_split('/\n/',$content);
		$num_newlines = count($lines_arr);
		echo "<table><tr><td>Source lines </td><td><b>$num_newlines</b></td><tr></table>\n\n";
		// echo $content;
		echo displayTextAs($content);
		break;

	case "compareVersions":

		echo "<table border='1'>" . generateTitles($link, "compareVersions") . "</table>";
		break;

	case "countLines":

		echo countLines($fileName);
		break;

	case "updateRussianEditedTitles":

		echo insertOriginalTitles($titles, LECTURE, 'updateRussianFirstTime');
		break;

	case "insertOriginal":

	 echo insertOriginalTitles($titles,LECTURE);

	break;

}