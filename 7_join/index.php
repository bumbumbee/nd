<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

function getDB()
{
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "baltic";
    $dsn = "mysql:host=$host;dbname=$db";
    return new PDO($dsn, $user, $password);
}

$sql = "
SELECT g.name AS perfume_group, 
sg.name AS perfume_subgroup 
FROM perfume_group g
LEFT JOIN perfume_subgroup sg 
ON sg.parent_id = g.id";

$data = getDB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<form action="" method="post">
    Select perfume category:
    <select style="margin-left: 56px" name="category" id="">
        <option value="1">aromatic</option>
        <option value="2">floral</option>
        <option value="3">leather</option>
        <option value="4">oriental</option>
        <option value="5">woody</option>
    </select> <br>
    Enter perfume subcategory name:
    <input type="text" name="sub_category" required>
    <input type="submit" value="Add to list">
</form>
<br>


<?php
$sub_category = null;
if (isset($_POST['sub_category'])) {
    $parent_id = $_POST['category'];
    $sub_category_name = $_POST['sub_category'];

    storeCategories(['name' => $sub_category_name, 'parent_id' => $parent_id]);
    echo $sub_category_name." added new sub category for category with ID " . $parent_id . "<br>";
}

function storeCategories($data)
{
    $sql = "INSERT INTO perfume_subgroup (name, parent_id) VALUES (:name, :parent_id)";
    $sth = getDb()->prepare($sql);
    $sth->execute([
        "name" => $data['name'],
        "parent_id" => $data['parent_id']
    ]);
    return $sth->rowCount();
}

?>

<ul>Perfume groups and subcategories (refresh list <a href="">here</a> to see your update)
    <?php
    $one = array();
    foreach ($data as $group): ?>
        <li style="list-style-type: none; font-weight: bold; text-transform: capitalize"> <?php
            if ($one != $group['perfume_group']):
                echo $group['perfume_group'];
                $one = $group['perfume_group'];

            endif;
            ?>
            <ul>
                <li style="font-weight: normal; font-style: italic"> <?php echo $group['perfume_subgroup'] ?> </li>
            </ul>
        </li>

    <?php endforeach ?>
    <br>
    <?php var_dump($data) ?>
</ul>


<br>


</body>
</html>


