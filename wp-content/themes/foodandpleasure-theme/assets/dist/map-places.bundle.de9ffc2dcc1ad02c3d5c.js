"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,a,t){t.r(a),t.d(a,{PlacesMap:function(){return p}});var s;(t=s=s||{})[t.INITIALIZED=0]="INITIALIZED",t[t.LOADING=1]="LOADING",t[t.SUCCESS=2]="SUCCESS",t[t.FAILURE=3]="FAILURE";const p=(()=>{let a=0,t="",s="";var e=ThemeSetupDos.themeUri;ThemeSetupDos.maps.marker,ThemeSetupDos.maps.markerActive;ThemeSetupDos.maps.api;ThemeSetupDos.maps.center;parseInt(ThemeSetupDos.maps.zoom);const p=e=>e.querySelectorAll("[data-place-id]"),i=(e,a)=>{e=`
    <div class="widget wa_maps_widget">
    <h3 class="widget-title">${e}</h3>
    <div id="map-widget-${a}" class="map-widget" data-map-id="${a}">
        <div id="map-container-${a}" class="map-container"></div>
        <div id="map-places-container-${a}" class="map-places-container"></div>
    </div>
</div>`,a=document.createRange().createContextualFragment(e);s.prepend(a)};return{init:()=>{console.log("Inicializando mapa de lugares",a);var e=a=ThemeSetupDos.currentID||0;t=document.getElementById("post-"+e),s=t?t.querySelector(".single-widget-area"):null,t&&(p(t),i("Prueba mapa",e))}}})()}}]);