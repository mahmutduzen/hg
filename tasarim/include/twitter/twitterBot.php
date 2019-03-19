<?php
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
# Define constants
define('TWEET_LIMIT', 20);
define('TWITTER_USERNAME', 'envato');
define('CONSUMER_KEY', 'fBL0kw154ooTVfI87cPhfVX3J');
define('CONSUMER_SECRET', '4dsSDRoIUw45PV8ItRiWBTKUd1gOtawlLfNdjQDt2jh6TWVEfI');
define('ACCESS_TOKEN', '2450995603-DhZtftkx7qPVPNYzuNZmUfeGt3q9zts3ZOvjXeW');
define('ACCESS_TOKEN_SECRET', 'YTpfOvXdBd7SmvbhtrNhliWssQrBrom8p3WKYsSZtpcAd');
# Create the connection
$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
# Migrate over to SSL/TLS
$twitter->ssl_verifypeer = true;
# Load the Tweets
$tweets = $twitter->get('statuses/user_timeline', array('screen_name' => TWITTER_USERNAME, 'exclude_replies' => true, 'include_rts' => 1, 'count' => TWEET_LIMIT));
# Example output


if(!empty($tweets)) {
    foreach($tweets as $tweet) {
        
        // var_dump($tweet);
        $tweetText = $tweet->text;
        $tweetText = preg_replace("#(http://|(www.))(([^s<]{4,68})[^s<]*)#", '<a href="http://$2$3" target="_blank">$1$2$4</a>', $tweetText);
        $tweetText = preg_replace("#(https://|(www.))(([^s<]{4,68})[^s<]*)#", '<a href="http://$2$3" target="_blank">$1$2$4</a>', $tweetText);
        $tweetText = preg_replace("/@(w+)/", '<a href="http://www.twitter.com/$1" target="_blank">@$1</a>', $tweetText);
        $tweetText = preg_replace("/#(w+)/", '<a href="http://search.twitter.com/search?q=$1" target="_blank">#$1</a>', $tweetText);
        // echo $tweetText;
    }
}
# Put this after fetching Tweets
$twitter = '';
# Create the HTML output


if(!empty($tweets)) {
    foreach($tweets as $tweet) {

        $tweetText = $tweet->text;
        $tweetText = preg_replace("#(http://|(www.))(([^s<]{4,68})[^s<]*)#", '<a href="http://$2$3" target="_blank">$1$2$4</a>', $tweetText);
        $tweetText = preg_replace("#(https://|(www.))(([^s<]{4,68})[^s<]*)#", '<a href="http://$2$3" target="_blank">$1$2$4</a>', $tweetText);
        $tweetText = preg_replace("/@(w+)/", '<a href="http://www.twitter.com/$1" target="_blank">@$1</a>', $tweetText);
        $tweetText = preg_replace("/#(w+)/", '<a href="http://search.twitter.com/search?q=$1" target="_blank">#$1</a>', $tweetText);

        $date = new DateTime($tweet->created_at);
        $date->setTimezone(new DateTimeZone('America/New_York'));
        $formatted_date = $date->format('H:i, M d');

        $twitter .= '<li>
                        <img  src="'.$tweet->user->profile_image_url.'" />
                        <span>'.$tweetText.'</span>
                        <small>'.$formatted_date.'</small>
                    </li>';
    }
}

echo $twitter;



/*
<?php
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
$consumerKey = ""; // Consumer Key
$consumerSecret = ""; // Consumer Secret
$accessToken = ""; // Access Token
$accessTokenSecret = ""; // Access Token Secret
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
$statues = $connection->post("statuses/update", array("status" => "I'm posting a tweet!"));
?>
*/
?>