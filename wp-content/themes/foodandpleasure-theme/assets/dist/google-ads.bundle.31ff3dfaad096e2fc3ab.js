"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["google-ads"],{"./js/ads.js":function(e,t,a){a.r(t),a.d(t,{waGoogleAdManagerModule:function(){return s}});var m=a("./js/wordpress-functions.js");const s=function(){let e=[],r=[];let a=!1,s=!1,i=0;const p={network:WA_ThemeSetup.ads.network??"76814929000",slotPrefix:WA_ThemeSetup.ads.prefix??"",refresh:WA_ThemeSetup.ads.refreshAds??!1,refreshTime:WA_ThemeSetup.ads.refresh_time??30,refreshAllAdUnits:WA_ThemeSetup.ads.refreshAllAdUnits??!1,timeToRefreshAllAdUnits:WA_ThemeSetup.ads.timeToRefreshAllAdUnits||60,refreshAllAdUnitsLimit:WA_ThemeSetup.ads.refreshAllAdUnitsLimit||5,loadOnScroll:WA_ThemeSetup.ads.loadOnScroll??!1,enableInRead:WA_ThemeSetup.ads.enableInRead??!1,inReadParagraph:WA_ThemeSetup.ads.inReadParagraph??3,inReadLimit:WA_ThemeSetup.ads.inReadLimit??3,inReadSlot:WA_ThemeSetup.ads.inread_slot??{code:"inread",size_mapping:"inread",refesh:!0},multipleInreadSlot:WA_ThemeSetup.ads.multiple_inread_slot??{code:"inread-multiple",size_mapping:"inread_multiple",refesh:!0},mappings:{superbanner:{sizes:[[300,250],[728,90],[768,90],[320,50],[970,90],[320,100]],desktop:[[970,90],[728,90]],mobile:[[320,50],[320,100],[300,250]],all:[[728,90]]},billboard:{sizes:[[300,250],[728,90],[768,90],[320,50],[970,90],[970,250],[320,100]],desktop:[[970,250],[970,90],[728,90]],mobile:[[320,50],[320,100]],all:[[728,90]]},billboardboxmobile:{sizes:[[300,250],[728,90],[768,90],[320,50],[970,90],[970,250],[320,100]],desktop:[[970,250],[970,90],[728,90]],mobile:[[320,50],[320,100],[300,250]],all:[[728,90]]},boxbanner:{sizes:[[300,250],[300,600]],desktop:[[300,250],[300,600]],mobile:[[300,250],[300,600]],all:[[300,250]]},inread:{sizes:[[1,1],[300,250],[300,600],"fluid"],desktop:[[1,1]],mobile:[[1,1],[300,250],[300,600],"fluid"],all:[[1,1],[300,250],"fluid"]},inread_multiple:{sizes:[[300,250],[300,600]],desktop:[[300,250],[300,600]],mobile:[[300,250],[300,600]],all:[[1,1],[300,250]]},interstitial:{sizes:[[1,1]],desktop:[[1,1]],mobile:[[1,1]],all:[[1,1]]}}};const t=()=>{var e=document.querySelector("body");e&&e.addEventListener("is.post-load",e=>{e.detail.postID&&(e.detail.infinitescroll&&(s=!0,i=e.detail.postID),p.enableInRead&&l(e.detail.postID,e.detail.infinitescroll),g())}),r.all=[],(0,m.Ge)()&&p.enableInRead&&l(WA_ThemeSetup.current.postID),g();{var t;window.matchMedia("(max-width: 576px)").addEventListener("change",e=>{e.matches,googletag.pubads().refresh()})}if(p.refresh&&googletag.cmd.push(function(){googletag.pubads().addEventListener("impressionViewable",function(e){var t=e.slot;-1<t.getTargeting("canRefresh").indexOf("true")&&setTimeout(function(){googletag.pubads().refresh([t])},1e3*p.refreshTime)})}),p.refreshAllAdUnits){let e=0,t=window.setInterval(()=>{window.googletag&&googletag.pubadsReady&&r.all.forEach(e=>{-1<e.getTargeting("canRefresh").indexOf("true")&&googletag.pubads().refresh([e])});e++,0<refreshAllAdUnitsLimit&&(console.log(e),e===refreshAllAdUnitsLimit)&&(console.log("Clear interval"),clearInterval(t))},1e3*p.timeToRefreshAllAdUnits)}p.loadOnScroll?(setTimeout(()=>{a||o()},5e3),window.addEventListener("scroll",n)):o()},d=(e,t=[])=>t.includes(e),l=(n,o=!1)=>{var e=(0,m.A1)(n);if(!d(p.inReadSlot,e.exclude_adunits)){var t=document.createElement("div"),a=(0,m.nV)(),s=e.inReadParagraph??p.inReadParagraph;let l=e.inReadLimit??p.inReadLimit;t.setAttribute("id","ros-inread-"+a),t.classList.add("ad-container"),t.classList.add("dfp-ad-unit"),t.classList.add("ad-inread"),t.classList.add("ad-main-inread"),t.setAttribute("data-ad-type",p.inReadSlot.size_mapping),t.setAttribute("data-slot",p.inReadSlot.code),t.setAttribute("data-ad-loaded","0"),t.setAttribute("data-ad-setup",`{"postID":${n},"canRefresh":${p.inReadSlot.refresh},"infinitescroll":${o}}`);var r=document.querySelector("#post-"+n+" .entry-main-text"),r=(0,m.B5)(r.childNodes);if(2<r.length){r[s-1].parentNode.insertBefore(t,r[s-1].nextSibling);t=new CustomEvent("is.inread-loaded",{detail:{postID:n}});if(document.querySelector("body").dispatchEvent(t),!d(p.multipleInreadSlot,e.exclude_adunits)&&WA_ThemeSetup.ads.enableMultipleInRead){r=(0,m.eG)(document.querySelector("#ros-inread-"+a));let s=1,i,d=0;r.forEach(e=>{var t,a;i=s%5,d>l-1||(0==i&&(t=document.createElement("div"),a=(0,m.nV)(),t.setAttribute("id","ros-inread-multiple-"+a),t.classList.add("ad-container"),t.classList.add("dfp-ad-unit"),t.classList.add("ad-inread"),t.setAttribute("data-ad-type",p.multipleInreadSlot.size_mapping),t.setAttribute("data-slot",p.multipleInreadSlot.code),t.setAttribute("data-ad-loaded","0"),t.setAttribute("data-ad-setup",`{"postID":${n},"canRefresh":${p.multipleInreadSlot.refresh},"infinitescroll":${o}}`),e.parentNode.insertBefore(t,e.nextSibling),d++),s++)})}}}},n=()=>{10<(window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0)&!a&&(o(),a=!0,window.removeEventListener("scroll",n))},o=()=>{var e=setInterval(()=>{u()&&(clearInterval(e),googletag.pubads().refresh(),a=!0,window.removeEventListener("scroll",n))},100)},u=()=>!(!window.googletag||!googletag.pubadsReady),g=()=>{let o={};(e=document.querySelectorAll(".dfp-ad-unit")).forEach(e=>{var t=[];let a,s,i;var d;let l={},n={desktop:[],mobile:[],all:[]};try{if(o=e.dataset.adSetup,1!=e.dataset.adLoaded&&(e.dataset.adLoaded=1,e.dataset.adType)){if(o=o&&JSON.parse(o),(0,m.Ge)()&&o.postID?(r["post-"+o.postID]||(r["post-"+o.postID]=[]),d=(0,m.A1)(o.postID),l.canal=d.canal,l.postID=o.postID,l.tags=d.tags,l.is_single="true"):(l.canal=WA_ThemeSetup.current.canal,l.postID=WA_ThemeSetup.current.postID,l.tags=WA_ThemeSetup.current.tags,l.is_single=WA_ThemeSetup.current.is_single),t.push(p.network),p.slotPrefix&&t.push(p.slotPrefix),t.push(e.dataset.slot),a="/"+t.join("/"),p.mappings[e.dataset.adType]&&void 0!==p.mappings[e.dataset.adType].sizes)i=p.mappings[e.dataset.adType].sizes,n.desktop=p.mappings[e.dataset.adType].desktop,n.mobile=p.mappings[e.dataset.adType].mobile,n.all=p.mappings[e.dataset.adType].all;else{if(void 0===o.mappings.sizes)return void console.log(`No se encontraron sizes definidos para el slot: ${e.id} `);i=o.mappings.sizes,n.desktop=o.mappings.desktop,n.mobile=o.mappings.mobile,n.all=o.mappings.all}googletag.cmd.push(function(){s=googletag.defineSlot(a,i,e.id).defineSizeMapping(googletag.sizeMapping().addSize([1024,200],n.desktop).addSize([320,0],n.mobile).addSize([0,0],n.all).build()).addService(googletag.pubads()).setTargeting("canal",l.canal).setTargeting("postID",l.postID).setTargeting("tags",l.tags).setTargeting("single",l.is_single).setTargeting("url",window.location.pathname).setTargeting("hostname",window.location.hostname).setTargeting("canRefresh",o.canRefresh).setTargeting("referrer",document.referrer.split("/")[2]??""),r.all.push(s),(0,m.Ge)()&&o.postID&&r["post-"+o.postID].push(s)})}}catch(e){console.log(e)}}),s&&r["post-"+i]&&googletag.pubads().refresh(r["post-"+i])};return{init:()=>{t()}}}()}}]);