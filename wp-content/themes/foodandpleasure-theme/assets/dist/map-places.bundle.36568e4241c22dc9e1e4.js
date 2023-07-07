"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/leaflet-places.js":function(e,t,a){a.r(t),a.d(t,{PlacesMap:function(){return s}});a("../node_modules/@googlemaps/js-api-loader/dist/index.esm.js");var t=a("../node_modules/leaflet/dist/leaflet-src.js"),m=a.n(t);const s=(()=>{let e;const s={};var t=WA_ThemeSetup.themeUri;WA_ThemeSetup.maps.marker,WA_ThemeSetup.maps.markerActive;WA_ThemeSetup.maps.api;let n=WA_ThemeSetup.maps.center||{lat:19.4326018,lng:-99.1332049};const i=parseInt(WA_ThemeSetup.maps.zoom)||13,l=WA_ThemeSetup.maps.map_category??"maps";const a=e=>{var t,a=document.getElementById("post-"+e),s=o(e);a&&a.classList.contains("category-"+l)&&(t=a.querySelector("h1").innerText,0<[...a=d(a)].length)&&(r(t,e,s),p(e,[...a]),c())},d=e=>e.querySelectorAll("[data-place-id]"),r=(e,t,a)=>{e=`
    <div id="wa-maps-widget-${t}" class="widget wa_maps_widget ${c()?"is-mobile":""}">
    <div class="widget-header">
        <h3 class="widget-title">${e}</h3>
    </div>
        <div id="map-widget-${t}" class="map-widget" data-map-id="${t}">
            <div id="map-container-${t}" class="map-container"></div>
            <div id="map-places-container-${t}" class="map-places-container"></div>
        </div>
    </div>
`,t=document.createRange().createContextualFragment(e);c()?a.after(t):a.prepend(t)},c=()=>{return window.matchMedia("(max-width: 991px)").matches},o=e=>{e=document.getElementById("post-"+e);return c()?e.querySelector(".entry-excerpt"):e.querySelector(".single-widget-area")};const p=(e,t)=>{var a=m().map("map-container-"+e).setView([n.lat,n.lng],i);(s[e]=a).on("load",function(){console.log("El mapa se ha cargado completamente")})};return{init:()=>{e=WA_ThemeSetup.currentID||0,a(e),document.querySelector("body").addEventListener("is.post-load",e=>{e.detail.postID&&(e.detail.infinitescroll,a(e.detail.postID))})}}})()}}]);