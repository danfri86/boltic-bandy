/**
 * Update datetime picker element
 * Used for static & dynamic added elements (when clone)
 */jQuery(document).ready(function(e){function t(){var t=e(this),n=t.data("options");t.siblings(".ui-datepicker-append").remove();t.removeClass("hasDatepicker").attr("id","").datetimepicker(n)}e(":input.rwmb-datetime").each(t);e(".rwmb-input").on("clone",":input.rwmb-datetime",t)});