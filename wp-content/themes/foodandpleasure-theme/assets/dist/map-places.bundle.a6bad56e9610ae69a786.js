/*! For license information please see map-places.bundle.a6bad56e9610ae69a786.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,t,i){function g(e,o,n,l){return new(n=n||Promise)(function(i,t){function r(e){try{a(l.next(e))}catch(e){t(e)}}function s(e){try{a(l.throw(e))}catch(e){t(e)}}function a(e){var t;e.done?i(e.value):((t=e.value)instanceof n?t:new n(function(e){e(t)})).then(r,s)}a((l=l.apply(e,o||[])).next())})}i.r(t),i.d(t,{PlacesMap:function(){return s}});function u(e,t){if(e===t)return!0;if(e&&t&&"object"==typeof e&&"object"==typeof t){if(e.constructor!==t.constructor)return!1;var i,r,s;if(Array.isArray(e)){if((i=e.length)!=t.length)return!1;for(r=i;0!=r--;)if(!u(e[r],t[r]))return!1}else{if(e.constructor===RegExp)return e.source===t.source&&e.flags===t.flags;if(e.valueOf!==Object.prototype.valueOf)return e.valueOf()===t.valueOf();if(e.toString!==Object.prototype.toString)return e.toString()===t.toString();if((i=(s=Object.keys(e)).length)!==Object.keys(t).length)return!1;for(r=i;0!=r--;)if(!Object.prototype.hasOwnProperty.call(t,s[r]))return!1;for(r=i;0!=r--;){var a=s[r];if(!u(e[a],t[a]))return!1}}return!0}return e!=e&&t!=t}var r;const m="__googleMapsScriptId";(t=r=r||{})[t.INITIALIZED=0]="INITIALIZED",t[t.LOADING=1]="LOADING",t[t.SUCCESS=2]="SUCCESS",t[t.FAILURE=3]="FAILURE";class f{constructor({apiKey:e,authReferrerPolicy:t,channel:i,client:r,id:s=m,language:a,libraries:o=[],mapIds:n,nonce:l,region:c,retries:h=3,url:p="https://maps.googleapis.com/maps/api/js",version:d}){if(this.callbacks=[],this.done=!1,this.loading=!1,this.errors=[],this.apiKey=e,this.authReferrerPolicy=t,this.channel=i,this.client=r,this.id=s||m,this.language=a,this.libraries=o,this.mapIds=n,this.nonce=l,this.region=c,this.retries=h,this.url=p,this.version=d,f.instance){if(u(this.options,f.instance.options))return f.instance;throw new Error(`Loader must not be called again with different options. ${JSON.stringify(this.options)} !== `+JSON.stringify(f.instance.options))}f.instance=this}get options(){return{version:this.version,apiKey:this.apiKey,channel:this.channel,client:this.client,id:this.id,libraries:this.libraries,language:this.language,region:this.region,mapIds:this.mapIds,nonce:this.nonce,url:this.url,authReferrerPolicy:this.authReferrerPolicy}}get status(){return this.errors.length?r.FAILURE:this.done?r.SUCCESS:this.loading?r.LOADING:r.INITIALIZED}get failed(){return this.done&&!this.loading&&this.errors.length>=this.retries+1}createUrl(){let e=this.url;return e+="?callback=__googleMapsCallback",this.apiKey&&(e+="&key="+this.apiKey),this.channel&&(e+="&channel="+this.channel),this.client&&(e+="&client="+this.client),0<this.libraries.length&&(e+="&libraries="+this.libraries.join(",")),this.language&&(e+="&language="+this.language),this.region&&(e+="&region="+this.region),this.version&&(e+="&v="+this.version),this.mapIds&&(e+="&map_ids="+this.mapIds.join(",")),this.authReferrerPolicy&&(e+="&auth_referrer_policy="+this.authReferrerPolicy),e}deleteScript(){var e=document.getElementById(this.id);e&&e.remove()}load(){return this.loadPromise()}loadPromise(){return new Promise((t,i)=>{this.loadCallback(e=>{e?i(e.error):t(window.google)})})}importLibrary(e){return this.execute(),google.maps.importLibrary(e)}loadCallback(e){this.callbacks.push(e),this.execute()}setScript(){var e;if(document.getElementById(this.id))this.callback();else{const t={key:this.apiKey,channel:this.channel,client:this.client,libraries:this.libraries,v:this.version,mapIds:this.mapIds,language:this.language,region:this.region,authReferrerPolicy:this.authReferrerPolicy};if(Object.keys(t).forEach(e=>!t[e]&&delete t[e]),null==(e=null==(e=null===window||void 0===window?void 0:window.google)?void 0:e.maps)||!e.importLibrary){var c=t;let r,s,a,o="The Google Maps JavaScript API",n="google",i="importLibrary",l=document,e=window;const h=(e=e[n]||(e[n]={})).maps||(e.maps={}),p=new Set,d=new URLSearchParams,u=()=>r=r||new Promise((t,i)=>g(this,void 0,void 0,function*(){var e;for(a in yield s=l.createElement("script"),s.id=this.id,d.set("libraries",[...p]+""),c)d.set(a.replace(/[A-Z]/g,e=>"_"+e[0].toLowerCase()),c[a]);d.set("callback",n+".maps.__ib__"),s.src=this.url+"?"+d,h.__ib__=t,s.onerror=()=>r=i(Error(o+" could not load.")),s.nonce=this.nonce||(null==(e=l.querySelector("script[nonce]"))?void 0:e.nonce)||"",l.head.append(s)}));h[i]?console.warn(o+" only loads once. Ignoring:",c):h[i]=(e,...t)=>p.add(e)&&u().then(()=>h[i](e,...t))}this.importLibrary("core").then(()=>this.callback(),e=>{e=new ErrorEvent("error",{error:e});this.loadErrorCallback(e)})}}reset(){this.deleteScript(),this.done=!1,this.loading=!1,this.errors=[],this.onerrorEvent=null}resetIfRetryingFailed(){this.failed&&this.reset()}loadErrorCallback(e){var t;this.errors.push(e),this.errors.length<=this.retries?(t=this.errors.length*Math.pow(2,this.errors.length),console.error(`Failed to load Google Maps script, retrying in ${t} ms.`),setTimeout(()=>{this.deleteScript(),this.setScript()},t)):(this.onerrorEvent=e,this.callback())}callback(){this.done=!0,this.loading=!1,this.callbacks.forEach(e=>{e(this.onerrorEvent)}),this.callbacks=[]}execute(){this.resetIfRetryingFailed(),this.done?this.callback():window.google&&window.google.maps&&window.google.maps.version?(console.warn("Google Maps already loaded outside @googlemaps/js-api-loader.This may result in undesirable behavior as options and script parameters may not match."),this.callback()):this.loading||(this.loading=!0,this.setScript())}}i("../node_modules/bootstrap/dist/js/bootstrap.esm.js"),i("jquery");const s=(()=>{let o=ThemeSetupDos.currentID||0,n=document.getElementById("post-"+o),l=n.querySelector(".single-widget-area");let c={};let h=!1;let p="",d=!1;var e=ThemeSetupDos.themeUri;ThemeSetupDos.maps.mylocation,ThemeSetupDos.maps.marker,ThemeSetupDos.maps.markerActive;const u=ThemeSetupDos.maps.api||"";let g=ThemeSetupDos.maps.center||{lat:19.4326018,lng:-99.1332049};const m=parseInt(ThemeSetupDos.maps.zoom)||13;window.location.protocol,window.location.hostname;const y=e=>{var t=e.querySelector("h3").innerText;return`
      <li id="list-place-${e.dataset.placeId}">${t}</li>
    `};return{init:()=>{if(console.log("Inicializando mapa de lugares",o),n){var i=n.querySelectorAll("[data-place-id]"),r="Prueba",s=o,r=`
    <div class="widget wa_maps_widget">
    <h3 class="widget-title">${r}</h3>
    <div id="map-widget-${s}" class="map-widget" data-map-id="${s}">
        <div id="map-container-${s}" class="map-container"></div>
        <div id="map-places-container-${s}" class="map-places-container"></div>
    </div>
</div>`,s=document.createRange().createContextualFragment(r),r=(l.prepend(s),document.getElementById("map-widget-"+o));r.querySelector(".map-container");{s=i;let t="",e=`
    <ul class="wa-item-map-places__items">
    ${t}
    </ul>
    `;s.forEach(e=>{t+=y(e)});r=document.createRange().createContextualFragment(e);console.log(p),p.appendChild(r)}{var t="map-container-"+o;const e=new f({apiKey:u,version:"weekly"}),a={center:g,zoom:m,styles:[{featureType:"poi",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"transit",stylers:[{visibility:"off"}]}],mapTypeControl:!1,streetViewControl:!1};e.load().then(e=>{c=new e.maps.Map(document.getElementById(t),a),e.maps.event.addListener(c,"idle",()=>{h=!0,d=d||!0}),console.log("Map loaded")}).catch(e=>{})}}}}})()}}]);