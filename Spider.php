<?php
class Spider extends PHPCrawler
{
  function handleDocumentInfo(PHPCrawlerDocumentInfo $PageInfo)
  {
    // Your code comes here!
    // Do something with the $PageInfo-object that
    // contains all information about the currently
    // received document.

    // As example we just print out the URL of the document
    echo $PageInfo->url."\n";
  }
} 
?>
