<?php

/** This file is part of KCFinder project
  *
  *      @desc Browser calling script
  *   @package KCFinder
  *   @version 2.53
  *    @author Pavel Tzonkov <sunhater@sunhater.com>
  * @copyright 2010-2014 KCFinder Project
  *   @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
  *   @license http://www.opensource.org/licenses/lgpl-2.1.php LGPLv2
  *      @link http://kcfinder.sunhater.com
  */

require "core/autoload.php";
$browser = new browser();
$browser->action();

if(($_REQUEST['refresh'])&&($browser)){echo"<script>window.location='browse.php?lang=pt&opener=tinymce4&field=$_REQUEST[field]&type=$_REQUEST[type]&dir=$_REQUEST[dir]'</script></script>";}


?>