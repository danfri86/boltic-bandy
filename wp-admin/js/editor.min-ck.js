window.switchEditors={switchto:function(e){var t=e.id,n=t.length,r=t.substr(0,n-5),i=t.substr(n-4);this.go(r,i)},go:function(e,t){var n,r,i,s=this,o=tinymce.DOM;if(e=e||"content",t=t||"toggle",n=tinymce.get(e),r="wp-"+e+"-wrap",i=o.get(e),"toggle"===t&&(t=n&&!n.isHidden()?"html":"tmce"),"tmce"===t||"tinymce"===t){if(n&&!n.isHidden())return!1;"undefined"!=typeof QTags&&QTags.closeAllTags(e),tinyMCEPreInit.mceInit[e]&&tinyMCEPreInit.mceInit[e].wpautop&&(i.value=s.wpautop(i.value)),n?n.show():(n=new tinymce.Editor(e,tinyMCEPreInit.mceInit[e]),n.render()),o.removeClass(r,"html-active"),o.addClass(r,"tmce-active"),setUserSetting("editor","tinymce")}else if("html"===t){if(n&&n.isHidden())return!1;n?n.hide():(tinyMCEPreInit.mceInit[e]&&tinyMCEPreInit.mceInit[e].wpautop&&(i.value=s.pre_wpautop(i.value)),o.setStyles(i,{display:"",visibility:""})),o.removeClass(r,"tmce-active"),o.addClass(r,"html-active"),setUserSetting("editor","html")}return!1},_wp_Nop:function(e){var t,n,r=!1,i=!1;return(-1!==e.indexOf("<pre")||-1!==e.indexOf("<script"))&&(r=!0,e=e.replace(/<(pre|script)[^>]*>[\s\S]+?<\/\1>/g,function(e){return e=e.replace(/<br ?\/?>(\r\n|\n)?/g,"<wp-temp-lb>"),e.replace(/<\/?p( [^>]*)?>(\r\n|\n)?/g,"<wp-temp-lb>")})),-1!==e.indexOf("[caption")&&(i=!0,e=e.replace(/\[caption[\s\S]+?\[\/caption\]/g,function(e){return e.replace(/<br([^>]*)>/g,"<wp-temp-br$1>").replace(/[\r\n\t]+/,"")})),t="blockquote|ul|ol|li|table|thead|tbody|tfoot|tr|th|td|div|h[1-6]|p|fieldset",e=e.replace(new RegExp("\\s*</("+t+")>\\s*","g"),"</$1>\n"),e=e.replace(new RegExp("\\s*<((?:"+t+")(?: [^>]*)?)>","g"),"\n<$1>"),e=e.replace(/(<p [^>]+>.*?)<\/p>/g,"$1</p#>"),e=e.replace(/<div( [^>]*)?>\s*<p>/gi,"<div$1>\n\n"),e=e.replace(/\s*<p>/gi,""),e=e.replace(/\s*<\/p>\s*/gi,"\n\n"),e=e.replace(/\n[\s\u00a0]+\n/g,"\n\n"),e=e.replace(/\s*<br ?\/?>\s*/gi,"\n"),e=e.replace(/\s*<div/g,"\n<div"),e=e.replace(/<\/div>\s*/g,"</div>\n"),e=e.replace(/\s*\[caption([^\[]+)\[\/caption\]\s*/gi,"\n\n[caption$1[/caption]\n\n"),e=e.replace(/caption\]\n\n+\[caption/g,"caption]\n\n[caption"),n="blockquote|ul|ol|li|table|thead|tbody|tfoot|tr|th|td|h[1-6]|pre|fieldset",e=e.replace(new RegExp("\\s*<((?:"+n+")(?: [^>]*)?)\\s*>","g"),"\n<$1>"),e=e.replace(new RegExp("\\s*</("+n+")>\\s*","g"),"</$1>\n"),e=e.replace(/<li([^>]*)>/g,"	<li$1>"),-1!==e.indexOf("<hr")&&(e=e.replace(/\s*<hr( [^>]*)?>\s*/g,"\n\n<hr$1>\n\n")),-1!==e.indexOf("<object")&&(e=e.replace(/<object[\s\S]+?<\/object>/g,function(e){return e.replace(/[\r\n]+/g,"")})),e=e.replace(/<\/p#>/g,"</p>\n"),e=e.replace(/\s*(<p [^>]+>[\s\S]*?<\/p>)/g,"\n$1"),e=e.replace(/^\s+/,""),e=e.replace(/[\s\u00a0]+$/,""),r&&(e=e.replace(/<wp-temp-lb>/g,"\n")),i&&(e=e.replace(/<wp-temp-br([^>]*)>/g,"<br$1>")),e},_wp_Autop:function(e){var t=!1,n=!1,r="table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|option|form|map|area|blockquote|address|math|style|p|h[1-6]|hr|fieldset|noscript|legend|section|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary";return-1!==e.indexOf("<object")&&(e=e.replace(/<object[\s\S]+?<\/object>/g,function(e){return e.replace(/[\r\n]+/g,"")})),e=e.replace(/<[^<>]+>/g,function(e){return e.replace(/[\r\n]+/g," ")}),(-1!==e.indexOf("<pre")||-1!==e.indexOf("<script"))&&(t=!0,e=e.replace(/<(pre|script)[^>]*>[\s\S]+?<\/\1>/g,function(e){return e.replace(/(\r\n|\n)/g,"<wp-temp-lb>")})),-1!==e.indexOf("[caption")&&(n=!0,e=e.replace(/\[caption[\s\S]+?\[\/caption\]/g,function(e){return e=e.replace(/<br([^>]*)>/g,"<wp-temp-br$1>"),e=e.replace(/<[a-zA-Z0-9]+( [^<>]+)?>/g,function(e){return e.replace(/[\r\n\t]+/," ")}),e.replace(/\s*\n\s*/g,"<wp-temp-br />")})),e+="\n\n",e=e.replace(/<br \/>\s*<br \/>/gi,"\n\n"),e=e.replace(new RegExp("(<(?:"+r+")(?: [^>]*)?>)","gi"),"\n$1"),e=e.replace(new RegExp("(</(?:"+r+")>)","gi"),"$1\n\n"),e=e.replace(/<hr( [^>]*)?>/gi,"<hr$1>\n\n"),e=e.replace(/\r\n|\r/g,"\n"),e=e.replace(/\n\s*\n+/g,"\n\n"),e=e.replace(/([\s\S]+?)\n\n/g,"<p>$1</p>\n"),e=e.replace(/<p>\s*?<\/p>/gi,""),e=e.replace(new RegExp("<p>\\s*(</?(?:"+r+")(?: [^>]*)?>)\\s*</p>","gi"),"$1"),e=e.replace(/<p>(<li.+?)<\/p>/gi,"$1"),e=e.replace(/<p>\s*<blockquote([^>]*)>/gi,"<blockquote$1><p>"),e=e.replace(/<\/blockquote>\s*<\/p>/gi,"</p></blockquote>"),e=e.replace(new RegExp("<p>\\s*(</?(?:"+r+")(?: [^>]*)?>)","gi"),"$1"),e=e.replace(new RegExp("(</?(?:"+r+")(?: [^>]*)?>)\\s*</p>","gi"),"$1"),e=e.replace(/\s*\n/gi,"<br />\n"),e=e.replace(new RegExp("(</?(?:"+r+")[^>]*>)\\s*<br />","gi"),"$1"),e=e.replace(/<br \/>(\s*<\/?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)>)/gi,"$1"),e=e.replace(/(?:<p>|<br ?\/?>)*\s*\[caption([^\[]+)\[\/caption\]\s*(?:<\/p>|<br ?\/?>)*/gi,"[caption$1[/caption]"),e=e.replace(/(<(?:div|th|td|form|fieldset|dd)[^>]*>)(.*?)<\/p>/g,function(e,t,n){return n.match(/<p( [^>]*)?>/)?e:t+"<p>"+n+"</p>"}),t&&(e=e.replace(/<wp-temp-lb>/g,"\n")),n&&(e=e.replace(/<wp-temp-br([^>]*)>/g,"<br$1>")),e},pre_wpautop:function(e){var t=this,n={o:t,data:e,unfiltered:e},r="undefined"!=typeof jQuery;return r&&jQuery("body").trigger("beforePreWpautop",[n]),n.data=t._wp_Nop(n.data),r&&jQuery("body").trigger("afterPreWpautop",[n]),n.data},wpautop:function(e){var t=this,n={o:t,data:e,unfiltered:e},r="undefined"!=typeof jQuery;return r&&jQuery("body").trigger("beforeWpautop",[n]),n.data=t._wp_Autop(n.data),r&&jQuery("body").trigger("afterWpautop",[n]),n.data}};