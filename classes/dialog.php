<?php
class Dialog
{
    public static function show($message)
    {
        echo "<script type='text/javascript'>alert($message);</script>";
    }
}
