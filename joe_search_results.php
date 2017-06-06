<?php
session_start();
if(isset($_SESSION['valid_user'])) {
    
    /*
        Product search engine for site
    */
    require_once("joe_menus.php");
    require_once("joe_db_fns.php");

    $search = $_POST['search'];
    $conn = db_connect();
    
    
    /*
        query that takes user's input and searches for a pattern in product name or description using the percent sign wild card
    */
    $searching ="SELECT * FROM Product WHERE name LIKE '%".$search."%' OR p_desc LIKE '%".$search."%'";
    $result = $conn->query($searching);
?>
    <!-- Displays search results -->
    <section class="Prod">
    <h2>Search Results</h2>
        
<?php
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        $url = "joe_product_profile.php?prod_id=".($row['prod_id']);
            $title = $row['name'];
            echo "<section>";       
            echo '<div><img src = "'.$row[image].'"> </img></div>';

            echo "<section>";
            echo '<div id = "prod_nested">';
            do_html_url($url, $title);
            echo "<div><p>".$row[p_desc]."</p></div></div>";
            echo "<p>$".$row[price]."</p>";      
            echo "</section></section>";
        }
    } else {
        echo  '0 Results';
    }
?>
        
</section>

</article>
</body>
</html>

<?php
  } else {
    header('refresh: 5; url=index.php');
        echo "You are not logged in to view this page. You will be redirected to login in 5 seconds.";
}  
?>