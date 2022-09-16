<?php
//kết nối vào CSDL 
$conn = mysqli_connect('localhost', 'root', '', 'heheeh');
if (!$conn) {
    echo mysqli_connect_error();
}
$rs = mysqli_query($conn, "SELECT *,quan_ao.id as quan_ao_id,quan_ao.name as quan_ao_name,category.name as category_name FROM quan_ao INNER JOIN category ON quan_ao.category_id=category.id");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>price</th>
                <th>description</th>
                <th>avatar</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
        <?php while($quanao = mysqli_fetch_assoc($rs)) : ?>
            <tr>
            <td><?php echo $quanao['quan_ao_id']; ?></td>
            <td><?php echo $quanao['quan_ao_name']; ?></td>
            <td><?php echo $quanao['price']; ?></td>
            <td><?php echo $quanao['description']; ?></td>
            <td><img src="<?php echo $quanao['avatar']; ?>" alt=""></td>
            <td>
                <a href="delete.php?id=<?php echo $quanao['quan_ao_id']; ?>">Xóa</a>
                <a href="update.php?id=<?php echo $quanao['quan_ao_id']; ?>">Sửa</a>
            </td>
            <?php endwhile ?></tr>
        </tbody>
    </table>
    </body>
</html>