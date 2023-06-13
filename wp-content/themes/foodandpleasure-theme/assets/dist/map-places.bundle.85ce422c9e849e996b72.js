/*! For license information please see map-places.bundle.85ce422c9e849e996b72.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,t,i){function g(e,n,o,l){return new(o=o||Promise)(function(i,t){function r(e){try{a(l.next(e))}catch(e){t(e)}}function s(e){try{a(l.throw(e))}catch(e){t(e)}}function a(e){var t;e.done?i(e.value):((t=e.value)instanceof o?t:new o(function(e){e(t)})).then(r,s)}a((l=l.apply(e,n||[])).next())})}i.r(t),i.d(t,{PlacesMap:function(){return s}});function u(e,t){if(e===t)return!0;if(e&&t&&"object"==typeof e&&"object"==typeof t){if(e.constructor!==t.constructor)return!1;var i,r,s;if(Array.isArray(e)){if((i=e.length)!=t.length)return!1;for(r=i;0!=r--;)if(!u(e[r],t[r]))return!1}else{if(e.constructor===RegExp)return e.source===t.source&&e.flags===t.flags;if(e.valueOf!==Object.prototype.valueOf)return e.valueOf()===t.valueOf();if(e.toString!==Object.prototype.toString)return e.toString()===t.toString();if((i=(s=Object.keys(e)).length)!==Object.keys(t).length)return!1;for(r=i;0!=r--;)if(!Object.prototype.hasOwnProperty.call(t,s[r]))return!1;for(r=i;0!=r--;){var a=s[r];if(!u(e[a],t[a]))return!1}}return!0}return e!=e&&t!=t}var r;const m="__googleMapsScriptId";(i=r=r||{})[i.INITIALIZED=0]="INITIALIZED",i[i.LOADING=1]="LOADING",i[i.SUCCESS=2]="SUCCESS",i[i.FAILURE=3]="FAILURE";class f{constructor({apiKey:e,authReferrerPolicy:t,channel:i,client:r,id:s=m,language:a,libraries:n=[],mapIds:o,nonce:l,region:c,retries:h=3,url:p="https://maps.googleapis.com/maps/api/js",version:d}){if(this.callbacks=[],this.done=!1,this.loading=!1,this.errors=[],this.apiKey=e,this.authReferrerPolicy=t,this.channel=i,this.client=r,this.id=s||m,this.language=a,this.libraries=n,this.mapIds=o,this.nonce=l,this.region=c,this.retries=h,this.url=p,this.version=d,f.instance){if(u(this.options,f.instance.options))return f.instance;throw new Error(`Loader must not be called again with different options. ${JSON.stringify(this.options)} !== `+JSON.stringify(f.instance.options))}f.instance=this}get options(){return{version:this.version,apiKey:this.apiKey,channel:this.channel,client:this.client,id:this.id,libraries:this.libraries,language:this.language,region:this.region,mapIds:this.mapIds,nonce:this.nonce,url:this.url,authReferrerPolicy:this.authReferrerPolicy}}get status(){return this.errors.length?r.FAILURE:this.done?r.SUCCESS:this.loading?r.LOADING:r.INITIALIZED}get failed(){return this.done&&!this.loading&&this.errors.length>=this.retries+1}createUrl(){let e=this.url;return e+="?callback=__googleMapsCallback",this.apiKey&&(e+="&key="+this.apiKey),this.channel&&(e+="&channel="+this.channel),this.client&&(e+="&client="+this.client),0<this.libraries.length&&(e+="&libraries="+this.libraries.join(",")),this.language&&(e+="&language="+this.language),this.region&&(e+="&region="+this.region),this.version&&(e+="&v="+this.version),this.mapIds&&(e+="&map_ids="+this.mapIds.join(",")),this.authReferrerPolicy&&(e+="&auth_referrer_policy="+this.authReferrerPolicy),e}deleteScript(){var e=document.getElementById(this.id);e&&e.remove()}load(){return this.loadPromise()}loadPromise(){return new Promise((t,i)=>{this.loadCallback(e=>{e?i(e.error):t(window.google)})})}importLibrary(e){return this.execute(),google.maps.importLibrary(e)}loadCallback(e){this.callbacks.push(e),this.execute()}setScript(){var e;if(document.getElementById(this.id))this.callback();else{const t={key:this.apiKey,channel:this.channel,client:this.client,libraries:this.libraries,v:this.version,mapIds:this.mapIds,language:this.language,region:this.region,authReferrerPolicy:this.authReferrerPolicy};if(Object.keys(t).forEach(e=>!t[e]&&delete t[e]),null==(e=null==(e=null===window||void 0===window?void 0:window.google)?void 0:e.maps)||!e.importLibrary){var c=t;let r,s,a,n="The Google Maps JavaScript API",o="google",i="importLibrary",l=document,e=window;const h=(e=e[o]||(e[o]={})).maps||(e.maps={}),p=new Set,d=new URLSearchParams,u=()=>r=r||new Promise((t,i)=>g(this,void 0,void 0,function*(){var e;for(a in yield s=l.createElement("script"),s.id=this.id,d.set("libraries",[...p]+""),c)d.set(a.replace(/[A-Z]/g,e=>"_"+e[0].toLowerCase()),c[a]);d.set("callback",o+".maps.__ib__"),s.src=this.url+"?"+d,h.__ib__=t,s.onerror=()=>r=i(Error(n+" could not load.")),s.nonce=this.nonce||(null==(e=l.querySelector("script[nonce]"))?void 0:e.nonce)||"",l.head.append(s)}));h[i]?console.warn(n+" only loads once. Ignoring:",c):h[i]=(e,...t)=>p.add(e)&&u().then(()=>h[i](e,...t))}this.importLibrary("core").then(()=>this.callback(),e=>{e=new ErrorEvent("error",{error:e});this.loadErrorCallback(e)})}}reset(){this.deleteScript(),this.done=!1,this.loading=!1,this.errors=[],this.onerrorEvent=null}resetIfRetryingFailed(){this.failed&&this.reset()}loadErrorCallback(e){var t;this.errors.push(e),this.errors.length<=this.retries?(t=this.errors.length*Math.pow(2,this.errors.length),console.error(`Failed to load Google Maps script, retrying in ${t} ms.`),setTimeout(()=>{this.deleteScript(),this.setScript()},t)):(this.onerrorEvent=e,this.callback())}callback(){this.done=!0,this.loading=!1,this.callbacks.forEach(e=>{e(this.onerrorEvent)}),this.callbacks=[]}execute(){this.resetIfRetryingFailed(),this.done?this.callback():window.google&&window.google.maps&&window.google.maps.version?(console.warn("Google Maps already loaded outside @googlemaps/js-api-loader.This may result in undesirable behavior as options and script parameters may not match."),this.callback()):this.loading||(this.loading=!0,this.setScript())}}const s=(()=>{let i=0,r="",s="";let h=!1;var e=ThemeSetupDos.themeUri;ThemeSetupDos.maps.marker,ThemeSetupDos.maps.markerActive;const a=ThemeSetupDos.maps.api||"";let n=ThemeSetupDos.maps.center||{lat:19.4326018,lng:-99.1332049};const o=parseInt(ThemeSetupDos.maps.zoom)||13;const l=e=>e.querySelectorAll("[data-place-id]"),c=(e,t,i)=>{e=`
    <div class="widget wa_maps_widget">
        <h3 class="widget-title">${e}</h3>
        <div id="map-widget-${t}" class="map-widget" data-map-id="${t}">
            <div id="map-container-${t}" class="map-container"></div>
            <div id="map-places-container-${t}" class="map-places-container"></div>
        </div>
    </div>
`,t=document.createRange().createContextualFragment(e);i.prepend(t)},p=(l,c)=>{var e=new f({apiKey:a,version:"weekly"});const t={center:n,zoom:o,styles:[{featureType:"poi",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"transit",stylers:[{visibility:"off"}]}],mapTypeControl:!1,streetViewControl:!1};e.load().then(e=>{const o=new e.maps.Map(document.getElementById("map-container-"+l),t);e.maps.event.addListener(o,"idle",()=>{h=h||!0;{var s=l,a=c;o;let e=document.getElementById("map-widget-"+s),t="",i=e.querySelector(".map-places-container"),r=(a.forEach(e=>{t+=d(e)}),`
    <ul class="wa-item-map-places__list">
    ${t}
    </ul>
    `);var n=document.createRange().createContextualFragment(r);console.log(i),i.appendChild(n)}}),console.log("Map loaded")}).catch(e=>{})},d=e=>{var t=e.dataset.placeTitle,e=e.dataset.placeId;return`
      <li class="wa-item-map-places__item" id="list-place-${e}" data-place-id="${e}">${t}</li>
    `};return{init:()=>{console.log("Inicializando mapa de lugares",i);var e=i=ThemeSetupDos.currentID||0;{var t;r=document.getElementById("post-"+e),s=r?r.querySelector(".single-widget-area"):null,r&&(0<[...t=l(r)].length&&(c("Prueba mapa",e,s),p(e,[...t])))}}}})()}}]);