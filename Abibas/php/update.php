<?php
require "config.php";
$updateID=$_POST['PID'];
$sql="Select `name`, `price`, `size`, `description`, `image` FROM `product` where pid=$updateID";
$result=mysqli_query($db_connection,$sql);

$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$price=$row['price'];
$size=$row['size'];
$desc=$row['description'];
$img=$row['image'];


<script>
        $(":checkbox").prop('checked', false).parent().removeClass('active');
</script>
<form class="mx-5" method="post" action=''>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" value='$name' name="name">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" placeholder="Price" name="price">
    </div>
    <p>Select Size:</p>

    <div class="form-check-inline">
        <label class="form-check-label mr-2" for="check1">
            <input type="checkbox" class="form-check-input" id="check1" name="options[]" value="4" checked>4
        </label>
        <label class="form-check-label mx-2" for="check2">
            <input type="checkbox" class="form-check-input" id="check2" name="options[]" value="5" checked>5
        </label>
        <label class="form-check-label mx-2" for="check3">
            <input type="checkbox" class="form-check-input" id="check3" name="options[]" value="6" checked>6
        </label>
        <label class="form-check-label mx-2" for="check4">
            <input type="checkbox" class="form-check-input" id="check4" name="options[]" value="7" checked>7
        </label>
        <label class="form-check-label mx-2" for="check5">
            <input type="checkbox" class="form-check-input" id="check5" name="options[]" value="8" checked>8
        </label>
        <label class="form-check-label mx-2" for="check6">
            <input type="checkbox" class="form-check-input" id="check6" name="options[]" value="9" checked>9
        </label>
    </div>

    <div class="form-group">
        <label for="desc">Description</label>
        <textarea class="form-control" id="desc" rows="3" name="desc" placeholder="Description"></textarea>
    </div>

    <div class="form-group">
        <label for="img">Image</label>
        <input type="file" class=" form-control btn-sm pb-3" id="img" placeholder="Image" name="img">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
</form>

?>