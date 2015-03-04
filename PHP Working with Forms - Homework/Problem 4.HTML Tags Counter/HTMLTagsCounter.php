<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form action="HTMLTagsCounter.php" method="post">
            <label for="theField">Enter HTML tags: </label><br/><br/>
            <input type="text" name="theField">
            <input type="submit" placeholder="Submit" name="submit">
        </form><br/>
        <?php
        $valid_tags = ['doctype', 'a', 'abbr', 'acronym', 'address', 'applet', 'area', 'article', 'aside', 'audio', 'b',
            'base', 'basefont', 'bdi', 'bdo', 'big', 'blockquote', 'body', 'br', 'button', 'canvas', 'caption',
            'center', 'cite', 'code', 'col', 'colgroup', 'datalist', 'dd', 'del', 'details', 'dfn', 'dialog', 'dir',
            'div', 'dl', 'dt', 'em', 'embed', 'fieldset', 'figcaption', 'figure', 'font', 'footer', 'form', 'frame',
            'frameset', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'hr', 'html', 'i', 'iframe', 'img'
            , 'input', 'ins', 'kbd', 'keygen', 'label', 'legend', 'li', 'link', 'main', 'map', 'mark', 'menu', 'menuitem',
            'meta', 'meter', 'nav', 'noframes', 'noscript', 'object', 'ol', 'optgroup', 'option', 'putput', 'p', 'param',
            'pre', 'progress', 'q', 'rp', 'rt', 'ruby', 's', 'samp', 'script', 'section', 'select', 'small', 'source', 'span',
            'strike', 'strong', 'style', 'sub', 'sup', 'table', 'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'time',
            'title', 'tr', 'track', 'tt', 'u', 'ul', 'var', 'video', 'wbr'];
        if(isset($_POST["submit"]))
        {
            if(in_array(trim($_POST["theField"]), $valid_tags)) {
                echo '<h1>Valid HTML tag!</h1>';
                $_SESSION["score"] += 1;
            }
            else
                echo '<h1>Invalid HTML tag!</h1>';
        }
        if(!isset($_SESSION["score"]))
            $_SESSION["score"] = 0;
        echo "<h1>Score: " . $_SESSION["score"] . "</h1>";
        ?>
    </body>
</html>