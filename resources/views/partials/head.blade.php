<meta charset="utf-8" />
<title>Dashboard</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="{{ asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
<link href="{{ asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="{{ asset('assets/layouts/layout4/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/layouts/layout4/css/themes/light.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
<link href="{{ asset('assets/layouts/layout4/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico" />
<!-- Sidebar full-height fix -->
<style>
	 /* Ensure the layout container and sidebar extend to the full viewport height
		 so the sidebar background reaches the bottom even when content is short. */
	 html, body { height: 100%; }
	 .page-container { min-height: 100vh; }
	 .page-sidebar-wrapper, .page-sidebar, .page-content-wrapper { min-height: 100vh; }
	 /* In case the layout uses fixed header with offset, ensure sidebar still covers
		 the available viewport below the header when page-header-fixed is used. */
	 body.page-header-fixed .page-sidebar-wrapper,
	 body.page-header-fixed .page-sidebar,
	 body.page-header-fixed .page-content-wrapper { min-height: calc(100vh - 80px); }

	/* Desktop: align sidebar and content columns so they run parallel and stretch to same height */
	@media (min-width: 992px) {
		.page-container {
			display: flex;
			align-items: stretch;
		}

		/* Sidebar column: keep theme width but allow flex layout to manage height */
		.page-sidebar-wrapper {
			display: block;
			flex: 0 0 235px; /* match sidebar width used by theme */
		}

		.page-sidebar {
			margin: 0; /* avoid theme negative margins interfering with flex alignment */
			position: relative;
			height: auto !important;

			/* Match the vertical spacing the content uses so both columns align */
			padding-top: 20px;
			padding-bottom: 20px;
			box-sizing: border-box;
		}

		/* Content column should take remaining space */
		.page-content-wrapper {
			/* remove theme float/width so flexbox controls layout */
			float: none !important;
			width: auto !important;
			flex: 1 1 auto;
			min-height: 100vh;
		}

		/* Ensure the content's internal spacing doesn't shift its visual start relative to the sidebar */
		/* Ensure no theme offsets remain on the content area and keep consistent padding */
		.page-content, .page-content-wrapper > .page-content, .page-content-wrapper .page-content {
			margin-left: 0 !important;
			margin-right: 0 !important;
			margin-top: 0 !important;
			padding: 20px !important;
			box-sizing: border-box;
		}

		/* If theme sets a left margin specifically on this descendant selector, override it */
		.page-content-wrapper .page-content { margin-left: 0 !important; }

		/* Make sidebar and content have identical top/bottom spacing so their backgrounds align */
		.page-sidebar-wrapper, .page-content-wrapper,
		.page-sidebar, .page-content, .page-content-wrapper > .page-content {
			margin-top: 0 !important;
			margin-bottom: 0 !important;
			padding-top: 20px !important;
			padding-bottom: 20px !important;
		}
		/* When header is fixed, subtract header height so vertical space matches */
		body.page-header-fixed .page-content-wrapper {
			min-height: calc(100vh - 80px);
		}
	}
</style>