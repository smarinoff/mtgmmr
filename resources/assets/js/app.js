
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*
Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
*/

jQuery( function( $ ) {

	//Init the dropdowns
	$('.ui.dropdown').dropdown();

	//Sort the tables
	$('.ui.sortable.table').tablesort();

	//Hide hidden elements
	$('.hidden').hide();

	//Handle match javascript
	if ( $('#create_match').length ) {

		var old_user_id = $('#create_match #user_id').val();

		$('#create_match #user_id').change( function( e ) {

			var current = $(this).val();

			//Get the diffs
			var removed = $(old_user_id).not($(current)).get();
			var added = $(current).not($(old_user_id)).get();

			//Hide fields for removed players
			if ( removed.length ) {
				$.each(removed, function(index, value) {
					$('.user' + value).hide();
				});
			}

			//Unhide the players added
			$.each( added, function( index, value ) {
				$('.user' + value).show();
			});

			//Update the old_user_id
			old_user_id = current;
		});
	}
});