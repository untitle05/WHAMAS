<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;


class WebScraperController extends Controller
{
    private $client;
    public  $url;
    public  $crawler;
    public  $filters;
    public  $content = array();

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * This will be used for Outputing our Data
     * and Rendering to browser.
     *
     *
     */
    public function getIndex()
    {
        $this->url = 'http://www.google.com/search?';

        $this->crawler = $this->client->request('GET', $this->url);

        $this->filters = [
            'title'            => '.posts__post-title',
            'short_description'=> '.posts__post-summary',
            'image_preview'    => '.posts__post-preview img',
            'author' 	   => '.posts__post-author-link'
        ];

        $countContent = $this->crawler->filter('a')->count();
        dd($countContent);

        if ($countContent) {
            // loop through in each ".posts--list-large li" to get the data that we need.
            $this->content = $this->crawler->filter('.posts--list-large li')->each(function(Crawler $node, $i) {
                return [
                    'title' 			=> $node->filter($this->filters['title'])->text(),
                    'url' 				=> $this->url.$node->filter($this->filters['title'])->attr('href'),
                    'short_description' => $node->filter($this->filters['short_description'])->text(),
                    'image_preview' 	=> $node->filter($this->filters['image_preview'])->attr('src'),
                    'author' 			=> $node->filter($this->filters['author'])->text()
                ];
            });
        }

        return view('scraping.scraper', ['contents' => $this->content ]);

    }

//    /**
//     * Setup our scraper data. Which includes the url that
//     * we want to scrape
//     *
//     * @param (String) $url = default is NULL
//     *          (String) $method = Method Types its either POST || GET
//     *
//     */
//    public function setScrapeUrl($url = NULL, $method = 'GET')
//    {
//        $this->crawler = $this->client->request($method, $url);
//        return $this->crawler;
//    }

    /**
     * This will get all the return Result from our Web Scraper
     *
     * @return array
     */
//    public function getContents()
//    {
//        return $this->content = $this->startScraper();
//    }

    /**
     * It will handle all the scraping logic, filtering
     * and getting the data from the defined url in our method setScrapeUrl()
     *
     * @return array
     */
//    private function startScraper()
//    {
//        $countContent = $this->crawler->filter('.posts__post-title')->count();
//
//        if ($countContent) {
//            // loop through in each ".posts--list-large li" to get the data that we need.
//            $this->content = $this->crawler->filter('.posts--list-large li')->each(function(Crawler $node, $i) {
//                return [
//                    'title' 			=> $node->filter($this->filters['title'])->text(),
//                    'url' 				=> $this->url.$node->filter($this->filters['title'])->attr('href'),
//                    'short_description' => $node->filter($this->filters['short_description'])->text(),
//                    'image_preview' 	=> $node->filter($this->filters['image_preview'])->attr('src'),
//                    'author' 			=> $node->filter($this->filters['author'])->text()
//                ];
//            });
//        }
//        return $this->content;
//    }

}