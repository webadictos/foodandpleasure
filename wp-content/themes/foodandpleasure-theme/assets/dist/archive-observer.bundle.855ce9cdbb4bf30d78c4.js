(self.webpackChunk=self.webpackChunk||[]).push([["archive-observer"],{"./js/archive-observer.js":function(){(()=>{const t={articlesContainerSelector:".archive-articles-container",articleObserverSelector:".row",firstArticleSelector:".row"};let n,o=0;const s=(e,t=!0)=>{e=new CustomEvent("is.page-tracked",{detail:{page:e,byInfiniteScroll:t}});document.querySelector("body").dispatchEvent(e)};const a=new IntersectionObserver(e=>{e.forEach(e=>{e.isIntersecting&&r(e)})},{threshold:.02}),c=e=>{var t=document.createElement("textarea");return t.innerHTML=e,t.value},r=e=>{if(1===e.target.nodeType){var e=e.target,a=void 0!==e.dataset.page?JSON.parse(e.dataset.page):1;document.querySelector(t.articlesContainerSelector);if(n){if(n!==e){n.removeAttribute("data-is-visible"),e.setAttribute("data-is-visible","true");{var r=a;let e=document.title.replace(/ - Página [0-9]+/,"");let t=window.location.pathname.replace(/\/page\/[0-9]+/,"");1<r&&(t=t+"page/"+r+"/",e=e+" - Página "+r),document.title=c(e),history.replaceState({},c(e),t)}r=n=e;if(!r.dataset.isTracking){var i=void 0!==r.dataset.page?JSON.parse(r.dataset.page):1;let e=window.location.pathname,t=e.replace(/\/page\/[0-9]+/,"");r.setAttribute("data-is-tracking","true"),s(i),(t=1<i?t+"page/"+i+"/":t)!=e&&(history.pushState({page:i},"/page/"+i+"/",t),e=t,"function"==typeof gtag&&gtag("event","page_view",{page_location:window.location.href,page_referrer:"Infinite Scroll",infinite_scroll_index:o}),"function"==typeof ga)&&(ga("set","page",t),ga("send","pageview"),ga("send","event","Scroll Archive Pageview",o,t))}}}else(n=e).setAttribute("data-is-visible","true"),e.setAttribute("data-is-tracking","true"),e.setAttribute("data-scroll-index",o++),s(a,!1)}},i=e=>{e.forEach(function(e){"childList"===e.type&&e.addedNodes.forEach(e=>{var t;1===e.nodeType&&e.classList.contains("row")&&(t=e,a.observe(e),t.setAttribute("data-scroll-index",o++))})})};return{init:()=>{var e=document.querySelector(t.articlesContainerSelector),e=(new MutationObserver(i).observe(e,{attributes:!0,childList:!0,characterData:!0}),e.querySelector(t.firstArticleSelector));e&&1===e.nodeType&&a.observe(e)}}})().init()}}]);