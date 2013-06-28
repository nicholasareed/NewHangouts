<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>Tutorial: Digital Clock with HTML5 Audio Alarms</title>

		<!-- The main CSS file -->
		<link href="assets/css/style.css" rel="stylesheet" />

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	<body>

		<div id="clock" class="light">
			<div class="display">
				<div class="weekdays"></div>
				<div class="ampm"></div>
				<div class="alarm"></div>
				<div class="digits"></div>
			</div>
		</div>

		<div class="button-holder">
			<a id="switch-theme" class="button">Switch Theme</a>
			<a class="alarm-button"></a>
		</div>

		<!-- The dialog is hidden with css -->
		<div class="overlay">

			<div id="alarm-dialog">

				<h2>Set alarm after</h2>

				<label class="hours">
					Hours
					<input type="number" value="0" min="0" />
				</label>

				<label class="minutes">
					Minutes
					<input type="number" value="0" min="0" />
				</label>

				<label class="seconds">
					Seconds
					<input type="number" value="0" min="0" />
				</label>

				<div class="button-holder">
					<a id="alarm-set" class="button blue">Set</a>
					<a id="alarm-clear" class="button red">Clear</a>
				</div>

				<a class="close"></a>

			</div>

		</div>

		<div class="overlay">

			<div id="time-is-up">

				<h2>Time's up!</h2>

				<div class="button-holder">
					<a class="button blue">Close</a>
				</div>

			</div>

		</div>

		<audio id="alarm-ring" preload>
			<source src="assets/audio/ticktac.mp3" type="audio/mpeg" />
			<source src="assets/audio/ticktac.ogg" type="audio/ogg" />
		</audio>

		<footer>
            <a class="tz" href="http://tutorialzine.com/2013/06/digital-clock-adding-alarms/">Digital Clock with HTML5 Audio Alarms</a>
            <div id="tzine-actions"></div>
            <span class="close"></span>
        </footer>
        
		<!-- JavaScript Includes -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>
		<script src="assets/js/script.js"></script>

	</body>
</html>
