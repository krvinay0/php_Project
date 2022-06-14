<?php
include ('../connection.php');

$updatinguser_sql='UPDATE user SET email="vinay@gmail.com" where id="1"';
$conn->query($updatinguser_sql);

$alteruser_add='ALTER TABLE user ADD last_name VARCHAR(250) AFTER first_name';
$conn->query($alteruser_add);
$updatingl_name='UPDATE user SET last_name="Kumar" where id="1"';
$conn->query($updatingl_name);

$view_creation = 'CREATE VIEW user_view AS SELECT id,email,password FROM user WHERE id="1"';
$conn->query($view_creation);
	

$join_tables ='SELECT * FROM user INNER JOIN user_type ON user.id=user_type.user_id';
$result = $conn->query($join_tables)->fetch_assoc();


print_r($result);

?>