<?php 
require("../../../../php/class.php");
$selectedbible = "";
$selectedbook = "";
$selectedchapter = "";
$selectedverse = "";
if(isset($_GET["bibleid"]) && isset($_GET["verseid"]) && !isset($_GET["bookid"])){
    echo(getBibleBookChapterVerse($_GET["bibleid"],$_GET["verseid"]))[0];
}else{
    echo('<br>
    <label>Bibles</label>
    <form action="bible.php">
    <select style="width:250px;height:30px;outline:none;" name="bibleid">');
    foreach (getBibles() as $key) {
        echo('<option value="'.$key[2].'">'.$key[0].' ('.$key[1].')</option>');
        if(isset($_GET["bibleid"]) && $key[2] == $_GET["bibleid"]) $selectedbible = $key[1];
    }
    echo('</select>
    <input type="submit" value="Load" style="cursor:pointer;height:30px;width:70px;outline:none;">
    </form>
    ');
    
    if($selectedbible !== "" && isset($_GET["bibleid"])){
        echo("<h1>Selected bible: ".$selectedbible."</h1>");
    
        echo('<br>
        <label>Books</label>
        <form action="bible.php">
        <input type="hidden" name="bibleid" value="'.$_GET["bibleid"].'">
        <select style="width:250px;height:30px;outline:none;" name="bookid">');
        foreach (getBibleBooks($_GET["bibleid"]) as $key) {
            echo('<option value="'.$key[2].'">'.$key[0].'</option>');
            if(isset($_GET["bookid"]) && $key[2] == $_GET["bookid"]) $selectedbook = $key[1];
        }
        echo('</select>
        <input type="submit" value="Load" style="cursor:pointer;height:30px;width:70px;outline:none;">
        </form>
        ');
    
        
        if($selectedbible !== "" && isset($_GET["bookid"])){
            echo("<h1>Selected book: ".$selectedbook."</h1>");
        
            echo('<br>
            <label>Chapter</label>
            <form action="bible.php">
            <input type="hidden" name="bibleid" value="'.$_GET["bibleid"].'">
            <input type="hidden" name="bookid" value="'.$_GET["bookid"].'">
            <select style="width:250px;height:30px;outline:none;" name="chapterid">');
            foreach (getBibleBookChapters($_GET["bibleid"], $_GET["bookid"]) as $key) {
                echo('<option value="'.$key[2].'">'.$key[0].'</option>');
                if(isset($_GET["chapterid"]) && $key[2] == $_GET["chapterid"]) $selectedchapter = $key[1];
            }
            echo('</select>
            <input type="submit" value="Load" style="cursor:pointer;height:30px;width:70px;outline:none;">
            </form>
            ');
            
    
            if($selectedchapter !== "" && isset($_GET["chapterid"])){
                echo("<h1>Selected chapter: ".$selectedchapter."</h1>");
            
                echo('<br>
                <label>Verse</label>
                <form action="bible.php">
    
                <input type="hidden" name="bibleid" id="bibleid" value="'.$_GET["bibleid"].'">
                <input type="hidden" name="bookid" value="'.$_GET["bookid"].'">
                <input type="hidden" name="chapterid" value="'.$_GET["chapterid"].'">
    
                <select style="width:250px;height:30px;outline:none;" name="verseid" id="verseid">');
                foreach (getBibleBookChapterVerses($_GET["bibleid"], $_GET["chapterid"]) as $key) {
                    echo('<option value="'.$key[2].'">'.$key[0].'</option>');
                    if(isset($_GET["verseid"]) && $key[2] == $_GET["verseid"]) $selectedverse = $key[1];
                }
                echo('</select>
                <input type="submit" value="Load" style="cursor:pointer;height:30px;width:70px;outline:none;">
                </form>
                <button id="directload" style="cursor:pointer;height:70px;width:120px;outline:none;">Direct Load (Text/Raw)</button>


                <script>

                const exampleBtn = document.getElementById(\'directload\');

                exampleBtn.addEventListener(\'click\', () => {
                    var versevalue = document.getElementById(\'verseid\').value;
                    var biblevalue = document.getElementById(\'bibleid\').value;
                    window.open(\'bible.php?bibleid=\'+biblevalue+\'&verseid=\'+versevalue, \'_blank\');
                });

                </script>
                ');
                
                    if($selectedverse !== "" && isset($_GET["verseid"])){
                        echo("<h1>Selected verse: ".$selectedverse."</h1>");

                        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                        
                        echo("<label>Api:</label><input type=\"text\" value=\"".explode("?",$url)[0]."?bibleid=".$_GET["bibleid"]."&verseid=".$_GET["verseid"]."\" style=\"width:100%\">");
                        
                        $vers = getBibleBookChapterVerse($_GET["bibleid"], $_GET["verseid"]);
                        echo('<br><br>
                        <textarea style="width:100%;height:200px;outline:none;">'.$vers[0].'</textarea>
                        ');
                        
                    }
    
            }
    
        }
    
    }
}


        ?>