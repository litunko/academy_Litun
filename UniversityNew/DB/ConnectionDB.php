<?php

/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 28.10.2014
 * Time: 21:36
 */
class ConnectionDB
{
    function createConnection()
    {
        require_once( "Connection.php");
    }

    function closeConnection()
    {
        mysql_close();
    }

} 