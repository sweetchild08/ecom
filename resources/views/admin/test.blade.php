<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="http://localhost:8080/api/user" method="post" enctype="multipart/form-data">
    @csrf
    <!-- <input type="file" name="images[]" id="" multiple> -->
    <input type="text" name="username">
    <input type="text" name="password   ">
    <button type="submit">submit</button>
    </form>
</body>
</html>