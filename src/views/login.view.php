<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles/defaults.css">
    <style>
        .logo {
            width: 120px;
            height: 120px;
            margin: 0 auto;
            display: block;
        }

        h1 {
            text-align: center;
            color: var(--text-color);
            margin-bottom: 0;
        }

        .title {
            margin-bottom: 20px;
            color: var(--text-color);
            text-align: center;
        }

        form {
            background-color: var(--secondary-background-color);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: var(--text-color);
        }

        input {
            margin-bottom: 15px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            background-color: var(--input-background-color);
            color: var(--text-color);
        }

        button {
            padding: 10px;
            background-color: var(--button-color);
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: var(--button-hover-color);
        }

        .goToRegister {
            text-align: center;
            margin-top: 20px;
            color: var(--text-color);
        }

        .link {
            color: var(--button-color);
        }

        .errors {
            color:rgb(201, 58, 58);
            margin: 0;
            padding: 0;
            padding-bottom: 20px;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <form action="/login/submit" method="POST">
        <img src="/assets/slytherin.png" class="logo">
        <h1>Welcome Back!</h1>
        <div class="title">Login to Hogwarts School</div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <?php
        $errors = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']);
        ?>

        <?php if (!empty($errors)): ?>
            <ul class="errors">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <button type="submit">Login</button>
        <div class="goToRegister"> Don't have an account? <a class="link" href="/register">Register</a></div>
    </form>
</body>

</html>
