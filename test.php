<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wrapt</title>
    <link href="css/bootstrap.css" rel="stylesheet" >

</head>
<body>
    <form action="test.php" method="post">
        <input type="text" placeholder="Add the link" name="urla">
        <input type="text" placeholder="Add the number" name="chon">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <?php
    $chon = NULL;
    if(isset($_POST['submit']))
    {
        $chon = $_POST['chon'];
        $urla = $_POST['urla'];
        switch($chon)
        {
            case 1:
                include_once('simple_html_dom.php');
                $html = file_get_html($urla);
                echo $html;
                break;
            case 2:
                include_once('simple_html_dom.php');
                $html = file_get_html($urla);
                foreach($html->find('img') as $element) {
                    echo '<img src="'.$element->src.'" /><br>';
                }
                break;
        }
    }
    ?>
</body>
</html>