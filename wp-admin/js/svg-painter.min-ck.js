window.wp=window.wp||{},wp.svgPainter=function(e,t,n){"use strict";var r,i,s,o={},u=[];return e(n).ready(function(){n.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1")&&(e(n.body).removeClass("no-svg").addClass("svg"),wp.svgPainter.init())}),i=function(){function e(){for(;256>f;)i=String.fromCharCode(f),o+=i,a[f]=f,u[f]=s.indexOf(i),++f}function t(e,t,n,r,s,o){var u,a,f=0,l=0,c="",h=0;for(e=String(e),a=e.length;a>l;){for(i=e.charCodeAt(l),i=256>i?n[i]:-1,f=(f<<s)+i,h+=s;h>=o;)h-=o,u=f>>h,c+=r.charAt(u),f^=u<<h;++l}return!t&&h>0&&(c+=r.charAt(f<<o-h)),c}function n(n){return i||e(),n=t(n,!1,a,s,8,6),n+"====".slice(n.length%4||4)}function r(n){var r;i||e(),n=n.replace(/[^A-Za-z0-9\+\/\=]/g,""),n=String(n).split("="),r=n.length;do--r,n[r]=t(n[r],!0,u,o,6,8);while(r>0);return n=n.join("")}var i,s="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",o="",u=[256],a=[256],f=0;return{atob:r,btoa:n}}(),{init:function(){s=this,r=e("#adminmenu .wp-menu-image, #wpadminbar .ab-item"),this.setColors(),this.findElements(),this.paint()},setColors:function(e){"undefined"==typeof e&&"undefined"!=typeof t._wpColorScheme&&(e=t._wpColorScheme),e&&e.icons&&e.icons.base&&e.icons.current&&e.icons.focus&&(o=e.icons)},findElements:function(){r.each(function(){var t=e(this),n=t.css("background-image");n&&-1!=n.indexOf("data:image/svg+xml;base64")&&u.push(t)})},paint:function(){e.each(u,function(e,n){var r=n.parent().parent();r.hasClass("current")||r.hasClass("wp-has-current-submenu")?s.paintElement(n,"current"):(s.paintElement(n,"base"),r.hover(function(){s.paintElement(n,"focus")},function(){t.setTimeout(function(){s.paintElement(n,"base")},100)}))})},paintElement:function(e,n){var r,s,u;if(n&&o.hasOwnProperty(n)&&(u=o[n],u.match(/^(#[0-9a-f]{3}|#[0-9a-f]{6})$/i)&&(r=e.data("wp-ui-svg-"+u),"none"!==r))){if(!r){if(s=e.css("background-image").match(/.+data:image\/svg\+xml;base64,([A-Za-z0-9\+\/\=]+)/),!s||!s[1])return e.data("wp-ui-svg-"+u,"none"),void 0;try{r="atob"in t?t.atob(s[1]):i.atob(s[1])}catch(a){}if(!r)return e.data("wp-ui-svg-"+u,"none"),void 0;r=r.replace(/fill="(.+?)"/g,'fill="'+u+'"'),r=r.replace(/style="(.+?)"/g,'style="fill:'+u+'"'),r=r.replace(/fill:.*?;/g,"fill: "+u+";"),r="btoa"in t?t.btoa(r):i.btoa(r),e.data("wp-ui-svg-"+u,r)}e.attr("style",'background-image: url("data:image/svg+xml;base64,'+r+'") !important;')}}}}(jQuery,window,document);