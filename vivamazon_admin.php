<div id="message" class="updated fade"></div>
<div class="wrap">
<h2>Configure Vivamazon</h2>
<?php
    $opt_name1 = 'vivazon_id';
    $hidden_field_name1 = 'mt_vivamazon_id_hidden';
    $data_field_name1 = 'mt_vivamazon_id';
    
    $opt_name2 = 'vivazon_key'; 
    $hidden_field_name2 = 'mt_vivamazon_key_hidden';
    $data_field_name2 = 'mt_vivamazon_key';
    
    // To track when the Run button has been pressed
    $hidden_field_name3 = 'mt_vivamazon_run_hidden';
    
    $opt_name4 = 'vivazon_category'; 
    $hidden_field_name4 = 'mt_vivamazon_cat_hidden';
    $data_field_name4 = 'mt_vivamazon_cat';
    
    $opt_name5 = 'vivazon_post_count'; 
    $hidden_field_name5 = 'mt_vivamazon_posts_hidden';
    $data_field_name5 = 'mt_vivamazon_posts';
    
    $opt_name6 = 'vivazon_index'; 
    $hidden_field_name6 = 'mt_vivamazon_index_hidden';
    $data_field_name6 = 'mt_vivamazon_index';
    
    $opt_name7 = 'vivazon_keywords'; 
    $hidden_field_name7 = 'mt_vivamazon_keywords_hidden';
    $data_field_name7 = 'mt_vivamazon_keywords';
    
    $opt_name8 = 'vivazon_len_desc'; 
    $hidden_field_name8 = 'mt_vivamazon_lend_hidden';
    $data_field_name8 = 'mt_vivamazon_lend';

     // To track when the "Delete Everything" button has been pressed
    $hidden_field_name9 = 'mt_vivamazon_del_hidden';

    
    $opt_val1 = get_option( $opt_name1 ); 
    $opt_val2 = get_option( $opt_name2 );
    $opt_val4 = get_option( $opt_name4 );
    $opt_val5 = get_option( $opt_name5);
    $opt_val6 = get_option( $opt_name6);
    $opt_val7 = get_option( $opt_name7);
    $opt_val8 = get_option( $opt_name8);
    
    if(isset($_POST[ $hidden_field_name3 ]) && $_POST[ $hidden_field_name3 ] == 'Y' )
    {
    	RunScript();
?>
   <div class="updated"><p><strong><?php _e('Script executed.', 'menu-test' ); ?></strong></p></div> 
<?php
    }
    else  if(isset($_POST[ $hidden_field_name9 ]) && $_POST[ $hidden_field_name9 ] == 'Y' )
    {
    	
?>
   <div class="updated"><p><strong><?php _e('Trashing all posts and emptying the database.', 'menu-test' ); ?></strong></p></div> 
<?php
	viv_delete_all_posts_in_db_and_empty_the_db();
    }
    else
    {    
	    if( isset($_POST[ $hidden_field_name1 ]) && $_POST[ $hidden_field_name1 ] == 'Y' ) 
	    { // Read their posted value 
	        $opt_val1 = $_POST[ $data_field_name1 ]; // Save the posted value in the database
	        update_option( $opt_name1, $opt_val1 ); // Put an settings updated message on the screen 
        
 ?>
 <div class="updated"><p><strong><?php _e('ID saved.', 'menu-test' ); ?></strong></p></div>
 <?php
    	    }
    
	    if( isset($_POST[ $hidden_field_name2 ]) && $_POST[ $hidden_field_name2] == 'Y' ) 
	    { 
	        // Read their posted value 
	        $opt_val2 = $_POST[ $data_field_name2 ]; // Save the posted value in the database 
	        update_option( $opt_name2, $opt_val2 );  // Put an settings updated message on the screen 
        
 ?>
 <div class="updated"><p><strong><?php _e('Key saved.', 'menu-test' ); ?></strong></p></div>
 <?php 
    	    }
    	    
    	    $count = 0;
    	    $arr=array();
    	    while (true)
    	    {
    	    	    $check = "check".$count;

	    	    if( isset($_POST[$check])) 
		    { // Read their posted value
		    	$arr[$count ++]=$_POST[$check];
	    	    }
	    	    else
	    	    	break;    	   
	    }
	    
	    if (count($arr)>0)
	    {
	    	update_option($opt_name4, $arr);
    	   	$opt_val4=$arr;
	    }
	    
	    
	    if( isset($_POST[ $hidden_field_name5 ]) && $_POST[ $hidden_field_name5] == 'Y' ) 
	    { 
	        // Read their posted value 
	        $opt_val5 = $_POST[ $data_field_name5 ]; // Save the posted value in the database 
	        update_option( $opt_name5, $opt_val5 );  // Put an settings updated message on the screen 
        
 ?>
 <div class="updated"><p><strong><?php _e('Post count updated.', 'menu-test' ); ?></strong></p></div>
 <?php 
    	    }
    	    
    	     if( isset($_POST[ $hidden_field_name6 ])) 
	    {
	        $opt_val6 = $_POST[ $hidden_field_name6 ]; // Save the posted value in the database 
	        update_option( $opt_name6, $opt_val6 );  // Put an settings updated message on the screen
        
 ?>
 <div class="updated"><p><strong><?php _e('Searcg index updated.', 'menu-test' ); ?></strong></p></div>
 <?php 
    	    }
    	    
    	    if( isset($_POST[ $hidden_field_name7 ]) && $_POST[ $hidden_field_name7 ] == 'Y' ) 
	    {
	        $opt_val7 = $_POST[ $data_field_name7 ]; // Save the posted value in the database
	        update_option( $opt_name7, $opt_val7 ); // Put an settings updated message on the screen 
        
 ?>
 <div class="updated"><p><strong><?php _e('Search keywords saved.', 'menu-test' ); ?></strong></p></div>
 <?php
    	    }
    	    
    	    if( isset($_POST[ $hidden_field_name8 ]) && $_POST[ $hidden_field_name8 ] == 'Y' ) 
	    {
	        $opt_val8 = $_POST[ $data_field_name8 ]; // Save the posted value in the database
	        update_option( $opt_name8, $opt_val8 ); // Put an settings updated message on the screen 
        
 ?>
 <div class="updated"><p><strong><?php _e('Search keywords saved.', 'menu-test' ); ?></strong></p></div>
 <?php
    	    }  	   
    }
    
    // Now display the settings editing screen 
    echo '<div class="wrap">'; 
    //header 
    echo "<h2>" . __( 'Set Amazon Product Advertising API Settings', 'menu-test' ) . "</h2>"; 
    //settings form 
