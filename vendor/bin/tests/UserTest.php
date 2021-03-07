<?php
    require 'User.php';
    use PHPUnit\Framework\TestCase;

    class UserTest extends PHPUnit_Framework_TestCase{
        public function testKthenEmrinPlote(){

            $user = new User;

            $user->emri = "Brendi";
            $user->mbiemri = "Sinani";

            $this->assertEquals("Brendi Sinani");
        }
    }
?>