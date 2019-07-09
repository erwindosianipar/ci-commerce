(function()
{
	var defaultOptions = {
		ele: "body",
		type: "info",
		offset:
		{
			from: "top",
			amount: 15
		},
		align: "right",
		width: 290,
		delay: 4000,
		allow_dismiss: true,
		stackup_spacing: 10
	};

	$.simplyToast = function(type, message, options)
	{
		var $alert, css, offsetAmount;

		options = $.extend({}, defaultOptions, options);

		$alert = $('<div class="simply-toast alert alert-' + type + ' shadow-sm"></div>');

		if (options.allow_dismiss)
		{
			$alert.append("<span class=\"close\" data-dismiss=\"alert\">×</span>");
		}

		$alert.append(message);

		if (options.top_offset)
		{
			options.offset = {
				from: "top",
				amount: options.top_offset
			};
		}
		
		offsetAmount = options.offset.amount;
		$(".simply-toast").each(function()
		{
			return offsetAmount = Math.max(offsetAmount, parseInt($(this).css(options.offset.from)) + $(this).outerHeight() + options.stackup_spacing);
		});

		css = {
			"position": (options.ele === "body" ? "fixed" : "absolute"),
			"margin": 0,
			"z-index": "9999",
			"display": "none"
		};

		css[options.offset.from] = offsetAmount + "px";

		$alert.css(css);
		
		if (options.width !== "auto")
		{
			$alert.css("width", options.width + "px");
		}

		$(options.ele).append($alert);

		switch (options.align)
		{
			case "center":
				$alert.css(
				{
					"left": "50%",
					"margin-left": "-" + ($alert.outerWidth() / 2) + "px"
				});
				break;
			case "left":
				$alert.css("left", "15px");
				break;
			default:
				$alert.css("right", "15px");
		}
		
		$alert.fadeIn();

		function removeAlert()
		{
			$alert.fadeOut(function()
			{
				return $alert.remove();
			});
		}

		if (options.delay > 0)
		{
			setTimeout(removeAlert, options.delay);
		}

		$alert.find("[data-dismiss=\"alert\"]").click(removeAlert);

		return $alert;
	};
})();