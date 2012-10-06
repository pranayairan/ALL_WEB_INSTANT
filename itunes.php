<?php

$search=$_GET["search"];



$url='http://ax.phobos.apple.com.edgesuite.net/WebObjects/MZStoreServices.woa/wa/wsSearch?term='.$search.'&entity=software'; //rss link for the twitter timeline


//$url='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsByKeywords&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=pranayai-1605-4ef0-bc3e-a4344b08bf98&GLOBAL-ID=EBAY-US&keywords='.$search.'&RESPONSE-DATA-FORMAT=JSON&paginationInput.entriesPerPage=12'; //rss link for the twitter timeline
//echo $url1;


//print_r(get_data($url)); //dumps the content, you can manipulate as you wish to

/* gets the data from a URL */

$ch = curl_init();
$timeout = 60;
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
//you need to add the code for proxy if u r testing in college or hostel

		

$data = curl_exec($ch);

$obj=json_decode($data);
//$hint="";

//root.findItemsByKeywordsResponse[0].searchResult[0].item || [];
//echo $data;
//echo $obj->findItemsByKeywordsResponse[0]->ack[0];
$hint="";
foreach($obj->results as $val)
{
//echo $val->shippingInfo[0]->shippingServiceCost[0]->__value__;


if ($hint=="")
        {

      $hint='<div class="cl_box" align="center"><a href="'.$val->trackViewUrl. 
        '" target="_blank"><img width="100" height="100" src="'.$val->artworkUrl60.'"></a>'.
        '<div align="center" style="font-size: small;">
						  <strong>
						  <a href="'.$val->trackViewUrl.'">'.$val->trackName.'</a></strong><br>
						  <strong>'.$val->artistName.'</strong></div></div>'   
        ;

        }
      else
        {
        $hint=$hint .'<div class="cl_box" align="center"><a href="'.$val->trackViewUrl. 
        '" target="_blank"><img width="100" height="100" src="'.$val->artworkUrl60.'"></a>'.
        '<div align="center" style="font-size: small;">
						  <strong>
						  <a href="'.$val->trackViewUrl.'">'.$val->trackName.'</a></strong><br>
						  <strong>'.$val->artistName.'</strong></div></div>'       
						   ;

        }



}

echo $hint;

curl_close($ch);
//output the response
?>