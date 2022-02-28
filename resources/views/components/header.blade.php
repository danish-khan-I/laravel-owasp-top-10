 <!-- Header Wrap -->
 <div id="site-header-wrap">
     <!-- Top Bar -->
     <div id="top-bar">
         <div id="top-bar-inner" class="container">
             <div class="top-bar-inner-wrap">
                 <div class="top-bar-content">
                     <div class="inner">
                         <span class="location content">{{config('site.address')}}</span>
                         <span class="envelope content">{{config('site.email')}}</span>

                     </div>
                 </div><!-- /.top-bar-content -->

                 <div class="top-bar-socials">
                     <div class="inner">
                         <span class="icons">

                             <x-socials></x-socials>
                         </span>
                     </div>
                 </div><!-- /.top-bar-socials -->
             </div>
         </div>
     </div><!-- /#top-bar -->

     <!-- Header -->
     <header id="site-header">
         <div id="site-header-inner" class="container">
             <div class="wrap-inner clearfix">
                 <div id="site-logo" class="clearfix">
                     <div id="site-logo-inner">
                         <a href="{{url('/')}}" rel="home" class="main-logo">
                             <img src="{{asset('assets/img/logo.png')}}" alt="Zingbox" data-retina="{{asset('assets/img/logo.png')}}">
                         </a>
                     </div>
                 </div><!-- /#site-logo -->

                 <div class="mobile-button">
                     <span></span>
                 </div><!-- /.mobile-button -->

                 <nav id="main-nav" class="main-nav">
                     <ul id="menu-primary-menu" class="menu">
                         <li class="menu-item menu-item-has-children">
                             <a class="active" href="{{url('/')}}">Home</a>

                         </li>
                         <li class="menu-item menu-item-has-children">
                             <a class="down" href="{{url('/about')}}">About Us</a>
                             <ul class="sub-menu ">
                                 <li class="menu-item"><a href="{{url('/about')}}">About Us</a></li>
                                 <li class="menu-item"><a href="{{url('/price')}}">Pricing</a></li>
                                 <li class="menu-item"><a href="{{url('/team')}}">Team</a></li>
                                 <li class="menu-item"><a href="{{url('/faqs')}}">FAQ’s</a></li>
                             </ul>
                         </li>
                         <li class="menu-item menu-item-has-children">
                             <a class="" href="{{url('/services')}}">Services</a>
                            
                         </li>
                        
                        
                         <li class="menu-item menu-item-has-children">
                             <a href="{{url('/contact')}}">Contact</a>
                         </li>
                     </ul>
                 </nav><!-- /#main-nav -->
                 <div id="header-get-a-quote">
                     <a href="{{url('/contact')}}" class="header-get-a-quote-icon">Get A Quote</a>
                     <!-- <button class="header-get-a-quote-icon" >Get a Quote</button> -->
                 </div><!-- /#header-get-a-quote -->
             </div><!-- /.wrap-inner -->
         </div><!-- /#site-header-inner -->
     </header><!-- /#site-header -->
 </div><!-- #site-header-wrap -->