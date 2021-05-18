<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script>
	  tinymce.init({
		language : "fr_FR",
		selector: '#description_complet',
		height : "500",
		theme : "silver",
		image_title: true,
		content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
		
		plugins : "help lists imagetools hr tinymcespellchecker powerpaste code advcode visualblocks a11ychecker forecolor anchor backcolor autolink textcolor colorpicker link image table save insertdatetime preview media searchreplace print contextmenu paste directionality fullscreen edit noneditable visualchars nonbreaking wordcount advlist autosave",
		contextmenu: "link lists image inserttable | cell row column deletetable | code",
		toolbar:" fontselect fontsizeselect formatselect | bold italic forecolor | numlist bullist link image table | alignleft aligncenter alignright alignjustify ltr rtl | removeformat fullscreen code | undo redo",
		
		//numlist bullist outdent indent  | removeformat
		

		// Style formats
		style_formats : [
			{title : 'Copyright', block : 'div', classes : 'copyright'},
		],
	});
</script>