/* global tb_click */var thickDims,tbWidth,tbHeight;jQuery(document).ready(function(e){thickDims=function(){var t=e("#TB_window"),n=e(window).height(),r=e(window).width(),i,s;i=tbWidth&&tbWidth<r-90?tbWidth:r-90;s=tbHeight&&tbHeight<n-60?tbHeight:n-60;if(t.size()){t.width(i).height(s);e("#TB_iframeContent").width(i).height(s-27);t.css({"margin-left":"-"+parseInt(i/2,10)+"px"});typeof document.body.style.maxWidth!="undefined"&&t.css({top:"30px","margin-top":"0"})}};thickDims();e(window).resize(function(){thickDims()});e("a.thickbox-preview").click(function(){tb_click.call(this);var t=e(this).parents(".available-theme").find(".activatelink"),n="",r=e(this).attr("href"),i,s;(tbWidth=r.match(/&tbWidth=[0-9]+/))?tbWidth=parseInt(tbWidth[0].replace(/[^0-9]+/g,""),10):tbWidth=e(window).width()-90;(tbHeight=r.match(/&tbHeight=[0-9]+/))?tbHeight=parseInt(tbHeight[0].replace(/[^0-9]+/g,""),10):tbHeight=e(window).height()-60;if(t.length){i=t.attr("href")||"";s=t.attr("title")||"";n='&nbsp; <a href="'+i+'" target="_top" class="tb-theme-preview-link">'+s+"</a>"}else{s=e(this).attr("title")||"";n='&nbsp; <span class="tb-theme-preview-link">'+s+"</span>"}e("#TB_title").css({"background-color":"#222",color:"#dfdfdf"});e("#TB_closeAjaxWindow").css({"float":"left"});e("#TB_ajaxWindowTitle").css({"float":"right"}).html(n);e("#TB_iframeContent").width("100%");thickDims();return!1})});