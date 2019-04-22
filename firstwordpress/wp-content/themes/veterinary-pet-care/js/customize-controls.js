( function( api ) {

	// Extends our custom "veterinary-pet-care" section.
	api.sectionConstructor['veterinary-pet-care'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );