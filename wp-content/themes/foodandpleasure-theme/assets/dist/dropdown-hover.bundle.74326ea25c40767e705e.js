(self.webpackChunk=self.webpackChunk||[]).push([["dropdown-hover"],{"./js/dropdown-hover.js":function(){992<window.innerWidth&&document.querySelectorAll('.navbar .nav-item [data-bs-toggle="dropdown"]').forEach(function(e){e.addEventListener("mouseover",function(e){var n,t=this;null!=t&&(n=t.nextElementSibling,t.classList.add("show"),n.classList.add("show"))}),e.addEventListener("mouseleave",function(e){var n,t=this;null!=t&&(n=t.nextElementSibling,e=e.relatedTarget||e.toElement)&&!n.contains(e)&&(t.classList.remove("show"),n.classList.remove("show"))}),e.addEventListener("click",function(e){var n=this;null!=n&&n.href&&(e.preventDefault(),window.location.href=n.href)})})}}]);