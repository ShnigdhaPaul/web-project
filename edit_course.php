<?php
    include 'admin_header.php';
    require_once 'controllers/CourseController.php';
	require_once 'controllers/CategoryController.php';
	$categories=getAllCategories();
	$id=$_GET["id"];
	$c=getCourse($id);
	
	
	
    
?>
<html>
	<head>
	
	</head>
		
	<h5><?php echo $err_db;?></h5>
	<body>
		<form  action=""  method="post">
		

		<fieldset>
		<h1>Course Edit</h1>
			<table>
				<tr>
					<td>Name</td>
					<input type="hidden" name="id" value="<?php echo $c["id"]; ?>" >
					<td>: <input type="text" id="name" name="name" value="<?php echo $c["name"]; ?>" > </td>
					<td><span id="err_name"> <?php echo $err_name;?> </span></td>
             	</tr>
		       <tr>
				    <td>Category:</td>
					
					<td><select id="ca_id" name="ca_id" value="<?php echo $ca_id; ?>">
					<option selected disabled>Choose Deparment</option>
					<?php
					  foreach($categories as $ca){
						
						echo "<option value='".$ca["id"]."'>".$ca["name"]."</option>";
					}
					?>
					</select>
					</td>
					<td><span id="err_ca_id"> <?php echo $err_ca_id;?> </span></td>
				</tr>
				<tr>
				    <td>Duration</td>
					<input type="hidden" name="id" value="<?php echo $c["id"]; ?>" >
					<td>: <input type="text" id="duration" name="duration" value="<?php echo $c["duration"]; ?>" > </td>
					<td><span id="err_duration"> <?php echo $err_duration;?> </span></td>
				</tr>
				<tr>
					<td>Price</td>
					<input type="hidden" name="id" value="<?php echo $c["id"]; ?>" >
					<td>: <input type="text" id="price" name="price"  value="<?php echo $c["price"]; ?>"> </td>
					<td><span id="err_price"> <?php echo $err_price;?> </span></td>
				</tr>
				
				
				
				<tr>
					<td colspan="2" align="right"> <input type="submit" name="edit_course" value="Edit Course"> </td>
					
				</tr>
				</table>
			
			
			
		</fieldset>
			

		</form>
	</body>
</html>