?>

    <form name="form1" method="post" action="">
    <input type="hidden" name="<?php echo $hidden_field_name1; ?>" value="Y">
    <input type="hidden" name="<?php echo $hidden_field_name2; ?>" value="Y">
    <input type="hidden" name="<?php echo $hidden_field_name3; ?>" value="N">
    <input type="hidden" name="<?php echo $hidden_field_name5; ?>" value="Y">
    <input type="hidden" name="<?php echo $hidden_field_name6; ?>" value="">
    <input type="hidden" name="<?php echo $hidden_field_name7; ?>" value="Y">
    <input type="hidden" name="<?php echo $hidden_field_name8; ?>" value="Y">
    <input type="hidden" name="<?php echo $hidden_field_name9; ?>" value="N">

    <p><?php _e("Amazon ID:", 'menu-test' ); ?>
	   <input type="text" name="<?php echo $data_field_name1; ?>" value="<?php echo $opt_val1; ?>" size="20">	   
    </p>

    <p><?php _e("Amazon Key:", 'menu-test' ); ?> 
        <input type="text" name="<?php echo $data_field_name2; ?>" value="<?php echo $opt_val2; ?>" size="20">
    </p>
    
    <p><?php _e("Number of posts to create:", 'menu-test' ); ?> 
        <input type="text" name="<?php echo $data_field_name5; ?>" value="<?php echo $opt_val5; ?>" size="3">
    </p>
    
    <p><?php _e("Item description length:", 'menu-test' ); ?> 
        <input type="text" name="<?php echo $data_field_name8; ?>" value="<?php echo $opt_val8; ?>" size="3">
    </p>
    
    <p><?php _e("Producr index to search:", 'menu-test' ); ?> 
	<?php
		 $index_array=viv_get_all_search_indexes();
		 echo '<select name="indices" style="padding-left:30px;">';
		    foreach ($index_array as $index)
		    {
		    	echo '<option value="'.$index.'" ';		    	
		    	if ($index == $opt_val6)
		    		echo 'selected';
		    	echo ' >'.$index.'</option>';
		    }
		 echo '</select>';
	?>
     </p>
     
    <p><?php _e("Search keywords:", 'menu-test' ); ?> 
        <input type="text" name="<?php echo $data_field_name7; ?>" value="<?php echo $opt_val7; ?>" size="100">
    </p>
    
    <?php     	
    	display_cat_list($opt_val4); 
    ?>

    <p>*Please remember to save the changes that you've made BEFORE selecting "Run" or "Delete All"</p>
    
     <p class="submit">
        <input type="submit" onclick="var select_ctrl=document.getElementsByName('indices')[0]; document.getElementsByName('<?php echo $hidden_field_name6; ?>')[0].value=(select_ctrl.options[select_ctrl.selectedIndex]).value;" 
        	name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
        <input type="submit" onclick="document.getElementsByName('<?php echo $hidden_field_name3; ?>')[0].value='Y';" name="SubRun" class="button-primary" value="<?php esc_attr_e('Run') ?>" />
	<input type="submit" onclick="document.getElementsByName('<?php echo $hidden_field_name9; ?>')[0].value='Y';" name="SubDel" class="button-primary" value="<?php esc_attr_e('Delete Everything') ?>" />
    </p>
    <p>
    	
    </p>
    </form>
