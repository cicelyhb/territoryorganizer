<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Encryptions
 *
 * @author Cicely
 */
class Encryptions {
    private $keys = array(
                         "BvY456Ji",
                         "ZtU670Nk",
                         "EoP731Mw"
//                         "TrS876Qp",
//                         "AnH239Wd",
//                         "XkF571Cl"
                      );
    protected $echaracters;
    protected $pwdkey;
    protected $pwd;
    
    function __construct(){        
       $this->pwdkey=$this->keys[array_rand($this->keys,1)];
    }
    
    public function EncryptConfirmation($confirmationnumber,$passwordkey){
       $this->pwdkey=$passwordkey;
       $this->SetEncryption();      
       $arr_passwordkey=str_split($passwordkey);
       $characters= str_split($confirmationnumber);
       $econfirmationnumber;
       
           foreach($characters as $character){ 
                foreach($this->echaracters as $echaracter){
                    if ($this->pwdkey==$echaracter["key"] && $character==$echaracter["character"]){
                        $econfirmationnumber=$econfirmationnumber.$arr_passwordkey[array_rand($arr_passwordkey,1)].$arr_passwordkey[array_rand($arr_passwordkey,1)].$arr_passwordkey[array_rand($arr_passwordkey,1)].$arr_passwordkey[array_rand($arr_passwordkey,1)].$echaracter["echaracter"];
                    }
                } 
        
       
           }//end foreach
           
           return $econfirmationnumber;
    }
    
