Flight::route('POST /login', function () {
$conn = Flight::db();

$email = Flight::request()->query->email;
$pass = Flight::request()->query->pass;

header('Content-type: application/json');

$sql = "SELECT `user_email`, `user_password` FROM `users` WHERE `user_email` = ?";

$stmt = $conn->prepare($sql);
$stmt->execute([$email]);

$results = $stmt->rowCount();

if ($results > 0) {
while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
if ($row[0]['user_email'] == $logEmail) {
if (password_verify($passLog, $row[0]['user_password'])) {
echo ('logged');
session_start();
$_SESSION["email"] = $row[0]['user_email'];
} else {
echo (json_encode('password'));
}
}else {
echo (json_encode('email'));
}
}
} else {
echo (json_encode('mail'));
}
});