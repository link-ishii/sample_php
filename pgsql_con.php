<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head><title>PostgreSQL 9.2_PHP TEST</title></head>
<body>
●PostgreSQL 9.2接続テスト(PHP)
<?php

$conn = "host=***.***.***.*** dbname=*** user=****** password=***";
$link = pg_connect($conn);
if (!$link) {
    die('接続失敗です。'.pg_last_error());
}
pg_set_client_encoding("UNICODE");
echo "<table border='1'>\n";


$result = pg_query('SELECT * FROM m01tokuisaki order by tokuisaki_cd');
if (!$result) {
    die('クエリーが失敗しました。'.pg_last_error());
}

for ($i = 0 ; $i < pg_num_rows($result) ; $i++){
    $row = pg_fetch_array($result);
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

$close_flag = pg_close($link);

if ($close_flag){
echo "</table>\n";
}

?>
</body>
</html>