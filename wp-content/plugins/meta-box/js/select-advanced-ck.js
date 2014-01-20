/**
 * Update select2
 * Used for static & dynamic added elements (when clone)
 */jQuery(document).ready(function(e){function t(){var t=e(this),n=t.data("options");t.siblings(".select2-container").remove();t.select2(n)}e(":input.rwmb-select-advanced").each(t);e(".rwmb-input").on("clone",":input.rwmb-select-advanced",t)});