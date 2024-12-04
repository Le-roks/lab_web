<?php
//DollarCalc.php
class DollarCalc
{
    private $dollar;
    private $product;
    private $service;
    public $rate = 1;

    //request processing
    public function requestCalc($productNow, $serviceNow)
    {
        $this->product = $productNow;
        $this->service = $serviceNow;
        $this->dollar = $this->product + $this->service;
        return $this->requestTotal();
    }

    //result return
    public function requestTotal()
    {
        $this->dollar *= $this->rate;
        return $this->dollar;
    }
}

class EuroCalc
{
    private $euro;
    private $product;
    private $service;
    public $rate = 1;

    //request processing
    public function requestCalc($productNow, $serviceNow)
    {
        $this->product = $productNow;

        $this->service = $serviceNow;

        $this->euro = $this->product + $this->service;
        return $this->requestTotal();
    }

    //result return
    public function requestTotal()
    {
        $this->euro *= $this->rate;
        return $this->euro;
    }

}

//ITarget.php //Target 
interface ITarget
{
    function requester();
}

//EuroAdapter.php //Adapter include_once('EuroCalc.php'); include_once('ITarget.php'); 

class EuroAdapter extends EuroCalc implements ITarget
{
    public function __construct()
    {
        $this->requester();
    }

    function requester()
    {
        $this->rate = .8111;

        return $this->rate;
    }
}

//Client 
class Client
{
    private $requestNow;
    private $dollarRequest;

    public function __construct()
    {
        $this->requestNow = new EuroAdapter();
        $this->dollarRequest = new DollarCalc();
        //get euros

        $euro = "&#8364;";
        echo "Euros: $euro" . $this->makeAdapterRequest($this->requestNow) . "<br/>";

        //conversion into dollars
        echo "Dollars: $" . $this->makeDollarRequest($this->dollarRequest);

    }

    private function makeAdapterRequest(ITarget $req)
    {
        return $req->requestCalc(40, 50);
    }

    private function makeDollarRequest(DollarCalc $req)
    {
        return $req->requestCalc(40, 50);
    }

}

$worker = new Client();
?>