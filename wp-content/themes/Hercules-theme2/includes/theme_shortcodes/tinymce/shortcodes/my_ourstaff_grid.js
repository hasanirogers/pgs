frameworkShortcodeAtts={
	attributes:[		
			{
				label:"Columns",
				id:"columns",
				help:"Number of posts per row"
			},			
			{
				label:"Rows",
				id:"rows",
				help:"Number of rows"
			},
			{
				label:"Order by",
				id:"order_by",
				controlType:"select-control", 
				selectValues:['date', 'title', 'popular', 'random'],
				help:"Choose the order by mode."
			},
			{
				label:"Order",
				id:"order",
				controlType:"select-control", 
				selectValues:['DESC', 'ASC'],
				help:"Choose the order mode ( from Z to A or from A to Z)."
			},
			{
				label:"Image width",
				id:"thumb_width",
				help:"Set width for your featured images."
			},
			{
				label:"Image height",
				id:"thumb_height",
				help:"Set height for your featured images."
			},
			{
				label:"Custom class",
				id:"custom_class",
				help:"Use this field if you want to use a custom class for posts."
			}
	],
	defaultContent:"",
	shortcode:"ourstaff_grid",
	shortcodeType: "text-replace"
};