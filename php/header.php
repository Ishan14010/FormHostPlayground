<!DOCTYPE html>
<html>
<head>
    <title>Your Web App</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header>
        <!-- Your logo or site title -->
        <h1>
            <img src="images\attachment_115956224.jpeg" alt="WebConnect Hub Logo" width="100" height="100">
            WebConnect Hub
        </h1>

        <!-- Login form -->
        <div class="login-form">
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>

        <!-- Site navigation -->
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>

    <!-- Your content goes here -->
    <div class="container">
        <h2>Welcome to Our Web App</h2>
        <p>Explore our amazing features and content!</p>
    </div>

    <footer>
        <p>&copy; 2023 Your Web App. All rights reserved.</p>
    </footer>
</body>
</html>
