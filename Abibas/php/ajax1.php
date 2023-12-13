<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
        border: 1px solid;
        }
        input{
            margin:5px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myform").submit(function(e){
                e.preventDefault();
                var formData= new FormData(this);
                $.ajax({
                    url:'ajax2.php',
                    type: 'POST',
                    data: formData,
                    processData: false,  // Don't process the data
                    contentType: false,  // Don't set content type (browser will set it automatically)
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
</head>
<body>
    <form id="myform" onsubmit="return false">
        <label for="myname">Name:</label>
        <input type="text" name="name" id="myname">
        <br>
        <label for="mynumber">Number:</label>
        <input type="text" name="number" id="mynumber">
        <br>
        <button type="submit">Save</button>

    </form>

    <table style="border: 2px;" id="mytable">
       
    </table>
</body>
</html>