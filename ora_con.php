<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head><title>Oracle11gXE_PHP TEST</title></head>
●Oracle11gXE接続テスト(PHP)
<?php
ini_set("display_errors", On);
//ORACLE_HOMEの指定
putenv("ORACLE_HOME=/u01/app/oracle/product/11.2.0/xe");
//接続（文字コードをAL32UTF8と明示しないと文字化けになる
$conn = oci_connect('******', '******', '******/XE', 'AL32UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$stid = oci_parse($conn, 'SELECT * FROM M01tokuisaki order by 得意先コード');
oci_execute($stid);
echo "<table border='1'>\n";
$i = 0;
//while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
while (($row = oci_fetch_row($stid)) != false) {
    echo "<tr>\n";
    //foreach ($row as $item) {
    //    echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    //}
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
    $i ++;
}
echo "</table>\n";

?>