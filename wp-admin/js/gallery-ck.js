/* global unescape, getUserSetting, setUserSetting */jQuery(document).ready(function(e){var t,n,r,i,s,o=!1;n=function(){t=e("#media-items").sortable({items:"div.media-item",placeholder:"sorthelper",axis:"y",distance:2,handle:"div.filename",stop:function(){var t=e("#media-items").sortable("toArray"),n=t.length;e.each(t,function(t,r){var i=o?n-t:1+t;e("#"+r+" .menu_order input").val(i)})}})};r=function(){var t=e(".menu_order_input"),n=t.length;t.each(function(t){var r=o?n-t:1+t;e(this).val(r)})};i=function(t){t=t||0;e(".menu_order_input").each(function(){if(this.value==="0"||t)this.value=""})};e("#asc").click(function(){o=!1;r();return!1});e("#desc").click(function(){o=!0;r();return!1});e("#clear").click(function(){i(1);return!1});e("#showall").click(function(){e("#sort-buttons span a").toggle();e("a.describe-toggle-on").hide();e("a.describe-toggle-off, table.slidetoggle").show();e("img.pinkynail").toggle(!1);return!1});e("#hideall").click(function(){e("#sort-buttons span a").toggle();e("a.describe-toggle-on").show();e("a.describe-toggle-off, table.slidetoggle").hide();e("img.pinkynail").toggle(!0);return!1});n();i();if(e("#media-items>*").length>1){s=wpgallery.getWin();e("#save-all, #gallery-settings").show();if(typeof s.tinyMCE!="undefined"&&s.tinyMCE.activeEditor&&!s.tinyMCE.activeEditor.isHidden()){wpgallery.mcemode=!0;wpgallery.init()}else e("#insert-gallery").show()}});jQuery(window).unload(function(){tinymce=tinyMCE=wpgallery=null});var tinymce=null,tinyMCE,wpgallery;wpgallery={mcemode:!1,editor:{},dom:{},is_update:!1,el:{},I:function(e){return document.getElementById(e)},init:function(){var e=this,t,n,r,i,s=e.getWin();if(!e.mcemode)return;t=(""+document.location.search).replace(/^\?/,"").split("&");n={};for(r=0;r<t.length;r++){i=t[r].split("=");n[unescape(i[0])]=unescape(i[1])}n.mce_rdomain&&(document.domain=n.mce_rdomain);tinymce=s.tinymce;tinyMCE=s.tinyMCE;e.editor=tinymce.EditorManager.activeEditor;e.setup()},getWin:function(){return window.dialogArguments||opener||parent||top},setup:function(){var e=this,t,n=e.editor,r,i,s,o,u;if(!e.mcemode)return;e.el=n.selection.getNode();if(e.el.nodeName!=="IMG"||!n.dom.hasClass(e.el,"wpGallery")){if(!(r=n.dom.select("img.wpGallery"))||!r[0]){getUserSetting("galfile")==="1"&&(e.I("linkto-file").checked="checked");getUserSetting("galdesc")==="1"&&(e.I("order-desc").checked="checked");getUserSetting("galcols")&&(e.I("columns").value=getUserSetting("galcols"));getUserSetting("galord")&&(e.I("orderby").value=getUserSetting("galord"));jQuery("#insert-gallery").show();return}e.el=r[0]}t=n.dom.getAttrib(e.el,"title");t=n.dom.decode(t);if(t){jQuery("#update-gallery").show();e.is_update=!0;i=t.match(/columns=['"]([0-9]+)['"]/);s=t.match(/link=['"]([^'"]+)['"]/i);o=t.match(/order=['"]([^'"]+)['"]/i);u=t.match(/orderby=['"]([^'"]+)['"]/i);s&&s[1]&&(e.I("linkto-file").checked="checked");o&&o[1]&&(e.I("order-desc").checked="checked");i&&i[1]&&(e.I("columns").value=""+i[1]);u&&u[1]&&(e.I("orderby").value=u[1])}else jQuery("#insert-gallery").show()},update:function(){var e=this,t=e.editor,n="",r;if(!e.mcemode||!e.is_update){r="[gallery"+e.getSettings()+"]";e.getWin().send_to_editor(r);return}if(e.el.nodeName!=="IMG")return;n=t.dom.decode(t.dom.getAttrib(e.el,"title"));n=n.replace(/\s*(order|link|columns|orderby)=['"]([^'"]+)['"]/gi,"");n+=e.getSettings();t.dom.setAttrib(e.el,"title",n);e.getWin().tb_remove()},getSettings:function(){var e=this.I,t="";if(e("linkto-file").checked){t+=' link="file"';setUserSetting("galfile","1")}if(e("order-desc").checked){t+=' order="DESC"';setUserSetting("galdesc","1")}if(e("columns").value!==3){t+=' columns="'+e("columns").value+'"';setUserSetting("galcols",e("columns").value)}if(e("orderby").value!=="menu_order"){t+=' orderby="'+e("orderby").value+'"';setUserSetting("galord",e("orderby").value)}return t}};