<?php
// Include the phpcrawl-mainclass
require_once("PHPCrawl/libs/PHPCrawler.class.php");

// Load Simple HTML DOM Library
require_once("simple_html_dom.php");

class Spider extends PHPCrawler
{
  public $site_content = '';

  /*PHP CRAWLER*/
  function handleDocumentInfo(PHPCrawlerDocumentInfo $data)
  {
    // Just detect linebreak for output ("\n" in CLI-mode, otherwise "<br>").
    if (PHP_SAPI == "cli") $lb = "\n";
    else $lb = "<br />";

    // Print the URL and the HTTP-status-Code
    echo "Page requested: ".$data->url." (".$data->http_status_code.")".$lb;

    // Print the refering URL
    echo "Referer-page: ".$data->referer_url.$lb;

    echo $lb;
    flush();
  }

  /*Simple HTML DOM*/
  public function load_url($url)
  {
    $this->site_content = file_get_html($url);
  }

  /*Get page title*/
  public function get_page_title()
  {
    $html = $this->site_content;

    if(is_object($html->find('title',0)))
    {
      return $html->find('title',0)->innertext;
    }
    else
    {
      return "not found";
    }
  }

  /*Get favicon*/
  public function get_favicon()
  {
    $html = $this->site_content;

    if(is_object($html->find('link[rel=shortcut icon]',0)))
    {
      return $html->find('link[rel=shortcut icon]',0)->href;
    }
    elseif(is_object($html->find('link[rel=icon]',0)))
    {
      return $html->find('link[rel=icon]',0)->href;
    }
    else
    {
      return "not found";
    }
  }

  /*Get meta viewport*/
  public function get_meta_viewport()
  {
    $html = $this->site_content;

    if(is_object($html->find('meta[name=viewport]',0)))
    {
      $html->find('meta[name=viewport]',0)->content;
    }
    else
    {
      return "not found";
    }
  }

  /*Get meta description*/
  public function get_meta_description()
  {
    $html = $this->site_content;

    if(is_object($html->find('meta[name=description]',0)))
    {
      return $html->find('meta[name=description]',0)->content;
    }
    else
    {
      return "not found";
    }
  }

  function hosting_info($url)
  {
    //from http://freedomainapi.com/free-whois-api.html
    //You are allowed to make 1 whois API query per minute or approximately 43,200 requests in a month.

     if (!function_exists('curl_init')){
         die('Sorry cURL is not installed!');
     }
     $data = array();

     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, 'http://api.whoapi.com/?domain=lipsum.com&r=whois&apikey=891dba0c731bf827ad8105c25b6640db');
     curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
     curl_setopt($ch, CURLOPT_HEADER, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_TIMEOUT, 10);
     $output = curl_exec($ch);
     curl_close($ch);
     return json_decode($output);
  }
}
?>
