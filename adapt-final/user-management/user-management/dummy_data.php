<?php
include 'config.php';
require_once 'faker/autoload.php';

// Delete data from users
$query = 'DELETE from users;ALTER TABLE users AUTO_INCREMENT = 1';
$statement = $db->prepare($query);
$statement->execute();

$status = array('enable','disable');
$emailVerified = array('yes', 'no');
 // Set password
$password = '123456';

if($encryptionType == 'sha1') {
    $password = sha1($password);

} else {
    $password = md5($password);
}
$currentDate = date('Y-m-d H:i:s');

    $query  = 'INSERT INTO `users` SET name = ?, username=?, password=?, email = ?, status=?, email_verified = ?';
    $parameters = array('Ajay', 'demo', $password, 'demo@demo.com', 'enable','yes');
    $statement = $db->prepare($query);
    $statement->execute($parameters);
// For inserting 20 records
for($i = 1; $i <= 20; $i++) {
    $faker = Faker\Factory::create();
    $query      = 'INSERT INTO `users` SET name = ?, username=?, password=?, email = ?, status=?, email_verified = ?';
    $parameters = array($faker->name, strtolower($faker->firstName), $password, $faker->email, $faker->randomElement(['enable', 'disable']),$faker->randomElement(['yes', 'no']) );

    $statement = $db->prepare($query);
    try {
        $statement->execute($parameters);
        $output['type'] = 'success';
        $output['msg']  = 'Data successfully inserted';
    } catch (Exception $e) {
        $output['type'] = 'danger';
        $output['msg']  = $e;
    }
}
echo json_encode($output);
?>
