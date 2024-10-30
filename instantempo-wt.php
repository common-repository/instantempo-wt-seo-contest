<?php


// Instantempo WT seo contest
//
// Copyright (c) 2010 Web and Tech (info@webandtech.it).
// http://instantempo.webandtech.it/
//
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// This is an add-on for WordPress
// http://wordpress.org/
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// *****************************************************************


/*
 Plugin Name: Instantempo WT seo contest
 Plugin URI: http://instantempo.webandtech.it/wordpress-plugin/
 Description: Instantempo contest WT show the tweets for official hashtag "#instantempo" (color and size customizable), your current position, the current podium and phrases about "instante" and "tempo". Very customizable. Use the <a href="options-general.php?page=instantempo-wt.php">configuration page</a> to configure Instantempo WT seo contest plugin.
 Author: Web and Tech
 Version: 1.1.0
 Author URI: http://instantempo.webandtech.it/
 */

$instantempowt_version = "1.1.0";

function instantempowt_config_page(){
  if (function_exists('add_options_page')){
    add_options_page('Instantempo WT', 
                     'Instantempo WT',
                     8,
                     basename(__FILE__),
                     'instantempowt_config'
                     );
  }
}

/*This function show a config page in WP control panel*/

function instantempowt_config(){
  $instantempowt_language_active   = (get_option('instantempowt_language') == 'en') ? 'checked' : '';
  $instantempowt_language_deactive = (get_option('instantempowt_language') == 'it') ? 'checked' : '';
  $instantempowt_tweets_show_active   = (get_option('instantempowt_tweets_show') == 1) ? 'checked' : '';
  $instantempowt_tweets_show_deactive = (get_option('instantempowt_tweets_show') == 0) ? 'checked' : '';
  $instantempowt_tweets_show_title_active   = (get_option('instantempowt_tweets_show_title') == 1) ? 'checked' : '';
  $instantempowt_tweets_show_subject_deactive = (get_option('instantempowt_tweets_show_title') == 0) ? 'checked' : '';
  $instantempowt_tweets_show_subject_active   = (get_option('instantempowt_tweets_show_subject') == 1) ? 'checked' : '';
  $instantempowt_tweets_show_subject_deactive = (get_option('instantempowt_tweets_show_subject') == 0) ? 'checked' : '';
  $instantempowt_position_show_active = (get_option('instantempowt_position_show') == 1) ? 'checked' : '';
  $instantempowt_position_show_deactive = (get_option('instantempowt_position_show') == 0) ? 'checked' : '';
  $instantempowt_podium_active = (get_option('instantempowt_podium') == 1) ? 'checked' : '';
  $instantempowt_podium_deactive = (get_option('instantempowt_podium') == 0) ? 'checked' : '';
  $instantempowt_phrases_active = (get_option('instantempowt_phrases') == 1) ? 'checked' : '';
  $instantempowt_phrases_deactive = (get_option('instantempowt_phrases') == 0) ? 'checked' : '';
  $instantempowt_thanks_link_active = (get_option('instantempowt_thanks_link') == 1) ? 'checked' : '';
  $instantempowt_thanks_link_deactive = (get_option('instantempowt_thanks_link') == 0) ? 'checked' : '';
  
  print('<div class="wrap">
         <h2>Instantempo WT Options Tab</h2>
          <form id="ak_instantempowt" name="instantempowt_cnf" action="'.get_bloginfo('wpurl').'/wp-admin/index.php" method="post">
            <p>Configure Instantempo WT seo contest plugin</p> 
           <fieldset class="options">
            <h3>Language</h3>
            <p>Choose language:
                   <input type="radio" name="instantempowt_language" value="en" id="instantempowt_language_yes" '.$instantempowt_language_active.' />
                     <label for="instantempowt_language_yes">English</label>
                    &nbsp; <input type="radio" name="instantempowt_language" value="it" id="instantempowt_language_no" '.$instantempowt_language_deactive.' />
                     <label for="instantempowt_language_no">Italian</label>
             </p>
            <h3>Tweets</h3>
            <p>Show tweets for #instantempo:
                   <input type="radio" name="instantempowt_tweets_show" value="1" id="instantempowt_tweets_show_yes" '.$instantempowt_tweets_show_active.' />
                     <label for="instantempowt_tweets_show_yes">Yes</label>
                    &nbsp; <input type="radio" name="instantempowt_tweets_show" value="0" id="instantempowt_tweets_show_no" '.$instantempowt_tweets_show_deactive.' />
                     <label for="instantempowt_tweets_show_no">No</label>
             </p>
               <p>Height:
                 <input type="text" name="instantempowt_tweets_height" value="'.get_option('instantempowt_tweets_height').'" size="5" maxlength="3" />px
               </p>
               <p>Scolling interval for tweets (in seconds):
                 <input type="text" name="instantempowt_tweets_interval" value="'.get_option('instantempowt_tweets_interval').'" size="4" maxlength="2" />
               </p>
               <p>Show Box Title: 
                   <input type="radio" name="instantempowt_tweets_show_title" value="1" id="instantempowt_tweets_show_title_yes" '.$instantempowt_tweets_show_title_active.' />
                     <label for="instantempowt_position_show_tweets_title_yes">Yes</label>
                    &nbsp; <input type="radio" name="instantempowt_tweets_show_title" value="0" id="instantempowt_position_show_no" '.$instantempowt_tweets_show_title_deactive.' />
                     <label for="instantempowt_tweets_show_title_no">No</label>
               </p>
               
               <p>Show Box Subject: 
                   <input type="radio" name="instantempowt_tweets_show_subject" value="1" id="instantempowt_tweets_show_subject_yes" '.$instantempowt_tweets_show_subject_active.' />
                     <label for="instantempowt_tweets_show_subject_yes">Yes</label>
                    &nbsp; <input type="radio" name="instantempowt_tweets_show_subject" value="0" id="instantempowt_tweets_show_subject_no" '.$instantempowt_tweets_show_subject_deactive.' />
                     <label for="instantempowt_tweets_show_subject_no">No</label>
               </p>
               
               <p>Box background color:
                 #<input type="text" name="instantempowt_tweets_thbg" value="'.get_option('instantempowt_tweets_thbg').'" size="8" maxlength="6" />
               </p>
               <p>Box text color:
                 #<input type="text" name="instantempowt_tweets_thcl" value="'.get_option('instantempowt_tweets_thcl').'" size="8" maxlength="6" />
               </p>
               <p>Content background color:
                 #<input type="text" name="instantempowt_tweets_ctbg" value="'.get_option('instantempowt_tweets_ctbg').'" size="8" maxlength="6" />
               </p>
               <p>Content text color:
                 #<input type="text" name="instantempowt_tweets_ctcl" value="'.get_option('instantempowt_tweets_ctcl').'" size="8" maxlength="6" />
               <p>Content link color: 
                 #<input type="text" name="instantempowt_tweets_ctlk" value="'.get_option('instantempowt_tweets_ctlk').'" size="8" maxlength="6" />
               </p>
			 <hr />
             <h3>Current position</h3>
             <p>Show my current position
                   <input type="radio" name="instantempowt_position_show" value="1" id="instantempowt_position_show_yes" '.$instantempowt_position_show_active.' />
                     <label for="instantempowt_position_show_yes">Yes</label>
                    &nbsp; <input type="radio" name="instantempowt_position_show" value="0" id="instantempowt_position_show_no" '.$instantempowt_position_show_deactive.' />
                     <label for="instantempowt_position_show_no">No</label>
                   (Showed if you are in TOP 100. Updated every day at 12:00)
             </p>
             <p>Url to check position:
                 http://<input type="text" name="instantempowt_url" value="'.get_option('instantempowt_url').'" size="50" maxlength="100" />
             </p>
			 <hr />
             <h3>Podium</h3>
             <p>Show podium
                   <input type="radio" name="instantempowt_podium" value="1" id="instantempowt_podium_yes" '.$instantempowt_podium_active.' />
                     <label for="instantempowt_podium_yes">Yes</label>
                    &nbsp; <input type="radio" name="instantempowt_podium" value="0" id="instantempowt_podium_no" '.$instantempowt_podium_deactive.' />
                     <label for="instantempowt_podium_no">No</label>
             </p>
             <hr />
             <h3>Phrase</h3>
             <p>Show a phrase about "instante" and "tempo"
                   <input type="radio" name="instantempowt_phrases" value="1" id="instantempowt_phrases_yes" '.$instantempowt_phrases_active.' />
                     <label for="instantempowt_phrases_yes">Yes</label>
                    &nbsp; <input type="radio" name="instantempowt_phrases" value="0" id="instantempowt_phrases_no" '.$instantempowt_phrases_deactive.' />
                     <label for="instantempowt_phrases_no">No</label>
             </p>
             <hr />
             <h3>Thank link</h3>
             <p>Show the thanks link
                   <input type="radio" name="instantempowt_thanks_link" value="1" id="instantempowt_thanks_link_yes" '.$instantempowt_thanks_link_active.' />
                     <label for="instantempowt_thanks_link_yes">Yes</label>
                    &nbsp; <input type="radio" name="instantempowt_thanks_link" value="0" id="instantempowt_thanks_link_no" '.$instantempowt_thanks_link_deactive.' />
                     <label for="instantempowt_thanks_link_no">No</label>
             </p>
            </fieldset>
           <p class="submit">
	    <input type="submit" name="instantempowt_submit_button" value="Update Settings" />
	   </p> 
	  </form> 
         </div>');
}

add_action('admin_menu', 'instantempowt_config_page');

function update_instantempowt_settings(){
  if($_POST['instantempowt_submit_button'] == 'Update Settings'){
    update_option('instantempowt_language',$_POST['instantempowt_language']);
  	update_option('instantempowt_tweets_show',$_POST['instantempowt_tweets_show']);
    update_option('instantempowt_tweets_height',$_POST['instantempowt_tweets_height']);
    update_option('instantempowt_tweets_show_title',$_POST['instantempowt_tweets_show_title']);
    update_option('instantempowt_tweets_show_subject',$_POST['instantempowt_tweets_show_subject']);
    update_option('instantempowt_tweets_interval',$_POST['instantempowt_tweets_interval']);
    update_option('instantempowt_tweets_thbg',$_POST['instantempowt_tweets_thbg']);
    update_option('instantempowt_tweets_thcl',$_POST['instantempowt_tweets_thcl']);
    update_option('instantempowt_tweets_ctbg',$_POST['instantempowt_tweets_ctbg']);
    update_option('instantempowt_tweets_ctcl',$_POST['instantempowt_tweets_ctcl']);
    update_option('instantempowt_tweets_ctlk',$_POST['instantempowt_tweets_ctlk']);
    update_option('instantempowt_position_show',$_POST['instantempowt_position_show']);
    update_option('instantempowt_url',$_POST['instantempowt_url']);
    update_option('instantempowt_podium',$_POST['instantempowt_podium']);
    update_option('instantempowt_phrases',$_POST['instantempowt_phrases']);
    update_option('instantempowt_thanks_link',$_POST['instantempowt_thanks_link']);
    header('Location: '.get_bloginfo('wpurl').'/wp-admin/options-general.php?page=instantempo-wt.php&updated=true');
  }
}

add_action('init', 'update_instantempowt_settings', 9999);

function instantempoWT()
{
	if(get_option('instantempowt_tweets_show')==1)
		echo '<script type="text/javascript" src="http://widgets.twimg.com/j/2/widget.js"></script>';
	
	echo '<script type="text/javascript" src="http://instantempo.wt/js/wp-plugin.js?l='.get_option(instantempowt_language).'&sp='.get_option(instantempowt_position_show).'&p='.get_option(instantempowt_podium).'&st='.get_option('instantempowt_tweets_show').'&th='.get_option(instantempowt_tweets_height).'&tst='.get_option(instantempowt_tweets_show_title).'&tss='.get_option(instantempowt_tweets_show_subject).'&ti='.get_option(instantempowt_tweets_interval).'&ttb='.get_option(instantempowt_tweets_thbg).'&ttc='.get_option(instantempowt_tweets_thcl).'&tcb='.get_option(instantempowt_tweets_ctbg).'&tcc='.get_option(instantempowt_tweets_ctcl).'&tcl='.get_option(instantempowt_tweets_ctlk).'&ph='.get_option(instantempowt_phrases).'&tl='.get_option(instantempowt_thanks_link).'&u='.get_option(instantempowt_url).'"></script>';
}
 
function widget_instantempowt($args) {
  extract($args);
  echo $before_widget;
  echo $before_title;?>Instantempo Seo contest<?php echo $after_title;
  instantempoWT();
  echo $after_widget;
}
 
function instantempowt_init()
{
  register_sidebar_widget(__('Instantempo WT Seo contest'), 'widget_instantempowt');
}
add_action("plugins_loaded", "instantempowt_init");


function instantempowt_install(){
  if(get_option('instantempowt_language' == '') || !get_option('instantempowt_language')){
    update_option('instantempowt_language','en');
	update_option('instantempowt_tweets_show',1);
    update_option('instantempowt_tweets_height',200);
    update_option('instantempowt_tweets_show_title',1);
    update_option('instantempowt_tweets_show_subject',1);
    update_option('instantempowt_tweets_interval',6);
    update_option('instantempowt_tweets_thbg','597887');
    update_option('instantempowt_tweets_thcl','ffffff');
    update_option('instantempowt_tweets_ctbg','f5f5f5');
    update_option('instantempowt_tweets_ctcl','383838');
    update_option('instantempowt_tweets_ctlk','2880a6');
    update_option('instantempowt_position_show',1);
    update_option('instantempowt_url',str_replace("http://", "", get_bloginfo('wpurl'))."/");
    update_option('instantempowt_podium',1);
    update_option('instantempowt_phrases',1);
    update_option('instantempowt_thanks_link',1);
  }
  header('Location: '.get_bloginfo('wpurl').'/wp-admin/options-general.php?page=instantempo-wt.php');
}

if (isset($_GET['activate']) && $_GET['activate'] == 'true') {
	instantempowt_install();
}
?>