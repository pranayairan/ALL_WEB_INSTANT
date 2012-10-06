<?php

$search=$_GET["search"];

$search = urlencode($search);
$url='http://answers.yahooapis.com/AnswersService/V1/questionSearch?appid=SFuTjwLV34EAIcJMa4.SrdhdnxMIpB4bdSdYTOU3kjS0ld9di8ZVQaL2kDKFcd7WFz_B7myV2wg1MZHFo&query='.$search.'&search_in=best_answer&results=12&output=json'; //rss link for the twitter timeline


//$url='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsByKeywords&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=pranayai-1605-4ef0-bc3e-a4344b08bf98&GLOBAL-ID=EBAY-US&keywords='.$search.'&RESPONSE-DATA-FORMAT=JSON&paginationInput.entriesPerPage=12'; //rss link for the twitter timeline
//echo $url;


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

foreach($obj->all->questions as $val)
{

$Length = 200;
$fullcontent = $val->Content;
$content=$fullcontent.substr(0,$Length);

//echo $val->shippingInfo[0]->shippingServiceCost[0]->__value__;
if ($hint=="")
        {
      $hint= ' <div class="boxformat1"><div style="float:left;width:7%"><a href="http://answers.yahoo.com/activity?show='.$val->UserId.'">
 <img src="'.$val->UserPhotoURL.'" height="48" width="48"> </a></div><div style="float:left; width:90%">
<a href="'.$val->Link.'"><strong>'.$val->Subject.'</strong></a>
<p>'.$content.'</p><p>In <a href="http://answers.yahoo.com/dir/index;_ylt=AlIh6WcLkrdLVkdnzdTmaywjzKIX;_ylv=3?sid='.$val->CategoryId.'">
<strong>'.$val->CategoryName.'</strong></a> - Asked By <a href="http://answers.yahoo.com/activity?show='.$val->UserId.'">
<strong>'.$val->UserNick.'</strong></a><strong> '.$val->NumAnswers.'</strong> Answers</p> </div></div>'

        ;

        }
      else
        {
        $hint=$hint . ' <div class="boxformat1"><div style="float:left;width:7%"><a href="http://answers.yahoo.com/activity?show='.$val->UserId.'">
 <img src="'.$val->UserPhotoURL.'" height="48" width="48"> </a></div><div style="float:left; width:90%">
<a href="'.$val->Link.'"><strong>'.$val->Subject.'</strong></a>
<p>'.$content.'</p><p>In <a href="http://answers.yahoo.com/dir/index;_ylt=AlIh6WcLkrdLVkdnzdTmaywjzKIX;_ylv=3?sid='.$val->CategoryId.'">
<strong>'.$val->CategoryName.'</strong></a> - Asked By <a href="http://answers.yahoo.com/activity?show='.$val->UserId.'">
<strong>'.$val->UserNick.'</strong></a><strong> '.$val->NumAnswers.'</strong> Answers</p> </div></div>'

						   ;

        }
      



}

echo $hint;

curl_close($ch);
//output the response
?>