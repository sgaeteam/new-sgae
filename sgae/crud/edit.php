<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Data</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  </head>

<body>
 <?php
function __autoload($class){
	include_once($class.".php");
	
}
  $obj=new oopCrud;

if(isset($_REQUEST['update'])){
	extract($_REQUEST);
	if($obj->update($id,$nome,$email,$login,"usuario")){
		header("location:show.php?status=success");	
	}
	
}

extract($obj->getById($_REQUEST['id'],"usuario"));
echo <<<show
<div class="container">
  <div class="btn-group">
    <button class="btn"><a href="show.php">Home</a></button>
  </div>
  <h3>Edit Your Data</h3>
  <form action="edit.php" method="post">
  	<table width="500" border="1">
  	<tr>
      <th scope="row">Id</th>
      <td><input type="text" name="id" value="$id" readonly="readonly"></td>
    </tr>
    <tr>
      <th scope="row">Nome</th>
      <td><input type="text" name="nome" value="$nome"></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><input type="text" name="email" value="$email"></td>
    </tr>
    <tr>
      <th scope="row">Login</th>
      <td><input type="text" name="login" value="$login"></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><input type="submit" name="update" value="Update" class="btn"></td>
    </tr>
  </table>
  </form>
</div>
show;
?>

</body>
</html>