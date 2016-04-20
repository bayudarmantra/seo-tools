<?php
//Include Core Class
require_once("Spider.php");

// It may take a whils to crawl a site ...
//set_time_limit(10000);

$url = "http://stackoverflow.com/questions/9943771/adding-a-favicon-to-a-static-html-page";
//$url = "http://.com";

//$host = parse_url($url)['host'];
//var_dump($host);

$spider = new Spider();
$spider->load_url($url);
echo "<strong>Page Title:</strong> ". $spider->get_page_title().'<br/>';
echo "<strong>Favicon:</strong> ". $spider->get_favicon().'<br/>';
echo "<strong>Viewport:</strong> ". $spider->get_meta_viewport().'<br/>';
echo "<strong>Meta Description:</strong> ". $spider->get_meta_description().'<br/>';

/*$crawler = new Spider();
$crawler->setURL($url);
$crawler->addContentTypeReceiveRule("#text/html#");
$crawler->addURLFilterRule("#\.(jpg|jpeg|gif|png)$# i");
$crawler->enableCookieHandling(true);
$crawler->enableAggressiveLinkSearch(false);
$crawler->excludeLinkSearchDocumentSections(PHPCrawlerLinkSearchDocumentSections::ALL_SPECIAL_SECTIONS);
$crawler->setFollowMode(0);
$crawler->setCrawlingDepthLimit(1);
$crawler->setLinkExtractionTags(array("href", "src"));
$crawler->go();
$report = $crawler->getProcessReport();

if (PHP_SAPI == "cli") $lb = "\n";
else $lb = "<br />";

echo "Summary:".$lb;
echo "Links followed: ".$report->links_followed.$lb;
echo "Documents received: ".$report->files_received.$lb;
echo "Bytes received: ".$report->bytes_received." bytes".$lb;
echo "Process runtime: ".$report->process_runtime." sec".$lb;
echo "Data throughput:".$report->data_throughput.$lb;*/

/*$scrapper = $crawler->init_scrapper($url);
$whois = $crawler->hosting_info($url);

echo "<strong>Page Title:</strong> ". $scrapper['title'].'<br/>';
echo "<strong>Favicon:</strong> ". $scrapper['favicon'].'<br/>';
echo "<strong>Viewport:</strong> ". $scrapper['viewport'].'<br/>';
echo "<strong>Meta Description:</strong> ". $scrapper['meta_description'].'<br/>';
echo '<br>';
echo "<strong>Domain created:</strong> ". $whois->date_created.'<br/>';
echo "<strong>Domain expired:</strong> ". $whois->date_expires.'<br/>';*/
?>
