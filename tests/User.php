<?php
    class User{
        public $emri;
        public $mbiemri;

        public function emriPlote(){
            return "$this->emri  $this->mbiemri";
        }
    }
?>