@extends('layouts.blueprint')
	
@section('page_styles')
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet"/>
<!-- BEGIN:File Upload Plugin CSS files-->
<link href="{{ asset('assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}" rel="stylesheet" type="text/css">
<!-- END:File Upload Plugin CSS files-->
<!-- END PAGE LEVEL STYLES -->
@stop
<!-- BEGIN THEME STYLES -->

@section('extra')
<link href="{{ asset('assets/css/pages/inbox.css') }}" rel="stylesheet" type="text/css"/>
@stop
@section('page_title')

	Messages

@stop

@section('content')


			<div class="row inbox">
				<div class="col-md-2">
					<ul class="inbox-nav margin-bottom-10">
						<li class="compose-btn">
							<a href="javascript:;" data-title="Compose" class="btn green">
							<i class="fa fa-edit"></i> Compose </a>
						</li>
						<li class="inbox active">
							<a href="javascript:;" class="btn" data-title="Inbox">Inbox(3)</a>
							<b></b>
						</li>
						<li class="sent">
							<a class="btn" href="javascript:;" data-title="Sent">Sent</a><b></b>
						</li>
						<li class="draft">
							<a class="btn" href="javascript:;" data-title="Draft">Draft</a><b></b>
						</li>
						<li class="trash">
							<a class="btn" href="javascript:;" data-title="Trash">Trash</a><b></b>
						</li>
					</ul>
				</div>
				<div class="col-md-10">
					<div class="inbox-header">
						<h1 class="pull-left">Inbox</h1>
						<form class="form-inline pull-right" action="index.html">
							<div class="input-group input-medium">
								<input type="text" class="form-control" placeholder="Password">
								<span class="input-group-btn">
									<button type="submit" class="btn green"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>
					<div class="inbox-loading">
						Loading...
					</div>
					<div class="inbox-content">
					</div>
				</div>
			</div>
@stop
@section('page_plugins')
<!-- BEGIN: Page level plugins -->
<script src="{{ asset('assets/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}" type="text/javascript"></script>
<!-- BEGIN:File Upload Plugin JS files-->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="{{ asset('assets/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js') }}"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="{{ asset('assets/plugins/jquery-file-upload/js/vendor/tmpl.min.js') }}"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="{{ asset('assets/plugins/jquery-file-upload/js/vendor/load-image.min.js') }}"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="{{ asset('assets/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js') }}"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{{ asset('assets/plugins/jquery-file-upload/js/jquery.iframe-transport.js') }}"></script>
<!-- The basic File Upload plugin -->
<script src="{{ asset('assets/plugins/jquery-file-upload/js/jquery.fileupload.js') }}"></script>
<!-- The File Upload processing plugin -->
<script src="{{ asset('assets/plugins/jquery-file-upload/js/jquery.fileupload-process.js') }}"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="{{ asset('assets/plugins/jquery-file-upload/js/jquery.fileupload-image.js') }}"></script>
<!-- The File Upload audio preview plugin -->
<script src="{{ asset('assets/plugins/jquery-file-upload/js/jquery.fileupload-audio.js') }}"></script>
<!-- The File Upload video preview plugin -->
<script src="{{ asset('assets/plugins/jquery-file-upload/js/jquery.fileupload-video.js') }}"></script>
<!-- The File Upload validation plugin -->
<script src="{{ asset('assets/plugins/jquery-file-upload/js/jquery.fileupload-validate.js') }}"></script>
<!-- The File Upload user interface plugin -->
<script src="{{ asset('assets/plugins/jquery-file-upload/js/jquery.fileupload-ui.js') }}"></script>
<!-- END: Page level plugins -->
@stop
@section('page_scripts')
<!-- BEGIN PAGE SCRIPTS -->