</div>
<?php

function display_cat_list($presets)
{
	$args=array(
		'orderby' => 'name',
		'order' => 'ASC',
		'hide_empty' => 0
	);
	$categories=get_categories($args);
	echo 'Categories:';
	$count=0;
	echo '<ul style="padding-left:30px;" >';
	foreach($categories as $category) {
		echo '<li><input type="checkbox" name="check'.$count.'" value="'.$category->term_id.'"';
		if (isset($presets[$count]))
			echo 'checked ';
		echo '/><span style="padding-left:10px;">'.$category->name.'</span></li>';		
		$count ++; 
	}
	echo '</ul>';	
}

function RunScript()
{
	$total_results=0;
	$total_posted=0;
	$to_be_posted= get_option('vivazon_post_count');
	$last_posted=0;
	$reamining_to_be_posted=0;
	$page=1;
	
	while ($total_posted < $to_be_posted)
	{
		if ($total_posted%10 == 0)
		{	
			$pxml = aws_signed_request("com",array("Operation"=>"ItemSearch","ItemPage"=>$page,"SearchIndex"=>get_option('vivazon_index'),"Keywords"=>get_option('vivazon_keywords'),"ResponseGroup"=>"Large,OfferFull,Variations"), get_option( 'vivazon_id' ), get_option( 'vivazon_key' ));	
			echo "<p>Last Request:".get_option('vivazon_last_req')."</p>";
			$page ++;
		}
		
		if ($total_results==0)
		{
			$total_results=$pxml->Items->TotalResults;
			if ($to_be_posted > $total_results)
				$to_be_posted=$total_results;
		}
		if ($remaining_to_be_posted==0)
			$remaining_to_be_posted=$to_be_posted;
	
		if ($pxml->Items->Request->Errors->Error[0])
		{
			wp_die('<p>The reply from Amazon indicates that the search was erronous. Please check all the parameters and re-run the request</p>');		
		}
		
		
		if ($remaining_to_be_posted <= 10)
			$last_posted=scrape_xml($pxml,$remaining_to_be_posted);
		else
			$last_posted=scrape_xml($pxml,10);
			
		
		$total_posted += $last_posted;
		$remaining_to_be_posted -= $last_posted;
		echo '<p>Total posted:'.$total_posted.'</p>';
		echo '<p>Remaining:'.$remaining_to_be_posted.'</p>';
	}
	
	return $pxml;
}

