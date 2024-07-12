<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* Sets the font for the login page */
            background-color: #f4f4f4; /* Light grey background */
            display: flex;
            justify-content: center; /* Center the form horizontally */
            align-items: center; /* Center the form vertically */
            height: 100vh; /* Full viewport height */
            margin: 0;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Subtle shadow */
            width: 300px;
            display: flex ;
            flex-direction: column ;
            justify-content: center ;
            align-items: center ;
        }
        input[type=email], input[type=password] {
            width: 80%; /* Full width */
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 80%;
            padding: 10px;
            background-color: #0056b3; /* Blue background */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #004494; /* Slightly darker blue on hover */
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
