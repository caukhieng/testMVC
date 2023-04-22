<?php
    include_once(__DIR__ . '/../models/pictureModel.php');

    class uploadImageController {
        public function render() {
?>
            <div class="container">
                <div class="center">
                <form action="" method="POST" class="form" id="form-1" enctype="multipart/form-data">
                    <h3 class="heading">Thêm hình ảnh</h3>
                    <p class="desc">Hãy thêm hình ảnh muốn <br> L<span>ONG</span> N<span>HONG</span> ❤️</p>

                    <div class="form-group">
                        <label for="email" class="form-label">Hình ảnh</label>
                        <input id="picture" name="picture[]" type="file" accept=".jpg,.png,.jpeg" autofocus multiple>
                        <span class="form-message"></span>
                    </div>

                    <div id="selected-pictures"></div>
                <button type="submit" name="submit" class="form-submit">Upload</button>
                </form>
                </div>
            </div>
<?php
        }
    }

    class configure {
        public function __invoke() {
            $image = new uploadImageController();
            $image->render();
            $idPhongTro = $_GET['idPhongTro'];
            if(isset($_POST['submit'])) {
                $pictureModel = new pictureModel();
                $urls = [];
                $files = $_FILES['picture'];
                // loop through each file
                for($i = 0; $i < count($files['name']); $i++) {
                    $file = [
                        'name' => $files['name'][$i],
                        'type' => $files['type'][$i],
                        'tmp_name' => $files['tmp_name'][$i],
                        'error' => $files['error'][$i],
                        'size' => $files['size'][$i]
                    ];

                    // check if file was uploaded successfully
                    if($file['error'] === UPLOAD_ERR_OK) {
                        $url = $pictureModel->uploadImagesFirebase([$file]);
                        $urls[] = $url[0];
                    }
                }

                // save URLs to database
                if(!empty($urls)) {
                    $result = $pictureModel->uploadImageDatabase($urls, $idPhongTro);
                    if(!$result) {
                        echo "Failed to save images to database";
                        return;
                    }
                    // echo 'Images uploaded successfully';
                    echo '<meta http-equiv="refresh" content="0;url=homepage">';
                }
            }
        }
    }
?>
