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
                        <label for="email" class="form-label">Hình Ảnh</label>
                        <div class="drop-zone" id="drop-zone" style="width: 100%; height: 200px; border: 2px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                            <span class="drop-zone__prompt" style="text-align: center;">Kéo và thả hoặc chọn hình ảnh tại đây</span>
                            <input id="picture" name="picture[]" type="file" accept=".jpg,.png,.jpeg" autofocus multiple class="drop-zone__input" style="display: none;">
                        </div>
                        <span class="form-message"></span>
                    </div>

                    <div id="selected-pictures"></div>
                <button type="submit" name="submit" class="form-submit">Upload</button>
                </form>
                </div>
            </div>
            <script>
                // Define variables for drop zone and selected pictures container
                const dropZone = document.getElementById('drop-zone');
                const selectedPictures = document.getElementById('selected-pictures');

                // Drag and drop event
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    dropZone.addEventListener(eventName, preventDefaults, false);
                });

                // Highlight drop zone when item is dragged over
                ['dragenter', 'dragover'].forEach(eventName => {
                    dropZone.addEventListener(eventName, highlight, false);
                });

                // Unhighlight drop zone when item is dragged out
                ['dragleave', 'drop'].forEach(eventName => {
                    dropZone.addEventListener(eventName, unhighlight, false);
                });

                // Handle dropped files
                dropZone.addEventListener('drop', handleDrop, false);

                // Prevent default behaviors for drag and drop events
                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                // Highlight drop zone when item is dragged over
                function highlight(e) {
                    dropZone.classList.add('highlight');
                }

                // Unhighlight drop zone when item is dragged out
                function unhighlight(e) {
                    dropZone.classList.remove('highlight');
                }

                // Handle dropped files
                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;
                    handleFiles(files);
                }

                // Loop through dropped files and add thumbnails to selected pictures container
                function handleFiles(files) {
                    // Loop through each file
                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        // Check if file is an image
                        if (file.type.startsWith('image/')) {
                            const img = document.createElement('img');
                            img.file = file;
                            img.classList.add('selected-picture');
                            selectedPictures.appendChild(img);

                            // Create image preview
                            const reader = new FileReader();
                            reader.onload = (function (aImg) {
                                return function (e) {
                                    aImg.src = e.target.result;
                                };
                            })(img);
                            reader.readAsDataURL(file);
                        }
                    }
                }

                // Add click event listener to drop zone to trigger file input
                dropZone.addEventListener('click', function () {
                    fileInput.click();
                });

                // Add change event listener to file input to handle selected files
                const fileInput = document.getElementById('picture');
                fileInput.addEventListener('change', function (e) {
                    handleFiles(e.target.files);
                });
            </script>

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
                if (isset($files['name']) && is_array($files['name'])) {
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
                        else {
                            $message = "drag";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            return;
                        }
                    }
                }

                // save URLs to database
                if(!empty($urls)) {
                    $result = $pictureModel->uploadImageDatabase($urls, $idPhongTro);
                    if(!$result) {
                        $message = "no";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        return;
                    }
                    // echo 'Images uploaded successfully';
                    echo '<meta http-equiv="refresh" content="0;url=homepage">';
                }
            }
        }
    }
?>
