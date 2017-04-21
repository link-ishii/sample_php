<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head><title>MySQL5.7_PHP TEST</title></head>
<body>
●MySQL5.7接続テスト(PHP)
<?php

$link = mysql_connect('***.***.***.***', '******', '******');
if (!$link) {
    exit('データベースに接続できませんでした。');
}
echo "<table border='1'>\n";

$result = mysql_select_db('linkdb', $link);
if (!$result) {
  exit('データベースを選択できませんでした。');
}

$result = mysql_query('SET NAMES utf8', $link);

$result = mysql_query('SELECT * FROM m01tokuisaki order by tokuisaki_cd',$link);

while ($row = mysql_fetch_array($result)){
    echo "<tr>\n";
	echo "    <td>" .$row[0]."</td>\n";
    echo "    <td>" .$row[1]."</td>\n";
    echo "    <td>" .$row[2]."</td>\n";
    echo "    <td>" .$row[3]."</td>\n";
    echo "    <td>" .$row[4]."</td>\n";
    echo "    <td>" .$row[5]."</td>\n";
    echo "    <td>" .$row[6]."</td>\n";
    echo "    <td>" .$row[7]."</td>\n";
    echo "    <td>" .$row[8]."</td>\n";
    echo "    <td>" . date('Y-m-d',strtotime($row[9]))."</td>\n";
    echo "    <td>" .date('Y-m-d',strtotime($row[10]))."</td>\n";
    echo "</tr>\n";

}

$con = mysql_close($link);

if (!$link) {
  exit('データベースとの接続を閉じられませんでした。');
}

echo "</table>\n";


?>
</body>
</html>