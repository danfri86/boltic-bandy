/**
 * Update date picker element
 * Used for static & dynamic added elements (when clone)
 */jQuery(document).ready(function(e){function t(){var t=e(this),n=t.data("options");t.siblings(".ui-datepicker-append").remove();t.removeClass("hasDatepicker").attr("id","").datepicker(n)}e(":input.rwmb-date").each(t);e(".rwmb-input").on("clone",":input.rwmb-date",t)});