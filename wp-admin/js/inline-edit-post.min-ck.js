var inlineEditPost;!function(e){inlineEditPost={init:function(){var t=this,n=e("#inline-edit"),r=e("#bulk-edit");t.type=e("table.widefat").hasClass("pages")?"page":"post",t.what="#post-",n.keyup(function(e){return 27===e.which?inlineEditPost.revert():void 0}),r.keyup(function(e){return 27===e.which?inlineEditPost.revert():void 0}),e("a.cancel",n).click(function(){return inlineEditPost.revert()}),e("a.save",n).click(function(){return inlineEditPost.save(this)}),e("td",n).keydown(function(e){return 13===e.which?inlineEditPost.save(this):void 0}),e("a.cancel",r).click(function(){return inlineEditPost.revert()}),e('#inline-edit .inline-edit-private input[value="private"]').click(function(){var t=e("input.inline-edit-password-input");e(this).prop("checked")?t.val("").prop("disabled",!0):t.prop("disabled",!1)}),e("#the-list").on("click","a.editinline",function(){return inlineEditPost.edit(this),!1}),e("#bulk-title-div").parents("fieldset").after(e("#inline-edit fieldset.inline-edit-categories").clone()).siblings("fieldset:last").prepend(e("#inline-edit label.inline-edit-tags").clone()),e('select[name="_status"] option[value="future"]',r).remove(),e("#doaction, #doaction2").click(function(n){var r=e(this).attr("id").substr(2);"edit"===e('select[name="'+r+'"]').val()?(n.preventDefault(),t.setBulk()):e("form#posts-filter tr.inline-editor").length>0&&t.revert()})},toggle:function(t){var n=this;"none"===e(n.what+n.getId(t)).css("display")?n.revert():n.edit(t)},setBulk:function(){var t,n="",r=this.type,i=!0;return this.revert(),e("#bulk-edit td").attr("colspan",e(".widefat:first thead th:visible").length),e("table.widefat tbody").prepend(e("#bulk-edit")),e("#bulk-edit").addClass("inline-editor").show(),e('tbody th.check-column input[type="checkbox"]').each(function(){if(e(this).prop("checked")){i=!1;var t,r=e(this).val();t=e("#inline_"+r+" .post_title").html()||inlineEditL10n.notitle,n+='<div id="ttle'+r+'"><a id="_'+r+'" class="ntdelbutton" title="'+inlineEditL10n.ntdeltitle+'">X</a>'+t+"</div>"}}),i?this.revert():(e("#bulk-titles").html(n),e("#bulk-titles a").click(function(){var t=e(this).attr("id").substr(1);e('table.widefat input[value="'+t+'"]').prop("checked",!1),e("#ttle"+t).remove()}),"post"===r&&(t="post_tag",e('tr.inline-editor textarea[name="tax_input['+t+']"]').suggest(ajaxurl+"?action=ajax-tag-search&tax="+t,{delay:500,minchars:2,multiple:!0,multipleSep:inlineEditL10n.comma+" "})),e("html, body").animate({scrollTop:0},"fast"),void 0)},edit:function(t){var n,r,i,s,o,u,f,l,c,h,p=this,d=!0;for(p.revert(),"object"==typeof t&&(t=p.getId(t)),n=["post_title","post_name","post_author","_status","jj","mm","aa","hh","mn","ss","post_password","post_format","menu_order"],"page"===p.type&&n.push("post_parent","page_template"),r=e("#inline-edit").clone(!0),e("td",r).attr("colspan",e(".widefat:first thead th:visible").length),e(p.what+t).hasClass("alternate")&&e(r).addClass("alternate"),e(p.what+t).hide().after(r),i=e("#inline_"+t),e(':input[name="post_author"] option[value="'+e(".post_author",i).text()+'"]',r).val()||e(':input[name="post_author"]',r).prepend('<option value="'+e(".post_author",i).text()+'">'+e("#"+p.type+"-"+t+" .author").text()+"</option>"),1===e(':input[name="post_author"] option',r).length&&e("label.inline-edit-author",r).hide(),c=e(".post_format",i).text(),e("option.unsupported",r).each(function(){var t=e(this);t.val()!==c&&t.remove()}),h=0;h<n.length;h++)e(':input[name="'+n[h]+'"]',r).val(e("."+n[h],i).text());if("open"===e(".comment_status",i).text()&&e('input[name="comment_status"]',r).prop("checked",!0),"open"===e(".ping_status",i).text()&&e('input[name="ping_status"]',r).prop("checked",!0),"sticky"===e(".sticky",i).text()&&e('input[name="sticky"]',r).prop("checked",!0),e(".post_category",i).each(function(){var n,i=e(this).text();i&&(n=e(this).attr("id").replace("_"+t,""),e("ul."+n+"-checklist :checkbox",r).val(i.split(",")))}),e(".tags_input",i).each(function(){var n=e(this).text(),i=e(this).attr("id").replace("_"+t,""),s=e("textarea.tax_input_"+i,r),o=inlineEditL10n.comma;n&&(","!==o&&(n=n.replace(/,/g,o)),s.val(n)),s.suggest(ajaxurl+"?action=ajax-tag-search&tax="+i,{delay:500,minchars:2,multiple:!0,multipleSep:inlineEditL10n.comma+" "})}),s=e("._status",i).text(),"future"!==s&&e('select[name="_status"] option[value="future"]',r).remove(),"private"===s&&(e('input[name="keep_private"]',r).prop("checked",!0),e("input.inline-edit-password-input").val("").prop("disabled",!0)),o=e('select[name="post_parent"] option[value="'+t+'"]',r),o.length>0){for(u=o[0].className.split("-")[1],f=o;d&&(f=f.next("option"),0!==f.length);)l=f[0].className.split("-")[1],u>=l?d=!1:(f.remove(),f=o);o.remove()}return e(r).attr("id","edit-"+t).addClass("inline-editor").show(),e(".ptitle",r).focus(),!1},save:function(t){var n,r,i=e(".post_status_page").val()||"";return"object"==typeof t&&(t=this.getId(t)),e("table.widefat .spinner").show(),n={action:"inline-save",post_type:typenow,post_ID:t,edit_date:"true",post_status:i},r=e("#edit-"+t).find(":input").serialize(),n=r+"&"+e.param(n),e.post(ajaxurl,n,function(n){e("table.widefat .spinner").hide(),n?-1!==n.indexOf("<tr")?(e(inlineEditPost.what+t).remove(),e("#edit-"+t).before(n).remove(),e(inlineEditPost.what+t).hide().fadeIn()):(n=n.replace(/<.[^<>]*?>/g,""),e("#edit-"+t+" .inline-edit-save .error").html(n).show()):e("#edit-"+t+" .inline-edit-save .error").html(inlineEditL10n.error).show(),e("#post-"+t).prev().hasClass("alternate")&&e("#post-"+t).removeClass("alternate")},"html"),!1},revert:function(){var t=e("table.widefat tr.inline-editor").attr("id");return t&&(e("table.widefat .spinner").hide(),"bulk-edit"===t?(e("table.widefat #bulk-edit").removeClass("inline-editor").hide(),e("#bulk-titles").html(""),e("#inlineedit").append(e("#bulk-edit"))):(e("#"+t).remove(),t=t.substr(t.lastIndexOf("-")+1),e(this.what+t).show())),!1},getId:function(t){var n=e(t).closest("tr").attr("id"),r=n.split("-");return r[r.length-1]}},e(document).ready(function(){inlineEditPost.init()}),e(document).on("heartbeat-tick.wp-check-locked-posts",function(t,n){var r=n["wp-check-locked-posts"]||{};e("#the-list tr").each(function(t,n){var i,s,o=n.id,u=e(n);r.hasOwnProperty(o)?u.hasClass("wp-locked")||(i=r[o],u.find(".column-title .locked-text").text(i.text),u.find(".check-column checkbox").prop("checked",!1),i.avatar_src&&(s=e('<img class="avatar avatar-18 photo" width="18" height="18" />').attr("src",i.avatar_src.replace(/&amp;/g,"&")),u.find(".column-title .locked-avatar").empty().append(s)),u.addClass("wp-locked")):u.hasClass("wp-locked")&&u.removeClass("wp-locked").delay(1e3).find(".locked-info span").empty()})}).on("heartbeat-send.wp-check-locked-posts",function(t,n){var r=[];e("#the-list tr").each(function(e,t){t.id&&r.push(t.id)}),r.length&&(n["wp-check-locked-posts"]=r)}).ready(function(){"undefined"!=typeof wp&&wp.heartbeat&&wp.heartbeat.interval(15)})}(jQuery);