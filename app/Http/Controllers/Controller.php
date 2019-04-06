<?php

namespace App\Http\Controllers;

use App\Story;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
    	$stories = Story::all();

    	return view('index', ['stories' => $stories]);
    }

    public function displayStory($id) {
    	$story = Story::where('id',$id)->get()->first();

    	return view('story', ['content'=>$story->content, 'title'=>$story->title, 'isPremium'=>$story->is_premium]);
	}

	public function purchaseStory($id) {
		Stripe::setApiKey(config('services.stripe.secret'));

		$customer = Customer::create([
			'email' => request('stripeEmail'),
			'source' => request('stripeToken')
		]);

		Charge::create([
			'customer' => $customer->id,
			'amount' => 99,
			'currency' => 'usd'
		]);

		return redirect("/story/$id");
	}
}
