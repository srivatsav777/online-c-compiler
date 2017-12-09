<html>
<head>
<title>Online Compiler </title>
</head>

<body>
<center><h1>RESULT </h1></center>
<center><textarea id="x" rows="30" cols="100" style="margin:0px 0px 10px 0px;"> </textarea></center>
<center><input type="button" value="BACK" onclick="location.href='oc.html';"></center>


</body>

</html>
<?php
$val=$_POST['x'];
$file = fopen("test.c","w+");
fwrite($file,$val);
fclose($file);
system("cf.bat ");
$file = fopen("op.txt","r");
if(filesize("op.txt")==0)
{
 echo "<script>document.getElementById('x').value='SUCCESSFUL';</script>";
}
else
{
$temp1=fread($file,filesize("op.txt"));

//$temp1=substr($temp1, 0, strpos($temp1, "C:\Users"));

$temp1=str_replace(":"," ",$temp1);
$temp1=trim($temp1);
$temp1=str_replace("'","",$temp1);
$temp1=str_replace(":","",$temp1);
$temp1=str_replace("function","",$temp1);
$temp1=str_replace("/\n+/","",$temp1);
$temp1=str_replace("/\r+/","",$temp1);
$temp1=str_replace("/\r\n/+","",$temp1);
$temp1=str_replace("^","",$temp1);
//$temp1=str_replace(" ","",$temp1);

$temp1=str_replace("/\x0B/","",$temp1);
$temp1=str_replace("/\0/","",$temp1);
$temp1=str_replace("/\t/","",$temp1);
$temp1=str_replace("/\$/","",$temp1);

$temp1=str_replace("/\t+/","",$temp1);

$temp1=str_replace("main()","",$temp1);
$temp1=stripslashes($temp1);
$temp1=str_replace("/\s\s+/","",$temp1);
$temp1=trim($temp1);
$temp1=str_replace("'","",$temp1);
$temp1=str_replace("'","",$temp1);
$temp1=str_replace("`","",$temp1);

$arr=explode(" ",$temp1);

//print_r($arr);
$arr1=array_map('trim',$arr);
//print_r($arr1);
$temp1=implode(" ",$arr1);

//echo $temp1;
echo "<script >var tt='$temp1'; document.getElementById('x').value=tt;</script>";
}
fclose($file); 
?>