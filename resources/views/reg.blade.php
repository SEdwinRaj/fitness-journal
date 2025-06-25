<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <link href="./output.css" rel="stylesheet">
  <link href="input.css" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(90deg, #000, #D97706);
            margin: 0;
        }
        .login-container {
            /* background: white; */
            padding: 20px;
            border-radius: 10px;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); */
            text-align: center;
            /* width: 350px; */
        }
        h2 {
            margin-bottom: 20px;
            color: #fff;
        }
        .input-group {
            width: 330px;
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            font-size: 14px;
            font-weight: bold;
            color:white;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .forgot-password {
            display: block;
            margin-bottom: 15px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        .login-btn {
            width: 100%;
            padding: 10px;
            background-color: #D97706;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .login-btn:hover {
            background-color: #0056b3;
        }
        .divider {
            margin: 15px 0;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body class="text-2xl">

    <div class="login-container backdrop-blur-2xl shadow-2xl bg-white/5">
        <h2>Login</h2>
        <form action="/signup" method="POST">
            @csrf
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                @error('username')
                    <div class="text-red-300 text-lg">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                @error('password')
                    <div class="text-red-300 text-lg">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="login-btn">SignUp</button>
        </form>


        <script>
        window.onload = function () {
            document.getElementById('username').value = "";
            document.getElementById('password').value = "";
        };
    </script>

</body>
</html>
