var postboxes;!function(e){postboxes={add_postbox_toggles:function(t,n){var r=this;r.init(t,n),e(".postbox h3, .postbox .handlediv").bind("click.postboxes",function(){var n=e(this).parent(".postbox"),i=n.attr("id");"dashboard_browser_nag"!=i&&(n.toggleClass("closed"),"press-this"!=t&&r.save_state(t),i&&(!n.hasClass("closed")&&e.isFunction(postboxes.pbshow)?r.pbshow(i):n.hasClass("closed")&&e.isFunction(postboxes.pbhide)&&r.pbhide(i)))}),e(".postbox h3 a").click(function(e){e.stopPropagation()}),e(".postbox a.dismiss").bind("click.postboxes",function(){var t=e(this).parents(".postbox").attr("id")+"-hide";return e("#"+t).prop("checked",!1).triggerHandler("click"),!1}),e(".hide-postbox-tog").bind("click.postboxes",function(){var n=e(this).val();e(this).prop("checked")?(e("#"+n).show(),e.isFunction(postboxes.pbshow)&&r.pbshow(n)):(e("#"+n).hide(),e.isFunction(postboxes.pbhide)&&r.pbhide(n)),r.save_state(t),r._mark_area()}),e('.columns-prefs input[type="radio"]').bind("click.postboxes",function(){var n=parseInt(e(this).val(),10);n&&(r._pb_edit(n),r.save_order(t))})},init:function(t,n){var r=e(document.body).hasClass("mobile");e.extend(this,n||{}),e("#wpbody-content").css("overflow","hidden"),e(".meta-box-sortables").sortable({placeholder:"sortable-placeholder",connectWith:".meta-box-sortables",items:".postbox",handle:".hndle",cursor:"move",delay:r?200:0,distance:2,tolerance:"pointer",forcePlaceholderSize:!0,helper:"clone",opacity:.65,stop:function(){return e(this).find("#dashboard_browser_nag").is(":visible")&&"dashboard_browser_nag"!=this.firstChild.id?(e(this).sortable("cancel"),void 0):(postboxes.save_order(t),void 0)},receive:function(t,n){"dashboard_browser_nag"==n.item[0].id&&e(n.sender).sortable("cancel"),postboxes._mark_area()}}),r&&(e(document.body).bind("orientationchange.postboxes",function(){postboxes._pb_change()}),this._pb_change()),this._mark_area()},save_state:function(t){var n=e(".postbox").filter(".closed").map(function(){return this.id}).get().join(","),r=e(".postbox").filter(":hidden").map(function(){return this.id}).get().join(",");e.post(ajaxurl,{action:"closed-postboxes",closed:n,hidden:r,closedpostboxesnonce:jQuery("#closedpostboxesnonce").val(),page:t})},save_order:function(t){var n,r=e(".columns-prefs input:checked").val()||0;n={action:"meta-box-order",_ajax_nonce:e("#meta-box-order-nonce").val(),page_columns:r,page:t},e(".meta-box-sortables").each(function(){n["order["+this.id.split("-")[0]+"]"]=e(this).sortable("toArray").join(",")}),e.post(ajaxurl,n)},_mark_area:function(){var t=e("div.postbox:visible").length,n=e("#post-body #side-sortables");e("#dashboard-widgets .meta-box-sortables:visible").each(function(){var n=e(this);1==t||n.children(".postbox:visible").length?n.removeClass("empty-container"):n.addClass("empty-container")}),n.length&&(n.children(".postbox:visible").length?n.removeClass("empty-container"):"280px"==e("#postbox-container-1").css("width")&&n.addClass("empty-container"))},_pb_edit:function(t){var n=e(".metabox-holder").get(0);n&&(n.className=n.className.replace(/columns-\d+/,"columns-"+t))},_pb_change:function(){var t=e('label.columns-prefs-1 input[type="radio"]');switch(window.orientation){case 90:case-90:t.length&&t.is(":checked")||this._pb_edit(2);break;case 0:case 180:e("#poststuff").length?this._pb_edit(1):t.length&&t.is(":checked")||this._pb_edit(2)}},pbshow:!1,pbhide:!1}}(jQuery);