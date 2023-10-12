"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["articles-observer"],{"./js/articles-observer.js":function(e,t,o){o.r(t);var m=o("./js/localstorage.js");(()=>{const n={articlesContainerSelector:".articles-container",articleObserverSelector:"entry-main-text",firstArticleSelector:".post",jetpackID:void 0===WA_ThemeSetup.general.jetpackID?"":WA_ThemeSetup.general.jetpackID,promotedExpire:ThemeSetup.promotedTTL||86400,comscoreC1:void 0===WA_ThemeSetup.general.comscoreC1?"":WA_ThemeSetup.general.comscoreC1,comscoreC2:void 0===WA_ThemeSetup.general.comscoreC2?"":WA_ThemeSetup.general.comscoreC2};let c,i=0,r=[],l;const s=e=>{var t=m.ls.get("promotedviews")||[];!1===t.includes(e)&&t.push(e),0<n.promotedExpire&&m.ls.set("promotedviews",t,n.promotedExpire)},d=(e,t=!0)=>{e=new CustomEvent("is.post-tracked",{detail:{postID:e.id,postMeta:e,byInfiniteScroll:t}});document.querySelector("body").dispatchEvent(e)};const o=new IntersectionObserver(e=>{e.forEach(e=>{e.isIntersecting&&t(e)})},{threshold:.02}),u=e=>{var t=document.createElement("textarea");return t.innerHTML=e,t.value},p=(e,o)=>{var t,a;e.dataset.isTracking||(t=JSON.parse(e.dataset.meta),a=parseInt(e.dataset.postId),e.setAttribute("data-is-tracking","true"),r.includes(a)&&s(a),d(t),"function"==typeof gtag&&(gtag("event","page_view",{page_location:window.location.href,medium:"infinite",infinite_scroll_index:i}),Array.isArray(t.canal))&&t.canal.forEach(function(e,t){gtag("event","page_view",{post_category:e,page_location:window.location.href,non_interaction:!0})}),"function"==typeof ga&&ga.hasOwnProperty("create")&&(ga("set","page",o),ga("send","pageview"),ga("send","event","Scroll Pageview",i,o),Array.isArray(t.canal))&&t.canal.forEach(function(e,t){ga("send","event","Pageviews por canal",e,o)}),document.getElementById("wpstats")&&""!==n.jetpackID&&(e=document.location.protocol+"//pixel.wp.com/g.gif?v=ext&j=1%3A9.5&blog="+n.jetpackID+"&post="+a+"&tz=-6&srv="+encodeURIComponent(window.location.hostname)+"&host="+encodeURIComponent(window.location.host)+"&ref="+encodeURIComponent(document.referrer)+"&rand="+Math.random(),document.getElementById("wpstats").src=e),void 0!==self.COMSCORE&&(async()=>{console.log("Tracking Comscore"),self.COMSCORE&&COMSCORE.beacon({c1:n.comscoreC1,c2:n.comscoreC2});try{await(await fetch("/pageview_candidate.txt?"+Date.now())).text()}catch(e){}})())},t=e=>{var t,o,a,r,s;1===e.target.nodeType&&(e=e.target.closest("article"),r=(t=JSON.parse(e.dataset.meta)).title,o=e.dataset.slug,a=document.querySelector(n.articlesContainerSelector),c?c!==e&&(c.removeAttribute("data-is-visible"),e.setAttribute("data-is-visible","true"),r=r,s=o,document.title=u(r),history.replaceState({},u(r),s),c=e,p(e,o),"0"!==e.dataset.scrollIndex?a.classList.contains("isScroll")||a.classList.add("isScroll"):a.classList.contains("isScroll")&&a.classList.remove("isScroll")):((c=e).setAttribute("data-is-visible","true"),e.setAttribute("data-is-tracking","true"),e.setAttribute("data-scroll-index",i++),d(t,!1),l=window.location.pathname+window.location.search,e.setAttribute("data-slug",l)))},a=e=>{e.forEach(function(e){"childList"===e.type&&e.addedNodes.forEach(e=>{var t;1===e.nodeType&&e.classList.contains("post")&&(t=(e=document.querySelector(`#${e.id} .entry-main-text`)).closest("article"),o.observe(e),t.setAttribute("data-scroll-index",i++))})})};return{init:()=>{var e=document.querySelector(n.articlesContainerSelector),e=(new MutationObserver(a).observe(e,{attributes:!0,childList:!0,characterData:!0}),document.querySelector(n.firstArticleSelector)),e=(e&&1===e.nodeType&&o.observe(e),document.querySelector("body"));e&&e.addEventListener("is.post-load",e=>{e.detail.postID&&e.detail.isPromoted&&r.push(e.detail.postID)})}}})().init()},"./js/localstorage.js":function(e,t,o){o.d(t,{ls:function(){return a}});const a={set:(e,t,o=86400)=>{t={value:t,ttl:Date.now()+1e3*o};localStorage.setItem(e,JSON.stringify(t))},get:e=>{var t=localStorage.getItem(e);return t?(t=JSON.parse(t),Date.now()>t.ttl?(localStorage.removeItem(e),null):t.value):null}}}}]);