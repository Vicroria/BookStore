<?php
function getPosts($connect)
{
    $posts = mysqli_query($connect, "SELECT * FROM books");
    $postsList = [];
    while ($post = mysqli_fetch_assoc($posts)) {
        $postsList[] = $post;
    }
    echo json_encode($postsList);
}
function getPost($connect, $id)
{
    $post = mysqli_query($connect, "SELECT * FROM books WHERE id = '$id'");
    if (mysqli_num_rows($post) === 0) {
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Post not found"
        ];
        echo json_encode($res);
    } else {

        $post = mysqli_fetch_assoc($post);
        echo json_encode($post);
    }
}
function addPost($connect, $data)
{

    $name = $data['name'];
    $author = $data['author'];
    $price = $data['price'];
    $description = $data['description'];
    mysqli_query($connect, "INSERT INTO books ( `name`, `author`,`price`, `description`) VALUES ('$name', '$author', '0' , '$description')");

    http_response_code(201);
    $res = [
        "status" => true,
        "post_id" => mysqli_insert_id($connect)
    ];

    echo json_encode($res);
}
function updatePost($connect, $id, $data)
{
    $name = $data['name'];
    $author = $data['author'];
    $price = $data['price'];
    $description = $data['description'];
    mysqli_query($connect, "UPDATE `books` SET `name` = '$name', `author` =' $author'  , `price` = '$price',  `description` = '$description' WHERE `books`.`ID` = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "messege" => "Post is updated"
    ];
    echo json_encode($res);
}
function deletePost($connect, $id)
{
    mysqli_query($connect, "DELETE FROM `books` WHERE `books`.`ID` = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "messege" => "Post is deleted"
    ];
    echo json_encode($res);
}
?>

/*class DB {

    protected $db;

    public function __construct()
    {
        try {
            $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
            $this->db = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME ,
                DB_USER,
                DB_PASSWORD,
                $options);
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function select($sql, $params = array(), $fetchMode = PDO::FETCH_OBJ, $class = '')
    {
        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $value) {
            if (is_int($value)) {
                $stmt->bindValue("$key", $value, PDO::PARAM_INT);
            } else {
                $stmt->bindValue("$key", $value);
            }
        }
        $stmt->execute();

        if (DEBUG) {
            $error_code = $stmt->errorInfo();
            if (isset($error_code[0]) and $error_code[0] == '00000'){
            } else {
                echo "\PDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                die();
            }
        }

        if ($fetchMode === PDO::FETCH_CLASS) {
            return $stmt->fetchAll($fetchMode, $class);
        } else {
            return $stmt->fetchAll($fetchMode);
        }
    }

    /
    public function one($sql, $array = array(), $fetchMode = PDO::FETCH_OBJ, $class = ''){
        $data = $this->select($sql, $array, $fetchMode, $class);
        return (isset($data[0])) ? $data[0] : null;
    }

    /
    public function insert($table, $data)
    {
        $data = (array) $data;
        ksort($data);

        $fieldNames = implode(',', array_keys($data));
        $fieldValues = ':'.implode(', :', array_keys($data));
        $stmt = $this->db->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        if (DEBUG) {
            $error_code = $stmt->errorInfo();
            if (isset($error_code[0]) and $error_code[0] == '00000'){
            } else {
                echo "\PDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                die();
            }
        }

        return $this->db->lastInsertId();
    }


    public function update($table, $data, $where)
    {
        $data = (array) $data;
        ksort($data);
        $fieldDetails = null;
        foreach ($data as $key => $value) {
            $fieldDetails .= "$key = :field_$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        $whereDetails = null;
        $i = 0;
        foreach ($where as $key => $value) {
            if ($i == 0) {
                $whereDetails .= "$key = :where_$key";
            } else {
                $whereDetails .= " AND $key = :where_$key";
            }
            $i++;
        }
        $whereDetails = ltrim($whereDetails, ' AND ');
        $stmt = $this->db->prepare("UPDATE $table SET $fieldDetails WHERE $whereDetails");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":field_$key", $value);
        }
        foreach ($where as $key => $value) {
            $stmt->bindValue(":where_$key", $value);
        }
        $stmt->execute();

        if (DEBUG) {
            $error_code = $stmt->errorInfo();
            if (isset($error_code[0]) and $error_code[0] == '00000'){
            } else {
                echo "\PDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                die();
            }
        }

        return $stmt->rowCount();
    }


    public function delete($table, $where, $limit = 1)
    {
        ksort($where);
        $whereDetails = null;
        $i = 0;
        foreach ($where as $key => $value) {
            if ($i == 0) {
                $whereDetails .= "$key = :$key";
            } else {
                $whereDetails .= " AND $key = :$key";
            }
            $i++;
        }
        $whereDetails = ltrim($whereDetails, ' AND ');
        //if limit is a number use a limit on the query
        if (is_numeric($limit)) {
            $uselimit = "LIMIT $limit";
        }

        $stmt = $this->db->prepare("DELETE FROM $table WHERE $whereDetails $uselimit");
        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        if (DEBUG) {
            $error_code = $stmt->errorInfo();
            if (isset($error_code[0]) and $error_code[0] == '00000'){
            } else {
                echo "\PDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                die();
            }
        }

        return $stmt->rowCount();
    }

*/