function scrape_xml($axml, $to_post)
{
	//$xml = new SimpleXMLElement($axml);
	$title="";
	$body="<a href\"http::steamsigs.com\">visit</a><br /><p>Test</p>";
	$post_count = 0;
	//$total_post_count = get_option('vivazon_post_count');
	
	/*if ($total_post_count < 1 || $total_post_count > 10)
	{
		echo 'Post count has to be between 1 and 10. Setting the default value of 1';
		$total_post_count=1;
	}*/
	
	foreach ($axml->Items->Item as $item)
	{
		if (! $item)
			break;
			
		$post_id = viv_is_post_in_db($item->ASIN);
		if ($post_id)
		{
			echo ("<p>Found duplicate ASIN:".$item->ASIN." in post ".$post_id.". Moving it to Trash.</p>");
			if (! viv_delete_post_from_db($post_id))
					echo ("<p>Deleting ASIN entry in the main table also failed.</p>");
			if (! wp_trash_post($post_id))
			{
				echo ("<p>Trashing failed. Deleting ASIN entry anyway. Please review manually</p>");
				//++$post_count;				
				//continue;
			}
		}
		$best_offer_index=viv_get_best_deal_index($item);
		$best_offer=$item->Offers->Offer[$best_offer_index];		
		
		$body=viv_create_body($item->ItemAttributes->Title,
				$item->ItemAttributes->Brand,
				viv_get_item_rating($item->ASIN),
				$item->MediumImage->URL,50,$item->ItemAttributes->ListPrice->FormattedPrice,
				$best_offer->OfferListing->Price->FormattedPrice,
				$best_offer->OfferListing->AmountSaved->FormattedPrice,
				$best_offer->OfferListing->PercentageSaved,
				$item->EditorialReviews->EditorialReview[0]->Content, get_option(vivazon_len_desc),
				$item->DetailPageURL);
				
		$title=$item->ItemAttributes->Title;
		
		if ($best_offer->OfferListing->PercentageSaved > 0)
			$title=$title." ".$best_offer->OfferListing->PercentageSaved."% off";
		
		$post_id_new = viv_create_post($title,$body);
			
		if (! $post_id_new)
		{
			echo ("<p>Failed to create post. Item will not show up in final result.</p>");
			++$post_count;
			continue;
		}
		
		if(! viv_insert_in_to_db($item->ASIN, $post_id_new))
		{
			wp_die('Failed to enter ASIN to database. Aborting');
		}
		
		if (++$post_count >= $to_post)
			break;
	}
	
	return $post_count;
}

function viv_get_best_deal_index($item)
{
	$offer_num=$item->Offers->TotalOffers;
	$temp_price=-1;
	$best_offer_index=0;
	
	for ($i=0; $i < $offer_num; ++$i)
	{
		$curr_price = $item->Offers->Offer[$i]->OfferListing->Price->Amount;
		if ($temp_price == -1 || $temp_price > $curr_price)
		{
			$temp_price=$curr_price;
			$best_offer_index=$i;
		}
	}
	
	return $best_offer_index;
}

function viv_get_item_rating($asin)
{
	$pxml = aws_signed_request("com",array("Operation"=>"ItemLookup","IdType"=>"ASIN","ItemId"=>$asin,'ResponseGroup'=>'Reviews'), get_option( 'vivazon_id' ), get_option( 'vivazon_key' ));
	//return $pxml->Items->Item[0]->CustomerReviews->AverageRating;		
	return 2;
}

function viv_get_all_search_indexes()
{
	$pxml = aws_signed_request("com",array("Operation"=>"ItemSearch","SearchIndex"=>"HRTYYU","Keywords"=>"hoho"), get_option( 'vivazon_id' ), get_option( 'vivazon_key' ));
	if (!$pxml)
		return null;
	
	$err_str=$pxml->Items->Request->Errors->Error[0]->Message;
	$start_search_str="Valid values include [";
	$end_search_str="].";	
	$pos_start=strpos($err_str,$start_search_str);
	
	if (! $pos_start)
	{
		echo (__LINE__);
		return null;
	}
	
	$pos_start += strlen($start_search_str);	
	$err_str=substr($err_str,$pos_start);	
	
	$err_str=str_replace("','"," ", $err_str);	
	$err_str=str_replace("'"," ", $err_str);	
	
	$tok_array=array();
	$invalid_chars=
	$tok=strtok($err_str," ");
	
	while ($tok)
	{
		$tok=trim($tok);
		if (! strpbrk($tok," |.'") && $tok != "" && strlen($tok) > 2)
		{
			array_push($tok_array,$tok);
		}		
		
		$tok=strtok(" ");
	}	
		
	return $tok_array;
}

