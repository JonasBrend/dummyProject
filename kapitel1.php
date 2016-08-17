
    
  
        <?php
        include 'start.htm';
        ?>
    <p>Hier kann ihr Text stehen....</p>
    <img src="testbild.jpg" alt="Hier kann ihr Bild eingef&#252gt werden">
    <div id="komment">
        <b>Kommentar</b>
    <form action="kapitel1.php">
        
        <table style="width:100%">
  
            <tr>
      
         <textarea id="text" name="text" cols="35" rows="4"></textarea></th>
    
  </tr>
</table>
       <input type="submit" value="Absenden">
</form>
        <?php
        require_once('user.php');
//$user = new user();
if(isset($_POST['submit'])){
    $submit = $_POST['submit'];
    
}

if(isset($submit)){
    $text = $_POST['text'];
    $userId = $_SESSION['userId'];
    require_once('comments.php');
    $comment = new comments($text, $userId);
    
    
    require_once('commentsMapper.php');
    $commentsMapper = new commentsMapper();
    $commentsMapper->saveComment($comment);
}

?>
    </div>
</body>


    
    
    
    
    
</html>

