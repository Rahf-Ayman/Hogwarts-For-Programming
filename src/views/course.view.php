
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Register</title>
    <link rel="stylesheet" href="styles/defaults.css">
    <style>
        .logo {
            width: 120px;
            height: 120px;
            margin: 0 auto;
            display: block;
        }
        h2 {
            text-align: center;
            color: var(--text-color);
            
        }
        .title {
            margin-bottom: 20px;
            color: var(--text-color);
            text-align: center;
        }
        
        label {
            margin-bottom: 5px;
            color: var(--text-color);
        }
        input {
            margin-bottom: 15px;
            width: 1000px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            background-color: var(--input-background-color);
            color: var(--text-color);
        }
        input[type="checkbox"] {
            margin-right: 10px;
            accent-color: var(--button-color);
            transform: scale(1.2);
            cursor: pointer;
        }
        table {
            width: 1100px;
            border-collapse: collapse;
            background-color: #222;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #444;
        }
        th {
            background-color: #111;
            color: #0f0; 
        }
        tr:hover {
            background-color: #333;
        }
        button {
            display: inline-block;
            background-color: #28a745; 
            color: white;
            border: none;
            width: 80px;
            height: 40px;
            padding: 3px 10px; 
            font-size: 12px;  
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #218838;
        }
        .goToLogin {
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
        .enroll-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 3px 6px; 
            font-size: 10px;  
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px; 
            width: 30px; 
            height: 30px; 
        }
        .enroll-btn i {
            font-size: 12px;
        }
        button:hover {
            background-color: #218838;
        }
        td form {
            display: inline-block; 
            margin: 0; 
            padding: 0; 
            background: transparent; 
            border: none;
        }
        
    </style>
</head>
<body>
    <?php
    $errors = $_SESSION['errors'] ?? [];
    unset($_SESSION['errors']);
    ?>
    <?php include __DIR__ . '/partials/navbar.php'; ?>
    
    <?php if (!empty($course)): ?> 
        <div>
            <div>
                <form action="/courseSearch" method="get">
                    <input name="SearchId" type="text" placeholder="SearchId" required>
                    <button type="submit">Search</button>
                </form>
                <form action="/course">
                    <button type="submit">Back</button>
                </form>
            </div>
            <div>
            <table >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Professor</th>
                    <th>Enroll</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($course as $cours): ?>
                    
                    <tr>
                        <td><?= htmlspecialchars($cours['id']) ?></td>
                        <td><?= htmlspecialchars($cours['name']) ?></td>
                        <td><?= htmlspecialchars($cours['professor'] ?? "N/l") ?></td>
                        <td>
                            <form action="/enroll" method="post">
                                <input type="hidden" name="course_id" value="<?= htmlspecialchars($cours['id']) ?>">
                                <button type="submit" class="enroll-btn">
                                    <i class="fa fa-plus"></i> 
                                </button>
                            </form>
                            <?php if (!empty($errors[$cours['id']])): ?>
                                <ul class="errors">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?= htmlspecialchars($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
            </div>
        
        </div>
    <?php else: ?>
        <h2>No courses found.</h2>
    <?php endif; ?>
    </form>
</body>
</html>