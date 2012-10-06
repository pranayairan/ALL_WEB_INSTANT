<?php

$search=$_GET["search"];

$url='http://search.twitter.com/search.json?lang=en&q='.$search.'&show_user=true&rpp=14'; //rss link for the twitter timeline


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
$side1="";
$side2="";
$flag=0;

foreach($obj->results as $val)
{
//echo $val->shippingInfo[0]->shippingServiceCost[0]->__value__;

if($flag<7)
{
if ($side1=="")
        {
      $side1='<div class="boxformat"><div style="float:left;width:15%"><a href="www.twitter.com/'.$val->from_user.'">
<img src="'.$val->profile_image_url.'" height="45" width="49"> </a></div>
<div style="float:left;width:74%"><a href="www.twitter.com/'.$val->from_user.'">'.$val->from_user.'</a>:'.$val->text.'<p></p><p></p></div></div>'

 
        ;

        }
      else
        {
        $side1=$side1 .'<div class="boxformat"><div style="float:left;width:15%"><a href="www.twitter.com/'.$val->from_user.'">
<img src="'.$val->profile_image_url.'" height="45" width="49"> </a></div>
<div style="float:left;width:74%"><a href="www.twitter.com/'.$val->from_user.'">'.$val->from_user.'</a>:'.$val->text.'<p></p><p></p></div></div>'

    
						   ;

        }
        $flag = $flag+1;
}


else
{
if ($side2=="")
        {

      $side2='<div class="boxformat"><div style="float:left;width:15%"><a href="www.twitter.com/'.$val->from_user.'">
<img src="'.$val->profile_image_url.'" height="45" width="49"> </a></div>
<div style="float:left;width:74%"><a href="www.twitter.com/'.$val->from_user.'">'.$val->from_user.'</a>:'.$val->text.'<p></p><p></p></div></div>'

   
        ;

        }
      else
        {
          $side2=$side2 .'<div class="boxformat"><div style="float:left;width:15%"><a href="www.twitter.com/'.$val->from_user.'">
<img src="'.$val->profile_image_url.'" height="45" width="49"> </a></div>
<div style="float:left;width:74%"><a href="www.twitter.com/'.$val->from_user.'">'.$val->from_user.'</a>:'.$val->text.'<p></p><p></p></div></div>'

    
						   ;

        }
        
}


}

$hint =' <div class="c2_box" style="width: 48%">'.$side1.'</div>'.'  <div class="c3_box" >'.$side2.'</div>';

echo $hint;

curl_close($ch);
//output the response
?>