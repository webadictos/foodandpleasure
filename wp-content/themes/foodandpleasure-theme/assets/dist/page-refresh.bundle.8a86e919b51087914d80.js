(self.webpackChunk=self.webpackChunk||[]).push([["page-refresh"],{"./js/page-refresh.js":function(){(()=>{let t;const e=void 0===ThemeSetup.canRefresh||ThemeSetup.canRefresh,o=ThemeSetup.timeToRefresh||90,n="refreshCounter_"+ThemeSetup.current.postID;let s;const r=()=>{t&&window.clearTimeout(t);var e=1e3*o;t=window.setTimeout(i,e)},i=()=>{r(),e&&s<10&&top===self&&(location.href=window.location.href)};return{init:()=>{top===self&&e&&(s=window.sessionStorage.getItem(n)||0,r(),s++,window.sessionStorage.setItem(n,s),document.querySelector("body").addEventListener("mousemove",r),document.querySelector("body").addEventListener("keydown",r),window.addEventListener("scroll",r))}}})().init()}}]);