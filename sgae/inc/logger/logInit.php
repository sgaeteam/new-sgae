<?php
/**
 * logInit.php
 * 
 * The Session class is meant to simplify the task of session handling ans username asigning
 *
 * Written by: Alejandro U Alvarez http://urbanoalvarez.es
 * Last Updated: March 21, 2008
 */
include('getIp.php');
include('Log.class.php');
$log = new Logs;


class Session
{
   var $url;          //The page url current being viewed
   var $referrer;     //Last recorded site page viewed
   /**
    * Note: referrer should really only be considered the actual
    * page referrer in process.php, any other time it may be
    * inaccurate.
    */

   function __construct(){
      $this->time = time();
      $this->startSession();
   }

   /**
    * startSession - Performs all the actions necessary to 
    * initialize this session object. Tries to determine if the
    * the user has logged in already, and sets the variables 
    * accordingly. Also takes advantage of this page load to
    * update the active visitors tables.
    */
   function startSession(){
      session_start();   //Tell PHP to start the session

      /* Here you would insert your own "is_logged-in" comprobation method. I'll assume users are not logged in. */
	   if(!isset($_SESSION['UsuarioLogin'])){
         $_SESSION['UsuarioLogin'] = 'Guest';
      }
      
      if(!isset($_SESSION['UsuarioUnidade'])){
         $_SESSION['UsuarioUnidade'] = 0;
      }

      /* Set referrer page */
      if(isset($_SESSION['url'])){
         $this->referrer = $_SESSION['url'];
      }
      else{
         $this->referrer = "/";
      }

      /* Set current url */
      $this->url = $_SESSION['url'] = $_SERVER['PHP_SELF'];
   }
};


/**
 * Initialize session object - This must be initialized before
 * the form object because the form uses session variables,
 * which cannot be accessed unless the session has started.
 */
$session = new Session;
?>