<!-- resources/views/login.blade.php -->

<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<form class="loginForm" method="POST" action="">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="role">Role:</label>
        <select name="role" id="role">
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
        </select>
    </div>
    <button type="submit">Login</button>
</form>

<script>
    document.querySelector('.loginForm').addEventListener('submit', function(event) {
        var role = document.getElementById('role').value;
        var actionUrl = '';

        if (role === 'admin') {
            actionUrl = '{{ route("admin.login") }}';
        } else if (role === 'employee') {
            actionUrl = '{{ route("employee.login") }}';
        }

        document.querySelector('.loginForm').action = actionUrl;
    });
</script>
</body>
</html>
