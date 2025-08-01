<?php
$dsn = 'mysql:dbname=e26gglq2f8je6dvj;host=am1shyeyqbxzy8gc.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;charset=utf8mb4';
$user = 'lj6ecx8h4ys6o0dk';
$password = 'nr0sr1of8azdndu8';
// mysql: //lj6ecx8h4ys6o0dk:nr0sr1of8azdndu8@am1shyeyqbxzy8gc.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/e26gglq2f8je6dvj

try {
  $pdo = new PDO($dsn, $user, $password);

  $sql_delete = 'DELETE FROM books WHERE id = :id';
  $stmt_delete = $pdo->prepare($sql_delete);

  $stmt_delete->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

  $stmt_delete->execute();

  $count = $stmt_delete->rowCount();

  $message = "書籍を{$count}件削除しました。";

  header("Location:read.php?message={$message}");
} catch (PDOException $e) {
  exit($e->getMessage());
}
