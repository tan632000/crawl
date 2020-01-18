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
    <style type="text/css">
        .crawl{
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" placeholder="Add the link" name="urla">
        <select name="chon">
            <option selected="disabled">Choose one</option>
            <option value="1">Get link</option>
            <option value="2">Get ảnh</option>
            <option value="3">Get title</option>
            <option value="4">Get full web</option>
        </select>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <div class="crawl">
        <?php
    $chon = NULL;
    if(isset($_POST['submit']))
    {
        $chon = $_POST['chon'];
        $urla = $_POST['urla'];
        include('simple_html_dom.php');
        $html = file_get_html($urla);
        switch($chon)
        {
            case 1:
                foreach($html->find('a') as $element) 
                echo $element->href . '<br>';
                break;
            case 2:
                foreach($html->find('img') as $element) {
                    echo '<img src="'.$element->src.'" /><br>';
                }
                break;
            case 3:
                $stt=0;$sau=2;

                foreach($html->find('a') as  $element ) 
                {
                    
                    if($stt>40&&$stt<90&&$sau>1)
                    {
                        echo $element->title . '<br>';
                        $sau=0;
                    }
                    $sau++;
                    $stt++;
                
                }
                
                break;
            default:
                echo $html;
                break;
            }
        }
    ?>
    </div>
    
</body>
</html>