<?php
use Routes\Route as Route;
use Controllers\Controller as Controller; 

Route::add('/',function(){
    Controller::openWelcomeView();
  });
  
  Route::add('/users/',function(){
    Controller::openUsersView();
  });
  
  
  Route::add('/user/([0-9]*)',function($id){
    Controller::openUserView($id);
  });
  
  Route::add('/add/',function(){
    Controller::openAddView();
  },'get');

  Route::add('/add/',function(){
    Controller::openAddedView();
  },'post');
  
  Route::add('/contact/',function(){
    Controller::openContactView();
  },'get');
  
  Route::add('/contact/',function(){
    Controller::reopenContactView($_POST);
  },'post');
  
  Route::pathNotFound(function($path){
    Controller::pathNotFound();
  });


// Run the Router with the given Basepath
// If your script lives in the web root folder use a / or leave it empty
Route::run('/');
// If your script lives in a subfolder you can use the following example
// Do not forget to edit the basepath in .htaccess if you are on apache
// Route::run('/api/v1');
// Accept only numbers as parameter. Other characters will result in a 404 error
/*Route::add('/foo/([0-9]*)/bar',function($var1){
  echo $var1.' is a great number!';
});
// Crazy route with parameters
Route::add('/(.*)/(.*)/(.*)/(.*)',function($var1,$var2,$var3,$var4){
  echo 'This is the first match: '.$var1.' / '.$var2.' / '.$var3.' / '.$var4.'<br/>';
});
// Long route example
// This route gets never triggered because the route before matches too
Route::add('/foo/bar/foo/bar',function(){
  echo 'This is the second match <br/>';
});
// 405 test
Route::add('/this-route-is-defined',function(){
  echo 'You need to patch this route to see this content';
},'patch');*/
// Add a 404 not found route