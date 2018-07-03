<?php
$host="localhost";
$db="appnotraise";
$username="testuser";
$pass="inspiron5520";

$connection=new mysqli($host,$username,$pass,$db);

$data= array();
$fid=$_REQUEST['f_id'];
//echo $fid;
$result=$connection->query("SELECT * FROM cumulative WHERE f_id={$fid}");

//print_r($connection);
if($result&&$result->num_rows >= 1) {
  $row=$result->fetch_assoc();
}
$emp_id=$connection->query("SELECT * FROM form WHERE f_id={$fid}");
if($emp_id&&$emp_id->num_rows >= 1){
  $empid_data=$emp_id->fetch_assoc();
}
$eid=$empid_data['e_id'];
$emp_result=$connection->query("SELECT * FROM staff where e_id='{$eid}'");
//print_r($emp_result);
if($emp_result&&$emp_result->num_rows >= 1) {
  $emp_data =$emp_result->fetch_assoc();
}
?>
<html>
<head>
  <title>Export to XLS</title>
  <style>
  #f1-table{
    border-collapse:collapse;
  }
  #f1-table > tr, th, td {
    border:1px solid black;
    padding:5px;
  }

  #btnExport{
    font-weight: bold;
  }
  </style>
  <!-- <link rel="stylesheet" href="css/pdf-page.css" /> -->
    <script>
    function fnExcelReport()
    {
        var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
        var textRange; var j=0;
        tab = document.getElementById('f1-table'); // id of table

        for(j = 0 ; j < tab.rows.length ; j++)
        {
            tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
            //tab_text=tab_text+"</tr>";
        }

        tab_text=tab_text+"</table>";
        tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
        tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
        tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
        {
            txtArea1.document.open("txt/html","replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus();
            sa=txtArea1.document.execCommand("SaveAs",true,"It works.xls");
        }
        else                 //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

        return (sa);
    }


    </script>
</head>
<body>
  <center>
  <table id="f1-table">
    <tr>
      <th>Employee Name</th>
      <th>Column 1</th>
      <th>Column 2</th>
      <th>Column 3</th>
      <th>Column 4</th>
      <th>Column 5</th>
      <th> Column 6</th>
    </tr>
    <tr>
      <td><?php echo $emp_data['name'] ?></td>
      <td><?php echo $row['r_1'] ?></td>
      <td><?php echo $row['r_2'] ?></td>
      <td><?php echo $row['r_3'] ?></td>
      <td><?php echo $row['r_4'] ?></td>
      <td><?php echo $row['r_5'] ?></td>
      <td><?php echo $row['r_6']?></td>
    </tr>
  </table></br>
  <button id="btnExport" onclick="fnExcelReport();" >Export to Excel</button>
</center>
</body>
</html>
