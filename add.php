<?php 
$conn = mysqli_connect('localhost','root','','heheeh');
if(!$conn){
    echo mysqli_connect_error();
}
$categoryRS = mysqli_query($conn,"SELECT *FROM category");
if(isset($_FILES['avatar']) && $_FILES['avatar']['name']){
    $duongdanAnh = 'upload/'. time(). $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'],'$duongdanAnh');
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $descrition = $_POST['description'];
    mysqli_query($conn,"INSERT INTO quan_ao(name,price,description,category_id,avatar)values('$name','$price','$descrition','$category_id','$duongdanAnh')");
    echo mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="">nhập tên quần áo</label>
                    <input type="text" name="name" placeholder="nhập tên sinh viên">
                </td>
                <td>
                    <label for="">nhập giá</label>
                    <input type="text" name="price" placeholder="nhập giá">
                </td>
                <tr>
                <td>
                    <label for="">Miêu tả</label>
                    <textarea name="description" placeholder="nhập gì đó"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="file" name="avatar">
                </td>
            </tr>
                <td>
                <label>category_id</label>
                        <select name="category_id">
                            <?php while ($category = mysqli_fetch_assoc($categoryRS)) : ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>        
                            <?php endwhile ?>
                        </select>
                </td>
            </tr>
            <tr>
                <td>
                    <button>thêm mới</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</body>
</html>