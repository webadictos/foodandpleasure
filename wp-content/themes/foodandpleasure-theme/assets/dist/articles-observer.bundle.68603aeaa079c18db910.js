"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["articles-observer"],{"./js/articles-observer.js":function(e,t,a){a.r(t);var m=a("./js/localstorage.js");(()=>{const c={articlesContainerSelector:".articles-container",articleObserverSelector:"entry-main-text",firstArticleSelector:".post",jetpackID:void 0===WA_ThemeSetup.general.jetpackID?"":WA_ThemeSetup.general.jetpackID,promotedExpire:ThemeSetup.promotedTTL||86400,comscoreC1:void 0===WA_ThemeSetup.general.comscoreC1?"":WA_ThemeSetup.general.comscoreC1,comscoreC2:void 0===WA_ThemeSetup.general.comscoreC2?"":WA_ThemeSetup.general.comscoreC2};let n,i=0,o=[],l;const r=e=>{var t=m.ls.get("promotedviews")||[];!1===t.includes(e)&&t.push(e),0<c.promotedExpire&&m.ls.set("promotedviews",t,c.promotedExpire)},d=(e,t=!0)=>{e=new CustomEvent("is.post-tracked",{detail:{postID:e.id,postMeta:e,byInfiniteScroll:t}});document.querySelector("body").dispatchEvent(e)};const a=new IntersectionObserver(e=>{e.forEach(e=>{e.isIntersecting&&t(e)})},{threshold:.02}),u=e=>{var t=document.createElement("textarea");return t.innerHTML=e,t.value},p=(e,a)=>{var t;e.dataset.isTracking||(t=JSON.parse(e.dataset.meta),e.setAttribute("data-is-tracking","true"),o.includes(t.id)&&r(t.id),d(t),"function"==typeof gtag&&(gtag("event","page_view",{page_location:window.location.href}),Array.isArray(t.canal))&&t.canal.forEach(function(e,t){gtag("event","page_view",{event_category:"Pageviews por canal",event_label:e,page_path:a})}),"function"==typeof ga&&ga.hasOwnProperty("create")&&(ga("set","page",a),ga("send","pageview"),ga("send","event","Scroll Pageview",i,a),Array.isArray(t.canal))&&t.canal.forEach(function(e,t){ga("send","event","Pageviews por canal",e,a)}),document.getElementById("wpstats")&&""!==c.jetpackID&&(e=document.location.protocol+"//pixel.wp.com/g.gif?v=ext&j=1%3A9.5&blog="+c.jetpackID+"&post="+t.id+"&tz=-6&srv="+encodeURIComponent(window.location.hostname)+"&host="+encodeURIComponent(window.location.host)+"&ref="+encodeURIComponent(document.referrer)+"&rand="+Math.random(),document.getElementById("wpstats").src=e),void 0!==self.COMSCORE&&(async()=>{console.log("Tracking Comscore"),self.COMSCORE&&COMSCORE.beacon({c1:c.comscoreC1,c2:c.comscoreC2});try{await(await fetch("/pageview_candidate.txt?"+Date.now())).text()}catch(e){}})())},t=e=>{var t,a,o,r,s;1===e.target.nodeType&&(e=e.target.closest("article"),r=(t=JSON.parse(e.dataset.meta)).title,a=e.dataset.slug,o=document.querySelector(c.articlesContainerSelector),n?n!==e&&(n.removeAttribute("data-is-visible"),e.setAttribute("data-is-visible","true"),r=r,s=a,document.title=u(r),history.replaceState({},u(r),s),n=e,p(e,a),"0"!==e.dataset.scrollIndex?o.classList.contains("isScroll")||o.classList.add("isScroll"):o.classList.contains("isScroll")&&o.classList.remove("isScroll")):((n=e).setAttribute("data-is-visible","true"),e.setAttribute("data-is-tracking","true"),e.setAttribute("data-scroll-index",i++),d(t,!1),l=window.location.pathname+window.location.search,e.setAttribute("data-slug",l)))},s=e=>{e.forEach(function(e){"childList"===e.type&&e.addedNodes.forEach(e=>{var t;1===e.nodeType&&e.classList.contains("post")&&(t=(e=document.querySelector(`#${e.id} .entry-main-text`)).closest("article"),a.observe(e),t.setAttribute("data-scroll-index",i++))})})};return{init:()=>{var e=document.querySelector(c.articlesContainerSelector),e=(new MutationObserver(s).observe(e,{attributes:!0,childList:!0,characterData:!0}),document.querySelector(c.firstArticleSelector)),e=(e&&1===e.nodeType&&a.observe(e),document.querySelector("body"));e&&e.addEventListener("is.post-load",e=>{e.detail.postID&&e.detail.isPromoted&&o.push(e.detail.postID)})}}})().init()},"./js/localstorage.js":function(e,t,a){a.d(t,{ls:function(){return o}});const o={set:(e,t,a=86400)=>{t={value:t,ttl:Date.now()+1e3*a};localStorage.setItem(e,JSON.stringify(t))},get:e=>{var t=localStorage.getItem(e);return t?(t=JSON.parse(t),Date.now()>t.ttl?(localStorage.removeItem(e),null):t.value):null}}}}]);