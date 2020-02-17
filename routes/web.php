<?php

Route::get('/', 'AreaController@home')->name('landing-page');
  // Testimonials
  Route::put('/areas/updateAll', 'AreaController@updateAll')->name('updateAll');
  

