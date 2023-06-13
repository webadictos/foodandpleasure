/*! For license information please see map-places.bundle.28feaff7b8e2770001fc.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,t,i){function u(e,o,n,l){return new(n=n||Promise)(function(i,t){function r(e){try{a(l.next(e))}catch(e){t(e)}}function s(e){try{a(l.throw(e))}catch(e){t(e)}}function a(e){var t;e.done?i(e.value):((t=e.value)instanceof n?t:new n(function(e){e(t)})).then(r,s)}a((l=l.apply(e,o||[])).next())})}i.r(t),i.d(t,{PlacesMap:function(){return s}});function g(e,t){if(e===t)return!0;if(e&&t&&"object"==typeof e&&"object"==typeof t){if(e.constructor!==t.constructor)return!1;var i,r,s;if(Array.isArray(e)){if((i=e.length)!=t.length)return!1;for(r=i;0!=r--;)if(!g(e[r],t[r]))return!1}else{if(e.constructor===RegExp)return e.source===t.source&&e.flags===t.flags;if(e.valueOf!==Object.prototype.valueOf)return e.valueOf()===t.valueOf();if(e.toString!==Object.prototype.toString)return e.toString()===t.toString();if((i=(s=Object.keys(e)).length)!==Object.keys(t).length)return!1;for(r=i;0!=r--;)if(!Object.prototype.hasOwnProperty.call(t,s[r]))return!1;for(r=i;0!=r--;){var a=s[r];if(!g(e[a],t[a]))return!1}}return!0}return e!=e&&t!=t}var r;const m="__googleMapsScriptId";(i=r=r||{})[i.INITIALIZED=0]="INITIALIZED",i[i.LOADING=1]="LOADING",i[i.SUCCESS=2]="SUCCESS",i[i.FAILURE=3]="FAILURE";class w{constructor({apiKey:e,authReferrerPolicy:t,channel:i,client:r,id:s=m,language:a,libraries:o=[],mapIds:n,nonce:l,region:c,retries:h=3,url:d="https://maps.googleapis.com/maps/api/js",version:p}){if(this.callbacks=[],this.done=!1,this.loading=!1,this.errors=[],this.apiKey=e,this.authReferrerPolicy=t,this.channel=i,this.client=r,this.id=s||m,this.language=a,this.libraries=o,this.mapIds=n,this.nonce=l,this.region=c,this.retries=h,this.url=d,this.version=p,w.instance){if(g(this.options,w.instance.options))return w.instance;throw new Error(`Loader must not be called again with different options. ${JSON.stringify(this.options)} !== `+JSON.stringify(w.instance.options))}w.instance=this}get options(){return{version:this.version,apiKey:this.apiKey,channel:this.channel,client:this.client,id:this.id,libraries:this.libraries,language:this.language,region:this.region,mapIds:this.mapIds,nonce:this.nonce,url:this.url,authReferrerPolicy:this.authReferrerPolicy}}get status(){return this.errors.length?r.FAILURE:this.done?r.SUCCESS:this.loading?r.LOADING:r.INITIALIZED}get failed(){return this.done&&!this.loading&&this.errors.length>=this.retries+1}createUrl(){let e=this.url;return e+="?callback=__googleMapsCallback",this.apiKey&&(e+="&key="+this.apiKey),this.channel&&(e+="&channel="+this.channel),this.client&&(e+="&client="+this.client),0<this.libraries.length&&(e+="&libraries="+this.libraries.join(",")),this.language&&(e+="&language="+this.language),this.region&&(e+="&region="+this.region),this.version&&(e+="&v="+this.version),this.mapIds&&(e+="&map_ids="+this.mapIds.join(",")),this.authReferrerPolicy&&(e+="&auth_referrer_policy="+this.authReferrerPolicy),e}deleteScript(){var e=document.getElementById(this.id);e&&e.remove()}load(){return this.loadPromise()}loadPromise(){return new Promise((t,i)=>{this.loadCallback(e=>{e?i(e.error):t(window.google)})})}importLibrary(e){return this.execute(),google.maps.importLibrary(e)}loadCallback(e){this.callbacks.push(e),this.execute()}setScript(){var e;if(document.getElementById(this.id))this.callback();else{const t={key:this.apiKey,channel:this.channel,client:this.client,libraries:this.libraries,v:this.version,mapIds:this.mapIds,language:this.language,region:this.region,authReferrerPolicy:this.authReferrerPolicy};if(Object.keys(t).forEach(e=>!t[e]&&delete t[e]),null==(e=null==(e=null===window||void 0===window?void 0:window.google)?void 0:e.maps)||!e.importLibrary){var c=t;let r,s,a,o="The Google Maps JavaScript API",n="google",i="importLibrary",l=document,e=window;const h=(e=e[n]||(e[n]={})).maps||(e.maps={}),d=new Set,p=new URLSearchParams,g=()=>r=r||new Promise((t,i)=>u(this,void 0,void 0,function*(){var e;for(a in yield s=l.createElement("script"),s.id=this.id,p.set("libraries",[...d]+""),c)p.set(a.replace(/[A-Z]/g,e=>"_"+e[0].toLowerCase()),c[a]);p.set("callback",n+".maps.__ib__"),s.src=this.url+"?"+p,h.__ib__=t,s.onerror=()=>r=i(Error(o+" could not load.")),s.nonce=this.nonce||(null==(e=l.querySelector("script[nonce]"))?void 0:e.nonce)||"",l.head.append(s)}));h[i]?console.warn(o+" only loads once. Ignoring:",c):h[i]=(e,...t)=>d.add(e)&&g().then(()=>h[i](e,...t))}this.importLibrary("core").then(()=>this.callback(),e=>{e=new ErrorEvent("error",{error:e});this.loadErrorCallback(e)})}}reset(){this.deleteScript(),this.done=!1,this.loading=!1,this.errors=[],this.onerrorEvent=null}resetIfRetryingFailed(){this.failed&&this.reset()}loadErrorCallback(e){var t;this.errors.push(e),this.errors.length<=this.retries?(t=this.errors.length*Math.pow(2,this.errors.length),console.error(`Failed to load Google Maps script, retrying in ${t} ms.`),setTimeout(()=>{this.deleteScript(),this.setScript()},t)):(this.onerrorEvent=e,this.callback())}callback(){this.done=!0,this.loading=!1,this.callbacks.forEach(e=>{e(this.onerrorEvent)}),this.callbacks=[]}execute(){this.resetIfRetryingFailed(),this.done?this.callback():window.google&&window.google.maps&&window.google.maps.version?(console.warn("Google Maps already loaded outside @googlemaps/js-api-loader.This may result in undesirable behavior as options and script parameters may not match."),this.callback()):this.loading||(this.loading=!0,this.setScript())}}const s=(()=>{let i=0,r="",s="",h={},n={};let d=!1;var e=ThemeSetupDos.themeUri;const l=ThemeSetupDos.maps.marker||e+"/assets/images/marker.png",a=ThemeSetupDos.maps.markerActive||e+"/assets/images/marker.png",o=ThemeSetupDos.maps.api||"";let p=ThemeSetupDos.maps.center||{lat:19.4326018,lng:-99.1332049};const g=parseInt(ThemeSetupDos.maps.zoom)||13;const c=e=>e.querySelectorAll("[data-place-id]"),u=(e,t,i)=>{e=`
    <div class="widget wa_maps_widget">
        <h3 class="widget-title">${e}</h3>
        <div id="map-widget-${t}" class="map-widget" data-map-id="${t}">
            <div id="map-container-${t}" class="map-container"></div>
            <div id="map-places-container-${t}" class="map-places-container"></div>
        </div>
    </div>
`,t=document.createRange().createContextualFragment(e);i.prepend(t)},m=(l,c)=>{var e=new w({apiKey:o,version:"weekly"});const t={center:p,zoom:g,styles:[{featureType:"poi",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"transit",stylers:[{visibility:"off"}]}],mapTypeControl:!1,streetViewControl:!1};e.load().then(e=>{h=new e.maps.Map(document.getElementById("map-container-"+l),t),e.maps.event.addListener(h,"idle",()=>{if(!d){d=!0;{var s=l;var a=c;var o=h;let e=document.getElementById(`map-widget-${s}`),i="",t=e.querySelector(".map-places-container"),r=(a.forEach(e=>{const t={id:e.dataset.placeId,title:e.dataset.placeTitle,latitud:parseFloat(e.dataset.placeLatitude),longitud:parseFloat(e.dataset.placeLongitude)};i=i+f(t);y(t,o)}),`
    <ul class="wa-item-map-places__list">
    ${i}
    </ul>
    `);const n=document.createRange().createContextualFragment(r);console.log(t),t.appendChild(n)}console.log("Render Places")}}),console.log("Map loaded")}).catch(e=>{})},f=e=>{var t=e.title,e=e.id;return`
      <li class="wa-item-map-places__item" id="list-place-${e}" data-place-id="${e}">${t}</li>
    `},y=(e,t)=>{var i=e.latitud,r=e.longitud,s=`

        <h4 class="location-item-title">${e.title}</h4>

    `;const a=new google.maps.InfoWindow({content:s}),o=(console.log(i,r),new google.maps.Marker({position:{lat:i,lng:r},visible:!0,map:t,title:e.title||"",icon:{url:l,scaledSize:new google.maps.Size(40,40)},infowindow:a}));a.addListener("closeclick",()=>{v(o,!1)}),o.addListener("click",()=>{Object.entries(n).forEach(([,e])=>{e.infowindow.close(h,e),v(e,!1)}),v(o,!0),a.open({anchor:o,map:t,shouldFocus:!1}),t.getZoom()<14&&t.setZoom(14)}),n[e.id]=o},v=(e,t)=>{t?e.setIcon({url:a,scaledSize:new google.maps.Size(40,40)}):e.setIcon({url:l,scaledSize:new google.maps.Size(40,40)})};return{init:()=>{console.log("Inicializando mapa de lugares",i);var e=i=ThemeSetupDos.currentID||0;{var t;r=document.getElementById("post-"+e),s=r?r.querySelector(".single-widget-area"):null,r&&(0<[...t=c(r)].length&&(u("Prueba mapa",e,s),m(e,[...t])))}}}})()}}]);