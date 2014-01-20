/*!
 * jQuery UI 1.8.16
 *
 * Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI
 */(function(e,t){function n(t,n){var i=t.nodeName.toLowerCase();if("area"===i){n=t.parentNode;i=n.name;if(!t.href||!i||n.nodeName.toLowerCase()!=="map")return!1;t=e("img[usemap=#"+i+"]")[0];return!!t&&r(t)}return(/input|select|textarea|button|object/.test(i)?!t.disabled:"a"==i?t.href||n:n)&&r(t)}function r(t){return!e(t).parents().andSelf().filter(function(){return e.curCSS(this,"visibility")==="hidden"||e.expr.filters.hidden(this)}).length}e.ui=e.ui||{};if(!e.ui.version){e.extend(e.ui,{version:"1.8.16",keyCode:{ALT:18,BACKSPACE:8,CAPS_LOCK:20,COMMA:188,COMMAND:91,COMMAND_LEFT:91,COMMAND_RIGHT:93,CONTROL:17,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,INSERT:45,LEFT:37,MENU:93,NUMPAD_ADD:107,NUMPAD_DECIMAL:110,NUMPAD_DIVIDE:111,NUMPAD_ENTER:108,NUMPAD_MULTIPLY:106,NUMPAD_SUBTRACT:109,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SHIFT:16,SPACE:32,TAB:9,UP:38,WINDOWS:91}});e.fn.extend({propAttr:e.fn.prop||e.fn.attr,_focus:e.fn.focus,focus:function(t,n){return typeof t=="number"?this.each(function(){var r=this;setTimeout(function(){e(r).focus();n&&n.call(r)},t)}):this._focus.apply(this,arguments)},scrollParent:function(){var t;t=e.browser.msie&&/(static|relative)/.test(this.css("position"))||/absolute/.test(this.css("position"))?this.parents().filter(function(){return/(relative|absolute|fixed)/.test(e.curCSS(this,"position",1))&&/(auto|scroll)/.test(e.curCSS(this,"overflow",1)+e.curCSS(this,"overflow-y",1)+e.curCSS(this,"overflow-x",1))}).eq(0):this.parents().filter(function(){return/(auto|scroll)/.test(e.curCSS(this,"overflow",1)+e.curCSS(this,"overflow-y",1)+e.curCSS(this,"overflow-x",1))}).eq(0);return/fixed/.test(this.css("position"))||!t.length?e(document):t},zIndex:function(n){if(n!==t)return this.css("zIndex",n);if(this.length){n=e(this[0]);for(var r;n.length&&n[0]!==document;){r=n.css("position");if(r==="absolute"||r==="relative"||r==="fixed"){r=parseInt(n.css("zIndex"),10);if(!isNaN(r)&&r!==0)return r}n=n.parent()}}return 0},disableSelection:function(){return this.bind((e.support.selectstart?"selectstart":"mousedown")+".ui-disableSelection",function(e){e.preventDefault()})},enableSelection:function(){return this.unbind(".ui-disableSelection")}});e.each(["Width","Height"],function(n,r){function i(t,n,r,i){e.each(s,function(){n-=parseFloat(e.curCSS(t,"padding"+this,!0))||0;r&&(n-=parseFloat(e.curCSS(t,"border"+this+"Width",!0))||0);i&&(n-=parseFloat(e.curCSS(t,"margin"+this,!0))||0)});return n}var s=r==="Width"?["Left","Right"]:["Top","Bottom"],o=r.toLowerCase(),u={innerWidth:e.fn.innerWidth,innerHeight:e.fn.innerHeight,outerWidth:e.fn.outerWidth,outerHeight:e.fn.outerHeight};e.fn["inner"+r]=function(n){return n===t?u["inner"+r].call(this):this.each(function(){e(this).css(o,i(this,n)+"px")})};e.fn["outer"+r]=function(t,n){return typeof t!="number"?u["outer"+r].call(this,t):this.each(function(){e(this).css(o,i(this,t,!0,n)+"px")})}});e.extend(e.expr[":"],{data:function(t,n,r){return!!e.data(t,r[3])},focusable:function(t){return n(t,!isNaN(e.attr(t,"tabindex")))},tabbable:function(t){var r=e.attr(t,"tabindex"),i=isNaN(r);return(i||r>=0)&&n(t,!i)}});e(function(){var t=document.body,n=t.appendChild(n=document.createElement("div"));e.extend(n.style,{minHeight:"100px",height:"auto",padding:0,borderWidth:0});e.support.minHeight=n.offsetHeight===100;e.support.selectstart="onselectstart"in n;t.removeChild(n).style.display="none"});e.extend(e.ui,{plugin:{add:function(t,n,r){t=e.ui[t].prototype;for(var i in r){t.plugins[i]=t.plugins[i]||[];t.plugins[i].push([n,r[i]])}},call:function(e,t,n){if((t=e.plugins[t])&&e.element[0].parentNode)for(var r=0;r<t.length;r++)e.options[t[r][0]]&&t[r][1].apply(e.element,n)}},contains:function(e,t){return document.compareDocumentPosition?e.compareDocumentPosition(t)&16:e!==t&&e.contains(t)},hasScroll:function(t,n){if(e(t).css("overflow")==="hidden")return!1;n=n&&n==="left"?"scrollLeft":"scrollTop";var r=!1;if(t[n]>0)return!0;t[n]=1;r=t[n]>0;t[n]=0;return r},isOverAxis:function(e,t,n){return e>t&&e<t+n},isOver:function(t,n,r,i,s,o){return e.ui.isOverAxis(t,r,s)&&e.ui.isOverAxis(n,i,o)}})}})(jQuery);(function(e,t){if(e.cleanData){var n=e.cleanData;e.cleanData=function(t){for(var r=0,i;(i=t[r])!=null;r++)try{e(i).triggerHandler("remove")}catch(s){}n(t)}}else{var r=e.fn.remove;e.fn.remove=function(t,n){return this.each(function(){n||(!t||e.filter(t,[this]).length)&&e("*",this).add([this]).each(function(){try{e(this).triggerHandler("remove")}catch(t){}});return r.call(e(this),t,n)})}}e.widget=function(t,n,r){var i=t.split(".")[0],s;t=t.split(".")[1];s=i+"-"+t;if(!r){r=n;n=e.Widget}e.expr[":"][s]=function(n){return!!e.data(n,t)};e[i]=e[i]||{};e[i][t]=function(e,t){arguments.length&&this._createWidget(e,t)};n=new n;n.options=e.extend(!0,{},n.options);e[i][t].prototype=e.extend(!0,n,{namespace:i,widgetName:t,widgetEventPrefix:e[i][t].prototype.widgetEventPrefix||t,widgetBaseClass:s},r);e.widget.bridge(t,e[i][t])};e.widget.bridge=function(n,r){e.fn[n]=function(i){var s=typeof i=="string",o=Array.prototype.slice.call(arguments,1),u=this;i=!s&&o.length?e.extend.apply(null,[!0,i].concat(o)):i;if(s&&i.charAt(0)==="_")return u;s?this.each(function(){var r=e.data(this,n),s=r&&e.isFunction(r[i])?r[i].apply(r,o):r;if(s!==r&&s!==t){u=s;return!1}}):this.each(function(){var t=e.data(this,n);t?t.option(i||{})._init():e.data(this,n,new r(i,this))});return u}};e.Widget=function(e,t){arguments.length&&this._createWidget(e,t)};e.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",options:{disabled:!1},_createWidget:function(t,n){e.data(n,this.widgetName,this);this.element=e(n);this.options=e.extend(!0,{},this.options,this._getCreateOptions(),t);var r=this;this.element.bind("remove."+this.widgetName,function(){r.destroy()});this._create();this._trigger("create");this._init()},_getCreateOptions:function(){return e.metadata&&e.metadata.get(this.element[0])[this.widgetName]},_create:function(){},_init:function(){},destroy:function(){this.element.unbind("."+this.widgetName).removeData(this.widgetName);this.widget().unbind("."+this.widgetName).removeAttr("aria-disabled").removeClass(this.widgetBaseClass+"-disabled ui-state-disabled")},widget:function(){return this.element},option:function(n,r){var i=n;if(arguments.length===0)return e.extend({},this.options);if(typeof n=="string"){if(r===t)return this.options[n];i={};i[n]=r}this._setOptions(i);return this},_setOptions:function(t){var n=this;e.each(t,function(e,t){n._setOption(e,t)});return this},_setOption:function(e,t){this.options[e]=t;e==="disabled"&&this.widget()[t?"addClass":"removeClass"](this.widgetBaseClass+"-disabled ui-state-disabled").attr("aria-disabled",t);return this},enable:function(){return this._setOption("disabled",!1)},disable:function(){return this._setOption("disabled",!0)},_trigger:function(t,n,r){var i=this.options[t];n=e.Event(n);n.type=(t===this.widgetEventPrefix?t:this.widgetEventPrefix+t).toLowerCase();r=r||{};if(n.originalEvent){t=e.event.props.length;for(var s;t;){s=e.event.props[--t];n[s]=n.originalEvent[s]}}this.element.trigger(n,r);return!(e.isFunction(i)&&i.call(this.element[0],n,r)===!1||n.isDefaultPrevented())}}})(jQuery);(function(e){var t=!1;e(document).mouseup(function(){t=!1});e.widget("ui.mouse",{options:{cancel:":input,option",distance:1,delay:0},_mouseInit:function(){var t=this;this.element.bind("mousedown."+this.widgetName,function(e){return t._mouseDown(e)}).bind("click."+this.widgetName,function(n){if(!0===e.data(n.target,t.widgetName+".preventClickEvent")){e.removeData(n.target,t.widgetName+".preventClickEvent");n.stopImmediatePropagation();return!1}});this.started=!1},_mouseDestroy:function(){this.element.unbind("."+this.widgetName)},_mouseDown:function(n){if(!t){this._mouseStarted&&this._mouseUp(n);this._mouseDownEvent=n;var r=this,i=n.which==1,s=typeof this.options.cancel=="string"&&n.target.nodeName?e(n.target).closest(this.options.cancel).length:!1;if(!i||s||!this._mouseCapture(n))return!0;this.mouseDelayMet=!this.options.delay;this.mouseDelayMet||(this._mouseDelayTimer=setTimeout(function(){r.mouseDelayMet=!0},this.options.delay));if(this._mouseDistanceMet(n)&&this._mouseDelayMet(n)){this._mouseStarted=this._mouseStart(n)!==!1;if(!this._mouseStarted){n.preventDefault();return!0}}!0===e.data(n.target,this.widgetName+".preventClickEvent")&&e.removeData(n.target,this.widgetName+".preventClickEvent");this._mouseMoveDelegate=function(e){return r._mouseMove(e)};this._mouseUpDelegate=function(e){return r._mouseUp(e)};e(document).bind("mousemove."+this.widgetName,this._mouseMoveDelegate).bind("mouseup."+this.widgetName,this._mouseUpDelegate);n.preventDefault();return t=!0}},_mouseMove:function(t){if(!e.browser.msie||document.documentMode>=9||!!t.button){if(this._mouseStarted){this._mouseDrag(t);return t.preventDefault()}this._mouseDistanceMet(t)&&this._mouseDelayMet(t)&&((this._mouseStarted=this._mouseStart(this._mouseDownEvent,t)!==!1)?this._mouseDrag(t):this._mouseUp(t));return!this._mouseStarted}return this._mouseUp(t)},_mouseUp:function(t){e(document).unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate);if(this._mouseStarted){this._mouseStarted=!1;t.target==this._mouseDownEvent.target&&e.data(t.target,this.widgetName+".preventClickEvent",!0);this._mouseStop(t)}return!1},_mouseDistanceMet:function(e){return Math.max(Math.abs(this._mouseDownEvent.pageX-e.pageX),Math.abs(this._mouseDownEvent.pageY-e.pageY))>=this.options.distance},_mouseDelayMet:function(){return this.mouseDelayMet},_mouseStart:function(){},_mouseDrag:function(){},_mouseStop:function(){},_mouseCapture:function(){return!0}})})(jQuery);(function(e){e.ui=e.ui||{};var t=/left|center|right/,n=/top|center|bottom/,r=e.fn.position,i=e.fn.offset;e.fn.position=function(i){if(!i||!i.of)return r.apply(this,arguments);i=e.extend({},i);var s=e(i.of),u=s[0],a=(i.collision||"flip").split(" "),f=i.offset?i.offset.split(" "):[0,0],l,h,p;if(u.nodeType===9){l=s.width();h=s.height();p={top:0,left:0}}else if(u.setTimeout){l=s.width();h=s.height();p={top:s.scrollTop(),left:s.scrollLeft()}}else if(u.preventDefault){i.at="left top";l=h=0;p={top:i.of.pageY,left:i.of.pageX}}else{l=s.outerWidth();h=s.outerHeight();p=s.offset()}e.each(["my","at"],function(){var e=(i[this]||"").split(" ");e.length===1&&(e=t.test(e[0])?e.concat(["center"]):n.test(e[0])?["center"].concat(e):["center","center"]);e[0]=t.test(e[0])?e[0]:"center";e[1]=n.test(e[1])?e[1]:"center";i[this]=e});a.length===1&&(a[1]=a[0]);f[0]=parseInt(f[0],10)||0;f.length===1&&(f[1]=f[0]);f[1]=parseInt(f[1],10)||0;i.at[0]==="right"?p.left+=l:i.at[0]==="center"&&(p.left+=l/2);i.at[1]==="bottom"?p.top+=h:i.at[1]==="center"&&(p.top+=h/2);p.left+=f[0];p.top+=f[1];return this.each(function(){var t=e(this),n=t.outerWidth(),r=t.outerHeight(),s=parseInt(e.curCSS(this,"marginLeft",!0))||0,o=parseInt(e.curCSS(this,"marginTop",!0))||0,u=n+s+(parseInt(e.curCSS(this,"marginRight",!0))||0),d=r+o+(parseInt(e.curCSS(this,"marginBottom",!0))||0),v=e.extend({},p),m;i.my[0]==="right"?v.left-=n:i.my[0]==="center"&&(v.left-=n/2);i.my[1]==="bottom"?v.top-=r:i.my[1]==="center"&&(v.top-=r/2);v.left=Math.round(v.left);v.top=Math.round(v.top);m={left:v.left-s,top:v.top-o};e.each(["left","top"],function(t,s){e.ui.position[a[t]]&&e.ui.position[a[t]][s](v,{targetWidth:l,targetHeight:h,elemWidth:n,elemHeight:r,collisionPosition:m,collisionWidth:u,collisionHeight:d,offset:f,my:i.my,at:i.at})});e.fn.bgiframe&&t.bgiframe();t.offset(e.extend(v,{using:i.using}))})};e.ui.position={fit:{left:function(t,n){var r=e(window);r=n.collisionPosition.left+n.collisionWidth-r.width()-r.scrollLeft();t.left=r>0?t.left-r:Math.max(t.left-n.collisionPosition.left,t.left)},top:function(t,n){var r=e(window);r=n.collisionPosition.top+n.collisionHeight-r.height()-r.scrollTop();t.top=r>0?t.top-r:Math.max(t.top-n.collisionPosition.top,t.top)}},flip:{left:function(t,n){if(n.at[0]!=="center"){var r=e(window);r=n.collisionPosition.left+n.collisionWidth-r.width()-r.scrollLeft();var i=n.my[0]==="left"?-n.elemWidth:n.my[0]==="right"?n.elemWidth:0,s=n.at[0]==="left"?n.targetWidth:-n.targetWidth,o=-2*n.offset[0];t.left+=n.collisionPosition.left<0?i+s+o:r>0?i+s+o:0}},top:function(t,n){if(n.at[1]!=="center"){var r=e(window);r=n.collisionPosition.top+n.collisionHeight-r.height()-r.scrollTop();var i=n.my[1]==="top"?-n.elemHeight:n.my[1]==="bottom"?n.elemHeight:0,s=n.at[1]==="top"?n.targetHeight:-n.targetHeight,o=-2*n.offset[1];t.top+=n.collisionPosition.top<0?i+s+o:r>0?i+s+o:0}}}};if(!e.offset.setOffset){e.offset.setOffset=function(t,n){/static/.test(e.curCSS(t,"position"))&&(t.style.position="relative");var r=e(t),i=r.offset(),s=parseInt(e.curCSS(t,"top",!0),10)||0,o=parseInt(e.curCSS(t,"left",!0),10)||0;i={top:n.top-i.top+s,left:n.left-i.left+o};"using"in n?n.using.call(t,i):r.css(i)};e.fn.offset=function(t){var n=this[0];return!n||!n.ownerDocument?null:t?this.each(function(){e.offset.setOffset(this,t)}):i.call(this)}}})(jQuery);(function(e){var t=0;e.widget("ui.autocomplete",{options:{appendTo:"body",autoFocus:!1,delay:300,minLength:1,position:{my:"left top",at:"left bottom",collision:"none"},source:null},pending:0,_create:function(){var t=this,n=this.element[0].ownerDocument,r;this.element.addClass("ui-autocomplete-input").attr("autocomplete","off").attr({role:"textbox","aria-autocomplete":"list","aria-haspopup":"true"}).bind("keydown.autocomplete",function(n){if(!t.options.disabled&&!t.element.propAttr("readOnly")){r=!1;var i=e.ui.keyCode;switch(n.keyCode){case i.PAGE_UP:t._move("previousPage",n);break;case i.PAGE_DOWN:t._move("nextPage",n);break;case i.UP:t._move("previous",n);n.preventDefault();break;case i.DOWN:t._move("next",n);n.preventDefault();break;case i.ENTER:case i.NUMPAD_ENTER:if(t.menu.active){r=!0;n.preventDefault()};case i.TAB:if(!t.menu.active)return;t.menu.select(n);break;case i.ESCAPE:t.element.val(t.term);t.close(n);break;default:clearTimeout(t.searching);t.searching=setTimeout(function(){if(t.term!=t.element.val()){t.selectedItem=null;t.search(null,n)}},t.options.delay)}}}).bind("keypress.autocomplete",function(e){if(r){r=!1;e.preventDefault()}}).bind("focus.autocomplete",function(){if(!t.options.disabled){t.selectedItem=null;t.previous=t.element.val()}}).bind("blur.autocomplete",function(e){if(!t.options.disabled){clearTimeout(t.searching);t.closing=setTimeout(function(){t.close(e);t._change(e)},150)}});this._initSource();this.response=function(){return t._response.apply(t,arguments)};this.menu=e("<ul></ul>").addClass("ui-autocomplete").appendTo(e(this.options.appendTo||"body",n)[0]).mousedown(function(n){var r=t.menu.element[0];e(n.target).closest(".ui-menu-item").length||setTimeout(function(){e(document).one("mousedown",function(n){n.target!==t.element[0]&&n.target!==r&&!e.ui.contains(r,n.target)&&t.close()})},1);setTimeout(function(){clearTimeout(t.closing)},13)}).menu({focus:function(e,n){n=n.item.data("item.autocomplete");!1!==t._trigger("focus",e,{item:n})&&/^key/.test(e.originalEvent.type)&&t.element.val(n.value)},selected:function(e,r){var i=r.item.data("item.autocomplete"),s=t.previous;if(t.element[0]!==n.activeElement){t.element.focus();t.previous=s;setTimeout(function(){t.previous=s;t.selectedItem=i},1)}!1!==t._trigger("select",e,{item:i})&&t.element.val(i.value);t.term=t.element.val();t.close(e);t.selectedItem=i},blur:function(){t.menu.element.is(":visible")&&t.element.val()!==t.term&&t.element.val(t.term)}}).zIndex(this.element.zIndex()+1).css({top:0,left:0}).hide().data("menu");e.fn.bgiframe&&this.menu.element.bgiframe()},destroy:function(){this.element.removeClass("ui-autocomplete-input").removeAttr("autocomplete").removeAttr("role").removeAttr("aria-autocomplete").removeAttr("aria-haspopup");this.menu.element.remove();e.Widget.prototype.destroy.call(this)},_setOption:function(t,n){e.Widget.prototype._setOption.apply(this,arguments);t==="source"&&this._initSource();t==="appendTo"&&this.menu.element.appendTo(e(n||"body",this.element[0].ownerDocument)[0]);t==="disabled"&&n&&this.xhr&&this.xhr.abort()},_initSource:function(){var n=this,r,i;if(e.isArray(this.options.source)){r=this.options.source;this.source=function(t,n){n(e.ui.autocomplete.filter(r,t.term))}}else if(typeof this.options.source=="string"){i=this.options.source;this.source=function(r,s){n.xhr&&n.xhr.abort();n.xhr=e.ajax({url:i,data:r,dataType:"json",autocompleteRequest:++t,success:function(e){this.autocompleteRequest===t&&s(e)},error:function(){this.autocompleteRequest===t&&s([])}})}}else this.source=this.options.source},search:function(e,t){e=e!=null?e:this.element.val();this.term=this.element.val();if(e.length<this.options.minLength)return this.close(t);clearTimeout(this.closing);if(this._trigger("search",t)!==!1)return this._search(e)},_search:function(e){this.pending++;this.element.addClass("ui-autocomplete-loading");this.source({term:e},this.response)},_response:function(e){if(!this.options.disabled&&e&&e.length){e=this._normalize(e);this._suggest(e);this._trigger("open")}else this.close();this.pending--;this.pending||this.element.removeClass("ui-autocomplete-loading")},close:function(e){clearTimeout(this.closing);if(this.menu.element.is(":visible")){this.menu.element.hide();this.menu.deactivate();this._trigger("close",e)}},_change:function(e){this.previous!==this.element.val()&&this._trigger("change",e,{item:this.selectedItem})},_normalize:function(t){return t.length&&t[0].label&&t[0].value?t:e.map(t,function(t){return typeof t=="string"?{label:t,value:t}:e.extend({label:t.label||t.value,value:t.value||t.label},t)})},_suggest:function(t){var n=this.menu.element.empty().zIndex(this.element.zIndex()+1);this._renderMenu(n,t);this.menu.deactivate();this.menu.refresh();n.show();this._resizeMenu();n.position(e.extend({of:this.element},this.options.position));this.options.autoFocus&&this.menu.next(new e.Event("mouseover"))},_resizeMenu:function(){var e=this.menu.element;e.outerWidth(Math.max(e.width("").outerWidth(),this.element.outerWidth()))},_renderMenu:function(t,n){var r=this;e.each(n,function(e,n){r._renderItem(t,n)})},_renderItem:function(t,n){return e("<li></li>").data("item.autocomplete",n).append(e("<a></a>").text(n.label)).appendTo(t)},_move:function(e,t){if(this.menu.element.is(":visible"))if(this.menu.first()&&/^previous/.test(e)||this.menu.last()&&/^next/.test(e)){this.element.val(this.term);this.menu.deactivate()}else this.menu[e](t);else this.search(null,t)},widget:function(){return this.menu.element}});e.extend(e.ui.autocomplete,{escapeRegex:function(e){return e.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&")},filter:function(t,n){var r=new RegExp(e.ui.autocomplete.escapeRegex(n),"i");return e.grep(t,function(e){return r.test(e.label||e.value||e)})}})})(jQuery);(function(e){e.widget("ui.menu",{_create:function(){var t=this;this.element.addClass("ui-menu ui-widget ui-widget-content ui-corner-all").attr({role:"listbox","aria-activedescendant":"ui-active-menuitem"}).click(function(n){if(e(n.target).closest(".ui-menu-item a").length){n.preventDefault();t.select(n)}});this.refresh()},refresh:function(){var t=this;this.element.children("li:not(.ui-menu-item):has(a)").addClass("ui-menu-item").attr("role","menuitem").children("a").addClass("ui-corner-all").attr("tabindex",-1).mouseenter(function(n){t.activate(n,e(this).parent())}).mouseleave(function(){t.deactivate()})},activate:function(e,t){this.deactivate();if(this.hasScroll()){var n=t.offset().top-this.element.offset().top,r=this.element.scrollTop(),i=this.element.height();n<0?this.element.scrollTop(r+n):n>=i&&this.element.scrollTop(r+n-i+t.height())}this.active=t.eq(0).children("a").addClass("ui-state-hover").attr("id","ui-active-menuitem").end();this._trigger("focus",e,{item:t})},deactivate:function(){if(this.active){this.active.children("a").removeClass("ui-state-hover").removeAttr("id");this._trigger("blur");this.active=null}},next:function(e){this.move("next",".ui-menu-item:first",e)},previous:function(e){this.move("prev",".ui-menu-item:last",e)},first:function(){return this.active&&!this.active.prevAll(".ui-menu-item").length},last:function(){return this.active&&!this.active.nextAll(".ui-menu-item").length},move:function(e,t,n){if(this.active){e=this.active[e+"All"](".ui-menu-item").eq(0);e.length?this.activate(n,e):this.activate(n,this.element.children(t))}else this.activate(n,this.element.children(t))},nextPage:function(t){if(this.hasScroll())if(!this.active||this.last())this.activate(t,this.element.children(".ui-menu-item:first"));else{var n=this.active.offset().top,r=this.element.height(),i=this.element.children(".ui-menu-item").filter(function(){var t=e(this).offset().top-n-r+e(this).height();return t<10&&t>-10});i.length||(i=this.element.children(".ui-menu-item:last"));this.activate(t,i)}else this.activate(t,this.element.children(".ui-menu-item").filter(!this.active||this.last()?":first":":last"))},previousPage:function(t){if(this.hasScroll())if(!this.active||this.first())this.activate(t,this.element.children(".ui-menu-item:last"));else{var n=this.active.offset().top,r=this.element.height();result=this.element.children(".ui-menu-item").filter(function(){var t=e(this).offset().top-n+r-e(this).height();return t<10&&t>-10});result.length||(result=this.element.children(".ui-menu-item:first"));this.activate(t,result)}else this.activate(t,this.element.children(".ui-menu-item").filter(!this.active||this.first()?":last":":first"))},hasScroll:function(){return this.element.height()<this.element[e.fn.prop?"prop":"attr"]("scrollHeight")},select:function(e){this._trigger("selected",e,{item:this.active})}})})(jQuery);