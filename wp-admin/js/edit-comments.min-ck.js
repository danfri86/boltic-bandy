var setCommentsList,theList,theExtraList,commentReply,toggleWithKeyboard=!1;!function(e){var t,n,r,i;setCommentsList=function(){var s,o,u,f,l,h,p,v,m,g=0;s=e('input[name="_total"]',"#comments-form"),o=e('input[name="_per_page"]',"#comments-form"),u=e('input[name="_page"]',"#comments-form"),f=function(t,n){var i,s,o,u=e("#"+n.element);i=e("#replyrow"),s=e("#comment_ID",i).val(),o=e("#replybtn",i),u.is(".unapproved")?(n.data.id==s&&o.text(adminCommentsL10n.replyApprove),u.find("div.comment_status").html("0")):(n.data.id==s&&o.text(adminCommentsL10n.reply),u.find("div.comment_status").html("1")),m=e("#"+n.element).is("."+n.dimClass)?1:-1,r(m)},l=function(t,n){var r,i,f,l,c,h,p,d=!1,v=e(t.target).attr("data-wp-lists");return t.data._total=s.val()||0,t.data._per_page=o.val()||0,t.data._page=u.val()||0,t.data._url=document.location.href,t.data.comment_status=e('input[name="comment_status"]',"#comments-form").val(),-1!=v.indexOf(":trash=1")?d="trash":-1!=v.indexOf(":spam=1")&&(d="spam"),d&&(i=v.replace(/.*?comment-([0-9]+).*/,"$1"),f=e("#comment-"+i),r=e("#"+d+"-undo-holder").html(),f.find(".check-column :checkbox").prop("checked",!1),f.siblings("#replyrow").length&&commentReply.cid==i&&commentReply.close(),f.is("tr")?(l=f.children(":visible").length,p=e(".author strong",f).text(),c=e('<tr id="undo-'+i+'" class="undo un'+d+'" style="display:none;"><td colspan="'+l+'">'+r+"</td></tr>")):(p=e(".comment-author",f).text(),c=e('<div id="undo-'+i+'" style="display:none;" class="undo un'+d+'">'+r+"</div>")),f.before(c),e("strong","#undo-"+i).text(p),h=e(".undo a","#undo-"+i),h.attr("href","comment.php?action=un"+d+"comment&c="+i+"&_wpnonce="+t.data._ajax_nonce),h.attr("data-wp-lists","delete:the-comment-list:comment-"+i+"::un"+d+"=1"),h.attr("class","vim-z vim-destructive"),e(".avatar",f).clone().prependTo("#undo-"+i+" ."+d+"-undo-inside"),h.click(function(){return n.wpList.del(this),e("#undo-"+i).css({backgroundColor:"#ceb"}).fadeOut(350,function(){e(this).remove(),e("#comment-"+i).css("backgroundColor","").fadeIn(300,function(){e(this).show()})}),!1})),t},h=function(e,t,n){g>t||(n&&(g=t),s.val(e.toString()))},i=function(r){var i,s,o,u,f=e("#dashboard_right_now");r=r||0,!isNaN(r)&&f.length&&(i=e("span.total-count",f),s=e("span.approved-count",f),o=t(i),o+=r,u=o-t(e("span.pending-count",f))-t(e("span.spam-count",f)),n(i,o),n(s,u))},t=function(e){var t=parseInt(e.html().replace(/[^0-9]+/g,""),10);return isNaN(t)?0:t},n=function(e,t){var n="";if(!isNaN(t)){if(t=1>t?"0":t.toString(),t.length>3){for(;t.length>3;)n=thousandsSeparator+t.substr(t.length-3)+n,t=t.substr(0,t.length-3);t+=n}e.html(t)}},r=function(r){e("span.pending-count").each(function(){var i=e(this),s=t(i)+r;1>s&&(s=0),i.closest(".awaiting-mod")[0===s?"addClass":"removeClass"]("count-0"),n(i,s)}),i()},p=function(o,u){function f(t){return e(u.target).parent().is("span."+t)?1:e("#"+u.element).is("."+t)?-1:0}var l,p,m,y,w,E,S=e(u.target).parent().is("span.untrash"),x=e(u.target).parent().is("span.unspam"),T=e("#"+u.element).is(".unapproved");w=S?-1:f("trash"),y=x?-1:f("spam"),e(u.target).parent().is("span.unapprove")||(S||x)&&T?E=1:T&&(E=-1),E&&r(E),e("span.spam-count").each(function(){var r=e(this),i=t(r)+y;n(r,i)}),e("span.trash-count").each(function(){var r=e(this),i=t(r)+w;n(r,i)}),e("#dashboard_right_now").length?(m=w?-1*w:0,i(m)):(p=s.val()?parseInt(s.val(),10):0,e(u.target).parent().is("span.undo")?p++:p--,0>p&&(p=0),"object"==typeof o&&g<u.parsed.responses[0].supplemental.time?(l=u.parsed.responses[0].supplemental.total_items_i18n||"",l&&(e(".displaying-num").text(l),e(".total-pages").text(u.parsed.responses[0].supplemental.total_pages_i18n),e(".tablenav-pages").find(".next-page, .last-page").toggleClass("disabled",u.parsed.responses[0].supplemental.total_pages==e(".current-page").val())),h(p,u.parsed.responses[0].supplemental.time,!0)):h(p,o,!1)),!theExtraList||0===theExtraList.size()||0===theExtraList.children().size()||S||x||(theList.get(0).wpList.add(theExtraList.children(":eq(0)").remove().clone()),v())},v=function(t){var n=e.query.get(),r=e(".total-pages").text(),i=e('input[name="_per_page"]',"#comments-form").val();n.paged||(n.paged=1),n.paged>r||(t?(theExtraList.empty(),n.number=Math.min(8,i)):(n.number=1,n.offset=Math.min(8,i)-1),n.no_placeholder=!0,n.paged++,!0===n.comment_type&&(n.comment_type=""),n=e.extend(n,{action:"fetch-list",list_args:list_args,_ajax_fetch_list_nonce:e("#_ajax_fetch_list_nonce").val()}),e.ajax({url:ajaxurl,global:!1,dataType:"json",data:n,success:function(e){theExtraList.get(0).wpList.add(e.rows)}}))},theExtraList=e("#the-extra-comment-list").wpList({alt:"",delColor:"none",addColor:"none"}),theList=e("#the-comment-list").wpList({alt:"",delBefore:l,dimAfter:f,delAfter:p,addColor:"none"}).bind("wpListDelEnd",function(t,n){var r=e(n.target).attr("data-wp-lists"),i=n.element.replace(/[^0-9]+/g,"");(-1!=r.indexOf(":trash=1")||-1!=r.indexOf(":spam=1"))&&e("#undo-"+i).fadeIn(300,function(){e(this).show()})})},commentReply={cid:"",act:"",init:function(){var t=e("#replyrow");e("a.cancel",t).click(function(){return commentReply.revert()}),e("a.save",t).click(function(){return commentReply.send()}),e("input#author, input#author-email, input#author-url",t).keypress(function(e){return 13==e.which?(commentReply.send(),e.preventDefault(),!1):void 0}),e("#the-comment-list .column-comment > p").dblclick(function(){commentReply.toggle(e(this).parent())}),e("#doaction, #doaction2, #post-query-submit").click(function(){e("#the-comment-list #replyrow").length>0&&commentReply.close()}),this.comments_listing=e('#comments-form > input[name="comment_status"]').val()||""},addEvents:function(t){t.each(function(){e(this).find(".column-comment > p").dblclick(function(){commentReply.toggle(e(this).parent())})})},toggle:function(t){"none"!=e(t).css("display")&&e(t).find("a.vim-q").click()},revert:function(){return e("#the-comment-list #replyrow").length<1?!1:(e("#replyrow").fadeOut("fast",function(){commentReply.close()}),!1)},close:function(){var t,n=e("#replyrow");n.parent().is("#com-reply")||(this.cid&&"edit-comment"==this.act&&(t=e("#comment-"+this.cid),t.fadeIn(300,function(){t.show()}).css("backgroundColor","")),"undefined"!=typeof QTags&&QTags.closeAllTags("replycontent"),e("#add-new-comment").css("display",""),n.hide(),e("#com-reply").append(n),e("#replycontent").css("height","").val(""),e("#edithead input").val(""),e(".error",n).html("").hide(),e(".spinner",n).hide(),this.cid="")},open:function(t,n,r){var i,s,o,u,f,l=this,c=e("#comment-"+t),h=c.height();return l.close(),l.cid=t,i=e("#replyrow"),s=e("#inline-"+t),r=r||"replyto",o="edit"==r?"edit":"replyto",o=l.act=o+"-comment",e("#action",i).val(o),e("#comment_post_ID",i).val(n),e("#comment_ID",i).val(t),"edit"==r?(e("#author",i).val(e("div.author",s).text()),e("#author-email",i).val(e("div.author-email",s).text()),e("#author-url",i).val(e("div.author-url",s).text()),e("#status",i).val(e("div.comment_status",s).text()),e("#replycontent",i).val(e("textarea.comment",s).val()),e("#edithead, #savebtn",i).show(),e("#replyhead, #replybtn, #addhead, #addbtn",i).hide(),h>120&&(f=h>500?500:h,e("#replycontent",i).css("height",f+"px")),c.after(i).fadeOut("fast",function(){e("#replyrow").fadeIn(300,function(){e(this).show()})})):"add"==r?(e("#addhead, #addbtn",i).show(),e("#replyhead, #replybtn, #edithead, #editbtn",i).hide(),e("#the-comment-list").prepend(i),e("#replyrow").fadeIn(300)):(u=e("#replybtn",i),e("#edithead, #savebtn, #addhead, #addbtn",i).hide(),e("#replyhead, #replybtn",i).show(),c.after(i),c.hasClass("unapproved")?u.text(adminCommentsL10n.replyApprove):u.text(adminCommentsL10n.reply),e("#replyrow").fadeIn(300,function(){e(this).show()})),setTimeout(function(){var t,n,r,i,s;t=e("#replyrow").offset().top,n=t+e("#replyrow").height(),r=window.pageYOffset||document.documentElement.scrollTop,i=document.documentElement.clientHeight||window.innerHeight||0,s=r+i,n>s-20?window.scroll(0,n-i+35):r>t-20&&window.scroll(0,t-35),e("#replycontent").focus().keyup(function(e){27==e.which&&commentReply.revert()})},600),!1},send:function(){var t={};return e("#replysubmit .error").hide(),e("#replysubmit .spinner").show(),e("#replyrow input").not(":button").each(function(){var n=e(this);t[n.attr("name")]=n.val()}),t.content=e("#replycontent").val(),t.id=t.comment_post_ID,t.comments_listing=this.comments_listing,t.p=e('[name="p"]').val(),e("#comment-"+e("#comment_ID").val()).hasClass("unapproved")&&(t.approve_parent=1),e.ajax({type:"POST",url:ajaxurl,data:t,success:function(e){commentReply.show(e)},error:function(e){commentReply.error(e)}}),!1},show:function(t){var n,i,s,o,u,f=this;return"string"==typeof t?(f.error({responseText:t}),!1):(n=wpAjax.parseAjaxResponse(t),n.errors?(f.error({responseText:wpAjax.broken}),!1):(f.revert(),n=n.responses[0],s="#comment-"+n.id,"edit-comment"==f.act&&e(s).remove(),n.supplemental.parent_approved&&(u=e("#comment-"+n.supplemental.parent_approved),r(-1),"moderated"==this.comments_listing)?(u.animate({backgroundColor:"#CCEEBB"},400,function(){u.fadeOut()}),void 0):(i=e.trim(n.data),e(i).hide(),e("#replyrow").after(i),s=e(s),f.addEvents(s),o=s.hasClass("unapproved")?"#FFFFE0":s.closest(".widefat, .postbox").css("backgroundColor"),s.animate({backgroundColor:"#CCEEBB"},300).animate({backgroundColor:o},300,function(){u&&u.length&&u.animate({backgroundColor:"#CCEEBB"},300).animate({backgroundColor:o},300).removeClass("unapproved").addClass("approved").find("div.comment_status").html("1")}),void 0)))},error:function(t){var n=t.statusText;e("#replysubmit .spinner").hide(),t.responseText&&(n=t.responseText.replace(/<.[^<>]*?>/g,"")),n&&e("#replysubmit .error").html(n).show()},addcomment:function(t){var n=this;e("#add-new-comment").fadeOut(200,function(){n.open(0,t,"add"),e("table.comments-box").css("display",""),e("#no-comments").remove()})}},e(document).ready(function(){var t,n,r,i;setCommentsList(),commentReply.init(),e(document).delegate("span.delete a.delete","click",function(){return!1}),"undefined"!=typeof e.table_hotkeys&&(t=function(t){return function(){var n,r;n="next"==t?"first":"last",r=e(".tablenav-pages ."+t+"-page:not(.disabled)"),r.length&&(window.location=r[0].href.replace(/\&hotkeys_highlight_(first|last)=1/g,"")+"&hotkeys_highlight_"+n+"=1")}},n=function(t,n){window.location=e("span.edit a",n).attr("href")},r=function(){toggleWithKeyboard=!0,e("input:checkbox","#cb").click().prop("checked",!1),toggleWithKeyboard=!1},i=function(t){return function(){var n=e('select[name="action"]');e('option[value="'+t+'"]',n).prop("selected",!0),e("#doaction").click()}},e.table_hotkeys(e("table.widefat"),["a","u","s","d","r","q","z",["e",n],["shift+x",r],["shift+a",i("approve")],["shift+s",i("spam")],["shift+d",i("delete")],["shift+t",i("trash")],["shift+z",i("untrash")],["shift+u",i("unapprove")]],{highlight_first:adminCommentsL10n.hotkeys_highlight_first,highlight_last:adminCommentsL10n.hotkeys_highlight_last,prev_page_link_cb:t("prev"),next_page_link_cb:t("next")}))})}(jQuery);