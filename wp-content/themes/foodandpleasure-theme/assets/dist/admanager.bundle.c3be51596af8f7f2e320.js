"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["admanager"],{"./js/admanager.js":function(e,t,a){a.r(t),a.d(t,{AdManager:function(){return s}});const s={init:()=>{window.adSlots=window.adSlots||{all:[],refreshables:[]},window.googletag=window.googletag||{cmd:[]},googletag.cmd.push(function(){googletag.pubads().setTargeting("canal",WA_ThemeSetup.current.canal??[]),googletag.pubads().setTargeting("postID",WA_ThemeSetup.current.postID??0),googletag.pubads().setTargeting("tags",WA_ThemeSetup.current.tags??[]),googletag.pubads().setTargeting("single",ThemeSetup.page.is_single),googletag.pubads().setTargeting("url",window.location.pathname),googletag.pubads().setTargeting("hostname",window.location.hostname),googletag.pubads().setTargeting("referrer",document.referrer.split("/")[2]),googletag.pubads().setCentering(!0),googletag.pubads().setCentering(!0),googletag.pubads().enableLazyLoad({fetchMarginPercent:50,renderMarginPercent:25,mobileScaling:2}),googletag.pubads().enableSingleRequest(),googletag.pubads().disableInitialLoad(),googletag.enableServices(),googletag.pubads().addEventListener("slotRenderEnded",function(e){var t,a,s,o;e.isEmpty?(t=e.slot.getSlotElementId(),(a=document.getElementById(t)).style.display="none",(o=a.closest(".ad-container"))&&(o.style.display="none"),a.classList.contains("ad-footer")&&(s=a.closest(".ad-footer-container"))&&s.classList.remove("show")):(t=e.slot.getSlotElementId(),a=document.getElementById(t),100<e.size[1]&&(o=a.closest(".ad-fixed-top"))&&(o.classList.remove("sticky-top"),o.classList.add("not-sticky")),a.classList.contains("ad-footer")&&(s=a.closest(".ad-footer-container"))&&s.classList.add("show"),a.classList.add("ad-slot"),(o=a.closest(".ad-container"))&&(o.style.display=(o.style.display,"")))})})}}}}]);