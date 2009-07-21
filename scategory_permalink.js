/* sCategory Permalink 0.4.0 */
function sCategoryPermalinkInit() {
  if (typeof(sCategoryPermalinkCurrent) == 'undefined') sCategoryPermalinkCurrent = '';

  var list = jQuery('#categorychecklist label input[type=checkbox]').each(function(idx) {
    radio = ['<input type="radio" name="category_permalink" value="' + this.value + '"'];
    if (sCategoryPermalinkCurrent == this.value) {
      radio.push('checked="checked"');
    }
    radio.push('/>');

    jQuery(this).before(radio.join(' '));
  });
}
