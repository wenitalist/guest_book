<div class="addl">
    <h2 class="text">
        <?php
        global $q;
        global $pdo;
        $stmt = $pdo->query("SELECT title FROM posts WHERE id = $q");
        $data = $stmt->fetchAll();
        echo($data[0]->title);
        ?>
    </h2>
    <hr>
    <p class="text">
        <?php
        global $q;
        global $pdo;
        $stmt = $pdo->query("SELECT content FROM posts WHERE id = $q");
        $data = $stmt->fetchAll();
        echo($data[0]->content);
        ?>
    </p>
    <hr>
    <p class="date">
        <?php
        global $q;
        global $pdo;
        $stmt = $pdo->query("SELECT author, date_of_public FROM posts WHERE id = $q");
        $data = $stmt->fetchAll();
        $str_aut = ($data[0]->author);
        $str_aut .= " - ";
        $str_date = ($data[0]->date_of_public);
        $str_aut .= $str_date;
        echo($str_aut);
        ?>
    </p>
</div>