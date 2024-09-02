<?php
    include ("./header.php");
    include ("./data/mydata.php");

    // Get the user ID from the session or any other method
    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid']; // Replace this with the actual user ID

        // Retrieve the current username and email from the database
        $sql = "SELECT username, email FROM users WHERE userid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($currentUsername, $currentEmail);
        $stmt->fetch();
        $stmt->close();

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newUsername = $_POST["username"];
            $newEmail = $_POST["email"];
            $newPassword = $_POST["password"]; // Will be empty if the password field is left blank

            // Update user data in the database
            $sql = "UPDATE users SET username = ?, email = ?";
            $params = [$newUsername, $newEmail];

            // Include the password update if provided
            if (!empty($newPassword)) {
                $sql .= ", password = ?";
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $params[] = $hashedPassword;
            }

            $sql .= " WHERE id = ?";
            $params[] = $userId;

            $stmt = $conn->prepare($sql);
            $stmt->bind_param(str_repeat("s", count($params)), ...$params);
            $stmt->execute();
            $stmt->close();
        }
    }

?>

    <div class="account-container">
        <h1 class="account-heading">My Account</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="account-form-group">
                <label class="account-label" for="username">Username:</label>
                <input class="account-input" type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" required>
            </div>
            <div class="account-form-group">
                <label class="account-label" for="email">Email:</label>
                <input class="account-input" type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" required>
            </div>
            <div class="account-form-group">
                <label class="account-label" for="password">New Password:</label>
                <input class="account-input" type="password" id="password" name="password" placeholder="Leave blank to keep current password">
            </div>
            <button class="account-button" type="submit">Update Account</button>
        </form>
    </div>


<?php
    include ("./footer.php");
?>