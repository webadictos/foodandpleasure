/*! For license information please see map-places.bundle.989a4d828745df06a05c.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,t,i){function g(e,n,o,l){return new(o=o||Promise)(function(i,t){function r(e){try{s(l.next(e))}catch(e){t(e)}}function a(e){try{s(l.throw(e))}catch(e){t(e)}}function s(e){var t;e.done?i(e.value):((t=e.value)instanceof o?t:new o(function(e){e(t)})).then(r,a)}s((l=l.apply(e,n||[])).next())})}i.r(t),i.d(t,{PlacesMap:function(){return a}});function u(e,t){if(e===t)return!0;if(e&&t&&"object"==typeof e&&"object"==typeof t){if(e.constructor!==t.constructor)return!1;var i,r,a;if(Array.isArray(e)){if((i=e.length)!=t.length)return!1;for(r=i;0!=r--;)if(!u(e[r],t[r]))return!1}else{if(e.constructor===RegExp)return e.source===t.source&&e.flags===t.flags;if(e.valueOf!==Object.prototype.valueOf)return e.valueOf()===t.valueOf();if(e.toString!==Object.prototype.toString)return e.toString()===t.toString();if((i=(a=Object.keys(e)).length)!==Object.keys(t).length)return!1;for(r=i;0!=r--;)if(!Object.prototype.hasOwnProperty.call(t,a[r]))return!1;for(r=i;0!=r--;){var s=a[r];if(!u(e[s],t[s]))return!1}}return!0}return e!=e&&t!=t}var r;const m="__googleMapsScriptId";(i=r=r||{})[i.INITIALIZED=0]="INITIALIZED",i[i.LOADING=1]="LOADING",i[i.SUCCESS=2]="SUCCESS",i[i.FAILURE=3]="FAILURE";class L{constructor({apiKey:e,authReferrerPolicy:t,channel:i,client:r,id:a=m,language:s,libraries:n=[],mapIds:o,nonce:l,region:c,retries:d=3,url:h="https://maps.googleapis.com/maps/api/js",version:p}){if(this.callbacks=[],this.done=!1,this.loading=!1,this.errors=[],this.apiKey=e,this.authReferrerPolicy=t,this.channel=i,this.client=r,this.id=a||m,this.language=s,this.libraries=n,this.mapIds=o,this.nonce=l,this.region=c,this.retries=d,this.url=h,this.version=p,L.instance){if(u(this.options,L.instance.options))return L.instance;throw new Error(`Loader must not be called again with different options. ${JSON.stringify(this.options)} !== `+JSON.stringify(L.instance.options))}L.instance=this}get options(){return{version:this.version,apiKey:this.apiKey,channel:this.channel,client:this.client,id:this.id,libraries:this.libraries,language:this.language,region:this.region,mapIds:this.mapIds,nonce:this.nonce,url:this.url,authReferrerPolicy:this.authReferrerPolicy}}get status(){return this.errors.length?r.FAILURE:this.done?r.SUCCESS:this.loading?r.LOADING:r.INITIALIZED}get failed(){return this.done&&!this.loading&&this.errors.length>=this.retries+1}createUrl(){let e=this.url;return e+="?callback=__googleMapsCallback",this.apiKey&&(e+="&key="+this.apiKey),this.channel&&(e+="&channel="+this.channel),this.client&&(e+="&client="+this.client),0<this.libraries.length&&(e+="&libraries="+this.libraries.join(",")),this.language&&(e+="&language="+this.language),this.region&&(e+="&region="+this.region),this.version&&(e+="&v="+this.version),this.mapIds&&(e+="&map_ids="+this.mapIds.join(",")),this.authReferrerPolicy&&(e+="&auth_referrer_policy="+this.authReferrerPolicy),e}deleteScript(){var e=document.getElementById(this.id);e&&e.remove()}load(){return this.loadPromise()}loadPromise(){return new Promise((t,i)=>{this.loadCallback(e=>{e?i(e.error):t(window.google)})})}importLibrary(e){return this.execute(),google.maps.importLibrary(e)}loadCallback(e){this.callbacks.push(e),this.execute()}setScript(){var e;if(document.getElementById(this.id))this.callback();else{const t={key:this.apiKey,channel:this.channel,client:this.client,libraries:this.libraries,v:this.version,mapIds:this.mapIds,language:this.language,region:this.region,authReferrerPolicy:this.authReferrerPolicy};if(Object.keys(t).forEach(e=>!t[e]&&delete t[e]),null==(e=null==(e=null===window||void 0===window?void 0:window.google)?void 0:e.maps)||!e.importLibrary){var c=t;let r,a,s,n="The Google Maps JavaScript API",o="google",i="importLibrary",l=document,e=window;const d=(e=e[o]||(e[o]={})).maps||(e.maps={}),h=new Set,p=new URLSearchParams,u=()=>r=r||new Promise((t,i)=>g(this,void 0,void 0,function*(){var e;for(s in yield a=l.createElement("script"),a.id=this.id,p.set("libraries",[...h]+""),c)p.set(s.replace(/[A-Z]/g,e=>"_"+e[0].toLowerCase()),c[s]);p.set("callback",o+".maps.__ib__"),a.src=this.url+"?"+p,d.__ib__=t,a.onerror=()=>r=i(Error(n+" could not load.")),a.nonce=this.nonce||(null==(e=l.querySelector("script[nonce]"))?void 0:e.nonce)||"",l.head.append(a)}));d[i]?console.warn(n+" only loads once. Ignoring:",c):d[i]=(e,...t)=>h.add(e)&&u().then(()=>d[i](e,...t))}this.importLibrary("core").then(()=>this.callback(),e=>{e=new ErrorEvent("error",{error:e});this.loadErrorCallback(e)})}}reset(){this.deleteScript(),this.done=!1,this.loading=!1,this.errors=[],this.onerrorEvent=null}resetIfRetryingFailed(){this.failed&&this.reset()}loadErrorCallback(e){var t;this.errors.push(e),this.errors.length<=this.retries?(t=this.errors.length*Math.pow(2,this.errors.length),console.error(`Failed to load Google Maps script, retrying in ${t} ms.`),setTimeout(()=>{this.deleteScript(),this.setScript()},t)):(this.onerrorEvent=e,this.callback())}callback(){this.done=!0,this.loading=!1,this.callbacks.forEach(e=>{e(this.onerrorEvent)}),this.callbacks=[]}execute(){this.resetIfRetryingFailed(),this.done?this.callback():window.google&&window.google.maps&&window.google.maps.version?(console.warn("Google Maps already loaded outside @googlemaps/js-api-loader.This may result in undesirable behavior as options and script parameters may not match."),this.callback()):this.loading||(this.loading=!0,this.setScript())}}const a=(()=>{let e;const d={},h={};let r=!1,l=!1;var t=WA_ThemeSetup.themeUri;const n=WA_ThemeSetup.maps.marker||t+"/assets/images/marker.png",i=WA_ThemeSetup.maps.markerActive||t+"/assets/images/marker.png",a=WA_ThemeSetup.maps.api||"";let s=WA_ThemeSetup.maps.center||{lat:19.4326018,lng:-99.1332049};const o=parseInt(WA_ThemeSetup.maps.zoom)||13,c=WA_ThemeSetup.maps.map_category??"maps";const p=e=>{var t,i=document.getElementById("post-"+e),r=y(e);i&&i.classList.contains("category-"+c)&&(t=i.querySelector("h1").innerText,0<[...i=u(i)].length)&&(g(t,e,r),v(e,[...i]),m()||f(i,e))},u=e=>e.querySelectorAll("[data-place-id]"),g=(e,t,i)=>{e=`
    <div id="wa-maps-widget-${t}" class="widget wa_maps_widget ${m()?"is-mobile":""}">
    <div class="widget-header">
        <h3 class="widget-title">${e}</h3>
    </div>
        <div id="map-widget-${t}" class="map-widget" data-map-id="${t}">
            <div id="map-container-${t}" class="map-container"></div>
            <div id="map-places-container-${t}" class="map-places-container"></div>
        </div>
    </div>
`,t=document.createRange().createContextualFragment(e);m()?i.after(t):i.prepend(t)},m=()=>{return window.matchMedia("(max-width: 991px)").matches};const y=e=>{e=document.getElementById("post-"+e);return m()?e.querySelector(".entry-excerpt"):e.querySelector(".single-widget-area")};const f=(e,i)=>{const t=new IntersectionObserver((e,t)=>e.forEach(e=>{var t;e.isIntersecting&&(t={id:(e=e.target).dataset.placeId},l?e.dataset.isScrolling&&(l=!1,e.removeAttribute("data-is-scrolling")):I(i,t,!1,!0))}),{rootMargin:"0px 0px 0px 0px"});e.forEach(e=>t.observe(e))},v=(l,c)=>{var e=new L({apiKey:a,version:"weekly"});const i={center:s,zoom:o,styles:[{featureType:"poi",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"transit",stylers:[{visibility:"off"}]}],mapTypeControl:!1,streetViewControl:!1};e.load().then(e=>{var t=new e.maps.Map(document.getElementById("map-container-"+l),i);d[l]=t,e.maps.event.addListener(t,"idle",()=>{if(!r){r=!0;{var s=l,n=c;let e=document.getElementById("map-widget-"+s),t="",i=e.querySelector(".map-places-container");h[s]={};const o=d[s];let r=!0,a=(n.forEach(e=>{e={id:e.dataset.placeId,title:e.dataset.placeTitle,latitud:parseFloat(e.dataset.placeLatitude),longitud:parseFloat(e.dataset.placeLongitude)};t+=w(e),b(e,s),r&&(o.setCenter({lat:e.latitud,lng:e.longitud}),r=!1)}),`
    <ul class="wa-item-map-places__list" id="map-places-list-${s}">
    ${t}
    </ul>
    `);n=document.createRange().createContextualFragment(a);i.appendChild(n),document.querySelectorAll(`#map-places-list-${s} > li`).forEach(i=>{i.addEventListener("click",e=>{var t={id:i.dataset.placeId};I(s,t,!0)})})}}})}).catch(e=>{})},w=e=>{var t=e.title;return`
      <li class="wa-item-map-places__item" data-place-id="${e.id}">${t}</li>
    `},b=(e,t)=>{var i=e.latitud,r=e.longitud,a=(d[t],document.getElementById("map-places-container-"+t),document.getElementById("post-"+t),`

        <h4 class="location-item-title">${e.title}</h4>

    `),a=new google.maps.InfoWindow({content:a});const s=new google.maps.Marker({position:{lat:i,lng:r},visible:!0,map:d[t],title:e.title||"",icon:{url:n,scaledSize:new google.maps.Size(47,65)},infowindow:a});a.addListener("closeclick",()=>{k(s,!1)}),s.addListener("click",()=>{I(t,e,!0)}),h[t][e.id]=s},I=(e,t,i=!1,r=!1)=>{var a=document.getElementById("map-places-container-"+e),s=document.getElementById("post-"+e),n=d[e],o=h[e][t.id];E(e,t)||(_(e),k(o,!0),o.infowindow.open({anchor:o,map:n,shouldFocus:!1}),n.setCenter(o.getPosition()),n.getZoom()<14&&n.setZoom(14),m()||a.querySelector(`[data-place-id="${t.id}"]`).scrollIntoView({behavior:"smooth",block:"nearest",inline:"start"}),S(s),a.querySelector(`[data-place-id="${t.id}"]`).classList.add("active"),r||m()||s.querySelector(`[data-place-id="${t.id}"]`).scrollIntoView({behavior:"smooth",block:"center",inline:"start"}),i&&(l=!0,s.querySelector(`[data-place-id="${t.id}"]`).setAttribute("data-is-scrolling",!0)))},S=e=>{[...u(e)].forEach(e=>{e.classList.remove("active")})},E=(e,t)=>{return document.getElementById("map-places-container-"+e).querySelector(`[data-place-id="${t.id}"]`).classList.contains("active")},k=(e,t)=>{t?e.setIcon({url:i,scaledSize:new google.maps.Size(47,65)}):e.setIcon({url:n,scaledSize:new google.maps.Size(47,65)})},_=e=>{const t=d[e];Object.entries(h[e]).forEach(([,e])=>{e.infowindow.close(t,e),k(e,!1)})};return{init:()=>{e=WA_ThemeSetup.currentID||0,p(e),document.querySelector("body").addEventListener("is.post-load",e=>{e.detail.postID&&(e.detail.infinitescroll,p(e.detail.postID))})}}})()}}]);