    protected function SetEncryption(){
        
        switch($this->pwdkey){
            
               case "BvY456Ji":
               $this->echaracters=array(
                                        array("key"=>"BvY456Ji","character"=>"a","echaracter"=>"hc45ko"),
                                        array("key"=>"BvY456Ji","character"=>"b","echaracter"=>"vm89hi"),
                                        array("key"=>"BvY456Ji","character"=>"c","echaracter"=>"ai27so"),
                                        array("key"=>"BvY456Ji","character"=>"d","echaracter"=>"ml99aj"),
                                        array("key"=>"BvY456Ji","character"=>"e","echaracter"=>"vf07wq"),   
                                        array("key"=>"BvY456Ji","character"=>"f","echaracter"=>"ls37qp"),  
                                        array("key"=>"BvY456Ji","character"=>"g","echaracter"=>"az79rh"),   
                                        array("key"=>"BvY456Ji","character"=>"h","echaracter"=>"vu34ty"), 
                                        array("key"=>"BvY456Ji","character"=>"i","echaracter"=>"nt13ki"),  
                                        array("key"=>"BvY456Ji","character"=>"j","echaracter"=>"bn87ml"),     
                                        array("key"=>"BvY456Ji","character"=>"k","echaracter"=>"za45fe"),    
                                        array("key"=>"BvY456Ji","character"=>"l","echaracter"=>"sq46bg"),  
                                        array("key"=>"BvY456Ji","character"=>"m","echaracter"=>"xw51mi"),  
                                        array("key"=>"BvY456Ji","character"=>"n","echaracter"=>"cg76et"),   
                                        array("key"=>"BvY456Ji","character"=>"o","echaracter"=>"gv81nu"),   
                                        array("key"=>"BvY456Ji","character"=>"p","echaracter"=>"cf90jw"),  
                                        array("key"=>"BvY456Ji","character"=>"q","echaracter"=>"jt29ky"),    
                                        array("key"=>"BvY456Ji","character"=>"r","echaracter"=>"tu22jy"),     
                                        array("key"=>"BvY456Ji","character"=>"s","echaracter"=>"ht56my"),      
                                        array("key"=>"BvY456Ji","character"=>"t","echaracter"=>"bh77ew"),  
                                        array("key"=>"BvY456Ji","character"=>"u","echaracter"=>"kr83ou"),  
                                        array("key"=>"BvY456Ji","character"=>"v","echaracter"=>"vh41sj"), 
                                        array("key"=>"BvY456Ji","character"=>"w","echaracter"=>"tw53yr"),
                                        array("key"=>"BvY456Ji","character"=>"x","echaracter"=>"ne96ky"),      
                                        array("key"=>"BvY456Ji","character"=>"y","echaracter"=>"yo84fi"),    
                                        array("key"=>"BvY456Ji","character"=>"z","echaracter"=>"gu35lp"),               
                                        array("key"=>"BvY456Ji","character"=>"A","echaracter"=>"HE45JU"),
                                        array("key"=>"BvY456Ji","character"=>"B","echaracter"=>"GU89BE"),
                                        array("key"=>"BvY456Ji","character"=>"C","echaracter"=>"AP27BR"),
                                        array("key"=>"BvY456Ji","character"=>"D","echaracter"=>"MG99AR"),
                                        array("key"=>"BvY456Ji","character"=>"E","echaracter"=>"VF07TE"),   
                                        array("key"=>"BvY456Ji","character"=>"F","echaracter"=>"LE37ET"),  
                                        array("key"=>"BvY456Ji","character"=>"G","echaracter"=>"FT79YO"),   
                                        array("key"=>"BvY456Ji","character"=>"H","echaracter"=>"VP34WM"), 
                                        array("key"=>"BvY456Ji","character"=>"I","echaracter"=>"NK13ST"),  
                                        array("key"=>"BvY456Ji","character"=>"J","echaracter"=>"BJ87TI"),     
                                        array("key"=>"BvY456Ji","character"=>"K","echaracter"=>"ME45OE"),    
                                        array("key"=>"BvY456Ji","character"=>"L","echaracter"=>"EN46OM"),  
                                        array("key"=>"BvY456Ji","character"=>"M","echaracter"=>"XC51JO"),  
                                        array("key"=>"BvY456Ji","character"=>"N","echaracter"=>"EG76RV"),   
                                        array("key"=>"BvY456Ji","character"=>"O","echaracter"=>"RY81MP"),   
                                        array("key"=>"BvY456Ji","character"=>"P","echaracter"=>"VG90EI"),  
                                        array("key"=>"BvY456Ji","character"=>"Q","echaracter"=>"JM29LE"),    
                                        array("key"=>"BvY456Ji","character"=>"R","echaracter"=>"TK22EJ"),     
                                        array("key"=>"BvY456Ji","character"=>"S","echaracter"=>"NK56OR"),      
                                        array("key"=>"BvY456Ji","character"=>"T","echaracter"=>"BP77MD"),  
                                        array("key"=>"BvY456Ji","character"=>"U","echaracter"=>"SQ83RT"),  
                                        array("key"=>"BvY456Ji","character"=>"V","echaracter"=>"YI41NK"), 
                                        array("key"=>"BvY456Ji","character"=>"W","echaracter"=>"TP53BN"),
                                        array("key"=>"BvY456Ji","character"=>"X","echaracter"=>"NG96FI"),      
                                        array("key"=>"BvY456Ji","character"=>"Y","echaracter"=>"WR84PK"),    
                                        array("key"=>"BvY456Ji","character"=>"Z","echaracter"=>"GJ35EM"),                
                                        array("key"=>"BvY456Ji","character"=>"0","echaracter"=>"9U22NI"),
                                        array("key"=>"BvY456Ji","character"=>"1","echaracter"=>"9U26NE"),
                                        array("key"=>"BvY456Ji","character"=>"2","echaracter"=>"9U56NF"),
                                        array("key"=>"BvY456Ji","character"=>"3","echaracter"=>"9U42ND"),
                                        array("key"=>"BvY456Ji","character"=>"4","echaracter"=>"9U32NH"),
                                        array("key"=>"BvY456Ji","character"=>"5","echaracter"=>"9U07NI"),   
                                        array("key"=>"BvY456Ji","character"=>"6","echaracter"=>"9U12NE"),  
                                        array("key"=>"BvY456Ji","character"=>"7","echaracter"=>"9U18NG"),   
                                        array("key"=>"BvY456Ji","character"=>"8","echaracter"=>"9U34ND"), 
                                        array("key"=>"BvY456Ji","character"=>"9","echaracter"=>"9U02NF"),                 
                                        array("key"=>"BvY456Ji","character"=>"!","echaracter"=>"7U21SB"),
                                        array("key"=>"BvY456Ji","character"=>"@","echaracter"=>"7U92SC"),
                                        array("key"=>"BvY456Ji","character"=>"%","echaracter"=>"7U81SN"),
                                        array("key"=>"ZtU670Nk","character"=>":","echaracter"=>"7U87QN")
                                       );
        break;
        case "ZtU670Nk":
               $this->echaracters=array(
                                        array("key"=>"ZtU670Nk","character"=>"a","echaracter"=>"hi68mo"),
                                        array("key"=>"ZtU670Nk","character"=>"b","echaracter"=>"ju89pi"),
                                        array("key"=>"ZtU670Nk","character"=>"c","echaracter"=>"az24mo"),                   
                                        array("key"=>"ZtU670Nk","character"=>"d","echaracter"=>"my51vj"),                   
                                        array("key"=>"ZtU670Nk","character"=>"e","echaracter"=>"vh17wp"),                     
                                        array("key"=>"ZtU670Nk","character"=>"f","echaracter"=>"sl32rk"),                   
                                        array("key"=>"ZtU670Nk","character"=>"g","echaracter"=>"at75ei"),                   
                                        array("key"=>"ZtU670Nk","character"=>"h","echaracter"=>"aq31yt"),                    
                                        array("key"=>"ZtU670Nk","character"=>"i","echaracter"=>"ut32yi"),                     
                                        array("key"=>"ZtU670Nk","character"=>"j","echaracter"=>"bw57vl"),                       
                                        array("key"=>"ZtU670Nk","character"=>"k","echaracter"=>"sf41ju"),                       
                                        array("key"=>"ZtU670Nk","character"=>"l","echaracter"=>"wt48bs"),                    
                                        array("key"=>"ZtU670Nk","character"=>"m","echaracter"=>"xn39ak"),                   
                                        array("key"=>"ZtU670Nk","character"=>"n","echaracter"=>"ht96ma"),                     
                                        array("key"=>"ZtU670Nk","character"=>"o","echaracter"=>"ey89nr"),                    
                                        array("key"=>"ZtU670Nk","character"=>"p","echaracter"=>"fd94ey"),                     
                                        array("key"=>"ZtU670Nk","character"=>"q","echaracter"=>"jb61kk"),                      
                                        array("key"=>"ZtU670Nk","character"=>"r","echaracter"=>"nd67jc"),                   
                                        array("key"=>"ZtU670Nk","character"=>"s","echaracter"=>"bt25mg"),                     
                                        array("key"=>"ZtU670Nk","character"=>"t","echaracter"=>"oq55yw"),                     
                                        array("key"=>"ZtU670Nk","character"=>"u","echaracter"=>"rk70ca"),                    
                                        array("key"=>"ZtU670Nk","character"=>"v","echaracter"=>"ci14hs"),                    
                                        array("key"=>"ZtU670Nk","character"=>"w","echaracter"=>"fy59vl"),                   
                                        array("key"=>"ZtU670Nk","character"=>"x","echaracter"=>"kr17kp"),                   
                                        array("key"=>"ZtU670Nk","character"=>"y","echaracter"=>"ai53hr"),                    
                                        array("key"=>"ZtU670Nk","character"=>"z","echaracter"=>"hf07nk"),                   
                                        array("key"=>"ZtU670Nk","character"=>"A","echaracter"=>"YR41JC"),                   
                                        array("key"=>"ZtU670Nk","character"=>"B","echaracter"=>"GT43UE"),                   
                                        array("key"=>"ZtU670Nk","character"=>"C","echaracter"=>"TP12BP"),                   
                                        array("key"=>"ZtU670Nk","character"=>"D","echaracter"=>"WQ92TY"),                   
                                        array("key"=>"ZtU670Nk","character"=>"E","echaracter"=>"ZA08IO"),                      
                                        array("key"=>"ZtU670Nk","character"=>"F","echaracter"=>"DW91FG"),                   
                                        array("key"=>"ZtU670Nk","character"=>"G","echaracter"=>"KE81NK"),                    
                                        array("key"=>"ZtU670Nk","character"=>"H","echaracter"=>"SX31HP"),                    
                                        array("key"=>"ZtU670Nk","character"=>"I","echaracter"=>"CO24YI"),                    
                                        array("key"=>"ZtU670Nk","character"=>"J","echaracter"=>"EU61VI"),                    
                                        array("key"=>"ZtU670Nk","character"=>"K","echaracter"=>"MQ91ZP"),                      
                                        array("key"=>"ZtU670Nk","character"=>"L","echaracter"=>"KQ23CL"),                    
                                        array("key"=>"ZtU670Nk","character"=>"M","echaracter"=>"JI84KT"),                    
                                        array("key"=>"ZtU670Nk","character"=>"N","echaracter"=>"BT47LW"),                    
                                        array("key"=>"ZtU670Nk","character"=>"O","echaracter"=>"BK04MU"),                    
                                        array("key"=>"ZtU670Nk","character"=>"P","echaracter"=>"DF35XJ"),                     
                                        array("key"=>"ZtU670Nk","character"=>"Q","echaracter"=>"MA24YI"),                     
                                        array("key"=>"ZtU670Nk","character"=>"R","echaracter"=>"ID20TH"),                    
                                        array("key"=>"ZtU670Nk","character"=>"S","echaracter"=>"KN53UO"),                    
                                        array("key"=>"ZtU670Nk","character"=>"T","echaracter"=>"TY72HU"),                     
                                        array("key"=>"ZtU670Nk","character"=>"U","echaracter"=>"WQ67HG"),                     
                                        array("key"=>"ZtU670Nk","character"=>"V","echaracter"=>"BL49PQ"),                    
                                        array("key"=>"ZtU670Nk","character"=>"W","echaracter"=>"NE50GA"),                   
                                        array("key"=>"ZtU670Nk","character"=>"X","echaracter"=>"HB65NK"),                    
                                        array("key"=>"ZtU670Nk","character"=>"Y","echaracter"=>"ZQ52LS"),                    
                                        array("key"=>"ZtU670Nk","character"=>"Z","echaracter"=>"RT30KW"),                   
                                        array("key"=>"ZtU670Nk","character"=>"0","echaracter"=>"9W27NI"),
                                        array("key"=>"ZtU670Nk","character"=>"1","echaracter"=>"9W23NE"),
                                        array("key"=>"ZtU670Nk","character"=>"2","echaracter"=>"9W34NF"),
                                        array("key"=>"ZtU670Nk","character"=>"3","echaracter"=>"9W45ND"),
                                        array("key"=>"ZtU670Nk","character"=>"4","echaracter"=>"9W31NH"),
                                        array("key"=>"ZtU670Nk","character"=>"5","echaracter"=>"9W12NI"),   
                                        array("key"=>"ZtU670Nk","character"=>"6","echaracter"=>"9W12NE"),  
                                        array("key"=>"ZtU670Nk","character"=>"7","echaracter"=>"9W19NG"),   
                                        array("key"=>"ZtU670Nk","character"=>"8","echaracter"=>"9W43ND"), 
                                        array("key"=>"ZtU670Nk","character"=>"9","echaracter"=>"9W78NF"),                  
                                        array("key"=>"ZtU670Nk","character"=>"!","echaracter"=>"7W29SB"),
                                        array("key"=>"ZtU670Nk","character"=>"@","echaracter"=>"7W54SC"),
                                        array("key"=>"ZtU670Nk","character"=>"%","echaracter"=>"7W67SN"),
                                        array("key"=>"ZtU670Nk","character"=>":","echaracter"=>"7W81PN")
                                       );
        break;
        case "EoP731Mw":
               $this->echaracters=array(
                                        array("key"=>"EoP731Mw","character"=>"a","echaracter"=>"fy66er"),
                                        array("key"=>"EoP731Mw","character"=>"b","echaracter"=>"wj68ip"),                   
                                        array("key"=>"EoP731Mw","character"=>"c","echaracter"=>"sz28ft"),                   
                                        array("key"=>"EoP731Mw","character"=>"d","echaracter"=>"hu57ky"),                    
                                        array("key"=>"EoP731Mw","character"=>"e","echaracter"=>"ve53ju"),                    
                                        array("key"=>"EoP731Mw","character"=>"f","echaracter"=>"te57jy"),                     
                                        array("key"=>"EoP731Mw","character"=>"g","echaracter"=>"ag72ti"),                     
                                        array("key"=>"EoP731Mw","character"=>"h","echaracter"=>"fq36ut"),                   
                                        array("key"=>"EoP731Mw","character"=>"i","echaracter"=>"vo39gu"),                    
                                        array("key"=>"EoP731Mw","character"=>"j","echaracter"=>"bp54go"),                    
                                        array("key"=>"EoP731Mw","character"=>"k","echaracter"=>"kf45sk"),                     
                                        array("key"=>"EoP731Mw","character"=>"l","echaracter"=>"wj41ls"),                   
                                        array("key"=>"EoP731Mw","character"=>"m","echaracter"=>"xi79ld"),                    
                                        array("key"=>"EoP731Mw","character"=>"n","echaracter"=>"le95mp"),                   
                                        array("key"=>"EoP731Mw","character"=>"o","echaracter"=>"mo82pw"),                     
                                        array("key"=>"EoP731Mw","character"=>"p","echaracter"=>"dl99oq"),                       
                                        array("key"=>"EoP731Mw","character"=>"q","echaracter"=>"nd64ke"),                     
                                        array("key"=>"EoP731Mw","character"=>"r","echaracter"=>"le67sl"),                   
                                        array("key"=>"EoP731Mw","character"=>"s","echaracter"=>"lq24sp"),                   
                                        array("key"=>"EoP731Mw","character"=>"t","echaracter"=>"or51by"),                   
                                        array("key"=>"EoP731Mw","character"=>"u","echaracter"=>"re83ac"),                    
                                        array("key"=>"EoP731Mw","character"=>"v","echaracter"=>"ns18kq"),                   
                                        array("key"=>"EoP731Mw","character"=>"w","echaracter"=>"vy55so"),                   
                                        array("key"=>"EoP731Mw","character"=>"x","echaracter"=>"wk45lq"),                   
                                        array("key"=>"EoP731Mw","character"=>"y","echaracter"=>"sk50md"),                    
                                        array("key"=>"EoP731Mw","character"=>"z","echaracter"=>"gu07he"),                      
                                        array("key"=>"EoP731Mw","character"=>"A","echaracter"=>"WG43JE")                 ,                   
                                        array("key"=>"EoP731Mw","character"=>"B","echaracter"=>"DY44IW"),                   
                                        array("key"=>"EoP731Mw","character"=>"C","echaracter"=>"PT22BT"),                   
                                        array("key"=>"EoP731Mw","character"=>"D","echaracter"=>"WO95VR"),                    
                                        array("key"=>"EoP731Mw","character"=>"E","echaracter"=>"XT56KU"),                    
                                        array("key"=>"EoP731Mw","character"=>"F","echaracter"=>"DY93OW"),                    
                                        array("key"=>"EoP731Mw","character"=>"G","echaracter"=>"ZA88FT"),                     
                                        array("key"=>"EoP731Mw","character"=>"H","echaracter"=>"XB77PK"),                     
                                        array("key"=>"EoP731Mw","character"=>"I","echaracter"=>"FV21HU"),                   
                                        array("key"=>"EoP731Mw","character"=>"J","echaracter"=>"UD66VB"),                      
                                        array("key"=>"EoP731Mw","character"=>"K","echaracter"=>"QT97PE"),                     
                                        array("key"=>"EoP731Mw","character"=>"L","echaracter"=>"KC26CW"),                   
                                        array("key"=>"EoP731Mw","character"=>"M","echaracter"=>"JA81WK"),                     
                                        array("key"=>"EoP731Mw","character"=>"N","echaracter"=>"ET40KI"),                     
                                        array("key"=>"EoP731Mw","character"=>"O","echaracter"=>"HI08CI"),                    
                                        array("key"=>"EoP731Mw","character"=>"P","echaracter"=>"GY32DT"),                    
                                        array("key"=>"EoP731Mw","character"=>"Q","echaracter"=>"MJ23IP"),                   
                                        array("key"=>"EoP731Mw","character"=>"R","echaracter"=>"DE27KQ"),                    
                                        array("key"=>"EoP731Mw","character"=>"S","echaracter"=>"KM62YD"),                       
                                        array("key"=>"EoP731Mw","character"=>"T","echaracter"=>"TS71BT"),                    
                                        array("key"=>"EoP731Mw","character"=>"U","echaracter"=>"WC36KY"),                                      
                                        array("key"=>"EoP731Mw","character"=>"V","echaracter"=>"NE66SJ"),                    
                                        array("key"=>"EoP731Mw","character"=>"W","echaracter"=>"JT53YY"),                   
                                        array("key"=>"EoP731Mw","character"=>"X","echaracter"=>"HE64JT"),                     
                                        array("key"=>"EoP731Mw","character"=>"Y","echaracter"=>"KE78KO"),                    
                                        array("key"=>"EoP731Mw","character"=>"Z","echaracter"=>"TR33ST"),                     
                                        array("key"=>"EoP731Mw","character"=>"0","echaracter"=>"9T64NI"),
                                        array("key"=>"EoP731Mw","character"=>"1","echaracter"=>"9T84NE"),
                                        array("key"=>"EoP731Mw","character"=>"2","echaracter"=>"9T36NW"),
                                        array("key"=>"EoP731Mw","character"=>"3","echaracter"=>"9T76ND"),
                                        array("key"=>"EoP731Mw","character"=>"4","echaracter"=>"9T33NO"),
                                        array("key"=>"EoP731Mw","character"=>"5","echaracter"=>"9T44NI"),   
                                        array("key"=>"EoP731Mw","character"=>"6","echaracter"=>"9T75NE"),  
                                        array("key"=>"EoP731Mw","character"=>"7","echaracter"=>"9T88NY"),   
                                        array("key"=>"EoP731Mw","character"=>"8","echaracter"=>"9T24ND"), 
                                        array("key"=>"EoP731Mw","character"=>"9","echaracter"=>"9T75NF"),                  
                                        array("key"=>"EoP731Mw","character"=>"!","echaracter"=>"7T75SB"),
                                        array("key"=>"EoP731Mw","character"=>"@","echaracter"=>"7T32SC"),
                                        array("key"=>"EoP731Mw","character"=>"%","echaracter"=>"7T45SR"),
                                        array("key"=>"ZtU670Nk","character"=>":","echaracter"=>"7T49LN")                   
                                       );    
        }
    }
    
