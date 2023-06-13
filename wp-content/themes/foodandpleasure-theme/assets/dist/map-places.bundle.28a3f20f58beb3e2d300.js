"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,a,t){t.r(a),t.d(a,{PlacesMap:function(){return s}});var n;(a=n=n||{})[a.INITIALIZED=0]="INITIALIZED",a[a.LOADING=1]="LOADING",a[a.SUCCESS=2]="SUCCESS",a[a.FAILURE=3]="FAILURE";t("../node_modules/bootstrap/dist/js/bootstrap.esm.js"),t("jquery");const s=(()=>{let d=ThemeSetup.currentID||0,r=document.getElementById("post-"+d),c=r.querySelector(".single-widget-area");return{init:()=>{if(console.log("Inicializando mapa de lugares",d),r){var e=r.querySelectorAll("[data-place-id]");{var t="Prueba";var n=d;const s=`
    <div class="widget wa_maps_widget">
    <h3 class="widget-title">${t}</h3>
    <div id="map-widget-${n}" class="map-widget" data-map-id="${n}">
        <div class="map-container"></div>
        <div class="map-places-container"></div>
    </div>
</div>`,i=document.createRange().createContextualFragment(s);c.prepend(i)}let a=document.getElementById("map-widget-"+d);[...e].forEach(e=>{console.log(e.dataset.placeId),a.innerHTML=a.innerHTML+e.querySelector("h3").innerText})}}}})()}}]);