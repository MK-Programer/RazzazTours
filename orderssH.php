<?php
include'adminmenu.php';
session_start();
  if( $_SESSION["Logged_in_UTID"] == 2) {
    die("Forbidden");
  }

?>

<!DOCTYPE html>
<html>
<?php
include 'classes/Admin.php';
$Admin = new Admin();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
  <?php
  include('DB.php');
   ?>

  <style>
  #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;  
  margin-top:20px;  
  margin-left: 70px;              
  }
  #customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;      
  }
  #customers tr:nth-child(even){background-color: #ddd;}
  /*#customers tr:hover {background-color: #ddd;}*/
  #customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #dddddd;
  color: black;
  }    
  a{
  text-decoration: none;
  }
  .h{
	margin-top: 150px;
	text-align:center;
  }   
  .text{
    margin-top: 10px;  
    width:300px;   
    height:40px;  
    border-radius: 10px;
    margin-left: -15px;  
    font-family: Arial, Helvetica, sans-serif;  
    font-size: 16px;  
  }
  .success{
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 28px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;     
  } 
  .failure{
    background-color: #f44336; /* Red */
    border: none;
    color: white;
    padding: 10px 22px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;     
  }  
    .success:hover{
    cursor: pointer;
   } 
    .failure:hover{
    cursor: pointer;
   }   
        
  </style>
<div class = "h"> <h1> Users Informations </h1><input type = "text" class = "text"><span class="fas fa-search" style = "margin-left: 20px; margin-left:-30px;"></span> </div>
</head>

<body style = "background: #668B91;">
	
<table class="mx-auto" id="customers">
  
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Number</th>
      <th scope="col">User Type ID</th>
      <th scope="col">Users Types </th>
      <th scope="col">Delete </th>
    </tr>

  <tbody>
    <?php
     
 
       $query = "SELECT * FROM orders";
       $result = mysqli_query($conn,$query);
       

		while($row = $result -> fetch_array(MYSQLI_ASSOC)) {     
                
		    $id = $row['id'];
		    $fname = $row['user_id'];
		    $lname = $row['order_placed'];
		    $email = $row['pid'];  
		    $gender = $row['price'];  
		?>
	<tr>
		<td><?php echo $id; ?>  <input type="hidden" value="<?php echo $id; ?>"></td>
		<td><?php echo $fname; ?></td>
		<td><?php echo $lname; ?></td>
        <td><?php echo $email; ?></td> 
        <td><?php echo $gender; ?></td> 
        <td><?php echo $num; ?></td>
	</tr>
	<?php
    }
    ?>
  
  
  
  </tbody>
</table>







</body>

</html>