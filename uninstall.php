<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit();

function instantempowt_delete_plugin() {
	delete_option('instantempowt_language');
	delete_option('instantempowt_tweets_show');
    delete_option('instantempowt_tweets_height');
    delete_option('instantempowt_tweets_show_title');
    delete_option('instantempowt_tweets_show_subject');
    delete_option('instantempowt_tweets_interval');
    delete_option('instantempowt_tweets_thbg');
    delete_option('instantempowt_tweets_thcl');
    delete_option('instantempowt_tweets_ctbg');
    delete_option('instantempowt_tweets_ctcl');
    delete_option('instantempowt_tweets_ctlk');
    delete_option('instantempowt_position_show');
    delete_option('instantempowt_url');
    delete_option('instantempowt_podium');
    delete_option('instantempowt_phrases');
    delete_option('instantempowt_thanks_link');
}

instantempowt_delete_plugin();

?>