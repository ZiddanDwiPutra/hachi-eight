function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /* Loop through a collection of all HTML elements: */
  z = document.getElementsByTagName("*");
	for (i = 0; i < z.length; i++) {
		elmnt = z[i];
		/*search for elements with a certain atrribute:*/
		file = elmnt.getAttribute(main.tagImporter);
		if (file) {
		/* Make an HTTP request using the attribute value as the file name: */
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4) {
					let temp = document.createElement("template");
					if (this.status == 200) {
						temp.innerHTML = this.responseText;
						for (let child of temp.content.childNodes) {
							if (child.tagName == "SCRIPT") {
								eval(child.innerHTML);
							}else{
								elmnt.append(child);
							}
						}
						setTimeout(() => {
							main.loading.nonActive();
						}, 1000);
					}

					if (this.status == 404) {
						elmnt.innerHTML = "Page not found.";
					}
					/* Remove the attribute, and call this function once more: */
					elmnt.removeAttribute(main.tagImporter);
					includeHTML();
				}
			};
			xhttp.open("GET", file, true);
			xhttp.send();
			/* Exit the function: */
			return;
		}
  	}
}

// document.querySelectorAll('[data-tiny-editor]')
//     .forEach(editor =>
//         editor.addEventListener('input', e => console.log(e.target.innerHTML)
//     )
// );
includeHTML();
