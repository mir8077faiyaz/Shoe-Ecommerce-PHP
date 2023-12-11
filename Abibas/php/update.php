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


echo '<script>';
echo '    $(":checkbox").prop(\'checked\', false).parent().removeClass(\'active\');';
echo '</script>';

echo '<form class="mx-5" method="post" action="">';
echo '    <div class="form-group">';
echo '        <label for="name">Name</label>';
echo '        <input type="text" class="form-control" id="name" placeholder="Enter name" value=\'$name\' name="name">';
echo '    </div>';

echo '    <div class="form-group">';
echo '        <label for="price">Price</label>';
echo '        <input type="number" class="form-control" id="price" placeholder="Price" name="price">';
echo '    </div>';
echo '    <p>Select Size:</p>';

echo '    <div class="form-check-inline">';
echo '        <label class="form-check-label mr-2" for="check1">';
echo '            <input type="checkbox" class="form-check-input" id="check1" name="options[]" value="4" checked>4';
echo '        </label>';
echo '        <label class="form-check-label mx-2" for="check2">';
echo '            <input type="checkbox" class="form-check-input" id="check2" name="options[]" value="5" checked>5';
echo '        </label>';
echo '        <label class="form-check-label mx-2" for="check3">';
echo '            <input type="checkbox" class="form-check-input" id="check3" name="options[]" value="6" checked>6';
echo '        </label>';
echo '        <label class="form-check-label mx-2" for="check4">';
echo '            <input type="checkbox" class="form-check-input" id="check4" name="options[]" value="7" checked>7';
echo '        </label>';
echo '        <label class="form-check-label mx-2" for="check5">';
echo '            <input type="checkbox" class="form-check-input" id="check5" name="options[]" value="8" checked>8';
echo '        </label>';
echo '        <label class="form-check-label mx-2" for="check6">';
echo '            <input type="checkbox" class="form-check-input" id="check6" name="options[]" value="9" checked>9';
echo '        </label>';
echo '    </div>';

echo '    <div class="form-group">';
echo '        <label for="desc">Description</label>';
echo '        <textarea class="form-control" id="desc" rows="3" name="desc" placeholder="Description"></textarea>';
echo '    </div>';

echo '    <div class="form-group">';
echo '        <label for="img">Image</label>';
echo '        <input type="file" class=" form-control btn-sm pb-3" id="img" placeholder="Image" name="img">';
echo '    </div>';
echo '    <button type="submit" name="submit" class="btn btn-primary">Add Product</button>';
echo '</form>';

?>