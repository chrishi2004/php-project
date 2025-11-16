<?php
// show_data.php - read registrations.txt and display in a styled table

$file = __DIR__ . DIRECTORY_SEPARATOR . "registrations.txt";

echo "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>All Registrations</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body { 
    font-family: 'Inter', 'Segoe UI', -apple-system, sans-serif;
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #7e57c2 100%);
    min-height: 100vh;
    padding: 45px 20px;
    position: relative;
    overflow-x: hidden;
}

body::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.08) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: moveGrid 20s linear infinite;
    pointer-events: none;
}

@keyframes moveGrid {
    0% { transform: translate(0, 0); }
    100% { transform: translate(50px, 50px); }
}

.container { 
    max-width: 1200px;
    margin: auto;
    background: rgba(255, 255, 255, 0.97);
    padding: 45px;
    border-radius: 28px;
    box-shadow: 0 25px 80px rgba(0, 0, 0, 0.35);
    position: relative;
    z-index: 1;
    animation: slideUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

h2 {
    text-align: center;
    background: linear-gradient(135deg, #1e3c72 0%, #7e57c2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 35px;
    font-size: 34px;
    font-weight: 800;
    letter-spacing: -0.6px;
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    color: #7e57c2;
    text-decoration: none;
    font-weight: 700;
    font-size: 15px;
    padding: 12px 22px;
    border: 2.5px solid #7e57c2;
    border-radius: 14px;
    transition: all 0.35s ease;
    margin-bottom: 30px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.back-link:hover {
    background: linear-gradient(135deg, #1e3c72 0%, #7e57c2 100%);
    color: white;
    border-color: transparent;
    transform: translateX(-4px);
    box-shadow: 0 8px 22px rgba(126, 87, 194, 0.5);
}

table { 
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-top: 25px;
    overflow: hidden;
    border-radius: 16px;
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
}

th, td { 
    padding: 18px;
    text-align: left;
    border-bottom: 1px solid #e5e7eb;
}

th { 
    background: linear-gradient(135deg, #1e3c72 0%, #7e57c2 100%);
    color: white;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 0.6px;
}

th:first-child {
    border-top-left-radius: 16px;
}

th:last-child {
    border-top-right-radius: 16px;
}

tr {
    background: white;
    transition: all 0.25s ease;
}

tr:hover {
    background: #f9fafb;
    transform: translateY(-1px);
    box-shadow: inset 0 2px 12px rgba(126, 87, 194, 0.12);
}

tr:last-child td {
    border-bottom: none;
}

tr:last-child td:first-child {
    border-bottom-left-radius: 16px;
}

tr:last-child td:last-child {
    border-bottom-right-radius: 16px;
}

td {
    color: #374151;
    font-size: 15px;
    font-weight: 500;
}

p {
    text-align: center;
    color: #6b7280;
    font-size: 16px;
    padding: 45px 25px;
    background: white;
    border-radius: 14px;
    margin-top: 25px;
    font-weight: 600;
}

@media (max-width: 768px) {
    .container {
        padding: 30px 22px;
    }
    
    table {
        font-size: 13px;
    }
    
    th, td {
        padding: 14px 10px;
    }
    
    h2 {
        font-size: 26px;
        margin-bottom: 28px;
    }
    
    .back-link {
        padding: 10px 18px;
        font-size: 14px;
        margin-bottom: 25px;
    }
}
</style>
</head>
<body>
<div class='container'>
<h2>📋 All Registered Users</h2>
<a href='index.html' class='back-link'>← Back to Registration Form</a>
";

if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (count($lines) > 0) {
        echo "<table><tr><th>Full Name</th><th>Email</th><th>Phone</th><th>Gender</th><th>Age</th></tr>";
        foreach ($lines as $line) {
            // Parse saved line
            if (preg_match('/Full Name: (.*?) \| Email: (.*?) \| Phone: (.*?) \| Gender: (.*?) \| Age: (.*)/', $line, $matches)) {
                $full = htmlspecialchars($matches[1], ENT_QUOTES);
                $email = htmlspecialchars($matches[2], ENT_QUOTES);
                $phone = htmlspecialchars($matches[3], ENT_QUOTES);
                $gender = htmlspecialchars($matches[4], ENT_QUOTES);
                $age = htmlspecialchars($matches[5], ENT_QUOTES);
                echo "<tr><td>$full</td><td>$email</td><td>$phone</td><td>$gender</td><td>$age</td></tr>";
            }
        }
        echo "</table>";
    } else {
        echo "<p>No registrations yet.</p>";
    }
} else {
    echo "<p>No registrations file found.</p>";
}

echo "</div></body></html>";
?>