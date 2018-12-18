<?php

    require_once ("config.php");

    if(!empty($_SESSION[`user_id`]))
    {
        header("location: /login.php");
    }

    if(!empty($_POST['comment']))
    {
        $query = $mysqli->prepare("INSERT INTO comments(`user_id`, `comment`) VALUES(:user_id, :comment)");
        $query->execute(array('user_id' => $_SESSION['user_id'], 'comment' => $_POST['comment']));
    }

    $query = $mysqli->prepare('SELECT * FROM comments ORDER BY id DESC');
    $query->execute();
    $comments = $query->fetchAll();

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css" type="text/css">
        <title>Comments Page</title>
    </head>
    <body>
        <div id="form">
            <div id="comments-heder">
                <h1>Comments Page</h1>
            </div>
            <div id="comments-form">
                <h3>Please add your comment</h3>
                <form action="" method="POST">
                    <div>
                        <label for="text">Comment</label>
                        <div>
                            <textarea name="comment" id="text"></textarea>
                        </div>
                    </div>
                    <div>
                        <br>
                        <input id="btn" type="submit" name="submit" value="Save comment">
                    </div>
                </form>
            </div>
            <div id="comment-panel">
                <h3>Comments:</h3>
                <?php foreach($comments as $comment): ?>
                <p <?php if($comment['user_id'] == $_SESSION['user_id']) echo 'style="font-weight: bold;"'; ?>> <?php echo $comment['comment']; ?> <span class="comment-date">(<?php echo $comment['time']; ?>)</span></p>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>