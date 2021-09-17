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
				label:"Icon align",
				id:"icon_align",
				controlType:"select-control", 
				selectValues:['pull-left', 'pull-right', 'center', 'none'],
				help:"Choose Icon aligning."
			},
			{
				label:"Icon color",
				id:"icon_color",
				help:"Enter the color of the icon."
			},
			{
				label:"Icon size",
				id:"icon_size",
				controlType:"select-control", 
				selectValues:['icon-1x', 'icon-2x', 'icon-4x', 'icon-5x', 'icon-6x', 'icon-7x', 'icon-8x', 'icon-9x', 'none'],
				help:"Choose Icon size."
			},
			{
				label:"Custom class",
				id:"custom_class",
				help:"Use this field if you want to use a custom class for posts."
			}
	],
	defaultContent:"",
	shortcode:"services_grid",
	shortcodeType: "text-replace"
};