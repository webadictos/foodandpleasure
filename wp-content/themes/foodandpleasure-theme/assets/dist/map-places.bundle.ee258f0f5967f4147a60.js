"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,a,t){t.r(a),t.d(a,{PlacesMap:function(){return s}});var o;(a=o=o||{})[a.INITIALIZED=0]="INITIALIZED",a[a.LOADING=1]="LOADING",a[a.SUCCESS=2]="SUCCESS",a[a.FAILURE=3]="FAILURE";t("../node_modules/bootstrap/dist/js/bootstrap.esm.js"),t("jquery");const s=(()=>{let r=ThemeSetupDos.currentID||0,i=document.getElementById("post-"+r),p=i.querySelector(".single-widget-area");var e=ThemeSetupDos.themeUri;ThemeSetupDos.map.location,ThemeSetupDos.map.marker,ThemeSetupDos.map.markerActive;ThemeSetupDos.map.key;ThemeSetupDos.map.center;parseInt(ThemeSetupDos.map.zoom);window.location.protocol,window.location.hostname;return{init:()=>{if(console.log("Inicializando mapa de lugares",r),i){var e=i.querySelectorAll("[data-place-id]");{var t="Prueba";var o=r;const s=`
    <div class="widget wa_maps_widget">
    <h3 class="widget-title">${t}</h3>
    <div id="map-widget-${o}" class="map-widget" data-map-id="${o}">
        <div class="map-container"></div>
        <div class="map-places-container"></div>
    </div>
</div>`,n=document.createRange().createContextualFragment(s);p.prepend(n)}let a=document.getElementById("map-widget-"+r);[...e].forEach(e=>{console.log(e.dataset.placeId),a.innerHTML=a.innerHTML+e.querySelector("h3").innerText})}}}})()}}]);