<?php

include("connect.php");//連結資料庫

mysqli_query($link,"SET CHARACTER SET UTF8");//php讀取資料庫中文編碼問題

$SQL="SELECT * FROM customer";//SQL查詢
$result = mysqli_query($link, $SQL);

echo "資料表: customer<br/>";
$total_fields = mysqli_num_fields($result);// 取得欄位數
echo "欄位數: $total_fields 個  ";
$total_records = mysqli_num_rows($result);// 取得記錄數
echo "記錄數: $total_records 筆  ";

echo "<div class=table-responsive>";
echo "<table class=table table-striped table-sm>";
echo "<thead>";
echo "<tr>";
// 顯示欄位名稱
while ( $meta = mysqli_fetch_field($result) )
   echo "<th>".$meta->name."</th>";

echo "</tr>";
echo "</thead>";

echo "<tbody>";
 // 取得欄位數
$total_fields = mysqli_num_fields($result);
// 顯示每一筆記錄
while ($row = mysqli_fetch_row($result)) {
   echo "<tr>"; // 顯示每一筆記錄的欄位值
   for ( $i = 0; $i <= $total_fields-1; $i++ )
      echo "<td>" . nl2br($row[$i]) . "</td>";
   echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "</div>";

mysqli_free_result($result); // 釋放佔用記憶體 
 

?>