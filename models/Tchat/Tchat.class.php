<?php

class Tchat {

    private $id;
    private $user;
    private $message;

    public static $tchats;

    public function __construct($id,$user,$message) {

        $this->id=$id;
        $this->user=$user;
        $this->message=$message;
    }

    public function getId() { return $this->id;}
    public function setId($id) { $this->id=$id;}


    public function getUser() { return $this->user;}
    public function setUser($user) { $this->user=$user;}

    public function getMessage() { return $this->message;}
    public function setMessage($message) { $this->message=$message;}


}