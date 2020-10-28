<?php

namespace Bitcoin;

use DOMDocument;
use DOMNode;

class bitcoin
{
  protected $bitcoin = [];

  public function __construct()
  {
    $this->getCurrentPrice();
  }

  public function getCurrentPrice(){
    $ticker_price = [];

    $handle = curl_init('https://www.bitcoin.de/de');
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_exec($handle);

    $oDOM = new DOMDocument();

    $oDOM->loadHTML(curl_exec($handle));

    $ticker_price[] = $oDOM->getElementsByTagName('div');

    $this->setBitcoin($ticker_price);
  }

  public function getBitcoin(){
    return $this->bitcoin;
  }

  protected function setBitcoin($bitcoin_price){
    $this->bitcoin = $bitcoin_price;
  }
}