<?php

namespace App\Repositories;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitteRepository
{
    private $user;
    private $connection;
    private $access_token;
    private $access_token_secret;

    public function __construct()
    {
        define('CONSUMER_KEY', 'RixYJp7XK4TFn6WH4H4PBTtiP');
        define('CONSUMER_SECRET', 'Qirwz35AC4HQK7dnKmDugtPHv6r6SPkLhFh1N4l7AVCssP3Q7O');

        $this->access_token = '354094945-Y9b8opOcHumygRlKWEc7laZtUABtZPh5n1VS4lo4';
        $this->access_token_secret = 'mK3pEqKfTyRjdH0wV9VeKKdei5zUkGjogrVBPrWctkNf4';

        $this->connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $this->access_token, $this->access_token_secret);
        
        $tweets = $this->connection->get('statuses/user_timeline', ['user_id' => '50393960', 'count' => 50]);
        
        foreach($tweets as $tweet)
        {
            dd($tweet);
        }
        
    }
}