<?php
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>';

echo '<script>$(":checkbox").prop(\'checked\', false).parent().removeClass(\'active\');</script>';

echo '<form class="mx-5" id="myForm" onsubmit="return false">';
echo '    <div class="form-group">';
echo '        <label for="name">Name</label>';
echo '        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">';
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

echo '    <button type="submit" name="submit" " class="btn btn-primary">Add Product</button>';
echo '</form>';

?>

<script>
    $(document).ready(function () {
        $("#myForm").submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this);

            $.ajax({
                url: "addProducts.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#load").html(response);
                    $("#myForm")[0].reset();
                    $(":checkbox").prop("checked", false).parent().removeClass("active");
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });
    });
</script>