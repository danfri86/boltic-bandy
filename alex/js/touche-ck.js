!function(){"use strict";function e(t){if(this instanceof e){if(!t)throw new Error("No DOM elements passed into Touche");return this.nodes=t,this}return new e(t)}var t="ontouchstart"in window||"msmaxtouchpoints"in window.navigator;if(e.prototype.on=function(e,n){var r,i,s=this.nodes,o=s.length;if(t&&"click"===e&&(r=!0),i=function(e,t,n){var i,s=function(){!i&&(i=!0)&&n.apply(this,arguments)};e.addEventListener(t,s,!1),r&&e.addEventListener("touchend",s,!1)},o)for(;o--;)i(s[o],e,n);else i(s,e,n);return this},window.Touche=e,window.jQuery&&t){var n=jQuery.fn.on;jQuery.fn.on=function(){var e=arguments[0];return arguments[0]="click"===e?"touchend":e,n.apply(this,arguments),this}}}();