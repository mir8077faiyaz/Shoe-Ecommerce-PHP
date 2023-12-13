<?php
echo '
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#myForm").submit(function(e){
            e.preventDefault();
            var formData= new FormData(this);
            $.ajax({
                url:\'addProducts.php\',
                type: \'POST\',
                data: {
                    formData,
                    PID:'.$_POST['PID'].',
                },
                processData: false,  // Don\'t process the data
                contentType: false,  // Don\'t set content type (browser will set it automatically)
                success: function(response){
                    console.log(response);
                    $("#mytable").html(response);
                },
                error: function (error) {
                    console.error(error);
                }     
            });
        });  
    });
</script>
';

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
$allSizes = ["4", "5", "6", "7", "8", "9"];
echo gettype($size);

$sizes= explode(", ",$size);
print_r($sizes);
// echo '<script>';
// echo '    $(":checkbox").prop(\'checked\', false).parent().removeClass(\'active\');';
// echo '</script>';

echo '<form class="mx-5" id="myForm" onsubmit="return false">';
echo '    <div class="form-group">';
echo '        <label for="name">Name</label>';
echo '        <input type="text" class="form-control" id="name" placeholder="Enter name" value="'.htmlspecialchars($name, ENT_QUOTES, 'UTF-8').'" name="name">';
echo '    </div>'; 

echo '    <div class="form-group">';
echo '        <label for="price">Price</label>';
echo '        <input type="number" class="form-control" id="price" placeholder="Price" value="'.htmlspecialchars($price, ENT_QUOTES, 'UTF-8').'" name="price">';
echo '    </div>';
echo '    <p>Select Size:</p>';

echo '    <div class="form-check-inline">';
foreach ($allSizes as $size) {
    echo '<label class="form-check-label mx-2" for="check' . $size . '">';
    echo '<input type="checkbox" class="form-check-input" id="check' . $size . '" name="options[]" value="' . $size . '"';
    
    // Check if the size is in the $sizes array
    if (in_array($size, $sizes)) {
        echo ' checked';
    }

    echo '>';
    echo $size;
    echo '</label>';
}
echo '    </div>';


echo '    <div class="form-group">';
echo '        <label for="desc">Description</label>';
echo '        <textarea class="form-control" id="desc" rows="3" name="desc" placeholder="Description" >'.$desc.'</textarea>';
echo '    </div>';


echo '    <div class="form-group">';
echo '        <label for="img">Image</label>';
echo '        <input type="file" class=" form-control btn-sm pb-3" id="img" placeholder="Image" name="img">';
echo '        <p>Previously selected File: ' . $img . '</p>';
echo '    </div>';


echo '    <button type="submit" name="submit" class="btn btn-primary">Update Product</button>';
echo '</form>';

?>