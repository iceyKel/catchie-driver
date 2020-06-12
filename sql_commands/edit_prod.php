

  <form action="item_add/image_upload.php" method="POST"  enctype="multipart/form-data">
    <div class="form-group">
      <label for="prdname">Product name:</label>
      <input type="text" class="form-control" id="prdname" placeholder="Product name" name="prdname">
    </div>
    <div class="form-group">
      <label for="descp">Description:</label>
      <input type="text" class="form-control" id="descp" placeholder="Description" name="descp">
    </div>
    <div class="form-group">
      <label for="qy">Qty.</label>
      <input type="number" class="form-control" id="qty" placeholder="Quantity" name="qty">
    </div>
    <div class="form-group">
      <label for="prce">Price:</label>
           <input type="text" class="form-control" id="prce" placeholder="Price" name="prce">
    </div>

     <div class="form-group">
      <label for="sel1">Select store:</label>
      <select class="form-control" id="sel1" name = 'store'>
      <?php
      include 'config.php';

      	    $sql="SELECT * FROM tblstore";
			$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result)) {	
				$storeid = $row['store_id'];
				$storename = $row['store_name'];
		
   				echo "<option>".$storename."</option>";
 

				}

      ?>
      </select>
 	</div>

 	<div class="form-group">
      <label for="fileToUpload">Upload Photo:</label>
       <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
    </div>
 	

    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>



