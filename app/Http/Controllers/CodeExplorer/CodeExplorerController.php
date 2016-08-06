<?php

namespace CodeExplorer\Http\Controllers\CodeExplorer;

use Illuminate\Http\Request;

use CodeExplorer\Http\Requests;
use GuzzleHttp\Client as GuzzleHttpClient;
use CodeExplorer\Http\Controllers\Controller;

class CodeExplorerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $client = new GuzzleHttpClient();
            // $apiUrl = "https://api.github.com/repos/nicolas-grekas/symfony/commits/master?per_page=10";
            // $apiUrl = "https://api.github.com/repos/nicolas-grekas/symfony/commits?per_page=2";
            $apiUrl = "https://api.github.com/repos/sambhuWeb/smallsites/commits?per_page=2";

            $apiRequest = $client->request('GET', $apiUrl,
                [
                    // 'per_page' => 10
                    //'auth' => ['sambhuRajSingh', '*****']
                ]
            );
            $commits = collect(json_decode($apiRequest->getBody()->getContents()));
            foreach ($commits as $commit) {
                dd($commit->commit->author);
            }
            pp($commits->items[0]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return view('welcome');
    }
}
