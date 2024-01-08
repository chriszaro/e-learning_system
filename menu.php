<div class="menu">
    <ul class="menu-list">
        <a href="index.php"><li class="menu-item">Αρχική σελίδα</li></a>
        <a href="announcement.php"><li class="menu-item">Ανακοινώσεις</li></a>
        <a href="communication.php"><li class="menu-item">Επικοινωνία</li></a>
        <a href="documents.php"><li class="menu-item">Έγγραφα μαθήματος</li></a>
        <a href="homework.php"><li class="menu-item">Εργασίες</li></a>
        <?php if ($_SESSION["role"] == 'Tutor') {
            echo '<a href="users.php"><li class="menu-item">Διαχείριση χρηστών</li></a>';
        }?>
        <a href="logout.php"><li class="menu-item">Logout</li></a>
    </ul>
</div>
