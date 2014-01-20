/**
 * cbpAnimatedHeader.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */var cbpAnimatedHeader=function(){function i(){window.addEventListener("scroll",function(e){if(!n){n=!0;setTimeout(s,250)}},!1)}function s(){var e=o();e>=r?classie.add(t,"top-smal"):classie.remove(t,"top-smal");n=!1}function o(){return window.pageYOffset||e.scrollTop}var e=document.documentElement,t=document.querySelector(".top"),n=!1,r=100;i()}();