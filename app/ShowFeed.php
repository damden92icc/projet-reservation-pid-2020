<?php

namespace App;
use App\Show;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;


use Illuminate\Database\Eloquent\Model;

class ShowFeed extends Show implements Feedable{
    
    public function toFeedItem(){
        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'updated' => $this->created_at,
            'summary' => $this->description,
           'link' => $this->slug,
           'author' => $this->author,
        ]);
    }
    
    public static function getFeedItems()
    {
     $allSHowRSS =   ShowFeed::all();
     return $allSHowRSS;
     
    // dd($allSHowRSS);
    }
}
