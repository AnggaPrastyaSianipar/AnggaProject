<header>
    <nav>
        <ul>
            <li><a href="login.php">Home</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <?php if ($_SESSION['role'] == 'admin'): ?>
                    <li><a href="dashboard_admin.php">Dashboard</a></li>
                <?php else: ?>
                    <li><a href="dashboard_user.php">Dashboard</a></li>
                <?php endif; ?>
                <li><a href="logout.php">Logout</a></li>
               
            <?php endif; ?>
        </ul>
    </nav>
</header>
