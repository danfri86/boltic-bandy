/* global zxcvbn */window.wp=window.wp||{};var passwordStrength;(function(e){wp.passwordStrength={meter:function(t,n,r){e.isArray(n)||(n=[n.toString()]);if(t!=r&&r&&r.length>0)return 5;var i=zxcvbn(t,n);return i.score},userInputBlacklist:function(){var t,n,r,i,s=[],o=[],u=["user_login","first_name","last_name","nickname","display_name","email","url","description","weblog_title","admin_email"];s.push(document.title);s.push(document.URL);n=u.length;for(t=0;t<n;t++){i=e("#"+u[t]);if(0===i.length)continue;s.push(i[0].defaultValue);s.push(i.val())}r=s.length;for(t=0;t<r;t++)s[t]&&(o=o.concat(s[t].replace(/\W/g," ").split(" ")));o=e.grep(o,function(t,n){return""===t||4>t.length?!1:e.inArray(t,o)===n});return o}};passwordStrength=wp.passwordStrength.meter})(jQuery);