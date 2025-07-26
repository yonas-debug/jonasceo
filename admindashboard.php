<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <h2>Registered Users</h2>
        <table id="userTable">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                //Basic admin check
                $_SESSION['admin'] = 1;
                if (!isset($_SESSION['admin'])) {
                    die("Unauthorized");
                }

                $users = file("../php/users.txt", FILE_IGNORE_NEW_LINES);

                foreach ($users as $user) {
                    list($fullName, $email, $password) = explode(",", $user);
                    echo "<tr>";
                    echo "<td>$fullName</td>";
                    echo "<td>$email</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
