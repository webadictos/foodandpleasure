"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,a,t){t.r(a),t.d(a,{PlacesMap:function(){return n}});const n=(()=>{let d=ThemeSetup.currentID||0,l=document.getElementById("post-"+d),r=l.querySelector(".single-widget-area");return{init:()=>{if(console.log("Inicializando mapa de lugares",d),l){var e=l.querySelectorAll("[data-place-id]");{var t="Prueba";var n=d;const i=`
    <div class="widget wa_maps_widget">
    <h3 class="widget-title">${t}</h3>
    <div id="map-widget-${n}" class="map-widget" data-map-id="${n}">
        <div class="map-container"></div>
        <div class="map-places-container"></div>
    </div>
</div>`,c=document.createRange().createContextualFragment(i);r.prepend(c)}let a=document.getElementById("map-widget-"+d);[...e].forEach(e=>{console.log(e.dataset.placeId),a.innerHTML=a.innerHTML+e.querySelector("h3").innerText})}}}})()}}]);