<?php

$search=$_GET["search"];

$url='http://ajax.googleapis.com/ajax/services/search/books?v=1.0&q='.$search.'&key=ABQIAAAA-RsBcGmvG4K72cJQnmtrwBT-kggiwGJxaszALFUWfKoK-N6jcRTyOkiPfsLjmy7KYOlA7ue7eUKT9w&userip=192.16.9.5&rsz=8&start=0'; //rss link for the twitter timeline

//$url='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsByKeywords&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=pranayai-1605-4ef0-bc3e-a4344b08bf98&GLOBAL-ID=EBAY-US&keywords='.$search.'&RESPONSE-DATA-FORMAT=JSON&paginationInput.entriesPerPage=12'; //rss link for the twitter timeline
echo $url;


//print_r(get_data($url)); //dumps the content, you can manipulate as you wish to

/* gets the data from a URL */

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
//you need to add the code for proxy if u r testing in college or hostel

		

$data = curl_exec($ch);

//$obj=json_decode($data);
//$hint="";

//root.findItemsByKeywordsResponse[0].searchResult[0].item || [];
echo $data;
//echo $obj->value[0]->title[0];
/*
$hint="";
foreach($obj->findItemsByKeywordsResponse[0]->searchResult[0]->item as $val)
{
//echo $val->shippingInfo[0]->shippingServiceCost[0]->__value__;


if ($hint=="")
        {

      $hint='<div class="cl_box" align="center"><a href="'.$val->viewItemURL[0]. 
        '" target="_blank"><img width="100" height="100" src="'.$val->galleryURL[0].'"></a>'.
        '<div align="center" style="font-size: small;">
						  <strong>
						  <a href="'.$val->viewItemURL[0].'">'.$val->title[0].'</a></strong><br>
						  <strong>$'.$val->shippingInfo[0]->shippingServiceCost[0]->__value__.'</strong></div></div>'   
        ;

        }
      else
        {
        $hint=$hint .'<div class="cl_box" align="center"><a href="'.$val->viewItemURL[0]. 
        '" target="_blank"><img width="100" height="100" src="'.$val->galleryURL[0].'"></a>'.
        '<div align="center" style="font-size: small;">
						  <strong>
						  <a href="'.$val->viewItemURL[0].'">'.$val->title[0].'</a></strong><br>
						  <strong>$'.$val->shippingInfo[0]->shippingServiceCost[0]->__value__.'</strong></div></div>'   
        ;

        }



}

echo $hint;
*/
curl_close($ch);
//output the response
?>