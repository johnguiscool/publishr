<?php

namespace App\Http\Controllers;

use App\Story;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
    	$stories = Story::all();

    	echo "<ul>";
    	foreach($stories as $story)
    	{
    		echo "<li>$story->title</li>";
    	}
    	echo "</ul>";
    }

    public function displayStory($id) {
    	$story = Story::where('id',$id)->get()->first();

    	echo $story->content;
    }
}
