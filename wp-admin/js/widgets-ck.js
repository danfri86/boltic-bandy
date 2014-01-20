/*global ajaxurl, isRtl */var wpWidgets;(function(e){wpWidgets={init:function(){var t,n,r=this,i=e(".widgets-chooser"),s=i.find(".widgets-chooser-sidebars"),o=e("div.widgets-sortables"),u="undefined"!=typeof isRtl&&!!isRtl;e("#widgets-right .sidebar-name").click(function(){var t=e(this),n=t.closest(".widgets-holder-wrap");if(n.hasClass("closed")){n.removeClass("closed");t.parent().sortable("refresh")}else n.addClass("closed")});e("#widgets-left .sidebar-name").click(function(){e(this).closest(".widgets-holder-wrap").toggleClass("closed")});e(document.body).bind("click.widgets-toggle",function(t){var n=e(t.target),r={"z-index":100},i,s,o,a,f;if(n.parents(".widget-top").length&&!n.parents("#available-widgets").length){i=n.closest("div.widget");s=i.children(".widget-inside");o=parseInt(i.find("input.widget-width").val(),10),a=i.parent().width();if(s.is(":hidden")){if(o>250&&o+30>a&&i.closest("div.widgets-sortables").length){i.closest("div.widget-liquid-right").length?f=u?"margin-right":"margin-left":f=u?"margin-left":"margin-right";r[f]=a-(o+30)+"px";i.css(r)}s.slideDown("fast")}else s.slideUp("fast",function(){i.attr("style","")});t.preventDefault()}else if(n.hasClass("widget-control-save")){wpWidgets.save(n.closest("div.widget"),0,1,0);t.preventDefault()}else if(n.hasClass("widget-control-remove")){wpWidgets.save(n.closest("div.widget"),1,1,0);t.preventDefault()}else if(n.hasClass("widget-control-close")){wpWidgets.close(n.closest("div.widget"));t.preventDefault()}});o.children(".widget").each(function(){var t=e(this);wpWidgets.appendTitle(this);t.find("p.widget-error").length&&t.find("a.widget-action").trigger("click")});e("#widget-list").children(".widget").draggable({connectToSortable:"div.widgets-sortables",handle:"> .widget-top > .widget-title",distance:2,helper:"clone",zIndex:100,containment:"document",start:function(t,i){var s=e(this).find(".widgets-chooser");i.helper.find("div.widget-description").hide();n=this.id;if(s.length){e("#wpbody-content").append(s.hide());i.helper.find(".widgets-chooser").remove();r.clearWidgetSelection()}},stop:function(){t&&e(t).hide();t=""}});o.sortable({placeholder:"widget-placeholder",items:"> .widget",handle:"> .widget-top > .widget-title",cursor:"move",distance:2,containment:"document",start:function(t,n){var r,i=e(this),s=i.parent(),o=n.item.children(".widget-inside");if(o.css("display")==="block"){o.hide();e(this).sortable("refreshPositions")}if(!s.hasClass("closed")){r=n.item.hasClass("ui-draggable")?i.height():1+i.height();i.css("min-height",r+"px")}},stop:function(r,i){var s,o,u,a,f,l,c=i.item,h=n;if(c.hasClass("deleting")){wpWidgets.save(c,1,0,1);c.remove();return}s=c.find("input.add_new").val();o=c.find("input.multi_number").val();c.attr("style","").removeClass("ui-draggable");n="";if(s){if("multi"===s){c.html(c.html().replace(/<[^<>]+>/g,function(e){return e.replace(/__i__|%i%/g,o)}));c.attr("id",h.replace("__i__",o));o++;e("div#"+h).find("input.multi_number").val(o)}else if("single"===s){c.attr("id","new-"+h);t="div#"+h}wpWidgets.save(c,0,0,1);c.find("input.add_new").val("")}u=c.parent();if(u.parent().hasClass("closed")){u.parent().removeClass("closed");a=u.children(".widget");if(a.length>1){f=a.get(0);l=c.get(0);f.id&&l.id&&f.id!==l.id&&e(f).before(c)}}s?c.find("a.widget-action").trigger("click"):wpWidgets.saveOrder(u.attr("id"))},activate:function(){e(this).parent().addClass("widget-hover")},deactivate:function(){e(this).css("min-height","").parent().removeClass("widget-hover")},receive:function(t,n){var r=e(n.sender);if(this.id.indexOf("orphaned_widgets")>-1){r.sortable("cancel");return}r.attr("id").indexOf("orphaned_widgets")>-1&&!r.children(".widget").length&&r.parents(".orphan-sidebar").slideUp(400,function(){e(this).remove()})}}).sortable("option","connectWith","div.widgets-sortables");e("#available-widgets").droppable({tolerance:"pointer",accept:function(t){return e(t).parent().attr("id")!=="widget-list"},drop:function(t,n){n.draggable.addClass("deleting");e("#removing-widget").hide().children("span").html("")},over:function(t,n){n.draggable.addClass("deleting");e("div.widget-placeholder").hide();n.draggable.hasClass("ui-sortable-helper")&&e("#removing-widget").show().children("span").html(n.draggable.find("div.widget-title").children("h4").html())},out:function(t,n){n.draggable.removeClass("deleting");e("div.widget-placeholder").show();e("#removing-widget").hide().children("span").html("")}});e("#widgets-right .widgets-holder-wrap").each(function(t,n){var r=e(n),i=r.find(".sidebar-name h3").text(),o=r.find(".widgets-sortables").attr("id"),u=e('<li tabindex="0">').text(e.trim(i));t===0&&u.addClass("widgets-chooser-selected");s.append(u);u.data("sidebarId",o)});e("#available-widgets .widget .widget-title").on("click.widgets-chooser",function(){var t=e(this).closest(".widget");if(t.hasClass("widget-in-question")||e("#widgets-left").hasClass("chooser"))r.closeChooser();else{r.clearWidgetSelection();e("#widgets-left").addClass("chooser");t.addClass("widget-in-question").children(".widget-description").after(i);i.slideDown(300,function(){s.find(".widgets-chooser-selected").focus()});s.find("li").on("focusin.widgets-chooser",function(){s.find(".widgets-chooser-selected").removeClass("widgets-chooser-selected");e(this).addClass("widgets-chooser-selected")})}});i.on("click.widgets-chooser",function(t){var n=e(t.target);if(n.hasClass("button-primary")){r.addWidget(i);r.closeChooser()}else n.hasClass("button-secondary")&&r.closeChooser()}).on("keyup.widgets-chooser",function(t){if(t.which===e.ui.keyCode.ENTER)if(e(t.target).hasClass("button-secondary"))r.closeChooser();else{r.addWidget(i);r.closeChooser()}else t.which===e.ui.keyCode.ESCAPE&&r.closeChooser()})},saveOrder:function(t){var n={action:"widgets-order",savewidgets:e("#_wpnonce_widgets").val(),sidebars:[]};t&&e("#"+t).find(".spinner:first").css("display","inline-block");e("div.widgets-sortables").each(function(){e(this).sortable&&(n["sidebars["+e(this).attr("id")+"]"]=e(this).sortable("toArray").join(","))});e.post(ajaxurl,n,function(){e(".spinner").hide()})},save:function(t,n,r,i){var s=t.closest("div.widgets-sortables").attr("id"),o=t.find("form").serialize(),u;t=e(t);e(".spinner",t).show();u={action:"save-widget",savewidgets:e("#_wpnonce_widgets").val(),sidebar:s};n&&(u.delete_widget=1);o+="&"+e.param(u);e.post(ajaxurl,o,function(s){var o;if(n){if(!e("input.widget_number",t).val()){o=e("input.widget-id",t).val();e("#available-widgets").find("input.widget-id").each(function(){e(this).val()===o&&e(this).closest("div.widget").show()})}if(r){i=0;t.slideUp("fast",function(){e(this).remove();wpWidgets.saveOrder()})}else t.remove()}else{e(".spinner").hide();if(s&&s.length>2){e("div.widget-content",t).html(s);wpWidgets.appendTitle(t)}}i&&wpWidgets.saveOrder()})},appendTitle:function(t){var n=e('input[id*="-title"]',t).val()||"";n&&(n=": "+n.replace(/<[^<>]+>/g,"").replace(/</g,"&lt;").replace(/>/g,"&gt;"));e(t).children(".widget-top").children(".widget-title").children().children(".in-widget-title").html(n)},close:function(e){e.children(".widget-inside").slideUp("fast",function(){e.attr("style","")})},addWidget:function(t){var n,r,i,s,o,u,a,f=t.find(".widgets-chooser-selected").data("sidebarId"),l=e("#"+f);n=e("#available-widgets").find(".widget-in-question").clone();r=n.attr("id");i=n.find("input.add_new").val();s=n.find("input.multi_number").val();n.find(".widgets-chooser").remove();if("multi"===i){n.html(n.html().replace(/<[^<>]+>/g,function(e){return e.replace(/__i__|%i%/g,s)}));n.attr("id",r.replace("__i__",s));s++;e("#"+r).find("input.multi_number").val(s)}else if("single"===i){n.attr("id","new-"+r);e("#"+r).hide()}l.closest(".widgets-holder-wrap").removeClass("closed");l.append(n);l.sortable("refresh");wpWidgets.save(n,0,0,1);n.find("input.add_new").val("");o=e(window).scrollTop();u=o+e(window).height();a=l.offset();a.bottom=a.top+l.outerHeight();(o>a.bottom||u<a.top)&&e("html, body").animate({scrollTop:a.top-130},200);window.setTimeout(function(){n.find(".widget-title").trigger("click")},250)},closeChooser:function(){var t=this;e(".widgets-chooser").slideUp(200,function(){e("#wpbody-content").append(this);t.clearWidgetSelection()})},clearWidgetSelection:function(){e("#widgets-left").removeClass("chooser");e(".widget-in-question").removeClass("widget-in-question")}};e(document).ready(function(){wpWidgets.init()})})(jQuery);