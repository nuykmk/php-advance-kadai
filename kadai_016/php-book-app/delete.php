<?php
$dsn = 'mysql:dbname=yx8nwp8vjv54wax9;host=am1shyeyqbxzy8gc.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;charset=utf8mb4';
$user = 'o3i1el0thl2y6ehy';
$password = 'qpzv2zo8ic3a3ll2';
// mysql: //o3i1el0thl2y6ehy:qpzv2zo8ic3a3ll2@am1shyeyqbxzy8gc.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/yx8nwp8vjv54wax9

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
