jQuery(function(e){e.each(gfcpt_linked_selects.items,function(){var t=this;e(t.target).attr("disabled","disabled");var n=e(t.source);n.change(function(){var n=e(this),r=e(t.target);r.find("option").remove();if(parseInt(n.val())>0){r.removeAttr("disabled");r.append('<option selected="selected" value="">'+t.default_option+"</option>");e.each(t.terms,function(){var e=this;e.parent==n.val()&&r.append('<option value="'+e.id+'">'+e.name+"</option>")})}else r.attr("disabled","disabled").append('<option value="">'+t.unselected+"</option>")});parseInt(n.val())>0&&n.change()})});