    public function Password(){
        return $this->pwd;
    }
    
    public function PasswordKey(){
        return $this->pwdkey;
    }
    
    public function EncryptPassword($password){
    
    $this->SetEncryption();
    $characters= str_split($password);
    $arr_passwordkey = str_split($this->pwdkey);            
  
    foreach($characters as $character){ 
        foreach($this->echaracters as $echaracter){
            if ($this->pwdkey==$echaracter["key"] && $character==$echaracter["character"]){
               $this->pwd=$this->pwd.$arr_passwordkey[array_rand($arr_passwordkey,1)].$arr_passwordkey[array_rand($arr_passwordkey,1)].$arr_passwordkey[array_rand($arr_passwordkey,1)].$arr_passwordkey[array_rand($arr_passwordkey,1)].$echaracter["echaracter"];
            }
        } 
        
       
    }//end foreach

      
    }
    

}

class Decryptions extends Encryptions { 
    
    function __construct(){
        parent::__construct();
     }
    
    public function DecryptPassword($password,$passwordkey){
       $this->pwdkey=$passwordkey;
       $this->SetEncryption();
       $arr_passwordkey=str_split($passwordkey);
       $characters=str_split($password,10);
              
       
       foreach($characters as $character){           
           foreach($this->echaracters as $echaracter){
            if ($this->pwdkey==$echaracter["key"] && substr($character,4,6)==$echaracter["echaracter"]){
               $this->pwd=$this->pwd.$echaracter["character"];
            }
        }
           
         
        
       }//end for
       
    }
}