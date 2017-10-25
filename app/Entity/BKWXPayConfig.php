<?php namespace App\Entity;

class BKWXPayConfig extends M3Result {

  public $timestamp;
  public $nonceStr;
  public $package;
  public $signType;
  public $paySign;
}
