<?php namespace App\Http\Controllers;

use Symfony\Component\Stopwatch\Stopwatch;
use Illuminate\Http\Request;
use App\Article;
use App\MyInfo;
use App\Tag;
use App\Category;
use Carbon\Carbon;
use Redirect;

class RequestController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Search Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this-> middleware('guest');
	}

	public function welcome()
	{
				
		return view('Requests.welcome');
	}

	public function get()
	{
				
		return view('Requests.get');
	}

	public function post()
	{
				
		return view('Requests.post');
	}

	public function put()
	{
				
		return view('Requests.put');
	}

	public function delete()
	{
				
		return view('Requests.delete');
	}

	public function postTest()
	{
				
			return '200';
	}

	public function putTest()
	{
				
				return '200';
	}

	public function deleteTest()
	{
				
			return '200';
	}

	/**
	 * Search
	 *
	 * @return Response
	 */
	public function RequestGet(Request $request)
	{
		$TotalRequests = [];
		$sum = 0.0;
		$media = 0.0;
		$url = str_contains($request->url, 'http') ? $request->url : 'http://'.$request->url;
		$stopwatchTime = new Stopwatch();
		$stopwatchTime-> start('totalRequestTime');
		for ($i = 0; $i < 10; $i++) 
		{ 
		 	$output = $this->StartGetRequest($url);
		 	$sum += $output;
		 	$TotalRequests[$i] = $this->formatMilliseconds($output);
		}
		$eventTime = $stopwatchTime->stop('totalRequestTime');
		$eventTime =  $this->formatMilliseconds($eventTime->getDuration()).'s';
		$media = $sum / 10;
		$media = $this->formatMilliseconds($media).'s';
		//dd($TotalRequests);
		return view('Requests.get', compact('TotalRequests', 'url', 'media', 'eventTime'));

	}

	public function RequestPost(Request $request)
	{
		
		$TotalRequests = [];
		$sum = 0.0;
		$media = 0.0;
		$url = str_contains($request->url, 'http') ? $request->url : 'http://'.$request->url;
		$body =  $request->body;
		$requestType = $request->type;

		$stopwatchTime = new Stopwatch();
		$stopwatchTime-> start('totalRequestTime');
		for ($i = 0; $i < 10; $i++) 
		{ 
		 	$output = $this->StartPostRequest($url, $body, $requestType);
		 	$sum += $output;
		 	$TotalRequests[$i] = $this->formatMilliseconds($output);
		}
		$eventTime = $stopwatchTime->stop('totalRequestTime');
		$eventTime =  $this->formatMilliseconds($eventTime->getDuration()).'s';
		$media = $sum / 10;
		$media = $this->formatMilliseconds($media).'s';
		//dd($TotalRequests);
		return view('Requests.post', compact('TotalRequests', 'url', 'media', 'eventTime'));

	}

	public function RequestPut(Request $request)
	{
		
		$TotalRequests = [];
		$sum = 0.0;
		$media = 0.0;
		$url = str_contains($request->url, 'http') ? $request->url : 'http://'.$request->url;
		$body =  $request->body;
		$requestType = $request->type;

		$stopwatchTime = new Stopwatch();
		$stopwatchTime-> start('totalRequestTime');
		for ($i = 0; $i < 10; $i++) 
		{ 
		 	$output = $this->StartPutRequest($url, $body, $requestType);
		 	$sum += $output;
		 	$TotalRequests[$i] = $this->formatMilliseconds($output);
		}
		$eventTime = $stopwatchTime->stop('totalRequestTime');
		$eventTime =  $this->formatMilliseconds($eventTime->getDuration()).'s';
		$media = $sum / 10;
		$media = $this->formatMilliseconds($media).'s';
		//dd($TotalRequests);
		return view('Requests.put', compact('TotalRequests', 'url', 'media', 'eventTime'));

	}

	public function RequestDelete(Request $request)
	{
		$TotalRequests = [];
		$sum = 0.0;
		$media = 0.0;
		$url = str_contains($request->url, 'http') ? $request->url : 'http://'.$request->url;
		$stopwatchTime = new Stopwatch();
		$stopwatchTime-> start('totalRequestTime');
		for ($i = 0; $i < 10; $i++) 
		{ 
		 	$output = $this->StartDeleteRequest($url);
		 	$sum += $output;
		 	$TotalRequests[$i] = $this->formatMilliseconds($output);
		}
		$eventTime = $stopwatchTime->stop('totalRequestTime');
		$eventTime =  $this->formatMilliseconds($eventTime->getDuration());
		$media = $sum / 10;
		$media = $this->formatMilliseconds($media).'s';
		//dd($TotalRequests);
		return view('Requests.delete', compact('TotalRequests', 'url', 'media', 'eventTime'));

	}

	public function StartGetRequest($url)
	{
		$stopwatch = new Stopwatch();
		$stopwatch-> start('request');

		$client = new \Guzzle\Service\Client($url);
		$client->setDefaultOption('config', ['curl' => ['CURLOPT_TIMEOUT' => 9000]]);
		$response = $client->get($url)->send();
	
		$event = $stopwatch->stop('request');
		$output = $event->getDuration();

		return $output;
	}
	public function StartPostRequest($url, $body, $requestType)
	{
		if($requestType == 'xml')
		{
			$contentType =  'application/xml';
		}
		else 
		{
			$contentType =  'application/json';
		}

		$stopwatch = new Stopwatch();
		$stopwatch-> start('request');

		$client = new \Guzzle\Service\Client($url);
		$client->setDefaultOption('config', ['curl' => ['CURLOPT_TIMEOUT' => 9000]]);
		
		$request = $client->post($url,array(
                'content-type' => $contentType 
        ),array());
		$request->setBody($body); #set body!
		$response = $request->send();
	
		$event = $stopwatch->stop('request');
		$output = $event->getDuration();

		return $output;
	}

	public function StartPutRequest($url, $body, $requestType)
	{
		if($requestType == 'xml')
		{
			$contentType =  'application/xml';
		}
		else 
		{
			$contentType =  'application/json';
		}

		$stopwatch = new Stopwatch();
		$stopwatch-> start('request');

		$client = new \Guzzle\Service\Client($url);
		$client->setDefaultOption('config', ['curl' => ['CURLOPT_TIMEOUT' => 9000]]);
		
		$request = $client->put($url,array(
                'content-type' => $contentType 
        ),array());
		$request->setBody($body); #set body!
		$response = $request->send();
	
		$event = $stopwatch->stop('request');
		$output = $event->getDuration();

		return $output;
	}

	public function StartDeleteRequest($url)
	{
		$stopwatch = new Stopwatch();
		$stopwatch-> start('request');

		$client = new \Guzzle\Service\Client($url);
		$client->setDefaultOption('config', ['curl' => ['CURLOPT_TIMEOUT' => 9000]]);
		$response = $client->delete($url)->send();
	
		$event = $stopwatch->stop('request');
		$output = $event->getDuration();

		return $output;
	}
	
	public function formatMilliseconds($milliseconds) {
	    $seconds = floor($milliseconds / 1000) % 60;
	    $milliseconds = $milliseconds % 1000;

	    $format = '%01u.%02u';
	    $time = sprintf($format, $seconds, $milliseconds);
	    return rtrim($time, '0');
	}
}