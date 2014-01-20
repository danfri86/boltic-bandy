/*
* jQuery UI Tag-it!
*
* @version v2.0 (06/2011)
*
* Copyright 2011, Levy Carneiro Jr.
* Released under the MIT license.
* http://aehlke.github.com/tag-it/LICENSE
*
* Homepage:
*   http://aehlke.github.com/tag-it/
*
* Authors:
*   Levy Carneiro Jr.
*   Martin Rehfeld
*   Tobias Schmidt
*   Skylar Challand
*   Alex Ehlke
*
* Maintainer:
*   Alex Ehlke - Twitter: @aehlke
*
* Dependencies:
*   jQuery v1.4+
*   jQuery UI v1.8+
*/(function(e){e.widget("ui.tagit",{options:{itemName:"item",fieldName:"tags",availableTags:[],tagSource:null,removeConfirmation:!1,caseSensitive:!0,allowSpaces:!1,animate:!0,singleField:!1,singleFieldDelimiter:",",singleFieldNode:null,tabIndex:null,onTagAdded:null,onTagRemoved:null,onTagClicked:null},_create:function(){var t=this;if(this.element.is("input")){this.tagList=e("<ul></ul>").insertAfter(this.element);this.options.singleField=!0;this.options.singleFieldNode=this.element;this.element.css("display","none");this.options.tabIndex||(this.options.tabIndex=this.element.attr("tabindex"))}else this.tagList=this.element.find("ul, ol").andSelf().last();this._tagInput=e('<input type="text" />').addClass("ui-widget-content");this.options.tabIndex&&this._tagInput.attr("tabindex",this.options.tabIndex);this.options.tagSource=this.options.tagSource||function(t,n){var r=t.term.toLowerCase(),i=e.grep(this.options.availableTags,function(e){return e.toLowerCase().indexOf(r)===0});n(this._subtractArray(i,this.assignedTags()))};e.isFunction(this.options.tagSource)&&(this.options.tagSource=e.proxy(this.options.tagSource,this));this.tagList.addClass("tagit").append(e('<li class="tagit-new"></li>').append(this._tagInput)).click(function(n){var r=e(n.target);r.hasClass("tagit-label")?t._trigger("onTagClicked",n,r.closest(".tagit-choice")):t._tagInput.focus()});this.tagList.children("li").each(function(){if(!e(this).hasClass("tagit-new")){t.createTag(e(this).html(),e(this).attr("class"));e(this).remove()}});if(this.options.singleField)if(this.options.singleFieldNode){var n=e(this.options.singleFieldNode),r=n.val().split(this.options.singleFieldDelimiter);n.val("");e.each(r,function(e,n){t.createTag(n)})}else this.options.singleFieldNode=this.tagList.after('<input type="hidden" style="display:none;" value="" name="'+this.options.fieldName+'" />');this._tagInput.keydown(function(n){if(n.which==e.ui.keyCode.BACKSPACE&&t._tagInput.val()===""){var r=t._lastTag();!t.options.removeConfirmation||r.hasClass("remove")?t.removeTag(r):t.options.removeConfirmation&&r.addClass("remove ui-state-highlight")}else t.options.removeConfirmation&&t._lastTag().removeClass("remove ui-state-highlight");if(n.which==e.ui.keyCode.COMMA||n.which==e.ui.keyCode.ENTER||n.which==e.ui.keyCode.TAB&&t._tagInput.val()!==""||n.which==e.ui.keyCode.SPACE&&t.options.allowSpaces!==!0&&(e.trim(t._tagInput.val()).replace(/^s*/,"").charAt(0)!='"'||e.trim(t._tagInput.val()).charAt(0)=='"'&&e.trim(t._tagInput.val()).charAt(e.trim(t._tagInput.val()).length-1)=='"'&&e.trim(t._tagInput.val()).length-1!==0)){n.preventDefault();t.createTag(t._cleanedInput());t._tagInput.autocomplete("close")}}).blur(function(e){t.createTag(t._cleanedInput())});(this.options.availableTags||this.options.tagSource)&&this._tagInput.autocomplete({source:this.options.tagSource,select:function(e,n){t._tagInput.val()===""&&t.removeTag(t._lastTag(),!1);t.createTag(n.item.value);return!1}})},_cleanedInput:function(){return e.trim(this._tagInput.val().replace(/^"(.*)"$/,"$1"))},_lastTag:function(){return this.tagList.children(".tagit-choice:last")},assignedTags:function(){var t=this,n=[];if(this.options.singleField){n=e(this.options.singleFieldNode).val().split(this.options.singleFieldDelimiter);n[0]===""&&(n=[])}else this.tagList.children(".tagit-choice").each(function(){n.push(t.tagLabel(this))});return n},_updateSingleTagsField:function(t){e(this.options.singleFieldNode).val(t.join(this.options.singleFieldDelimiter))},_subtractArray:function(t,n){var r=[];for(var i=0;i<t.length;i++)e.inArray(t[i],n)==-1&&r.push(t[i]);return r},tagLabel:function(t){return this.options.singleField?e(t).children(".tagit-label").text():e(t).children("input").val()},_isNew:function(e){var t=this,n=!0;this.tagList.children(".tagit-choice").each(function(r){if(t._formatStr(e)==t._formatStr(t.tagLabel(this))){n=!1;return!1}});return n},_formatStr:function(t){return this.options.caseSensitive?t:e.trim(t.toLowerCase())},createTag:function(t,n){var r=this;t=e.trim(t);if(!this._isNew(t)||t==="")return!1;var i=e(this.options.onTagClicked?'<a class="tagit-label"></a>':'<span class="tagit-label"></span>').text(t),s=e("<li></li>").addClass("tagit-choice ui-widget-content ui-state-default ui-corner-all").addClass(n).append(i),o=e("<span></span>").addClass("ui-icon ui-icon-close"),u=e('<a><span class="text-icon">×</span></a>').addClass("tagit-close").append(o).click(function(e){r.removeTag(s)});s.append(u);if(this.options.singleField){var a=this.assignedTags();a.push(t);this._updateSingleTagsField(a)}else{var f=i.html();s.append('<input type="hidden" style="display:none;" value="'+f+'" name="'+this.options.itemName+"["+this.options.fieldName+'][]" />')}this._trigger("onTagAdded",null,s);this._tagInput.val("");this._tagInput.parent().before(s)},removeTag:function(t,n){n=n||this.options.animate;t=e(t);this._trigger("onTagRemoved",null,t);if(this.options.singleField){var r=this.assignedTags(),i=this.tagLabel(t);r=e.grep(r,function(e){return e!=i});this._updateSingleTagsField(r)}n?t.fadeOut("fast").hide("blind",{direction:"horizontal"},"fast",function(){t.remove()}).dequeue():t.remove()},removeAll:function(){var e=this;this.tagList.children(".tagit-choice").each(function(t,n){e.removeTag(n,!1)})}})})(jQuery);