<?php 

    require_once('../Models/pdo.php');
    require_once('../Models/RoomManager.php');
    $room = new RoomManager($pdo);

    function displayRooms()
    {
        global $room;
        $getRooms = $room->getAllRooms();
        return $getRooms;
    }

?>