<script src="{{ asset('js/inbox.js') }}"></script>
<script>
var Inbox = function () {

    var content = $('.inbox-content');
    var loading = $('.inbox-loading');

    var loadInbox = function (el, name) {
        var url = "{{URL::to('umessages/inbox')}}";
        var title = $('.inbox-nav > li.' + name + ' a').attr('data-title');

        loading.show();
        content.html('');
        toggleButton(el);

        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            dataType: "html",
            success: function(res) 
            {
                toggleButton(el);

                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-nav > li.' + name).addClass('active');
                $('.inbox-header > h1').text(title);

                loading.hide();
                content.html(res);
                App.fixContentHeight();
                App.initUniform();
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                toggleButton(el);
            },
            async: false
        });
    }

    var loadMessage = function (el, name, resetMenu) {
        var url = "{{URL::route('umessages.show')}}";

        loading.show();
        content.html('');
        toggleButton(el);
        
        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            dataType: "html",
            success: function(res) 
            {
                toggleButton(el);

                if (resetMenu) {
                    $('.inbox-nav > li.active').removeClass('active');
                }
                $('.inbox-header > h1').text('View Message');

                loading.hide();
                content.html(res);
                App.fixContentHeight();
                App.initUniform();
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                toggleButton(el);
            },
            async: false
        });
    }

    var initWysihtml5 = function () {
        $('.inbox-wysihtml5').wysihtml5({
            "stylesheets": ["assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
        });
    }

    var initFileupload = function () {

        $('#fileupload').fileupload({
            // Uncomment the following to send cross-domain cookies:
            xhrFields: {withCredentials: true},
            url: "{{URL::route('documents.store')}}",
            type: "POST"
            //autoUpload: true
        });

        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url: "{{URL::route('documents.store')}}",
                type: 'POST'
            }).fail(function () {
                $('<span class="alert alert-error"/>')
                    .text('Upload server currently unavailable - ' +
                    new Date())
                    .appendTo('#fileupload');
            });
        }
    }

    var loadCompose = function (el) {
        var url = "{{URL::route('umessages.create')}}";

        loading.show();
        content.html('');
        toggleButton(el);

        // load the form via ajax
        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            dataType: "html",
            success: function(res) 
            {
                toggleButton(el);

                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-header > h1').text('Compose');

                loading.hide();
                content.html(res);

                initFileupload();
                initWysihtml5();

                $('.inbox-wysihtml5').focus();
                App.fixContentHeight();
                App.initUniform();
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                toggleButton(el);
            },
            async: false
        });
    }

    var loadReply = function (el) {
        var url = "{{URL::route('umessages.edit')}}";

        loading.show();
        content.html('');
        toggleButton(el);

        // load the form via ajax
        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            dataType: "html",
            success: function(res) 
            {
                toggleButton(el);

                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-header > h1').text('Reply');

                loading.hide();
                content.html(res);
                $('[name="message"]').val($('#reply_email_content_body').html());

                handleCCInput(); // init "CC" input field

                initFileupload();
                initWysihtml5();
                App.fixContentHeight();
                App.initUniform();
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                toggleButton(el);
            },
            async: false
        });
    }

    var loadSearchResults = function (el) {
        var url = 'inbox_search_result.html';

        loading.show();
        content.html('');
        toggleButton(el);

        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            dataType: "html",
            success: function(res) 
            {
                toggleButton(el);

                $('.inbox-nav > li.active').removeClass('active');
                $('.inbox-header > h1').text('Search');

                loading.hide();
                content.html(res);
                App.fixContentHeight();
                App.initUniform();
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                toggleButton(el);
            },
            async: false
        });
    }

    var handleCCInput = function () {
        var the = $('.inbox-compose .mail-to .inbox-cc');
        var input = $('.inbox-compose .input-cc');
        the.hide();
        input.show();
        $('.close', input).click(function () {
            input.hide();
            the.show();
        });
    }

    var handleBCCInput = function () {

        var the = $('.inbox-compose .mail-to .inbox-bcc');
        var input = $('.inbox-compose .input-bcc');
        the.hide();
        input.show();
        $('.close', input).click(function () {
            input.hide();
            the.show();
        });
    }

    var toggleButton = function(el) {
        if (typeof el == 'undefined') {
            return;
        }
        if (el.attr("disabled")) {
            el.attr("disabled", false);
        } else {
            el.attr("disabled", true);
        }
    }

    return {
        //main function to initiate the module
        init: function () {

            // handle compose btn click
            $('.inbox .compose-btn a').live('click', function () {
                loadCompose($(this));
            });

            // handle reply and forward button click
            $('.inbox .reply-btn').live('click', function () {
                loadReply($(this));
            });

            // handle view message
            $('.inbox-content .view-message').live('click', function () {
                loadMessage($(this));
            });

            // handle inbox listing
            $('.inbox-nav > li.inbox > a').click(function () {
                loadInbox($(this), 'inbox');
            });

            // handle sent listing
            $('.inbox-nav > li.sent > a').click(function () {
                loadInbox($(this), 'sent');
            });

            // handle draft listing
            $('.inbox-nav > li.draft > a').click(function () {
                loadInbox($(this), 'draft');
            });

            // handle trash listing
            $('.inbox-nav > li.trash > a').click(function () {
                loadInbox($(this), 'trash');
            });

            //handle compose/reply cc input toggle
            $('.inbox-compose .mail-to .inbox-cc').live('click', function () {
                handleCCInput();
            });

            //handle compose/reply bcc input toggle
            $('.inbox-compose .mail-to .inbox-bcc').live('click', function () {
                handleBCCInput();
            });

            //handle loading content based on URL parameter
            if (App.getURLParameter("a") === "view") {
                loadMessage();
            } else if (App.getURLParameter("a") === "compose") {
                loadCompose();
            } else {
               $('.inbox-nav > li.inbox > a').click();
            }

        }

    };

}();

jQuery(document).ready(function() {       

   Inbox.init();
});

</script>
<!-- END PAGE SCRIPTS -->
@stop
