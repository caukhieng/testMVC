<?php
    include_once('../models/roomModel.php');

    class roomController
    {
        public function __invoke()
        {
            $roomModel = new roomModel();
            $room = $roomModel->getAllRooms();
            include_once('../index.php');
        }
    }
    $C_room = new roomController();
    $C_room->__invoke();
?>