function viv_get_item_img_url($asin)
{
	echo "<br />Number 2:<br />";
	$pxml = aws_signed_request("com",array("Operation"=>"ItemLookup","IdType"=>"ASIN","ItemId"=>$asin,'ResponseGroup'=>'Images'), get_option( 'vivazon_id' ), get_option( 'vivazon_key' ));
	return $pxml->Items->Item[0]->MediumImage->URL;
		
}

function viv_create_body ($item_title, $item_company,
		$item_rating,
		$item_image,$image_width,
		$price,$discounted_price,$discount_amount,$discount_perc,
		$description,$description_len, $item_url)
{
	echo '<p>Creating entry for "'.$item_title.'"</p>';
	//$item_url .="/tag=steamsigs07-20";
	if (strlen($description) > $description_len)
		$description=substr($description,0,$description_len)."...<a href=\"".$item_url."\">more</a>";
	
	$temp=(int)(remove_non_numeric($price)) - (int)(remove_non_numeric($discounted_price));
	$has_discount=( $temp > 0 && $temp < ((int)(remove_non_numeric($price))));
	echo '<p>Adding as Discounted Item</p>';
	
		
	$inner_html="<div class=\"wrapper\">".
		"<div class=\"body\">".
			"<table style=\"border:0;padding:0;margin:0;spacing:0;\">".
				"<tr><td style=\"border:0;padding:0;margin:0;spacing:0;\">".
					"<div class=\"left_image\" style=\"float:left;\">".
						"<a href=\"".$item_url."\" onMouseOver =\"this.style.backgroundColor='transparent';\"><img style=\"vertical-align:left;text-align:left;width=".$image_width."px;\""." src=\"".$item_image."\" /></a>".
					"</div>".
				"</td>".
				"<td style=\"border:0;padding:0;margin:0;spacing:0;text-align:left;\">".
					"<div class=\"right_text\" style=\"float:right;\">".
						"<span style=\"text-align:left;\"><h2>".$item_title."</h2></span><p /><br />".
						"<span style=\"text-align:left;\">by ".$item_company."</span><hr />".
						"<!--span style=\"text-align:left;\">[Rating:".$item_rating."/5]</a></span><hr /-->".
						"<span style=\"text-align:left;".($discount_perc>0?"text-decoration:line-through;":"")."\">Price:".$price."</span><br />".
						($has_discount ?"<span style=\"text-align:left;\">Discounted Price:<span style=\"color:red;font-weight:bold\">".$discounted_price."</span></span><br />":"").
						($has_discount ?"<span style=\"text-align:left;\">Discount Amount:".$discount_amount." (".$discount_perc."%)</span><br />":"").
						"<span style=\"text-align:left;\"><a href=\"".$item_url."\" onMouseOver =\"this.style.backgroundColor='transparent';\" ><img style=\"text-align:left;vertical-align:left;\" src=\"".bloginfo('wpurl')."wp-content/plugins/vivamazon/buy_amazon.gif"."\" /></a></span><br />".
					"</div>".
				"</td></tr>".
			"</table>".
			"<div class=\"main_text\" style=\"padding:10px 0 20px 0;\">".
				"<span style=\"text-align:right;\">".$description."</span><br />".
			"</div>".
		"</div>".
	"</div>";
	
	return $inner_html;
}

function remove_non_numeric($string) 
{
	return preg_replace('/\D/', '', $string);
}

function viv_create_post ($title,$body)
{	
	$arr=get_option('vivazon_category');

	// Create post object
	$my_post = array(
		'post_title' => $title,
		'post_content' => $body,
		'post_status' => 'publish',
		'post_author' => 1,
		'post_category' => $arr
	);
	
	// Insert the post into the database
	$ret_val = wp_insert_post($my_post);
	if (! $ret_val)
	{
		echo ("<p>Failed</p>");
	}
	
	return $ret_val;
}

