/* sCategory Permalink 0.2.2 */
function sCategoryPermalinkInit() {
	var list = document.getElementById('categorychecklist');
	if (!list) return;
	
	var labels = list.getElementsByTagName('label');
	for (var i = 0; i < labels.length; i++) {
		var checkbox = labels[i].getElementsByTagName('input')[0];
		if (!checkbox) continue;
		
		try {
			var radio = document.createElement('<input type="radio" name="category_permalink" />');
		} catch(err){
			var radio = document.createElement('input');
			radio.setAttribute('type','radio');
			radio.setAttribute('name','category_permalink');
		}
		radio.value = checkbox.value;

		labels[i].insertBefore(radio, checkbox);
		labels[i].insertBefore(document.createTextNode(' '), checkbox);

		if (typeof(sCategoryPermalinkCurrent) == 'undefined') sCategoryPermalinkCurrent = '';
		if (sCategoryPermalinkCurrent == checkbox.value) {
			radio.checked = true;
		} 
	}
}
