( function( api ) {

	// Extends our custom "freelancer-services" section.
	api.sectionConstructor['freelancer-services'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );