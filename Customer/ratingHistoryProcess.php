  <?php
    include_once '../connection.php';
    include_once 'customerNavBar.php';

      if(isset($_POST['rating_history'])){
        
    $rating_history = $_POST['ratinghis'];
    



    //to prevent mysql injection

    // $ratingID = stripcslashes($ratingID);
    $rating_history = stripcslashes($rating_history);
   


    $books =$conn->prepare("SELECT resortName, overallRatings, address, city, state, resortPhoneNo FROM resorts WHERE overallRatings = ?");
             $books->bind_param('s',$rating_history);
             $books->execute();
    $resultbooks = $books->get_result();
    if($resultbooks->num_rows>0)
    {
      $valuebook = mysqli_fetch_all($resultbooks, MYSQLI_ASSOC);
      
    }
    else{
      $valuebook = [];
    }

}



// else {

//    echo"Try again.";
// }



    ?>

    
