<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.css')
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         @include('home.header')
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         @include('home.slider')
      </section>
      <!-- end banner -->
      <!-- about -->
      <div class="about">
         @include('home.about')
      <!-- end about -->
      <!-- our_room -->
         @include('home.room')
      <!-- end our_room -->
      <!-- gallery -->
        @include('home.gallery')
      <!-- end gallery -->
      <!-- blog -->
       @include('home.blog')
      <!-- end blog -->
      <!--  contact -->
      @include('home.contact')
      <!-- end contact -->
      <!--  footer -->
      @include('home.footer')
   </body>
</html>