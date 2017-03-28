<?php

interface SGILogHandler {
    public function canBeCleared();
    public function isWritable();
    public function write($message);
    public function readAll();
    public function clear();
}
?>