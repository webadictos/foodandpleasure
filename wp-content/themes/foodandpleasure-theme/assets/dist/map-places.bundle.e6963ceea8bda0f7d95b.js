"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,a,t){t.r(a),t.d(a,{PlacesMap:function(){return n}});const n=(()=>{let l=ThemeSetup.currentID||0,s=document.getElementById("post-"+l),c=s.querySelector(".single-widget-area");return{init:()=>{if(console.log("Inicializando mapa de lugares",l),s){var e=s.querySelectorAll("[data-place-id]");{var t=l;const n=`
    <div class="widget wa_maps_widget">
    <h3 class="widget-title">Casa Pueblo: El hotel más ‘aesthetic’ para hospedarse en Tulum</h3>
    <div id="map-widget-${t}" class="map-widget" data-map-id="${t}">
        <div class="map-container"></div>
        <div class="map-places-container"></div>
    </div>
</div>`,i=document.createRange().createContextualFragment(n);c.prepend(i)}let a=document.getElementById("map-widget-"+l);[...e].forEach(e=>{console.log(e.dataset.placeId),a.innerHTML=a.innerHTML+e.querySelector("h3").innerText})}}}})()}}]);