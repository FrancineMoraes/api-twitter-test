<?php

namespace App\Repositories;

use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\DB;
use App\Models\Twitte;

class TwitteRepository
{
    private $twitte;
    private $connection;
    private $access_token;
    private $access_token_secret;

    public function __construct()
    {
        //Iniciando conexão
        define('CONSUMER_KEY', 'RixYJp7XK4TFn6WH4H4PBTtiP');
        define('CONSUMER_SECRET', 'Qirwz35AC4HQK7dnKmDugtPHv6r6SPkLhFh1N4l7AVCssP3Q7O');

        $this->access_token = '354094945-Y9b8opOcHumygRlKWEc7laZtUABtZPh5n1VS4lo4';
        $this->access_token_secret = 'mK3pEqKfTyRjdH0wV9VeKKdei5zUkGjogrVBPrWctkNf4';

        $this->connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $this->access_token, $this->access_token_secret);
        
    }

    public function index()
    {
        //Salvando twitte no banco de dados
        $tweets = $this->connection->get('statuses/user_timeline', ['user_id' => '50393960', 'count' => 50]);
        
        foreach($tweets as $tweet)
        {
            $this->twitte = new Twitte();
            $this->twitte->id = isset($tweet->id) ? $tweet->id : '';
            $this->twitte->created = isset($tweet->created_at)  ? date("Y-m-d H:i:s", strtotime($tweet->created_at)) : '';
            $this->twitte->id_str = isset($tweet->id_str) ? $tweet->id_str : '';
            $this->twitte->text = isset($tweet->text) ? $tweet->text : '';
            $this->twitte->truncated = isset($tweet->truncated) ? $tweet->truncated : 0;
            $this->twitte->source = isset($tweet->source) ? $tweet->source : '';
            $this->twitte->in_reply_to_status_id = isset($tweet->in_reply_to_status_id) ? $tweet->in_reply_to_status_id : null;
            $this->twitte->in_reply_to_status_id_str = isset($tweet->in_reply_to_status_id_str) ? $tweet->in_reply_to_status_id_str : null;
            $this->twitte->in_reply_to_user_id = isset($tweet->in_reply_to_user_id) ? $tweet->in_reply_to_user_id : null;
            $this->twitte->in_reply_to_user_id_str = isset($tweet->in_reply_to_user_id_str) ? $tweet->in_reply_to_user_id_str : null;
            $this->twitte->in_reply_to_screen_name = isset($tweet->in_reply_to_screen_name) ? $tweet->in_reply_to_screen_name : null;
            $this->twitte->geo = isset($tweet->geo) ? $tweet->geo : null;
            $this->twitte->coordinates = isset($tweet->coo03rdinates) ? $tweet->coordinates : null;
            $this->twitte->place = isset($tweet->place) ? $tweet->place : null;
            $this->twitte->contributors = isset($tweet->contributors) ? $tweet->contributors : null;
            $this->twitte->is_quote_status = isset($tweet->is_quote_status) ? $tweet->is_quote_status : false;
            $this->twitte->retweet_count = isset($tweet->retweet_count) ? $tweet->retweet_count : 0;
            $this->twitte->favorite_count = isset($tweet->favorite_count) ? $tweet->favorite_count : 0;
            $this->twitte->favorited = isset($tweet->favorited) ? $tweet->favorited : false;
            $this->twitte->retweeted = isset($tweet->retweeted) ? $tweet->retweeted : false;
            $this->twitte->possibly_sensitive = isset($tweet->possibly_sensitive) ? $tweet->possibly_sensitive : false;
            $this->twitte->lang = isset($tweet->lang) ? $tweet->lang : 'en';
            $this->twitte->save();
        }

    }
    
    //Retorne todos os tweets que tenham sido criados de 7 dias antes da data do
    //seu teste até 2 dias antes da data do seu teste, em ordem dos mais recentes aos
    //mais antigos.
    public function beforeSevenDays($order, $orderBy)
    {
        $date_test_seven = '2019-03-19';
        $date_test_two = '2019-03-24';

        if($order != null)
        {
            if($orderBy == 'likes')
            {
                $tweetes = Twitte::where('created', '>=', $date_test_seven)->where('created', '<=', $date_test_two)->orderBy('created', 'DESC')->orderBy('favorite_count', $order)->get();
            }   
            else
            {
                $tweetes = Twitte::where('created', '>=', $date_test_seven)->where('created', '<=', $date_test_two)->orderBy('created', 'DESC')->orderBy('retweet_count', $order)->get();
            }
        }
        else
        {
            $tweetes = Twitte::where('created', '>=', $date_test_seven)->where('created', '<=', $date_test_two)->orderBy('created', 'DESC')->get();
        }
        
        return $tweetes->toJson();

    }

    // Retorne todos os tweets que possuam mais de 3000 likes mas menos de 2500RTs.
    public function moreThan3000lessThan2500($order, $orderBy)
    {
        if($order != null)
        {
            if($orderBy == 'likes')
            {
                $tweetes = Twitte::where('favorite_count' > 3000)->where('retweet_count' < 2500)->orderBy('favorite_count', $order)->get();
            }   
            else
            {
                $tweetes = Twitte::where('favorite_count' > 3000)->where('retweet_count' < 2500)->orderBy('retweet_count', $order)->get();
            }
        
        }
        else
        {
            $tweetes = Twitte::where('favorite_count' > 3000)->where('retweet_count' < 2500)->get();
        }
        
        return $tweetes->toJson();

    }

    // Retorne o content do tweet com mais RTs
    public function moreRT($order, $orderBy)
    {
        $count = Twitte::max('retweet_count');

        if($order != null)
        {
            if($orderBy == 'likes')
            {
                $tweetes = Twitte::whereRaw('retweet_count >= (select MAX(retweet_count) from twittes)')->select('text')->orderBy('favorite_count', $order)->get();
            }   
            else
            {
                $tweetes = Twitte::whereRaw('retweet_count >= (select MAX(retweet_count) from twittes)')->select('text')->orderBy('retweet_count', $order)->get();
            }
        
        }
        else
        {
            $tweetes = Twitte::whereRaw('retweet_count >= (select MAX(retweet_count) from twittes)')->select('text')->get();
        }
        
        return $tweetes->toJson();

    }
    
    // Retorne todas as localidades únicas dos tweets que estejam disponíveis na
    //sua extração. Se houverem tweets sem localização, o termo "Sem Localização" é o
    //termo que deve ser retornado.
    public function locale($order, $orderBy)
    {
        if($order != null)
        {
            if($orderBy == 'likes')
            {
                $tweetes = Twitte::where('place', '!=', null)->orderBy('favorite_count', $order)->get();
            }
            else
            {
                $tweetes = Twitte::where('place', '!=', null)->orderBy('retweet_count', $order)->get();
            }

            $tweetes = Twitte::where('place', '!=', null)->get();
        }
        
        if($tweetes == [])
        {
            return 'Sem localização';
        }
        else
        {
            return $tweetes->toJson();
        }
    }

}