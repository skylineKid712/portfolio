<?php
  class Car
  {
    public $rank = 0;
    public $year = 1900;
    public $make = "";
    public $model = "";
    
    //Consrtuctor
    function __construct($rank, $year, $make, $model)
    {
      $this -> setRank ($rank);
      $this -> setYear ($year);
      $this -> setMake ($make);
      $this -> setModel ($model);
    }
    
    //rank setter
    function setRank ($rank)
    {
      $this->rank = $rank;
    }
    
    //rank getter
    function getRank ()
    {
      return $this ->rank;
    }
    
    //year setter
    function setYear ($year)
    {
      $this ->year = $year;
    }
    
    //year getter
    function getYear ()
    {
      return $this ->year;
    }
    
    //make setter
    function setMake ($make)
    {
      $this -> make = $make;
    }
    
    //make getter
    function getMake ()
    {
      return $this ->make;
    }
    
    //model setter
    function setModel ($model)
    {
      $this -> model = $model;
    }
    
    //model getter
    function getModel ()
    {
      return $this ->model;
    }
    
    //toString
    function toString ()
    {
      return $rank . "," . $year . "," . $make . "," . $model;
    }
  }
?>