"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["google-ads"],{"./js/ads.js":function(e,t,a){a.r(t),a.d(t,{waGoogleAdManagerModule:function(){return s}});var g=a("./js/wordpress-functions.js");const s=function(){let e=[];let a=!1,s=!1,d=0;const p={network:WA_ThemeSetup.ads.network??"76814929000",slotPrefix:WA_ThemeSetup.ads.prefix??"",refresh:WA_ThemeSetup.ads.refreshAds??!1,refreshTime:WA_ThemeSetup.ads.refresh_time??30,loadOnScroll:WA_ThemeSetup.ads.loadOnScroll??!1,enableInRead:WA_ThemeSetup.ads.enableInRead??!1,inReadParagraph:WA_ThemeSetup.ads.inReadParagraph??3,inReadLimit:WA_ThemeSetup.ads.inReadLimit??3,inReadSlot:WA_ThemeSetup.ads.inread_slot??"inread",inReadSlotType:WA_ThemeSetup.ads.inread_slot_type??"inread",multipleInreadSlot:WA_ThemeSetup.ads.multiple_inread_slot??"inreadmultiple",multipleInreadSlotType:WA_ThemeSetup.ads.multiple_inread_slot_type??"inreadbox",mappings:{superbanner:{sizes:[[300,250],[728,90],[768,90],[320,50],[970,90],[320,100]],desktop:[[970,90],[728,90]],mobile:[[320,50],[320,100],[300,250]],all:[[728,90]]},billboard:{sizes:[[300,250],[728,90],[768,90],[320,50],[970,90],[970,250],[320,100]],desktop:[[970,250],[970,90],[728,90]],mobile:[[320,50],[320,100]],all:[[728,90]]},billboardboxmobile:{sizes:[[300,250],[728,90],[768,90],[320,50],[970,90],[970,250],[320,100]],desktop:[[970,250],[970,90],[728,90]],mobile:[[320,50],[320,100],[300,250]],all:[[728,90]]},boxbanner:{sizes:[[300,250],[300,600]],desktop:[[300,250],[300,600]],mobile:[[300,250],[300,600]],all:[[300,250]]},inread:{sizes:[[1,1],[300,250],[300,600],"fluid"],desktop:[[1,1]],mobile:[[1,1],[300,250],[300,600],"fluid"],all:[[1,1],[300,250],"fluid"]},inreadbox:{sizes:[[300,250],[300,600]],desktop:[],mobile:[[300,250],[300,600]],all:[[1,1],[300,250]]},interstitial:{sizes:[[1,1]],desktop:[[1,1]],mobile:[[1,1]],all:[[1,1]]}}};const t=()=>{var e=document.querySelector("body");e&&e.addEventListener("is.post-load",e=>{e.detail.postID&&(e.detail.infinitescroll&&(s=!0,d=e.detail.postID),p.enableInRead&&o(e.detail.postID,e.detail.infinitescroll),u())}),(0,g.Ge)()&&p.enableInRead&&o(WA_ThemeSetup.current.postID),u();{var t;window.matchMedia("(max-width: 576px)").addEventListener("change",e=>{e.matches,googletag.pubads().refresh()})}p.refresh&&googletag.cmd.push(function(){googletag.pubads().addEventListener("impressionViewable",function(e){var t=e.slot;-1<t.getTargeting("canRefresh").indexOf("true")&&setTimeout(function(){googletag.pubads().refresh([t])},1e3*p.refreshTime)})}),p.loadOnScroll?(setTimeout(()=>{a||n()},5e3),window.addEventListener("scroll",l)):n()},i=(e,t)=>t.includes(e),o=(l,n=!1)=>{var e=(0,g.A1)(l);if(!i(p.inReadSlot,e.exclude_adunits??[])){var t=document.createElement("div"),a=(0,g.nV)(),s=e.inReadParagraph??p.inReadParagraph;let o=e.inReadLimit??p.inReadLimit;t.setAttribute("id","ros-inread-"+a),t.classList.add("ad-container"),t.classList.add("dfp-ad-unit"),t.classList.add("ad-inread"),t.classList.add("ad-main-inread"),t.setAttribute("data-ad-type",inReadSlotType),t.setAttribute("data-slot",inReadSlot),t.setAttribute("data-ad-loaded","0"),t.setAttribute("data-ad-setup",`{"postID":${l},"canRefresh":false,"infinitescroll":${n}}`);var r=document.querySelector("#post-"+l+" .entry-main-text"),r=(0,g.B5)(r.childNodes);if(2<r.length){r[s-1].parentNode.insertBefore(t,r[s-1].nextSibling);t=new CustomEvent("is.inread-loaded",{detail:{postID:l}});if(document.querySelector("body").dispatchEvent(t),!i(p.multipleInreadSlot,e.exclude_adunits)&&WA_ThemeSetup.ads.enableMultipleInread){r=(0,g.eG)(document.querySelector("#ros-inread-"+a));let s=1,d,i=0;r.forEach(e=>{var t,a;d=s%5,i>o-1||(0==d&&(t=document.createElement("div"),a=(0,g.nV)(),t.setAttribute("id","ros-inread-multiple-"+a),t.classList.add("ad-container"),t.classList.add("dfp-ad-unit"),t.classList.add("ad-inread"),t.setAttribute("data-ad-type",multipleInreadSlotType),t.setAttribute("data-slot",multipleInreadSlot),t.setAttribute("data-ad-loaded","0"),t.setAttribute("data-ad-setup",`{"postID":${l},"canRefresh":false,"infinitescroll":${n}}`),e.parentNode.insertBefore(t,e.nextSibling),i++),s++)})}}}},l=()=>{10<(window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0)&!a&&(n(),a=!0,window.removeEventListener("scroll",l))},n=()=>{var e=setInterval(()=>{r()&&(clearInterval(e),googletag.pubads().refresh(),a=!0,window.removeEventListener("scroll",l))},100)},r=()=>!(!window.googletag||!googletag.pubadsReady),u=()=>{let n={};(e=document.querySelectorAll(".dfp-ad-unit")).forEach(e=>{var t=[];let a,s,d;var i;let o={},l={desktop:[],mobile:[],all:[]};try{if(n=e.dataset.adSetup,1!=e.dataset.adLoaded&&(e.dataset.adLoaded=1,e.dataset.adType)){if(n=n&&JSON.parse(n),(0,g.Ge)()&&n.postID?(adSlots["post-"+n.postID]||(adSlots["post-"+n.postID]=[]),i=(0,g.A1)(n.postID),o.canal=i.canal,o.postID=n.postID,o.tags=i.tags,o.is_single="true"):(o.canal=ThemeSetup.page.canal,o.postID=ThemeSetup.page.postID,o.tags=ThemeSetup.page.tags,o.is_single=ThemeSetup.page.is_single),t.push(p.network),p.slotPrefix&&t.push(p.slotPrefix),t.push(e.dataset.slot),a="/"+t.join("/"),p.mappings[e.dataset.adType]&&void 0!==p.mappings[e.dataset.adType].sizes)d=p.mappings[e.dataset.adType].sizes,l.desktop=p.mappings[e.dataset.adType].desktop,l.mobile=p.mappings[e.dataset.adType].mobile,l.all=p.mappings[e.dataset.adType].all;else{if(void 0===n.mappings.sizes)return void console.log(`No se encontraron sizes definidos para el slot: ${e.id} `);d=n.mappings.sizes,l.desktop=n.mappings.desktop,l.mobile=n.mappings.mobile,l.all=n.mappings.all}googletag.cmd.push(function(){s=googletag.defineSlot(a,d,e.id).defineSizeMapping(googletag.sizeMapping().addSize([1024,200],l.desktop).addSize([320,0],l.mobile).addSize([0,0],l.all).build()).addService(googletag.pubads()).setTargeting("canal",o.canal).setTargeting("postID",o.postID).setTargeting("tags",o.tags).setTargeting("single",o.is_single).setTargeting("url",window.location.pathname).setTargeting("hostname",window.location.hostname).setTargeting("canRefresh",n.canRefresh).setTargeting("referrer",document.referrer.split("/")[2]),adSlots.all.push(s),(0,g.Ge)()&&n.postID&&adSlots["post-"+n.postID].push(s)})}}catch(e){console.log(e)}}),s&&adSlots["post-"+d]&&googletag.pubads().refresh(adSlots["post-"+d])};return{init:()=>{t()}}}()}}]);