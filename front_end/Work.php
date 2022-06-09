<?php
    session_start(); 
    require_once ('Connect.php');
?>
<?php
    $hostname="localhost";
    $username="root";
    $password="123456789";
    $database="job";
    $link = mysqli_connect($hostname,$username,$password);
    mysqli_query($link,"SET NAMES 'UTF8'");
    mysqli_select_db($link,$database) or die ("無法選擇資料庫"); 
    $sql = "SELECT job_name,salary,company,job_loc,job_time FROM jobtable";
    $result = mysqli_query($link,$sql) or die ("無法送出".mysqli_error($link)); // 為什麼吃不到link
    $job_table = "";

	$row = mysqli_num_rows($result);
	$col = mysqli_num_fields($result);

	$job_table .= "查詢結果有 ". $row ." 筆";
	$job_table .= ", 包含 ". $col ." 個欄位。";
	$job_table .= '</br></br></br>';
	$job_table .= "<table border='1' align='center'><tr align='center'>";

	while($fieldinfo = mysqli_fetch_field($result)) {
		$job_table .= "<td>". $fieldinfo->name ."</td>";
	}

	while($content = mysqli_fetch_assoc($result)) {
		$job_table .= "<tr>";
		$name = $content['job_name'];
		$job_table .= "<td>" . $name . "</td>";

		$salary = $content['salary'];
		$job_table .= "<td>" . $salary . "</td>";

		$company = $content['company'];
		$job_table .= "<td>" . $company . "</td>";

		$loc = $content['job_loc'];
		$job_table .= "<td>" . $loc . "</td>";

		$time = $content['job_time'];
		$job_table .= "<td>" . $time . "</td>";

	

		$job_table .= "</tr>";
	}

    mysqli_free_result($result);
    //mysqli_close($link);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>資料庫</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="top">
            
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.top').load('top_bar.html');
            });
        </script>
        <div style="background-color:#E0E0E0;width:770px;height:100%;position:absolute;top:17%;left:18%;">
            <div style="margin:35px 50px;">
               <?php
                    echo $job_table
                ?>
            </div>
        </div>
    </body>
</html>