<?php 
include_once __DIR__ . '/../models/reviewsModel.php';
// require __DIR__ . '/../vendor/autoload.php';
// use Dotenv\Dotenv;

// $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
// $dotenv->load();
class reviewView{
    public function renders($reviews)
        {?>    
    <div class="container">      
        <ul class="comment-list">
  
            <?php 
            if(isset($reviews))
            {
            foreach ($reviews as $row)
            {?>
            <li id="c-54243980" data-id="54243980"  class=" no-border item idx0">
                <div class="cmt-top">
                        <p class="cmt-top-name">
                            <?php echo $row['Email']; ?> - <?php echo $row['Ten']; ?>
                        </p>
                </div>
                <div class="cmt-content">
                        <p class="cmt-txt"><?php echo $row['content']; ?></p>
                    </div>
                    <div class="cmt-command">
<!-- content -->

                        <span class="cmtd dot-circle-ava"><?php echo $row['submit_date']; ?></span>
                    </div>
                </div>
            </li>
            <?php 
                }
                }
                else{
                }?>  
        </ul>
        
    </div>
<?php 
}}
class reviewController
{
    public function __invoke()
    {
        // $roomModel = new App\Models\roomModel();
        $reviewsModel = new reviewsModel();
        $reviews = $reviewsModel->getAllReviews($_GET['idPhongTro']);
        $reviewsView = new reviewView();
        $reviewsView->renders($reviews);
    }
}
?>


