// alert("include");

function move(url){
	window.location.href = url;
}

function selectEl(className){
	return document.querySelector(className);
}

function selectElAll(className){
	return document.querySelectorAll(className);
}

function createEl(nameTag, className, namaFungsi,value){
	return "".concat("<", nameTag, " class='", className,"'", " onclick='", namaFungsi,"'", "> ",value, "</", nameTag, ">");
}

function onloadThis(b){
	console.log(b);
}

window.main = {
	tagImporter: "import-file",
	api: "MainServ.php",
	router(){
		var hash = location.hash;
		if(hash=="")location.hash = "#/";
		new Router().setPath(hash.replace("#/", ""));
		onhashchange = (e)=>{
			var hash = e.target.location.hash;
			if(hash=="")location.hash = "#/";
			main.loading.active();
			new Router().setPath(hash.replace("#/", ""));
		}
	},
	loading:{
		active(){
			components.overlayPanel.fadeIn(100);
			$('.loading-view').show();
		},
		nonActive(){
			components.overlayPanel.fadeOut(200);
			$('.loading-view').hide();
		}
	},
	handleHeadLink(){
		var navLink = selectElAll('.head-link-control .nav-link');
		for(let nav of navLink){
			nav.onclick = (obj)=>{
				var nlist = selectElAll('.head-link-control .nav-link');
				for(let n of nlist){
					n.className = n.className.replace(" active", '');
				}
				obj.target.className += " active";
				selectEl('.head-main .navbar-toggler').click();
			};
		}
	},
	checkDevice(){
		let isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
		if(isMobile){
			console.log("Mobile Version");
			
			$('.main').addClass('mobile');
			$('.body-page').addClass('mobile');
		}else{
			console.log("Desktop Version");
			
		}
	}
}

console.log(location);

window.onload = ()=>{
	if(location.host!="localhost"){
		if(location.protocol=="http:"){
			location.href = "https://hachieight.xyz";
		}
	}
	main.checkDevice();
	main.router();	
	main.handleHeadLink();
	window['components'] = {
		overlayPanel: $('.overlay-panel')
	}
}