(self.webpackChunk=self.webpackChunk||[]).push([["dropdown-hover"],{"./js/dropdown-hover.js":function(){992<window.innerWidth&&document.querySelectorAll('.navbar .nav-item [data-bs-toggle="dropdown"]').forEach(function(n){let t=null,s=n.nextElementSibling;n.addEventListener("mouseenter",function(e){clearTimeout(t),n.classList.add("show"),s.classList.add("show")}),n.addEventListener("mouseleave",function(e){t=setTimeout(function(){n.classList.remove("show"),s.classList.remove("show")},200)}),s.addEventListener("mouseenter",function(e){clearTimeout(t)}),s.addEventListener("mouseleave",function(e){t=setTimeout(function(){n.classList.remove("show"),s.classList.remove("show")},200)}),n.addEventListener("click",function(e){var n=this;null!=n&&n.href&&(e.preventDefault(),window.location.href=n.href)}),s.addEventListener("transitionend",function(){s.classList.contains("show")||(s.style.display="none")})})}}]);