"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["single"],{"./js/single.js":function(e,t,l){l.r(t),l.d(t,{Single:function(){return s}});var d=l("./js/wordpress-functions.js"),r=l("./js/file-loader.js");const s=(()=>{let e=!1,t,n=!1;const o=e=>{e.detail.postID&&(WA_ThemeSetup.currentID=e.detail.postID,i("#post-"+e.detail.postID),void 0!==window.lazyLoadInstance&&window.lazyLoadInstance.update(),t&&t.init(),n||Promise.all([l.e("vendors-node_modules_googlemaps_js-api-loader_dist_index_esm_js-node_modules_leaflet_dist_lea-5d4327"),l.e("map-places")]).then(l.bind(l,"./js/leaflet-places.js")).then(e=>{n=!0,e.PlacesMap.init()}))},a=()=>{10<(window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0)&!e&&(window.removeEventListener("scroll",a),s(),e=!0)},s=()=>{ThemeSetup.infinite_scroll&&document.querySelector(".articles-container")&&l.e("infinite-scroll").then(l.bind(l,"./js/infinite-scroll.js")).then(l.e("articles-observer").then(l.bind(l,"./js/articles-observer.js"))),i(),l.e("social-share").then(l.bind(l,"./js/social-share.js")).then(e=>{(t=e.SocialShare).init()}),window.lazyLoadOptions={elements_selector:".lazy-wa",threshold:"20"},window.addEventListener("LazyLoad::Initialized",function(e){window.lazyLoadInstance=e.detail.instance},!1),r.D.js("https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.4.0/dist/lazyload.min.js","vanilla-lazyload-js")},i=e=>{let t;var s;t=void 0===e?document:document.querySelector(e),(0,d.Ge)()&&(t.querySelector(".instagram-media")&&(void 0===window.instgrm?(console.log("Load Instagram JS"),r.D.js("//platform.instagram.com/en_US/embeds.js","instagram-js").then(e=>window.instgrm.Embeds.process())):window.instgrm.Embeds.process()),t.querySelector("a[data-pin-do]")&&(e=window,s=document,e.hazPinIt||(console.log("Load Pinterest JS"),e.hazPinIt=!0,(e=s.createElement("SCRIPT")).src="//assets.pinterest.com/js/pinit.js",e.type="text/javascript",e.setAttribute("data-pin-build","parsePins"),s.body.appendChild(e),window.parsePins())),t.querySelector(".twitter-tweet")&&("undefined"!=typeof twttr?twttr.widgets.load():(console.log("Load Twitter JS"),r.D.js("https://platform.twitter.com/widgets.js","twitter-js").then(e=>twttr.widgets.load()))),t.querySelector(".fb-post"))&&(console.log("Load FB JS"),r.D.js("https://connect.facebook.net/en_US/all.js#xfbml=1","fb-js").then(e=>{FB.init({status:!0,cookie:!0,xfbml:!0}),FB.XFBML.parse()}))};return{init:()=>{{const e=(0,d.A1)(ThemeSetup.current.postID),s=document.querySelector("#post-"+ThemeSetup.current.postID);Array.isArray(e.canal)&&e.canal.forEach(function(e,t){try{ga("send","event","Pageviews por canal",e,s.dataset.slug)}catch(e){console.log("Analytics is not defined")}})}window.addEventListener("scroll",a),document.querySelector("body").addEventListener("is.post-load",o),document.querySelector("[data-place-id]")&&Promise.all([l.e("vendors-node_modules_googlemaps_js-api-loader_dist_index_esm_js-node_modules_leaflet_dist_lea-5d4327"),l.e("map-places")]).then(l.bind(l,"./js/leaflet-places.js")).then(e=>{n=!0,e.PlacesMap.init()})}}})()}}]);