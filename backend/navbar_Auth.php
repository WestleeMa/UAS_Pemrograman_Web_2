<?php
if (isset($terlogin)) {
    if ($terlogin !== '') {
        echo <<<welcome
        <li class="nav-item">
        <a class="nav-link disabled" href="" style="color: white;">Welcome,</a> 
        </li>
        welcome;

        echo '<li class="nav-item dropdown">';
        echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">' . $terlogin . '</a>';
        echo '<ul class="dropdown-menu dropdown-menu-end">';
        
        if (isset($_SESSION['level'])) {
            $sesslevel = $_SESSION['level'];

            if ($sesslevel == 'Admin') {
                echo <<<admin
                <li>
                <a class="dropdown-item" href="admin/admin.php">Portal Admin</a>
                </li>

                <li>
                <a class="dropdown-item" href="user/cart.php">Cart</a>
                </li>
                admin;
            } else if ($sesslevel == 'User') {
                echo <<<User
                <li>
                <a class="dropdown-item" href="user/cart.php">Cart</a>
                </li>
                User;
            }
        }

        echo <<<Logout
        <li>
        <a class="dropdown-item" href="auth/logout.php">Logout</a>
        </li>
        Logout;

        echo '</ul>';
        echo '</li>';
    } else {
        echo <<<Login
        <li class="nav-item">
        <a class="nav-link" href="auth/login.php">Login</a>
        </li>
        Login;
    }
}
?>