function viv_insert_in_to_db($item_asin, $post_id)
{
	global $wpdb;
	return $wpdb->insert( $wpdb->prefix . "vivamazon_main", array( 'asin' => $item_asin, 
		'post' => $post_id, 'last_update' => current_time('mysql')) );
}

function viv_delete_post_from_db($post_id)
{
	global $wpdb;
	return $wpdb->query("DELETE FROM ".$wpdb->prefix."vivamazon_main WHERE post='".$post_id."'");
}

function viv_delete_all_posts_in_db_and_empty_the_db()
{
	global $wpdb;
	$postids=$wpdb->get_col($wpdb->prepare("
		SELECT post
		FROM ".$wpdb->prefix."vivamazon_main"));

	if ($postids) {
	  foreach ($postids as $id) { 
    		$post=intval($id);
		echo '<p>Deleting Entry:Post ID('.$post.'|'.$id.')</p>';
    		if (! viv_delete_post_from_db($post))
			echo ("<p>Deleting ASIN entry in the main table also failed.</p>");
		if (! wp_trash_post($post))
		{
			echo ("<p>Trashing failed. Deleting ASIN entry. Please review manually</p>");
		}
  	  } 
	}
}

// Return post id if true. else false
function viv_is_post_in_db($item_asin)
{
	global $wpdb;
	$asin_posts= $wpdb->get_results("SELECT post FROM ".$wpdb->prefix . "vivamazon_main WHERE asin = '".$item_asin."'");
	echo '<p>Existing posts for item with ASIN '.$item_asin.':'.count($asin_posts).'</p>';
	
	if (count($asin_posts) > 1)
		echo ("Multiple posts with same ASIN. This might be problematic.");
		
	if (count($asin_posts) > 0)
		return $asin_posts[0]->post;
		
	return false;
}

function aws_signed_request($region, $params, $public_key, $private_key)
{
    /*
    Copyright (c) 2009 Ulrich Mierendorff

    Permission is hereby granted, free of charge, to any person obtaining a
    copy of this software and associated documentation files (the "Software"),
    to deal in the Software without restriction, including without limitation
    the rights to use, copy, modify, merge, publish, distribute, sublicense,
    and/or sell copies of the Software, and to permit persons to whom the
    Software is furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
    THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
    FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
    DEALINGS IN THE SOFTWARE.
    */
    
    /*
    Parameters:
        $region - the Amazon(r) region (ca,com,co.uk,de,fr,jp)
        $params - an array of parameters, eg. array("Operation"=>"ItemLookup",
                        "ItemId"=>"B000X9FLKM", "ResponseGroup"=>"Small")
        $public_key - your "Access Key ID"
        $private_key - your "Secret Access Key"
    */

    // some paramters
    $method = "GET";
    $host = "ecs.amazonaws.".$region;
    $uri = "/onca/xml";
    
    // additional parameters
    $params["Service"] = "AWSECommerceService";
    $params["AWSAccessKeyId"] = $public_key;
    // GMT timestamp
    $params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z");
    // API version
    $params["Version"] = "2009-03-31";
    
    // sort the parameters
    ksort($params);
    
    // create the canonicalized query
    $canonicalized_query = array();
    foreach ($params as $param=>$value)
    {
        $param = str_replace("%7E", "~", rawurlencode($param));
        $value = str_replace("%7E", "~", rawurlencode($value));
        $canonicalized_query[] = $param."=".$value;
    }
    $canonicalized_query = implode("&", $canonicalized_query);
    
    // create the string to sign
    $string_to_sign = $method."\n".$host."\n".$uri."\n".$canonicalized_query;
    
    // calculate HMAC with SHA256 and base64-encoding
    $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $private_key, True));
    
    // encode the signature for the request
    $signature = str_replace("%7E", "~", rawurlencode($signature));
    
    // create request
    $request = "http://".$host.$uri."?".$canonicalized_query."&Signature=".$signature;
    update_option('vivazon_last_req',$request);
    
    // do request
    $response = @file_get_contents($request);
    
    if ($response === False)
    {
        return False;
    }
    else
    {
        // parse XML
        $pxml = simplexml_load_string($response);
        if ($pxml === False)
        {
            return False; // no xml
        }
        else
        {
            return $pxml;
        }
    }
}

?>