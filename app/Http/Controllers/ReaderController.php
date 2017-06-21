<?php
/**
 * Created by PhpStorm.
 * User: yanccprogramador
 * Date: 08/05/2017
 * Time: 20:33
 */

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\DomCrawler\Crawler;
use \Illuminate\Routing\Controller;

class ReaderController extends Controller
{
    public function buscar(){
        $client = new Client(['base_uri' => 'https://www.sympla.com.br/','verify' => false]);
        $html = $client->request("GET",'');
        $a="";
        $crawler = new Crawler($html->getBody()->read($html->getBody()->getSize()));
        $i=1;
        for($i=1;$i<=8;$i++){
            $a=$a." || ".$crawler->filterXPath("//*[@id=\"container-div\"]/div[$i]/a/div[1]")->nextAll()->text();
        }

        return $a;
    }

}