/*! For license information please see map-places.bundle.86cfb5b797c341dd1cc1.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,t,i){function g(e,o,n,l){return new(n=n||Promise)(function(i,t){function a(e){try{s(l.next(e))}catch(e){t(e)}}function r(e){try{s(l.throw(e))}catch(e){t(e)}}function s(e){var t;e.done?i(e.value):((t=e.value)instanceof n?t:new n(function(e){e(t)})).then(a,r)}s((l=l.apply(e,o||[])).next())})}i.r(t),i.d(t,{PlacesMap:function(){return r}});function u(e,t){if(e===t)return!0;if(e&&t&&"object"==typeof e&&"object"==typeof t){if(e.constructor!==t.constructor)return!1;var i,a,r;if(Array.isArray(e)){if((i=e.length)!=t.length)return!1;for(a=i;0!=a--;)if(!u(e[a],t[a]))return!1}else{if(e.constructor===RegExp)return e.source===t.source&&e.flags===t.flags;if(e.valueOf!==Object.prototype.valueOf)return e.valueOf()===t.valueOf();if(e.toString!==Object.prototype.toString)return e.toString()===t.toString();if((i=(r=Object.keys(e)).length)!==Object.keys(t).length)return!1;for(a=i;0!=a--;)if(!Object.prototype.hasOwnProperty.call(t,r[a]))return!1;for(a=i;0!=a--;){var s=r[a];if(!u(e[s],t[s]))return!1}}return!0}return e!=e&&t!=t}var a;const m="__googleMapsScriptId";(i=a=a||{})[i.INITIALIZED=0]="INITIALIZED",i[i.LOADING=1]="LOADING",i[i.SUCCESS=2]="SUCCESS",i[i.FAILURE=3]="FAILURE";class L{constructor({apiKey:e,authReferrerPolicy:t,channel:i,client:a,id:r=m,language:s,libraries:o=[],mapIds:n,nonce:l,region:c,retries:d=3,url:h="https://maps.googleapis.com/maps/api/js",version:p}){if(this.callbacks=[],this.done=!1,this.loading=!1,this.errors=[],this.apiKey=e,this.authReferrerPolicy=t,this.channel=i,this.client=a,this.id=r||m,this.language=s,this.libraries=o,this.mapIds=n,this.nonce=l,this.region=c,this.retries=d,this.url=h,this.version=p,L.instance){if(u(this.options,L.instance.options))return L.instance;throw new Error(`Loader must not be called again with different options. ${JSON.stringify(this.options)} !== `+JSON.stringify(L.instance.options))}L.instance=this}get options(){return{version:this.version,apiKey:this.apiKey,channel:this.channel,client:this.client,id:this.id,libraries:this.libraries,language:this.language,region:this.region,mapIds:this.mapIds,nonce:this.nonce,url:this.url,authReferrerPolicy:this.authReferrerPolicy}}get status(){return this.errors.length?a.FAILURE:this.done?a.SUCCESS:this.loading?a.LOADING:a.INITIALIZED}get failed(){return this.done&&!this.loading&&this.errors.length>=this.retries+1}createUrl(){let e=this.url;return e+="?callback=__googleMapsCallback",this.apiKey&&(e+="&key="+this.apiKey),this.channel&&(e+="&channel="+this.channel),this.client&&(e+="&client="+this.client),0<this.libraries.length&&(e+="&libraries="+this.libraries.join(",")),this.language&&(e+="&language="+this.language),this.region&&(e+="&region="+this.region),this.version&&(e+="&v="+this.version),this.mapIds&&(e+="&map_ids="+this.mapIds.join(",")),this.authReferrerPolicy&&(e+="&auth_referrer_policy="+this.authReferrerPolicy),e}deleteScript(){var e=document.getElementById(this.id);e&&e.remove()}load(){return this.loadPromise()}loadPromise(){return new Promise((t,i)=>{this.loadCallback(e=>{e?i(e.error):t(window.google)})})}importLibrary(e){return this.execute(),google.maps.importLibrary(e)}loadCallback(e){this.callbacks.push(e),this.execute()}setScript(){var e;if(document.getElementById(this.id))this.callback();else{const t={key:this.apiKey,channel:this.channel,client:this.client,libraries:this.libraries,v:this.version,mapIds:this.mapIds,language:this.language,region:this.region,authReferrerPolicy:this.authReferrerPolicy};if(Object.keys(t).forEach(e=>!t[e]&&delete t[e]),null==(e=null==(e=null===window||void 0===window?void 0:window.google)?void 0:e.maps)||!e.importLibrary){var c=t;let a,r,s,o="The Google Maps JavaScript API",n="google",i="importLibrary",l=document,e=window;const d=(e=e[n]||(e[n]={})).maps||(e.maps={}),h=new Set,p=new URLSearchParams,u=()=>a=a||new Promise((t,i)=>g(this,void 0,void 0,function*(){var e;for(s in yield r=l.createElement("script"),r.id=this.id,p.set("libraries",[...h]+""),c)p.set(s.replace(/[A-Z]/g,e=>"_"+e[0].toLowerCase()),c[s]);p.set("callback",n+".maps.__ib__"),r.src=this.url+"?"+p,d.__ib__=t,r.onerror=()=>a=i(Error(o+" could not load.")),r.nonce=this.nonce||(null==(e=l.querySelector("script[nonce]"))?void 0:e.nonce)||"",l.head.append(r)}));d[i]?console.warn(o+" only loads once. Ignoring:",c):d[i]=(e,...t)=>h.add(e)&&u().then(()=>d[i](e,...t))}this.importLibrary("core").then(()=>this.callback(),e=>{e=new ErrorEvent("error",{error:e});this.loadErrorCallback(e)})}}reset(){this.deleteScript(),this.done=!1,this.loading=!1,this.errors=[],this.onerrorEvent=null}resetIfRetryingFailed(){this.failed&&this.reset()}loadErrorCallback(e){var t;this.errors.push(e),this.errors.length<=this.retries?(t=this.errors.length*Math.pow(2,this.errors.length),console.error(`Failed to load Google Maps script, retrying in ${t} ms.`),setTimeout(()=>{this.deleteScript(),this.setScript()},t)):(this.onerrorEvent=e,this.callback())}callback(){this.done=!0,this.loading=!1,this.callbacks.forEach(e=>{e(this.onerrorEvent)}),this.callbacks=[]}execute(){this.resetIfRetryingFailed(),this.done?this.callback():window.google&&window.google.maps&&window.google.maps.version?(console.warn("Google Maps already loaded outside @googlemaps/js-api-loader.This may result in undesirable behavior as options and script parameters may not match."),this.callback()):this.loading||(this.loading=!0,this.setScript())}}const r=(()=>{let e;const l={},c={};let a=!1,n=!1;var t=ThemeSetupDos.themeUri;const o=ThemeSetupDos.maps.marker||t+"/assets/images/marker.png",i=ThemeSetupDos.maps.markerActive||t+"/assets/images/marker.png",r=ThemeSetupDos.maps.api||"";let s=ThemeSetupDos.maps.center||{lat:19.4326018,lng:-99.1332049};const d=parseInt(ThemeSetupDos.maps.zoom)||13;const h=e=>{var t,i=document.getElementById("post-"+e),a=m(e);i&&(t=i.querySelector("h1").innerText,0<[...i=p(i)].length)&&(u(t,e,a),f(e,[...i]),y(i,e))},p=e=>e.querySelectorAll("[data-place-id]"),u=(e,t,i)=>{e=`
    <div id="wa-maps-widget-${t}" class="widget wa_maps_widget ${g()?"fixed-bottom":""}">
    <div class="widget-header">
        <h3 class="widget-title">${e}</h3>
        <button class="btn btn-primary btn-close-map collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#map-widget-${t}" aria-expanded="false" aria-controls="map-widget-${t}">
        </button>
    </div>
        <div id="map-widget-${t}" class="map-widget collapse" data-map-id="${t}">
            <div id="map-container-${t}" class="map-container"></div>
            <div id="map-places-container-${t}" class="map-places-container"></div>
        </div>
    </div>
`,t=document.createRange().createContextualFragment(e);i.prepend(t)},g=()=>{return window.matchMedia("(max-width: 991px)").matches};const m=e=>{e=document.getElementById("post-"+e);return g()?e.querySelector("footer"):e.querySelector(".single-widget-area")};const y=(e,i)=>{const t=new IntersectionObserver((e,t)=>e.forEach(e=>{var t;e.isIntersecting&&(t={id:(e=e.target).dataset.placeId},n?e.dataset.isScrolling&&(n=!1,e.removeAttribute("data-is-scrolling")):b(i,t))}),{rootMargin:"0px 0px 0px 0px"});e.forEach(e=>t.observe(e))},f=(o,n)=>{var e=new L({apiKey:r,version:"weekly"});const i={center:s,zoom:d,styles:[{featureType:"poi",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"transit",stylers:[{visibility:"off"}]}],mapTypeControl:!1,streetViewControl:!1};e.load().then(e=>{var t=new e.maps.Map(document.getElementById("map-container-"+o),i);l[o]=t,e.maps.event.addListener(t,"idle",()=>{if(!a){a=!0;{var r=o,s=n;let e=document.getElementById("map-widget-"+r),t="",i=e.querySelector(".map-places-container"),a=(c[r]={},s.forEach(e=>{e={id:e.dataset.placeId,title:e.dataset.placeTitle,latitud:parseFloat(e.dataset.placeLatitude),longitud:parseFloat(e.dataset.placeLongitude)};t+=v(e),w(e,r)}),`
    <ul class="wa-item-map-places__list" id="map-places-list-${r}">
    ${t}
    </ul>
    `);s=document.createRange().createContextualFragment(a);i.appendChild(s),document.querySelectorAll(`#map-places-list-${r} > li`).forEach(i=>{i.addEventListener("click",e=>{var t={id:i.dataset.placeId};b(r,t,!0)})})}}})}).catch(e=>{})},v=e=>{var t=e.title;return`
      <li class="wa-item-map-places__item" data-place-id="${e.id}">${t}</li>
    `},w=(e,t)=>{var i=e.latitud,a=e.longitud,r=(l[t],document.getElementById("map-places-container-"+t),document.getElementById("post-"+t),`

        <h4 class="location-item-title">${e.title}</h4>

    `),r=new google.maps.InfoWindow({content:r});const s=new google.maps.Marker({position:{lat:i,lng:a},visible:!0,map:l[t],title:e.title||"",icon:{url:o,scaledSize:new google.maps.Size(47,65)},infowindow:r});r.addListener("closeclick",()=>{E(s,!1)}),s.addListener("click",()=>{b(t,e,!0)}),c[t][e.id]=s},b=(e,t,i=!1)=>{var a=document.getElementById("map-places-container-"+e),r=document.getElementById("post-"+e),s=l[e],o=c[e][t.id];S(e,t)||(k(e),E(o,!0),o.infowindow.open({anchor:o,map:s,shouldFocus:!1}),s.setCenter(o.getPosition()),s.getZoom()<14&&s.setZoom(14),a.querySelector(`[data-place-id="${t.id}"]`).scrollIntoView({behavior:"smooth",block:"nearest",inline:"start"}),I(r),a.querySelector(`[data-place-id="${t.id}"]`).classList.add("active"),r.querySelector(`[data-place-id="${t.id}"]`).scrollIntoView({behavior:"smooth",block:"center",inline:"start"}),i&&(n=!0,r.querySelector(`[data-place-id="${t.id}"]`).setAttribute("data-is-scrolling",!0)))},I=e=>{[...p(e)].forEach(e=>{e.classList.remove("active")})},S=(e,t)=>{return document.getElementById("map-places-container-"+e).querySelector(`[data-place-id="${t.id}"]`).classList.contains("active")},E=(e,t)=>{t?e.setIcon({url:i,scaledSize:new google.maps.Size(47,65)}):e.setIcon({url:o,scaledSize:new google.maps.Size(47,65)})},k=e=>{const t=l[e];Object.entries(c[e]).forEach(([,e])=>{e.infowindow.close(t,e),E(e,!1)})};return{init:()=>{e=ThemeSetupDos.currentID||0,h(e),document.querySelector("body").addEventListener("is.post-load",e=>{e.detail.postID&&(e.detail.infinitescroll&&(isInfiniteScroll=!0,currentPostId=e.detail.postID),h(e.detail.postID))})}}})()}}]);