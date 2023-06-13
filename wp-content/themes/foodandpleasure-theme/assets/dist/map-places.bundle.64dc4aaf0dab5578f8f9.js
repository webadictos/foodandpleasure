/*! For license information please see map-places.bundle.64dc4aaf0dab5578f8f9.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,t,i){function g(e,n,o,l){return new(o=o||Promise)(function(i,t){function r(e){try{s(l.next(e))}catch(e){t(e)}}function a(e){try{s(l.throw(e))}catch(e){t(e)}}function s(e){var t;e.done?i(e.value):((t=e.value)instanceof o?t:new o(function(e){e(t)})).then(r,a)}s((l=l.apply(e,n||[])).next())})}i.r(t),i.d(t,{PlacesMap:function(){return a}});function u(e,t){if(e===t)return!0;if(e&&t&&"object"==typeof e&&"object"==typeof t){if(e.constructor!==t.constructor)return!1;var i,r,a;if(Array.isArray(e)){if((i=e.length)!=t.length)return!1;for(r=i;0!=r--;)if(!u(e[r],t[r]))return!1}else{if(e.constructor===RegExp)return e.source===t.source&&e.flags===t.flags;if(e.valueOf!==Object.prototype.valueOf)return e.valueOf()===t.valueOf();if(e.toString!==Object.prototype.toString)return e.toString()===t.toString();if((i=(a=Object.keys(e)).length)!==Object.keys(t).length)return!1;for(r=i;0!=r--;)if(!Object.prototype.hasOwnProperty.call(t,a[r]))return!1;for(r=i;0!=r--;){var s=a[r];if(!u(e[s],t[s]))return!1}}return!0}return e!=e&&t!=t}var r;const m="__googleMapsScriptId";(i=r=r||{})[i.INITIALIZED=0]="INITIALIZED",i[i.LOADING=1]="LOADING",i[i.SUCCESS=2]="SUCCESS",i[i.FAILURE=3]="FAILURE";class E{constructor({apiKey:e,authReferrerPolicy:t,channel:i,client:r,id:a=m,language:s,libraries:n=[],mapIds:o,nonce:l,region:c,retries:d=3,url:h="https://maps.googleapis.com/maps/api/js",version:p}){if(this.callbacks=[],this.done=!1,this.loading=!1,this.errors=[],this.apiKey=e,this.authReferrerPolicy=t,this.channel=i,this.client=r,this.id=a||m,this.language=s,this.libraries=n,this.mapIds=o,this.nonce=l,this.region=c,this.retries=d,this.url=h,this.version=p,E.instance){if(u(this.options,E.instance.options))return E.instance;throw new Error(`Loader must not be called again with different options. ${JSON.stringify(this.options)} !== `+JSON.stringify(E.instance.options))}E.instance=this}get options(){return{version:this.version,apiKey:this.apiKey,channel:this.channel,client:this.client,id:this.id,libraries:this.libraries,language:this.language,region:this.region,mapIds:this.mapIds,nonce:this.nonce,url:this.url,authReferrerPolicy:this.authReferrerPolicy}}get status(){return this.errors.length?r.FAILURE:this.done?r.SUCCESS:this.loading?r.LOADING:r.INITIALIZED}get failed(){return this.done&&!this.loading&&this.errors.length>=this.retries+1}createUrl(){let e=this.url;return e+="?callback=__googleMapsCallback",this.apiKey&&(e+="&key="+this.apiKey),this.channel&&(e+="&channel="+this.channel),this.client&&(e+="&client="+this.client),0<this.libraries.length&&(e+="&libraries="+this.libraries.join(",")),this.language&&(e+="&language="+this.language),this.region&&(e+="&region="+this.region),this.version&&(e+="&v="+this.version),this.mapIds&&(e+="&map_ids="+this.mapIds.join(",")),this.authReferrerPolicy&&(e+="&auth_referrer_policy="+this.authReferrerPolicy),e}deleteScript(){var e=document.getElementById(this.id);e&&e.remove()}load(){return this.loadPromise()}loadPromise(){return new Promise((t,i)=>{this.loadCallback(e=>{e?i(e.error):t(window.google)})})}importLibrary(e){return this.execute(),google.maps.importLibrary(e)}loadCallback(e){this.callbacks.push(e),this.execute()}setScript(){var e;if(document.getElementById(this.id))this.callback();else{const t={key:this.apiKey,channel:this.channel,client:this.client,libraries:this.libraries,v:this.version,mapIds:this.mapIds,language:this.language,region:this.region,authReferrerPolicy:this.authReferrerPolicy};if(Object.keys(t).forEach(e=>!t[e]&&delete t[e]),null==(e=null==(e=null===window||void 0===window?void 0:window.google)?void 0:e.maps)||!e.importLibrary){var c=t;let r,a,s,n="The Google Maps JavaScript API",o="google",i="importLibrary",l=document,e=window;const d=(e=e[o]||(e[o]={})).maps||(e.maps={}),h=new Set,p=new URLSearchParams,u=()=>r=r||new Promise((t,i)=>g(this,void 0,void 0,function*(){var e;for(s in yield a=l.createElement("script"),a.id=this.id,p.set("libraries",[...h]+""),c)p.set(s.replace(/[A-Z]/g,e=>"_"+e[0].toLowerCase()),c[s]);p.set("callback",o+".maps.__ib__"),a.src=this.url+"?"+p,d.__ib__=t,a.onerror=()=>r=i(Error(n+" could not load.")),a.nonce=this.nonce||(null==(e=l.querySelector("script[nonce]"))?void 0:e.nonce)||"",l.head.append(a)}));d[i]?console.warn(n+" only loads once. Ignoring:",c):d[i]=(e,...t)=>h.add(e)&&u().then(()=>d[i](e,...t))}this.importLibrary("core").then(()=>this.callback(),e=>{e=new ErrorEvent("error",{error:e});this.loadErrorCallback(e)})}}reset(){this.deleteScript(),this.done=!1,this.loading=!1,this.errors=[],this.onerrorEvent=null}resetIfRetryingFailed(){this.failed&&this.reset()}loadErrorCallback(e){var t;this.errors.push(e),this.errors.length<=this.retries?(t=this.errors.length*Math.pow(2,this.errors.length),console.error(`Failed to load Google Maps script, retrying in ${t} ms.`),setTimeout(()=>{this.deleteScript(),this.setScript()},t)):(this.onerrorEvent=e,this.callback())}callback(){this.done=!0,this.loading=!1,this.callbacks.forEach(e=>{e(this.onerrorEvent)}),this.callbacks=[]}execute(){this.resetIfRetryingFailed(),this.done?this.callback():window.google&&window.google.maps&&window.google.maps.version?(console.warn("Google Maps already loaded outside @googlemaps/js-api-loader.This may result in undesirable behavior as options and script parameters may not match."),this.callback()):this.loading||(this.loading=!0,this.setScript())}}const a=(()=>{let e;const l={},c={};let r=!1,o=!1;var t=ThemeSetupDos.themeUri;const n=ThemeSetupDos.maps.marker||t+"/assets/images/marker.png",i=ThemeSetupDos.maps.markerActive||t+"/assets/images/marker.png",a=ThemeSetupDos.maps.api||"";let s=ThemeSetupDos.maps.center||{lat:19.4326018,lng:-99.1332049};const d=parseInt(ThemeSetupDos.maps.zoom)||13;const h=e=>{var t=document.getElementById("post-"+e),i=t?t.querySelector(".single-widget-area"):null;t&&0<[...t=p(t)].length&&(u("Prueba mapa",e,i),m(e,[...t]),g(t,e))},p=e=>e.querySelectorAll("[data-place-id]"),u=(e,t,i)=>{e=`
    <div class="widget wa_maps_widget">
        <h3 class="widget-title">${e}</h3>
        <div id="map-widget-${t}" class="map-widget" data-map-id="${t}">
            <div id="map-container-${t}" class="map-container"></div>
            <div id="map-places-container-${t}" class="map-places-container"></div>
        </div>
    </div>
`,t=document.createRange().createContextualFragment(e);i.prepend(t)},g=(e,i)=>{const t=new IntersectionObserver((e,t)=>e.forEach(e=>{var t;e.isIntersecting&&(t={id:(e=e.target).dataset.placeId},o?e.dataset.isScrolling&&(o=!1,e.removeAttribute("data-is-scrolling")):v(i,t))}),{rootMargin:"0px 0px 0px 0px"});e.forEach(e=>t.observe(e))},m=(n,o)=>{var e=new E({apiKey:a,version:"weekly"});const i={center:s,zoom:d,styles:[{featureType:"poi",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"transit",stylers:[{visibility:"off"}]}],mapTypeControl:!1,streetViewControl:!1};e.load().then(e=>{var t=new e.maps.Map(document.getElementById("map-container-"+n),i);l[n]=t,e.maps.event.addListener(t,"idle",()=>{if(!r){r=!0;{var a=n,s=o;let e=document.getElementById("map-widget-"+a),t="",i=e.querySelector(".map-places-container"),r=(c[a]={},s.forEach(e=>{e={id:e.dataset.placeId,title:e.dataset.placeTitle,latitud:parseFloat(e.dataset.placeLatitude),longitud:parseFloat(e.dataset.placeLongitude)};t+=y(e),f(e,a)}),`
    <ul class="wa-item-map-places__list" id="map-places-list-${a}">
    ${t}
    </ul>
    `);s=document.createRange().createContextualFragment(r);i.appendChild(s),document.querySelectorAll(`#map-places-list-${a} > li`).forEach(i=>{i.addEventListener("click",e=>{var t={id:i.dataset.placeId};v(a,t,!0)})})}}})}).catch(e=>{})},y=e=>{var t=e.title;return`
      <li class="wa-item-map-places__item" data-place-id="${e.id}">${t}</li>
    `},f=(e,t)=>{var i=e.latitud,r=e.longitud,a=(l[t],document.getElementById("map-places-container-"+t),document.getElementById("post-"+t),`

        <h4 class="location-item-title">${e.title}</h4>

    `),a=new google.maps.InfoWindow({content:a});const s=new google.maps.Marker({position:{lat:i,lng:r},visible:!0,map:l[t],title:e.title||"",icon:{url:n,scaledSize:new google.maps.Size(47,65)},infowindow:a});a.addListener("closeclick",()=>{I(s,!1)}),s.addListener("click",()=>{v(t,e,!0)}),c[t][e.id]=s},v=(e,t,i=!1)=>{var r=document.getElementById("map-places-container-"+e),a=document.getElementById("post-"+e),s=l[e],n=c[e][t.id];b(e,t)||(S(e),I(n,!0),n.infowindow.open({anchor:n,map:s,shouldFocus:!1}),s.setCenter(n.getPosition()),s.getZoom()<14&&s.setZoom(14),r.querySelector(`[data-place-id="${t.id}"]`).scrollIntoView({behavior:"smooth",block:"nearest",inline:"start"}),w(a),r.querySelector(`[data-place-id="${t.id}"]`).classList.add("active"),a.querySelector(`[data-place-id="${t.id}"]`).scrollIntoView({behavior:"smooth",block:"center",inline:"start"}),i&&(o=!0,a.querySelector(`[data-place-id="${t.id}"]`).setAttribute("data-is-scrolling",!0)))},w=e=>{[...p(e)].forEach(e=>{e.classList.remove("active")})},b=(e,t)=>{return document.getElementById("map-places-container-"+e).querySelector(`[data-place-id="${t.id}"]`).classList.contains("active")},I=(e,t)=>{t?e.setIcon({url:i,scaledSize:new google.maps.Size(47,65)}):e.setIcon({url:n,scaledSize:new google.maps.Size(47,65)})},S=e=>{const t=l[e];Object.entries(c[e]).forEach(([,e])=>{e.infowindow.close(t,e),I(e,!1)})};return{init:()=>{e=ThemeSetupDos.currentID||0,h(e),document.querySelector("body").addEventListener("is.post-load",e=>{e.detail.postID&&(e.detail.infinitescroll&&(isInfiniteScroll=!0,currentPostId=e.detail.postID),h(e.detail.postID))})}}})()}}]);